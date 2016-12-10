<?php 
/**
 * Side Header Style
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

if ( 'top-header' == adamas_get_meta_data( 'header_type' ) ) {
    return;
}

if ( 'left-header' == adamas_get_meta_data( 'header_type' ) ) {
    $position = 'right';
} else {
    $position = 'left';
}

// Header
$side_header_css = array(
    'background_color' => adamas_get_data( 'header_wrap_css', 'background' ),
);

if ( adamas_get_data( 'header_wrap_css', 'border' ) ) {
    $side_header_css['border_' . $position . '_style'] = 'solid';
    $side_header_css['border_' . $position . '_width'] = '1px';
    $side_header_css['border_' . $position . '_color'] = adamas_get_data( 'header_wrap_css', 'border' );
}

if ( $side_header_css = AdamasHelper::get_style( $side_header_css ) ) {
    $css_output .= "#side-header{{$side_header_css}}";
}

// Menu
$side_header_menu_1st_css = array(
    'color' => adamas_get_data( 'menu_1st_type2_css', 'text' )
);

if ( $side_header_menu_1st_css = AdamasHelper::get_style( $side_header_menu_1st_css ) ) {
    $css_output .= "#side-header .side-menu > li > a{{$side_header_menu_1st_css}}";
}


if ( $side_header_menu_1st_css_hover = adamas_get_data( 'menu_1st_type2_css', 'hover_text' ) ) {
    $css_output .= "#side-header .side-menu > li > a:hover{color:{$side_header_menu_1st_css_hover}}";
}

// Border color
if ( $menu_2nd_border_css = adamas_get_data( 'menu_1st_type2_css', 'border' ) ) {
    $css_output .= "#side-header .side-menu li, #side-header .sub-menu{border-color:{$menu_2nd_border_css}}";
}

// Dropdown
$menu_2nd_css = array( 'color' => adamas_get_data( 'menu_2nd_type2_css', 'text' ) );

if ( $menu_2nd_css = AdamasHelper::get_style( $menu_2nd_css ) ) {
    $css_output .= "#side-header .side-menu .sub-menu a{{$menu_2nd_css}}";
}

if ( $menu_2nd_css_hover = adamas_get_data( 'menu_2nd_type2_css', 'hover_text' ) ) {
    $css_output .= "#side-header .side-menu .sub-menu a:hover{color:{$menu_2nd_css_hover}}";
}

// Search form
$side_header_search_css = AdamasHelper::get_style( array(
    'border_style'     => adamas_get_data( 'header_search_type2_css', 'border_style' ),
    'border_color'     => adamas_get_data( 'header_search_type2_css', 'border', $el_border_color ),
    'border_width'     => adamas_get_data( 'header_search_type2_css', 'border_width' ),
    'border_radius'    => adamas_get_data( 'header_search_type2_css', 'border_radius' ),
    'background_color' => adamas_get_data( 'header_search_type2_css', 'background' ),
    'box_shadow'       => adamas_get_data( 'header_search_type2_css', 'box_shadow' ),
    'color'            => adamas_get_data( 'header_search_type2_css', 'text' ),
) );

if ( $side_header_search_css ) {
    $css_output .= "#side-header .searchform-input{{$side_header_search_css}}";
}

$side_header_search_focus_css = AdamasHelper::get_style( array(
    'color'            => adamas_get_data( 'header_search_type2_css', 'focus_text' ),
    'background_color' => adamas_get_data( 'header_search_type2_css', 'focus_background' ),
    'border_color'     => adamas_get_data( 'header_search_type2_css', 'focus_border' ),
    'box_shadow'       => adamas_get_data( 'header_search_type2_css', 'focus_box_shadow' ),
) );

if ( $side_header_search_focus_css) {
    $css_output .= "#side-header .searchform-input:focus{{$side_header_search_focus_css}}";
}

// Social regular
$side_header_social_css = AdamasHelper::get_style( array(
    'color'            => adamas_get_data( 'header_social_css', 'text' ),
    'border_color'     => adamas_get_data( 'header_social_css', 'border' ),
    'background_color' => adamas_get_data( 'header_social_css', 'background' ),
    'border_radius'    => adamas_get_data( 'header_social_css', 'border_radius' ),
    'border_width'     => adamas_get_data( 'header_social_css', 'border_width' ),
    'border_style'     => adamas_get_data( 'header_social_css', 'border_style' ),
) );

if ( $side_header_social_css ) {
    $css_output .= "#side-header .wpus-social-link{{$side_header_social_css}}";
}

//Social Hover
$side_header_social_css_hover = AdamasHelper::get_style( array(
    'color'            => adamas_get_data( 'header_social_css', 'hover_text' ),
    'border_color'     => adamas_get_data( 'header_social_css', 'hover_border' ),
    'background_color' => adamas_get_data( 'header_social_css', 'hover_background', $accent_color ),
    'border_radius'    => adamas_get_data( 'header_social_css', 'hover_border_radius' ),
) );

if ( $side_header_social_css_hover ) {
    $css_output .= "#side-header .wpus-social-link:hover{{$side_header_social_css_hover}}";
}