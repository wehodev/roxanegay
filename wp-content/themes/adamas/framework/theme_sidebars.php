<?php
/**
 * Adamas Theme Sidebars Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasThemeSidebars {

	/**
     * Constructor of the class
     *
     * @since 1.0
     */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
	}

	/**
     * Registers the default theme sidebars
     *
     * @since 1.0
     */
	public function register_sidebars() {

		// Page sidebar
	    register_sidebar( array (
	        'id'            => 'sidebar-page',
	        'name'          => esc_html__( 'Page Sidebar' , 'adamas' ),
	        'description'   => esc_html__( 'The page sidebar.', 'adamas' ),
	        'before_widget' => '<section id="%1$s" class="widget %2$s clr">',
	        'after_widget'  => '</section>',
	        'before_title'  => '<h6 class="widget-title">',
	        'after_title'   => '</h6>',
	    ) );

	    // Blog sidebar
	    register_sidebar( array (
	        'id'            => 'sidebar-blog',
	        'name'          => esc_html__( 'Blog Sidebar' , 'adamas' ),
	        'description'   => esc_html__( 'The blog sidebar.', 'adamas' ),
	        'before_widget' => '<section id="%1$s" class="widget %2$s clr">',
	        'after_widget'  => '</section>',
	        'before_title'  => '<h6 class="widget-title">',
	        'after_title'   => '</h6>',
	    ) );

	    // Shop sidebar
	    if ( class_exists( 'WooCommerce' ) ) {
	        register_sidebar( array (
	            'id'            => 'sidebar-shop',
	            'name'          => esc_html__( 'Shop Sidebar' , 'adamas' ),
	            'description'   => esc_html__( 'The shop sidebar.', 'adamas' ),
	            'before_widget' => '<section id="%1$s" class="widget %2$s clr">',
	            'after_widget'  => '</section>',
	            'before_title'  => '<h6 class="widget-title">',
	            'after_title'   => '</h6>',
	        ) );
	    }

	    // Top bar sidebars
	    $top_bar_columns = adamas_get_data( 'top_bar_columns' );

	    $top_bar_args = array(
	        'id'            => 'sidebar-top-bar',
	        'description'   => esc_html__( 'The top bar widget area. Support widgets: Text and Custom Menu.', 'adamas' ),
	        'before_widget' => '<div id="%1$s" class="top-bar-widget %2$s clr">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<span class="wpus-hide">',
	        'after_title'   => '</span>',
	    );

	    if ( '1' == $top_bar_columns ) {
	        $top_bar_args['name'] = esc_html__( 'Top Bar Sidebar' , 'adamas' );
	    } else {
	        $top_bar_args['name'] = esc_html__( 'Top Bar Sidebar %d' , 'adamas' );
	    }

	    register_sidebars( $top_bar_columns, $top_bar_args );

	    // Footer Sidebars
	    $footer_columns = adamas_get_data( 'footer_columns' );

	    $footer_args = array(
	        'id'            => 'sidebar-footer',
	        'description'   => esc_html__( 'The footer widget area.', 'adamas' ),
	        'before_widget' => '<section id="%1$s" class="widget %2$s clr">',
	        'after_widget'  => '</section>',
	        'before_title'  => '<h6 class="widget-title">',
	        'after_title'   => '</h6>',
	    );

	    if ( '1' == $footer_columns ) {
	        $footer_args['name'] = esc_html__( 'Footer Sidebar', 'adamas' );
	    } else {
	        $footer_args['name'] = esc_html__( 'Footer Sidebar %d', 'adamas' );
	    }

	    register_sidebars( $footer_columns, $footer_args );

	    // Copyright Sidebars
	    $copyright_columns = adamas_get_data( 'copyright_columns' );

	    $copyright_args = array(
	        'id'            => 'sidebar-copyright',
	        'description'   => esc_html__( 'The copyright widget area. Support widgets: Text and Custom Menu.', 'adamas' ),
	        'before_widget' => '<div id="%1$s" class="copyright-widget %2$s clr">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<span class="wpus-hide">',
	        'after_title'   => '</span>',
	    );

	    if ( '1' == $copyright_columns ) {
	        $copyright_args['name'] = esc_html__( 'Copyright Sidebar', 'adamas' );
	    } else {
	        $copyright_args['name'] = esc_html__( 'Copyright Sidebar %d' , 'adamas' );
	    }

	    register_sidebars( $copyright_columns, $copyright_args );

	}

}

$adamas_theme_sidebars = new AdamasThemeSidebars;
