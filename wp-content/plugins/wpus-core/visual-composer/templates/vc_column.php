<?php
/**
 * Shortcode: Column
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Extract shortcodes variables
extract( shortcode_atts( array( 

    // General tab
    'el_id'              => '',
    'el_class'           => '',
    
    // Design tab
    'css'                => '',
    
    // Responsive tab
    'width'              => '1/1',
    'offset'             => '',
    
    // Animation tab
    'animation_type'     => '',
    'animation_delay'    => '',
    'animation_duration' => '',

), $atts ) );

// Declare variables
$unique_id = AdamasHelper::get_unique_id();
$width     = wpb_translateColumnWidthToSpan( $width );
$width     = vc_column_offset_class_merge( $offset, $width );

// Wrap ID
$wrap_id = AdamasHelper::get_html_id( $el_id );

// Wrap class
$wrap_class = array(
    'wpus-column',
    $width,
    $el_class,
    $animation_type,
);

// Wrap ID
$wrap_id = $el_id ? ' id="' . sanitize_html_class( $el_id ) . '"' : '';

// Wrap attributes
$wrap_attr = AdamasHelper::get_html_attributes( array(
    'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
    'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
) );

// Generate CSS style
if ( $build_css = AdamasHelper::get_vc_style( $css ) ) {
    $build_css = ".wpus-column.{$unique_id}{{$build_css}}";
    AdamasHelper::build_css( $build_css );
    $wrap_class[] = $unique_id;
}

// Get wrap class
$wrap_class = AdamasHelper::get_class( $wrap_class );
$css_class  = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $wrap_class, $this->settings['base'] );

// Shortcode
$output = '<div' . $wrap_id . ' class="' . $css_class . '"' . $wrap_attr . '>';
    $output .= '<div class="wpus-column-wrapper">';
        $output .= wpb_js_remove_wpautop( $content );
    $output .= '</div>';
$output .= '</div>';

// Echo shortcode
echo $output;