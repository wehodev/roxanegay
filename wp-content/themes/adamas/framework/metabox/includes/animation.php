<?php 
/**
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<div class="wpus-select-field">
    <select name="<?php $mb->the_name(); ?>">

        <option value=""><?php esc_html_e( 'Appearing Animation...', 'adamas' ) ?></option>

        <optgroup label="Attention">
            <option value="bounce" <?php $mb->the_select_state( 'bounce' ); ?>>bounce</option>
            <option value="flash" <?php $mb->the_select_state( 'flash' ); ?>>flash</option>
            <option value="pulse" <?php $mb->the_select_state( 'pulse' ); ?>>pulse</option>
            <option value="rubberBand" <?php $mb->the_select_state( 'rubberBand' ); ?>>rubberBand</option>
            <option value="shake" <?php $mb->the_select_state( 'shake' ); ?>>shake</option>
            <option value="swing" <?php $mb->the_select_state( 'swing' ); ?>>swing</option>
            <option value="tada" <?php $mb->the_select_state( 'tada' ); ?>>tada</option>
            <option value="wobble" <?php $mb->the_select_state( 'wobble' ); ?>>wobble</option>
        </optgroup>

        <optgroup label="Bouncing">
            <option value="bounceIn" <?php $mb->the_select_state( 'bounceIn' ); ?>>bounceIn</option>
            <option value="bounceInDown" <?php $mb->the_select_state( 'bounceInDown' ); ?>>bounceInDown</option>
            <option value="bounceInLeft" <?php $mb->the_select_state( 'bounceInLeft' ); ?>>bounceInLeft</option>
            <option value="bounceInRight" <?php $mb->the_select_state( 'bounceInRight' ); ?>>bounceInRight</option>
            <option value="bounceInUp" <?php $mb->the_select_state( 'bounceInUp' ); ?>>bounceInUp</option>
        </optgroup>

        <optgroup label="Fading">
            <option value="fadeIn" <?php $mb->the_select_state( 'fadeIn' ); ?>>fadeIn</option>
            <option value="fadeInDown" <?php $mb->the_select_state( 'fadeInDown' ); ?>>fadeInDown</option>
            <option value="fadeInDownBig" <?php $mb->the_select_state( 'fadeInDownBig' ); ?>>fadeInDownBig</option>
            <option value="fadeInLeft" <?php $mb->the_select_state( 'fadeInLeft' ); ?>>fadeInLeft</option>
            <option value="fadeInLeftBig" <?php $mb->the_select_state( 'fadeInLeftBig' ); ?>>fadeInLeftBig</option>
            <option value="fadeInRight" <?php $mb->the_select_state( 'fadeInRight' ); ?>>fadeInRight</option>
            <option value="fadeInRightBig" <?php $mb->the_select_state( 'fadeInRightBig' ); ?>>fadeInRightBig</option>
            <option value="fadeInUp" <?php $mb->the_select_state( 'fadeInUp' ); ?>>fadeInUp</option>
            <option value="fadeInUpBig" <?php $mb->the_select_state( 'fadeInUpBig' ); ?>>fadeInUpBig</option>
        </optgroup>

        <optgroup label="Flippers">
            <option value="flipInX" <?php $mb->the_select_state( 'flipInX' ); ?>>flipInX</option>
            <option value="flipInY" <?php $mb->the_select_state( 'flipInY' ); ?>>flipInY</option>
        </optgroup>

        <optgroup label="Lightspeed">
            <option value="lightSpeedIn" <?php $mb->the_select_state( 'lightSpeedIn' ); ?>>lightSpeedIn</option>
        </optgroup>

        <optgroup label="Rotating">
            <option value="rotateIn" <?php $mb->the_select_state( 'rotateIn' ); ?>>rotateIn</option>
            <option value="rotateInDownLeft" <?php $mb->the_select_state( 'rotateInDownLeft' ); ?>>rotateInDownLeft</option>
            <option value="rotateInDownRight" <?php $mb->the_select_state( 'rotateInDownRight' ); ?>>rotateInDownRight</option>
            <option value="rotateInUpLeft" <?php $mb->the_select_state( 'rotateInUpLeft' ); ?>>rotateInUpLeft</option>
            <option value="rotateInUpRight" <?php $mb->the_select_state( 'rotateInUpRight' ); ?>>rotateInUpRight</option>
        </optgroup>

        <optgroup label="Sliders">
            <option value="slideInLeft" <?php $mb->the_select_state( 'slideInLeft' ); ?>>slideInLeft</option>
            <option value="slideInRight" <?php $mb->the_select_state( 'slideInRight' ); ?>>slideInRight</option>
            <option value="slideInUp" <?php $mb->the_select_state( 'slideInUp' ); ?>>slideInUp</option>
            <option value="slideInDown" <?php $mb->the_select_state( 'slideInDown' ); ?>>slideInDown</option>
        </optgroup>
        
    </select>
</div>