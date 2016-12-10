<?php
/**
 * Get instagram photos
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_get_instagram( $username, $count = 6, $transient = 'adamas_instagram' ) {

	$username      = strtolower( $username );
	$username      = str_replace( '@', '', $username );
	$username      = trim( $username );
	$transient_key = 'adamas_instagram_transient_' . $username . $count . $transient;

	if ( false === ( $instagram = get_transient( $transient_key ) ) ) {

		$remote = wp_remote_get( 'https://instagram.com/' . $username );

		if ( is_wp_error( $remote ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'wpus-core' ) );
		}

		if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'wpus-core' ) );
		}

		$shards          = explode( 'window._sharedData = ', $remote['body'] );
		$instagram_json  = explode( ';</script>', $shards[1] );
		$instagram_array = json_decode( $instagram_json[0], TRUE );

		if ( ! $instagram_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'wpus-core' ) );
		}

		if ( isset( $instagram_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
			$images = $instagram_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'wpus-core' ) );
		}

		if ( ! is_array( $images ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'wpus-core' ) );
		}

		$instagram = array();

		foreach ( $images as $image ) {

			$image['thumbnail_src'] = preg_replace( "/^https:/i", "", $image['thumbnail_src'] );
			$image['thumbnail']     = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
			$image['small']         = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
			$image['large']         = $image['thumbnail_src'];
			$image['display_src']   = preg_replace( "/^https:/i", "", $image['display_src'] );

			if ( $image['is_video'] == true ) {
				$type = 'video';
			} else {
				$type = 'image';
			}

			$instagram[] = array(
				'url'		  	=> '//instagram.com/p/' . $image['code'],
				'thumbnail'	 	=> $image['thumbnail'],
				'small'			=> $image['small'],
				'large'			=> $image['large'],
				'original'		=> $image['display_src'],
				'type'		  	=> $type
			);
		}

		// do not set an empty transient - should help catch private or empty accounts
		if ( !empty( $instagram ) ) {
			$instagram = base64_encode( serialize( $instagram ) );
			set_transient( $transient_key, $instagram, apply_filters( 'adamas_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
		}
	}

	if ( !empty( $instagram ) ) {
		$instagram = unserialize( base64_decode( $instagram ) );
		return array_slice( $instagram, 0, $count );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'wpus-core' ) );
	}

}