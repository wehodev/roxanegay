<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
    return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters('woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'no_found_rows' 		=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'orderby' 				=> $orderby,
	'post__in' 				=> $related,
	'post__not_in'			=> array( $product->id )

) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
    
    <div class="related products">
        <div class="container">

            <h2><?php esc_html_e( 'Related Products', 'woocommerce' ); ?></h2>

            <?php 
            // Wrap css class
            $wrap_class = apply_filters( 'adamas_related_carousel_class', array(
                'wpus-carousel',
                'wpus-related-carousel',
                'arrows-outline',
            ) );

            // Wrap atributes 
            $wrap_atributes = apply_filters( 'adamas_related_carousel_args', array(
                'columns_lg' => '4',
                'columns_md' => '3',
                'columns_sm' => '2',
                'columns_xs' => '1',
                'margin'     => '30',
                'arrows'     => 'true',
            ) );
            ?>

            <div<?php AdamasHelper::html_class( $wrap_class ); ?><?php AdamasHelper::html_attributes( $wrap_atributes ); ?>>
        		<?php while ( $products->have_posts() ) : $products->the_post(); ?>
                	<?php wc_get_template_part( 'content', 'product' ); ?>
                <?php endwhile; ?>      
            </div><!-- .wpus-carousel --> 

        </div><!-- .container --> 
    </div><!-- .related --> 
    
<?php endif;

wp_reset_postdata();