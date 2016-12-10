<?php
/**
 * Theme pagination
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return pagination
 *
 * @since 1.0
 */ 
function adamas_get_pagination( array $args = NULL ) {

	// Set up the default form values
	$default = array(
		'query'        => '',
		'wrap_class'   => '',
		'button_class' => 'style-bg',
	);

	// Merge the user-selected arguments with the defaults
	$args = wp_parse_args( ( array ) $args, $default );

	// Get global $query
	if ( ! $args['query'] ) {
		global $wp_query;
		$args['query'] = $wp_query;
	}

	// Set vars
	$total = $args['query']->max_num_pages;
	$big   = 999999999;
	
	if ( $total <= 1 ) {
		return;
	}

	// Get permalink structure
	if ( get_option( 'permalink_structure' ) ) {
		$format  = 'page/%#%/';
		$replace = '/page/1/';
	} else {
		$format  = '&paged=%#%';
		$replace = '&#038;paged=1';
	}

	// Get current page
	if ( $page = get_query_var( 'paged' ) ) {
		$page = $page;
	} elseif ( $page = get_query_var( 'page' ) ) {
		$page = $page;
	} else {
		$page = 1;
	}

	// Set up the default arguments for the pagination
	$pag_args = apply_filters( 'adamas_pagination_args', array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'mid_size'  => '2',
		'type'      => 'list',
		'total'     => $total,
		'format'    => $format,
		'current'   => max( 1, $page ),
	) );

	// Wrap class
    $wrap_class = AdamasHelper::get_html_class( array(
        'site-pagination',
        $args['wrap_class'],
        $args['button_class'],
    ) );

	// Pagination
	$html = '<nav id="pagination"' .  $wrap_class . '>';
		$html .= '<div class="container">';
			$html .= str_replace( $replace, '', paginate_links( $pag_args ) );
		$html .= '</div>';
	$html .= '</nav>';

	// Apply filter
	$html = apply_filters( 'adamas_pagination', $html );

	// Return
	return $html;

}


/**
 * Echo pagination
 *
 * @since 1.0
 */
function adamas_pagination( array $args = NULL ) {
	echo adamas_get_pagination( $args );
}