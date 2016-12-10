<?php
/**
 * Shortcode: Post Carousel 
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_post_carousel_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'thumb'                         => 'true',
        'image_size'                    => 'adamas-image-horizontal',
        'image_width'                   => '',
        'image_height'                  => '',
        'date'                          => 'true',
        'excerpt'                       => 'true',
        'align'                         => '',
        
        // Query
        'number'                        => '8',
        'order'                         => 'ASC',
        'orderby'                       => 'none',
        'include_cat'                   => '',
        'exclude_cat'                   => '',
        'offset'                        => '',
        
        // Setings
        'columns_lg'                    => '4',
        'columns_md'                    => '3',
        'columns_sm'                    => '2', 
        'columns_xs'                    => '1', 
        'items_space'                   => '30px',
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
        'title_color'                   => '',
        'title_hover_color'             => '',
        'date_color'                    => '',
        'excerpt_color'                 => '',
        'title_typography'              => '',
        'date_typography'               => '',
        'excerpt_typography'            => '',
        
        // Extend tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $title_typography );
    WpusVcHelper::get_google_font( $date_typography );
    WpusVcHelper::get_google_font( $excerpt_typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $img_size  = WpusVcHelper::get_image_size( $image_size, $image_width, $image_height );
    $build_css = '';
    $post_html = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-blog',
        'wpus-blog-grid',
        'wpus-carousel',
        $align,
        $excerpt == 'false' ? 'no-excerpt' : '',
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
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'column-lg' => $columns_lg,
        'column-md' => $columns_md,
        'column-sm' => $columns_sm,
        'column-xs' => $columns_xs,
        'margin'    => intval( $items_space ),
        'autoplay'  => $autoplay ? 'true' : 'false',
        'timeout'   => $autoplay,
        'loop'      => $inifnity_loop,
        'arrows'    => $arrows,
        'dots'      => $dots,
    ) );

    // Style: Title regular
    $title_css = AdamasHelper::get_style( array(
        'color'            => $title_color,
        'typography' => $title_typography,
    ) );

    if ( $title_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .entry-title{{$title_css}}";
    }

    // Style: Title hover
    if ( $title_hover_css = AdamasHelper::get_style( array( 'color' => $title_hover_color ) ) ) {
        $build_css .= ".wpus-carousel.{$unique_id} .entry-title a:hover{{$title_hover_css}}";
    }

    // Style: Date
    $date_css = AdamasHelper::get_style( array(
        'color'           => $date_color,
        'typography' => $date_typography,
    ) );

    if ( $date_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .entry-meta{{$date_css}}";
    }

    // Style: Excerpt
    $excerpt_css  = AdamasHelper::get_style( array(
        'color'              => $excerpt_color,
        'typography' => $excerpt_typography,
    ) );

    if ( $excerpt_css ) {
        $build_css .= ".wpus-carousel.{$unique_id} .entry-excerpt{{$excerpt_css}}";
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
        'post_type'      => 'post',
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
            'taxonomy' => 'category',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    // Exclude categories
    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'id', 
            'terms'    => $exclude_cat,
            'operator' => 'NOT IN',
        );
    }

    // Get QUERY                             
    $the_query = new WP_Query( $args );

    // Generate post
    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        global $post;

        $post_html .= '<article>';

            if ( 'true' == $thumb ) $post_html .= AdamasBlog::get_thumbnail( $img_size );

                if ( 'true' == $date ) {
                    $post_html .= '<div class="entry-meta">';
                        $post_html .= '<span>' . get_the_time( get_option( 'date_format' ) ) . '</span>';
                    $post_html .= '</div>';
                }

                $post_html .= '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h2>';

                if ( 'true' == $excerpt ) {
                    $post_html .= '<div class="entry-excerpt">';
                        $post_html .= get_the_excerpt();
                    $post_html .= '</div>';
                }

        $post_html .= '</article>';

    endwhile;
    endif;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $post_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_post_carousel', 'adamas_post_carousel_shortcode' );