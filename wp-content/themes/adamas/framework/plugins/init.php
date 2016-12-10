<?php
/**
 * Register the required plugins for this theme
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Include the TGM_Plugin_Activation class
 *
 * @since 1.0
 */
require_once ADAMAS_FRAMEWORK_DIR . '/plugins/tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme
 *
 * @since 1.0
 */
add_action( 'tgmpa_register', 'adamas_register_required_plugins' );

function adamas_register_required_plugins() {

	// Array of plugin arrays
	$plugins = array(

		array(
			'name'               => 'Adamas Core',
			'slug'               => 'wpus-core',
			'source'             => ADAMAS_FRAMEWORK_DIR . '/plugins/src/wpus-core.zip',
			'required'           => true,
			'version'            => '1.0.2',
			'force_activation'   => false,
			'force_deactivation' => false,
        ),

		array(
			'name'               => 'Visual Composer',
			'slug'               => 'js_composer',
			'source'             => ADAMAS_FRAMEWORK_DIR . '/plugins/src/js_composer.zip',
			'required'           => true,
			'version'            => '4.11.2.1',
			'force_activation'   => false,
			'force_deactivation' => false,
        ),

        array(
			'name'               => 'Revolution Slider',
			'slug'               => 'revslider',
			'source'             => ADAMAS_FRAMEWORK_DIR . '/plugins/src/revslider.zip',
			'version'            => '5.2.5',
			'required'           => false,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
	    ),

		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
        ),

        array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
        ),

	);

	// Array of configuration settings.
	$config = array(
		'id'           => 'adamas_theme',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
    );

	tgmpa( $plugins, $config );

}
