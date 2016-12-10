<?php
/**
 * Visual Composer: Carousel Custom Navigation
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(
    
    'base'        => 'wpus_carousel_nav',
    'icon'        => 'icon-wpus-carousel-nav',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Carousel Custom Nav', 'wpus-core' ),
    'description' => esc_html__( 'Add carousel custom nav', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'carousel_id',
            'heading'     => esc_html__( 'Carousel ID', 'wpus-core' ),
            'description' => esc_html__( 'Enter the ID of the carousel that you want to use.', 'wpus-core' ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'size',
            'heading'     => esc_html__( 'Size', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows size.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Default', 'wpus-core' ) => '',
                esc_html__( 'Small', 'wpus-core' )   => 'size-sm',
                esc_html__( 'Large', 'wpus-core' )   => 'size-lg',
            ),
            'admin_label' => true,
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select nav alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select nav alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select nav alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs' ) ),
        ),

        // Style tab
        array(
            'type'             => 'colorpicker',
            'param_name'       => 'color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'style', 'value' => 'style-outline' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'style', 'value' => 'style-outline' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );