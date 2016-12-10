<?php
/**
 * Shortcode: Heading
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_heading_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array( 

        // General tab
        'text'               => 'This is custom heading element', 
        'tag'                => 'h3',
        'link'               => '',
        'align'              => '',
        'align_sm'           => '',
        'align_xs'           => '',
        
        // Style tab
        'color'              => '',
        'hover_color'        => '',
        'font_size'          => '',
        'font_size_sm'       => '',
        'font_size_xs'       => '',
        'typography'         => '',
        
        // Design tab
        'css'                => '',
        
        // Animation tab
        'animation_type'     => '',
        'animation_delay'    => '',
        'animation_duration' => '',
        
        // Extra tab
        'el_id'              => '',
        'el_class'           => '',
        'el_hidden'          => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $tag_attr  = '';
    $build_css = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-heading',
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

    // Tag attributes
    if ( $font_size_sm || $font_size_xs ) {
        $tag_attr = AdamasHelper::get_html_attributes( array(
            'md' => $font_size,
            'sm' => $font_size_sm,
            'xs' => $font_size_xs,
        ) );
        $wrap_class[] = 'wpus-responsive-heading';
    }

    // Style: Tag regular
    $tag_css  = AdamasHelper::get_vc_style( $css );
    $tag_css .= AdamasHelper::get_style( array(
        'color'      => $color,
        'font_size'  => $font_size,
        'typography' => $typography,
    ) );

    if ( $tag_css ) {
        $build_css .= ".wpus-heading.{$unique_id} {$tag}{{$tag_css}}";
    }

    // Style: Tag hover
    if ( $tag_hover_css = AdamasHelper::get_style( array( 'color' => $hover_color ) ) ) {
        $build_css .= ".wpus-heading.{$unique_id} a:hover{{$tag_hover_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Build link
    $text = WpusVcHelper::build_link( $link, $text );

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= '<' . esc_attr( $tag ) . ' class="wpus-heading-tag"' . $tag_attr . '>';
            $output .= do_shortcode( $text );
        $output .= '</' . esc_attr( $tag ) . '>';
    $output .=  '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_heading', 'adamas_heading_shortcode' );