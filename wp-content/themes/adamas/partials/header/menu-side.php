<?php 
/**
 * Menu Side Template
 *  
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 * 
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}
?>

<div id="side-navigation" class="side-navigation">

    <a class="wpus-close" href="#"><?php printf( esc_html__( 'Close (%s)', 'adamas' ), '<i class="adamas-icon-close"></i>' ); ?></a>

    <?php
    if ( has_nav_menu( 'primary_menu' ) ) {
        wp_nav_menu( array( 
            'theme_location' => 'primary_menu', 
            'container'      => false, 
            'menu_id'        => 'side-menu',
            'menu_class'     => 'side-menu',
            'walker'         => new AdamasWalkerMenu(),
        ) );
    } else { 
        printf( '<ul class="side-menu"><li><a href="%s" class="text-reset">%s</a></li></ul>', admin_url( '/nav-menus.php' ),  esc_html__( 'Go to Dashboard > Appearance > Menus to set up and assign a menu!', 'adamas' ) ); }
    ?>

</div>