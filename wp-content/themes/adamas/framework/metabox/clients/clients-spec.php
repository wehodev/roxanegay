<?php 
/**
 * Init Clients Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

$adamas_clients_metadata = new WPAlchemy_MetaBox( array(
	'id'       => 'adamas_clients_meta_data',
	'types'    => array( 'clients' ),
	'title'    => esc_html__( 'Clients Options', 'adamas' ),
	'template' => ADAMAS_FRAMEWORK_DIR . '/metabox/clients/clients-meta.php',
	'mode'     => WPALCHEMY_MODE_EXTRACT,
	'prefix'   => 'adamas_client_',
) );