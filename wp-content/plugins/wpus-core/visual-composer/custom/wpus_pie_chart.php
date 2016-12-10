<?php
/**
 * Visual Composer: Pie Chart
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_pie_chart',
    'icon'        => 'icon-wpus-pie-chart',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Pie Chart', 'wpus-core' ),
    'description' => esc_html__( 'Add pie chart', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'percentage',
            'heading'     => esc_html__( 'Percentage', 'wpus-core' ),
            'description' => esc_html__( 'Enter the percentage of the chart value. Note: choose range from 0 to 100.', 'wpus-core' ),
            'std'         => '90',
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'label_type',
            'heading'     => esc_html__( 'Label Type', 'wpus-core' ),
            'description' => esc_html__( 'Select label type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Text', 'wpus-core' ) => 'text',
                esc_html__( 'Icon', 'wpus-core' ) => 'icon',
            ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'label',
            'heading'     => esc_html__( 'Label', 'wpus-core' ),
            'description' => esc_html__( 'Enter the content for the center of the chart.', 'wpus-core' ),
            'std'         => '90%',
            'dependency'  => array( 'element' => 'label_type', 'value' => 'text' ),
            'admin_label' => true,
        ),

        WpusVcParams::param_icon_type( array( 'dependency' => array( 'element' => 'label_type', 'value' => 'icon' ) ) ),
        WpusVcParams::param_icon_etline(),
        WpusVcParams::param_icon_fontawesome(),
        WpusVcParams::param_icon_linecons(),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'chart_size',
            'heading'     => esc_html__( 'Pie Chart Size', 'wpus-core' ),
            'description' => esc_html__( 'Select pie chart size.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Small', 'wpus-core' )    => 'small',
                esc_html__( 'Standart', 'wpus-core' ) => 'standart',
                esc_html__( 'Large', 'wpus-core' )    => 'large',
            ),
            'std' => 'standart',
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'line_thickness',
            'heading'     => esc_html__( 'Line Thickness', 'wpus-core' ),
            'description' => esc_html__( 'Enter value without px.', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'line_style',
            'heading'     => esc_html__( 'Line Style', 'wpus-core' ),
            'description' => esc_html__( 'Select line style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Round', 'wpus-core' )  => 'round',
                esc_html__( 'Square', 'wpus-core' ) => 'square',
            ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select pie chart alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( '', 'pie-chart' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select pie chart alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm', 'pie-chart' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select pie chart alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs', 'pie-chart' ) ),
        ),
        
        // Style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'track_color',
            'heading'     => esc_html__( 'Track Color', 'wpus-core' ),
            'description' => esc_html__( 'Select track color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'bar_color',
            'heading'     => esc_html__( 'Bar Color', 'wpus-core' ),
            'description' => esc_html__( 'Select bar color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'label_color',
            'heading'     => esc_html__( 'Label Color', 'wpus-core' ),
            'description' => esc_html__( 'Select label color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'label_type', 'value' => 'text' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'label_typography',
            'options'    => array( 'text-align' => false, 'line-height' => false ),
            'dependency' => array( 'element' => 'label_type', 'value' => 'text' ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'label_type', 'value' => 'icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_size',
            'heading'     => esc_html__( 'Icon Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'label_type', 'value' => 'icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );