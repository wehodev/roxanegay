<?php
/**
 * All main WooCommerce configurations for this theme
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return if WooCommerce isn't enabled
 *
 * @since 1.0
 */
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

/**
 * Dequeue WooCommerce css
 *
 * @since 1.0
 */ 
if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
    define( 'WOOCOMMERCE_USE_CSS', false );
}

/**
 * Remove Actions
 *
 * @since 1.0
 */ 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

if ( is_singular( 'product' ) ) {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
}

/**
 * Remove prettyPhoto
 *
 * @since 1.0
 */
add_action( 'wp_enqueue_scripts', 'adamas_remove_shop_lightbox', 99 );
function adamas_remove_shop_lightbox() {
    wp_dequeue_script( 'prettyPhoto' );
    wp_dequeue_script( 'prettyPhoto-init' );
    wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
}

/**
 * Breadcrumbs
 *
 * @since 1.0
 */ 
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_breadcrumb_defaults', 'adamas_woo_breadcrumbs' );
function adamas_woo_breadcrumbs() {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<div class="product-breadcrumbs">',
        'wrap_after'  => '</div>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}

/**
 * WooCommerce Number of products displayed per page
 *
 * @since 1.0
 */
$options           = get_option( 'adamas_data' );
$products_per_page = '12';

if ( isset( $options['shop_per_page'] ) ) {
    $products_per_page = $options['shop_per_page'];
}

if ( isset( $_GET['show_products'] ) ) {
    if ( $_GET['show_products'] == "all" ) {
        add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ) );
    } else {
        add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $_GET['show_products'] . ';' ) );
    }
} else {
    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return  ' . $products_per_page . ';' ) );
}

/**
 * Related products per page
 *
 * @since 1.0
 */
add_filter( 'woocommerce_related_products_args', 'adamas_related_products_args' );
function adamas_related_products_args( $args ) {
    $args['posts_per_page'] = '12';
    return $args;
}

/**
 * Shop product thumbnail template
 *
 * @since 1.0
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'adamas_shop_product_thumbnail', 10 );
function adamas_shop_product_thumbnail() { ?>
    <a class="product-image" href="<?php the_permalink(); ?>">
        <i class="product-loader fa fa-spinner fa-pulse"></i>
        <?php get_template_part( 'partials/woocommerce/product-thumbnail' ); ?>
    </a>
    <?php adamas_shop_product_badge() ?>
<?php }

/**
 * Woocommerce cart update
 *
 * @since 1.0
 */
add_filter( 'add_to_cart_fragments', 'adamas_woo_cart_update' );
function adamas_woo_cart_update( $fragments ) {
    ob_start();
    ?>

    <div class="site-cart-item">
        <?php echo adamas_woo_cart_content(); ?>
    </div>

    <?php
    $fragments['.site-cart-item'] = ob_get_clean();
    return $fragments;
}

/**
 * Woocommerce cart count update
 *
 * @since 1.0
 */
add_filter( 'add_to_cart_fragments', 'adamas_woo_cart_count_update' );
function adamas_woo_cart_count_update($fragments) {

    ob_start();

    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_class = ! $cart_count ? '' : ' active-tools';
               
    ?>

    <a id="menu-cart" class="menu-cart menu-link<?php echo esc_attr( $cart_class ); ?>" href="<?php echo WC()->cart->get_cart_url(); ?>">
        <i class="fa fa-shopping-basket"></i>
    </a>

    <?php
    
    $fragments['#menu-cart'] = ob_get_clean();
    return $fragments;
}

/**
 * AJAX remve to cart
 *
 * @since 1.0
 */ 
add_action( 'wp_ajax_adamas_woo_product_remove', 'adamas_woo_product_remove' );
add_action( 'wp_ajax_nopriv_adamas_woo_product_remove', 'adamas_woo_product_remove' );
function adamas_woo_product_remove() {

    global $woocommerce;

    $id           = ! empty( $_POST['product_id'] ) ? $_POST['product_id'] : 0;
    $cart         = $woocommerce->cart;
    $cart_id      = $cart->generate_cart_id( $id );
    $cart_item_id = $cart->find_product_in_cart( $cart_id );

    if ( $cart_item_id ) {
        $cart->set_quantity( $cart_item_id, 0 );
    }   

    ob_start();
    $resp['cart_count'] = WC()->cart->get_cart_contents_count();
    $resp['cart_html']  = adamas_woo_cart_content();
    wp_send_json( $resp );
    
    exit();
}

/**
 * Add to cart message
 *
 * @since 1.0
 */ 
