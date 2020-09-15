<?php

namespace ElfsightYoutubeGalleryApi\Core;


if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}


abstract class Api {
    public $Helper;
    public $Cache;
    public $Throttle;
    public $User;
    public $Debug;

    public $pluginSlug;
    public $pluginFile;
    public $debugMode;
    public $startTime;

    private $proxy;

    private $routes;

    public static $client;

    public static $ERROR_UNKNOWN;
    public static $ERROR_INVALID_REQUEST;
    public static $ERROR_INVALID_ROUTE;
    public static $ERROR_INVALID_AUTH;
    public static $ERROR_CURL;

    public function __construct($config, $routes) {
        self::$ERROR_UNKNOWN = __('Service is unavailable now');
        self::$ERROR_INVALID_REQUEST = __('invalid request');
        self::$ERROR_INVALID_AUTH = __('Invalid auth');
        self::$ERROR_INVALID_ROUTE = __('Requested route not found');
        self::$ERROR_CURL = __('The plugin can’t make a request. The reason is that cURL PHP Library is not available or requested domain is blocked on your server. To fix this please contact your hosting or server administrator.');

        $this->pluginSlug = $config['plugin_slug'];
        $this->pluginFile = $config['plugin_file'];
        $this->debugMode = isset($config['debug_mode']) ? $config['debug_mode'] : false;
        $this->startTime = round(microtime(true) * 1000);

        $this->proxy = $this->setProxy($config);

        $this->routes = $routes;

        // @TODO static Helper
        $this->Helper = new Helper($this->pluginSlug);
        $this->Cache = new Cache($this->Helper, $config);

        $this->initOptions($config);
        $this->Debug = $this->initDebug($this->debugMode);

        if (isset($config['use']) && in_array('throttle', $config['use'])) {
            $this->Throttle = new Throttle($this->Helper, $config);
        }

        if (isset($config['use']) && in_array('user', $config['use'])) {
            $this->User = new User($this->Helper, $config);
        }

        add_action('rest_api_init', array($this, 'registerRoutes'));
        add_action('rest_api_init', array($this, 'permalinkRestRouteFix'));
    }

    public function permalinkRestRouteFix() {
        global $wp;

        if (strpos($wp->query_vars['rest_route'], $this->pluginSlug . '/api') !== false) {
            $split = explode('?q=', $wp->query_vars['rest_route']);

            if (count($split) === 2) {
                $wp->query_vars['rest_route'] = $split[0];
                $_REQUEST['q'] = $split[1];
            }
        }
    }

    public function registerRoutes() {
        register_rest_route($this->pluginSlug, '/api/', array(
            'methods' => 'GET, POST',
            'callback' => array($this, 'run')
        ));

        register_rest_route($this->pluginSlug, '/api/(?P<endpoint>[\w-]+)', array(
            'methods' => 'GET, POST',
            'callback' => array($this, 'run'),
            'args' => array(
                'endpoint' => array(
                    'required' => false,
                    'default' => '',
                    'enum' => array_keys($this->routes)
                )
            )
        ));
    }

    public function initDebug($debug_mode) {
        if (class_exists('\ElfsightYoutubeGalleryApi\Debug')) {
            return new \ElfsightYoutubeGalleryApi\Debug($this, $debug_mode);
        } else {
            return new \ElfsightYoutubeGalleryApi\Core\Debug($this, $debug_mode);
        }
    }

    public function initOptions($config) {
        if (class_exists('\ElfsightYoutubeGalleryApi\Options')) {
            return new \ElfsightYoutubeGalleryApi\Options($this->Helper, $config);
        } else {
            return new \ElfsightYoutubeGalleryApi\Core\Options($this->Helper, $config);
        }
    }

    public function run(\WP_REST_Request $request) {
        $endpoint = $request->get_param('endpoint');
        $route = isset($this->routes[$endpoint]) ? $this->routes[$endpoint] : null;

        if (empty($route) || !method_exists($this, $route)) {
            $this->error(400, self::$ERROR_INVALID_REQUEST, self::$ERROR_INVALID_ROUTE);
        }

        return call_user_func(array($this, $route));
    }

    public function request($type, $url, $options = array()) {
        $type = strtoupper($type);

        $curl = curl_init();

        $request_url = $url;

        if (!empty($options['query'])) {
            $request_url .= '?' . http_build_query($options['query']);
        }

        $curl_options = array(
            CURLOPT_URL            => $request_url,
            CURLOPT_HEADER         => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_FOLLOWLOCATION => !empty($options['follow']) && $options['follow'],
            CURLOPT_HTTPHEADER     => $this->getHeadersList($options),
            CURLOPT_PROXY          => $this->proxy['url'],
            CURLOPT_PROXYUSERPWD   => $this->proxy['credentials']
        );

        curl_setopt_array($curl, $curl_options);

        $response = curl_exec($curl);
        $info     = curl_getinfo($curl);
        $error    = curl_error($curl);

        curl_close($curl);

        if (isset($options['debug']) && $options['debug']) {
            return [$response, $info, $error];
        }

        if ($info['http_code'] === 0) {
            $this->error(400, self::$ERROR_CURL, $error);
        }

        return $this->formatResponse($response);
    }

