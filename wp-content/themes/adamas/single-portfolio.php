<?php
/**
 * The Template for displaying all single projects
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php get_header(); ?>

    <div id="content" class="site-content">

        <?php if ( ! adamas_has_composer() ) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
        <?php endif; ?>

            <main id="main" class="site-main">

            <?php
                // Start the Loop
                while ( have_posts() ) : the_post();

                    // Content
                    the_content();

                    // Page pagination
                    wp_link_pages( array(
                        'before'   => '<p class="wpus-links-pages">',
                        'after'    => '</p>',
                        'pagelink' => '<span>%</span>',
                    ) );

                    // Comments
                    if ( adamas_get_data( 'page_comments' ) ) {
                        comments_template();
                    }

                // End the loop
                endwhile;
            ?>

            <?php
            	// Include portfolio navigation
                get_template_part( 'partials/portfolio/nav' );
            ?>

            </main><!-- .site-main -->

        <?php if ( ! adamas_has_composer() ) : ?>
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
        <?php endif; ?>

    </div><!-- .site-content -->

<?php get_footer();

// Omit closing PHP tag to avoid accidental whitespace output errors.
