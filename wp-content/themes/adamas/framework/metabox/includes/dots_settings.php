<?php 
/**
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div class="wpus-popup">
    <div class="wpus-popup-inner">

    	<div class="wpus-popup-title">
        	<h3><?php esc_html_e( 'Dots Settings', 'adamas' ) ?></h3>
        	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
        </div>

        <div class="wpus-popup-content">

    	    <!-- Show Dots -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Show Dots:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'dots' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="dots-hover-show" <?php $mb->the_select_state( 'dots-hover-show' ); ?>><?php esc_html_e( 'Show on Hover', 'adamas' ); ?></option>
                            <option value="yes" <?php $mb->the_select_state( 'yes' ); ?>><?php esc_html_e( 'Always Show', 'adamas' ); ?></option>
                            <option value="no" <?php $mb->the_select_state( 'no' ); ?>><?php esc_html_e( 'Hide', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Dots Position -->
            <div id="wpus--dots-position" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Dots Position:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'dots_position' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Inside', 'adamas' ); ?></option>
                            <option value="dots-outside" <?php $mb->the_select_state( 'dots-outside' ); ?>><?php esc_html_e( 'Outside', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Dots Align -->
            <div id="wpus--dots-align" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Dots Align:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'dots_align' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Center', 'adamas' ); ?></option>
                            <option value="dots-left" <?php $mb->the_select_state( 'dots-left' ); ?>><?php esc_html_e( 'Left', 'adamas' ); ?></option>
                            <option value="dots-right" <?php $mb->the_select_state( 'dots-right' ); ?>><?php esc_html_e( 'Right', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Dots Color -->
            <div id="wpus--dots-color" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Dots Color', 'adamas') ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'dots_color' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="dots-light" <?php $mb->the_select_state( 'dots-light' ); ?>><?php esc_html_e( 'Light', 'adamas' ); ?></option>
                            <option value="dots-dark" <?php $mb->the_select_state( 'dots-dark' ); ?>><?php esc_html_e( 'Dark', 'adamas' ); ?></option>
                            <option value="dots-gray" <?php $mb->the_select_state( 'dots-gray' ); ?>><?php esc_html_e( 'Gray', 'adamas' ); ?></option>
                            <option value="dots-accent" <?php $mb->the_select_state( 'dots-accent' ); ?>><?php esc_html_e( 'Accent Color', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

    	</div><!-- .wpus-popup-content -->

    </div>
</div>