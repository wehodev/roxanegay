<?php 
/**
 * Top Bar Style
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Product content background color
$product_content_bg = AdamasHelper::get_style( array(
    'background_color' => adamas_get_data( 'product_background_color' ),
) );

if ( $product_content_bg ) {
    $css_output .= ".wpus-single-product{{$product_content_bg}}";
}