add_filter( 'wc_add_to_cart_message', 'adamas_add_to_cart_message', 10, 2 );
function adamas_add_to_cart_message( $message, $product_id ) {

    if ( is_array( $product_id ) ) {
        $titles = array();
        foreach ( $product_id as $id ) {
            $titles[] = get_the_title( $id );
        }
        $added_text = sprintf( __( 'Added %s to your cart.', 'woocommerce' ), wc_format_list_of_items( $titles ) );
    } else {
        $added_text = sprintf( __( '&quot;%s&quot; was successfully added to your cart.', 'woocommerce' ), get_the_title( $product_id ) );
    }

    if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
        $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wp_get_referer() ? wp_get_referer() : home_url() );
        $message   = sprintf('%s <a href="%s" class="button wc-forward">%s</a>', $added_text, $return_to, __( 'Continue Shopping', 'woocommerce' ) );
    } else {
        $message = sprintf('%s <a href="%s" class="button wc-forward">%s</a>', $added_text, wc_get_page_permalink( 'cart' ), __( 'View Cart', 'woocommerce' ) );
    }

    return $message;
}

/**
 * Mini cart
 *
 * @since 1.0
 */ 
function adamas_woo_cart_content() { 

    ob_start();

    if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

        <div class="wpus-cart-subtotal">
            <?php esc_html_e( 'Subtotal', 'adamas' ); ?>:
            <?php echo WC()->cart->get_cart_subtotal(); ?>
        </div>

        <?php foreach ( WC()->cart->get_cart() as $cart_key => $cart_value ) {

            $product    = $cart_value['data'];
            $product_id = $cart_value['product_id'];

            if ( $product && $product->exists() && $cart_value['quantity'] > 0 ) {

                $product_name  = $product->get_title();
                $thumbnail     = $product->get_image( array(88,88) );
                $product_price = WC()->cart->get_product_price( $product );
                ?>

                <div class='wpus-cart-product'>
                    <a href="<?php echo esc_html( get_permalink( $product_id ) ); ?>" class="wpus-cart-entry">
                        
                        <span class="wpus-cart-thumb">
                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                        </span>

                        <span class="wpus-cart-headline"><?php echo esc_html( $product_name ); ?></span>

                        <?php echo '<span class="wpus-cart-quantity">' . sprintf( ' %s &times; %s', $cart_value['quantity'], $product_price ) . '</span>'; ?>
                        <?php echo sprintf( '<a href="%s" class="wpus-cart-remove" title="%s" data-product_id="%s"><i class="adamas-icon-close"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_key ) ), __( 'Remove this item', 'woocommerce' ), $product_id ); ?>
                    
                    </a>
                </div>

                <?php
            }
        } 
        ?>

        <div class="wpus-cart-button">
            <a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="wpus-view-cart wpus-button"><?php esc_html_e( 'View Cart', 'adamas' ); ?></a>
            <a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="wpus-checkout-cart wpus-button"><?php esc_html_e( 'Checkout', 'adamas' ); ?></a>
        </div>

    <?php else : ?>
        <div class="wpus-cart-empty"><?php esc_html_e( 'No products in the cart.', 'adamas' ); ?></div>
    <?php endif; ?>

    <i class="wpus-cart-loader fa fa-spinner fa-pulse"></i>

<?php 

$return = ob_get_clean();
return $return;

}

/**
 * Product badge
 *
 * @since 1.0
 */
if ( ! function_exists( 'adamas_shop_product_badge' ) ) :
    function adamas_shop_product_badge() {
        global $product, $post;
        if ( $product->is_in_stock() == false ) {
            echo apply_filters( 'woocommerce_sale_flash', '<span class="product-badge outofstock">' . esc_html__( 'Sold Out', 'woocommerce' ) . '</span>', $post, $product );
        } elseif ( $product->is_on_sale() ) {
            echo apply_filters( 'woocommerce_sale_flash', '<span class="product-badge onsale">'.esc_html__( 'Sale', 'adamas' ).'</span>', $post, $product );
        }  elseif ( ! $product->get_price() ) {
            echo apply_filters( 'woocommerce_free_flash', '<span class="product-badge free">' . esc_html__( 'Free', 'woocommerce' ) . '</span>', $post, $product );
        }
    }
endif;

/**
 * Set image dimensions on theme activation
 *
 * @since 1.0
 */
add_action( 'after_switch_theme', 'adamas_shop_set_image_dimensions', 1 );
add_action( 'admin_init', 'adamas_shop_set_image_dimensions', 1000 );
if ( ! function_exists( 'adamas_shop_set_image_dimensions' ) ) {
    function adamas_shop_set_image_dimensions() {
        if ( ! get_option( 'adamas_shop_image_sizes_set' ) ) {

            $catalog = array(
                'width'  => '350', // px
                'height' => '460', // px
                'crop'   => 1 ,    // crop
            );
            
            $single = array(
                'width'  => '570', // px
                'height' => '700', // px
                'crop'   => 1,     // crop
            );
            
            $thumbnail = array(
                'width'  => '65', // px
                'height' => '90', // px
                'crop'   => 1,    // crop
            );
            
            // Image sizes
            update_option( 'shop_catalog_image_size', $catalog );     // Product category thumbs
            update_option( 'shop_single_image_size', $single );       // Single product image
            update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
            
            // Set "images size set" option
            add_option( 'adamas_shop_image_sizes_set', '1' );
        }
    }
}