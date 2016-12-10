<?php
/**
 * Shortcode: Accordion
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Extract shortcodes variables
extract( shortcode_atts( array( 

	// General tab
	'type'                   => 'accordion',
	'style'                  => 'style-bg',
	'tag'                    => 'p',
	'icon_position'          => 'has-left-icon',
	'space'                  => '',
	'active'                 => '',
	
	// Title style tab
	'title_color'            => '',
	'title_hover_color'      => '',
	'title_background_color' => '',
	'title_border_color'     => '',
	'icon_color'             => '',
	'icon_background_color'  => '',
	'icon_border_color'      => '',
	'title_typography'       => '',
	
	// Animation tab
	'animation_type'         => '',
	'animation_delay'        => '',
	'animation_duration'     => '',
	
	// Extra tab
	'el_id'                  => '',
	'el_class'               => '',
	'el_hidden'              => '',

), $atts ) );

global $adamas_acc_data;
$adamas_acc_data['tag'] = $tag;

// Enqueue Google Font
WpusVcHelper::get_google_font( $title_typography );

// Declare variables
$unique_id = AdamasHelper::get_unique_id();
$build_css = '';

// Wrap ID
$wrap_id = AdamasHelper::get_html_id( $el_id );

// Wrap class
$wrap_class = array(
	'wpus-toggle',
	$style,
	$icon_position,
	$el_class,
	$el_hidden,
	$animation_type,
);

// Wrap atributes
$wrap_attr = AdamasHelper::get_html_attributes( array(
	'type'         => $type,
	'active'       => absint( $active ),
	'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
	'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
) );

// Style: Title space
if ( $space_css = AdamasHelper::get_style( array( 'margin_bottom' => $space ) ) ) {
	$build_css .= ".wpus-toggle.{$unique_id} .wpus-toggle-section:not(last-child){{$space_css}}";
}

// Style: Title regular
$title_css = AdamasHelper::get_style( array(
	'color'            => $title_color,
	'border_color'     => $title_border_color,
	'background_color' => $title_background_color,
	'typography'       => $title_typography,
) );

if ( $title_css ) {
	$build_css .= ".wpus-toggle.{$unique_id} .wpus-toggle-header{{$title_css}}";
}

// Style: Title hover
if ( $title_hover_css = AdamasHelper::get_style( array( 'color' => $title_hover_color ) ) ) {
	$build_css .= ".wpus-toggle.{$unique_id} .wpus-toggle-header:hover,.wpus-toggle.{$unique_id} .wpus-toggle-header.active{{$title_hover_css}}";
}

// Style: Icon regular
$icon_css = array(
	'color'            => $icon_color,
	'border_color'     => $icon_border_color,
	'background_color' => $icon_background_color,
);

if ( 'wpus-outline' == $style ) {
	$icon_css['background_color'] = $title_border_color;
}

if ( $icon_css = AdamasHelper::get_style( $icon_css ) ) {
	$build_css .= ".wpus-toggle.{$unique_id} .wpus-toggle-icon{{$icon_css}}";
}

// Style: Icon active
if ( $icon_active_css = AdamasHelper::get_style( array( 'background_color' => $icon_border_color ) ) ) {
	$build_css .= ".wpus-toggle.{$unique_id} .active .wpus-toggle-icon{{$icon_active_css}}";
}

// Generate CSS style
if ( $build_css ) {
    AdamasHelper::build_css( $build_css );
    $wrap_class[] = $unique_id;
}

// Get wrap class
$wrap_class = AdamasHelper::get_html_class( $wrap_class );

// Shortcode
$output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
	$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';

// Echo shortcode
echo $output;