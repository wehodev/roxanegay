<?php
/**
 * Visual Composer: Counter
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_counter',
    'icon'        => 'icon-wpus-counter',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Counter', 'wpus-core' ),
    'description' => esc_html__( 'Add counter.', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'value',
            'heading'     => esc_html__( 'Value', 'wpus-core' ),
            'description' => esc_html__( 'Enter counter value.', 'wpus-core' ),
            'value'       => '2016',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'prefix',
            'heading'     => esc_html__( 'Prefix', 'wpus-core' ),
            'description' => esc_html__( 'Enter counter prefix.', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'suffix',
            'heading'     => esc_html__( 'Suffix', 'wpus-core' ),
            'description' => esc_html__( 'Enter counter suffix.', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'tag',
            'heading'     => esc_html__( 'Tag', 'wpus-core' ),
            'description' => esc_html__( 'Select element tag.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::tag() ),
            'std'         => 'h3',
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select counter alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select counter alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select counter alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs' ) ),
        ),

        // Style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'value_color',
            'heading'     => esc_html__( 'Value Color', 'wpus-core' ),
            'description' => esc_html__( 'Select value color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'prefix_color',
            'heading'     => esc_html__( 'Prefix Color', 'wpus-core' ),
            'description' => esc_html__( 'Select prefix color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'suffix_color',
            'heading'     => esc_html__( 'Suffix Color', 'wpus-core' ),
            'description' => esc_html__( 'Select suffix color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'typography',
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),
    ),

) );