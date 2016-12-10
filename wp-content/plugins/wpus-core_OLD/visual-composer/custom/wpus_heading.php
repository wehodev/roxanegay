<?php
/**
 * Visual Composer: Heading
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_heading',
    'icon'        => 'icon-wpus-heading',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Heading', 'wpus-core' ),
    'description' => esc_html__( 'Add heading with custom font', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textarea',
            'param_name'  => 'text',
            'heading'     => esc_html__( 'Text', 'wpus-core' ),
            'description' => esc_html__( 'Enter your text.', 'wpus-core' ),
            'std'         => esc_html__( 'This is custom heading element.', 'wpus-core' ),
            'admin_label' => true,
        ),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'tag',
            'heading'     => esc_html__( 'Tag', 'wpus-core' ),
            'description' => esc_html__( 'Select element tag.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::tag() ),
            'std'         => 'h3',
            'admin_label' => true,
        ),

        array(
            'type'        => 'vc_link',
            'param_name'  => 'link',
            'heading'     => esc_html__( 'URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Enable a URL link for the current element.', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
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
            'heading'          => esc_html__( 'Hover Color (for link)', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'font_size',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Font Size', 'wpus-core' ),
            'description'      => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'font_size_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Font Size on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'You can use px or em values', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'font_size_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Font Size on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'typography',
            'options'    => array( 'font-size' => false, 'text-align' => false ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        /// Animation tab
        WpusVcParams::param_animation_type(),
        WpusVcParams::param_animation_delay(),
        WpusVcParams::param_animation_duration(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );