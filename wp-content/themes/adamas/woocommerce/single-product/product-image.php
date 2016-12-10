<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

// Get data
$attachment_count = $product->get_gallery_attachment_ids();
$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
$image_link       = wp_get_attachment_url( get_post_thumbnail_id() );
$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
    'title' => $image_title,
    'alt'   => $image_title
) );

// Wrap Class
$wrap_class = array(
    'wpus-carousel',
    adamas_get_data( 'product_image_lightbox' ) ? 'wpus-gallery-lightbox' : '',
);

// Wrap atributes
$wrap_atributes = apply_filters( 'adamas_product_images_carousel_args', array(
    'single' => 'true',
    'arrows' => 'true',
) );

?>

<?php do_action( 'woocommerce_product_thumbnails' ); ?>

<div class="col-md-6">
    <div class="product-images">

    	<?php if ( has_post_thumbnail() ) : ?>

            <?php //adamas_woo_product_badge(); ?>
        
            <div id="woo-product-images"<?php AdamasHelper::html_class( $wrap_class ); ?><?php AdamasHelper::html_attributes( $wrap_atributes ); ?>>
        		
                <a href="<?php echo esc_url( $image_link ); ?>"><?php echo $image; ?></a>

        		<?php
                if ( $attachment_count > 0 ) :
                    foreach ( $attachment_count as $attachment_id ) {

                        $image_link  = wp_get_attachment_url( $attachment_id );
                        $image_title = esc_attr( get_the_title( $attachment_id ) );
                        $image       = wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ); ?>                    
                        
                        <a href="<?php echo esc_url( $image_link ); ?>">
                            <img src="<?php echo esc_url( $image[0]); ?>" witdh="<?php echo esc_attr( $image[1] );?>" height="<?php echo esc_attr( $image[2] );?>" alt="<?php echo esc_html( $image_title ); ?>">
                        </a>

                <?php }
                endif; ?>
                       
            </div><!-- #woo-product-images -->

        <?php else : ?> 
            <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID ); ?>
        <?php endif; ?>

    </div><!-- .product-images -->
</div><!-- .col-md-6 -->