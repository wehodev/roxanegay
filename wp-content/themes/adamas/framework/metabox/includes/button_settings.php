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
        	<h3><?php esc_html_e( 'Button Settings', 'adamas' ) ?></h3>
        	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
        </div>

        <div class="wpus-popup-content">

    	    <!-- Target -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Open Link In:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( $settings_prefix . 'target' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Same Window', 'adamas' ); ?></option>
                            <option value="_blank" <?php $mb->the_select_state( '_blank' ); ?>><?php esc_html_e( 'New Window', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Style -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Style:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( $settings_prefix . 'style' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Background', 'adamas' ); ?></option>
                            <option value="type-outline" <?php $mb->the_select_state( 'type-outline' ); ?>><?php esc_html_e( 'Outline', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Size -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Size:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( $settings_prefix . 'size' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Defaul', 'adamas' ); ?></option>
                            <option value="size-sm" <?php $mb->the_select_state( 'size-sm' ); ?>><?php esc_html_e( 'Small', 'adamas' ); ?></option>
                            <option value="size-md" <?php $mb->the_select_state( 'size-md' ); ?>><?php esc_html_e( 'Medium', 'adamas' ); ?></option>
                            <option value="size-lg" <?php $mb->the_select_state( 'size-lg' ); ?>><?php esc_html_e( 'Large', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Color -->
    	    <div class="wpus-row">
    			<div class="wpus-col-md-4">
                    <span class="wpus-label"><?php esc_html_e( 'Color:', 'adamas' ) ?></span>
                </div>
                <div class="wpus-col-md-8">
                    <?php $mb->the_field( $settings_prefix . 'color' ); ?>
                    <div class="wpus-select-field">
                        <select name="<?php $mb->the_name(); ?>">
                            <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Accent Color', 'adamas' ); ?></option>
                            <option value="color-light" <?php $mb->the_select_state( 'color-light' ); ?>><?php esc_html_e( 'Light', 'adamas' ); ?></option>
                            <option value="color-dark" <?php $mb->the_select_state( 'color-dark' ); ?>><?php esc_html_e( 'Dark', 'adamas' ); ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <!--Animation -->
    	    <div class="wpus-row">
    	        <div class="wpus-col-md-4">
    	            <span class="wpus-label"><?php esc_html_e( 'Animation:', 'adamas' ) ?></span>
    	        </div>
    	        <div class="wpus-col-md-8">
    	            <?php $mb->the_field( $settings_prefix . 'animation' ); ?>
    	            <?php include ADAMAS_FRAMEWORK_DIR . '/metabox/includes/animation.php'; ?>
    	        </div>
    		</div>

    		<!--Animation Delay-->
    	    <div class="wpus-row">
    	        <div class="wpus-col-md-4">
    	            <span class="wpus-label"><?php esc_html_e( 'Animation Delay:', 'adamas' ) ?></span>
    	        </div>
    	        <div class="wpus-col-md-8">
    	        	<?php $mb->the_field( $settings_prefix . 'animation_delay' ); ?>
    	            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Defaul: 0"/>
    	            <span class="wpus-desc"><?php esc_html_e( 'Set the delay in milliseconds. For example write 300 = 0.3 seconds.', 'adamas' ) ?></span>
    	        </div>
    		</div>

    		<!--Animation Duration-->
    	    <div class="wpus-row">
    	        <div class="wpus-col-md-4">
    	            <span class="wpus-label"><?php esc_html_e( 'Animation Duration:', 'adamas' ) ?></span>
    	        </div>
    	        <div class="wpus-col-md-8">
    	        	<?php $mb->the_field( $settings_prefix . 'animation_duration' ); ?>
    	            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Defaul: 1000"/>
    	            <span class="wpus-desc"><?php esc_html_e( 'Set the delay in milliseconds. For example write 300 = 0.3 seconds.', 'adamas' ) ?></span>
    	        </div>
    		</div>

    	</div><!-- .wpus-popup-content -->

    </div>
</div>