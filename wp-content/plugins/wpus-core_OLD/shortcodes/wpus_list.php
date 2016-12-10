<?php
/**
 * Shortcode: List
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_list_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 
        
        // General tab
        'icon_type'          => 'fontawesome',
        'icon_etline'        => 'etline-mobile',
        'icon_fontawesome'   => 'fa fa-info-circle',
        'icon_linecons'      => 'linecons-heart',
        'icon_color'         => '',
        'icon_size'          => '',
        
        // Design tab
        'css'                => '',
        
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
        'wpus-list',
        $el_class,
        $el_hidden,
        $animation_type,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Wrap
    if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
        $build_css .= ".wpus-list.{$unique_id}{{$wrap_css}}";
    }

    // Style: Icon
    if ( $icon_css = AdamasHelper::get_style( array( 'color' => $icon_color, 'font_size' => $icon_size ) ) ) {
        $build_css .= ".wpus-list.{$unique_id} i.list-icon{{$icon_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Icon markup
    switch ( $icon_type ) {
        case 'etline':
            wp_enqueue_style( 'etline' );
            $icon = '<i class="list-icon ' . esc_attr( $icon_etline ) . '"></i>';
            break;
        case 'fontawesome':
            $icon = '<i class="list-icon ' . esc_attr( $icon_fontawesome ) . '"></i>';
            break;
        case 'linecons':
            vc_icon_element_fonts_enqueue( 'linecons' );
            $icon = '<i class="list-icon ' . esc_attr( $icon_linecons ) . '"></i>';
            break;     
    }

    // Add icon in content
    $content = str_replace( '<li>', '<li>' . $icon , $content );

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= AdamasHelper::js_remove_wpautop( $content );
    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_list', 'adamas_list_shortcode' );