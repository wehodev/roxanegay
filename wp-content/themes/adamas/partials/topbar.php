<?php
/**
 * Template: Top Bar
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'top_bar' )|| AdamasHeader::has_transparent() ) {
    return; // Return if top bar isn't enabled
}

// Get top bar columns
$top_bar_columns = adamas_get_data( 'top_bar_columns', '', '2' );

// Top Bar css class
$top_bar_class = apply_filters( 'adamas_top_bar_class', array(
    'site-top-bar',
    'top-bar-' . $top_bar_columns . '-columns',
    adamas_get_data( 'top_bar_wide' ) ? 'wpus-wide' : '',
    'hidden-sm',
    'hidden-xs',
) );

// Top Bar widget area css class
$top_bar_widget_area_class = apply_filters( 'adamas_top_bar_widget_area_class', array(
    'widget-area',
    '1' == $top_bar_columns ? 'col-sm-12' : '',
    '2' == $top_bar_columns ? 'col-sm-6' : '',
    '3' == $top_bar_columns ? 'col-sm-4' : '',
) );
?>

<div id="top-bar"<?php AdamasHelper::html_class( $top_bar_class ); ?>>
    <div class="container">
        <div class="row">

            <div<?php AdamasHelper::html_class( $top_bar_widget_area_class ); ?>>
                <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-top-bar' ) ) : else : ?>
                <?php endif; ?>
            </div><!-- .widget-area -->

            <?php if ( '1' < $top_bar_columns ) : ?>
                <div<?php AdamasHelper::html_class( $top_bar_widget_area_class ); ?>>
                    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-top-bar-2' ) ) : else : ?>
                    <?php endif; ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

            <?php if ( '2' < $top_bar_columns ) : ?>
                <div<?php AdamasHelper::html_class( $top_bar_widget_area_class ); ?>>
                    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-top-bar-3' ) ) : else : ?>
                    <?php endif; ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

        </div><!-- .row -->
	</div><!-- .container -->
</div><!-- #top-bar -->