<?php
/**
 * Shortcode: Pricing Plan
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_pricing_table_sortcode( $atts, $content = null ) {

    extract( shortcode_atts( array( 
        
        // General tab
        'title'                         => 'Basic',
        'subtitle'                      => 'Perfect for basic sites',
        'price'                         => '19.99',
        'currency'                      => '$', 
        'period'                        => '/ month', 
        'button_link'                   => '', 
        'button_title'                  => 'Order Now',
        'align'                         => '',
        
        // Style tab
        'title_color'                   => '',
        'subtitle_color'                => '',
        'price_color'                   => '',
        'button_color'                  => '',
        'button_hover_color'            => '',
        'button_background_color'       => '',
        'button_hover_background_color' => '',
        
        // Design tab
        'css'                           => '',
        'box_shadow'                    => '',
        'hover_box_shadow'              => '',
        
        // Animation tab
        'animation_type'                => '',
        'animation_delay'               => '',
        'animation_duration'            => '',
        
        // Extra tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Declare variables
    $unique_id   = AdamasHelper::get_unique_id();
    $build_css   = '';
    $button_html = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-pricing',
        $align,
        $animation_type,
        $el_class,
        $el_hidden,
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
        $build_css .= ".wpus-pricing.{$unique_id}{{$wrap_css}}";
    }

    // Style: Wrap hover
    if ( $wrap_hover_css = AdamasHelper::get_style( array( 'box_shadow' => $hover_box_shadow ) ) ) {
        $build_css .= ".wpus-pricing.{$unique_id}:hover{{$wrap_hover_css}}";
    }

    // Style: Title
    if ( $title_css = AdamasHelper::get_style( array( 'color' => $title_color ) ) ) {
        $build_css .= ".wpus-pricing.{$unique_id} h3{{$title_css}}";
    }

    // Style: Subtitle
    if ( $subtitle_css = AdamasHelper::get_style( array( 'color' => $subtitle_color ) ) ) {
        $build_css .= ".wpus-pricing.{$unique_id} p{{$subtitle_css}}";
    }

    // Style: Price
    if ( $price_css = AdamasHelper::get_style( array( 'color' => $price_color ) ) ) {
        $build_css .= ".wpus-pricing.{$unique_id} .wpus-pricing-price{{$price_css}}";
    }

    // Style: Button regular
    $button_css = AdamasHelper::get_style( array(
        'color'            => $button_color,
        'background_color' => $button_background_color,
    ) );

    if ( $button_css ) {
        $build_css .= ".wpus-pricing.{$unique_id} .wpus-button{{$button_css}}";
    }

    // Style: Button hover
    $button_hover_css = AdamasHelper::get_style( array(
        'color'            => $button_hover_color,
        'background_color' => $button_hover_background_color,
    ) );

    if ( $button_hover_css ) {
        $build_css .= ".wpus-pricing.{$unique_id} .wpus-button:hover{{$button_hover_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Generate button
    if ( $button_title ) {
        $link     = ( '||' === $button_link ) ? '' : $button_link;
        $link     = vc_build_link( $link );
        $a_href   = $link['url']    ? $link['url'] : '#';
        $a_title  = $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '';
        $a_target = $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '';
        $button_html .= '<a href="' .  esc_url( $a_href )  . '" class="wpus-button style-bg"' . $a_target . $a_title . '>' . $button_title . '</a>';
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';

        $output .= '<h3>' . esc_html( $title ) . '</h3>';
        $output .= '<p>' . esc_html( $subtitle ) . '</p>';

        $output .= '<div class="wpus-pricing-price">';
            $output .= '<span class="wpus-pricing-currency">' . esc_html( $currency ) . '</span>';
            $output .= esc_html( $price );
            $output .= '<span class="wpus-pricing-period">' . esc_html( $period ) . '</span>';
        $output .= '</div>';

        $output .= do_shortcode( $content );
        $output .= $button_html;

    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_pricing_table', 'adamas_pricing_table_sortcode' );