<?php
/**
 * Hero Style
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

function adamas_hero_css() {

    // Return if hero isn't enabled
    if ( ! adamas_get_meta_data( 'hero_type' ) ) {
        return;
    }

    $id         = adamas_get_page_id();
    $css_output = '';

    // Declare slider variables
    $layout                  = get_post_meta( $id, 'adamas_hero_layout', true );

    $max_width               = get_post_meta( $id, 'adamas_hero_max_width', true );
    $height_lg               = get_post_meta( $id, 'adamas_hero_height_lg', true );
    $height_md               = get_post_meta( $id, 'adamas_hero_height_md', true );
    $height_sm               = get_post_meta( $id, 'adamas_hero_height_sm', true );
    $height_xs               = get_post_meta( $id, 'adamas_hero_height_xs', true );
    $background_color        = get_post_meta( $id, 'adamas_hero_background_color', true );

    $title_font_family       = get_post_meta( $id, 'adamas_hero_title_font_family', true );
    $title_font_weight       = get_post_meta( $id, 'adamas_hero_title_font_weight', true );
    $title_font_style        = get_post_meta( $id, 'adamas_hero_title_font_style', true );
    $title_font_size         = get_post_meta( $id, 'adamas_hero_title_font_size', true );
    $title_line_height       = get_post_meta( $id, 'adamas_hero_title_line_height', true );
    $title_letter_spacing    = get_post_meta( $id, 'adamas_hero_title_letter_spacing', true );
    $title_margin_top        = get_post_meta( $id, 'adamas_hero_title_margin_top', true );
    $title_margin_bottom     = get_post_meta( $id, 'adamas_hero_title_margin_bottom', true );
    $title_color             = get_post_meta( $id, 'adamas_hero_title_color', true );
    
    $desc_font_family        = get_post_meta( $id, 'adamas_hero_desc_font_family', true );
    $desc_font_weight        = get_post_meta( $id, 'adamas_hero_desc_font_weight', true );
    $desc_font_style         = get_post_meta( $id, 'adamas_hero_desc_font_style', true );
    $desc_font_size          = get_post_meta( $id, 'adamas_hero_desc_font_size', true );
    $desc_line_height        = get_post_meta( $id, 'adamas_hero_desc_line_height', true );
    $desc_letter_spacing     = get_post_meta( $id, 'adamas_hero_desc_letter_spacing', true );
    $desc_margin_top         = get_post_meta( $id, 'adamas_hero_desc_margin_top', true );
    $desc_margin_bottom      = get_post_meta( $id, 'adamas_hero_desc_margin_bottom', true );
    $desc_color              = get_post_meta( $id, 'adamas_hero_desc_color', true );

    // Enqueue google font
    AdamasHelper::enqueue_google_font( $title_font_family );
    AdamasHelper::enqueue_google_font( $desc_font_family  );

    // Hero style
    $hero_css = AdamasHelper::get_style( array( 
        'max_width'        => 'hero-full-width' == $layout ? $max_width : '',
        'height'           => $height_lg ? $height_lg : '600px',
        'background_color' => $background_color,
    ) );

    $css_output .= "#site-hero{{$hero_css}}";

    // Hero Height
    if ( 'hero-full-screen' != $layout ) {

        $height_md = AdamasHelper::get_style( array( 'height' => $height_md ? $height_md : '500px' ) );
        $height_sm = AdamasHelper::get_style( array( 'height' => $height_sm ? $height_sm : '400px' ) );
        $height_xs = AdamasHelper::get_style( array( 'height' => $height_xs ? $height_xs : '300px' ) );

        $css_output .= "
            @media ( min-width: 992px ) and ( max-width: 1199px ) {
               #site-hero{{$height_md}}
            }
        ";

        $css_output .= "
            @media ( min-width: 768px ) and ( max-width: 991px ) {
                #site-hero{{$height_sm}}
            }
        ";

        $css_output .= "
            @media only screen and (max-width : 767px) {
                #site-hero{{$height_xs}}
            }
        ";
    }

    // Title style
    $title_css = AdamasHelper::get_style( array(
        'color'          => $title_color,
        'font_weight'    => $title_font_weight,
        'font_style'     => $title_font_style,
        'font_size'      => $title_font_size,
        'font_family'    => $title_font_family,
        'line_height'    => $title_line_height,
        'letter_spacing' => $title_letter_spacing,
        'margin_top'     => $title_margin_top,
        'margin_bottom'  => $title_margin_bottom,
    ) );

    if ( $title_css ) {
        $css_output .= "#site-hero .wpus-hero-title{{$title_css}}";
    }
    
    // Description: Style
    $desc_css = AdamasHelper::get_style( array(
        'color'          => $desc_color,
        'font_weight'    => $desc_font_weight,
        'font_style'     => $desc_font_style,
        'font_size'      => $desc_font_size,
        'font_family'    => $desc_font_family,
        'line_height'    => $desc_line_height,
        'letter_spacing' => $desc_letter_spacing,
        'margin_top'     => $desc_margin_top,
        'margin_bottom'  => $desc_margin_bottom,
    ) );

    if ( $desc_css ) {
        $css_output .= "#site-hero .wpus-hero-desc{{$desc_css}}";
    }

    // Add style
    $css_output = AdamasHelper::get_minify_css( $css_output );
    wp_add_inline_style( 'adamas-main', $css_output );

}

add_action( 'wp_enqueue_scripts', 'adamas_hero_css', 300 );