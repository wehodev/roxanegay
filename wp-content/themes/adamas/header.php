<?php 
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>
<!DOCTYPE HTML>
<!--[if lt IE 8]><html <?php language_attributes(); ?> class="ie7"><![endif]-->
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8 ie"><![endif]-->
<!--[if IE 9]><html <?php language_attributes(); ?> class="ie9 ie"><![endif]-->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link -->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php 
    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head(); ?> 

</head>
    
<body <?php body_class(); ?>>

<?php
// Include the site preloader template
get_template_part( 'partials/preloader' ); ?>

<!-- SITE WRAPPER (end in the footer.php) -->
<div id="wrapper" class="site-wrapper">

    <?php 
    // Include the site top bar template
    get_template_part( 'partials/topbar' ); ?>

    <?php
    // Include the site header template
    get_template_part( 'partials/header/header' ); ?>

    <?php
    // Include the site pahe hero template
    get_template_part( 'partials/hero/hero' ); ?>