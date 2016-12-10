<?php
/** 
 * Init Meta Boxes
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Include core file
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/MetaBox.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/MediaAccess.php';

// Include config file
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/format/gallery-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/format/video-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/format/audio-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/portfolio/portfolio-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/testimonials/testimonials-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/team/team-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/clients/clients-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/page/page-spec.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/slider/slider-spec.php';

// Global styles for the meta boxes
function adamas_metabox_style() {

    // Enqueue scripts and styles for registered pages (post types) only
    $screen = get_current_screen();

    if ( 'post' != $screen->base ) {
        return; 
    }

    // Enqueue script
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_media();
        
    // Enqueue style
    wp_enqueue_style( 'wp-color-picker' );
}

add_action( 'admin_enqueue_scripts', 'adamas_metabox_style' );