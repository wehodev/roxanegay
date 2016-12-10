<?php
/**
 * Get flickr photos
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_get_flickr( $username, $count = '6', $transient = 'widget', $size = 'q' ) {

	$transient_key = 'adamas_flickr_transient_' . $username . $count . $transient;

	if ( false === ( $flickr = get_transient( $transient_key ) ) ) {

		$remote_url   = wp_remote_get( 'https://api.flickr.com/services/rest/?method=flickr.urls.getUserPhotos&api_key=0388a3691d9cbddb7969e1297b8424a5&user_id=' . $username . '&format=json' );
		$remote_photo = wp_remote_get( 'https://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=0388a3691d9cbddb7969e1297b8424a5&user_id=' . $username . '&per_page=' . $count . '&format=json' );

		if ( is_wp_error( $remote_url ) ||  is_wp_error( $remote_photo ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Flickr.', 'wpus-core' ) );
		}

		if ( 200 != wp_remote_retrieve_response_code( $remote_url ) || 200 != wp_remote_retrieve_response_code( $remote_photo )  ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Flickr did not return a 200.', 'wpus-core' ) );
		}

		$remote_url   = wp_remote_retrieve_body( $remote_url );
		$remote_photo = wp_remote_retrieve_body( $remote_photo );

		// Get flickr photo url
		$remote_url = trim( $remote_url, 'jsonFlickrApi()' );
		$remote_url = json_decode( $remote_url );

		// Get flickr photos
		$remote_photo = trim( $remote_photo, 'jsonFlickrApi()' );
		$remote_photo = json_decode( $remote_photo );

		if ( !$remote_url || ! $remote_photo ) {
			return new WP_Error( 'bad_json', esc_html__( 'Flickr has returned invalid data.', 'wpus-core' ) );
		}

		if ( isset( $remote_url->user->url ) && isset( $remote_photo->photos->photo ) ) {
			$photo_url  = $remote_url->user->url;
			$photo_list = $remote_photo->photos->photo;
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Flickr has returned invalid data.', 'wpus-core' ) );
		}

		if ( ! is_array( $photo_list ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Flickr has returned invalid data.', 'wpus-core' ) );
		}

		$flickr = array();

		foreach ( $photo_list as $photo ) {

			$photo = (array) $photo;

			$url = $photo_url . $photo['id'];
			$src = 'http://farm' . $photo['farm'] . '.static.flickr.com/' . $photo['server'] . '/' . $photo['id'] . '_' . $photo['secret'] . '_';

			$flickr[] = array(
				'url'       => $url,
				'small'     => $src . 's.jpg',
				'thumbnail' => $src . 'q.jpg',
				'medium'    => $src . 'z.jpg',
				'large'     => $src . 'b.jpg',
			);

		}

		if ( !empty( $flickr ) ) {
			$flickr = base64_encode( serialize( $flickr ) );
			set_transient( $transient_key, $flickr, apply_filters( 'adamas_flickr_cache_time', HOUR_IN_SECONDS * 2 ) );
		}

	}

	if ( !empty( $flickr ) ) {
		return unserialize( base64_decode( $flickr ) );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Flickr did not return any images.', 'wpus-core' ) );
	}

}