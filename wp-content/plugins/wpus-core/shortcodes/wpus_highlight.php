<?php
/**
 * Shortcodes: Highlight
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_highlight_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        'background_color' => '',
        'color'            => '',
    ), $atts ) );

    // Inline Style
    $inline_style = AdamasHelper::get_inline_style( array(
        'background_color' => $background_color,
        'color'            => $color,
    ) );

    // Shortcode
    $output = '<span class="wpus-highlight"' . $inline_style . '>';
        $output .= AdamasHelper::do_kses( $content );
    $output .=  '</span>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_highlight', 'adamas_highlight_shortcode' );