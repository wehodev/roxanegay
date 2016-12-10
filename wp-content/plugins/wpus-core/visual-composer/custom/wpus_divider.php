<?php
/**
 * Visual Composer: Divider
 * 
 * @author  WP Uber Studio
 * @package Adamas
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_divider',
    'icon'        => 'icon-wpus-divider',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Divider', 'wpus-core' ),
    'description' => esc_html__( 'Add Horizontal separator line', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Type', 'wpus-core' ),
            'description' => esc_html__( 'Select type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Simple', 'wpus-core' )    => 'type-simple',
                esc_html__( 'With Text', 'wpus-core' ) => 'type-text',
                esc_html__( 'With Icon', 'wpus-core' ) => 'type-icon',
            ),
            'std'         => 'type-simple',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'margin_top_value',
            'heading'     => esc_html__( 'Margin Top', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'margin_bottom_value',
            'heading'     => esc_html__( 'Margin Bottom', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'width',
            'heading'     => esc_html__( 'Width', 'wpus-core' ),
            'description' => esc_html__( 'You can use px, em or % value.', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Solid', 'wpus-core' )              => 'solid',
                esc_html__( 'Dotted', 'wpus-core' )             => 'dotted',
                esc_html__( 'Dashed', 'wpus-core' )             => 'dashed',
                esc_html__( 'Double', 'wpus-core' )             => 'double',
                esc_html__( 'Image Dotted Dark', 'wpus-core' )  => 'divider-dotted-dark',
                esc_html__( 'Image Dotted Light', 'wpus-core' ) => 'divider-dotted-light',
                esc_html__( 'Image Saw Dark', 'wpus-core' )     => 'divider-saw-dark',
                esc_html__( 'Image Saw Light', 'wpus-core' )    => 'divider-saw-light',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'height',
            'heading'     => esc_html__( 'Height', 'wpus-core' ),
            'description' => esc_html__( 'Select height.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'style', 'value' => array( 'solid', 'dotted', 'dashed', 'double' ) ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'color',
            'heading'     => esc_html__( 'Color', 'wpus-core' ),
            'description' => esc_html__( 'Select color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => array( 'solid', 'dotted', 'dashed', 'double' ) ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_height',
            'heading'     => esc_html__( 'Height', 'wpus-core' ),
            'description' => esc_html__( 'Select height.', 'wpus-core' ),
            'value'       => array(
                esc_html__( '1 Dotted', 'wpus-core' ) => '1px',
                esc_html__( '2 Dotted', 'wpus-core' ) => '3px',
                esc_html__( '3 Dotted', 'wpus-core' ) => '5px',
                esc_html__( '4 Dotted', 'wpus-core' ) => '7px',
            ),
            'std'        => '5px',
            'dependency' => array( 'element' => 'style', 'value' => array( 'divider-dotted-dark', 'divider-dotted-light' ) ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_opacity',
            'heading'     => esc_html__( 'Opacity', 'wpus-core' ),
            'description' => esc_html__( 'Select opacity.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::opacity() ),
            'dependency'  => array( 'element' => 'style', 'value' => array( 'divider-dotted-dark', 'divider-dotted-light', 'divider-saw-dark', 'divider-saw-light' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( '', 'divider' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm', 'divider' ) ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select heading alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs', 'divider' ) ),
        ),

        // Title tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Enter title.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'type', 'value' => array( 'type-text' ) ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core' ),
            'description' => esc_html__( 'Select color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'type', 'value' => array( 'type-text' ) ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'title_typography',
            'options'    => array( 'text-align' => false ),
            'dependency' => array( 'element' => 'type', 'value' => array( 'type-text' ) ),
            'group'      => esc_html__( 'Title', 'wpus-core' ),
        ),

        // Icon tab
        WpusVcParams::param_icon_type( array( 'group' => esc_html__( 'Icon', 'wpus-core' ), 'dependency' => array( 'element' => 'type', 'value' => array( 'type-icon' ) ) ) ),
        WpusVcParams::param_icon_etline( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_fontawesome( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_linecons( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select color', 'wpus-core' ),
            'dependency'  => array( 'element' => 'type', 'value' => array( 'type-icon' ) ),
            'group'       => esc_html__( 'Icon', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_size',
            'heading'     => esc_html__( 'Icon Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'type', 'value' => array( 'type-icon' ) ),
            'group'       => esc_html__( 'Icon', 'wpus-core' ),
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