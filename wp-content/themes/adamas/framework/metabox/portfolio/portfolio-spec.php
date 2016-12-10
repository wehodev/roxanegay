<?php 
/**
 * Init Portfolio Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_portfolio_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_portfolio_meta_data',
	'types'    => array( 'portfolio' ),
	'title'    => esc_html__( 'Portfolio Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/portfolio/portfolio-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_portfolio_',
) );