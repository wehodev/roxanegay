<?php
/**
 * Shortcode: Video
 *  
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_video_shortcode( $atts, $content = null ) {

	// Extract shortcodes variables
	extract( shortcode_atts( array( 

		// General tab
		'link'               => 'http://vimeo.com/42411918', 
		
		// Design tab
		'css'                => '',
		
		// Animation tab
		'animation_type'     => '',
		'animation_delay'    => '',
		'animation_duration' => '',
		
		// Extra tab
		'el_id'              => '',
		'el_class'           => '',
		'el_hidden'          => '',

	), $atts ) );

	// Declare variables
	$unique_id = AdamasHelper::get_unique_id();

	// Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

	// Wrap class
	$wrap_class = array(
		'wpus-video',
	    $el_class,
	    $el_hidden,
	    $animation_type,
	);

	// Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
		'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
		'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

	// Generate CSS style
	if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
		$build_css = ".wpus-video.{$unique_id}{{$wrap_css}}";
		AdamasHelper::build_css( $build_css );
		$wrap_class[] = $unique_id;
	}
	
	// Get wrap class
	$wrap_class = AdamasHelper::get_html_class( $wrap_class );

	// Shortcode
	$output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
		$output .= '<div class="wpus-video-embed">' . wp_oembed_get( $link ) . '</div>';
	$output .= '</div>';

	// Return shortcode
    return $output;
}

add_shortcode( 'wpus_video', 'adamas_video_shortcode' );