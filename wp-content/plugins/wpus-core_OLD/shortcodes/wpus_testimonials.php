<?php
/**
 * Shortcode: Testimonial
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_testimonials_sortcode( $atts, $content = ngrid_ull ) {

    extract( shortcode_atts( array(

        // General tab
        'type'                          => 'wpus-carousel',
        'style'                         => 'wpus-style-1',
        'avatar'                        => 'true',
        
        // Query
        'number'                        => '8',
        'order'                         => 'ASC',
        'orderby'                       => 'none',
        'include_cat'                   => '',
        'exclude_cat'                   => '',
        'offset'                        => '',
        
        // Setings
        'max_width'                     => '',
        'align'                         => 'text-center',
        'align_sm'                      => '',
        'align_xs'                      => '',
        'columns_lg'                    => '4',
        'columns_md'                    => '3',
        'columns_sm'                    => '2', 
        'columns_xs'                    => '1', 
        'items_space'                   => '15px',
        'autoplay'                      => '',
        'inifnity_loop'                 => 'false',
        'arrows'                        => 'false',
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
        'author_color'                  => '',
        'profession_color'              => '',
        'background_color'              => '',
        'border_style'                  => '',
        'border_width'                  => '',
        'border_color'                  => '',
        'text_typography'               => '',
        'author_typography'             => '',
        'profession_typography'         => '',
        
        // Extra tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $text_typography );
    WpusVcHelper::get_google_font( $author_typography );
    WpusVcHelper::get_google_font( $profession_typography );

    // Declare variables
    $unique_id        = AdamasHelper::get_unique_id();
    $wrap_attr        = '';
    $thumb_attr       = '';
    $build_css        = '';
    $testimonial_html = '';
    $avatar_html      = '';
    $output          = '';

    // Wrap class
    $wrap_class = array(
        'wpus-testimonials',
        'wpus-grid'   == $type ? 'wpus-grid' : 'wpus-carousel',
        'wpus-slider' == $type ? $style : '',
        'wpus-slider' == $type ? $align : '',
        $align_sm,
        $align_xs,
        'true' == $arrows  ? $arrows_style : '',
        $arrows_appearance,
        $dots_position,
        $dots_appearance,
        $el_class,
        $el_hidden,
        $dots_hidden,
        $arrows_hidden,
    );

    // Thumb class
    $thumb_class = array(
        'wpus-testimonial-thumbs',
        'wpus-slider-thumb',
        'wpus-carousel',
        'wpus-slider' == $type ? $align : '',
        $align_sm,
        $align_xs,
    );

    // Wrap ID
    $el_id   = $el_id ? sanitize_html_class( $el_id ) : 'slider_' . $unique_id;
    $wrap_id = ' id="' . $el_id . '"';

    // Wrap atributes
    if ( 'wpus-slider' != $type ) {

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

    } else {

        $wrap_attr = array(
            'single'      => 'true',
            'auto-height' => 'true',
            'autoplay'    => $autoplay ? 'true' : 'false',
            'timeout'     => $autoplay,
            'arrows'      => $arrows,
            'dots'        => $dots,
            'thumb'       => 'wpus-style-2' == $style ? '#thumb_' . esc_attr( $unique_id ) : '',
        );

        $thumb_attr = array(
            'slider'    => '#' . $el_id,
            'margin'    => '10',
            'column-lg' => '6',
            'column-md' => '6',
            'column-sm' => '6',
            'column-xs' => '4',
        );

        $thumb_attr = AdamasHelper::get_html_attributes( $thumb_attr );
    }

    $wrap_attr = AdamasHelper::get_html_attributes( $wrap_attr );

    // Style: Box
    $box_css = AdamasHelper::get_style( array(
        'border_width'     => $border_width,
        'border_style'     => $border_style,
        'border_color'     => $border_color,
        'background_color' => $background_color,
    ) );

    if ( $box_css ) {
        $build_css .= ".wpus-testimonials.{$unique_id} .wpus-testimonial-grid{{$box_css}}";
    }

    // Style: Slide
    if ( $slide_css  = AdamasHelper::get_style( array( 'max_width' => $max_width ) ) ) {
        $build_css .= ".wpus-testimonials.{$unique_id} .wpus-testimonial-slide{{$slide_css}}";
    }

    // Style: Text
    $text_css  = AdamasHelper::get_style( array(
        'color'      => $text_color,
        'typography' => $text_typography,
    ) );

    if ( $text_css ) {
        $build_css .= ".wpus-testimonials.{$unique_id} .wpus-testimonial-content{{$text_css}}";
    }

    // Style: Author
    $author_css = AdamasHelper::get_style( array(
        'color'      => $author_color,
        'typography' => $author_typography,
    ) );

    if ( $author_css ) {
        $build_css .= ".wpus-testimonials.{$unique_id} .wpus-testimonial-meta h6{{$author_css}}";
    }

    // Style: Profession
    $profession_css = AdamasHelper::get_style( array(
        'color'      => $profession_color,
        'typography' => $profession_typography,
    ) );

    if ( $profession_css ) {
        $build_css .= ".wpus-testimonials.{$unique_id} .wpus-testimonial-meta span{{$profession_css}}";
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

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }
    
    // Build QUERY
    $args = array(
        'post_status'    => 'publish',
        'post_type'      => 'testimonials',
        'posts_per_page' => esc_attr( $number ),
        'orderby'        => esc_attr( $orderby ),
        'order'          => esc_attr( $order ),
        'offset'         => $offset,
        'meta_query'     => array(),
        'tax_query'      => array(),
    );

    // Include categories
    if ( ! empty( $include_cat ) ) {
        $include_cat = explode( ',', $include_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'testimonials_category',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    // Exclude categories
    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'testimonials_category',
            'field'    => 'id', 
            'terms'    => $exclude_cat,
            'operator' => 'NOT IN',
        );
    }
    
    // Get QUERY                             
    $the_query = new WP_Query( $args );

    // Build testimonials
    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        global $post;

        // Get data
        $_avatar_html      = '';
        $person_avatar     = get_post_meta( $post->ID, 'adamas_testimonial_image', true );
        $person_profession = get_post_meta( $post->ID, 'adamas_testimonial_profession', true );

        // Avatar
        $_avatar_html = '';
        if ( 'true' == $avatar && $person_avatar ) {
            $_avatar_html  = wp_get_attachment_image( $person_avatar, array( 220, 220 ) );
            $avatar_html .= '<div class="wpus-has-hover">' . $_avatar_html . '<span class="wpus-overlay"></span></div>';
        }

        // Build testimonial
        $_class = 'wpus-slider' == $type ? 'slide' : 'grid';

        $_html = '<div class="wpus-testimonial-' . $_class . '">';

            if ( 'true' == $avatar && 'wpus-style-2' != $style ) {
                $_html .= $_avatar_html;
            }

            $_html .= '<div class="wpus-testimonial-content">';
                $_html .= '<p>' . get_the_content() . '</p>';
            $_html .= '</div>';

            $_html .= '<div class="wpus-testimonial-meta">';
                $_html .= '<h6>' . get_the_title() . '</h6>';
                $_html .= '<span>' . esc_html( $person_profession ) . '</span>';
            $_html .= '</div>';

        $_html .= '</div>';

        if ( 'wpus-grid' == $type ) {
            $testimonial_html .= '<div class="wpus-grid-item">' . $_html . '</div>';
        } else {
            $testimonial_html .= $_html;
        }

    endwhile;
    endif;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Get wrap / thumb class
    $wrap_class  = AdamasHelper::get_html_class( $wrap_class );
    $thumb_class = AdamasHelper::get_html_class( $thumb_class );

    // Shortcode
    if ( 'wpus-style-2' == $style ) {
        $output .= '<div id="thumb_' . $unique_id . '"' . $thumb_class . $thumb_attr . '>';
            $output .= $avatar_html;
        $output .= '</div>';
    }

    $output .= '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $testimonial_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_testimonials', 'adamas_testimonials_sortcode' );