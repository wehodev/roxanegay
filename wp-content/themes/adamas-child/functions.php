<?php
/**
 * Adamas WordPress Theme
 *	
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// This will enqueue style.css of child theme
add_action( 'wp_enqueue_scripts', 'wpus_enqueue_childtheme_scripts', 100 );

function wpus_enqueue_childtheme_scripts() {
	wp_enqueue_style( 'adamas-child', get_stylesheet_directory_uri() . '/style.css' );
}