<?php 
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php
// Column class
$post_col = apply_filters( 'adamas_post_col', array(
    'no-sidebar'   == adamas_get_page_layout() ? 'col-md-10 centered' : 'col-md-9',
    'left-sidebar' == adamas_get_page_layout() ? 'col-md-push-3' : '',
) );
?>

<?php get_header(); ?>

    <div id="content" class="site-content">
    
        <div class="container">
            <div class="row">

                <div<?php AdamasHelper::html_class( $post_col ); ?>>
                    <main id="main" class="site-main"> 

                    <?php
                        // Start the loop
                        while ( have_posts() ) : the_post();

                            // Include singe post content
                            get_template_part( 'partials/post/content' );

                        // End the loop
                        endwhile;
                    ?>

                    </main><!-- .site-main -->
                </div><!-- $post_col -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </div><!-- .container -->

        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() ) {
                comments_template();
            }
        ?>

    </div><!-- .site-content -->

<?php get_footer();

// Omit closing PHP tag to avoid accidental whitespace output errors.