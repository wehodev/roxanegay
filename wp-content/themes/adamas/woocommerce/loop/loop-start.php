<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

global $woocommerce_loop;

if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', adamas_get_data( 'shop_columns_lg', '', '4' ) );

// Wrap css class
$wrap_class = apply_filters( 'adamas_shop_class', array(
	'products',
	'wpus-grid',
) );

// Wrap atributes 
$wrap_atributes = apply_filters( 'adamas_products_grid_args', array(
	'column-lg'     => $woocommerce_loop['columns'],
	'column-md'     => adamas_get_data( 'shop_columns_md' ),
	'column-sm'     => adamas_get_data( 'shop_columns_sm' ),
	'column-xs'     => adamas_get_data( 'shop_columns_xs' ),
	'margin-right'  => absint( adamas_get_data( 'shop_items_margin_right' ) ),
	'margin-bottom' => absint( adamas_get_data( 'shop_items_margin_bottom' ) ),
	'layout'        => 'fitRows',
) );

?>

<div<?php AdamasHelper::html_class( $wrap_class ); ?><?php AdamasHelper::html_attributes( $wrap_atributes ); ?>>