<?php
/**
 * Visual Composer: Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

class WPBakeryShortCode_Wpus_Box extends WPBakeryShortCodesContainer {}

vc_map( array(
    
    'base'            => 'wpus_box',
    'icon'            => 'icon-wpus-box',
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'controls'        => 'full',
    'as_parent'       => array( 'except' => 'wpus_box' ),
    'category'        => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'            => esc_html__( 'Box', 'wpus-core' ),
    'description'     => esc_html__( 'Add box', 'wpus-core' ),
    'params'          => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_position',
            'heading'     => esc_html__( 'Colored Border', 'wpus-core' ),
            'description' => esc_html__( 'Select border position.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'None', 'wpus-core' )   => '',
                esc_html__( 'Top', 'wpus-core' )    => 'top',
                esc_html__( 'Right', 'wpus-core' )  => 'right',
                esc_html__( 'Bottom', 'wpus-core' ) => 'bottom',
                esc_html__( 'Left', 'wpus-core' )   => 'left',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_width',
            'heading'     => esc_html__( 'Colored Border: Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'border_position', 'not_empty' => true  ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'border_color',
            'heading'     => esc_html__( 'Colored Border: Color', 'wpus-core' ),
            'description' => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'border_position', 'not_empty' => true  ),
        ),

        // Design tab
        WpusVcParams::param_css(),
        WpusVcParams::param_box_shadow(),
        WpusVcParams::param_hover_box_shadow(),
        
        // Animation tab
        WpusVcParams::param_animation_type(),
        WpusVcParams::param_animation_delay(),
        WpusVcParams::param_animation_duration(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );