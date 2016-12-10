<?php 
/**
 * Init Gallery Post Format Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_gallery_post_format_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_gallery_post_format_metadata',
	'types'    => array( 'post' ),
	'title'    => esc_html__( 'Gallery Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/format/gallery-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_post_gallery_',
) );