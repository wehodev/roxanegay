<?php
/**
 * Template: Top Bar
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


if ( adamas_get_meta_data( 'header_cart' ) && class_exists( 'WooCommerce' ) ) :

?>
      
<div id="site-cart" class="site-cart">
    <a class="wpus-close" href="#"><?php printf( esc_html__( 'Close (%s)', 'adamas' ), '<i class="adamas-icon-close"></i>' ); ?></a>
    <div class="site-cart-item"></div>
</div>

<?php endif;