<?php
/**
 * Shortcode: Empty Space
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_empty_space_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'height'    => '40px',
        
        // Extra tab
        'el_id'     => '',
        'el_class'  => '',
        'el_hidden' => '',

    ), $atts ) );

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );
    
    // Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'wpus-empty-space',
        $el_class,
        $el_hidden,
    ) );

    // Wrap inline style
    $wrap_inline_style = AdamasHelper::get_inline_style( array( 'height' => $height ) );

	// Shortcode
	$output = '<div' . $wrap_id . $wrap_class . $wrap_inline_style . '></div>';

	// Return shortcode
    return $output;
}

add_shortcode( 'wpus_empty_space', 'adamas_empty_space_shortcode' );