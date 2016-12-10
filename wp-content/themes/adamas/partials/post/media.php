<?php 
/**
 * Template: Post Meta
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'post_featured_image' ) ) {
    return; // Return if featured images is disabled
}

switch ( get_post_format() ) {
    case 'video':
        AdamasBlog::video();
        break;
    case 'audio':
        AdamasBlog::audio();
        break;
    case 'gallery':
        AdamasBlog::gallery();
        break;
    default:
        AdamasBlog::thumbnail();
        break;
}