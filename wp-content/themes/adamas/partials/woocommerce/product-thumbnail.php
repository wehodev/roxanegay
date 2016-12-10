<?php
/**
 * WooCommerce Thumbnail Template
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

global $post, $product;

$post_cloned    = $post;
$product_images = $product->get_gallery_attachment_ids();
$post           = $post_cloned;

// Primary Thumbnail
echo woocommerce_get_product_thumbnail( 'shop_catalog' );

// Remove Duplicate Images
if ( has_post_thumbnail() ) {

	$post_thumb_id = get_post_thumbnail_id();

	foreach ( $product_images as $i => $attachment_id ) {
		if ( $post_thumb_id == $attachment_id  || !wp_get_attachment_url( $attachment_id ) ) {
			unset( $product_images[$i] );
		}
	}
}

// Other Thumbnails
if ( count( $product_images ) ) :

	$attachment_id = reset( $product_images );

	if ( $attachment = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' ) ) {
		$image_url = $attachment[0]; 
		?>
			<img class="wpus-lazy-load" src="<?php echo esc_url( $image_url ); ?>" />
		<?php
	}

endif;