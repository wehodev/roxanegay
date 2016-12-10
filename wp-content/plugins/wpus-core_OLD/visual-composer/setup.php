<?php
/**
 * Setup Visual Composer
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Set templates directory
vc_set_shortcodes_templates_dir( ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/templates/'); 

/**
 * Remove VC Teaser Metabox
 *
 * @since 1.0
 */
add_action( 'do_meta_boxes', 'adamas_vc_remove_teaserbox' );
if ( ! function_exists( 'adamas_vc_remove_teaserbox' ) ) :
	function adamas_vc_remove_teaserbox() {
		$post_types = get_post_types( '', 'names' ); 
		foreach ( $post_types as $post_type ) {
			remove_meta_box( 'vc_teaser',  $post_type, 'side' );
		}
	}
endif;

/**
 * Remove Grid Elements from Menu
 *
 * @since 1.0
 */
add_action( 'admin_menu', 'adamas_vc_grid_elements_menu' );
if ( ! function_exists( 'adamas_vc_grid_elements_menu' ) ) :
	function adamas_vc_grid_elements_menu(){
		remove_menu_page( 'edit.php?post_type=vc_grid_item' );
	}
endif;

/**
 * Remove Default Templates
 *
 * @since 1.0
 */
add_filter( 'vc_load_default_templates', 'adamas_vc_default_templates' );
if ( ! function_exists( 'adamas_vc_default_templates' ) ) :
	function adamas_vc_default_templates( $data ) {
	    return array();
	}
endif;

/**
 * Remove Generator
 *
 * @since 1.0
 */
add_action( 'init', 'adamas_vc_remove_meta_generator', 100 );
if ( ! function_exists( 'adamas_vc_remove_meta_generator' ) ) :
	function adamas_vc_remove_meta_generator() {
	    remove_action( 'wp_head', array( visual_composer(), 'addMetaData' ) );
	}
endif;

/**
 * Remove unused elements
 *
 * @since 1.0
 */
add_action( 'init', 'adamas_vc_remove_element' );
if ( ! function_exists( 'adamas_vc_remove_element' ) ) :
	function adamas_vc_remove_element() {

		vc_remove_element( 'vc_toggle' );
		vc_remove_element( 'vc_message' );
		vc_remove_element( 'vc_video' );
		vc_remove_element( 'vc_empty_space' );
		vc_remove_element( 'vc_pie' );
		vc_remove_element( 'vc_progress_bar' );
		vc_remove_element( 'vc_wp_search' );
		vc_remove_element( 'vc_wp_meta' );
		vc_remove_element( 'vc_wp_recentcomments' );
		vc_remove_element( 'vc_wp_calendar' );
		vc_remove_element( 'vc_wp_pages' );
		vc_remove_element( 'vc_wp_tagcloud' );
		vc_remove_element( 'vc_wp_custommenu' );
		vc_remove_element( 'vc_wp_text' );
		vc_remove_element( 'vc_wp_posts' );
		vc_remove_element( 'vc_wp_links' );
		vc_remove_element( 'vc_wp_categories' );
		vc_remove_element( 'vc_wp_archives' );
		vc_remove_element( 'vc_wp_rss' );
		vc_remove_element( 'vc_gmaps' );
		vc_remove_element( 'vc_single_image' );
		vc_remove_element( 'vc_posts_slider' );
		vc_remove_element( 'vc_posts_grid' );
		vc_remove_element( 'vc_carousel' );
		vc_remove_element( 'vc_cta_button' );
		vc_remove_element( 'vc_cta_button2' );
		vc_remove_element( 'vc_button' );
		vc_remove_element( 'vc_button2' );
		vc_remove_element( 'vc_flickr' );
		vc_remove_element( 'vc_gallery' );
		vc_remove_element( 'vc_images_carousel' );
		vc_remove_element( 'vc_text_separator' );
		vc_remove_element( 'vc_separator' );
		vc_remove_element( 'vc_btn' );
		vc_remove_element( 'vc_cta' );
		vc_remove_element( 'vc_teaser_grid' );
		vc_remove_element( 'vc_custom_heading' );
		vc_remove_element( 'vc_media_grid' );
		vc_remove_element( 'vc_masonry_grid' );
		vc_remove_element( 'vc_masonry_media_grid' );
		vc_remove_element( 'vc_icon' );
		vc_remove_element( 'vc_basic_grid' );
		vc_remove_element( 'vc_tour' );
		vc_remove_element( 'vc_tta_accordion' );
		vc_remove_element( 'vc_tta_tour' );
		vc_remove_element( 'vc_tta_tabs' );
		vc_remove_element( 'vc_tta_pageable' );
		vc_remove_element( 'vc_tta_section' );

		if ( class_exists( 'WooCommerce' ) ) {
			vc_remove_element( 'woocommerce_cart' );
			vc_remove_element( 'woocommerce_checkout' );
			vc_remove_element( 'woocommerce_my_account' );
			vc_remove_element( 'recent_products' );
			vc_remove_element( 'product_category' );
			vc_remove_element( 'products' );
			vc_remove_element( 'product_page' );
			vc_remove_element( 'woocommerce_order_tracking' );
			vc_remove_element( 'product_categories' );
			vc_remove_element( 'product_category' );
			vc_remove_element( 'recent_products' );
			vc_remove_element( 'featured_products' );
			vc_remove_element( 'sale_products' );
			vc_remove_element( 'best_selling_products' );
			vc_remove_element( 'top_rated_products' );
			vc_remove_element( 'product' );
			vc_remove_element( 'product_attribute' );
			vc_remove_element( 'add_to_cart' );
			vc_remove_element( 'add_to_cart_url' );
		}

	}
endif;

/**
 * Replace the classes for the vc_row and vc_column shortcodes
 *
 * @since 1.0
 */
add_filter( 'vc_shortcodes_css_class', 'adamas_vc_custom_columns_css_classes', 10, 2 );
if ( ! function_exists( 'adamas_vc_custom_columns_css_classes' ) ) :
	function adamas_vc_custom_columns_css_classes( $class_string, $tag ) {

		if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
		    $class_string = preg_replace( '/vc_col\-(xs|sm|md|lg)\-(\d{1,2})/', 'col-$1-$2', $class_string );
		    $class_string = preg_replace( '/vc_col\-(xs|sm|md|lg)\-offset-(\d{1,2})/', 'col-$1-offset-$2', $class_string );
		    $class_string = str_replace( 'vc_hidden-', 'hidden-', $class_string );
		}

		return $class_string;
	}
endif;

/**
 * Border radius filter
 *
 * @since 1.0
 */
add_filter( 'vc_css_editor_border_radius_options_data', 'adamas_vc_border_radius_filter' );
function adamas_vc_border_radius_filter() {
	return array(
	    ''     => __( 'None', 'wpus-core' ),
	    '0px'  => '0px',
	    '1px'  => '1px',
	    '2px'  => '2px',
	    '3px'  => '3px',
	    '4px'  => '4px',
	    '5px'  => '5px',
	    '10px' => '10px',
	    '15px' => '15px',
	    '20px' => '20px',
	    '25px' => '25px',
	    '30px' => '30px',
	    '35px' => '35px',
	    '50%'  => '50%',
	    '100%' => '100%',
	);
}