    private function getHeadersList($options = array()) {
        $headers_raw_list = array();
        $cookies_raw_list = array();

        $cookies = !empty(self::$client['cookies']) ? self::$client['cookies'] : array();
        $headers = !empty(self::$client['headers']) ? self::$client['headers'] : array();

        if (!empty($options['cookies'])) {
            $cookies = $this->Helper->arrayMergeAssoc($cookies, $options['cookies']);
        }

        if (isset($options['headers'])) {
            $headers = $this->Helper->arrayMergeAssoc($headers, $options['headers']);
        }

        foreach ($cookies as $cookie_name => $cookie_value) {
            $cookies_raw_list[] = $cookie_name . '=' . $cookie_value;
        }
        unset($cookie_name, $cookie_data);

        $headers['Cookie'] = implode('; ', $cookies_raw_list);

        foreach ($headers as $header_key => $header_value) {
            $headers_raw_list[] = $header_key . ': ' . $header_value;
        }
        unset($header_key, $header_value);

        return $headers_raw_list;
    }

    public function formatResponse($response) {
        @list ($response_headers_str, $response_body_encoded, $alt_body_encoded) = explode("\r\n\r\n", $response);

        if ($alt_body_encoded) {
            $response_headers_str = $response_body_encoded;
            $response_body_encoded = $alt_body_encoded;
        }

        $response_body = $response_body_encoded;

        $response_headers_raw_list = explode("\r\n", $response_headers_str);
        $response_http = array_shift($response_headers_raw_list);

        preg_match('#^([^\s]+)\s(\d+)\s?([^$]+)?$#', $response_http, $response_http_matches);
        array_shift($response_http_matches);

        list ($response_http_protocol, $response_http_code) = $response_http_matches;

        $response_http_message = '';
        if (isset($response_http_matches[2])) {
            $response_http_message = $response_http_matches[2];
        }

        $response_headers = array();
        $response_cookies = array();

        foreach ($response_headers_raw_list as $header_row) {
            list ($header_key, $header_value) = explode(': ', $header_row, 2);

            if (strtolower($header_key) === 'set-cookie') {
                $cookie_params = explode('; ', $header_value);

                if (empty($cookie_params[0])) {
                    continue;
                }

                list ($cookie_name, $cookie_value) = explode('=', $cookie_params[0]);
                $response_cookies[$cookie_name] = $cookie_value;

            } else {
                $response_headers[$header_key] = $header_value;
            }
        }
        unset($header_row, $header_key, $header_value, $cookie_name, $cookie_value);

        if ($response_cookies) {
            self::$client['cookies'] = $this->Helper->arrayMergeAssoc(self::$client['cookies'] ?: array(), $response_cookies);
        }

        return array(
            'status' => 1,
            'http_protocol' => $response_http_protocol,
            'http_code' => (int) $response_http_code,
            'http_message' => $response_http_message,
            'headers' => $response_headers,
            'cookies' => $response_cookies,
            'body' => $response_body
        );
    }

    public function response($data, $options = array()) {
        if (ob_get_length()) {
            ob_end_clean();
            ob_start();
        }

        $default_options = array(
            'encode' => false,
            'plain' => false
        );

        $options = !empty($options) ? array_merge($default_options, $options) : $default_options;

        $callback = $this->input('callback', null, false);
        $output = $options['encode'] ? json_encode($data) : $data;
        $content_type = $options['plain'] ? 'text/html' : 'application/json';

        if (!empty($callback)) {
            $callback = htmlspecialchars(strip_tags($callback));
            $validate_callback = preg_match('#^jQuery[0-9]*\_[0-9]*$#', $callback);

            if ($validate_callback) {
                $output = '/**/ ' . $callback . '(' . $output . ')';
                $content_type = 'application/javascript';
            }
        }

        header('Content-type: ' . $content_type . '; charset=utf-8');
        exit($output);
    }

    public function error($code = 400, $error_message = null, $additional = '') {
        if (!$error_message) {
            $error_message = self::$ERROR_UNKNOWN;
        }

        $error = array(
            'meta' => array(
                'code' => $code,
                'error_message' => $error_message
            )
        );

        if ($additional) {
            $additional && $error['meta']['_additional'] = $additional;
        }

        $this->response($error, array('encode' => true));
    }

    public function subError($additional) {
        return $this->error(400, self::$ERROR_UNKNOWN, $additional);
    }

    public function input($name, $default = null, $check_empty = true) {
        $query = array();

        if (empty($_REQUEST)) {
            $parsed_url = parse_url($_SERVER['REQUEST_URI']);

            if (isset($parsed_url['query'])) {
                parse_str($parsed_url['query'], $query);
            }
        } else {
            $query = $_REQUEST;
        }

        $value = isset($query[$name]) ? $query[$name] : $default;

        if (empty($value) && $check_empty) {
            $this->error(400, self::$ERROR_INVALID_REQUEST, $name . ' is not defined');
        }

        return is_string($value) ? urldecode($value) : $value;
    }

    private function setProxy($config) {
        $url = null;
        $credentials = null;

        if (isset($config['proxy'])) {
            $proxy_config = $config['proxy'];

            if (isset($proxy_config['proxy']) && !empty($proxy_config['proxy'])) {
                if (!empty($proxy_config['proxy']['server'])) {
                    $url = $proxy_config['proxy']['server'];
                }

                if (!empty($proxy_config['proxy']['user']) && !empty($proxy_config['proxy']['password'])) {
                    $credentials = $proxy_config['proxy']['user'] . ':' . $proxy_config['proxy']['password'];
                }
            }
        }

        return array(
            'url' => $url,
            'credentials' => $credentials
        );
    }
}
