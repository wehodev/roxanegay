<?php
/**
 * Shortcode: Team
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_team_sortcode( $atts, $content = ngrid_ull ) {

    extract( shortcode_atts( array(

        // General tab
        'type'                          => 'wpus-carousel',
        'social'                        => 'true',
        'desc'                          => 'true',
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
        'items_space_bottom'            => '30px',
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
        'name_color'                    => '',
        'role_color'                    => '',
        'desc_color'                    => '',
        'social_color'                  => '',
        'social_background_color'       => '',
        'name_typography'               => '',
        'role_typography'               => '',
        'desc_typography'               => '',
        
        // Extend tab
        'el_id'                         => '',
        'el_class'                      => '',
        'el_hidden'                     => '',

    ), $atts ) );

    // Enqueue Google Font
    WpusVcHelper::get_google_font( $name_typography );
    WpusVcHelper::get_google_font( $role_typography );
    WpusVcHelper::get_google_font( $desc_typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';
    $team_html = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-team',
        $type,
        $align,
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
    $wrap_attr = array(
        'column-lg' => $columns_lg,
        'column-md' => $columns_md,
        'column-sm' => $columns_sm,
        'column-xs' => $columns_xs,
    );

    if ( 'wpus-grid' == $type ) {
        $wrap_attr['margin-right']  = intval( $items_space );
        $wrap_attr['margin-bottom'] = intval( $items_space_bottom );
        $wrap_attr['layout'] = 'fitRows';
    } elseif ( 'wpus-carousel' == $type ) {
        $wrap_attr['margin']   = intval( $items_space );
        $wrap_attr['autoplay'] = $autoplay ? 'true' : 'false';
        $wrap_attr['timeout']  = $autoplay;
        $wrap_attr['loop']     = $inifnity_loop;
        $wrap_attr['arrows']   = $arrows;
        $wrap_attr['dots']     = $dots;
    }

    $wrap_attr = AdamasHelper::get_html_attributes( $wrap_attr );

    // Style: Name
    $name_css = AdamasHelper::get_style( array(
        'color'      => $name_color,
        'typography' => $name_typography,
    ) );

    if ( $name_css ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-name{{$name_css}}";
    }

    // Style: Role
    $role_css = AdamasHelper::get_style( array(
        'color'      => $role_color,
        'typography' => $role_typography,
    ) );

    if ( $role_css ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-role{{$role_css}}";
    }

    // Style: Description
    $desc_css = AdamasHelper::get_style( array(
        'color'      => $desc_color,
        'typography' => $desc_typography,
    ) );

    if ( $desc_css  ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-desc{{$desc_css}}";
    }

    // Style: Social wrap
    $social_wrap_css = AdamasHelper::get_style( array(
        'background_color' => $social_background_color,
    ) );

    if ( $social_wrap_css  ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-social{{$social_wrap_css}}";
    }

    // Style: Social regular
    $social_regular_css = AdamasHelper::get_style( array(
        'color' => $social_color,
    ) );

    if ( $social_regular_css  ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-social a{{$social_regular_css}}";
    }

    // Style: Social hover
    $social_hover_css = AdamasHelper::get_style( array(
        'color'            => $social_color,
        'background_color' => AdamasHelper::hex2rgba( $social_color, '.1' ),
    ) );

    if ( $social_hover_css  ) {
        $build_css .= ".wpus-team.{$unique_id} .wpus-team-social a:hover{{$social_hover_css}}";
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
        'post_type'      => 'team',
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
            'taxonomy' => 'team_category',
            'field'    => 'id', 
            'terms'    => $include_cat,
        );
    }

    // Exclude categories
    if ( ! empty( $exclude_cat ) ) {
        $exclude_cat = explode( ',', $exclude_cat );
        $args['tax_query'][] = array(
            'taxonomy' => 'team_category',
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
        $img_id      = get_post_meta( $post->ID, 'adamas_team_image', true );
        $role        = get_post_meta( $post->ID, 'adamas_team_role', true );
        $description = get_post_meta( $post->ID, 'adamas_team_desc', true );
        $facebook    = get_post_meta( $post->ID, 'adamas_team_facebook', true );
        $twitter     = get_post_meta( $post->ID, 'adamas_team_twitter', true );
        $google      = get_post_meta( $post->ID, 'adamas_team_google', true );
        $linkedIn    = get_post_meta( $post->ID, 'adamas_team_linkedin', true );
        $instagram   = get_post_meta( $post->ID, 'adamas_team_instagram', true );
        $mail        = get_post_meta( $post->ID, 'adamas_team_email', true );

        // Build social
        $social_html = '';
        if ( $facebook )  $social_html .= '<a target="_blank" href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook"></i></a>';
        if ( $twitter )   $social_html .= '<a target="_blank" href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a>';
        if ( $google )    $social_html .= '<a target="_blank" href="' . esc_url( $google ) . '"><i class="fa fa-google-plus"></i></a>';
        if ( $linkedIn )  $social_html .= '<a target="_blank" href="' . esc_url( $linkedIn ) . '"><i class="fa fa-linkedin"></i></a>';
        if ( $instagram ) $social_html .= '<a target="_blank" href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i></a>';
        if ( $mail )      $social_html .= '<a target="_blank" href="' . esc_url( $mail ) . '"><i class="fa fa-envelope-o"></i></a>';

        $social_html = $social_html ? '<div class="wpus-team-social">' . $social_html . '</div>' : '';

        // Team class
        $team_class = AdamasHelper::get_html_class( array(
            'wpus-team-item',
            $social_html && 'true' == $social ? 'has-social' : '',
        ) );

        // Build testimonial
        $_html = '<div' . $team_class . '>';

            $_html .= '<div class="wpus-team-image">';
                if ( 'true' == $social ) $_html .= $social_html;
                $_html .= wp_get_attachment_image( $img_id, 'full' );
            $_html .= '</div>';

            $_html .= '<div class="wpus-team-content">';

                $_html .= '<h5 class="wpus-team-name">' . get_the_title() . '</h5>';
                $_html .= '<span class="wpus-team-role">' . esc_html( $role ) . '</span>';

                if ( $description && 'true' == $desc ) $_html .= '<div class="wpus-team-desc">' . esc_html( $description ) . '</div>';

            $_html .= '</div>';

        $_html .= '</div>';

        if ( 'wpus-grid' == $type ) {
            $team_html .= '<div class="wpus-grid-item">' . $_html . '</div>';
        } else {
            $team_html .= $_html;
        }

    endwhile;
    endif;

    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    // Get wrap
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';
        $output .= $team_html;       
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_team', 'adamas_team_sortcode' );