<?php
/**
 * Shortcode: Flip Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_flip_box_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        
        // Front tab
        'icon_type'                    => '',
        'icon_etline'                  => 'etline-mobile',
        'icon_fontawesome'             => 'fa fa-info-circle',
        'icon_linecons'                => 'linecons-heart',
        'front_icon_size'              => '', 
        'front_title'                  => '',
        'front_subtitle'               => '',
        
        // Back tab
        'back_title'                   => '',
        'back_content'                 => '',
        'back_link'                    => '',
        'back_button_text'             => 'Button',
        
        // Front style tab
        'front_icon_color'             => '',
        'front_title_color'            => '',
        'front_subtitle_color'         => '',
        'front_background_color'       => '',
        'front_border_style'           => '',
        'front_border_width'           => '',
        'front_border_color'           => '',
        'front_title_typography'       => '',
        'front_subtitle_typography'    => '',
        
        // Back style tab
        'back_title_color'             => '',
        'back_content_color'           => '',
        'back_button_color'            => '',
        'back_button_background_color' => '',
        'back_background_color'        => '',
        'back_border_style'            => '',
        'back_border_width'            => '',
        'back_border_color'            => '',
        'back_title_typography'        => '',
        'back_content_typography'      => '',
        'back_button_typography'       => '',
        
        // Extra tab
        'el_id'                        => '',
        'el_class'                     => '',
        'el_hidden'                    => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $front_title_typography );
    WpusVcHelper::get_google_font( $front_subtitle_typography );
    WpusVcHelper::get_google_font( $back_title_typography );
    WpusVcHelper::get_google_font( $back_content_typography );
    WpusVcHelper::get_google_font( $back_button_typography );

    // Declare variables
    $unique_id   = AdamasHelper::get_unique_id();
    $build_css   = '';
    $html_button = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-flip-box',
        $el_class,
        $el_hidden,
    );

    // Style: Front wrap
    $front_wrap_css = AdamasHelper::get_style( array(
        'border_style'     => $front_border_style,
        'border_width'     => $front_border_width,
        'border_color'     => $front_border_color,
        'background_color' => $front_background_color,
    ) );

    if ( $front_wrap_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-front{{$front_wrap_css}}";
    }

    // Style: Front icon
    $front_icon_css = AdamasHelper::get_style( array(
        'color'     => $front_icon_color,
        'font_size' => $front_icon_size,
    ) );

    if ( $front_icon_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-front i{{$front_icon_css}}";
    }

    // Style: Front title
    $front_title_css  = AdamasHelper::get_style( array(
        'color'      => $front_title_color,
        'typography' => $front_title_typography,
    ) );

    if ( $front_title_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-front h5{{$front_title_css}}";
    }

    // Style: Front subtitle
    $front_subtitle_css  = AdamasHelper::get_style( array(
        'color'      => $front_subtitle_color,
        'typography' => $front_subtitle_typography,
    ) );

    if ( $front_subtitle_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-front p{{$front_subtitle_css}}";
    }

    // Style: Back arap
    $back_wrap_css = AdamasHelper::get_style( array(
        'border_style'     => $back_border_style,
        'border_width'     => $back_border_width,
        'border_color'     => $back_border_color,
        'background_color' => $back_background_color,
    ) );

    if ( $back_wrap_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-back{{$back_wrap_css}}";
    }

    // Style: Back title
    $back_title_css  = AdamasHelper::get_style( array(
        'color'      => $back_title_color,
        'typography' => $back_title_typography,
    ) );

    if ( $back_title_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-back h5{{$back_title_css}}";
    }

    // Style: Back subtitle
    $back_content_css = AdamasHelper::get_style( array(
        'color'      => $back_content_color,
        'typography' => $back_content_typography,
    ) );

    if ( $back_content_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-flip-box-back p{{$back_content_css}}";
    }

    // Style: Back button
    $back_button_css = AdamasHelper::get_style( array(
        'background_color' => $back_button_background_color,
        'color'            => $back_button_color,
        'typography'       => $back_button_typography,
    ) );

    if ( $back_button_css ) {
        $build_css .= ".wpus-flip-box.{$unique_id} .wpus-button.style-bg,.wpus-flip-box.{$unique_id} .wpus-button.style-bg:hover{{$back_button_css}}";
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
        default:
            $icon = '';
            break;
    }

    // Parse link
    $link     = ( '||' === $back_link ) ? '' : $back_link;
    $link     = vc_build_link( $link );
    $a_href   = $link['url']    ? $link['url'] : '#';
    $a_title  = $link['title']  ? ' target="' . esc_attr( trim( $a_target ) ) . '"' : '';
    $a_target = $link['target'] ? ' title="' . esc_attr( $a_title ) . '"' : '';

    if ( $back_button_text ) {
        $html_button = '<a href="' .  esc_url( $a_href )  . '" class="wpus-button style-bg"' . $a_target . $a_title . '>' . esc_html( $back_button_text ) . '</a>';
    }

    // Front content
    $front_html  = '<div class="wpus-flip-box-front">';
        $front_html  .= '<div class="wpus-v-align">';
            $front_html .= $icon ? $icon : '';
            $front_html .= $front_title ? '<h5>' . esc_html( $front_title ) . '</h5>' : '';
            $front_html .= $front_subtitle ? '<p>' . esc_html( $front_subtitle ) . '</p>' : '';
        $front_html .= '</div>';
    $front_html .= '</div>';

    // Back content
    $back_html  = '<div class="wpus-flip-box-back">';
        $back_html .= $back_title ? '<h5>' . esc_html( $back_title ) . '</h5>' : '';
        $back_html .= $back_content ? '<p>' . esc_html( $back_content ) . '</p>' : '';
        $back_html .= $html_button ? $html_button : '';
    $back_html .= '</div>';

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . '>';
        $output .= $front_html;
        $output .= $back_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_flip_box', 'adamas_flip_box_shortcode' );