<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */ 
?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( 'no-sidebar' === adamas_get_page_layout() ) {
	return; // Return if sidebar isn't enabled
}

// Sidebar column
$sidebar_col = apply_filters( 'adamas_sidebar_col', array(
    'col-md-3',
    'left-sidebar' == adamas_get_page_layout() ? 'col-md-pull-9' : '',
) );
?>

<div<?php AdamasHelper::html_class( $sidebar_col ); ?>>
	<aside id="secondary" class="site-sidebar">
	    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( adamas_get_sidebar_name() ) ) : else : ?>
	    <?php endif; ?>
	</aside><!-- .site-sidebar -->
</div><!-- adamas_sidebar_class() -->