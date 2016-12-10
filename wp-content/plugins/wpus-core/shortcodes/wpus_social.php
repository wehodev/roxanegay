<?php
/**
 * Shortcode: Social
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_social_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'style'                  => 'style-bg',
        'values'                 => urlencode( json_encode( array( array( 'icon' => 'facebook', 'url' => 'http://facebook.com' ), array( 'icon' => 'twitter', 'url' => 'http://twitter.com' ), array( 'icon' => 'vk', 'url' => 'http://vk.com' ) ) ) ),
        'style'                  => 'style-bg',
        'size'                   => '',
        'target'                 => '_blank',
        'align'                  => '',
        'align_sm'               => '',
        'align_xs'               => '',
        
        // Style tab
        'color'                  => '',
        'hover_color'            => '',
        'background_color'       => '',
        'hover_background_color' => '',
        'border_style'           => '',
        'border_width'           => '',
        'border_color'           => '',
        'hover_border_color'     => '',
        'border_radius'          => '',
        
        // Animation tab
        'animation_type'         => '',
        'animation_delay'        => '',
        'animation_duration'     => '',
        
        // Extra tab
        'el_id'                  => '',
        'el_class'               => '',
        'el_hidden'              => '',

    ), $atts ) );

    // Declare variables
    $unique_id   = AdamasHelper::get_unique_id();
    $values      = (array) vc_param_group_parse_atts( $values );
    $social_html = '';
    $build_css   = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-social',
        $style,
        $size,
        $align,
        $align_sm,
        $align_xs,
        $animation_type,
        $el_class,
        $el_hidden,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Regular
    $regular_css = AdamasHelper::get_style( array(
        'color'            => $color,
        'border_color'     => $border_color,
        'border_width'     => $border_width,
        'border_style'     => $border_style,
        'border_radius'    => $border_radius,
        'background_color' => $background_color,
    ) );

    if ( $regular_css ) {
        $build_css .= ".wpus-social.{$unique_id} .wpus-social-link{{$regular_css}}";
    }

    // Style: Hover
    $hover_css = AdamasHelper::get_style( array(
        'color'            => $hover_color,
        'border_color'     => $hover_border_color,
        'background_color' => $hover_background_color,
    ) );

    if ( $hover_css ) {
        $build_css .= ".wpus-social.{$unique_id} .wpus-social-link:hover{{$hover_css}}";
    }
    
    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Generate icon
    foreach ( $values as $key => $value ) {
        
        // Set up the default form values
        $defaults = array(
            'icon' => 'facebook',
            'url'  => 'http://facebook.com',
        );
        
        // Merge the user-selected arguments with the defaults
        $value = wp_parse_args( $value, $defaults );

        // Build icon
        $social_html .= '<a class="wpus-social-link" href="' . esc_url( $value['url'] ) . '" target="' . esc_attr( $target ) . '"><i class="fa fa-' . esc_attr( $value['icon'] ) . '"></i></a>';
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= AdamasHelper::do_kses( $social_html );
    $output .= '</div>';
      
    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_social', 'adamas_social_shortcode' );