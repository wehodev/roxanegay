<?php
/**
 * Shortcode: Counter
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_counter_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        
        // General tab
        'value'        => '2016',
        'prefix'       => '',
        'suffix'       => '',
        'tag'          => 'h3', 
        'align'        => '',
        'align_sm'     => '',
        'align_xs'     => '',
        
        // Style tab
        'value_color'  => '',
        'prefix_color' => '',
        'suffix_color' => '',
        'typography'   => '',
        
        // Design tab
        'css'          => '',
        
        // Extra tab
        'el_id'        => '',
        'el_class'     => '',
        'el_hidden'    => '',

    ), $atts ) );
    
    // Enqueue scripts
    WpusVcHelper::get_google_font( $typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-counter',
        $align,
        $align_sm,
        $align_xs,
        $el_class,
        $el_hidden,
    );

    // Style: Wrap
    if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
        $build_css .= ".wpus-counter.{$unique_id}{{$wrap_css}}";
    }

   // Style: Value
    $value_css = AdamasHelper::get_style( array(
        'color'      => $value_color,
        'typography' => $typography,
    ) );

    if ( $value_css ) {
        $build_css .= ".wpus-counter.{$unique_id} {$tag}{{$value_css}}";
    }

    // Style: Prefix
    if ( $prefix_css = AdamasHelper::get_style( array( 'color' => $prefix_color ) ) ) {
        $build_css .= ".wpus-counter.{$unique_id} .wpus-counter-prefix{{$prefix_css}}";
    }

    // Style: Suffix
    if ( $suffix_css = AdamasHelper::get_style( array( 'color' => $suffix_color ) ) ) {
        $build_css .= ".wpus-counter.{$unique_id} .wpus-counter-suffix{{$suffix_css}}";
    }

    // Generate CSS Style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . '>';
        $output .= '<' . esc_attr( $tag ) . '>';
            if ( $prefix ) $output .= '<span class="wpus-counter-prefix">' . esc_html( $prefix ) . '</span>';
            $output .= '<span class="wpus-counter-value">' . esc_html( $value ) . '</span>';
            if ( $suffix ) $output .= '<span class="wpus-counter-suffix">' . esc_html( $suffix ) . '</span>';
        $output .= '</' . esc_attr( $tag ) . '>';
    $output .=  '</div>';

    // Return shortcode
    return $output;

}

add_shortcode( 'wpus_counter', 'adamas_counter_shortcode' );