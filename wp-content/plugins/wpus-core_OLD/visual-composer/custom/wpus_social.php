<?php
/**
 * Visual Composer: Social
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_social',
    'icon'        => 'icon-wpus-social',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Social', 'wpus-core' ),
    'description' => esc_html__( 'Add social icon', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'param_group',
            'heading'     => esc_html__( 'Add Social Icon', 'wpus-core' ),
            'description' => esc_html__( 'Select icon and url.', 'wpus-core' ),
            'param_name'  => 'values',
            'value'       => urlencode( json_encode( array(
                array( 'icon' => 'facebook', 'url' => 'http://facebook.com' ),
                array( 'icon' => 'twitter',  'url' => 'http://twitter.com' ),
                array( 'icon' => 'vk',       'url' => 'http://vk.com' ),
            ) ) ),
            'params' => array(

                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'icon',
                    'heading'     => esc_html__( 'Icon', 'wpus-core' ),
                    'description' => esc_html__( 'Select social icon.', 'wpus-core' ),
                    'value'       => array_flip( AdamasShared::social() ),
                    'admin_label' => true,
                ),

                array(
                    'type'        => 'href',
                    'param_name'  => 'url',
                    'heading'     => esc_html__( 'URL', 'wpus-core' ),
                    'description' => esc_html__( 'Enter URL.', 'wpus-core' ),
                    'admin_label' => true,
                ),

            ),

            'callbacks' => array( 'after_add' => 'vcChartParamAfterAddCallback' ),
        ),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select style.', 'wpus-core' ),
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
            'description' => esc_html__( 'Select size.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Normal', 'wpus-core' )      => '',
                esc_html__( 'Small', 'wpus-core' )       => 'size-sm',
                esc_html__( 'Large', 'wpus-core' )       => 'size-lg',
                esc_html__( 'Extra Large', 'wpus-core' ) => 'size-ex-lg',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'target',
            'heading'     => esc_html__( 'Link Target', 'wpus-core' ),
            'description' => esc_html__( 'Select where to open links.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Same Window', 'wpus-core' ) => '_self',
                esc_html__( 'New Window', 'wpus-core' )  => '_blank',
            ),
            'std' => '_blank',
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select icons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select icons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select icons alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs' ) ),
        ),

        // Style tab
        array(
            'type'             => 'colorpicker',
            'param_name'       => 'color',
            'edit_field_class' => 'vc_col-sm-6 vc_column wpus-padding-top',
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

        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_style',
            'heading'     => esc_html__( 'Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-outline' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_width',
            'heading'     => esc_html__( 'Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_radius',
            'heading'     => esc_html__( 'Border Radius', 'wpus-core' ),
            'description' => esc_html__( 'Select border radius.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_radius() ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

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