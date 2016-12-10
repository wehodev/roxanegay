<?php 
/**
 * Page Hero Revolution Slider Template
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

// Get revolution slider
$revslider = get_post_meta( adamas_get_page_id(), 'adamas_hero_revslider', true );

// Echo revolution slider
echo do_shortcode( '[rev_slider alias="' . $revslider . '"]' );