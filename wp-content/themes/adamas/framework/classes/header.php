<?php
/**
 * Adamas Header Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasHeader {

    /**
     * Get header type
     *
     * @since 1.0
     */
    public static function get_type() {

        $header_type = adamas_get_data( 'header_type', '', 'header-type-1' );

        if ( isset( $_GET['header_type'] ) ) {
            $header_type = esc_attr( $_GET['header_type'] );
        }

        $header_type = $header_type;

        return apply_filters( 'adamas_header_type', $header_type  );
    }

    /**
     * Check to see if the transparent header is enabled on a specific page
     *
     * @since 1.0
     */
    public static function has_transparent() {

        $return = get_post_meta( adamas_get_page_id(), 'adamas_transparent_header', true ) ;

        if ( empty( $return ) || 'off' == $return ) {
            return false;
        } else {
            return $return;
        }
    }

    /**
     * Get menu type
     *
     * @since 1.0
     */
    public static function get_menu_type() {

        $menu_type = adamas_get_data( 'menu_type', '', 'menu-standart' );

        if ( isset( $_GET['menu_type'] ) ) {
            $menu_type = esc_attr( $_GET['menu_type'] );
        }

        $menu_type = $menu_type;

        return apply_filters( 'adamas_menu_type', $menu_type  );
    }

}