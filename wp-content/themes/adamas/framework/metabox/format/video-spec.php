<?php 
/**
 * Init Video Post Format Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_video_post_format_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_video_post_format_metadata',
	'types'    => array( 'post' ),
	'title'    => esc_html__( 'Video Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/format/video-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_post_video_',
) );