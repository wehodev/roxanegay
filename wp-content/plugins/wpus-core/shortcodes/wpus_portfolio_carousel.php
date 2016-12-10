<?php
/**
 * Shortcode: Portfolio Carousel
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_portfolio_carousel_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'image_size'                    => 'adamas-image-horizontal',
        'image_width'                   => '',
        'image_height'                  => '',
        
        // Query tab
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

        // Title tab
        'title'                         => 'title-overlay',
        'title_appearance'              => 'wpus-hover-show',
        'title_position'                => 'wpus-position-cc',
        'title_align'                   => '',
        'title_color'                   => '',
        'title_hover_color'             => '',
        'title_padding_top'             => '',
        'title_padding_lr'              => '',
        'categories'                    => 'false',
        'categories_color'              => '',
        'title_typography'              => '',
        'categories_typography'         => '',
        
        // Advanced tab
        'image_hover'                   => '',
        'overlay_appearance'            => 'wpus-hover-show',
        'overlay_type'                  => 'background',
        'overlay_color'                 => '',
        'overlay_top_color'             => '',
        'overlay_bottom_color'          => '',
        
        // Extra tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $title_typography );
    WpusVcHelper::get_google_font( $categories_typography );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $img_size     = WpusVcHelper::get_image_size( $image_size, $image_width, $image_height );
    $caption_html = '';
    $build_css    = '';
    $project_html = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-portfolio',
        'wpus-carousel',
        'true' == $arrows  ? $arrows_style : '',
        $arrows_appearance,
        $dots_position,
        $dots_appearance,
        $el_class,
        $el_hidden,
        $dots_hidden,
        $arrows_hidden,
    );

    // Wrap attributes
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

    // Style: Title wrap
    $title_wrap_css  = AdamasHelper::get_style( array(
        'padding_top'   => $title_padding_top,
        'padding_left'  => $title_padding_lr,
        'padding_right' => $title_padding_lr,
    ) );

    if ( $title_wrap_css ) {
        $build_css .= ".wpus-portfolio.{$unique_id} .wpus-title{{$title_wrap_css}}";
    }

    // Style: Title regular
    $title_regular_css  = AdamasHelper::get_style( array(
        'color'      => $title_color,
        'typography' => $title_typography,
    ) );

    if ( $title_regular_css ) {
        $build_css .= ".wpus-portfolio.{$unique_id} .wpus-title h3{{$title_regular_css}}";
    }

    // Style: Title hover
    if ( $title_hover_css = AdamasHelper::get_style( array( 'color' => $title_hover_color ) ) ) {
        $build_css .= ".wpus-portfolio.{$unique_id} .wpus-rollover:hover .wpus-title h3{{$title_hover_css}}";
    }

    // Style: Categories
    $categories_css  = AdamasHelper::get_style( array(
        'color'                 => $categories_color,
        'categories_typography' => $categories_typography,
    ) );

    if ( $categories_css ) {
        $build_css .= ".wpus-portfolio.{$unique_id} .wpus-title p{{$categories_css}}";      
    }

    // Style: Overlay color
    $overlay_css = AdamasHelper::get_style( array(
        'background_color' => $overlay_color,
        'gradient'         => $overlay_top_color . '|' . $overlay_bottom_color,
    ) );

    if ( $overlay_css ) {
        $build_css .= ".wpus-portfolio.{$unique_id} .wpus-overlay{{$overlay_css}}";
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
    if ( get_query_var('paged') ) { 
        $paged = get_query_var('paged'); 
    } elseif ( get_query_var('page') ) { 
        $paged = get_query_var('page'); 
    } else { 
        $paged = 1; 
    }   

    $args = array(
        'post_status'    => 'publish',
        'post_type'      => 'portfolio',
        'posts_per_page' => esc_attr( $number ),
        'orderby'        => esc_attr( $orderby ),
        'order'          => esc_attr( $order ),
        'offset'         => $offset,
        'paged'          => $paged,
        'meta_query'     => array(),
        'tax_query'      => array(),
    );

    // Include categories
    if ( ! empty( $include_cat ) ) {
        $include_cat = explode( ',', $include_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'portfolio_category',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    // Exclude categories
    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'portfolio_category',
            'field'    => 'id', 
            'terms'    => $exclude_cat,
            'operator' => 'NOT IN',
        );
    }
    
    // Get QUERY                             
    $the_query = new WP_Query( $args );

    // Build items
    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        global $post;

        // Project class
        $project_class = array(
            'wpus-grid-item',
            'wpus-portfolio-item',
        );

        // Title class
        $title_class = AdamasHelper::get_html_class( array(
            'wpus-title',
            $title,
            'title-overlay' == $title ? $title_position : '',
            'title-overlay' == $title ? $title_appearance : '',
            $title_align,
        ) );

        // Build categories
        $categories_html = '';
        $terms = get_the_terms( $post->id, 'portfolio_category' );

        if ( ! is_wp_error( $terms ) ) {
            $_terms = array();
            foreach ( $terms as $term ) {
                $project_class[] = strtolower( $term->slug );
                $_terms[]        = esc_html( $term->name );
            }
            $categories_html = '<p>' . implode( ', ', $_terms ) . '</p>';  
        }

        // Build title
        $title_html = '';
        if ( $title ) {
            $title_html .= '<div' . $title_class . '>';
                if ( 'true' == $categories ) $title_html .= $categories_html;
                $title_html .= '<h3>' . get_the_title() . '</h3>';
            $title_html .= '</div>';
        }

        // Overlay
        $new_overlay_color = get_post_meta( $post->ID, 'adamas_portfolio_overlay_color', true );
        $new_overlay_color = $new_overlay_color ? ' style="background-color:' . $new_overlay_color . '"' : '';
        $overlay           = $overlay_appearance ? '<span class="wpus-overlay ' . $overlay_appearance . '" data-type="' . $overlay_type . '"' . $new_overlay_color . '></span>' : '';

        // Hover image
        $image_hover_id  = get_post_meta( $post->ID, 'portfolio_hover-thumbnail_thumbnail_id', true );
        $image_hover_src = '';

        if ( $image_hover_id ) {
            $image_hover_src = wp_get_attachment_image( $image_hover_id, $img_size, false, array( 'data-hover' => WpusVcHelper::get_hover_image_class( $image_hover ), 'data-class' => 'image-hover' ) );
        }

        // Get project class
        $project_class = AdamasHelper::get_html_class( $project_class );

        // Project
        $project_html .= '<div' . $project_class . '>';
            $project_html .= '<a href="' . get_permalink() . '" class="wpus-rollover">';

                $project_html .= '<div class="wpus-portfolio-thumb">';
                    $project_html .= wp_get_attachment_image( get_post_thumbnail_id(), $img_size, false, array( 'data-hover' => $image_hover  ) );
                    $project_html .= $image_hover_src;
                    $project_html .= $overlay;
                    if ( 'title-overlay' == $title ) $project_html .= $title_html;
                $project_html .= '</div>';

                if ( 'title-overlay' != $title ) $project_html .= $title_html;

            $project_html .= '</a>';
        $project_html .= '</div>';

    endwhile; endif;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $project_html;
    $output .= '</div>';


    // Return shortcode
    return $output;

}

add_shortcode( 'wpus_portfolio_carousel', 'adamas_portfolio_carousel_shortcode' );