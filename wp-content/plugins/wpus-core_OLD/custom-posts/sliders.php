<?php
/**
 * Sliders Post Type
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Registers the sliders custom post type
 * 
 * @since 1.0
 */
add_action( 'init', 'adamas_sliders_post_type', 4 );

function adamas_sliders_post_type() {

	$labels = apply_filters( 'adamas_slider_post_type_labels', array(
        'name'               => esc_html__( 'Slider Items', 'wpus-core' ),
	    'singular_name'      => esc_html__( 'Slider Item', 'wpus-core' ),
	    'add_new'            => esc_html__( 'Add New', 'wpus-core' ),
	    'add_new_item'       => esc_html__( 'Add New Slider Item', 'wpus-core' ),
	    'edit_item'          => esc_html__( 'Edit Slider Item', 'wpus-core' ),
	    'new_item'           => esc_html__( 'New Slider Item', 'wpus-core' ),
	    'all_items'          => esc_html__( 'All Slider Items', 'wpus-core' ),
	    'view_item'          => esc_html__( 'View Slider Item', 'wpus-core' ),
	    'search_items'       => esc_html__( 'Search Slider Items', 'wpus-core' ),
	    'not_found'          => esc_html__( 'No Slider Items found', 'wpus-core' ),
	    'not_found_in_trash' => esc_html__( 'No Slider Items found in Trash', 'wpus-core' ),
	    'menu_name'          => esc_html__( 'Adamas Sliders', 'wpus-core' ),
    ) );

    $args = apply_filters( 'adamas_slider_post_type_args', array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'site-sliders', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'custom-fields' ),
        'menu_icon'          => 'dashicons-images-alt2',
    ) );

	register_post_type( 'sliders', $args );

}

/**
 * Add columns to sliders edit screen
 * 
 * @since 1.0
 */
add_filter( 'manage_edit-sliders_columns', 'adamas_add_sliders_shortcode_column', 10, 1 );

function adamas_add_sliders_shortcode_column( $columns ) {
    $shortcode = array( 'shortcode' => esc_html__( 'Shortcode','wpus-core' ) );
    $columns   = array_slice( $columns, 0, 2, true ) + $shortcode + array_slice( $columns, 1, NULL, true );
    return $columns;
}

add_action( 'manage_sliders_posts_custom_column', 'adamas_sliders_display_shortcode', 10, 1 );

function adamas_sliders_display_shortcode( $column ) {

    global $post;

    switch ( $column ) {
        case 'shortcode':
            echo '<span>[adamas_slider id="' . esc_attr( $post->ID ) . '"]</span>';
            break;
    }

}