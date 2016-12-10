<?php
/**
 * Template: Footer Widgets
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'footer_widgets', '', true ) ) {
	return; // Return if footer isn't enabled 
}

// Get footer column
$footer_columns = adamas_get_data( 'footer_columns', '', '5' );

// Footer widgets css class
$footer_widgets_class = array(
    'footer-widgets',
    'footer-' . $footer_columns . '-columns',
);

// Footer widget area css class
$footer_widget_area_class = array(
    'widget-area',
    '1' == $footer_columns ? 'col-sm-12' : '',
    '2' == $footer_columns ? 'col-sm-6'  : '',
    '3' == $footer_columns ? 'col-sm-4'  : '',
    '4' == $footer_columns ? 'col-sm-3'  : '',
    '5' == $footer_columns ? 'col-sm-15' : '',
    '6' == $footer_columns ? 'col-sm-2'  : '',
);
?>

<div<?php AdamasHelper::html_class( $footer_widgets_class ); ?>>
	<div class="container">
		<div class="row">

			<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
				<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer' ) ) : else : ?>
			    <?php endif; ?>
			</div><!-- .widget-area -->

			<?php if ( '1' < $footer_columns ) : ?>
				<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer-2' ) ) : else : ?>
				    <?php endif; ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

			<?php if ( '2' < $footer_columns ) : ?>
				<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer-3' ) ) : else : ?>
				    <?php endif; ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

			<?php if ( '3' < $footer_columns ) : ?>
				<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer-4' ) ) : else : ?>
				    <?php endif; ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

			<?php if ( '4' < $footer_columns ) : ?>
				<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer-5' ) ) : else : ?>
				    <?php endif; ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

			<?php if ( '5' < $footer_columns ) : ?>
				<div<?php AdamasHelper::html_class( $footer_widget_area_class ); ?>>
					<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'sidebar-footer-6' ) ) : else : ?>
				    <?php endif; ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .footer-widgets -->