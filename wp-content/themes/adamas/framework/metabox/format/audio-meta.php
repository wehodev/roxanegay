<?php 
/**
 * Clients Meta Box Template
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

global $post;
global $wpalchemy_media_access;
?>

<div class="wpus-wrap wpus-meta-box">
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Audio Embedded Code', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'If you are using something other than self hosted audio such as Soundcloud, paste the embed code here.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'embed' ); ?>
            <textarea id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
        </div>
    </div>
</div>