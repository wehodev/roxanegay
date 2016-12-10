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

    <!-- Logo -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Logo', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select images from media library.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'logo' ); ?>
            <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
            <?php $mb->the_field( 'logo_src' ); ?>
            <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_src' ) ); ?>
            <div class="wpus-mediawrap">
                <span>
                    <img src="<?php $mb->the_value(); ?>" alt="" />
                    <i class="wpus-del-media dashicons dashicons-no-alt"></i>
                </span>
            </div>
            <?php echo $wpalchemy_media_access->getButton(); ?>
        </div>
    </div>

    <!-- Client URL -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Client URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enter client URL.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'url' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Link Target -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Link Target', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select where to open link.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'target' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="_self" <?php $mb->the_select_state( '_self' ); ?>><?php esc_html_e( 'Same Window', 'adamas' ); ?></option>
                    <option value="_blank" <?php $mb->the_select_state( '_blank' ); ?>><?php esc_html_e( 'New Window', 'adamas' ); ?></option>
                </select>
            </div>
        </div>
    </div>

</div><!-- .row -->