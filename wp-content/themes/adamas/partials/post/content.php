<?php 
/**
 * Template: Post Content
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        // Post Media
        get_template_part( 'partials/post/media' );
    ?>

    <div class="entry-meta">
        <span><?php esc_html_e( 'By', 'adamas' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'adamas' ); ?> <?php the_date(); ?></span>
    </div><!-- .entry-meta -->

	<?php
        // Post Title
        the_title( '<h1 class="entry-title" rel="bookmark">', '</h1>' );
    ?>
    
	<div class="entry-content">
		<?php the_content(); ?>
        <?php
			wp_link_pages( array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'adamas' ),
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
			) );
		?>
    </div><!-- .entry-content -->
    
    <div class="entry-footer">
        <?php 
            // Post Share
            get_template_part( 'partials/post/share' );
        ?>

        <?php
            // Post Meta
            get_template_part( 'partials/post/meta' );
        ?>
    </div><!-- .entry-footer -->

</article><!-- #post- -->

<?php
// Post Navigation
get_template_part( 'partials/post/navigation' );