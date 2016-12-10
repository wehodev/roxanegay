<?php 
/**
 * Clients Meta Box Template
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
    <div class="wpus-row">
        <div class="wpus-col-md-4">
            <span class="wpus-label"><?php esc_html_e( 'Gallery', 'adamas' ) ?></span>
            <span class="wpus-desc"><?php esc_html_e( 'Upload Image for the gallery.', 'adamas' ) ?></span>
        </div>
        <div class="wpus-col-md-8">
            <?php $mb->the_field( 'ids' ); ?>
            <?php echo $wpalchemy_media_access->getField( array( 'id' => 'adamas_post_gallery', 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value(), 'type' => 'hidden', 'class' => 'adamas_img_id' ) ); ?>
            <div class="wpus-mediawrap">
                <?php 
                    $ids = $mb->get_the_value();
                    if ( ! empty( $ids ) ) {
                        $thumbs = explode( ',', $ids );
                        foreach( $thumbs as $thumb ) {
                            echo wp_get_attachment_image( $thumb, array( 80, 80 ) ) ;
                        }
                    }
                ?>
            </div>
            <?php echo $wpalchemy_media_access->getButton( array( 'class' => 'wpus-gallerybutton' ) ); ?>
        </div>
    </div>
</div>