<?php
/**
 * Shortcode: Products Carousel
 *  
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_products_carousel_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'number'                        => '8',
        'order'                         => 'ASC',
        'orderby'                       => 'none',
        'include_cat'                   => '',
        'exclude_cat'                   => '',
        'product_types'                 => '',
        'options'                       => '',
        'offset'                        => '',
        
        // Setings
        'columns_lg'                    => '4',
        'columns_md'                    => '3',
        'columns_sm'                    => '2', 
        'columns_xs'                    => '1', 
        'items_space'                   => '30px',
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
        
        // Extra tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Declare variables
    $unique_id    = AdamasHelper::get_unique_id();
    $options      = explode( ',', $options );
    $produst_html = '';
    $build_css    = '';

     // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'products',
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
    $query_args = array(
        'posts_per_page' => $number,
        'post_status'    => 'publish',
        'post_type'      => 'product',
        'no_found_rows'  => 1,
        'order'          => $order,
        'meta_query'     => array(),
        'tax_query'      => array(),
    );

    if ( in_array( 'hide_free', $options ) ) {
        $query_args['meta_query'][] = array(
            'key'     => '_price',
            'value'   => 0,
            'compare' => '>',
            'type'    => 'DECIMAL',
        );
    }

    if ( in_array( 'hide_out_of_stock', $options ) ) {
        $query_args['meta_query'][] = array(
            'key'       => '_stock_status',
            'value'     => 'outofstock',
            'compare'   => 'NOT IN',
        );
    }

    $query_args['meta_query'][] = WC()->query->stock_status_meta_query();
    $query_args['meta_query']   = array_filter( $query_args['meta_query'] );

    if ( ! empty( $include_cat ) ) {
        $include_cat = explode( ',', $include_cat );
        $query_args['tax_query'][] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $query_args['tax_query'][] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'id', 
            'terms'    => $exclude_cat,
            'operator' => 'NOT IN',
        );
    }

    switch ( $product_types ) {
        case 'featured' :
            $query_args['meta_query'][] = array(
                'key'   => '_featured',
                'value' => 'yes'
            );
            break;
        case 'onsale' :
            $product_ids_on_sale    = wc_get_product_ids_on_sale();
            $product_ids_on_sale[]  = 0;
            $query_args['post__in'] = $product_ids_on_sale;
            break;
    }

    switch ( $orderby ) {
        case 'price' :
            $query_args['meta_key'] = '_price';
            $query_args['orderby']  = 'meta_value_num';
            break;
        case 'sales' :
            $query_args['meta_key'] = 'total_sales';
            $query_args['orderby']  = 'meta_value_num';
            break;
        case 'rand' :
            $query_args['orderby'] = 'rand';
            break;
        case 'ID' :
            $query_args['orderby'] = 'ID';
            break;
        case 'title' :
            $query_args['orderby'] = 'title';
            break;
        case 'name' :
            $query_args['orderby'] = 'name';
            break;
        case 'author' :
            $query_args['orderby'] = 'author';
            break;
        default :
            $query_args['orderby'] = 'date';
    }

    $products_query = new WP_Query( $query_args );

    // Products
    ob_start();

    while ( $products_query->have_posts() ) : $products_query->the_post();
            wc_get_template_part( 'content', 'product' );
    endwhile;

    $produst_html = ob_get_contents();
    ob_end_clean();

    // Reset the global $the_post as this query will have stomped on it
    woocommerce_reset_loop();

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $produst_html;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_products_carousel', 'adamas_products_carousel_shortcode' );