<?php
/**
 * Shortcode: Column Text
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Extract shortcodes variables
extract( shortcode_atts( array( 

    // General tab
    'align'              => '',
    'align_sm'           => '',
    'align_xs'           => '',
    
    // Design tab
    'css'                => '',
    
    // Animation tab
    'animation_type'     => '',
    'animation_delay'    => '',
    'animation_duration' => '',
    
    // Extra
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
    'wpb_text_column',
    'wpb_content_element',
    $align,
    $align_sm,
    $align_xs,
    $el_class,
    $el_hidden,
    $animation_type,
);

// Wrap attributes
$wrap_attr = AdamasHelper::get_html_attributes( array(
    'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
    'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
) );

// Generate CSS style
if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
    $build_css = ".wpb_text_column.{$unique_id}{{$wrap_css}}";
    AdamasHelper::build_css( $build_css );
    $wrap_class[] = $unique_id;
}

// Get wrap class
$wrap_class = AdamasHelper::get_html_class( $wrap_class );

// Generate shortcode
$html = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
    $html .= '<div class="wpb_wrapper">';
        $html .= wpb_js_remove_wpautop( $content, true );
    $html .= '</div>';
$html .= '</div>';

// Echo shortcode
echo $html;