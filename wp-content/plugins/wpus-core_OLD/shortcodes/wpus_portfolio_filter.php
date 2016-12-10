<?php
/**
 * Shortcode: Portfolio Filter
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_portfolio_filter_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        'include_cat'            => '',
        'exclude_cat'            => '',
        'align'                  => '',
        'text'                   => __( 'All', 'wpus-core' ),
        'margin_bottom'          => '',
        'style'                  => 'style-minimal',
        'color'                  => '',
        'hover_color'            => '',
        'background_color'       => '',
        'hover_background_color' => '',
        'border_style'           => '',
        'border_width'           => '',
        'border_color'           => '',
        'hover_border_color'     => '',
        'border_radius'          => '',
        'typography'             => '',
        'el_class'               => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $typography );

    // Declare variables
    $unique_id   = AdamasHelper::get_unique_id();
    $filter_args = array();
    $build_css   = '';

    // Wrap class
    $wrap_class = array(
        'wpus-filter',
        $style,
        $align,
        $el_class,
    );

    // Style: Wrap margin
    if ( $margin_bottom ) {
        $build_css .= ".wpus-filter.{$unique_id}{margin-bottom:{$margin_bottom}}";     
    }

    // Style: Regular
    $regular_css = AdamasHelper::get_style( array(
        'color'            => $color,
        'border_color'     => $border_color,
        'border_width'     => $border_width,
        'border_style'     => $border_style,
        'border_radius'    => $border_radius,
        'background_color' => $background_color,
        'typography'       => $typography,
    ) );

    if ( $regular_css ) {
        $build_css .= ".wpus-filter.{$unique_id} a{{$regular_css}}";
    }

    // Style: Hover
    $hover_css = AdamasHelper::get_style( array(
        'color'            => $hover_color,
        'background_color' => $hover_background_color,
    ) );

    if ( $hover_css ) {
        $build_css .= ".wpus-filter.{$unique_id} a:hover, .wpus-filter.{$unique_id} a.active{{$hover_css}}";
    }
    
    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Get Categories
    if ( $include_cat ) {
        $filter_cat = explode( ',', $include_cat );
        $filter_args['include'] = $filter_cat;
    } 

    if ( $exclude_cat ) {
        $filter_cat = explode( ',', $exclude_cat );
        $filter_args['exclude'] = $filter_cat;
    }

    $filter_categories = get_terms( 'portfolio_category', $filter_args );

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<nav' . $wrap_class . '>';
        $output .= '<div class="container">';
            $output .= '<ul>';

                $output .= '<li><a class="active" data-filter="*" href="#">' . esc_html( $text ) . '</a></li>';
                
                foreach ( $filter_categories as $category ) :
                    $output .= '<li><a href="#" data-filter=".' . esc_html( $category->slug ) . '">';
                        $output .= esc_html( $category->name );
                    $output .= '</a></li>';
                endforeach;

            $output .= '</ul>';
        $output .= '</div>';
    $output .= '</nav>';

    // Return shortcode
    return $output;

}

add_shortcode( 'wpus_portfolio_filter', 'adamas_portfolio_filter_shortcode' );