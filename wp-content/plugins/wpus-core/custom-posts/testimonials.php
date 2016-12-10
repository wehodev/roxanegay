<?php
/**
 * Testimonials Post Type
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Registers the testimonials custom post type
 * 
 * @since 1.0
 */
add_action( 'init', 'adamas_testimonials_post_type', 4 );

function adamas_testimonials_post_type() {

   $labels = apply_filters( 'wpus_testimonials_post_type_labels', array(
        'name'               => esc_html__( 'Testimonial Items', 'wpus-core' ),
        'singular_name'      => esc_html__( 'Testimonial Item', 'wpus-core' ),
        'add_new'            => esc_html__( 'Add New', 'wpus-core' ),
        'add_new_item'       => esc_html__( 'Add New Testimonial Item', 'wpus-core' ),
        'edit_item'          => esc_html__( 'Edit Testimonial Item', 'wpus-core' ),
        'new_item'           => esc_html__( 'New Testimonial Item', 'wpus-core' ),
        'all_items'          => esc_html__( 'All Testimonial Items', 'wpus-core' ),
        'view_item'          => esc_html__( 'View Testimonial Item', 'wpus-core' ),
        'search_items'       => esc_html__( 'Search Testimonial Items', 'wpus-core' ),
        'not_found'          => esc_html__( 'No Testimonial Items found', 'wpus-core' ),
        'not_found_in_trash' => esc_html__( 'No Testimonial Items found in Trash', 'wpus-core' ),
        'menu_name'          => esc_html__( 'Testimonials', 'wpus-core' )
    ) );

    $args = apply_filters( 'wpus_testimonials_post_type_args', array(
        'labels'              => $labels,
        'taxonomies'          => array( 'testimonials_category' ),
        'public'              => true,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'testimonials-item', 'with_front' => false ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor' ),
        'menu_position'       => 20,
        'exclude_from_search' => true,
        'menu_icon'           => 'dashicons-format-status',
    ) );

    register_post_type( 'testimonials', $args );

    $tax_labels = apply_filters( 'wpus_testimonials_post_type_tax_labels', array(
        'name'              => esc_html__( 'Categories', 'wpus-core' ),
        'singular_name'     => esc_html__( 'Category', 'wpus-core' ),
        'search_items'      => esc_html__( 'Search Categories', 'wpus-core' ),
        'all_items'         => esc_html__( 'All Categories', 'wpus-core' ),
        'parent_item'       => esc_html__( 'Parent Category', 'wpus-core' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'wpus-core' ),
        'edit_item'         => esc_html__( 'Edit Category', 'wpus-core' ),
        'update_item'       => esc_html__( 'Update Category', 'wpus-core' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'wpus-core' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'wpus-core' ),
        'menu_name'         => esc_html__( 'Categories', 'wpus-core' )
    ) );

   $tax_args = apply_filters( 'wpus_testimonials_post_type_tax_args', array(
        'labels'            => $tax_labels,
        'rewrite'           => array( 'slug' => 'testimonials-category', 'with_front' => false ),
        'hierarchical'      => true,
        'query_var'         => 'testimonials-category',
        'show_ui'           => true,
        'show_admin_column' => true,
    ) );

    register_taxonomy( 'testimonials_category', 'testimonials', $tax_args );

}

/**
 * Add columns to testimonials edit screen
 * 
 * @since 1.0
 */
add_filter( 'manage_edit-testimonials_columns', 'wpus_add_testimonials_admin_columns', 10, 1 );

function wpus_add_testimonials_admin_columns( $columns ) {
    $image      = array( 'testimonial_image'      => esc_html__( 'Photo','wpus-core' ) );
    $profession = array( 'testimonial_profession' => esc_html__( 'Profession','wpus-core' ) );
    return array_slice( $columns, 0, 2, true ) + $image + $profession + array_slice( $columns, 1, NULL, true );
}

add_action( 'manage_testimonials_posts_custom_column', 'wpus_testimonials_admin_columns', 10, 1 );

function wpus_testimonials_admin_columns( $column ) {

    global $post;

    switch ( $column ) {

        case 'testimonial_image':
            $thumb_id = get_post_meta( $post->ID, 'adamas_testimonial_image', true );
            $thumb    = wp_get_attachment_image_src( $thumb_id, array( '40', '40' ) );
            echo '<img src="'. esc_url( $thumb[0] ) . '" alt="" />';
            break;

        case 'testimonial_profession':
            $prof = get_post_meta( $post->ID, 'adamas_testimonial_profession', true );
            echo esc_html( $prof );
            break;
    }

}

/**
 * Adds taxonomy filters to the testimonials admin page
 * 
 * @since 1.0
 */
add_action( 'restrict_manage_posts', 'wpus_testimonials_add_admin_taxonomy_filters' );

function wpus_testimonials_add_admin_taxonomy_filters() {

    global $typenow;
    
    // An array of all the taxonomyies you want to display. Use the taxonomy name or slug 
    $taxonomies = array( 'testimonials_category' );
 
    // Must set this to the post type you want the filter(s) displayed on
    if ( $typenow == 'testimonials' ) {
 
        foreach ( $taxonomies as $tax_slug ) {

            $current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
            $tax_obj          = get_taxonomy( $tax_slug );
            $tax_name         = $tax_obj->labels->name;
            $terms            = get_terms( $tax_slug );

            if ( count( $terms ) > 0 ) {

                echo '<select name="' . esc_attr( $tax_slug ) . '" id="' . esc_attr( $tax_slug ) . '" class="postform">';
                
                    echo '<option value="">' . esc_html( $tax_name ) . '</option>';

                    foreach ( $terms as $term ) {
                        echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count . ')</option>';
                    }

                echo '</select>';
            }

        }
    }
}