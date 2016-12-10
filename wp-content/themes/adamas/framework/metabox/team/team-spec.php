<?php 
/**
 * Init Team Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_team_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_team_meta_data',
	'types'    => array( 'team' ),
	'title'    => esc_html__( 'Team Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/team/team-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_team_',
) );