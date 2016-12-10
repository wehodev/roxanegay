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
	    	<h3><?php esc_html_e( 'Image Settings', 'adamas' ) ?></h3>
	    	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
	    </div>

	    <div class="wpus-popup-content">

		    <!-- Location -->
		    <div class="wpus-row">
				<div class="wpus-col-md-4">
	                <span class="wpus-label"><?php esc_html_e( 'Location', 'adamas' ) ?></span>
	            </div>
	            <div class="wpus-col-md-8">
	                <div class="wpus-select-field">
	                    <?php $mb->the_field( $settings_prefix . 'location' ); ?>
	                    <select name="<?php $mb->the_name(); ?>">
	                        <option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Before Title', 'adamas' ); ?></option>
	                        <option value="after-title" <?php $mb->the_select_state( 'after-title' ); ?>><?php esc_html_e( 'After Title', 'adamas' ); ?></option>
	                        <option value="after-desc" <?php $mb->the_select_state( 'after-desc' ); ?>><?php esc_html_e( 'After Description', 'adamas' ); ?></option>
	                        <option value="after-btn" <?php $mb->the_select_state( 'after-btn' ); ?>><?php esc_html_e( 'After Button', 'adamas' ); ?></option>
	                    </select>
	                </div>
	            </div>
	        </div>

		    <!-- Margin Top -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Margin Top:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'margin_top' ); ?>
		            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or em values"/>
		        </div>
		    </div>

		    <!-- Margin Bottom -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Margin Bottom:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'margin_bottom' ); ?>
		            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or em values"/>
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