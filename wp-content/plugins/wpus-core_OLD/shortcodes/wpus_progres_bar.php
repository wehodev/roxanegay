<?php
/**
 * Shortcode: Progress Bar
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_progres_bar_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'style'               => 'text-top',
        'values'              => urlencode( json_encode( array( array( 'title' => __( 'Development', 'wpus-core' ), 'value' => '90' ), array( 'title' => __( 'Design', 'wpus-core' ), 'value' => '80'), array( 'title' => __( 'Marketing', 'wpus-core' ), 'value' => '70' ) ) ) ),
        'space'               => '',
        'options'             => 'animate_width,stripes,animate_stripes',
        
        // Bar style tab
        'active_background'   => '',
        'inactive_background' => '',
        'bar_height'          => '',
        
        // Title style tab
        'title_color'         => '',
        'title_typography'    => '',
        
        // Design tab
        'css'                 => '',
        
        // Extra tab
        'el_id'               => '',
        'el_class'            => '',
        'el_hidden'           => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $title_typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $values    = ( array ) vc_param_group_parse_atts( $values );
    $options   = explode( ',', $options );
    $bar_data  = in_array( 'animate_width', $options ) ? '' : '-css';
    $build_css = '';
    $bar_html  = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-progress-bar-wrap',
        $style,
        in_array( 'stripes', $options ) ? 'stripes' : '',
        in_array( 'animate_stripes', $options ) ? 'animated-stripes' : '',
        $el_class,
        $el_hidden,
    );

    // Style: Wrap
    $wrap_css  = AdamasHelper::get_vc_style( $css );
    $wrap_css .= AdamasHelper::get_style( array(
        'color'      => $title_color,
        'typography' => $title_typography,
    ) );

    if ( $wrap_css ) {
        $build_css .= ".wpus-progress-bar-wrap.{$unique_id}{{$wrap_css}}";
    }

    // Style: Bar space
    if ( $bar_space_css = AdamasHelper::get_style( array( 'margin_bottom' => $space ) ) ) {
        $build_css .= ".wpus-progress-bar-wrap.{$unique_id} .wpus-progress-bar:not(:last-child){{$bar_space_css}}";
    }

    // Style: Active bar
    if ( $active_bar_css = AdamasHelper::get_style( array( 'background_color' => $active_background ) ) ) {
        $build_css .= ".wpus-progress-bar-wrap.{$unique_id} .wpus-bar-active{{$active_bar_css}}";
    }

    // Style: Inactive bar
    $inactive_bar_css = AdamasHelper::get_style( array( 
        'height'           => $bar_height,
        'background_color' => $inactive_background,
    ) );

    if ( $inactive_bar_css ) {
        $build_css .=".wpus-progress-bar-wrap.{$unique_id} .wpus-bar-inactive{{$inactive_bar_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Generate progress bar
    foreach ( $values as $key => $value ) {

        // Set up the default form values
        $defaults = array(
            'title'               => 'Set title!',
            'value'               => '90',
            'title_color'         => '',
            'active_background'   => '',
            'inactive_background' => '',
        );
        
        // Merge the user-selected arguments with the defaults
        $value = wp_parse_args( $value, $defaults );

        // Title color
        $title_style = '';
        if ( $value['title_color'] ) {
            $title_style = ' style="color:' . esc_attr( $value['title_color'] ) . '" ';
        }

        // Active bar background color
        $active_bar_style = '';
        if ( $value['active_background'] ) {
            $active_bar_style = ' style="background-color:' . esc_attr( $value['active_background'] ) . '" ';
        }

        // Inactive bar background color
        $inactive_bar_style = '';
        if ( $value['inactive_background'] ) {
            $inactive_bar_style = ' style="background-color:' . esc_attr( $value['inactive_background'] ) . '" ';
        }

        // Title
        $bar_title = '<p' . $title_style . '>' . esc_html( $value['title'] ) . '<span>' . absint( $value['value'] ) . '%</span></p>';

        // Generate bar
        $bar_html .= '<div class="wpus-progress-bar">';
            $bar_html .= 'text-top' == $style ? $bar_title : '';
            $bar_html .= '<div class="wpus-bar-inactive"' . $inactive_bar_style . '>';
                $bar_html .= '<div class="wpus-bar-active" data-width' . esc_attr( $bar_data ) . '="' . absint( $value['value'] ) . '"' . $active_bar_style . '></div>';
                $bar_html .= 'text-inside' == $style ? $bar_title : '';
            $bar_html .= '</div>';
            $bar_html .= 'text-bottom' == $style ? $bar_title : '';
        $bar_html .= '</div>';

    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );
    
    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . '>';
        $output .= $bar_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_progres_bar', 'adamas_progres_bar_shortcode' );