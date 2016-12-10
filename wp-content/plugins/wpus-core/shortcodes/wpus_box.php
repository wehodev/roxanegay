<?php
/**
 * Shortcodes: Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_box_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        
        // General tab
        'border_position'    => '',
        'border_width'       => '3px',
        'border_color'       => adamas_get_data( 'accent_color', '', '#81c689' ),
        
        // Design tab
        'css'                => '',
        'box_shadow'         => '',
        'hover_box_shadow'   => '',
        
        // Animation tab
        'animation_type'     => '',
        'animation_delay'    => '',
        'animation_duration' => '',
        
        // Extra tab
        'el_id'              => '',
        'el_class'           => '',
        'el_hidden'          => '',

    ), $atts ) );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-box',
        $el_class,
        $el_hidden,
        $animation_type,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Wrap regular 
    $wrap_css  = str_replace( ' !important', '', AdamasHelper::get_vc_style( $css ) );
    $wrap_css .= AdamasHelper::get_style( array( 'box_shadow' => $box_shadow ) );

    if ( $border_width && $border_position && $border_color ) {
        $wrap_css .= AdamasHelper::get_style( array(
            'border_' . $border_position . '_width' => $border_width,
            'border_' . $border_position . '_style' => 'solid',
            'border_' . $border_position . '_color' => $border_color,
        ) );
    }

    if ( $wrap_css ) {
        $build_css .= ".wpus-box.{$unique_id}{{$wrap_css}}";
    }

    // Style: Wrap hover
    if ( $wrap_hover_css = AdamasHelper::get_style( array( 'box_shadow' => $hover_box_shadow ) ) ) {
        $build_css .= ".wpus-box.{$unique_id}:hover{{$wrap_hover_css}}";
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
        $output .= do_shortcode( $content );
    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_box', 'adamas_box_shortcode' );