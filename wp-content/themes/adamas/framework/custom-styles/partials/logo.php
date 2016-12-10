<?php
/**
 * Logo Style
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get data
$default_logo_width       = adamas_get_data( 'default_logo_width' );
$sticky_header_logo_width = adamas_get_data( 'sticky_header_logo_width', '', $default_logo_width );
$mobile_logo_width        = adamas_get_data( 'mobile_logo_width', '', $default_logo_width );

// Default logo width
$css_output .= ".site-header:not(.header-sticky) .site-logo-image:not(.mobile-logo){max-width:{$default_logo_width}px;}";

// Sticky header logo width
$css_output .= ".site-header.is-shrunk .site-logo-image{max-width:{$sticky_header_logo_width}px !important;}";

// Mobile header logo height
$css_output .= ".site-header:not(.header-sticky) .mobile-logo{max-width:{$mobile_logo_width}px;}";
