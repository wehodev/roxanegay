<?php
/**
 * Shortcode: Icon
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_icon_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
       
        // General tab
        'icon_type'              => 'fontawesome',
        'icon_etline'            => 'etline-mobile',
        'icon_fontawesome'       => 'fa fa-info-circle',
        'icon_linecons'          => 'linecons-heart',
        'style'                  => 'style-bg',
        'icon_size'              => '',
        'icon_padding'           => '',
        'align'                  => '',
        'align_sm'               => '',
        'align_xs'               => '',
        
        // Link tab
        'link_type'              => '',
        'link'                   => '',
        'image_id'               => '',
        'youtube_url'            => '',
        'vimeo_url'              => '',
        
        // Style tab
        'color'                  => '',
        'hover_color'            => '',
        'background_color'       => '',
        'hover_background_color' => '',
        'border_style'           => '',
        'border_width'           => '',
        'border_color'           => '',
        'hover_border_color'     => '',
        'border_radius'          => '',
        'box_shadow'             => '',
        'hover_box_shadow'       => '',
        
        // Animation tab
        'animation_type'         => '',
        'animation_delay'        => '',
        'animation_duration'     => '',
        
        // Extra tab
        'el_id'                  => '',
        'el_class'               => '',
        'el_hidden'              => '',

    ), $atts ) );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';
    $link_html = '';
    $output    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-icon-wrap',
        $style,
        $el_class,
        $el_hidden,
        $animation_type,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Icon regular
    $regular_css = AdamasHelper::get_style( array(
        'color'            => $color,
        'font_size'        => $icon_size,
        'padding'          => $icon_padding,
        'border_style'     => $border_style,
        'border_width'     => $border_width,
        'border_color'     => $border_color,
        'border_radius'    => $border_radius,
        'background_color' => $background_color,
        'box_shadow'       => $box_shadow,
    ) );

    if ( $regular_css ) {
        $build_css .= ".wpus-icon-wrap.{$unique_id}{{$regular_css}}";
    }

    // Style: Icon hover
    $hover_css = AdamasHelper::get_style( array(
        'color'            => $hover_color,
        'border_color'     => $hover_border_color,
        'background_color' => $hover_background_color,
        'box_shadow'       => $hover_box_shadow,
    ) );

    if ( $hover_css ) {
        $build_css .= ".wpus-icon-wrap.{$unique_id}:hover{{$hover_css}}";
    }
    
    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Icon
    switch ( $icon_type ) {
        case 'etline':
            wp_enqueue_style( 'etline' );
            $icon = '<i class="' . esc_attr( $icon_etline ) . '"></i>';
            break;
        case 'fontawesome':
            $icon = '<i class="' . esc_attr( $icon_fontawesome ) . '"></i>';
            break;
        case 'linecons':
            vc_icon_element_fonts_enqueue( 'linecons' );
            $icon = '<i class="' . esc_attr( $icon_linecons ) . '"></i>';
            break;      
    }

    // Link
    switch ( $link_type ) {
        case 'link':
            $link_html = WpusVcHelper::build_link( $icon_link );
            break;
        case 'image':
            $image_large = wp_get_attachment_image_src( $image_id, 'full' );
            $link_html = '<a href="' . esc_url( $image_large[0] ) . '" class="wpus-lightbox"></a>';
            break;
        case 'youtube':
            $link_html = '<a href="' . esc_url( $youtube_url ). '" class="mfp-iframe wpus-lightbox" data-type="iframe"></a>';
            break;
        case 'vimeo':
            $link_html = '<a href="' . esc_url( $vimeo_url ). '" class="mfp-iframe wpus-lightbox" data-type="iframe"></a>';
            break;
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    if ( $align || $align_sm || $align_xs ) {
        $output .= '<div' . AdamasHelper::get_html_class( array( $align, $align_sm, $align_xs ) ) . '>';
    }

        $output .= '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
            $output .= $icon . $link_html;
        $output .= '</div>'; 

    if ( $align || $align_sm || $align_xs ) {
        $output .= '</div>';
    }
    
    // Return shortcode
    return $output;

}

add_shortcode( 'wpus_icon', 'adamas_icon_shortcode' );