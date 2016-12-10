<?php
/*
Plugin Name: Adamas Core
Plugin URI: http://wpuberstudio.com
Description: WP Uber Studio Core Plugin for Adamas Theme
Version: 1.0.2
Author: WP Uber Studio
Author URI: http://wpuberstudio.com
Text Domain: wpus-core
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

// Define constants
define( 'ADAMAS_CORE_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
define( 'ADAMAS_CORE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// Load functions
require_once ADAMAS_CORE_PLUGIN_PATH . '/functions/init.php';

// Load custom post types
require_once ADAMAS_CORE_PLUGIN_PATH . '/custom-posts/init.php';

// Load shortcodes
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/init.php';

// Load visual composer
require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/init.php';

// Load importer
require_once ADAMAS_CORE_PLUGIN_PATH . '/import/import.php';

// Load tinymce
require_once ADAMAS_CORE_PLUGIN_PATH . '/tinymce/tinymce.php';

// Register the plugin text domain
add_action( 'plugins_loaded', 'adamas_core_load_plugin_textdomain' );

function adamas_core_load_plugin_textdomain() {
    load_plugin_textdomain( 'adamas-core', false, ADAMAS_CORE_PLUGIN_PATH . '/languages' );
}

// Print theme notice
add_action( 'admin_notices', 'adamas_core_activate_theme_notice' );

function adamas_core_activate_theme_notice() { 
    if ( ! defined('ADAMAS_THEME_ACTIVATED') || ADAMAS_THEME_ACTIVATED !== true ) : ?>
   
        <div class="updated">
            <p><strong><?php esc_html_e( 'Please activate the Adamas theme to use WPUS Core plugin.', 'wpus-core' ); ?></strong></p>
            <?php $screen = get_current_screen(); ?>
            <?php if ( $screen -> base != 'themes' ) : ?>
                <p><a href="<?php echo esc_url( admin_url( 'themes.php' ) ); ?>"><?php _e( 'Activate theme', 'wpus-core' ); ?></a></p>
            <?php endif; ?>
        </div>

    <?php 
    endif;
}

function adamas_core_after_setup_theme() {

    // Allow shortcodes in widget text
    add_filter( 'widget_text', 'do_shortcode' );

    // Adding shortcodes to excerpts
    add_filter( 'the_excerpt', 'do_shortcode' );
    
}

add_action( 'after_setup_theme', 'adamas_core_after_setup_theme', 10 );