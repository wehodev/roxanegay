<?php 
/**
 * Portfolio Meta Box Template
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

    <!-- Overlay color -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Overlay Color', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select custom overlay color in archive layout masonry.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'overlay_color' ); ?>
            <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
        </div>
    </div>

    <!-- Masonry Image Size -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Masonry Image Size', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select featured image size in archive layout masonry.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'masonry_size' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="size-regular"<?php $mb->the_select_state( 'size-regular' ); ?>><?php esc_html_e( 'Regular - 1X1', 'adamas' ); ?></option>
                    <option value="size-wide"<?php $mb->the_select_state( 'size-wide' ); ?>><?php esc_html_e( 'Wide - 2X1', 'adamas' ); ?></option>
                    <option value="size-tall"<?php $mb->the_select_state( 'size-tall' ); ?>><?php esc_html_e( 'Tall - 1X2', 'adamas' ); ?></option>
                    <option value="size-widetall"<?php $mb->the_select_state( 'size-widetall' ); ?>><?php esc_html_e( 'Wide Tall - 2X2', 'adamas' ); ?></option>
                </select>
            </div>
        </div>
    </div>

</div><!-- .row -->