<?php
/**
 * Template: Footer Copyright
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'footer_copyright', '', true ) ) {
	return; // Return if copyright isn't enabled
}

// Get copyright columns
$copyright_columns = adamas_get_data( 'copyright_columns', '', '2' );

// Copyright class
$copyright_class = array(
    'footer-copyright',
    'copyright-' . $copyright_columns . '-columns',
);

// Copyright widget area class
$copyright_widget_area_class = array(
    'widget-area',
    '1' == $copyright_columns ? 'col-sm-12' : '',
    '2' == $copyright_columns ? 'col-sm-6' : '',
    '3' == $copyright_columns ? 'col-sm-4' : '',
);
?>

<div<?php AdamasHelper::html_class( $copyright_class ); ?>>
	<div class="container">
        <div class="row">

            <div<?php AdamasHelper::html_class( $copyright_widget_area_class ); ?>>
                <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-copyright' ) ) : else : ?>
                <?php endif; ?>
            </div><!-- .widget-area -->

            <?php if ( '1' < $copyright_columns ) : ?>
                <div<?php AdamasHelper::html_class( $copyright_widget_area_class ); ?>>
                    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-copyright-2' ) ) : else : ?>
                    <?php endif; ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

            <?php if ( '2' < $copyright_columns ) : ?>
                <div<?php AdamasHelper::html_class( $copyright_widget_area_class ); ?>>
                    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-copyright-3' ) ) : else : ?>
                    <?php endif; ?>
                </div><!-- .widget-area -->
            <?php endif; ?>

        </div><!-- .row -->
	</div><!-- .container -->
</div><!-- .footer-copyright -->