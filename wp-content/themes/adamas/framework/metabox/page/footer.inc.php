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

<div id="tab-footer" class="wpus-tab-content">

    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Footer Widget', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable the footer widgets on this page.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'footer_widgets' ); ?>
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
    
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Footer Copyright', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Enable the copyright widgets on this page.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'footer_copyright' ); ?>
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