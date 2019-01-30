<?php
namespace FeedBlitz\REST;

/**
 * API Class
 *
 * @package FeedBlitz\REST
 */
class API {
    /**
     * @var string FeedBlitz REST API URL.
     */
    const FEEDBLITZ_REST_API_URL = 'https://app.feedblitz.com/f.api';

    /**
     * @var string FeedBlitz REST API Key.
     */
    protected static $apiKey = null;

    /**
     * Constructor.
     *
     * @param string $api_key
     *
     * @since 1.0.0
     */
    public function __construct($apiKey) {
        self::$apiKey = $apiKey;
    }

    /**
     * Subscriber resource.
     *
     * @since 1.0.0
     */
    public function subscriber() {
        return new \FeedBlitz\REST\Resource\Subscriber();
    }

    /**
     * Performs a request to the FeedBlitz REST API.
     *
     * @since 1.0.0
     */
    public static function request($uri, $method = 'GET', $body = null) {
        $url = self::FEEDBLITZ_REST_API_URL . $uri . '?key=' . self::$apiKey;

        $response = \FeedBlitz\Lib\HttpClient::request($method, $url, $body);

        $xml = simplexml_load_string($response);

        return ((false === $xml) ? $response : $xml);
    }
}
