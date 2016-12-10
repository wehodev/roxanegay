<?php
/**
 * Init Functions
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

add_action( 'init', 'adamas_core_init_functions' );

function adamas_core_init_functions() {

	if ( ! defined( 'ADAMAS_THEME_ACTIVATED') || ADAMAS_THEME_ACTIVATED !== true ) {
        return false;
    }

    require_once ADAMAS_CORE_PLUGIN_PATH . '/functions/thumbnails.php';
    require_once ADAMAS_CORE_PLUGIN_PATH . '/functions/flickr.php';
    require_once ADAMAS_CORE_PLUGIN_PATH . '/functions/instagram.php';
    require_once ADAMAS_CORE_PLUGIN_PATH . '/functions/twitter.php';
     
}