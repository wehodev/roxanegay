<?php 
/**
 * Template: Blog Grid
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpus-grid-item wow fadeIn' ); ?>>

    <?php
		// Post media
    	if ( adamas_get_meta_data( 'blog_featured_image' ) ) {
			AdamasBlog::thumbnail( 'adamas-image-horizontal' );
		}
	?>

	<div class="entry-meta">
	    <?php esc_html_e( 'By', 'adamas' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'adamas' ); ?> <a href="<?php esc_url( the_permalink() ) ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
	</div><!-- .entry-meta -->

	<?php 
		// Post Title
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	?>

	<div class="entry-excerpt">
	    <?php 
	    	// Post excerpt
	    	if ( 'full' === adamas_get_data( 'blog_content_type' ) ) { 
	        	the_content( '', true, '' );
	    	} else {
	        	the_excerpt();
	    	}
	    ?>
	</div><!-- .entry-excerpt -->

	<a href="<?php esc_url( the_permalink() ); ?>" class="read-more">
		<?php echo esc_html_e( 'Continue Reading', 'adamas' ); ?>
		<span>&rarr;</span>
	</a><!-- .read-more -->

</article>