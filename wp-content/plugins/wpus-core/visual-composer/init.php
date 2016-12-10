<?php 
/**
 * Visual composer init
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

if ( ! class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
	return; // Return if Visaual Copmoser isn't enabled 
}

add_action( 'vc_before_init', 'adamas_core_vc_init' );

function adamas_core_vc_init() {

	if ( ! defined( 'ADAMAS_THEME_ACTIVATED') || ADAMAS_THEME_ACTIVATED !== true ) {
	    return false;
	}

	global $vc_manager;
	
	if ( adamas_get_data( 'vc_set_as_theme' ) ) {
		$vc_manager->setIsAsTheme( true );
		$vc_manager->disableUpdater( true );
	}
	
	$list = array( 'page', 'post', 'portfolio' );
	$vc_manager->setEditorDefaultPostTypes( $list );
	$vc_manager->setEditorPostTypes( $list ); //this is required after VC update (probably from vc 4.5 version)
	$vc_manager->frontendEditor()->disableInline();
	$vc_manager->automapper()->setDisabled();

	// Includes core files
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/setup.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/icons.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/helpers.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/params.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/params/typography.php';

	// Includes elements map
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/vc_row.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/vc_column.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/vc_column_text.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/vc_accordion.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/vc_tabs.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_box.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_button.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_carousel.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_carousel_nav.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_slider.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_clients.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_code_snippet.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_counter.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_divider.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_empty_space.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_flickr.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_flip_box.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_gallery.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_google_map.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_group_button.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_heading.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_icon.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_icon_box.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_image.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_image_carousel.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_instagram.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_list.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_message.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_pie_chart.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_portfolio_carousel.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_portfolio_grid.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_portfolio_masonry.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_post_carousel.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_pricing_table.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_progres_bar.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_social.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_team.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_testimonials.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_twitter.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_video.php';

	if ( class_exists( 'WooCommerce' ) ) {
		require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_products_carousel.php';
		require_once ADAMAS_CORE_PLUGIN_PATH . '/visual-composer/custom/wpus_products_grid.php';
	}

}