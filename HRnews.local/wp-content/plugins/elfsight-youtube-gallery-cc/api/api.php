<?php

namespace ElfsightYoutubeGalleryApi;


if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/vendor/autoload.php';

class Api extends Core\Api {
    private $routes = array(
        '' => 'requestController'
    );

    const API_BASE_URL = 'https://www.googleapis.com/youtube/v3';
    const PREDEFINED_API_KEY = 'AIzaSyDC65bwDnfehy1SfK8KosxvyVG5GvkBC9I';

    static $API_KEY;

    public function __construct($config) {
        parent::__construct($config, $this->routes);

        $user_api_key = get_option($this->Helper->getOptionName('api_key'), null);

        self::$API_KEY = $user_api_key ? $user_api_key : self::PREDEFINED_API_KEY;
    }

    public function requestController() {
        $q = $this->input('q');

        $cache_key = $this->Cache->keyFromQuery($q, array('fields', 'callback', '_'));
        $cache_data = $this->Cache->get($cache_key);

        $data = array();

        if (empty($cache_data)) {
            $request_url = $this->buildRequestUrl($q);

            $response = $this->request('GET', $request_url, array(
                'headers' => [
                    'Referer' => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['SCRIPT_URI']
                ]
            ));

            if (!empty($response)) {
                if (!empty($response['body'])) {
                    $data = $response['body'];
                    $data_arr = json_decode($response['body'], true);

                    if (!empty($data_arr['error'])) {
                        return $this->error($data_arr['error']['code'], $data_arr['error']['message']);
                    }
                }

                if (!empty($response['http_code']) && (int) $response['http_code'] === 200) {
                    $this->Cache->set($cache_key, $data);
                }

            } else {
                return $this->error();
            }
        } else {
            $data = $cache_data;
        }

        return $this->response($data);
    }


    public function buildRequestUrl($url) {
        $url = $this->Helper->removeQueryParam($url, 'key');
        $url = $this->Helper->addQueryParam($url, 'key', self::$API_KEY);

        return self::API_BASE_URL . urldecode($url);
    }
}
