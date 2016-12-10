<?php
/**
 * Shortcode: Gallery
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_gallery_shortcode( $atts ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'type'                 => 'wpus-grid',
        'masonry_style'        => 'style-1',
        'images_ids'           => '',
        'images_ids2'          => '',
        'image_size'           => 'adamas-image-square',
        'image_width'          => '',
        'image_height'         => '',
        'lighbox'              => 'false',
        
        // Setings tab
        'columns_lg'           => '4',
        'columns_md'           => '3',
        'columns_sm'           => '2', 
        'columns_xs'           => '1', 
        'items_space'          => '',

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
        
        // Extra tab
        'el_id'                => '',
        'el_class'             => '',
        'el_hidden'            => '',

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
        'wpus-gallery',
        'wpus-grid',
        'true' == $lighbox ? 'wpus-gallery-lightbox' : '',
        $el_class,
        $el_hidden,
    );

    // Wrap attributes
    $wrap_attr= AdamasHelper::get_html_attributes( array(
        'column-lg'     => $columns_lg,
        'column-md'     => $columns_md,
        'column-sm'     => $columns_sm,
        'column-xs'     => $columns_xs,
        'margin-right'  => intval( $items_space ),
        'margin-bottom' => intval( $items_space ),
        'layout'        => 'wpus-masonry' == $type ? 'packery' : '',
    ) );

    // Style: Caption
    $caption_css = AdamasHelper::get_style( array(
        'color'      => $caption_color,
        'typography' => $caption_typography,
    ) );

    if ( $caption_css ) {
        $build_css .= ".wpus-gallery.{$unique_id} .wpus-figure-caption{{$caption_css}}";
    }

    // Style: Overlay color
    $overlay_css = AdamasHelper::get_style( array(
        'background_color' => $overlay_color,
        'gradient'         => $overlay_top_color . '|' . $overlay_bottom_color,
    ) );

    if ( $overlay_css ) {
        $build_css .= ".wpus-gallery.{$unique_id} .wpus-overlay{{$overlay_css}}";
    }

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

            // Get image
            if ( 'wpus-masonry' == $type ) {
                $image_bg  = wp_get_attachment_url( $image_id );
                $image_src = '<span class="image-background" data-hover="' . $image_hover . '" style="background-image:url(' . esc_url( $image_bg ) . ')"></span>';
            } else {
                $image_src = wp_get_attachment_image( $image_id, $img_size, false, array( 'data-hover' => $image_hover ) );
            }

            // Get hover image
            $image_src2 = '';
            if ( 'wpus-masonry' == $type && isset( $images_ids2[$i] ) ) {
                $image_hover_bg  = wp_get_attachment_url( $images_ids2[$i] );
                $image_src2 = '<span class="image-background" data-class="image-hover" data-hover="' . WpusVcHelper::get_hover_image_class( $image_hover ) . '" style="background-image:url(' . esc_url( $image_hover_bg ) . ')"></span>';
            } elseif ( $type != 'wpus-masonry' && isset($images_ids2[$i]) ) {
                $image_src2 = wp_get_attachment_image( $images_ids2[$i], $img_size, false, array( 'data-hover' => WpusVcHelper::get_hover_image_class( $image_hover ), 'data-class' => 'image-hover' ) );
            }

            $image_src = $image_src . $image_src2 . $overlay;

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

            // Image size
            $i++;
            $imagesize = '';
            if ( 'wpus-masonry' == $type ) {
                $imagesize = WpusVcHelper::get_masonry_size( $i, $masonry_style );
            }

            // Build image
            $image_html .= '<div class="wpus-grid-item ' . $imagesize . '">';
                $image_html .= '<figure class="wpus-figure wpus-rollover">';
                    $image_html .= $img_html;
                    if ( $caption_html && 'title-under' == $caption ) $image_html .= $caption_html;
                $image_html .= '</figure>';
            $image_html .= '</div>';

            
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

add_shortcode( 'wpus_gallery', 'adamas_gallery_shortcode' );