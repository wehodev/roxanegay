<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php get_header(); ?>

	<div id="content" class="site-content ">
		<div class="container">
			<main id="main" class="site-main">

				<?php if ( $title_404 = adamas_get_data( 'title_404', '', esc_html__( "Oops! That Page Can't Be Found.", 'adamas' ) ) ) : ?>
					<h1><?php echo esc_html( $title_404 ); ?></h1>
				<?php endif; ?>

				<?php if ( $subtitle_404 = adamas_get_data( 'subtitle_404', '', esc_html__( "It looks like nothing was found at this location. Maybe try a search?", 'adamas' ) ) ) : ?>
			 		<p><?php echo esc_html( $subtitle_404 ); ?></p>
			 	<?php endif; ?>

			 	<?php if ( adamas_get_data( 'search_404', '', true ) ) : ?>
			 		<?php get_search_form(); ?>
			 	<?php endif; ?>

		    </main><!-- .site-main -->
		</div><!-- .container -->
	</div><!-- .site-content -->

<?php get_footer();

// Omit closing PHP tag to avoid accidental whitespace output errors.