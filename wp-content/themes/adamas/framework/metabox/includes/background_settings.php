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
	    	<h3><?php esc_html_e( 'Background Settings', 'adamas' ) ?></h3>
	    	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
	    </div>

	    <div class="wpus-popup-content">

		    <!-- Background Repeat -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Background Repeat:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'background_repeat' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Default', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::background_repeat() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

		    <!-- Background Size -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Background Size:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'background_size' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Default', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::background_size() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

		    <!-- Background Attachment -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Background Attachment:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'background_attachment' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Default', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::background_attachment() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

		    <!-- Background Position -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Background Position:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'background_position' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Default', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::background_position() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

		    <!-- Pattern Animation -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Pattern Animation:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'background_animation' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Select Animation...', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::background_animation() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

		</div><!-- .wpus-popup-content -->

	</div>
</div>