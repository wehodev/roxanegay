<?php
/**
 * Shortcode: Row
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Extract shortcodes variables
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Declare variables
$unique_id = AdamasHelper::get_unique_id();
$build_css = '';

// Enqueue script
wp_enqueue_script( 'wpb_composer_front_js' );

// Section ID
$section_id = $el_id ? ' id="' . $el_id . '"' : '';

// Section class
$section_css_class = array(
	'wpus-section',
	$row_type,
	$no_padding,
	'in-container-section' == $row_type ? 'container' : '',
	$max_width ? 'has-max-width' : '',
	$full_height,
	$full_height_valign,
	$equal_col_height,
	$equal_col_valign,
	$row_top_slant,
	$row_bottom_slant,
	$fade_content ? 'has-fade-content' : '',
	$parallax ? 'has-parallax' : '',
	$el_class,
	$el_hidden,
);

// Row attributes
$row_attr = AdamasHelper::get_html_attributes( array(
    '250-top'  => 'yes' == $fade_content ? 'opacity:1;' : '',
    '-250-top' => 'yes' == $fade_content ? 'opacity:0;' : '',
) );

// Get Background
$bg_attr = array(
	'image'                 => preg_replace( '/[^\d]/', '', $background_image ),
	'youtube'               => $youtube_url,
	'overlay'               => $overlay_color,
	'parallax'              => $parallax,
	'background_repeat'     => $background_repeat,
	'background_attachment' => $background_attachment,
	'background_position'   => $background_position,
	'background_size'       => $background_size,
	'background_animation'  => $background_animation,
);

$background = adamas_get_background( $bg_attr, '' );

// Section style
$section_css = AdamasHelper::get_style( array(
	'max_width'  => $max_width,
	'min_height' => $min_height,
) );

$section_css .= AdamasHelper::get_vc_style( $css );

if ( $section_css ) {
    $build_css .= ".wpus-section.{$unique_id}{{$section_css}}";
}

// Top slant color
if ( $row_top_slant_color ) {
	$build_css .= ".wpus-section.{$unique_id}.slant-top-left:before,.wpus-section.{$unique_id}.slant-top-right:before{background-color:{$row_top_slant_color}}";
}

// Top slant margin botttom
preg_match( '/padding-top\s*:\s*([^;]*);?/', AdamasHelper::get_vc_style( $css ), $top_matches );
if ( isset( $top_matches[1] ) ) {
	$build_css .= ".wpus-section.{$unique_id}.slant-top-left:before,.wpus-section.{$unique_id}.slant-top-right:before{margin-bottom:{$top_matches[1]}}";
}

// Bottom slant color
if ( $row_bottom_slant_color ) {
	$build_css .= ".wpus-section.{$unique_id}.slant-bottom-left:after,.wpus-section.{$unique_id}.slant-bottom-right:after{background-color:{$row_bottom_slant_color}}";
}

// Top slant margin top
preg_match( '/padding-bottom\s*:\s*([^;]*);?/', AdamasHelper::get_vc_style( $css ), $bottom_matches );
if ( isset( $bottom_matches[1] ) ) {
	$build_css .= ".wpus-section.{$unique_id}.slant-bottom-left:after,.wpus-section.{$unique_id}.slant-bottom-right:after{margin-top:{$bottom_matches[1]}}";
}

// Generate CSS style
if ( $build_css ) {
    AdamasHelper::build_css( $build_css );
    $section_css_class[] = $unique_id;
}

// Get wrap class
$section_css_class = AdamasHelper::get_class( $section_css_class );
$section_css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,  $section_css_class, $this->settings['base'] );

// Generate shortcode
$output = '<div' . $section_id . ' class="' . $section_css_class . '">';

	$output .= $background;

	if ( 'full-width-section' == $row_type ) $output .= '<div class="container">';

		$output .= '<div class="row"' . $row_attr . '>';
			$output .= wpb_js_remove_wpautop( $content );
		$output .= '</div>';

	if ( 'full-width-section' == $row_type ) $output .= '</div>';

$output .= '</div>';

// Echo shortcode
echo $output;