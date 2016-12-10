<?php
/**
 * Theme loadmore
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return load more button
 *
 * @since 1.0
 */ 
function adamas_get_load_more( array $args = NULL ) {

	// Set up the default form values
	$default = array(
		'query'        => '',
		'type'         => '',
		'wrap_class'   => '',
		'button_class' => 'style-outline',
	);

	// Merge the user-selected arguments with the defaults
	$args = wp_parse_args( (array) $args, $default );

	// Get global $query
	if ( ! $args['query'] ) {
		global $wp_query;
		$args['query'] = $wp_query;
	}

	// Get vars
	$total = $args['query']->max_num_pages;

	if ( $total <= 1 ) {
		return;
	}

	if ( get_query_var('paged') ) { 
        $paged = get_query_var('paged'); 
    } elseif ( get_query_var('page') ) { 
        $paged = get_query_var('page'); 
    } else { 
        $paged = 1; 
    }   

	// Get next link href
	$href = explode( '"' , get_next_posts_link() );

	$text_args = array();

	// Button text
	if ( 'portfolio' == $args['type'] ) {
		$text_args['load']    = esc_html__( 'Load More', 'adamas' );
		$text_args['loading'] = esc_html__( 'Loading Projects', 'adamas' );
		$text_args['nomore']  = esc_html__( 'No More Projects to Show', 'adamas' );
	} elseif ( 'product' == $args['type'] ) {
		$text_args['load']    = esc_html__( 'Load More', 'adamas' );
		$text_args['loading'] = esc_html__( 'Loading Products', 'adamas' );
		$text_args['nomore']  = esc_html__( 'No More Products to Show', 'adamas' );
	} else {
		$text_args['load']    = esc_html__( 'Load More', 'adamas' );
		$text_args['loading'] = esc_html__( 'Loading Posts', 'adamas' );
		$text_args['nomore']  = esc_html__( 'No More Posts to Show', 'adamas' );
	}

	$text_args = apply_filters( 'adamas_load_more_text', $text_args, $args['type'] );

	// Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'wpus-load-more',
        $args['wrap_class'],
    ) );

    // Button class
    $button_class = AdamasHelper::get_html_class( array(
        'wpus-button',
        $args['button_class'],
    ) );

    // Button attributes
	$button_atributes = AdamasHelper::get_html_attributes( array(
		'count'   => $args['query']->max_num_pages,
		'loading' => $text_args['loading'],
		'nomore'  => $text_args['nomore'],
    ) );

	// Load more button
	$html = '<div id="loadmore"' . $wrap_class . '>';
		$html .= '<a href="' . get_pagenum_link($paged + 1) . '"' . $button_class . $button_atributes . '>' . $text_args['load'] . '</a>';
	$html .= '</div>';

	// Apply filter
	$html = apply_filters( 'adamas_load_more', $html );

	// Return
	return $html;
	
}

/**
 * Echo load more button
 *
 * @since 1.0
 */ 
function adamas_load_more( array $args = NULL ) {
	echo adamas_get_load_more( $args );
}