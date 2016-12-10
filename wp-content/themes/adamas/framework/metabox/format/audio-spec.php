<?php 
/**
 * Init Audio Post Format Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_audio_post_format_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_audio_post_format_metadata',
	'types'    => array( 'post' ),
	'title'    => esc_html__( 'Audio Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/format/audio-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_post_audio_',
) );