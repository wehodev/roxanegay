<?php 
/**
 * Page Hero Slider Template
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// Get slider
$slider = get_post_meta( adamas_get_page_id(), 'adamas_hero_slider', true );

// Echo slider
echo do_shortcode( '[wpus_slider id="' . $slider . '"]' );