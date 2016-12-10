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
    'el_class'           => '',
    
    // Design tab
    'css'                => '',
    
    // Responsive tab
    'width'              => '1/1',
    'offset'             => '',
    
), $atts ) );

// Declare variables
$unique_id = AdamasHelper::get_unique_id();
$width     = wpb_translateColumnWidthToSpan( $width );
$width     = vc_column_offset_class_merge( $offset, $width );

// Wrap class
$wrap_class = array(
    'wpus-column',
    $width,
    $el_class,
);

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
$output = '<div class="' . $css_class . '">';
    $output .= '<div class="wpus-column-wrapper">';
        $output .= wpb_js_remove_wpautop( $content );
    $output .= '</div>';
$output .= '</div>';

// Echo shortcode
echo $output;