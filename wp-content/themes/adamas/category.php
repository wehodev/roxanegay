<?php 
/**
 * The template for displaying category pages
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<?php get_header(); ?>

    <div id="content" class="site-content">

        <div class="container">
            <div class="row">

                <div<?php AdamasBlog::layout(); ?>>
                
                    <?php if ( have_posts() ) : ?>

                        <main id="main" class="site-main">

                            <div class="archive-title">
                                <h2><?php printf( esc_html__( 'Category Archives: %s', 'adamas' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
                                <?php
                                    if ( $term_description = term_description() ) :
                                        printf( '<div class="wpus-page-description">%s</div>', $term_description );
                                    endif;
                                ?>
                            </div><!-- .archive-title -->

                            <div<?php AdamasBlog::classes() . AdamasBlog::atributes(); ?>>

                            <?php
                                // Start the Loop
                                while ( have_posts() ) : the_post();

                                    // Include category content
                                    get_template_part( 'partials/blog/blog', AdamasBlog::template() );

                                // End the loop
                                endwhile;
                            ?>

                            </div><!-- adamas_blog_class() -->

                            <?php
                                // Paginatiom
                                adamas_pagination();
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