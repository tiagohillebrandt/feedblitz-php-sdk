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
     *
     * @since 1.0.0
     */
    const FEEDBLITZ_REST_API_URL = 'https://app.feedblitz.com/f.api';

    /**
     * @var string FeedBlitz REST API Key.
     *
     * @since 1.0.0
     */
    protected static $apiKey = null;

    /**
     * Constructor.
     *
     * @since 1.0.0
     *
     * @param string $apiKey
     */
    public function __construct($apiKey) {
        self::$apiKey = $apiKey;
    }

    /**
     * Subscriber resource.
     *
     * @since 1.0.0
     *
     * @return \FeedBlitz\REST\Resource\Subscriber Resource instance.
     */
    public function subscriber() {
        return new \FeedBlitz\REST\Resource\Subscriber();
    }

    /**
     * List resource.
     *
     * @since 1.0.0
     *
     * @return \FeedBlitz\REST\Resource\List Resource instance.
     */
    public function list() {
        return new \FeedBlitz\REST\Resource\List();
    }

    /**
     * Performs a request to the FeedBlitz REST API.
     *
     * @since 1.0.0
     *
     * @param string $uri
     * @param string $method
     * @param string $body
     */
    public static function request($uri, $method = 'GET', $body = null) {
        $url = self::FEEDBLITZ_REST_API_URL . $uri . '?key=' . self::$apiKey;

        $response = \FeedBlitz\Lib\HttpClient::request($method, $url, $body);

        $xml = simplexml_load_string($response);

        return ((false === $xml) ? $response : $xml);
    }
}
