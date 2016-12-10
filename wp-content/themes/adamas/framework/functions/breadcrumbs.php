<?php
/**
 * Breadcrumbs
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Breadcrumbs
 *
 * @since 1.0
 */
function adamas_get_breadcrumbs( $echo = true ) {

	// Return if front page
	if ( is_front_page() ) {
		return;
	}

	// Globals
	global $wp_query, $wp_rewrite;

	// Set vars
	$post_id = adamas_get_page_id();
	$trail   = array();
	$path    = '';

	// If not on the front page of the site, link to the home page
	if ( !is_front_page() ) {
		$trail[] = '<a href="' . home_url() . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . esc_html__( 'Home', 'adamas' ) . '</a>';
	}

	// Homepage or posts page
	if ( is_home() ) {
		$home_page    = get_page( $wp_query->get_queried_object_id() );
		$trail        = array_merge( $trail, adamas_get_breadcrumbs_parents( $home_page->post_parent, '' ) );
		$trail['end'] = get_the_title( $home_page->ID );
	}

	// Singular: Page, Post ...etc
	elseif ( is_singular() ) {
		
		// Get singular vars
		$post      = $wp_query->get_queried_object();
		$post_type = $post->post_type;
		$parent    = $post->post_parent;
		
		// If a custom post type, check if there are any pages in its hierarchy based on the slug
		if ( ! in_array( $post_type, array( 'page', 'post', 'portfolio' ) ) ) {

			$post_type_object = get_post_type_object( $post_type );
			
			// Add $front to the path
			if ( 'post' == $post_type || 'attachment' == $post_type || ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front ) ) {
				$path .= trailingslashit( $wp_rewrite->front );
			}

			// Add slug to $path
			if ( !empty( $post_type_object->rewrite['slug'] ) ) {
				$path .= $post_type_object->rewrite['slug'];
			}

			// If $path exists check for parents
			if ( !empty( $path ) ) {
				$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( '', $path ) );
			}

		}

		// Standard Posts
		if ( 'post' == $post_type ) {

			// Main Blog URL
			if ( $blog_page	= get_theme_mod( 'blog_page' ) ) {

				$blog_url  = get_permalink( $blog_page );
				$blog_name = get_the_title( $blog_page );
				
				$trail[] = '<a href="' . $blog_url . '" title="' . $blog_name . '">' . $blog_name . '</a>';
			}

			// 1st Category
			$terms = get_the_terms( $post_id, 'category');

			if ( $terms ) {
				$term = reset( $terms );
				$trail[] = '<a href="' . get_term_link($term) . '" title="' . $term->name . '">' . $term->name . '</a>';
			}

		}

		//  Main Portfolio
		if ( $post_type == 'portfolio' ) {
			if ( taxonomy_exists( 'portfolio-category' ) && function_exists( 'adamas_list_post_terms' ) ) {
				if ( $terms = adamas_list_post_terms( $taxonomy = 'portfolio-category', true, false, false, true ) ) {
					$trail[] = $terms;
				}
			}
		}
		
		// If the post type path returns nothing and there is a parent, get its parents
		if ( empty( $path ) && 0 !== $parent || 'attachment' == $post_type ) {
			$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( $parent, '' ) );
		}

		// End trail with post title
		$post_title = get_the_title( $post_id );
		if ( !empty( $post_title ) ) {
			$trail['end'] = $post_title;
		}

	}

	// Archives
	elseif ( is_archive() ) {

		// Taxonomies
		if ( is_tax() || is_category() || is_tag() ) {

			// Get some taxonomy variables
			$term     = $wp_query->get_queried_object();
			$taxonomy = get_taxonomy( $term->taxonomy );
			
			// Display main blog page on Categories & archives
			if ( is_category() || is_tag() ) {
				if ( $blog_page	= get_theme_mod( 'blog_page' ) ) {

					$blog_url	= get_permalink( $blog_page );
					$blog_name	= get_the_title( $blog_page );

					$trail[] = '<a href="' . $blog_url . '" title="' . $blog_name . '">' . $blog_name . '</a>';
				}
			}

			// Get the path to the term archive. Use this to determine if a page is present with it
			if ( is_category() ) {
				$path = get_option( 'category_base' );
			} elseif ( is_tag() ) {
				$path = get_option( 'tag_base' );
			} else {
				if ( $taxonomy->rewrite['with_front'] && $wp_rewrite->front ) {
					$path = trailingslashit( $wp_rewrite->front );
				}
				$path .= $taxonomy->rewrite['slug'];
			}

			// Get parent pages if they exist
			if ( $path ) {
				$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( '', $path ) );
			}

			// Add term parents
			if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent ) {
				$trail = array_merge( $trail, adamas_get_breadcrumbs_term_parents( $term->parent, $term->taxonomy ) );
			}

			// Add term name to trail end
			$trail['end'] = $term->name;
		}

		// Post type archive
		elseif ( is_post_type_archive() ) {

			// Get post type object
			$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

			// Add $front to $path
			if ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front )
				$path .= trailingslashit( $wp_rewrite->front );

			// Add slug to 4path
			if ( ! empty( $post_type_object->rewrite['archive'] ) )
				$path .= $post_type_object->rewrite['archive'];

			// If patch exists check for parents
			if ( ! empty( $path ) )
				$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( '', $path ) );

			// Add post type name to trail end
			$trail['end'] = $post_type_object->labels->name;
		}

		// Author archive
		elseif ( is_author() ) {

			// If $front has been set, add it to $path
			if ( ! empty( $wp_rewrite->front ) )
				$path .= trailingslashit( $wp_rewrite->front );

			// If an $author_base exists, add it to $path
			if ( ! empty( $wp_rewrite->author_base ) )
				$path .= $wp_rewrite->author_base;

			// If $path exists, check for parent pages
			if ( ! empty( $path ) )
				$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( '', $path ) );

			// Add the author's display name to the trail end
			$trail['end'] = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
		}

		// Time archive
		elseif ( is_time() ) {

			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$trail['end'] = get_the_time( esc_html__( 'g:i a', 'adamas' ) );

			elseif ( get_query_var( 'minute' ) )
				$trail['end'] = sprintf( esc_html__( 'Minute %1$s', 'adamas' ), get_the_time( esc_html__( 'i', 'adamas' ) ) );

			elseif ( get_query_var( 'hour' ) )
				$trail['end'] = get_the_time( esc_html__( 'g a', 'adamas' ) );
		}

		// Date archive
		elseif ( is_date() ) {

			// If $front is set check for parents
			if ( $wp_rewrite->front )
				$trail = array_merge( $trail, adamas_get_breadcrumbs_parents( '', $wp_rewrite->front ) );

			if ( is_day() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attresc_html__( 'Y', 'adamas' ) ) . '">' . get_the_time( esc_html__( 'Y', 'adamas' ) ) . '</a>';
				$trail[] = '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attresc_html__( 'F', 'adamas' ) ) . '">' . get_the_time( esc_html__( 'F', 'adamas' ) ) . '</a>';
				$trail['end'] = get_the_time( esc_html__( 'j', 'adamas' ) );
			}

			elseif ( get_query_var( 'w' ) ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attresc_html__( 'Y', 'adamas' ) ) . '">' . get_the_time( esc_html__( 'Y', 'adamas' ) ) . '</a>';
				$trail['end'] = sprintf( esc_html__( 'Week %1$s', 'adamas' ), get_the_time( esc_attresc_html__( 'W', 'adamas' ) ) );
			}

			elseif ( is_month() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attresc_html__( 'Y', 'adamas' ) ) . '">' . get_the_time( esc_html__( 'Y', 'adamas' ) ) . '</a>';
				$trail['end'] = get_the_time( esc_html__( 'F', 'adamas' ) );
			}

			elseif ( is_year() ) {
				$trail['end'] = get_the_time( esc_html__( 'Y', 'adamas' ) );
			}
		}
	}

	// Search
	elseif ( is_search() ) {
		$trail['end'] = sprintf( esc_html__( 'Search results for &quot;%1$s&quot;', 'adamas' ), esc_attr( get_search_query() ) );
	}

	// 404
	elseif ( is_404() ) {
		$trail['end'] = esc_html__( '404 Not Found', 'adamas' );
	}

	// Build breadcrumbs
	if ( $trail && is_array( $trail ) ) {
		$breadcrumb = '<nav class="wpus-breadcrumbs">';

			// Wrap the $crumb['end'] value in a container
			if ( !empty( $trail['end'] ) ) {
				$trail['end'] = '<span>' . $trail['end'] . '</span>';
			}

			// Join all trail items into a string
			$breadcrumb .= implode( false, $trail );

		$breadcrumb .= '</nav>';
	}

	// Return the breadcrumbs trail
	if ( $echo ) {
		echo $breadcrumb;
	} else {
		return $breadcrumb;
	}
	
}

