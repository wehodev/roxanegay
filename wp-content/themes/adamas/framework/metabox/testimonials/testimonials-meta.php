<?php 
/**
 * Testimonials Meta Box Template
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

    <!-- Client image -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Photo', 'adamas') ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Select images from media library.', 'adamas') ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'image' ); ?>
            <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
            <?php $mb->the_field( 'src' ); ?>
            <?php echo $wpalchemy_media_access->getField( array( 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_src' ) ); ?>
            <div class="wpus-mediawrap">
                <span>
                    <img src="<?php $mb->the_value(); ?>" alt="" />
                    <i class="wpus-del-media dashicons dashicons-no-alt"></i>
                </span>
            </div>
            <?php echo $wpalchemy_media_access->getButton(); ?>
        </div>
    </div>

    <!-- Client profession -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Profession', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Eg : CEO, Web Designer', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'profession' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

</div><!-- .row -->