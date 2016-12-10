<?php
/**
 * Shortcode: Message Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_message_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'type'               => 'success',
        'close'              => 'true',
        
        // Animation tab
        'animation_type'     => '',
        'animation_delay'    => '',
        'animation_duration' => '',
        
        // Extra tab
        'el_id'              => '',
        'el_class'           => '',
        'el_hidden'          => '',

    ), $atts ) );

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'wpus-message',
        $type,
        $el_class,
        $el_hidden,
        $animation_type,
    ) );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= '<div>' . AdamasHelper::js_remove_wpautop( $content ) . '</div>';
        $output .= ( 'true' == $close ) ? '<span class="wpus-message-close"></span>' : '';
    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_message', 'adamas_message_shortcode' );