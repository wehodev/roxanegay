<?php
/**
 * Template: Header
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header css class
$header_class = apply_filters( 'adamas_header_class', array(
    'site-header',
    AdamasHeader::get_type(),
    AdamasHeader::get_menu_type(),
    AdamasHeader::has_transparent(),
    adamas_get_data( 'header_wide' ) ? 'wpus-wide' : '',
) );

// Heared attributes
$header_attr = array(
    'transparent' => AdamasHeader::has_transparent(),
);
?>

<header id="masthead"<?php AdamasHelper::html_class( $header_class ) . AdamasHelper::html_attributes( $header_attr ); ?>>
    <div class="site-header-inner">
        <div class="container">

            <?php 
            // Include the site logo template
            get_template_part( 'partials/header/logo' ); ?>

            <?php 
            // Include the site menu template
            get_template_part( 'partials/header/menu' ); ?>

        </div><!-- .container -->
    </div>
</header><!-- #masthead -->