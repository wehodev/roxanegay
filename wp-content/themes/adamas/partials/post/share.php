<?php 
/**
 * Template: Post Pagination
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
} 

if ( ! adamas_get_meta_data( 'post_share' ) ) {
    return; // Return if post share is disabled
}

// Get post thumbnail
$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
?>

<div class="entry-share">
	<a target="_blank" href="//www.facebook.com/sharer.php?u=<?php esc_url( the_permalink() ); ?>" title="<?php esc_html_e( 'Share on Facebook', 'adamas' ); ?>"><i class="fa fa-facebook"></i></a>
	<a target="_blank" href="//twitter.com/share?url=<?php esc_url( the_permalink() ); ?>" title="<?php esc_html_e( 'Share on Twitter', 'adamas' ); ?>"><i class="fa fa-twitter"></i></a>
	<a target="_blank" href="//pinterest.com/pin/create/button/?url=<?php esc_url( the_permalink() ); ?>&amp;media=<?php echo esc_url( $post_thumbnail[0] ); ?>&amp;description=<?php echo urlencode( get_the_title() ); ?>" title="<?php esc_html_e( 'Pin in Pinterest', 'adamas' ); ?>"><i class="fa fa-pinterest-p"></i></a>
	<a target="_blank" href="//plus.google.com/share?url=<?php esc_url( the_permalink() ); ?>"><i class="fa fa-google-plus" title="<?php esc_html_e( 'Share on Google Plus', 'adamas' ); ?>"></i></a>
	<a target="_blank" href="//vkontakte.ru/share.php?url=<?php esc_url( the_permalink() ); ?>&amp;title=<?php the_title(); ?>&amp;description=<?php the_title(); ?>" title="<?php esc_html_e( 'Share on VK', 'adamas' ); ?>"><i class="fa fa-vk"></i></a>
	<a target="_blank" href="//www.tumblr.com/share/link?url=<?php esc_url( the_permalink() ); ?>&amp;name=<?php the_title(); ?>&amp;description=<?php the_title(); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'adamas' ); ?>"><i class="fa fa-tumblr"></i></a>
</div><!-- entry-share -->