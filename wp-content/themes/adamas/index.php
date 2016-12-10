<?php 
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php get_header(); ?>

<?php
// BLog slider
if ( adamas_get_data( 'blog_slider' ) ) {
    echo do_shortcode( '[adamas_slider id="' . adamas_get_data( 'blog_slider' ) . '"]' );
}
?>
    
    <div id="content" class="site-content">

    	<div class="container">
            <div class="row">

                <div<?php AdamasBlog::layout(); ?>>

                    <?php if ( have_posts() ) : ?>

                    	<main id="main" class="site-main">
                            <div<?php AdamasBlog::classes() . AdamasBlog::atributes(); ?>>

        					<?php
                                // Start the Loop
                                while ( have_posts() ) : the_post();

                                    // Include blog content
                                    get_template_part( 'partials/blog/blog', AdamasBlog::template() );

                                // End the loop
                                endwhile;
                            ?>
                            
                            </div><!-- adamas_blog_class() -->
                            
                            <?php
                                // Include Blog Paginatiom
                                get_template_part( 'partials/blog/pagination' );
                            ?>
                            
                        </main><!-- .site-main -->

                    <?php 
                        else :
                            
                        	// If no content, include the "No posts found" template.
                        	get_template_part( 'partials/content-none' );

                    	endif;
                    ?>

                </div><!-- adamas_archive_column() -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </div><!-- .container -->

    </div><!-- .site-content -->

<?php get_footer();

// Omit closing PHP tag to avoid accidental whitespace output errors.