<?php
/**
 * Portfolio Post Type
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Registers the portfolio custom post type
 * 
 * @since 1.0
 */
add_action( 'init', 'adamas_portfolio_post_type', 4 );

function adamas_portfolio_post_type() {

    $portfolio_slug = adamas_get_data( 'portfolio_slug' );

    $labels = apply_filters( 'adamas_portfolio_post_type_labels', array(
        'name'               => esc_html__( 'Portfolios', 'wpus-core' ),
        'singular_name'      => esc_html__( 'Portfolio', 'wpus-core' ),
        'add_new'            => esc_html__( 'Add New', 'wpus-core' ),
        'add_new_item'       => esc_html__( 'Add New Portfolio', 'wpus-core' ),
        'edit_item'          => esc_html__( 'Edit Portfolio', 'wpus-core' ),
        'new_item'           => esc_html__( 'New Portfolio', 'wpus-core' ),
        'all_items'          => esc_html__( 'All Portfolios', 'wpus-core' ),
        'view_item'          => esc_html__( 'View Portfolio', 'wpus-core' ),
        'search_items'       => esc_html__( 'Search Portfolios', 'wpus-core' ),
        'not_found'          => esc_html__( 'No Portfolios found', 'wpus-core' ),
        'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'wpus-core' ),
        'menu_name'          => esc_html__( 'Portfolio', 'wpus-core' )
    ) );

    $args = apply_filters( 'adamas_portfolio_post_type_args', array(
        'labels'             => $labels,
        'taxonomies'         => array( 'portfolio-category' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $portfolio_slug, 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'custom-fields', 'revisions' ),
        'menu_icon'          => 'dashicons-portfolio',
    ) );
    
    register_post_type( 'portfolio', $args );

    $tax_labels = apply_filters( 'adamas_portfolio_post_type_tax_labels', array(
        'name'              => esc_html__( 'Portfolio Categories', 'wpus-core' ),
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

    $tax_args = apply_filters( 'adamas_portfolio_post_type_tax_args', array(
        'labels'            => $tax_labels,
        'rewrite'           => array( 'slug' => 'portfolio-category', 'with_front' => false ),
        'hierarchical'      => true,
        'query_var'         => 'portfolio-category',
        'show_ui'           => true,
        'show_admin_column' => true,
    ) );

    register_taxonomy( 'portfolio_category', 'portfolio', $tax_args );
}

/**
 * Add columns to portfolio edit screen
 * 
 * @since 1.0
 */
add_filter( 'manage_edit-portfolio_columns', 'adamas_add_portfolio_thumbnail_column', 10, 1 );

function adamas_add_portfolio_thumbnail_column( $columns ) {
    $thumbnail = array( 'thumbnail' => esc_html__( 'Thumbnail','wpus-core' ) );
    return array_slice( $columns, 0, 2, true ) + $thumbnail + array_slice( $columns, 1, NULL, true );
}

add_action( 'manage_portfolio_posts_custom_column', 'adamas_portfolio_display_thumbnail', 10, 1 );

function adamas_portfolio_display_thumbnail( $column ) {

    global $post;

    switch ( $column ) {
        case 'thumbnail':
            echo get_the_post_thumbnail( $post->ID, array( 50, 50 ) );
            break;
    }

}

/**
 * Adds taxonomy filters to the portfolio admin page
 * 
 * @since 1.0
 */
add_action( 'restrict_manage_posts', 'adamas_portfolio_add_taxonomy_filters' );

function adamas_portfolio_add_taxonomy_filters() {

    global $typenow;
    
    /// An array of all the taxonomyies you want to display. Use the taxonomy name or slug 
    $taxonomies = array( 'portfolio_category' );
 
    /// Must set this to the post type you want the filter(s) displayed on
    if ( $typenow == 'portfolio' ) {
 
        foreach ( $taxonomies as $tax_slug ) {

            $current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
            $tax_obj          = get_taxonomy( $tax_slug );
            $tax_name         = $tax_obj->labels->name;
            $terms            = get_terms($tax_slug);

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

/**
 * Add Feature Image on Mouse Hover
 * 
 * @since 1.0
 */
if ( class_exists( 'MultiPostThumbnails' ) ) {
    new MultiPostThumbnails( array(
        'label'     => esc_html__( 'Feature Image on Mouse Hover', 'wpus-core' ),
        'id'        => 'hover-thumbnail',
        'post_type' => 'portfolio',
    ) );
}