<?php 
/**
 * Team Meta Box Template
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

    <!-- Image -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Member Image', 'adamas') ?></span>
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

    <!-- Role -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Role', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Role of the member.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'role' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Description -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Description', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Description of the member.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'desc' ); ?>
            <textarea name="<?php $mb->the_name(); ?>" id="" cols="30" rows="10"><?php $mb->the_value(); ?></textarea>
        </div>
    </div>

    <!-- Facebook -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Facebook URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Facebook URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'facebook' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Twitter -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Twitter URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Twitter URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'twitter' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Google -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Google URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Google URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'google' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- LinkedIn -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'LinkedIn URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'LinkedIn URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'linkedin' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Instagram -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Instagram URL', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Instagram URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'instagram' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

    <!-- Mail -->
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Email', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Mail URL, or leave it blank.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'email' ); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
    </div>

</div><!-- .row -->