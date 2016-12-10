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
        	<h3><?php esc_html_e( 'Arrows Settings', 'adamas' ) ?></h3>
        	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
        </div>
        
        <div class="wpus-popup-content">

    	    <!-- Show Arrows -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Show Arrows:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'arrows' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="arrows-hover-show" <?php $mb->the_select_state( 'arrows-hover-show' ); ?>><?php esc_html_e( 'Show on Hover', 'adamas' ); ?></option>
                            <option value="yes" <?php $mb->the_select_state( 'yes' ); ?>><?php esc_html_e( 'Always Show', 'adamas' ); ?></option>
                            <option value="no" <?php $mb->the_select_state( 'no' ); ?>><?php esc_html_e( 'Hide', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Arrows Style -->
            <div id="wpus--arrows-style" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Arrows Style:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'arrows_style' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="arrows-outline" <?php $mb->the_select_state( 'arrows-outline' ); ?>><?php esc_html_e( 'Outline', 'adamas' ); ?></option>
                            <option value="arrows-bg" <?php $mb->the_select_state( 'arrows-bg' ); ?>><?php esc_html_e( 'Background', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Arrows Shape -->
            <div id="wpus--arrows-shape" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Arrows Shape:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'arrows_shape' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Round', 'adamas' ); ?></option>
                            <option value="arrows-square" <?php $mb->the_select_state( 'arrows-square' ); ?>><?php esc_html_e( 'Square', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Arrows Color -->
            <div id="wpus--arrows-color" class="wpus-row">
                <div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Arrows Color', 'adamas') ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( 'arrows_color' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="arrows-light" <?php $mb->the_select_state( 'arrows-light' ); ?>><?php esc_html_e( 'Light', 'adamas' ); ?></option>
                            <option value="arrows-dark" <?php $mb->the_select_state( 'arrows-dark' ); ?>><?php esc_html_e( 'Dark', 'adamas' ); ?></option>
                            <option value="arrows-gray" <?php $mb->the_select_state( 'arrows-gray' ); ?>><?php esc_html_e( 'Gray', 'adamas' ); ?></option>
                            <option value="arrows-accent" <?php $mb->the_select_state( 'arrows-accent' ); ?>><?php esc_html_e( 'Accent Color', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

    	</div><!-- .wpus-popup-content -->

    </div>
</div>