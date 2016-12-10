<?php
/**
 * Core theme functions - very important! Do not ever edit this file!
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return theme data
 * 
 * @since 1.0
 */
function adamas_get_data( $id, $param = false, $fallback = false ) {

    // Get global theme data
    global $adamas_data;
    
    if ( false == $fallback ) {
        $fallback = '';
    }

    // Get value
    $data = ( isset( $adamas_data[$id] ) && '' !== $adamas_data[$id] ) ? $adamas_data[$id] : $fallback;

    // Get param
    if ( ! empty( $adamas_data[$id] ) && $param ) {
        $data = isset( $adamas_data[$id][$param] ) && '' != $adamas_data[$id][$param] ? $adamas_data[$id][$param]  : $fallback ;
    }

    // Return
    return $data;
}

/**
 * Echo theme data
 * 
 * @since 1.0
 */
function adamas_data( $id, $param = false, $fallback = false ) {
    echo adamas_get_data( $id, $param, $fallback );
}

/**
 * Return meta box data
 *
 * @since 1.0
 */  
function adamas_get_meta_data( $id, $param = false, $fallback = false ) {

    // Return if $id and adamas_get_page_id() is empty
    if ( empty( $id ) && adamas_get_page_id() ) {
        return false;
    }
    
    // Get meta data value
    $data = get_post_meta( adamas_get_page_id(), "adamas_{$id}", true );

    if ( $param && isset( $data[$param] ) ) {
        $data = $data[$param];
    }

    // Get theme data value
    if ( empty( $data ) || 'default' == $data ) {
        $data = adamas_get_data( $id, $param, $fallback );
    }

    // Return
    if ( 'no' === $data || empty( $data ) ) {
        return false;
    } else {
        return $data;
    }
    
}

/**
 * Return current page ID
 *
 * @since 1.0
 */
function adamas_get_page_id() {

    global $wp_query;
    $id = $wp_query->get_queried_object_id();

    // WooCommerce
    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        if ( is_shop() || is_product_category() || is_product_tag() ) {
            $id = get_option( 'woocommerce_shop_page_id' );
        } elseif ( is_cart() ) {
            $id = get_option( 'woocommerce_cart_page_id' );
        } elseif ( is_checkout() ) {
            $id = get_option( 'woocommerce_checkout_page_id' );
        } elseif ( is_account_page() ) {
            $id = get_option( 'woocommerce_myaccount_page_id' );
        } elseif ( is_product() ) {
            $id = $id;
        }
    } 

    // Front page
    else if ( is_front_page() ) {
        $id = get_option( 'page_on_front' );
    }

    // Blog page
    else if ( is_home() ) {
        $id = get_option( 'page_for_posts' );
    }

    // Return
    return $id;

}

/**
 * Return page layout
 *
 * @since 1.0
 */
function adamas_get_page_layout() {

    // WooCommerce
    if ( ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) ) {
       $layout = adamas_get_data( 'shop_layout' );
    } 

    // Blog page
    else if ( is_home() && ! is_singular( 'page' ) ) {
        $layout = adamas_get_data( 'blog_layout' );
    }

    // Portfolio single
    else if ( is_singular( 'portfolio' ) ) {
        $layout = 'no-sidebar';
    }

    // Product single
    else if ( is_singular( 'product' ) ) {
        $layout = 'no-sidebar';
    }

    // Page
    else if ( is_page() ) {
        $layout = adamas_get_meta_data( 'page_layout' );
    }

    // Single post
    else if ( is_single() ) {
        $layout = adamas_get_data( 'post_layout' );
    }

    // Search page
    else if ( is_search() ) {
        $layout = adamas_get_data( 'search_layout' );
    }

    // Archive page
    if ( is_archive() ) {
        $layout = adamas_get_data( 'blog_layout' );
    }

    // Set default sidebar position
    if ( empty( $layout ) ) {
        $layout = 'no-sidebar';
    }

    if ( isset( $_GET['page_layout'] ) ) {
        $layout = esc_attr( $_GET['page_layout'] );
    }

    // Return page layout
    return apply_filters( 'adamas_page_layout', $layout );

}

/**
 * Return sidebar name
 *
 * @since 1.0
 */
function adamas_get_sidebar_name() {

    // WooCommerce
    if ( ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) ) {
       $name = 'sidebar-shop';
    } 

    // Blog page
    else if ( is_home() && ! is_singular( 'page' ) ) {
        $name = 'sidebar-blog';
    }

    // Search page
    else if ( is_search() ) {
        $name = adamas_get_data( 'search_sidebar' );
    }

    // Single post
    else if ( is_single() ) {
        $name = adamas_get_data( 'post_sidebar' );
    }

    // Page
    else if ( is_page() ) {
        $name = adamas_get_meta_data( 'page_sidebar' );
    }

    // Archive page
    else if ( is_archive() ) {
        $name = 'sidebar-blog';
    }

    // Default sidebar name
    if ( empty( $name ) ) {
        $name = 'sidebar-page';
    }

    // Return sidebar name
    return apply_filters( 'adamas_sidebar_name', $name );
}

/**
 * Check to see if the Visual Composer is enabled on a specific page
 *
 * @since 1.0
 */
function adamas_has_composer() {

    if ( is_archive() || is_search() ) {
        return false;
    }

    $content = get_post_field( 'post_content', adamas_get_page_id() );

    if ( $content && strpos( $content, 'vc_row' ) ) {
        return true;
    } else {
        return false;
    }

}

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0
 */ 
add_filter( 'body_class', 'adamas_core_body_class' );
function adamas_core_body_class( $classes ) {

    // Check if the Visual Composer is being used on this page
    if ( adamas_has_composer() ) {
        $classes[] = 'has-composer';
    }

    // Sidebar position
    $classes[] = adamas_get_page_layout();

    // Top Bar
    if ( adamas_get_meta_data( 'top_bar' ) || ! AdamasHeader::has_transparent() ) {
        $classes[] = 'has-top-bar';
    }

    // Header sticky
    if ( adamas_get_meta_data( 'header_sticky' ) ) {
        $classes[] = 'has-sticky-header';
    }

    // Header Type
    $classes[] = 'has-' . AdamasHeader::get_type();

    // Menu Type
    $classes[] = 'has-' . AdamasHeader::get_menu_type();

    return $classes;

}

/**
 * Print footer CSS
 * 
 * @since 1.0.0
 */
add_action( 'wp_footer', 'adamas_print_footer_css' );
function adamas_print_footer_css() {

    global $adamas_global_array;

    if ( ! empty( $adamas_global_array['style'] ) ) {

        $return = '';
        
        foreach ( $adamas_global_array['style'] as $style_code ) {
            $return .= $style_code;
        }

        $return = AdamasHelper::get_minify_css( $return );
        $return = apply_filters( 'adamas_footer_css', $return );
        echo '<style id="wpus-footer-dynamic-css" type="text/css">' . $return . '</style>' . "\n";
    }
}