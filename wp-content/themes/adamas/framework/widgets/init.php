<?php
/**
 * Register the custom widgets
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

function adamas_register_widgets() {

	$widgets = apply_filters( 'adamas_widgets', array(
		'flickr'    => 'Adamas_Widget_Flickr',
		'instagram' => 'Adamas_Widget_Instagram',
		'portfolio' => 'Adamas_Widget_Portfolio',
		'posts'     => 'Adamas_Widget_Posts',
		'twitter'   => 'Adamas_Widget_Twitter',
	) );

	foreach ( $widgets as $k => $v ) {
		require_once ADAMAS_FRAMEWORK_DIR . '/widgets/widget-' . sanitize_key( $k ) . '.php';
		register_widget( $v );
	}

}

add_action( 'widgets_init', 'adamas_register_widgets' );
