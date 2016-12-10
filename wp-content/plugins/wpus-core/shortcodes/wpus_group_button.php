<?php
/**
 * Shortcode: Group Button
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_group_button_sortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'space'      => '',
        'align'      => '',
        'align_sm'   => '',
        'align_xs'   => '',
        
        // Extra tab
        'el_id'      => '',
        'el_class'   => '',
        'el_hidden'  => '',
        
    ), $atts ) );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-group-button',
        $align,
        $align_sm,
        $align_xs,
        $el_class,
        $el_hidden,
    );

    // Generate CSS style
    if ( $space ) {
        $build_css  = ".wpus-group-button.{$unique_id}{margin-top:-{$space}}";
        $build_css .= ".wpus-group-button.{$unique_id}{margin-left:-{$space}}";
        $build_css .= ".wpus-group-button.{$unique_id} a{margin-left:{$space}}";
        $build_css .= ".wpus-group-button.{$unique_id} a{margin-top:{$space}}";
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . '>';
        $output .= do_shortcode( $content );
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_group_button', 'adamas_group_button_sortcode' );