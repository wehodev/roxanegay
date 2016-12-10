<?php 
/**
 * Header Style
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

$heder_height             = adamas_get_data( 'header_height' );
$header_sticky_height     = adamas_get_data( 'header_sticky_height' );
$header_background_color  = adamas_get_data( 'header_background_color' );
$header_border_color      = adamas_get_data( 'header_border_color' );
$header_link_color        = adamas_get_data( 'header_link_color' );
$header_link_hover_color  = adamas_get_data( 'header_link_hover_color' );
$submenu_background_color = adamas_get_data( 'submenu_background_color' );
$submenu_link_color       = adamas_get_data( 'submenu_link_color' );
$submenu_link_hover_color = adamas_get_data( 'submenu_link_hover_color' );

// Header Height
$css_output .= "
    .site-header,
    .site-header .site-logo,
    .site-header .menu-link{
        height:{$heder_height}px;
        line-height:{$heder_height}px
    }
";

// Header fixed
if ( adamas_get_meta_data( 'header_sticky' ) ) {
   $css_output .= "
    .site-header.is-shrunk,
    .site-header.is-shrunk .site-logo,
    .site-header.is-shrunk .menu-link{
        height:{$header_sticky_height}px;
        line-height:{$header_sticky_height}px
    }
";
}

// Header Wrap
$header_css = AdamasHelper::get_style( array(
    'background_color' => $header_background_color,
    'border_color'     => $header_border_color,
) );

if ( $header_css ) {
    $css_output .= ".site-header-inner{{$header_css}}";
}

// Menu link regular
$menu_1st_css = AdamasHelper::get_style( array(
    'color' => $header_link_color,
) );

if ( $menu_1st_css ) {
    $css_output .= ".site-header-inner .menu-link{{$menu_1st_css}}";
}

// Menu link regular
$menu_1st_hover_css = AdamasHelper::get_style( array(
    'color' => $header_link_hover_color,
) );

if ( $menu_1st_hover_css ) {
    $css_output .= ".site-header-inner .menu-link:hover{{$menu_1st_hover_css}}";
}


// Dropdown background color
$menu_2nd_bg_css = AdamasHelper::get_style( array(
    'background_color' => $submenu_background_color,
) );

if ( $menu_2nd_bg_css ) {
    $css_output .= ".site-header-inner .sub-menu{{$menu_2nd_bg_css}}";
}

// Dropdown link regular
$menu_2nd_link_css = AdamasHelper::get_style( array(
    'color' => $submenu_link_color,
) );

if ( $menu_2nd_link_css ) {
    $css_output .= ".site-header-inner .sub-menu a{{$menu_2nd_link_css}}";
}

// Dropdown link hover
$menu_2nd_link_css = AdamasHelper::get_style( array(
    'color' => $submenu_link_hover_color,
) );

if ( $menu_2nd_link_css ) {
    $css_output .= ".site-header-inner .sub-menu a:hover{{$menu_2nd_link_css}}";
}