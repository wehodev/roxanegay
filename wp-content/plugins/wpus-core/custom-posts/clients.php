<?php
/**
 * Clients Post Type
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Registers the clients custom post type
 * 
 * @since 1.0
 */
add_action( 'init', 'adamas_clients_post_type', 4 );

function adamas_clients_post_type() {

    $labels = apply_filters( 'adamas_clients_post_type_labels', array(
        'name'               => esc_html__( 'Client Items', 'wpus-core' ),
        'singular_name'      => esc_html__( 'Client Item', 'wpus-core' ),
        'add_new'            => esc_html__( 'Add New', 'wpus-core' ),
        'add_new_item'       => esc_html__( 'Add New Client Item', 'wpus-core' ),
        'edit_item'          => esc_html__( 'Edit Client Item', 'wpus-core' ),
        'new_item'           => esc_html__( 'New Client Item', 'wpus-core' ),
        'all_items'          => esc_html__( 'All Client Items', 'wpus-core' ),
        'view_item'          => esc_html__( 'View Client Item', 'wpus-core' ),
        'search_items'       => esc_html__( 'Search Client Items', 'wpus-core' ),
        'not_found'          => esc_html__( 'No Client Items found', 'wpus-core' ),
        'not_found_in_trash' => esc_html__( 'No Client Items found in Trash', 'wpus-core' ),
        'menu_name'          => esc_html__( 'Clients', 'wpus-core' ),
    ) );

    $args = apply_filters( 'adamas_clients_post_type_args', array(
        'labels'              => $labels,
        'taxonomies'          => array( 'clients_category' ),
        'public'              => true,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'client-item', 'with_front' => false ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 20,
        'supports'            => array( 'title' ),
        'menu_icon'           => 'dashicons-screenoptions',
        'exclude_from_search' => true,
    ) );

    register_post_type( 'clients', $args );

    $tax_labels = apply_filters( 'adamas_clients_post_type_tax_labels', array(
        'name'              => esc_html__( 'Client Categories', 'wpus-core' ),
        'singular_name'     => esc_html__( 'Client Category', 'wpus-core' ),
        'search_items'      => esc_html__( 'Search Categories', 'wpus-core' ),
        'all_items'         => esc_html__( 'All Categories', 'wpus-core' ),
        'parent_item'       => esc_html__( 'Parent Category', 'wpus-core' ),
        'parent_item_colon' => esc_html__( 'Parent Category:', 'wpus-core' ),
        'edit_item'         => esc_html__( 'Edit Category', 'wpus-core' ),
        'update_item'       => esc_html__( 'Update Category', 'wpus-core' ),
        'add_new_item'      => esc_html__( 'Add New Category', 'wpus-core' ),
        'new_item_name'     => esc_html__( 'New Category Name', 'wpus-core' ),
        'menu_name'         => esc_html__( 'Categories', 'wpus-core' ),
    ) );

    $tax_args = apply_filters( 'adamas_clients_post_type_tax_args', array(
        'labels'            => $tax_labels,
        'rewrite'           => array( 'slug' => 'clients-category', 'with_front' => false ),
        'hierarchical'      => true,
        'query_var'         => 'clients-category',
        'show_ui'           => true,
        'show_admin_column' => true,
    ) );

    register_taxonomy( 'clients_category', 'clients', $tax_args );
}

/**
 * Add columns to clients edit screen
 * 
 * @since 1.0
 */
add_filter( 'manage_edit-clients_columns', 'adamas_add_clients_admin_columns', 10, 1 );

function adamas_add_clients_admin_columns( $columns ) {
    $image = array( 'client_image' => esc_html__( 'Logo','wpus-core' ) );
    $url   = array( 'client_url'   => esc_html__( 'URL','wpus-core' ) );
    return array_slice( $columns, 0, 2, true ) + $image + $url + array_slice( $columns, 1, NULL, true );
}

add_action( 'manage_clients_posts_custom_column', 'adamas_clients_display_admin_columns', 10, 1 );

function adamas_clients_display_admin_columns( $column ) {

    global $post;

    switch ( $column ) {
        case 'client_image':
            $thumb_id = get_post_meta( $post->ID, 'adamas_client_logo', true );
            $thumb    = wp_get_attachment_image_src( $thumb_id, array( '80', '60' ) );
            echo '<img src="'. esc_url( $thumb[0] ) . '" alt="" />';
            break;
        case 'client_url':
            $prof = get_post_meta( $post->ID, 'adamas_client_url', true );
            echo esc_html( $prof );
            break;

    }
}

/**
 * Adds taxonomy filters to the clients admin page
 * 
 * @since 1.0
 */
add_action( 'restrict_manage_posts', 'adamas_clients_add_admin_taxonomy_filters' );

function adamas_clients_add_admin_taxonomy_filters() {

    global $typenow;
    
    /// An array of all the taxonomyies you want to display. Use the taxonomy name or slug 
    $taxonomies = array( 'clients_category' );
 
    /// Must set this to the post type you want the filter(s) displayed on
    if ( $typenow == 'clients' ) {
 
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