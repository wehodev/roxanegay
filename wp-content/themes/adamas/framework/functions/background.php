<?php
/**
 * Theme Section Background
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return background
 *
 * @since 1.0
 */
function adamas_get_background( array $args = NULL, $type = 'hero' ) {

	if ( 'hero' != $type && ( empty( $args ) || ! is_array( $args ) ) ) {
		return false;
	}

	$output = '';

	// Get hero data
	if ( 'hero' == $type ) {
		$id                    = adamas_get_page_id();
		$image                 = get_post_meta( $id, 'adamas_hero_background_image', true );
		$background_repeat     = get_post_meta( $id, 'adamas_hero_background_repeat', true );
		$background_size       = get_post_meta( $id, 'adamas_hero_background_size', true );
		$background_attachment = get_post_meta( $id, 'adamas_hero_background_attachment', true );
		$background_position   = get_post_meta( $id, 'adamas_hero_background_position', true );
		$background_animation  = get_post_meta( $id, 'adamas_hero_background_animation', true );
		$youtube               = get_post_meta( $id, 'adamas_hero_youtube_url', true );
		$overlay               = get_post_meta( $id, 'adamas_hero_overlay_color', true );
		$parallax              = get_post_meta( $id, 'adamas_hero_parallax', true );
	}

	// Extract args
	else {
		extract( shortcode_atts( array(
			'image'                 => '',
			'youtube'               => '',
			'overlay'               => '',
			'parallax'              => '',
			'background_repeat'     => '',
			'background_size'       => '',
			'background_attachment' => '',
			'background_position'   => '',
			'background_animation'  => '',
        ), $args ) );
	}

	// Get background source
	$unique_id = AdamasHelper::get_unique_id();
	$video_id  = AdamasHelper::get_video_embed_id( $youtube );
	$image_id  = wp_get_attachment_image_url( $image, 'full' );


	// Enqueue scripts
	if ( $video_id ) {
	    wp_enqueue_script( 'youtube-api' );
	}

	// Wrap class
	$wrap_class = AdamasHelper::get_html_class( array(
	    'wpus-background',
	    $parallax ? 'wpus-parallax' : '',
	    $parallax,
	    $background_animation,
	    $unique_id,
	) );

	// Wrap attributes
	$wrap_attr = array(
	    'videoid' => $video_id,
	);

	if ( 'parallax-up' == $parallax ) {
	    $wrap_attr['bottom-top'] = 'top: 0%; opacity:1;';
	    $wrap_attr['top-bottom'] = 'top: -50%;';
	} else if ( 'parallax-right' == $parallax ) {
	    $wrap_attr['bottom-top'] = 'left: -10%; opacity:1;';
	    $wrap_attr['top-bottom'] = 'left: 0%;';
	} else if ( 'parallax-down' == $parallax ) {
	    $wrap_attr['bottom-top'] = 'top: -50%; opacity:1;';
	    $wrap_attr['top-bottom'] = 'top: 0%;';
	} else if ( 'parallax-left' == $parallax ) {
	    $wrap_attr['bottom-top'] = 'left: 0%; opacity:1;';
	    $wrap_attr['top-bottom'] = 'left: -10%;';
	}

	$wrap_attr = AdamasHelper::get_html_attributes( $wrap_attr );

	// Background style
	$wrap_css = AdamasHelper::get_style( array(
		'background_image'      => $image_id,
		'background_repeat'     => $background_repeat,
		'background_attachment' => $background_attachment,
		'background_position'   => $background_position,
		'background_size'       => $background_size,
    ) );

    if ( $wrap_css ) {
		$wrap_css = ".wpus-background.{$unique_id}{{$wrap_css}}";
		AdamasHelper::build_css( $wrap_css );
	}

	// Bakground markup
	if ( $image_id || $youtube ) {
	    $output = '<div' . $wrap_class . $wrap_attr . '></div>';
	}

	// Overlay
	if ( $overlay && $output ) {
	    $output .= '<span class="wpus-overlay" style="background-color:' . $overlay . '"></span>';
	}

	// Return backgroud
	if ( $output ) {
	    return $output;
	} else {
		return false;
	}

}

/**
 * Echo background
 *
 * @since 1.0
 */
function adamas_background( array $args = NULL, $type = 'hero' ) {
	echo adamas_get_background( $args, $type );
}
