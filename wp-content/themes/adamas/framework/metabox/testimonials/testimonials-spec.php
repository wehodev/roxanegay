<?php 
/**
 * Init Testimonials Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_testimonials_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_testimonials_meta_data',
	'types'    => array( 'testimonials' ),
	'title'    => esc_html__( 'Testimonials Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/testimonials/testimonials-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_testimonial_',
) );