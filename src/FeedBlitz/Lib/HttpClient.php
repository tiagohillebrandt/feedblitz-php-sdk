<?php
namespace FeedBlitz\Lib;

class HttpClient {
    private static $httpStatusCode = null;

    public static function getHttpStatusCode() {
        return self::$httpStatusCode;
    }

    public static function request(
        $method,
        $url,
        $queryString,
        $headers = null,
        $auth = null,
        $timeout = null,
        $secure = null
    ) {
        $ch = curl_init();

        if (preg_match('/(POST|PUT|DELETE)/', $method)) {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);

            if (preg_match('/(PUT|DELETE)/', $method)) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            }

            if (!empty($queryString)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString);
            }
        } else {
            curl_setopt($ch, CURLOPT_URL, $url . $queryString);
        }

        if (!is_null($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if (!is_null($auth)) {
            curl_setopt($ch, CURLOPT_USERPWD, $auth);
        }

        if (!is_null($timeout)) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        }

        if (!is_null($secure)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $secure);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $secure);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        self::$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return $response;
    }
}
