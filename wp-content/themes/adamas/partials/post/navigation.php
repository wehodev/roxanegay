<?php 
/**
 * Template: Post Navigation
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
} 

if ( ! adamas_get_meta_data( 'post_navigation' ) ) {
    return; // Return if post navigation is disabled
}
?>

<nav class="post-navigation">
    <?php next_post_link( '%link', '<span>' . esc_html__( '&larr;&nbsp; Newer', 'adamas' ) . '</span>%title', false ); ?>
    <?php previous_post_link( '%link', '<span>' . esc_html__( 'Older &nbsp;&rarr;', 'adamas' ) . '</span>%title', false ); ?>
</nav>