/**
 * Breadcrumbs Parent links
 *
 * @since 1.0
 */
function adamas_get_breadcrumbs_parents( $post_id = '', $path = '' ) {

	// Set up an empty trail array
	$trail = array();

	// Return if it's a theme post type page
	if ( is_singular( 'portfolio' ) ) {
		return $trail;
	}

	// If neither a post ID nor path set, return an empty array
	if ( empty( $post_id ) && empty( $path ) ) {
		return $trail;
	}

	// If the post ID is empty, use the path to get the ID
	if ( empty( $post_id ) ) {

		// Get parent post by the path
		$parent_page = get_page_by_path( $path );

		if ( empty( $parent_page ) ) {
			// search on page name (single word)
			$parent_page = get_page_by_title ( $path );
		}

		if ( empty( $parent_page ) ) {
			// search on page title (multiple words)
			$parent_page = get_page_by_title ( str_replace( array( '-', '_' ), ' ', $path ) );
		}

		// If a parent post is found, set the $post_id variable to it
		if ( ! empty( $parent_page ) ) {
			$post_id = $parent_page->ID;
		}
	}

	// If a post ID and path is set, search for a post by the given path
	if ( $post_id == 0 && ! empty( $path ) ) {

		// Separate post names into separate paths by '/'
		$path = trim( $path, '/' );
		preg_match_all( "/\/.*?\z/", $path, $matches );

		// If matches are found for the path.
		if ( isset( $matches ) ) {

			// Reverse the array of matches to search for posts in the proper order
			$matches = array_reverse( $matches );

			// Loop through each of the path matches
			foreach ( $matches as $match ) {

				// If a match is found.
				if ( isset( $match[0] ) ) {

					// Get the parent post by the given path
					$path = str_replace( $match[0], '', $path );
					$parent_page = get_page_by_path( trim( $path, '/' ) );

					// If a parent post is found, set the $post_id and break out of the loop
					if ( ! empty( $parent_page ) && $parent_page->ID > 0 ) {
						$post_id = $parent_page->ID;
						break;
					}
				}
			}
		}
	}

	// While there's a post ID, add the post link to the $parents array. */
	while ( $post_id ) {

		// Get the post by ID.
		$page = get_page( $post_id );

		// Add the formatted post link to the array of parents.
		$parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';

		// Set the parent post's parent to the post ID.
		$post_id = $page->post_parent;
	}

	// If we have parent posts, reverse the array to put them in the proper order for the trail.
	if ( isset( $parents ) ) {
		$trail = array_reverse( $parents );
	}

	// Return the trail of parent posts.
	return $trail;

}

/**
 * Breadcrumbs Term Parents
 *
 * @since 1.0
 */
function adamas_get_breadcrumbs_term_parents( $parent_id = '', $taxonomy = '' ) {

	// Set up some default arrays
	$trail   = array();
	$parents = array();

	// If no term parent ID or taxonomy is given, return an empty array
	if ( empty( $parent_id ) || empty( $taxonomy ) ) {
		return $trail;
	}

	// While there is a parent ID, add the parent term link to the $parents array
	while ( $parent_id ) {

		// Get the parent term
		$parent = get_term( $parent_id, $taxonomy );

		// Add the formatted term link to the array of parent terms
		$parents[] = '<a href="' . get_term_link( $parent, $taxonomy ) . '" title="' . esc_attr( $parent->name ) . '">' . $parent->name . '</a>';

		// Set the parent term's parent as the parent ID
		$parent_id = $parent->parent;
	}

	// If we have parent terms, reverse the array to put them in the proper order for the trail
	if ( !empty( $parents ) ) {
		$trail = array_reverse( $parents );
	}

	// Return the trail of parent terms.
	return $trail;

}

/**
 * Echo breadcrumbs
 *
 * @since 1.0
 */
function adamas_breadcrumbs() {
	adamas_get_breadcrumbs();
}