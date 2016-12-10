<?php
/**
 * Shortcode: Instagram
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_instagram_shortcode( $atts, $content = null ) {

    // Extract shortcode attributes
    extract( shortcode_atts( array(

        // General tab
        'type'                          => 'wpus-carousel',
        'username'                      => '',
        'number'                        => '10',
        'lighbox'                       => 'false',
        
        // Setings tab
        'columns_lg'                    => '5',
        'columns_md'                    => '4',
        'columns_sm'                    => '3', 
        'columns_xs'                    => '2', 
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
        
        // Advanced tab
        'image_hover'                   => '',
        'icon_appearance'               => 'wpus-hover-show',
        'icon_color'                    => '',
        'overlay_appearance'            => 'wpus-hover-show',
        'overlay_type'                  => 'background',
        'overlay_color'                 => '',
        'overlay_top_color'             => '',
        'overlay_bottom_color'          => '',
        
        // Extend tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',
        
    ), $atts ) );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $overlay_html = $overlay_appearance ? '<span class="wpus-overlay ' . $overlay_appearance . '" data-type="' . $overlay_type . '"></span>' : '';
    $icon_html    = $icon_appearance    ? '<i class="adamas-icon-instagram ' . $icon_appearance . '"></i>' : '';
    $photos_html  = '';
    $build_css    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-instagram',
        $type,
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

    // Wrap atributes
    $wrap_attr = array(
        'column-lg' => $columns_lg,
        'column-md' => $columns_md,
        'column-sm' => $columns_sm,
        'column-xs' => $columns_xs,
    );

    if ( 'wpus-grid' == $type ) {
        $wrap_attr['margin-right']  = intval( $items_space );
        $wrap_attr['margin-bottom'] = intval( $items_space );
    } elseif ( 'wpus-carousel' == $type ) {
        $wrap_attr['margin']   = intval( $items_space );
        $wrap_attr['autoplay'] = $autoplay ? 'true' : 'false';
        $wrap_attr['timeout']  = $autoplay;
        $wrap_attr['loop']     = $inifnity_loop;
        $wrap_attr['arrows']   = $arrows;
        $wrap_attr['dots']     = $dots;
    }

    $wrap_attr = AdamasHelper::get_html_attributes( $wrap_attr );
    
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
        $build_css .= ".wpus-instagram.{$unique_id} .wpus-overlay{{$overlay_css}}";
    }

    // Style: Icon color
    if ( $icon_css = AdamasHelper::get_style( array( 'color' => $icon_color ) ) ) {
        $build_css .= ".wpus-instagram.{$unique_id} .adamas-icon-instagram{{$icon_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Get photos
    $instagram_array = adamas_get_instagram( $username, $number );

    if ( is_wp_error( $instagram_array ) ) {
        return $instagram_array->get_error_message();
    } 

    // Photos markup
    foreach ( $instagram_array as $item ) {
        if ( 'wpus-grid' == $type ) $photos_html .= '<div class="wpus-grid-item">';

            $photos_html .= '<figure class="wpus-rollover">';
                $photos_html .= '<a href="' . esc_url( 'true' == $lighbox ? $item['original'] : $item['url'] ) . '" target="_blank">';
                    $photos_html .= '<img src="' . esc_url( $item['large'] ) . '" data-hover="' . esc_attr( $image_hover ) . '" alt="' . esc_html( 'Instagram Image', 'wpus-core' ) . '" title="' . esc_html( 'Instagram Image', 'wpus-core' ) . '" />';
                    $photos_html .= $overlay_html;
                    $photos_html .= $icon_html;
                $photos_html .= '</a>';
            $photos_html .= '</figure>';

        if ( 'wpus-grid' == $type ) $photos_html .= '</div>';
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $photos_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_instagram', 'adamas_instagram_shortcode' );