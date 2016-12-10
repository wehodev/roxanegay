<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Column class
$shop_col = apply_filters( 'adamas_blog_col', array(
    'no-sidebar'   == adamas_get_page_layout() ? 'col-md-12' : 'col-md-9',
    'left-sidebar' == adamas_get_page_layout() ? 'col-md-push-3' : '',
) );
?>

<div id="content" class="site-content">

	<div class="container">
	    <div class="row">
	    
	        <div<?php AdamasHelper::html_class( $shop_col ); ?>>

	        	<main id="main" class="site-main">