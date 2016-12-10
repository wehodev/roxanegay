<?php
/**
 * Shortcode: Shortcode
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_divider_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'type'                => 'type-simple',
        'margin_top_value'    => '',
        'margin_bottom_value' => '',
        'style'               => '',
        'width'               => '',
        'height'              => '',
        'color'               => '',
        'image_height'        => '',
        'image_opacity'       => '',
        'align'               => 'divider-center',
        'align_sm'            => '',
        'align_xs'            => '',
        
        // Title tab
        'title'               => 'Divider Title',
        'title_color'         => '',
        'title_typography'    => '',
        
        // Icon tab
        'icon_type'           => 'fontawesome',
        'icon_etline'         => 'etline-mobile',
        'icon_fontawesome'    => 'fa fa-info-circle',
        'icon_linecons'       => 'linecons-heart',
        'icon_color'          => '',
        'icon_size'           => '',
        
        // Animation tab
        'animation_type'      => '',
        'animation_delay'     => '',
        'animation_duration'  => '',
        
        // Extra tab
        'el_id'               => '',
        'el_class'            => '',
        'el_hidden'           => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $title_typography );

    // Declare variables
    $unique_id     = AdamasHelper::get_unique_id();
    $build_css     = '';
    $divider_title = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-divider',
        $type,
        $align,
        $align_sm,
        $align_xs,
        strpos( $style, 'ivider-' ) ? $style : '',
        $el_class,
        $el_hidden,
        $animation_type,
    );

    // Wrap attributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
        'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
    ) );

    // Style: Wrap
    $wrap_css = array(
        'width'         => $width,
        'margin_top'    => $margin_top_value,
        'margin_bottom' => $margin_bottom_value,
    );

    if ( $wrap_css = AdamasHelper::get_style( $wrap_css ) ) {
        $build_css .= ".wpus-divider.{$unique_id}{{$wrap_css}}";
    }

    // Style: Divider
    if ( strpos( $style, 'divider' ) ) {
        $divider_css = array(
            'height'  => $image_height,
            'opacity' => $image_opacity,
        );
    } else {
        $divider_css = array(
            'border_bottom_width' => $height,
            'border_bottom_style' => $style,
            'border_bottom_color' => $color,
        );
    }

    $divider_css = AdamasHelper::get_style( $divider_css );

    if ( 'type-simple' == $type && $divider_css ) {
        $build_css .= ".wpus-divider.{$unique_id} .wpus-divider-line{{$divider_css}}";
    }

    if ( 'type-simple' != $type && $divider_css ) {
        $build_css .= ".wpus-divider.{$unique_id} .wpus-divider-line:before,.wpus-divider.{$unique_id} .wpus-divider-line:after{{$divider_css}}";
    }

    // Style: Title
    if ( 'type-text' == $type ) {

        $title_css  = AdamasHelper::get_style( array(
            'color'      => $title_color,
            'typography' => $title_typography,
        ) );

        if ( $title_css ) {
            $build_css .= ".wpus-divider.{$unique_id} .wpus-divider-line{{$title_css}}";
        }
    }

    // Style: Icon
    if ( 'type-icon' == $type ) {

        $icon_css = AdamasHelper::get_style( array(
            'color'     => $icon_color,
            'font_size' => $icon_size,
        ) );

        if ( $icon_css ) {
            $build_css .= ".wpus-divider.{$unique_id} .wpus-divider-line{{$icon_css}}";
        }
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Title
    if ( 'type-text' == $type ) {
        $divider_title = $title;
    }

    // Icon
    elseif ( 'type-icon' == $type ) {
        switch ( $icon_type ) {
            case 'etline':
                wp_enqueue_style( 'etline' );
                $divider_title = '<i class="' . esc_attr( $icon_etline ) . '"></i>';
                break;
            case 'fontawesome':
                $divider_title = '<i class="' . esc_attr( $icon_fontawesome ) . '"></i>';
                break;
            case 'linecons':
                vc_icon_element_fonts_enqueue( 'linecons' );
                $divider_title = '<i class="' . esc_attr( $icon_linecons ) . '"></i>';
                break;
        }
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= '<span class="wpus-divider-line">' . AdamasHelper::do_kses( $divider_title ) . '</span>'; 
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_divider', 'adamas_divider_shortcode' );