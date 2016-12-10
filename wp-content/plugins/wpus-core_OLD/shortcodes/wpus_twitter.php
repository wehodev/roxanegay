<?php
/**
 * Shortcode: Twitter
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_twitter_shortcode( $atts, $content = null ) {

    // Extract shortcode attributes
    extract( shortcode_atts( array(

        // General tab
        'username'                      => 'envato',
        'number'                        => '8',
        
        // Setings tab
        'max_width'                     => '',
        'align'                         => 'text-center',
        'align_sm'                      => '',
        'align_xs'                      => '',
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
        
        // Style tab
        'text_color'                    => '',
        'link_color'                    => '',
        'link_hover_color'              => '',
        'date_color'                    => '',
        'text_typography'               => '',
        'date_typography'               => '',
        
        // Extend tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',
        
    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $text_typography );
    WpusVcHelper::get_google_font( $date_typography );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $twitter_html = '';
    $build_css    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-twitter',
        'wpus-carousel',
        $align,
        $align_sm,
        $align_xs,
        $arrows_appearance,
        'true' == $arrows ? $arrows_style : '',
        $dots_position,
        $dots_appearance,
        $el_class,
        $el_hidden,
        $dots_hidden,
        $arrows_hidden,
    );

    // Wrap atributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'autoplay'    => $autoplay ? 'true' : 'false',
        'timeout'     => $autoplay,
        'loop'        => $inifnity_loop,
        'arrows'      => $arrows,
        'dots'        => $dots,
        'auto-height' => 'true',
        'single'      => 'true',
    ) );

    // Style: Content
    if ( $content_css = AdamasHelper::get_style( array( 'max_width' => $max_width  ) ) ) {
        $build_css .= ".wpus-twitter.{$unique_id} .wpus-twitter-item{{$content_css}}";
    }

    // Style: Text
    $text_css  = AdamasHelper::get_style( array(
        'color'      => $text_color,
        'typography' => $text_typography,
    ) );

    if ( $text_css ) {
        $build_css .= ".wpus-twitter.{$unique_id} .wpus-twitter-text{{$text_css}}";
    }

    // Style: Date
    $date_css  = AdamasHelper::get_style( array(
        'color'      => $date_color,
        'typography' => $date_typography,
    ) );

    if ( $date_css ) {
        $build_css .= ".wpus-twitter.{$unique_id} .wpus-twitter-date{{$date_css}}";
    }

    // Style: Link regular
    if ( $link_css = AdamasHelper::get_style( array( 'color' => $link_color ) ) ) {
        $build_css .= ".wpus-twitter.{$unique_id} .wpus-twitter-text a{{$link_css}}";
    }

    // Style: Link hover
    if ( $link_hover_css = AdamasHelper::get_style( array( 'color' => $link_hover_color ) ) ) {
        $build_css .= ".wpus-twitter.{$unique_id} .wpus-twitter-text a:hover{{$link_hover_css}}";
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
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dot span{border-color:" . AdamasHelper::hex2rgba( $dots_color, '.4' ) . "}";
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dot.active span,.wpus-carousel.{$unique_id} .owl-dot:hover span{background-color:{$dots_color}}";
    }

    // Style: Dots space
    if ( 'dots-inside' == $dots_position && $dots_space ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dots{bottom:" . intval( $dots_space ) . "px;}";
    }

    if ( '' == $dots_position && $dots_space ) {
        $build_css .= ".wpus-carousel.{$unique_id} .owl-dots{margin-top:" . intval( $dots_space ) . "px;}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Get tweets
    $twitter_array = adamas_get_twitter( $username, $number );

    if ( is_wp_error( $twitter_array ) ) {
        return $twitter_array->get_error_message();
    } 

    // Build tweets
    foreach ( $twitter_array as $tweet ) {
        $twitter_html .= '<div class="wpus-twitter-item">';
            $twitter_html .= '<div class="wpus-twitter-text">' . $tweet['text'] . '</div>';
            $twitter_html .= '<span class="wpus-twitter-date">' . $tweet['time'] . '</span>';
        $twitter_html .= '</div>';
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= AdamasHelper::do_kses( $twitter_html );
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_twitter', 'adamas_twitter_shortcode' );