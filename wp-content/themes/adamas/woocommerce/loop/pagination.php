<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

$shop_pagination = apply_filters( 'adamas_shop_pagination_type', adamas_get_data( 'shop_pagination' ) );

// Pagination
if ( 'loadmore' == $shop_pagination ) {
	
	adamas_load_more( array( 'type' => 'product' ) );

} else {

	echo '<nav id="pagination" class="site-pagination style-bg">';
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'      => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'    => '',
			'add_args'  => '',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
			'type'      => 'list',
			'end_size'  => 3,
			'mid_size'  => 3
		) ) );
	echo '</nav>';
}