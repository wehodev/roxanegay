<?php
/**
 * Adamas Theme Action Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasThemeAction {

    /**
     * Constructor of the class
     *
     * @since 1.0
     */
    public function __construct() {

        // Add favicon
        add_action( 'wp_head', array( $this, 'add_favicon' ) );

        // Add cutom js in head
        add_action( 'wp_head', array( $this, 'add_custom_js_in_head' ) );

        // Add cutom js in footer
        add_action( 'wp_footer', array( $this, 'add_custom_js_in_footer' ), 99 );

        // Remove Rev Slider Metabox
        add_action( 'do_meta_boxes', array( $this, 'remove_revolution_slider_meta_boxes' ) );

        // Set revslider as theme
        add_action( 'init', array( $this, 'adamas_set_revslider_as_theme' ) );
    }

    /**
     * Add favicon
     *
     * @since 1.0
     */
    public static function add_favicon() {
        if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

            // Favicon
            if ( adamas_get_data( 'favicon', 'url' ) ) {
                printf( '<link rel="shortcut icon" href="%1$s"/>' . "\n", esc_url( adamas_get_data( 'favicon', 'url' ) ) );
            }

            // iPhone favicon
            if ( adamas_get_data( 'iphone_favicon', 'url' ) ) {
                printf( '<link rel="apple-touch-icon" href="%1$s" />' . "\n", esc_url( adamas_get_data( 'iphone_favicon', 'url' ) ) );
            }

            // iPhone retina favico
            if ( adamas_get_data( 'iphone_retina_favicon', 'url' ) ) {
                printf( '<link rel="apple-touch-icon" sizes="114x114" href="%1$s" />' . "\n", esc_url( adamas_get_data( 'iphone_retina_favicon', 'url' ) ) );
            }

            // iPad favicon
            if ( adamas_get_data( 'ipad_favicon', 'url' ) ) {
                printf( '<link rel="apple-touch-icon" sizes="72x72" href="%1$s" />' . "\n", esc_url( adamas_get_data( 'ipad_favicon', 'url' ) ) );
            }

            // iPad retina favicon
            if ( adamas_get_data( 'ipad_retina_favicon', 'url' ) ) {
                printf( '<link rel="apple-touch-icon" sizes="144x144" href="%1$s" />' . "\n", esc_url( adamas_get_data( 'ipad_retina_favicon', 'url' ) ) );
            }

        }
    }

    /**
     * Add cutom js in head
     *
     * @since 1.0
     */
    public static function add_custom_js_in_head() {
        if ( adamas_get_data( 'header_js' ) ) : ?>
            <script>var $j = jQuery.noConflict();$j(document).ready(function(){"use strict";<?php echo stripslashes( adamas_get_data( 'header_js' ) ) ?>});</script>
        <?php endif;
    }

    /**
     * Add cutom js in footer
     *
     * @since 1.0
     */
    public static function add_custom_js_in_footer() {
        if ( adamas_get_data( 'footer_js' ) ) : ?>
            <script>var $j = jQuery.noConflict();$j(document).ready(function(){"use strict";<?php echo stripslashes( adamas_get_data( 'footer_js' ) ) ?>});</script>
        <?php endif;
    }

    /**
     * Remove Rev Slider Metabox
     *
     * @since 1.0
     */
    public static function remove_revolution_slider_meta_boxes() {
        remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'product', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'portfolio', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'team', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'testimonials', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'clients', 'normal' );
        remove_meta_box( 'mymetabox_revslider_0', 'sliders', 'normal' );
    }

    /**
     * Set revslider as theme
     *
     * @since 1.0
     */
    public static function adamas_set_revslider_as_theme() {
        if ( function_exists( 'set_revslider_as_theme' ) ) {
            set_revslider_as_theme();
            remove_action(  'admin_notices', array( 'RevSliderAdmin', 'add_plugins' . '_' . 'page_notices' ) );
        }
    }

}

$adamas_theme_action = new AdamasThemeAction;
