<?php 
/**
 * Template: Blog Pagination
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( 'no-sidebar' === adamas_get_page_layout() && 'large' === AdamasBlog::template() ) {
	$pag_class = ' col-md-10 centered';
} else {
	$pag_class = '';
}


if ( 'loadmore' == adamas_get_data( 'blog_pagination' ) ) {
	adamas_load_more( array( 'wrap_class' => $pag_class ) );
} else {
	adamas_pagination( array( 'wrap_class' => $pag_class ) );
}

wp_reset_postdata();