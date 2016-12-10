<?php
/**
 * Team Post Type
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Registers the team custom post type
 * 
 * @since 1.0
 */
add_action( 'init', 'adamas_team_post_type', 4 );

function adamas_team_post_type() {

	$labels = apply_filters( 'adamas_team_post_type_labels', array(
        'name'               => esc_html__( 'Team Items', 'wpus-core' ),
	    'singular_name'      => esc_html__( 'Team Item', 'wpus-core' ),
	    'add_new'            => esc_html__( 'Add New', 'wpus-core' ),
	    'add_new_item'       => esc_html__( 'Add New Team Item', 'wpus-core' ),
	    'edit_item'          => esc_html__( 'Edit Team Item', 'wpus-core' ),
	    'new_item'           => esc_html__( 'New Team Item', 'wpus-core' ),
	    'all_items'          => esc_html__( 'All Team Items', 'wpus-core' ),
	    'view_item'          => esc_html__( 'View Team Item', 'wpus-core' ),
	    'search_items'       => esc_html__( 'Search Team Items', 'wpus-core' ),
	    'not_found'          => esc_html__( 'No Team Items found', 'wpus-core' ),
	    'not_found_in_trash' => esc_html__( 'No Team Items found in Trash', 'wpus-core' ),
	    'menu_name'          => esc_html__( 'Team', 'wpus-core' ),
    ) );

    $args = apply_filters( 'adamas_team_post_type_args', array(
		'labels'             => $labels,
		'taxonomies'         => array( 'team_category' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team-member', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author' ),
        'menu_icon'          => 'dashicons-admin-users',
    ) );

	register_post_type( 'team', $args );

	$tax_labels = apply_filters( 'adamas_team_post_type_tax_labels', array(
		'name'              => esc_html__( 'Team Categories', 'wpus-core' ),
		'singular_name'     => esc_html__( 'Team Category', 'wpus-core' ),
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

    $tax_args = apply_filters( 'adamas_team_post_type_tax_args', array(
		'labels'            => $tax_labels,
		'rewrite'           => array( 'slug' => 'team-category', 'with_front' => false ),
		'hierarchical'      => true,
		'query_var'         => 'team-category',
		'show_ui'           => true,
		'show_admin_column' => true,
    ) );

	register_taxonomy( 'team_category', 'team', $tax_args );
}

/**
 * Add columns to team edit screen
 * 
 * @since 1.0
 */
add_filter( 'manage_edit-team_columns', 'adamas_add_team_thumbnail_column', 10, 1 );

function adamas_add_team_thumbnail_column( $columns ) {
	$image      = array( 'person_image' => esc_html__( 'Person Image','wpus-core' ) );
	$profession = array( 'person_profession' => esc_html__( 'Person Profession','wpus-core' ) );
    return array_slice( $columns, 0, 2, true ) + $image + $profession + array_slice( $columns, 1, NULL, true );
}

add_action( 'manage_team_posts_custom_column', 'adamas_team_display_thumbnail', 10, 1 );

function adamas_team_display_thumbnail( $column ) {

    global $post;

    switch ( $column ) {

        case 'person_image':
            $thumb_id = get_post_meta( $post->ID, 'adamas_team_image', true );
            $thumb    = wp_get_attachment_image_src( $thumb_id, array( '40', '40' ) );
            echo '<img src="'. esc_url( $thumb[0] ) . '" alt="" />';
            break;

        case 'person_profession':
            $role = get_post_meta( $post->ID, 'adamas_team_role', true );
            echo esc_html( $role );
            break;

    }

}

/**
 * Adds taxonomy filters to the team admin page
 * 
 * @since 1.0
 */
add_action( 'restrict_manage_posts', 'adamas_team_add_taxonomy_filters' );

function adamas_team_add_taxonomy_filters() {

    global $typenow;
    
    /// An array of all the taxonomyies you want to display. Use the taxonomy name or slug 
    $taxonomies = array( 'team_category' );
 
    /// Must set this to the post type you want the filter(s) displayed on
    if ( $typenow == 'team' ) {
 
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