<?php
/**
 * The template part for displaying a message that posts cannot be found
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div class="not-found">

    <h3><?php esc_html_e( 'Nothing Found', 'adamas' ); ?></h3>

    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'adamas' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

    <?php elseif ( is_search() ) : ?>

        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'adamas' ); ?></p>
        <?php get_search_form(); ?>

    <?php else : ?>

        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'adamas' ); ?></p>
        <?php get_search_form(); ?>

    <?php endif; ?>

</div><!-- .not-found -->