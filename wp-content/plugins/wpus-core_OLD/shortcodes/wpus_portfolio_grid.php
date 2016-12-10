<?php
/**
 * Shortcode: Portfolio Grid
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_portfolio_grid_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'image_size'                        => 'adamas-image-horizontal',
        'image_width'                       => '',
        'image_height'                      => '',
        
        // Query tab
        'number'                            => '8',
        'order'                             => 'ASC',
        'orderby'                           => 'none',
        'include_cat'                       => '',
        'exclude_cat'                       => '',
        'offset'                            => '',
        
        // Setings
        'columns_lg'                        => '4',
        'columns_md'                        => '3',
        'columns_sm'                        => '2', 
        'columns_xs'                        => '1', 
        'right_space'                       => '40px',
        'bottom_space'                      => '40px',
        
        // Title tab
        'title'                             => 'title-overlay',
        'title_appearance'                  => 'wpus-hover-show',
        'title_position'                    => 'wpus-position-cc',
        'title_align'                       => '',
        'title_color'                       => '',
        'title_hover_color'                 => '',
        'title_padding_top'                 => '',
        'title_padding_lr'                  => '',
        'categories'                        => 'false',
        'categories_color'                  => '',
        'title_typography'                  => '',
        'categories_typography'             => '',
        
        // Filter tab
        'filter'                            => '',
        'filter_text'                       => __( 'All', 'wpus-core' ),
        'filter_align'                      => '',
        'filter_margin_bottom'              => '',
        'filter_style'                      => 'style-minimal',
        'filter_color'                      => '',
        'filter_hover_color'                => '',
        'filter_background_color'           => '',
        'filter_hover_background_color'     => '',
        'filter_border_style'               => '',
        'filter_border_width'               => '',
        'filter_border_color'               => '',
        'filter_hover_border_color'         => '',
        'filter_border_radius'              => '',
        'filter_class'                      => '',
        'filter_typography'                 => '',
        
        // Pagination
        'pagination'                        => '',
        'pagination_align'                  => '',
        'pagination_margin_top'             => '',
        'pagination_style'                  => 'style-outline',
        'pagination_color'                  => '',
        'pagination_hover_color'            => '',
        'pagination_background_color'       => '',
        'pagination_hover_background_color' => '',
        'pagination_border_style'           => '',
        'pagination_border_width'           => '',
        'pagination_border_color'           => '',
        'pagination_hover_border_color'     => '',
        'pagination_border_radius'          => '',
        'pagination_class'                  => '',
        'pagination_typography'             => '',
        
        // Advanced tab
        'image_hover'                       => '',
        'overlay_appearance'                => 'wpus-hover-show',
        'overlay_type'                      => 'background',
        'overlay_color'                     => '',
        'overlay_top_color'                 => '',
        'overlay_bottom_color'              => '',
        
        // Extra tab
        'el_id'                             => '',
        'el_class'                          => '',
        'el_hidden'                         => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $title_typography );
    WpusVcHelper::get_google_font( $categories_typography );
    WpusVcHelper::get_google_font( $pagination_typography );

    // Declare variables
    $unique_id       = AdamasHelper::get_unique_id();
    $img_size        = WpusVcHelper::get_image_size( $image_size, $image_width, $image_height );
    $caption_html    = '';
    $build_css       = '';
    $filter_html     = '';
    $pagination_html = '';
    $project_html    = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-portfolio',
        'wpus-grid',
        $el_class,
        $el_hidden,
    );

    // Wrap atributes
    $wrap_attr = AdamasHelper::get_html_attributes( array(
        'margin-right'  => intval( $right_space ),
        'margin-bottom' => intval( $bottom_space ),
        'column-lg'     => $columns_lg,
        'column-md'     => $columns_md,
        'column-sm'     => $columns_sm,
        'column-xs'     => $columns_xs,
    ) );

    // Pagination class
    $pag_class = AdamasHelper::get_class( array(
        $pagination_align,
        $pagination_class,
        $unique_id,
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

    // Style: Pagination regular
    $pagination_regular_css = AdamasHelper::get_style( array(
        'color'            => $pagination_color,
        'border_color'     => $pagination_border_color,
        'background_color' => $pagination_background_color,
        'border_width'     => $pagination_border_width,
        'border_style'     => $pagination_border_style,
        'border_radius'    => $pagination_border_radius,
        'typography'       => $pagination_typography,
    ) );

    if ( $pagination_regular_css ) {
        $build_css .= ".site-pagination.{$unique_id} a, .site-pagination.{$unique_id} span, .wpus-load-more.{$unique_id} .wpus-button{{$pagination_regular_css}}";
    }

    // Style: Pagination hover
    $pagination_hover_css = AdamasHelper::get_style( array(
        'color'            => $pagination_hover_color,
        'border_color'     => $pagination_hover_border_color,
        'background_color' => $pagination_hover_background_color,
    ) );

    if ( $pagination_hover_css ) {
        $build_css .= ".site-pagination.{$unique_id} a:hover, .site-pagination.{$unique_id} .current, .wpus-load-more.{$unique_id} .wpus-button:hover{{$pagination_hover_css}}";
    }

    // Style: Pagination margin
    if ( $pagination_margin_top ) {
        $build_css  .= ".site-pagination.{$unique_id},.wpus-load-more.{$unique_id}{margin-top:{$pagination_margin_top}}";  
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
            $project_html .= '<a href="' . get_permalink() . '" class="wpus-rollover wow fadeIn">';

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

    // Get pagination
    if ( 'loadmore' == $pagination ) {
        $pagination_html = adamas_get_load_more( array(
            'query'        => $the_query,
            'type'         => 'portfolio',
            'wrap_class'   => $pag_class,
            'button_class' => $pagination_style,
        ) );
    } elseif ( 'pagination' == $pagination ) {
        $pagination_html = adamas_get_pagination( array(
            'query'        => $the_query,
            'wrap_class'   => $pag_class,
            'button_class' => $pagination_style,
        ) );
    }

    // Filter
    if ( $filter ) {
        $filter_html = do_shortcode( '[wpus_portfolio_filter include_cat="' . $include_cat . '" exclude_cat="' . $exclude_cat . '" style="' . $filter_style . '" align="' . $filter_align . '" margin_bottom="' . $filter_margin_bottom . '" text="' . $filter_text . '" color="' . $filter_color . '" hover_color="' . $filter_hover_color . '" background_color="' . $filter_background_color . '" hover_background_color="' . $filter_hover_background_color . '" border_style="' . $filter_border_style . '" border_width="' . $filter_border_color . '" border_color="' . $filter_border_color . '" hover_border_color="' . $filter_hover_border_color . '" border_radius="' . $filter_border_radius . '" el_class="' . $filter_class . '" typography="' . $filter_typography . '"]');
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = $filter_html;

    $output .= '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $project_html;       
    $output .= '</div>';

    $output .= $pagination_html;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Return shortcode
    return $output;

}

add_shortcode( 'wpus_portfolio_grid', 'adamas_portfolio_grid_shortcode' );