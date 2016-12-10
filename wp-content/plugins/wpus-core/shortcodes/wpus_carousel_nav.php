<?php
/**
 * Shortcode: Carousel Custom Navigation
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_carousel_nav_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'carousel_id'            => '',
        'style'                  => 'style-bg',
        'size'                   => '',
        'align'                  => '',
        'align_sm'               => '',
        'align_xs'               => '',
        
        // Style tab
        'color'                  => '',
        'hover_color'            => '',
        'border_color'           => '',
        'hover_border_color'     => '',
        'background_color'       => '',
        'hover_background_color' => '',
        
        // Design tab
        'css'                    => '',
        
        // Extra
        'el_id'                  => '',
        'el_class'               => '',
        'el_hidden'              => '',
        
    ), $atts ) );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';
    $html      = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-carousel-nav',
        $style,
        $size,
        $align,
        $align_sm,
        $align_xs,
        $el_class,
        $el_hidden,
    );

    // Wrap atributes
    $wrap_attr = AdamasHelper::get_html_attributes( array( 'id' => $carousel_id ) );

    // Style: Wrap
    if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
        $build_css .= ".wpus-carousel-nav.{$unique_id}{{$wrap_css}}";
    }

    // Style: Regular
    $regular_css = AdamasHelper::get_style( array(
        'color'            => $color,
        'border_color'     => $border_color,
        'background_color' => $background_color,
    ) );

    if ( $regular_css ) {
        $build_css .= ".wpus-carousel-nav.{$unique_id} span{{$regular_css}}";
    }

    // Style: Hover
    $hover_css = AdamasHelper::get_style( array(
        'color'            => $hover_color,
        'border_color'     => $hover_border_color,
        'background_color' => $hover_background_color,
    ) );

    if ( $hover_css ) {
        $build_css .= ".wpus-carousel-nav.{$unique_id} span:hover{{$hover_css}}";
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
        $output .= '<span class="wpus-owl-prev" data-trigger="prev.owl.carousel"><i class="adamas-icon-arrow-left"></i></span>';
        $output .= '<span class="wpus-owl-next" data-trigger="next.owl.carousel"><i class="adamas-icon-arrow-right"></i></span>';
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_carousel_nav', 'adamas_carousel_nav_shortcode' );