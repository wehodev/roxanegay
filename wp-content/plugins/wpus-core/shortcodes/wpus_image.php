<?php
/**
 * Shortcode: Image
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_image_shortcode( $atts ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'image_id'             => '',
        'image_id2'            => '',
        'image_size'           => 'thumbnail',
        'image_width'          => '',
        'image_height'         => '',
        'action'               => '',
        'youtube_url'          => '',
        'vimeo_url'            => '',
        'link'                 => '',
        'align'                => '',
        'align_sm'             => '',
        'align_xs'             => '',
        
        // Caption tab
        'caption'              => '',
        'caption_appearance'   => 'wpus-hover-show',
        'caption_position'     => 'wpus-position-cc',
        'caption_align'        => '',
        'caption_color'        => '',
        'caption_typography'   => '',
        
        // Advanced tab
        'image_hover'          => '',
        'icon_appearance'      => 'wpus-always-show',
        'icon_color'           => '',
        'overlay_appearance'   => '',
        'overlay_type'         => 'background',
        'overlay_color'        => '',
        'overlay_top_color'    => '',
        'overlay_bottom_color' => '',
        
        // Design tab
        'css'                  => '',
        'box_shadow'           => '',
        'hover_box_shadow'     => '',
        
        // Animation tab
        'animation_type'       => '',
        'animation_delay'      => '',
        'animation_duration'   => '',
        
        // Extra tab
        'el_id'                => '',
        'el_class'             => '',
        'el_hidden'            => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $caption_typography );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $img_size     = WpusVcHelper::get_image_size( $image_size, $image_width, $image_height );
    $overlay      = $overlay_appearance ? '<span class="wpus-overlay ' . $overlay_appearance . '" data-type="' . $overlay_type . '"></span>' : '';
    $icon         = $icon_appearance    ? '<i class="adamas-icon-play ' . $icon_appearance . '"></i>' : '';
    $icon_html    = '';
    $caption_html = '';
    $build_css    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-single-image',
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

    // Style: Wrap regular
    $wrap_css  = AdamasHelper::get_vc_style( $css );
    $wrap_css .= AdamasHelper::get_style( array( 'box_shadow' => $box_shadow ) );

    if ( $wrap_css ) {
        $build_css .= ".wpus-single-image.{$unique_id} .wpus-figure{{$wrap_css}}";
    }

    // Style: Wrap hover
    if ( $wrap_hover_css = AdamasHelper::get_style( array( 'box_shadow' => $hover_box_shadow ) ) ) {
        $build_css .= ".wpus-single-image.{$unique_id} .wpus-figure:hover{{$wrap_hover_css}}";
    }

    // Style: Caption
    $caption_css = AdamasHelper::get_style( array(
        'color'      => $caption_color,
        'typography' => $caption_typography,
    ) );

    if ( $caption_css ) {
        $build_css .= ".wpus-single-image.{$unique_id} .wpus-figure-caption{{$caption_css}}";
    }

    // Style: Overlay color
    $overlay_css = AdamasHelper::get_style( array(
        'background_color' => $overlay_color,
        'gradient'         => $overlay_top_color . '|' . $overlay_bottom_color,
    ) );

    if ( $overlay_css ) {
        $build_css .= ".wpus-single-image.{$unique_id} .wpus-overlay{{$overlay_css}}";
    }

    // Style: Icon color
    if ( $icon_css = AdamasHelper::get_style( array( 'color' => $icon_color ) ) ) {
        $build_css .= ".wpus-single-image.{$unique_id} .adamas-icon-play{{$icon_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Image caption
    if ( $caption && get_post( $image_id )->post_excerpt ) {

        $caption_class = AdamasHelper::get_html_class( array(
            'wpus-figure-caption',
            $caption,
            'title-overlay' == $caption ? $caption_appearance : '',
            'title-overlay' == $caption ? $caption_position : '',
            $caption_align,
        ) );

        $caption_html = '<figcaption' . $caption_class . '>';
            $caption_html .= esc_html( get_post( $image_id )->post_excerpt );
        $caption_html .= '</figcaption>';
    }

    // Image video icon
    if ( ( ! $caption_html || 'title-under' == $caption_html ) && ( 'youtube' == $action || 'vimeo' == $action ) ) {
        $icon_html = $icon;
    }

    // Get image
    $image_src  = wp_get_attachment_image( $image_id,  $img_size, false, array( 'data-hover' => $image_hover ) );
    $image_src2 = wp_get_attachment_image( $image_id2, $img_size, false, array( 'data-hover' => WpusVcHelper::get_hover_image_class( $image_hover ), 'data-class' => 'image-hover' ) );
    $image_src  = $image_src . $image_src2 . $overlay . $icon_html;

    if ( $caption_html && 'title-overlay' == $caption ) {
        $image_src .= $caption_html; 
    }

    // Build link
    switch ( $action ) {
        case 'url':
            $image_html = WpusVcHelper::build_link( $link, $image_src, 'wpus-image' );
            break;
        case 'lightbox':
            $image_large = wp_get_attachment_image_src( $image_id, 'full' );
            $image_html = '<a href="' . esc_url( $image_large[0] ) . '" class="wpus-image wpus-lightbox">' . $image_src . '</a>';
            break;
        case 'youtube':
            $image_html = '<a href="' . esc_url( $youtube_url ). '" class="wpus-image mfp-iframe wpus-lightbox" data-type="iframe">' . $image_src . '</a>';
            break;
        case 'vimeo':
            $image_html = '<a href="' . esc_url( $vimeo_url ). '" class="wpus-image mfp-iframe wpus-lightbox" data-type="iframe">' . $image_src . '</a>';
            break;
        default:
            $image_html = '<div class="wpus-image">' . $image_src . '</div>';
            break;
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= '<figure class="wpus-figure wpus-rollover">';
            $output .= $image_html;
            if ( $caption_html && 'title-under' == $caption ) $output .= $caption_html;
        $output .= '</figure>';
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_image', 'adamas_image_shortcode' );