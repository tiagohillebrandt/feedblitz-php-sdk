<?php
namespace FeedBlitz\REST\Resource;

/**
 * List Class
 *
 * @package FeedBlitz\REST\Resource
 */
class List {
    /**
     * Get a list.
     *
     * @since 1.0.0
     *
     * @param int $list_id
     */
    public function get($list_id = null) {
        return \FeedBlitz\REST\API::request('/syndications', 'GET');
    }

    /**
     * Get subscribers by list.
     *
     * @since 1.0.0
     *
     * @param int $list_id
     */
    public function get_subscribers($list_id) {
        return \FeedBlitz\REST\API::request('/syndications/' . $list_id . '/subscribers', 'GET');
    }

    /**
     * Remove a list.
     *
     * @since 1.0.0
     *
     * @param int $list_id
     */
    public function remove($list_id = null) {
        return \FeedBlitz\REST\API::request('/syndications/' . $list_id, 'DELETE');
    }
}
