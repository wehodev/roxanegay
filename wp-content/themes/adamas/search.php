<?php 
/**
 * The template for displaying search results pages
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
                                <h2><?php printf( esc_html__( '%s Search Results for: %s', 'adamas' ), $wp_query->found_posts, '<span>' . get_search_query() . '</span>' ); ?></h2>
                            </div><!-- .archive-title -->
                        
                            <div class="wpus-search-results">

                            <?php
                                // Start the Loop
                                while ( have_posts() ) : the_post();
                            ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <header class="entry-header">
                                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                    </header><!-- .entry-header -->
                                    
                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                    </div><!-- .entry-content -->

                                </article><!-- #post-## -->

                            <?php
                                // End the loop
                                endwhile;
                            ?>

                            </div><!-- adamas_blog_class() -->

                            <?php
                                // Paginatiom
                                adamas_pagination( array( 'class' => 'style-bg' ) );
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