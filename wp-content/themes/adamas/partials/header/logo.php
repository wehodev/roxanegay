<?php
/**
 * Template: Header Logo
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Get logo images
$default_logo = adamas_get_data( 'default_logo', 'url', ADAMAS_THEME_ASSETS . '/images/logo-default.png' );
$light_logo   = adamas_get_data( 'light_transparent_header_logo', 'url', $default_logo );
$dark_logo    = adamas_get_data( 'dark_transparent_header_logo', 'url', $default_logo );
$mobile_logo  = adamas_get_data( 'mobile_logo', 'url', $default_logo );

?>

<div id="logo" class="site-branding">
    <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php get_bloginfo( 'name' ) ?>">

        <img class="default-logo site-logo-image" src="<?php echo esc_url( $default_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>

        <?php if ( strpos( AdamasHeader::has_transparent(), 'light' ) ) : ?>
            <img class="light-logo site-logo-image" src="<?php echo esc_url( $light_logo ); ?>" alt="<?php get_bloginfo( 'name' ) ?>"/>
        <?php elseif ( strpos( AdamasHeader::has_transparent(), 'dark' ) ) : ?>
            <img class="dark-logo site-logo-image" src="<?php echo esc_url( $dark_logo ); ?>" alt="<?php get_bloginfo( 'name' ) ?>"/>
        <?php endif; ?>

        <img class="mobile-logo site-logo-image" src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>

    </a><!-- .site-logo -->
</div><!-- .site-branding -->
