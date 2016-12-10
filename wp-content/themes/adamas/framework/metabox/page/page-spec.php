<?php
/**
 * Init Clients Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_page_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_page_meta_data',
	'types'    => array( 'page', 'portfolio', 'post', 'product' ),
	'title'    => esc_html__( 'Page Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/page/page-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_'
) );