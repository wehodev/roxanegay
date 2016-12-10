<?php
/**
 * Template: Header Menu
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<nav id="navigation" class="site-navigation">
    <ul id="site-menu" class="site-menu">

        <?php 
        if ( 'menu-standart' == AdamasHeader::get_menu_type() ) :
        
            if ( has_nav_menu( 'primary_menu' ) ) {
                wp_nav_menu( array( 
                    'theme_location' => 'primary_menu', 
                    'container'      => false, 
                    'items_wrap'     => '%3$s',
                    'walker'         => new AdamasWalkerMenu(),
                ) );
            } else { 
                printf( '<li><a href="%s" class="text-reset menu-link">%s</a></li>', admin_url( '/nav-menus.php' ),  esc_html__( 'Go to Dashboard > Appearance > Menus to set up and assign a menu!', 'adamas' ) );
            }
        endif; ?>

        <li class="wpus-menu-bars">
            <a href="#" id="menu-bars" class="menu-bars menu-link">
                <span class="wpus-bars-icon"></span>
            </a>
        </li>

        <?php if ( class_exists( 'WooCommerce' ) && adamas_get_data( 'header_cart' ) ) :
            $cart_count = WC()->cart->get_cart_contents_count();
            $cart_class = ! $cart_count ? '' : 'active-tools'; ?>
            <li class="wpus-menu-cart">
                <a id="menu-cart" class="menu-link menu-cart" href="<?php echo WC()->cart->get_cart_url(); ?>">
                    <i class="fa fa-shopping-basket"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if ( adamas_get_data( 'header_search' ) ) : ?>
            <li class="wpus-menu-search">
                <a href="#" id="menu-search" class="menu-search menu-link">
                    <i class="fa fa-search"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul><!-- .site-menu -->
</nav><!-- .site-navigation -->