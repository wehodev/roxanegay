<?php 
/**
 * Top Bar Style
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Tp Bar Height
$top_bar_height_css = AdamasHelper::get_style( array(
    'height'      => adamas_get_data( 'top_bar_height' ),
    'line_height' => adamas_get_data( 'top_bar_height' ),
) );

if ( $top_bar_height_css ) {
    $css_output .= ".top-bar-widget{{$top_bar_height_css}}";
}

// Top Bar
$top_bar_wrap_css = AdamasHelper::get_style( array(
    'background_color'    => adamas_get_data( 'top_bar_background_color' ),
    'color'               => adamas_get_data( 'top_bar_text_color' ),
    'font_size'           => $medium_font_size,
) );

if ( $top_bar_wrap_css ) {
   $css_output .= ".site-top-bar{{$top_bar_wrap_css}}"; 
}

// Link regular
$top_bar_link_css = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'top_bar_links_color' ),
) );

if ( $top_bar_link_css ) {
    $css_output .= ".top-bar-widget a{{$top_bar_link_css}}";
}

// Link hover
$top_bar_link_hover_css = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'top_bar_text_color' ),
) );

if ( $top_bar_link_hover_css ) {
    $css_output .= ".top-bar-widget a:hover{{$top_bar_link_hover_css}}";
}

// Dropdown
$top_bar_dropdown_bg_css = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'top_bar_background_color' ),
) );

if ( $top_bar_dropdown_bg_css ) {
    $css_output .= ".top-bar-widget .sub-menu{{$top_bar_dropdown_bg_css}}";
}