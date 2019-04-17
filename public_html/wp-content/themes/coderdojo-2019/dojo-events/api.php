<?php
namespace CoderDojoWP;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class API
{
    public $api_url = 'https://zen.coderdojo.com/api/2.0/';

    public function __construct()
    {
        #
    }

    public function post( $endpoint, $query )
    {
        // id for cached response
        $uniqueid = md5(serialize(array($endpoint,$query)));
        if ( $response = get_transient( $uniqueid ) ) {
            return $response;
        } else {
            $response = wp_remote_post( $this->api_url.$endpoint, array(
                'method' => 'POST',
                // 'timeout' => 45,
                // 'blocking' => true,
                'headers' => array(
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                ),
                'body' => json_encode($query),
            ) );
            $response = $this->process_response( $response );

            // cache response for 24 hours
            set_transient( $uniqueid, $response, 24 * HOUR_IN_SECONDS );

            return $response;
        }
    }

    public function get( $endpoint )
    {
        // id for cached response
        $uniqueid = md5($endpoint);
        if ( $response = get_transient( $uniqueid ) ) {
            return $response;
        } else {
            $response = wp_remote_get($this->api_url.$endpoint);
            $response = $this->process_response( $response );

            // cache response for 24 hours
            set_transient( $uniqueid, $response, 24 * HOUR_IN_SECONDS );

            return $response;
        }
    }

    public function process_response( $response )
    {
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            throw new \Exception("Error Processing Request: $error_message", 1);
        }

        if ( wp_remote_retrieve_response_code($response) !== 200 ) {
            throw new \Exception("Error Processing Request", 1);
        }

        $responses_data = json_decode( wp_remote_retrieve_body( $response ), true );
        if (empty($responses_data)) {
            throw new \Exception("Empty response", 1);
        }

        // we're all good
        return $responses_data;
    }
}

