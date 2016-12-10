<?php
/**
 * Shortcode: Image Carousel
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_image_carousel_shortcode( $atts ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        
        // General tab
        'images_ids'                    => '',
        'images_ids2'                   => '',
        'image_size'                    => 'adamas-image-horizontal',
        'image_width'                   => '',
        'image_height'                  => '',
        'lighbox'                       => 'false',
        
        // Setings tab
        'columns_lg'                    => '4',
        'columns_md'                    => '3',
        'columns_sm'                    => '2', 
        'columns_xs'                    => '1', 
        'items_space'                   => '',
        'autoplay'                      => '',
        'inifnity_loop'                 => 'false',
        'arrows'                        => 'true',
        'arrows_space'                  => '',
        'arrows_appearance'             => '',
        'arrows_style'                  => 'arrows-outline',
        'arrows_border_radius'          => '',
        'arrows_color'                  => '',
        'arrows_hover_color'            => '',
        'arrows_background_color'       => '',
        'arrows_hover_background_color' => '',
        'arrows_border_style'           => '',
        'arrows_border_width'           => '',
        'arrows_border_color'           => '',
        'arrows_hover_border_color'     => '',
        'arrows_hidden'                 => '',
        'dots'                          => 'false',
        'dots_position'                 => '',
        'dots_space'                    => '',
        'dots_appearance'               => '',
        'dots_color'                    => '',
        'dots_hidden'                   => '',
        
        // Caption tab
        'caption'                       => '',
        'caption_appearance'            => 'wpus-hover-show',
        'caption_position'              => 'wpus-position-cc',
        'caption_align'                 => '',
        'caption_color'                 => '',
        'caption_typography'            => '',
        
        // Advanced tab
        'image_hover'                   => '',
        'icon_appearance'               => 'wpus-always-show',
        'icon_color'                    => '',
        'overlay_appearance'            => '',
        'overlay_type'                  => 'background',
        'overlay_color'                 => '',
        'overlay_top_color'             => '',
        'overlay_bottom_color'          => '',
        
        // Extra tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',
        
    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $caption_typography );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $images_ids   = explode( ',', $images_ids );
    $images_ids2  = explode( ',', $images_ids2 );
    $img_size     = WpusVcHelper::get_image_size( $image_size, $image_width, $image_height );
    $overlay      = $overlay_appearance ? '<span class="wpus-overlay ' . $overlay_appearance . '" data-type="' . $overlay_type . '"></span>' : '';
    $caption_html = '';
    $build_css    = '';
    $image_html   = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-image-carousel',
        'wpus-carousel',
        'true' == $lighbox ? 'wpus-gallery-lightbox' : '',
        'true' == $arrows  ? $arrows_style : '',
        $arrows_appearance,
        $dots_position,
        $dots_appearance,
        $el_class,
        $el_hidden,
        $dots_hidden,
        $arrows_hidden,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'column-lg' => $columns_lg,
        'column-md' => $columns_md,
        'column-sm' => $columns_sm,
        'column-xs' => $columns_xs,
        'margin'    => intval( $items_space ),
        'autoplay'  => $autoplay ? 'true' : 'false',
        'timeout'   => $autoplay,
        'loop'      => $inifnity_loop,
        'arrows'    => $arrows,
        'dots'      => $dots,
    ) );

    // Style: Caption
    $caption_css = AdamasHelper::get_style( array(
        'color'      => $caption_color,
        'typography' => $caption_typography,
    ) );

    if ( $caption_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .wpus-figure-caption{{$caption_css}}";
    }

    // Style: Arrows regular
    $arrows_regular_css = AdamasHelper::get_style( array(
        'color'            => $arrows_color,
        'border_color'     => $arrows_border_color,
        'background_color' => $arrows_background_color,
        'border_radius'    => $arrows_border_radius,
        'border_style'     => $arrows_border_style,
        'border_width'     => $arrows_border_width,
    ) );

    if ( $arrows_regular_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-nav div{{$arrows_regular_css}}";
    }

    // Style: Arrows hover
    $arrows_hover_css = AdamasHelper::get_style( array(
        'color'            => $arrows_hover_color,
        'border_color'     => $arrows_hover_border_color,
        'background_color' => $arrows_hover_background_color,
    ) );

    if ( $arrows_hover_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-nav div:hover{{$arrows_hover_css}}";
    }

    // Style: Arrows space
    if ( $arrows_space ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-prev{left:" . intval( $arrows_space ) . "px;}";
        $build_css .= ".wpus-carousel.{$unique_id} .owl-next{right:" . intval( $arrows_space ) . "px;}";
    }

    // Style: Dots color
    if ( $dots_color ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dot span{border-color:" . AdamasHelper::hex2rgba( $dots_color, '0.4' ) . "}";
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dot.active span,.wpus-carousel.{$unique_id} .owl-dot:hover span{background-color:{$dots_color}}";
    }

    // Style: Dots space
    if ( 'dots-inside' == $dots_position && $dots_space ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dots{bottom:" . intval( $dots_space ) . "px;}";
    }

    if ( '' == $dots_position && $dots_space ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dots{margin-top:" . intval( $dots_space ) . "px;}";
    }

    // Style: Overlay color
    $overlay_css = AdamasHelper::get_style( array(
        'background_color' => $overlay_color,
        'gradient'         => $overlay_top_color . '|' . $overlay_bottom_color,
    ) );

    if ( $overlay_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .wpus-overlay{{$overlay_css}}";
    }

    // Overlay style
    $overlay_css = AdamasHelper::get_style( array(
        'background_color' => $overlay_color,
        'gradient'   => $overlay_top_color . '|' . $overlay_bottom_color,
    ) );

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Generate images
    $i = 0;
    if ( is_array( $images_ids ) && ! empty( $images_ids ) ) :
        foreach ( $images_ids as $image_id ) {

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

            $image_src  = wp_get_attachment_image( $image_id, $img_size, false, array( 'data-hover' => $image_hover ) );

            $image_src2 = '';
            if ( isset( $images_ids2[$i] ) ) {
                $image_src2 = wp_get_attachment_image( $images_ids2[$i], $img_size, false, array( 'data-hover' => WpusVcHelper::get_hover_image_class( $image_hover ), 'data-class' => 'image-hover' ) );
            }
            
            $image_src  = $image_src . $image_src2 . $overlay;

            if ( $caption_html && 'title-overlay' == $caption ) {
                $image_src .= $caption_html; 
            }

            if ( 'true' == $lighbox ) {
                $large_image = wp_get_attachment_image_src( $image_id, 'large' );
                $img_html = '<a href="' . esc_url( $large_image[0] ) . '" class="wpus-image">';
                    $img_html .= $image_src;
                $img_html .='</a>';
            } else {
                $img_html = '<div class="wpus-image">' . $image_src . '</div>';
            }

            $image_html .= '<figure class="wpus-figure wpus-rollover">';
                $image_html .= $img_html;
                if ( $caption_html && 'title-under' == $caption ) $image_html .= $caption_html;
            $image_html .= '</figure>';

            $i++;
        }
    endif;

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $image_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_image_carousel', 'adamas_image_carousel_shortcode' );