<?php 
/**
 * Title Bar Style
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

// Return if title bar isn't enabled
if ( ! adamas_get_meta_data( 'title_bar' ) ) {
    return; 
}

// Title bar wrap
$title_bar_wrap_css = AdamasHelper::get_style( array(
    'padding_top'      => adamas_get_data( 'title_bar_padding' ),
    'padding_bottom'   => adamas_get_data( 'title_bar_padding' ),
    'background_color' => adamas_get_data( 'title_bar_bg_color' ),
) );

if ( $title_bar_wrap_css ) {
   $css_output .= ".site-title-bar{{$title_bar_wrap_css}}"; 
}

// Title
$title_bar_title_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'title_bar_title_color' ),
) );

if ( $title_bar_title_color ) {
   $css_output .= ".site-title-bar h1{{$title_bar_title_color}}"; 
}

// Links
$title_bar_links_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'title_bar_links_color' ),
) );

if ( $title_bar_links_color ) {
   $css_output .= ".site-title-bar a{{$title_bar_links_color}}"; 
}

// Text
$title_bar_text_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'title_bar_text_color' ),
) );

if ( $title_bar_text_color ) {
   $css_output .= "
        .site-title-bar .wpus-breadcrumbs,
        .site-title-bar a:hover {
            {$title_bar_text_color}
        }
    "; 
}