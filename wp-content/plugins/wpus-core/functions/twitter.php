<?php
/**
 * Get tweets
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_get_twitter( $username, $count = '3', $transient = 'adamas_tweets' ) {

	$consumer_key    = adamas_get_data( 'twitter_consumer_key' );
	$consumer_secret = adamas_get_data( 'twitter_consumer_secret' );

	if ( empty( $consumer_key ) || empty( $consumer_secret ) ) {
		return new WP_Error( 'invalid_api', esc_html__( 'Go to "Dashboard > Theme Options > Third Party API > Twitter" and set twitter API.', 'wpus-core' ) );
	}

	$transient_key = 'adamas_twitter_transient_' . $username . $count . $transient;

	if ( false === ( $tweets = get_transient( $transient_key ) ) ) {

		$token = 'adamas_twitter_token_transient_' . $transient . $username . $count;
		$token = get_option( $token );

		// Get a new token anyways
		delete_option( $token );

		// Getting new auth bearer only if we don't have one
		if ( ! $token ) {

			// HTTP post arguments
			$args = array(
				'method'      => 'POST',
				'httpversion' => '1.1',
				'blocking'    => true,
				'headers'     => array(
					'Authorization' => 'Basic ' . base64_encode( $consumer_key . ':' . $consumer_secret ),
					'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8'
				),
				'body' => array( 'grant_type' => 'client_credentials' )
			);

			add_filter( 'https_ssl_verify', '__return_false' );
			$remote = wp_remote_get( 'https://api.twitter.com/oauth2/token', $args );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Twitter.', 'wpus-core' ) );
			}

			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_remote', esc_html__( 'Twitter did not return a 200.', 'wpus-core' ) );
			}

			$keys = json_decode( wp_remote_retrieve_body( $remote ) );

			if ( ! $keys ) {
				return new WP_Error( 'bad_json', esc_html__( 'Twitter has returned invalid data.', 'wpus-core' ) );
			}

			if ( isset( $keys->access_token ) ) {
				$keys = $keys->access_token;
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Twitter has returned invalid data.', 'wpus-core' ) );
			}

			update_option( $token, $keys );
			$token = $keys;
		}
		
		// We have bearer token wether we obtained it from API or from options
		$args = array(
			'httpversion' => '1.1',
			'blocking'    => true,
			'headers'     => array( 'Authorization' => "Bearer $token" ),
		);

		add_filter( 'https_ssl_verify', '__return_false' );
		$api_url  = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $username . '&count=' . $count;

		// Get remote url
		$remote = wp_remote_get( $api_url, $args );

		if ( is_wp_error( $remote ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Twitter.', 'wpus-core' ) );
		}

		if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
			return new WP_Error( 'invalid_remote', esc_html__( 'Twitter did not return a 200.', 'wpus-core' ) );
		}

		// Parse remote url
		$remote       = wp_remote_retrieve_body( $remote );
		$tweets_array = json_decode( $remote, TRUE );

		if ( ! $tweets_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Twiiter has returned invalid data.', 'wpus-core' ) );
		}

		$tweets = array();

		foreach ( $tweets_array as $tweet ) {

			// Tweet text
			$tweet_text = $tweet['text'];
			$tweet_text = preg_replace( '/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $tweet_text );
			$tweet_text = preg_replace( '/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">https://$1</a>&nbsp;', $tweet_text );
			$tweet_text = preg_replace( '/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $tweet_text );
			$tweet_text = preg_replace( '/#([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/hashtag/$1" target="_blank">#$1</a>&nbsp;', $tweet_text );

			// Tweet time
			$tweet_time = sprintf( ( esc_html__( 'about %s ago', 'wpus-core' ) ), human_time_diff( strtotime( $tweet['created_at'], current_time( 'timestamp' ) )  ) );

			$tweets[] = array(
				'text' => $tweet_text,
				'time' => $tweet_time,
			);
		}

		if ( ! empty( $tweets ) ) {
			$tweets = base64_encode( serialize( $tweets ) );
			set_transient( $transient_key, $tweets, apply_filters( 'adamas_twitter_cache_time', HOUR_IN_SECONDS * 1 ) );
		}

	}

	if ( ! empty( $tweets ) ) {
		return unserialize( base64_decode( $tweets ) );
	} else {
		return new WP_Error( 'no_tweets', esc_html__( 'Twiiter has returned invalid data.', 'wpus-core' ) );
	}

}