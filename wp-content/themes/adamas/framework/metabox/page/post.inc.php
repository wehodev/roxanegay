<?php 
/**
 * Page Meta Box: Footer
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div id="tab-post" class="wpus-tab-content">
    
    <!-- Featured Image -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Featured Image', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the featured image on this post.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'post_featured_image' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

    <!-- Metadata Image -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Metadata', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the metadata on this post.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'post_meta' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

    <!-- Social Share -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Social Share', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the social sharing on this post.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'post_share' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

    <!-- Post Navigation -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Post Navigation', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable / Disable the post navigation on this post.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'post_navigation' ); ?>
            <div class="wpus-select-field">
                <select name="<?php $mb->the_name(); ?>">
                    <option value="default" <?php $mb->the_select_state('default'); ?>><?php esc_html_e( 'Default', 'adamas'); ?></option>
                    <option value="yes" <?php $mb->the_select_state('yes'); ?>><?php esc_html_e( 'Yes', 'adamas'); ?></option>
                    <option value="no" <?php $mb->the_select_state('no'); ?>><?php esc_html_e( 'No', 'adamas'); ?></option>
                </select>
            </div>
            <span class="wpus-desc"><?php esc_html_e( 'Leave "Default" for theme option selection', 'adamas') ?></span>
        </div>
    </div>

</div>