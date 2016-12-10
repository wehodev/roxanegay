<?php
/**
 * Visual Composer: Group Buttons
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

class WPBakeryShortCode_wpus_group_button extends WPBakeryShortCodesContainer {}

vc_map( array(
    'base'                    => 'wpus_group_button',
    'icon'                    => 'icon-wpus-group-button',
    'content_element'         => true,
    'show_settings_on_create' => true,
    'is_container'            => true,
    'as_parent'               => array( 'only' => 'wpus_button' ),
    'category'                => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'                    => esc_html__( 'Group Buttons', 'wpus-core' ),
    'description'             => esc_html__( 'Add group buttons', 'wpus-core' ),
    'params'                  => array(

        // General Tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'space',
            'heading'     => esc_html__( 'Buttons Space', 'wpus-core' ),
            'description' => esc_html__( 'Select space between buttons.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
        ),
        
        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select buttons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select buttons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select buttons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs' ) ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),
        
    ),

    'js_view' => 'VcColumnView',

) );