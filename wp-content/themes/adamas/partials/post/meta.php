<?php 
/**
 * Template: Post Meta
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'post_meta' ) ) {
    return; // Return if metadata is disabled
}
?>

<div class="entry-meta">
<?php
	// Post Categories
	$categories_list = get_the_category_list( ', ' );
	if ( $categories_list ) {
	    esc_html_e( ' Posted in ', 'adamas' );
	    echo $categories_list;
	}

	// Post Tags
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
	    esc_html_e( ' and tagged ', 'adamas' );
	    echo $tag_list;
	}
?>
</div><!-- entry-meta -->