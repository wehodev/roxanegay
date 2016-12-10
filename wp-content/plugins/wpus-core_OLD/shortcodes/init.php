<?php 
/**
 * Load shortcodes files
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_slider.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_box.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_button.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_carousel.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_carousel_nav.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_clients.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_code_snippet.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_counter.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_divider.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_empty_space.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_flickr.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_flip_box.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_gallery.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_google_map.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_group_button.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_heading.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_icon.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_icon_box.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_image.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_image_carousel.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_instagram.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_list.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_message.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_pie_chart.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_portfolio_carousel.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_portfolio_filter.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_portfolio_grid.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_portfolio_masonry.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_post_carousel.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_pricing_table.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_progres_bar.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_social.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_team.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_testimonials.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_twitter.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_video.php';
require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_highlight.php';

if ( class_exists( 'WooCommerce' ) ) {
	require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_products_carousel.php';
	require_once ADAMAS_CORE_PLUGIN_PATH . '/shortcodes/wpus_products_grid.php';
}