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
            <span class="wpus-label"><?php esc_html_e( 'Video URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php printf( __( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.<a href="%s" target="_blank">Learn More</a>', 'adamas' ), 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'url' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>
</div>