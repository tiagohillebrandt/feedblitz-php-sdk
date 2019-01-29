<?php
namespace FeedBlitz\REST\Resource;

/**
 * Subscriber Class
 *
 * @package FeedBlitz\REST\Resource
 */
class Subscriber {
    public function get($id = null, $list = null) {
        return \FeedBlitz\REST\API::request('/subscribers', 'GET');
    }

    public function remove($id = null) {
        return \FeedBlitz\REST\API::request('/subscribers/' . $id, 'DELETE');
    }
}
