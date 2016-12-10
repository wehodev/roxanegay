<?php
/**
 * Here we have all the custom functions for the theme
 * Please be extremely cautious editing this file.
 * You have been warned!
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Default theme constants
 *
 * DO NOT MODIFY!!!
 *
 * @since 1.0
 */
define( 'ADAMAS_THEME_ACTIVATED', true );

define( 'ADAMAS_THEME_VERSION', '1.1.2' );

define( 'ADAMAS_THEME_URI', get_template_directory_uri() );
define( 'ADAMAS_THEME_DIR', get_template_directory() );
define( 'ADAMAS_THEME_ASSETS', ADAMAS_THEME_URI . '/assets' );

define( 'ADAMAS_FRAMEWORK_DIR', ADAMAS_THEME_DIR . '/framework' );
define( 'ADAMAS_FRAMEWORK_URI', ADAMAS_THEME_URI . '/framework' );
define( 'ADAMAS_FRAMEWORK_ASSETS', ADAMAS_FRAMEWORK_URI . '/assets' );

/**
 * DO NOT MOVE OR REMOVE THIS VARIABLE!!!
 *
 * It is a global variable and needs to be outside any function or class.
 * Used in multiple functions.
 *
 * @since 1.0
 */
$adamas_global_array = array(
	'style' => array(),
	'id'    => 1,
);

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

/**
 * Load necessary files
 *
 * @since 1.0
 */
require_once ADAMAS_FRAMEWORK_DIR . '/classes/init.php';
require_once ADAMAS_FRAMEWORK_DIR . '/functions/init.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_options.php';
require_once ADAMAS_FRAMEWORK_DIR . '/metabox/init.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_enqueue.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_core.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_support.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_filters.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_action.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_sidebars.php';
require_once ADAMAS_FRAMEWORK_DIR . '/widgets/init.php';
require_once ADAMAS_FRAMEWORK_DIR . '/theme_woocommerce.php';
require_once ADAMAS_FRAMEWORK_DIR . '/custom-styles/init.php';
require_once ADAMAS_FRAMEWORK_DIR . '/plugins/init.php';

/**
 * Init Metabox Media Access
 *
 * @since 1.0
 */
if ( is_admin() ) {
	$wpalchemy_media_access = new WPAlchemy_MediaAccess();
}

add_filter('http_request_timeout', function(){return 20;});

/**
 * Please use a child theme if you need to modify any aspect of the theme, if you need to, you can add code
 * below here if you need to add extra functionality.
 * Be warned! Any code added here will be overwritten on theme update!
 * Add & modify code at your own risk & always use a child theme instead for this!
 */
