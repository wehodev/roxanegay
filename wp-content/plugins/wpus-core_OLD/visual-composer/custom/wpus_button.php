<?php
/**
 * Visual Composer: Button
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_button',
    'icon'        => 'icon-wpus-button',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Button', 'wpus-core' ),
    'description' => esc_html__( 'Add button', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select button style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
                esc_html__( 'Link', 'wpus-core' )       => 'style-link',
            ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Text', 'wpus-core' ),
            'value'       => esc_html__( 'Button', 'wpus-core' ),
            'description' => esc_html__( 'Text on the button.', 'wpus-core' ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'link_type',
            'heading'     => esc_html__( 'Link Type', 'wpus-core' ),
            'description' => esc_html__( 'Select link type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Link', 'wpus-core' )                     => 'link',
                esc_html__( 'Open Image in Lighbox', 'wpus-core' )    => 'image',
                esc_html__( 'Open Youtube in Lightbox', 'wpus-core' ) => 'youtube',
                esc_html__( 'Open Vimeo in Lightbox', 'wpus-core' )   => 'vimeo',
            ),
        ),

        array(
            'type'        => 'vc_link',
            'param_name'  => 'link',
            'heading'     => esc_html__( 'URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Enable a URL link for the current element.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'link' ) ),
        ),

        array(
            'type'        => 'attach_image',
            'param_name'  => 'image_id',
            'heading'     => esc_html__( 'Choose image', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'image' ) ),
        ),

        array(
            'param_name'  => 'youtube_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Youtube URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter youtube URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'youtube' ) ),
        ),

        array(
            'param_name'  => 'vimeo_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Vimeo URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter vimeo URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'vimeo' ) ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'size',
            'heading'     => esc_html__( 'Size', 'wpus-core' ),
            'description' => esc_html__( 'Select button size.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Default', 'wpus-core' )    => '',
                esc_html__( 'Small', 'wpus-core' )      => 'size-sm',
                esc_html__( 'Large', 'wpus-core' )      => 'size-lg',
                esc_html__( 'Full Width', 'wpus-core' ) => 'size-full',
            ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-link' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'height',
            'heading'     => esc_html__( 'Button Height', 'wpus-core' ),
            'description' => esc_html__( 'Enter value in px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'size', 'value' => 'size-full' ),
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

        // Icon tab
        WpusVcParams::param_icon_type( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_etline( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_fontawesome( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_linecons( array( 'group' => esc_html__( 'Icon', 'wpus-core' ) ) ),

        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Icon Position', 'wpus-core' ),
            'description' => esc_html__( 'Select icon position.', 'wpus-core' ),
            'param_name'  => 'icon_position',
            'value'       => array(
                esc_html__( 'Icon Left', 'wpus-core' )  => 'left',
                esc_html__( 'Icon Right', 'wpus-core' ) => 'right',
            ),
            'std'        => 'right',
            'dependency' => array( 'element' => 'icon_type', 'not_empty' => true  ),
            'group'      => esc_html__( 'Icon', 'wpus-core' ),
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
            'dependency'       => array( 'element' => 'style', 'value_not_equal_to' => 'style-link' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'style', 'value_not_equal_to' => 'style-link' ),
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
            'value'      => array_flip( AdamasShared::border_radius() ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => array( 'style-link' ) ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        WpusVcParams::param_box_shadow( array( 'group' => esc_html__( 'Style', 'wpus-core' ), 'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-link' ) ) ),
        WpusVcParams::param_hover_box_shadow( array( 'group' => esc_html__( 'Style', 'wpus-core' ), 'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-link' ) ) ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'typography',
            'options'    => array( 'text-align' => false, 'line-height' => false ),
            'group'      => esc_html__( 'Typography', 'wpus-core' ),
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