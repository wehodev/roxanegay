<?php
/**
 * Sets up theme defaults and registers support for various wordpress features
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasThemeSupport {

	/**
     * Constructor of the class
     *
     * @since 1.0
     */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ), 10 );
	}

	/**
     * Sets up theme features
     *
     * @since 1.0
     */
	public function after_setup_theme() {

		// Enable support for Post Formats
	    add_theme_support( 'post-formats', array(
	    	'gallery',
	    	'video',
	    	'audio',
	    ) );

	    // Add RSS feed links to <head> for posts and comments
	    add_theme_support( 'automatic-feed-links' );

	    // Add page excerpt
	    add_post_type_support( 'page', 'excerpt' );

	    // Register menus
	    add_theme_support( 'nav-menus' );
	    register_nav_menus( array(
	        'primary_menu' => esc_html__( 'Primary Navigation', 'adamas' ),
	        'mobile_menu'  => esc_html__( 'Mobile Navigation', 'adamas' ),
	    ) );

	    // Enable support for Post Thumbnails on posts and pages
	   	add_theme_support( 'post-thumbnails' );
    	set_post_thumbnail_size( 800, 800 );

	    // Add image size
	    add_image_size( 'adamas-image-square', 600, 600, true );
	    add_image_size( 'adamas-image-square-large', 1200, 1200, true );
	    add_image_size( 'adamas-image-horizontal', 800, 600, true );
	    add_image_size( 'adamas-image-horizontal-wide', 800, 500, true );
	    add_image_size( 'adamas-image-horizontal-large', 1170, 660, true );
	    add_image_size( 'adamas-image-vertical', 600, 800, true );
	    add_image_size( 'adamas-image-vertical-large', 560, 1120, true );

	    // This theme styles the visual editor to resemble the theme style.
	    add_editor_style( 'framework/assets/css/editor.css' );

	    /*
	     * Let WordPress manage the document title.
	     * By adding theme support, we declare that this theme does not use a
	     * hard-coded <title> tag in the document head, and expect WordPress to
	     * provide it for us.
	     */
	    add_theme_support( 'title-tag' );

	    /*
	     * Make theme available for translation.
	     * Translations can be filed in the /languages/ directory.
	     * If you're building a theme based on Adamas, use a find and replace
	     * to change 'adamas' to the name of your theme in all the template files
	     */
	    load_theme_textdomain( 'adamas', ADAMAS_THEME_DIR . '/languages' );

	    /*
	     * Switch default core markup for search form, comment form,
	     * and comments to output valid HTML5.
	     */
	    add_theme_support( 'html5' );

	    // This theme uses its own gallery styles
	    add_filter( 'use_default_gallery_style', '__return_false' );

	    // Add support for WooCommerce
	    add_theme_support( 'woocommerce' );

	}

	/**
     * Other
     *
     * @since 1.0
     */
    public function theme_suport_false() {
        add_theme_support( 'custom-header', false );
        add_theme_support( 'custom-background', false );
    }

}


$adamas_theme_support = new AdamasThemeSupport;
