<?php
/**
 * Shortcode: Clients
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_clients_shortcode( $atts, $content = null ) {

    // Extract shortcode attributes
    extract( shortcode_atts( array(

        // General tab
        'type'                          => 'wpus-carousel',
        
        // Query tab
        'number'                        => '8',
        'order'                         => 'ASC',
        'orderby'                       => 'none',
        'include_cat'                   => '',
        'exclude_cat'                   => '',
        'offset'                        => '',
        
        // Setings tab
        'columns_lg'                    => '5',
        'columns_md'                    => '4',
        'columns_sm'                    => '3', 
        'columns_xs'                    => '2', 
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
        
        // Style tab
        'padding_tb'                    => '',
        'padding_lr'                    => '',
        'background_color'              => '',
        'border_style'                  => '',
        'border_width'                  => '',
        'border_color'                  => '',
        
        // Extend tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',
        
    ), $atts ) );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';
    $logo_html = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-clients',
        $type,
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

    $wrap_attr = AdamasHelper::get_html_attributes( $wrap_attr );

    // Style: Logo regular
    $logo_css = AdamasHelper::get_style( array(
        'padding_top'      => $padding_tb,
        'padding_bottom'   => $padding_tb,
        'padding_left'     => $padding_lr,
        'padding_right'    => $padding_lr,
        'background_color' => $background_color,
        'border_style'     => $border_style,
        'border_width'     => $border_width,
        'border_color'     => $border_color,
    ) );

    if ( $logo_css ) {
        $build_css .= ".wpus-clients.{$unique_id} .wpus-client{{$logo_css}}";
    }

    // Style: Logo hover
    $hover_logo_css = AdamasHelper::get_style( array(
        'padding_top'    => $padding_tb,
        'padding_bottom' => $padding_tb,
        'padding_left'   => $padding_lr,
        'padding_right'  => $padding_lr,
    ) );

    if ( $hover_logo_css ) {
        $build_css .= ".wpus-clients.{$unique_id} .hover-logo{{$hover_logo_css}}";
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
        'post_type'      => 'clients',
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
            'taxonomy' => 'clients_category',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    // Exclude categories
    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'clients_category',
            'field'    => 'id', 
            'terms'    => $exclude_cat,
            'operator' => 'NOT IN',
        );
    }
    
    // Get QUERY              
    $the_query = new WP_Query( $args );

    // Build logos
    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        global $post;

        // Get data
        $logo_id     = get_post_meta( $post->ID, 'adamas_client_logo', true );
        $logo_url    = get_post_meta( $post->ID, 'adamas_client_url', true );
        $logo_target = get_post_meta( $post->ID, 'adamas_client_target', true );

        // Logo image
        $img  = wp_get_attachment_image_src( $logo_id, 'full' );
        $logo = '<img src="' . esc_url( $img[0] ) . '" alt="' . esc_attr( get_the_title() ) . '" />';

        // Link
        if ( $logo_url ) {
            $logo = '<a href="' . esc_url( $logo_url ) . '" class="wpus-client" target="' . esc_attr( $logo_target ) . '">' . $logo . '</a>';
        } else {
            $logo = '<div class="wpus-client" >' . $logo . '</div>';
        }

        $logo_html .= '<div class="wpus-grid-item">' . $logo . '</div>';

    endwhile;
    endif;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= AdamasHelper::do_kses( $logo_html );
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_clients', 'adamas_clients_shortcode' );