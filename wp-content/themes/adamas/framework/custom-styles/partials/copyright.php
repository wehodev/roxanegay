<?php 
/**
 * Copyright Style
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// General
$copyright_wrap_css = array(
    'padding_top'      => adamas_get_data( 'copyright_padding' ),
    'padding_bottom'   => adamas_get_data( 'copyright_padding' ),
    'background_color' => adamas_get_data( 'copyright_background_color' ),
    'border_color'     => adamas_get_data( 'copyright_border_color' ),
);

if ( $copyright_wrap_css = AdamasHelper::get_style( $copyright_wrap_css ) ) {
    $css_output .= ".footer-copyright{{$copyright_wrap_css}}";
}

// Link Color
$copyright_links_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'copyright_links_color' ),
) );

if ( $copyright_links_color ) {
    $css_output .= ".footer-copyright a{{$copyright_links_color}}";
}

// Text Color
$copyright_text_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'copyright_text_color' ),
) );

if ( $copyright_text_color ) {
    $css_output .= "
        .footer-copyright,
        .footer-copyright a:hover {
            {$copyright_text_color}
        }
    ";
}