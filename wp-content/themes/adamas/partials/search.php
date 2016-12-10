<?php
/**
 * Template: Search
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'header_search' ) ) {
    return; // Return if search isn't enabled
}

?>

<div id="site-search" class="site-search">
    <?php get_search_form(); ?>
</div>