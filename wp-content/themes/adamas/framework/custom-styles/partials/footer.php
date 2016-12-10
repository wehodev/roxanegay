<?php 
/**
 * Footer Style
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

// General
$footer_wrap_css = AdamasHelper::get_style( array(
    'padding_top'      => adamas_get_data( 'footer_padding' ),
    'padding_bottom'   => adamas_get_data( 'footer_padding' ),
    'background_color' => adamas_get_data( 'footer_background_color' ),
) );

if ( $footer_wrap_css ) {
    $css_output .= ".footer-widgets{{$footer_wrap_css}}";
}

// Widget title
$footer_widget_title_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'footer_widget_title_color' ),
) );

if ( $footer_widget_title_color ) {
    $css_output .= "
        .footer-widgets .widget-title,
        .footer-widgets #calendar_wrap caption,
        .footer-widgets #wp-calendar thead th {
            {$footer_widget_title_color}
        }
    ";
}

// Link Color
$footer_links_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'footer_links_color' ),
) );

if ( $footer_links_color ) {
    $css_output .= "
        .footer-widgets a,
        .footer-widgets .tagcloud a,
        .footer-widgets .tagcloud a:hover {
            {$footer_links_color}
        }
    ";
}

// Text Color
$footer_text_color = AdamasHelper::get_style( array(
    'color' => adamas_get_data( 'footer_text_color' ),
) );

if ( $footer_text_color ) {
    $css_output .= "
        .footer-widgets,
        .footer-widgets a:hover {
            {$footer_text_color}
        }
    ";
}

// Metadata
if ( adamas_get_data( 'footer_text_color' ) ) {

    $footer_meta_color = AdamasHelper::get_style( array(
        'color' => AdamasHelper::hex2rgba( adamas_get_data( 'footer_text_color' ), '0.54' )
    ) );

    $css_output .= "
        .footer-widgets .wpus-widget-meta,
        .footer-widgets .post-date,
        .footer-widgets .rss-date,
        .footer-widgets .post-count,
        .footer-widgets .widget_rss cite,
        .footer-widgets .widget_adamas_twitter li:before {
            {$footer_meta_color}
        }
    ";
}

// Element background color
if ( adamas_get_data( 'footer_text_color' ) ) {

    $footer_el_bg_color = AdamasHelper::get_style( array(
        'background_color' => AdamasHelper::hex2rgba( adamas_get_data( 'footer_text_color' ), '0.05' )
    ) );

    $footer_el_hover_bg_color = AdamasHelper::get_style( array(
        'background_color' => AdamasHelper::hex2rgba( adamas_get_data( 'footer_text_color' ), '0.1' )
    ) );

    $css_output .= "
        .footer-widgets textarea,
        .footer-widgets [type=\"text\"],
        .footer-widgets [type=\"email\"],
        .footer-widgets [type=\"number\"],
        .footer-widgets [type=\"search\"],
        .footer-widgets [type=\"url\"],
        .footer-widgets .tagcloud a {
            {$footer_el_bg_color}
        }
    ";

    $css_output .= "
        .footer-widgets textarea:focus,
        .footer-widgets [type=\"text\"]:focus,
        .footer-widgets [type=\"email\"]:focus,
        .footer-widgets [type=\"number\"]:focus,
        .footer-widgets [type=\"search\"]:focus,
        .footer-widgets [type=\"url\"]:focus,
        .footer-widgets .tagcloud a:hover {
            {$footer_el_hover_bg_color}
        }
    ";
}