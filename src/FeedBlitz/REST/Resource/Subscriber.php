<?php
namespace FeedBlitz\REST\Resource;

/**
 * Subscriber Class
 *
 * @package FeedBlitz\REST\Resource
 */
class Subscriber {
    /**
     * Get a subscriber.
     *
     * @since 1.0.0
     *
     * @param int $subscriber_id
     */
    public function get($subscriber_id = null) {
        return \FeedBlitz\REST\API::request('/subscribers', 'GET');
    }

    /**
     * Remove a subscriber.
     *
     * @since 1.0.0
     *
     * @param int $subscriber_id
     */
    public function remove($subscriber_id = null) {
        return \FeedBlitz\REST\API::request('/subscribers/' . $subscriber_id, 'DELETE');
    }
}
