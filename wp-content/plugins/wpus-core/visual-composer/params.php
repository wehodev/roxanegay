<?php
/**
 * Visual Composer Params Class
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

class WpusVcParams {

    /**
     * Param id name
     *
     * @since 1.0
     */
    public static function param_id( $args = array() ) {

        $return = array(
            'type'        => 'textfield',
            'param_name'  => 'el_id',
            'heading'     => esc_html__( 'Extra ID Name', 'wpus-core' ),
            'group'       => esc_html__( 'Extra', 'wpus-core' ),
            'description' => sprintf( __( 'Enter unique ID name (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'wpus-core' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
        );

        return $return;
    }

    /**
     * Param class name
     *
     * @since 1.0
     */
    public static function param_class( $args = array() ) {

        $return = array(
            'type'        => 'textfield',
            'param_name'  => 'el_class',
            'heading'     => esc_html__( 'Extra Class Name', 'wpus-core' ),
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'wpus-core' ),
            'group'       => esc_html__( 'Extra', 'wpus-core' ),
        );

        return $return;
    }

    /**
     * Param hidden
     *
     * @since 1.0
     */
    public static function param_hidden( $args = array() ) {

        $return = array(
            'type'             => 'checkbox',
            'edit_field_class' => 'vc_col-sm-12 vc_column wpus-vc-inline-checkbox',
            'param_name'       => 'el_hidden',
            'heading'          => esc_html__( 'Hide Element on:', 'wpus-core' ),
            'description'      => esc_html__( 'Control element visibility.', 'wpus-core' ),
            'group'            => esc_html__( 'Extra', 'wpus-core' ),
            'value'            => apply_filters( 'adamas_vc_hide_param_value', array(
                esc_html__( 'Desktop', 'wpus-core' )  => 'hidden-lg',
                esc_html__( 'Notebook', 'wpus-core' ) => 'hidden-md',
                esc_html__( 'Tablet', 'wpus-core' )   => 'hidden-sm',
                esc_html__( 'Mobile', 'wpus-core' )   => 'hidden-xs',
            ) ),  
        );

        return $return;
    }

    /**
     * Param css
     *
     * @since 1.0
     */
    public static function param_css( $args = array() ) {

        $return = array(
            'type'       => 'css_editor',
            'param_name' => 'css',
            'heading'    => esc_html__( 'Css', 'wpus-core' ),
            'group'      => esc_html__( 'Design', 'wpus-core' ),
        );

        return $return;
    }

    /**
     * Param animation type
     *
     * @since 1.0
     */
    public static function param_animation_type( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'animation_type',
            'heading'     => esc_html__( 'Animation', 'wpus-core' ),
            'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers.', 'wpus-core' ),
            'group'       => esc_html__( 'Animation', 'wpus-core' ),
            'dependency'  => array(),
        ), $args ) );

        $return = array(
            'type'        => 'dropdown',
            'heading'     => $heading,
            'param_name'  => $param_name,
            'description' => $description,
            'group'       => $group,
            'value'       => array( esc_html__( 'None', 'wpus-core' ) => '' ) + array_flip( AdamasShared::animation() ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param animation delay
     *
     * @since 1.0
     */
    public static function param_animation_delay( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'animation_delay',
            'heading'     => esc_html__( 'Animation Delay', 'wpus-core' ),
            'description' => esc_html__( 'Set the delay in milliseconds. For example write 300 = 0.3 seconds. Default: 0', 'wpus-core' ),
            'group'       => esc_html__( 'Animation', 'wpus-core' ),
            'dependency'  => array( 'element' => 'animation_type', 'not_empty' => true ),
        ), $args ) );

        $return = array(
            'type'        => 'textfield',
            'param_name'  => $param_name,
            'heading'     => $heading,
            'description' => $description,
            'group'       => $group,
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param animation duration
     *
     * @since 1.0
     */
    public static function param_animation_duration( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'animation_duration',
            'heading'     => esc_html__( 'Animation Duration', 'wpus-core' ),
            'description' => esc_html__( 'Set the delay in milliseconds. For example write 300 = 0.3 seconds. Default: 600', 'wpus-core' ),
            'group'       => esc_html__( 'Animation', 'wpus-core' ),
            'dependency'  => array( 'element' => 'animation_type', 'not_empty' => true ),
        ), $args ) );

        $return = array(
            'type'        => 'textfield',
            'param_name'  => $param_name,
            'heading'     => $heading,
            'description' => $description,
            'group'       => $group,
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param icon type
     *
     * @since 1.0
     */
    public static function param_icon_type( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'icon_type',
            'heading'     => esc_html__( 'Icon Library', 'wpus-core' ),
            'description' => esc_html__( 'Select icon library', 'wpus-core' ),
            'group'       => '',
            'dependency'  => array(),
        ), $args ) );

        $return = array(
            'type'        => 'dropdown',
            'heading'     => $heading,
            'param_name'  => $param_name,
            'description' => $description,
            'group'       => $group,
            'value'       => array(
                esc_html__( 'Select Icon Library', 'wpus-core' ) => '',
                esc_html__( 'FontAwesome Icons', 'wpus-core' )   => 'fontawesome',
                esc_html__( 'ET Line Icons', 'wpus-core' )       => 'etline',
                esc_html__( 'Linecons Icons', 'wpus-core' )      => 'linecons',
            ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param icon etline
     *
     * @since 1.0
     */
    public static function param_icon_etline( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'icon_etline',
            'heading'     => esc_html__( 'Icon', 'wpus-core' ),
            'description' => esc_html__( 'Select icon from library', 'wpus-core' ),
            'group'       => '',
            'dependency'  => array( 'element' => 'icon_type', 'value' => 'etline' ),
        ), $args ) );

        $return = array(
            'type'        => 'iconpicker',
            'heading'     => $heading,
            'param_name'  => $param_name,
            'description' => $description,
            'group'       => $group,
            'settings'    => array( 'emptyIcon' => false, 'type' => 'etline', 'iconsPerPage' => 200 ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param icon fontawesome
     *
     * @since 1.0
     */
    public static function param_icon_fontawesome( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'icon_fontawesome',
            'heading'     => esc_html__( 'Icon', 'wpus-core' ),
            'description' => esc_html__( 'Select icon from library', 'wpus-core' ),
            'group'       => '',
            'dependency'  => array( 'element' => 'icon_type', 'value' => 'fontawesome' ),
        ), $args ) );

        $return = array(
            'type'        => 'iconpicker',
            'heading'     => $heading,
            'param_name'  => $param_name,
            'description' => $description,
            'group'       => $group,
            'settings'    => array( 'emptyIcon' => false, 'type' => 'fontawesome', 'iconsPerPage' => 200 ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param icon linecons
     *
     * @since 1.0
     */
    public static function param_icon_linecons( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'icon_linecons',
            'heading'     => esc_html__( 'Icon', 'wpus-core' ),
            'description' => esc_html__( 'Select icon from library', 'wpus-core' ),
            'group'       => '',
            'dependency'  => array( 'element' => 'icon_type', 'value' => 'linecons' ),
        ), $args ) );

        $return = array(
            'type'        => 'iconpicker',
            'heading'     => $heading,
            'param_name'  => $param_name,
            'description' => $description,
            'group'       => $group,
            'settings'    => array( 'emptyIcon' => false, 'type' => 'linecons', 'iconsPerPage' => 200 ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }
    
    /**
     * Param Box Shadow
     *
     * @since 1.0
     */
    public static function param_box_shadow( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'box_shadow',
            'heading'     => esc_html__( 'Box Shadow', 'wpus-core' ),
            'group'       => esc_html__( 'Design', 'wpus-core' ),
            'dependency'  => array(),
        ), $args ) );

        $return = array(
            'type'        => 'textfield',
            'param_name'  => $param_name,
            'heading'     => $heading,
            'group'       => $group,
            'description' => sprintf( __( 'The Box Shadow option type is used to set: %s, %s, %s, %s, %s and %s. Ex: 10px 10px 5px 0 #888888', 'wpus-core' ), '<code>offset-x</code>', '<code>offset-y</code>', '<code>blur-radius</code>', '<code>spread-radius</code>', '<code>color</code>', '<code>inset</code>' ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

    /**
     * Param Hover Box Shadow
     *
     * @since 1.0
     */
    public static function param_hover_box_shadow( $args = array() ) {

        extract( shortcode_atts( array(
            'param_name'  => 'hover_box_shadow',
            'heading'     => esc_html__( 'Hover Box Shadow', 'wpus-core' ),
            'group'       => esc_html__( 'Design', 'wpus-core' ),
            'dependency'  => array(),
        ), $args ) );

        $return = array(
            'type'        => 'textfield',
            'param_name'  => $param_name,
            'heading'     => $heading,
            'group'       => $group,
            'description' => sprintf( __( 'The Box Shadow option type is used to set: %s, %s, %s, %s, %s and %s. Ex: 10px 10px 5px 0 #888888', 'wpus-core' ), '<code>offset-x</code>', '<code>offset-y</code>', '<code>blur-radius</code>', '<code>spread-radius</code>', '<code>color</code>', '<code>inset</code>' ),
        );

        if ( is_array( $dependency ) && ! empty( $dependency ) ) {
            $return['dependency'] = $dependency;
        }

        return $return;
    }

}