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
	    	<h3><?php echo esc_attr( $settings_title) . ' ' . esc_html__( 'Settings', 'adamas' ) ?></h3>
	    	<a href="#" class="wpus-popup-close button button-primary"><?php esc_html_e( 'Save Settings', 'adamas' ) ?></a>
	    </div>

	    <div class="wpus-popup-content">

		    <!-- Color -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Color:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'color' ); ?>
		            <input class="wpus-colorpicker" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" />
		        </div>
		    </div>

		    <!-- Font Family -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Font Family:', 'adamas' ) ?></span>
		        </div>
		       	<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'font_family' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Select Font Family...', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::fonts() as $key => $value ) : ?>
		                        <option value="<?php echo $value; ?>"<?php $mb->the_select_state($value); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
		    </div>

			<!-- Font Weight -->
		    <div class="wpus-row">
			    <div class="wpus-col-md-4">
			        <span class="wpus-label"><?php esc_html_e( 'Font Weight:', 'adamas' ) ?></span>
			    </div>
				<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'font_weight' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value=""><?php esc_html_e( 'Select Font Weight...', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::fonts_weight() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
			</div>

			<!-- Font Style -->
		    <div class="wpus-row">
			    <div class="wpus-col-md-4">
			        <span class="wpus-label"><?php esc_html_e( 'Font Style:', 'adamas' ) ?></span>
			    </div>
				<div class="wpus-col-md-8">
		       		<?php $mb->the_field( $settings_prefix . 'font_style' ); ?>
		            <div class="wpus-select-field">
		                <select name="<?php $mb->the_name(); ?>">
		                	<option value="" <?php $mb->the_select_state( '' ); ?>><?php esc_html_e( 'Select Font Style...', 'adamas' ) ?></option>
		                    <?php foreach ( AdamasShared::fonts_style() as $key => $value ) : ?>
		                        <option value="<?php echo $key; ?>"<?php $mb->the_select_state($key); ?>><?php echo $value; ?></option>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		        </div>
			</div>

		    <!-- Font Size -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Font Size:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'font_size' ); ?>
		            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or em values"/>
		        </div>
			</div>

			<!-- Line Height -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Line Height:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'line_height' ); ?>
		            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or em values"/>
		        </div>
			</div>

			<!-- Letter Spacing -->
		    <div class="wpus-row">
		        <div class="wpus-col-md-4">
		            <span class="wpus-label"><?php esc_html_e( 'Letter Spacing:', 'adamas' ) ?></span>
		        </div>
		        <div class="wpus-col-md-8">
		            <?php $mb->the_field( $settings_prefix . 'letter_spacing' ); ?>
		            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="You can use px or em values"/>
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