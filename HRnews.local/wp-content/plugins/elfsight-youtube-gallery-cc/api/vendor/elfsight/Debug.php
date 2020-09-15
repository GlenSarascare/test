<?php

namespace ElfsightYoutubeGalleryApi\Core;

class Debug {
    public $Api;
    public $Helper;

    public $debugMode;

    static $pass = '8JwSgpRpB4cDhY2q';

    public function __construct($Api, $debug_mode = false) {
        $this->Api = $Api;
        $this->Helper = $Api->Helper;
        $this->debugMode = $debug_mode;

        add_action('rest_api_init', array($this, 'registerRoutes'));
    }

    public function registerRoutes() {
        register_rest_route($this->Api->pluginSlug, '/api/debug/(?P<endpoint>[\w-]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'run'),
            'args' => array(
                'endpoint' => array(
                    'required' => true
                )
            )
        ));
    }

    public function run(\WP_REST_Request $request) {
        $params = $request->get_params();
        $endpoint = $params['endpoint'];

        if (empty($endpoint) || !method_exists($this, $endpoint)) {
            $this->Api->error(400, 'invalid request', 'requested route not found');
        }

        return call_user_func(array($this, $endpoint), $params);
    }

    private function restrict($params) {
        if (!isset($params['pass']) || $params['pass'] !== self::$pass) {
            $this->Api->error(400, 'restricted');
        }
    }

    public function request($params) {
        $test_url = isset($params['test_url']) ? $params['test_url'] : 'https://www.google.com';
        $test_request = $this->Api->request('get', $test_url, array('debug' => true));

        list($curl_response, $curl_info, $curl_error) = $test_request;

        $data = array(
            'info' => $curl_info,
            'error' => $curl_error
        );

        if (isset($params['with_response']) && $params['with_response'] === 'true') {
            $data['response'] = $curl_response;
        }

        $this->Api->response(array(
            'status' => $curl_info['http_code'],
            'test_url' => $test_url,
            'request_data' => $data
        ), array('encode' => true));
    }

    public function php($params) {
        $this->restrict($params);

        $avail_what = array(4,8);
        $what = isset($params['what']) && in_array($params['what'], $avail_what) ? $params['what'] : 4;

        header('Content-type: text/html; charset=UTF-8');

        phpinfo($what);
        exit();
    }

    public function dump($data, $die = false)
    {
        $this->dd($data, $die);
    }

    public function dd($data, $die = true)
    {
        if (!$this->debugMode) {
            return;
        }

        header('Content-type: text/html; charset=UTF-8');

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        $die && die();
    }
}
