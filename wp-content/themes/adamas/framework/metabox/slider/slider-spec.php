<?php 
/**
 * Init Slider Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_slider_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'wpus_slider_meta_data',
	'types'    => array( 'sliders' ),
	'title'    => esc_html__( 'Slider Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/slider/slider-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'wpus_slider_',
) );