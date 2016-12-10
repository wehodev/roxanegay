<?php 
/**
 * Typography
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit; 
}

// Body
if ( $body_typography = AdamasHelper::get_style( adamas_get_data( 'body_typography' ) ) ) {
    $css_output .= "body{{$body_typography}}";
}

// H1
if ( $h1_typography = AdamasHelper::get_style( adamas_get_data( 'h1_typography' ) ) ) {
    $css_output .= "h1{{$h1_typography}}";
}

// H2
if ( $h2_typography = AdamasHelper::get_style( adamas_get_data( 'h2_typography' ) ) ) {
    $css_output .= "h2{{$h2_typography}}";
}

// H3
if ( $h3_typography = AdamasHelper::get_style( adamas_get_data( 'h3_typography' ) ) ) {
    $css_output .= "h3{{$h3_typography}}";
}

// H4
if ( $h4_typography = AdamasHelper::get_style( adamas_get_data( 'h4_typography' ) ) ) {
    $css_output .= "h4{{$h4_typography}}";
}

// H5
if ( $h5_typography = AdamasHelper::get_style( adamas_get_data( 'h5_typography' ) ) ) {
    $css_output .= "h5{{$h5_typography}}";
}

// H6
if ( $h6_typography = AdamasHelper::get_style( adamas_get_data( 'h6_typography' ) ) ) {
    $css_output .= "h6{{$h6_typography}}";
}

// Menu: 1st Level
if ( $menu_1st_typography = AdamasHelper::get_style( adamas_get_data( 'menu_1st_typography' ) ) ) {
    $css_output .= ".site-menu > li > a{{$menu_1st_typography}}";
}

// Menu: 2nd Level
if ( $menu_2nd_typography = AdamasHelper::get_style( adamas_get_data( 'menu_2nd_typography' ) ) ) {
    $css_output .= ".site-menu .sub-menu a{{$menu_2nd_typography}}";
}