<?php 
/**
 * Page Hero Template
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

// Return if page header isn't enabled
if ( ! adamas_get_meta_data( 'hero_type' ) ) {
    return;
}

// Get hero type
$hero_type = get_post_meta( adamas_get_page_id(), 'adamas_hero_type', true );

// Include the hero template
get_template_part( 'partials/hero/' . $hero_type );