<?php
/**
 * Shortcodes: Slider
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_slider_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(
        'id' => '',
    ), $atts ) );

    // Declare variables
    $unique_id  = AdamasHelper::get_unique_id();
    $slide_html = '';
    $build_css  = '';
    $count      = 0;

    // Declare slider variables
    $layout        = get_post_meta( $id, 'wpus_slider_layout', true );
    $max_width     = get_post_meta( $id, 'wpus_slider_max_width', true );
    $height_lg     = get_post_meta( $id, 'wpus_slider_height_lg', true );
    $height_md     = get_post_meta( $id, 'wpus_slider_height_md', true );
    $height_sm     = get_post_meta( $id, 'wpus_slider_height_sm', true );
    $height_xs     = get_post_meta( $id, 'wpus_slider_height_xs', true );
    $autoplay      = get_post_meta( $id, 'wpus_slider_autoplay', true );
    $inifnity_loop = get_post_meta( $id, 'wpus_slider_inifnity_loop', true );

    $arrows        = get_post_meta( $id, 'wpus_slider_arrows', true );
    $arrows_style  = get_post_meta( $id, 'wpus_slider_arrows_style', true );
    $arrows_shape  = get_post_meta( $id, 'wpus_slider_arrows_shape', true );
    $arrows_color  = get_post_meta( $id, 'wpus_slider_arrows_color', true );
    
    $dots          = get_post_meta( $id, 'wpus_slider_dots', true );
    $dots_position = get_post_meta( $id, 'wpus_slider_dots_position', true );
    $dots_align    = get_post_meta( $id, 'wpus_slider_dots_align', true );
    $dots_color    = get_post_meta( $id, 'wpus_slider_dots_color', true );

    $items         = get_post_meta( $id, 'wpus_slider_items', true );

    // Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'wpus-theme-slider',
        'wpus-theme-slider-' . $id,
        $layout,
        'slider-boxed' == $layout ? 'container' : '',
        'arrows-hover-show' == $arrows ? $arrows : '',
        'no' != $arrows ? $arrows_style : '',
        'no' != $arrows ? $arrows_shape : '',
        'no' != $arrows ? $arrows_color : '',
        'dots-hover-show' == $dots ? $dots : '',
        'no' != $dots ? $dots_position : '',
        'no' != $dots ? $dots_align : '',
        'no' != $dots ? $dots_color : '',
    ) );

    // Wrap ID
    $wrap_id = ' id="wpus-theme-slider-' . sanitize_html_class( $id ) . '"';

    // Wrap atributes
    $wrap_attributes = AdamasHelper::get_html_attributes( array(
        'autoplay'     => $autoplay ? 'true' : '',
        'timeout'      => absint( $autoplay ),
        'loop'         => 'yes' == $inifnity_loop ? 'true' : '',
        'arrows'       => 'no' != $arrows ? 'true' : '',
        'arrows-color' => $arrows_color,
        'dots'         => 'no' != $dots   ? 'true' : '',
        'dots-color'   => $dots_color,
    ) );

    // Wrap style
    $wrap_css = AdamasHelper::get_style( array( 
        'max_width' => 'slider-full-width' == $layout ? $max_width : '',
        'height'    => $height_lg ? $height_lg : '600px',
    ) );

    $build_css .= "#wpus-theme-slider-{$id} .wpus-theme-slide{{$wrap_css}}";

    if ( 'slider-full-screen' != $layout ) {

        $height_md = AdamasHelper::get_style( array( 'height' => $height_md ? $height_md : '500px' ) );
        $height_sm = AdamasHelper::get_style( array( 'height' => $height_sm ? $height_sm : '400px' ) );
        $height_xs = AdamasHelper::get_style( array( 'height' => $height_xs ? $height_xs : '300px' ) );

        $build_css .= "
            @media ( min-width: 992px ) and ( max-width: 1199px ) {
               #wpus-theme-slider-{$id} .wpus-theme-slide{{$height_md}}
            }
        ";

        $build_css .= "
            @media ( min-width: 768px ) and ( max-width: 991px ) {
                #wpus-theme-slider-{$id} .wpus-theme-slide{{$height_sm}}
            }
        ";

        $build_css .= "
            @media only screen and (max-width : 767px) {
                #wpus-theme-slider-{$id} .wpus-theme-slide{{$height_xs}}
            }
        ";
    }

    // Return if $items is empty
    if ( empty ( $items ) || ! is_array( $items ) ) {
        return esc_html__( 'No slides yet.', 'wpus-core' );
    }

    // Slides markup
    foreach ( $items as $key => $value ) {
        $count++;

        // Set up the default form values
        extract( shortcode_atts( array(

            'background_image'          => '',
            'background_repeat'         => '',
            'background_size'           => '',
            'background_attachment'     => '',
            'background_position'       => '',
            'background_animation'      => '',
            'youtube_url'               => '',
            'background_color'          => '',
            'overlay_color'             => '',
            
            'title'                     => '',
            'title_color'               => '',
            'title_font_family'         => '',
            'title_font_weight'         => '',
            'title_font_style'          => '',
            'title_font_size'           => '',
            'title_line_height'         => '',
            'title_letter_spacing'      => '',
            'title_margin_top'          => '',
            'title_margin_bottom'       => '',
            'title_animation'           => '',
            'title_animation_delay'     => '',
            'title_animation_duration'  => '',
            
            'desc'                      => '',
            'desc_color'                => '',
            'desc_font_family'          => '',
            'desc_font_weight'          => '',
            'desc_font_style'           => '',
            'desc_font_size'            => '',
            'desc_line_height'          => '',
            'desc_letter_spacing'       => '',
            'desc_margin_top'           => '',
            'desc_margin_bottom'        => '',
            'desc_animation'            => '',
            'desc_animation_delay'      => '',
            'desc_animation_duration'   => '',
            
            'button_text'               => '',
            'button_url'                => '',
            'button_target'             => '',
            'button_style'              => 'style-bg',
            'button_size'               => '',
            'button_color'              => 'color-accent',
            'button_animation'          => '',
            'button_animation_delay'    => '',
            'button_animation_duration' => '',
            
            'image'                     => '',
            'image_location'            => 'before-title',
            'image_margin_top'          => '',
            'image_margin_bottom'       => '',
            'image_animation'           => '',
            'image_animation_delay'     => '',
            'image_animation_duration'  => '',
            
            'align'                     => 'text-center',
            'arrows_color'              => '',
            'dots_color'                => '',
            'parallax'                  => '',
            'fade_content'              => '', 
            
        ), $value ) );

        // Enqueue google font
        AdamasHelper::enqueue_google_font( $title_font_family );
        AdamasHelper::enqueue_google_font( $desc_font_family );

        // Declare variables
        $slide_image  = '';
        $slide_title  = '';
        $slide_desc   = '';
        $slide_button = '';

        // Slide class
        $slide_class = AdamasHelper::get_html_class( array(
            'wpus-theme-slide',
            'wpus-theme-slide-' . $id . '-' . $count,
            $align,
            $fade_content ? 'has-fade-content' : '',
        ) );

        // Slide attributes
        $slide_attr = AdamasHelper::get_html_attributes( array(
            'arrows-color' => $arrows_color,
            'dots-color'   => $dots_color,
            '250-top'      => 'yes' == $fade_content ? 'opacity:1;' : '',
            '-250-top'     => 'yes' == $fade_content ? 'opacity:0;' : '',
        ) );

        // Get Background
        $bg_attr = array(
            'image'                 => $background_image,
            'youtube'               => $youtube_url,
            'overlay'               => $overlay_color,
            'parallax'              => $parallax,
            'background_repeat'     => $background_repeat,
            'background_attachment' => $background_attachment,
            'background_position'   => $background_position,
            'background_size'       => $background_size,
            'background_animation'  => $background_animation,
        );

        $background = adamas_get_background( $bg_attr, '' );

        // Slide Style
        if ( $slide_css = AdamasHelper::get_style( array( 'background_color' => $background_color ) ) ) {
            $build_css .= ".wpus-theme-slide-{$id}-{$count}{{$slide_css}}";
        }

        // Image markup
        if ( $image = wp_get_attachment_image_url( $image, 'full' ) ) {

            /** Image class */
            $image_class = AdamasHelper::get_html_class( array(
                'wpus-slide-image',
                $image_animation ? 'wpus-animate-el' : '',
            ) );

            /** Image attributes */
            $image_attr = AdamasHelper::get_html_attributes( array(
                'delay' => $image_animation && $image_animation_delay ? absint( $image_animation_delay ) : '',
            ) );

            /** Image style */
            $image_css = AdamasHelper::get_style( array(
                'margin_top'    => $image_margin_top,
                'margin_bottom' => $image_margin_bottom,
            ) );

            if ( $image_css ) {
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-image{{$image_css}}";
            }

            /** Image animation style */
            $image_a_css = AdamasHelper::get_style( array(
                'animation_name'     => $image_animation,
                'animation_duration' => AdamasHelper::sanitize_animation( $image_animation_duration ),
            ) );

            if ( $image_a_css ) {
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-image.animate{{$image_a_css}}";
            }

            /** Build image */
            $slide_image .= '<img src="' . esc_url( $image  ) . '"' . $image_class . $image_attr . '/><br>';

        }

        // Title markup
        if ( 'before-title' == $image_location ) {
            $slide_title .= $slide_image;
        }

        if ( $title ) {

            /** Title class */
            $title_class = AdamasHelper::get_html_class( array(
                'wpus-slide-title',
                $title_animation ? 'wpus-animate-el' : '',
            ) );

            /** Title style */
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
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-title{{$title_css}}";
            }

            /** Title animation style */
            $title_a_css = AdamasHelper::get_style( array(
                'animation_name'     => $title_animation,
                'animation_duration' => AdamasHelper::sanitize_animation( $title_animation_duration ),
            ) );
            
            if ( $title_a_css ) {
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-title.animate{{$title_a_css}}";
            }

            /** Title attributes */
            $title_attr = AdamasHelper::get_html_attributes( array(
                'delay' => $title_animation && $title_animation_delay ? absint( $title_animation_delay ) : '',
            ) );

            /** Build title */
            $slide_title .= '<h2' . $title_class . $title_attr . '><span>' . do_shortcode( $title ) . '</span></h2><br>';

        }

        if ( 'after-title' == $image_location ) {
            $slide_title .= $slide_image;
        }

        // Description markup
        if ( $desc ) {

            /** Description class */
            $desc_class = AdamasHelper::get_html_class( array(
                'wpus-slide-desc',
                $desc_animation ? 'wpus-animate-el' : '',
            ) );

            /** Description style */
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
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-desc{{$desc_css}}";
            }

            /** Description animation style */
            $desc_a_css = AdamasHelper::get_style( array(
                'animation_name'     => $desc_animation,
                'animation_duration' => AdamasHelper::sanitize_animation( $desc_animation_duration ),
            ) );
            
            if ( $desc_a_css ) {
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-desc.animate{{$desc_a_css}}";
            }

            /** Description attributes */
            $desc_attr = AdamasHelper::get_html_attributes( array(
                'delay' => $desc_animation && $desc_animation_delay ? absint( $desc_animation_delay ) : '',
            ) );

            /** Build description */
            $slide_desc .= '<h5' . $desc_class . $desc_attr . '><span>' . do_shortcode( $desc ) . '</span></h5><br>';

        }

        if ( 'after-desc' == $image_location ) {
            $slide_desc .= $slide_image;
        }

        // Button markup
        if ( $button_text ) {

            /** Button class */
            $button_class = AdamasHelper::get_html_class( array(
                'wpus-slide-button',
                $button_style,
                $button_size,
                $button_color,
                $button_animation ? 'wpus-animate-el' : '',
            ) );

            /** Button animation style */
            $button_a_css = AdamasHelper::get_style( array(
                'animation_name'     => $button_animation,
                'animation_duration' => AdamasHelper::sanitize_animation( $button_animation_duration ),
            ) );

            if ( $button_a_css ) {
                $build_css .= ".wpus-theme-slide-{$id}-{$count} .wpus-slide-button.animate{{$button_a_css}}";
            }

            /** Button attributes */
            $button_attr = AdamasHelper::get_html_attributes( array(
                'delay' => $button_animation && $button_animation_delay ? absint( $button_animation_delay ) : '',
            ) );

            /** Button Target */
            $button_target = $button_target ? ' target="' . $button_target . '"' : '';

            /** Build button */
            $slide_button .= '<a href="' . esc_url( $button_url ). '"' . $button_target . $button_class . $button_attr . '>' . do_shortcode( $button_text ) . '</a>';

        }

        if ( 'after-btn' == $image_location ) {
            $slide_button .= $slide_image;
        }

        // Slide markup
        $slide_html .= '<div' . $slide_class . '>';

            $slide_html .= $background;

            $slide_html .= '<div class="wpus-theme-slide-inner"' . $slide_attr . '>';   

                $slide_html .= '<div class="container">';
                    $slide_html .= $slide_title;
                    $slide_html .= $slide_desc;
                    $slide_html .= $slide_button;
                $slide_html .= '</div>';

            $slide_html .= '</div>';

        $slide_html .= '</div>';

    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
    }

    // Shortcode markup
    $html = '<div' . $wrap_id . $wrap_class . $wrap_attributes . '>';
        $html .= do_shortcode( $slide_html );
    $html .=  '</div>';

    // Return shortcode
    return $html;
}

add_shortcode( 'wpus_slider', 'adamas_slider_shortcode' );