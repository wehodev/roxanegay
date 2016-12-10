<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Action: woocommerce_before_single_product
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

// Action: woocommerce_before_single_product_summary
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Action: woocommerce_single_product_summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

if ( adamas_get_data( 'product_breadcrumb' ) ) {
    add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 3 );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 21 );

// Action: woocommerce_after_single_product_summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Action: woocommerce_after_single_product_tabs
add_action( 'woocommerce_after_single_product_tabs', 'woocommerce_template_single_meta', 5 );
add_action( 'woocommerce_after_single_product_tabs', 'woocommerce_upsell_display', 10 );

if ( adamas_get_data( 'product_related' ) ) {
    add_action( 'woocommerce_after_single_product_tabs', 'woocommerce_output_related_products', 15 );
}

?>

<div id="content" class="site-content">

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 centered">
                <?php echo get_the_password_form(); ?>
            </div>
        </div>
    </div>
    <?php
    return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="wpus-single-product">
       
        <div class="container">
            <?php wc_print_notices(); ?>
        </div>

        <?php
        /* Product navigation */
        //if ( adamas_get_data( 'product_navigation' ) ) {
            //next_post_link( '<div class="product-nav product-next">%link</div>', '<i class="icomoon-arrow-left"></i>', false );
        //} ?>

        <div class="container">
            <div class="row">

                <?php
                /**
                 * woocommerce_before_single_product_summary hook.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' ); ?>
			
                <div class="col-md-5">
                    <div class="product-summary">
						<?php
                        /**
                         * woocommerce_single_product_summary hook
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_rating - 21
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        do_action( 'woocommerce_single_product_summary' ); ?>
					</div><!-- .col-md-5 -->
                </div><!-- .product-summary -->
                
            </div><!-- .row -->
        </div><!-- .container -->

        <?php
        /* Product navigation */
        //if ( adamas_get_data( 'product_navigation' ) ) {
            //previous_post_link( '<div class="product-nav product-prev">%link</div>', '<i class="icomoon-arrow-right"></i>', false );
        //} ?>

    </div><!-- .wpus-single-product -->
        
	<?php
    /**
     * woocommerce_after_single_product_summary hook
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     */
    do_action( 'woocommerce_after_single_product_summary' ); ?>
        
	<?php
    /**
     * woocommerce_after_single_product_tabs hook
     *
     * @hooked woocommerce_template_single_meta - 5
	 * @hooked woocommerce_upsell_display - 10
     * @hooked woocommerce_output_related_products - 15
     */
	do_action( 'woocommerce_after_single_product_tabs' ); ?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

</div>