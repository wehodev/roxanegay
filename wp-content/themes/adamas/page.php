<?php 
/**
 * The template for displaying all pages
 *  
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php 
// Main css class
$page_col = apply_filters( 'adamas_page_col', array(
    'no-sidebar'   == adamas_get_page_layout() ? 'col-md-12' : 'col-md-9',
    'left-sidebar' == adamas_get_page_layout() ? 'col-md-push-3' : '',
) );
?>

<?php get_header(); ?>

    <div id="content" class="site-content">

        <?php if ( ! adamas_has_composer() || 'left-sidebar' == adamas_get_page_layout() || 'right-sidebar' == adamas_get_page_layout() ) : ?>
        <div class="container">
            <div class="row">
                <div<?php AdamasHelper::html_class( $page_col ); ?>>
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

                // End the loop
                endwhile;
            ?>

            </main><!-- .site-main -->
        
        <?php if ( ! adamas_has_composer() || 'left-sidebar' == adamas_get_page_layout() || 'right-sidebar' == adamas_get_page_layout() ) : ?>
                </div><!-- $page_col -->
                <?php get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .container -->
        <?php endif; ?>

        <?php
        // Comments
        if ( comments_open() ) :
            comments_template();
        endif;
        ?>

    </div><!-- .site-content -->

<?php get_footer();

// Omit closing PHP tag to avoid accidental whitespace output errors.