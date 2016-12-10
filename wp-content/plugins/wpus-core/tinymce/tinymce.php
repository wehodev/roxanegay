<?php
/**
 * Add more buttons to the MCE editor
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

/**
 * Enable font size buttons in the editor
 *
 * @since 1.0
 */
add_filter( 'mce_buttons_2', 'adamas_mce_buttons' );
function adamas_mce_buttons( $buttons ) {
    array_unshift( $buttons, 'fontsizeselect' );
    return $buttons;
}

/**
 * Customize mce editor font sizes
 *
 * @since 1.0
 */
add_filter( 'tiny_mce_before_init', 'adamas_mce_customize_text_sizes' );
function adamas_mce_customize_text_sizes( $initArray ){
    $initArray['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 33px 34px 35px 36px 37px 38px 39px 40px 41px 42px 43px 44px 45px 46px 47px 48px 49px 50px";
    return $initArray;
}

/**
 * Enable shortcodes buttons in the editor
 *
 * @since 1.0
 */
function adamas_mce_shortcode_button( $buttons ) {
    array_push( $buttons, '|', 'adamas_shortcodes' );
    return $buttons;
}

function adamas_mce_shortcode_plugin( $plugin_array ) {
    $plugin_array['adamas_shortcodes'] = ADAMAS_CORE_PLUGIN_URL . '/tinymce/tinymce.js';
    return $plugin_array;
}

add_action( 'after_setup_theme', 'adamas_mcs_add_shortcodes_button' );
function adamas_mcs_add_shortcodes_button() {

    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages'  ) ) {
        return;
    }

    if ( get_user_option( 'rich_editing' ) == 'true' ) {
        add_filter( 'mce_external_plugins', 'adamas_mce_shortcode_plugin' );
        add_filter( 'mce_buttons', 'adamas_mce_shortcode_button' );
    }
}