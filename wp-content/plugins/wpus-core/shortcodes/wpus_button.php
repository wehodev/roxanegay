<?php
/**
 * Shortcode: Button
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_button_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'style'                  => 'style-bg',
        'title'                  => 'Button', 
        'link_type'              => 'link',
        'link'                   => '',
        'image_id'               => '',
        'youtube_url'            => '',
        'vimeo_url'              => '',
        'size'                   => '',
        'height'                 => '',
        'align'                  => '',
        'align_sm'               => '',
        'align_xs'               => '',
        
        // Icon tab
        'icon_type'              => '',
        'icon_etline'            => 'etline-mobile',
        'icon_fontawesome'       => 'fa fa-info-circle',
        'icon_linecons'          => 'linecons-heart',
        'icon_position'          => 'right',
        
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
        'typography'             => '',
        
        // Animation tab
        'animation_type'         => '',
        'animation_delay'        => '',
        'animation_duration'     => '',
        
        // Extra tab
        'el_id'                  => '',
        'el_class'               => '',
        'el_hidden'              => '',

    ), $atts ) );

    // Enqueue
    WpusVcHelper::get_google_font( $typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $icon      = '';
    $build_css = '';
    $output    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-button',
        $style,
        $size,
        $el_class,
        $el_hidden,
        $animation_type,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Button regular
    $regular_css = AdamasHelper::get_style( array(
        'color'            => $color,
        'border_style'     => $border_style,
        'border_width'     => $border_width,
        'border_color'     => $border_color,
        'border_radius'    => $border_radius,
        'background_color' => $background_color,
        'box_shadow'       => $box_shadow,
        'height'           => $height,
        'line_height'      => $height,
        'typography'       => $typography
    ) );

    if ( $regular_css ) {
        $build_css .= ".wpus-button.{$unique_id}{{$regular_css}}";
    }

    // Style: Button hover
    $hover_css = AdamasHelper::get_style( array(
        'color'            => $hover_color,
        'border_color'     => $hover_border_color,
        'background_color' => $hover_background_color,
        'box_shadow'       => $hover_box_shadow,
    ) );

    if ( $hover_css ) {
        $build_css .= ".wpus-button.{$unique_id}:hover{{$hover_css}}";
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

    // Parse link
    $link     = ( '||' === $link ) ? '' : $link;
    $link     = vc_build_link( $link );
    $a_href   = $link['url']    ? $link['url'] : '#';
    $a_title  = $link['title']  ? ' target="' . esc_attr( trim( $a_target ) ) . '"' : '';
    $a_target = $link['target'] ? ' title="' . esc_attr( $a_title ) . '"' : '';

    // Link
    switch ( $link_type ) {
        case 'image':
            $image_large  = wp_get_attachment_image_src( $image_id, 'full' );
            $a_href       = $image_large[0];
            $wrap_class[] = 'wpus-lightbox';
            break;
        case 'youtube':
            $a_href       = $youtube_url;
            $wrap_attr   .= ' data-type="iframe"';
            $wrap_class[] = 'mfp-iframe wpus-lightbox';
            break;
        case 'vimeo':
            $a_href       = $vimeo_url;
            $wrap_attr   .= ' data-type="iframe"';
            $wrap_class[] = 'mfp-iframe wpus-lightbox';
            break;
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    if ( $align || $align_sm || $align_xs ) {
        $output .= '<div' . AdamasHelper::get_html_class( array( $align, $align_sm, $align_xs ) ) . '>';
    }

        $output .= '<a' . $wrap_id . ' href="' .  esc_url( $a_href )  . '"' . $wrap_class . $a_target . $a_title . $wrap_attr . '>';
            if ( 'left' == $icon_position ) $output .= $icon;
                $output .= '<span>' . esc_html( $title ) . '</span>';
            if ( 'right' == $icon_position ) $output .= $icon;
        $output .= '</a>';

    if ( $align || $align_sm || $align_xs ) {
        $output .= '</div>';
    }

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_button', 'adamas_button_shortcode' );