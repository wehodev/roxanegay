<?php
/**
 * Shortcode: Code Snippet
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_code_snippet_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'language'  => 'markup',
        
        // Extra tab
        'el_id'     => '',
        'el_class'  => '',
        'el_hidden' => '',

    ), $atts ) );

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'wpus-code-snippet',
        $el_class,
        $el_hidden,
    ) );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . '>';
        $output .= '<pre class="language-' . esc_attr( $language ) . '">';
            $output .= '<code>' . htmlspecialchars( rawurldecode( base64_decode( strip_tags( $content ) ) ) ) . '</code>';
        $output .= '</pre>';
    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_code_snippet', 'adamas_code_snippet_shortcode' );