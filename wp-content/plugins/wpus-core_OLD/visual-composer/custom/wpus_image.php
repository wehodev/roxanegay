<?php
/**
 * Visual Composer: Image
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_image',
    'icon'        => 'icon-wpus-image',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Single Image', 'wpus-core' ),
    'description' => esc_html__( 'Add single image', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'attach_image',
            'param_name'  => 'image_id',
            'edit_field_class' => 'vc_col-sm-6 vc_column wpus-padding-top',
            'heading'     => esc_html__( 'Choose Image', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library.', 'wpus-core' ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'attach_image',
            'param_name'  => 'image_id2',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'     => esc_html__( 'Choose Image on Mouse Hover', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library.', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_size',
            'heading'     => esc_html__( 'Image Size', 'wpus-core' ),
            'description' => esc_html__( 'Select image size.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_size() ),
            'std'         => 'thumbnail',
            'admin_label' => true,
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'image_width',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Image Width', 'wpus-core' ),
            'description'      => esc_html__( 'Enter image width without px.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'image_size', 'value' => 'custom' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'image_height',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Image Height', 'wpus-core' ),
            'description'      => esc_html__( 'Enter image height without px.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'image_size', 'value' => 'custom' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'action',
            'heading'     => esc_html__( 'On Click Action', 'wpus-core' ),
            'description' => esc_html__( 'Define action for onclick event.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'None', 'wpus-core' )                     => '',
                esc_html__( 'Open in Lighbox', 'wpus-core' )          => 'lightbox',
                esc_html__( 'Open Youtube in Lightbox', 'wpus-core' ) => 'youtube',
                esc_html__( 'Open Vimeo in Lightbox', 'wpus-core' )   => 'vimeo',
                esc_html__( 'Open Custom URL', 'wpus-core' )          => 'url',
            ),
        ),

        array(
            'param_name'  => 'youtube_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Youtube URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter youtube URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'action', 'value' => array( 'youtube' ) ),
        ),

        array(
            'param_name'  => 'vimeo_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Vimeo URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter vimeo URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'action', 'value' => array( 'vimeo' ) ),
        ),
        
        array(
            'type'        => 'vc_link',
            'param_name'  => 'link',
            'heading'     => esc_html__( 'URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Enable a URL link for the current element.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'action', 'value' => array( 'url' ) ),
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

        // Caption tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'caption',
            'heading'     => esc_html__( 'Caption', 'wpus-core' ),
            'description' => esc_html__( 'Show caption.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'No', 'wpus-core' )                  => '',
                esc_html__( 'Caption Overlay', 'wpus-core' )     => 'title-overlay',
                esc_html__( 'Caption Under Image', 'wpus-core' ) => 'title-under',
            ),
            'group' => esc_html__( 'Caption', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'caption_appearance',
            'heading'     => esc_html__( 'Caption Appearance', 'wpus-core' ),
            'description' => esc_html__( 'Select caption appearance.', 'wpus-core' ),
            'value'       =>  array_filter( array_flip( AdamasShared::appearance() ) ),
            'std'         => 'wpus-hover-show',
            'dependency'  => array( 'element' => 'caption', 'value' => 'title-overlay' ),
            'group'       => esc_html__( 'Caption', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'caption_position',
            'heading'     => esc_html__( 'Caption Position', 'wpus-core' ),
            'description' => esc_html__( 'Select caption position.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::position() ),
            'std'         => 'wpus-position-cc',
            'dependency'  => array( 'element' => 'caption', 'value' => 'title-overlay' ),
            'group'       => esc_html__( 'Caption', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'caption_align',
            'heading'     => esc_html__( 'Caption Align', 'wpus-core' ),
            'description' => esc_html__( 'Select caption alignment.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::alignment() ),
            'dependency'  => array( 'element' => 'caption', 'value' => 'title-under' ),
            'group'       => esc_html__( 'Caption', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'caption_color',
            'heading'     => esc_html__( 'Caption Color', 'wpus-core' ),
            'description' => esc_html__( 'Select caption color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'caption', 'not_empty' => true ),
            'group'       => esc_html__( 'Caption', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'caption_typography',
            'heading'    => esc_html__( 'Caption Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'dependency' => array( 'element' => 'caption', 'not_empty' => true ),
            'group'      => esc_html__( 'Caption', 'wpus-core' ),
        ),

        // Advanced tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_hover',
            'heading'     => __( 'Image on Mouse Hover', 'wpus-core' ),
            'description' => __( 'Select style to image on mouse hover.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_hovers() ),
            'group'       => __( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'icon_appearance',
            'heading'     => __( 'Icon Appearance', 'wpus-core' ),
            'description' => __( 'Select icon appearance.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::appearance() ),
            'std'         => 'wpus-always-show',
            'dependency'  => array( 'element' => 'action', 'value' => array( 'youtube', 'vimeo' ) ),
            'group'       => __( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'icon_appearance', 'not_empty' => true ),
            'group'       => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'overlay_appearance',
            'heading'     => esc_html__( 'Overlay Appearance', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay appearance.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::appearance() ),
            'group'       => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'overlay_type',
            'heading'     => esc_html__( 'Overlay Type', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'background',
                esc_html__( 'Gradient', 'wpus-core' )   => 'gradient',
            ),
            'std'        => 'background',
            'dependency' => array( 'element' => 'overlay_appearance', 'not_empty' => true ),
            'group'      => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'overlay_color',
            'heading'     => esc_html__( 'Overlay Color', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'overlay_type', 'value' => 'background' ),
            'group'       => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'overlay_top_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Overlay Top Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select overlay top color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'overlay_type', 'value' => 'gradient' ),
            'group'            => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'overlay_bottom_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Overlay Bottom Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select overlay bottom color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'overlay_type', 'value' => 'gradient' ),
            'group'            => esc_html__( 'Advanced', 'wpus-core' ),
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