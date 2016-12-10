<?php
/**
 * Visual Composer: Gallery
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_gallery',
    'icon'        => 'icon-wpus-gallery',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Gallery', 'wpus-core' ),
    'description' => esc_html__( 'Responsive image gallery', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Type', 'wpus-core' ),
            'description' => esc_html__( 'Select type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Grid', 'wpus-core' )    => 'wpus-grid',
                esc_html__( 'Masonry', 'wpus-core' ) => 'wpus-masonry',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'masonry_style',
            'heading'     => esc_html__( 'Masonry Style', 'wpus-core' ),
            'description' => esc_html__( 'Select style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::masonry_style() ),
            'dependency'  => array( 'element' => 'type', 'value' => 'wpus-masonry' ),
        ),

        array(
            'type'        => 'attach_images',
            'param_name'  => 'images_ids',
            'heading'     => esc_html__( 'Images', 'wpus-core' ),
            'description' => esc_html__( 'Select image from media library.', 'wpus-core' ),
        ),

        array(
            'type'        => 'attach_images',
            'param_name'  => 'images_ids2',
            'heading'     => esc_html__( 'Images on Mouse Hover', 'wpus-core' ),
            'description' => esc_html__( 'Select image from media library.', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_size',
            'heading'     => esc_html__( 'Image Size', 'wpus-core' ),
            'description' => esc_html__( 'Select image size based on WordPress settings.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_size() ),
            'std'         => 'adamas-image-square',
            'dependency'  => array( 'element' => 'type', 'value' => 'wpus-grid' ),
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
            'param_name'  => 'lighbox',
            'heading'     => esc_html__( 'Lighbox', 'wpus-core' ),
            'description' => esc_html__( 'Open photo in lighbox.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
        ),
        
        // Settngs tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'columns_lg',
            'heading'     => esc_html__( 'Maximum Columns', 'wpus-core' ),
            'description' => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::columns() ),
            'std'         => '4',
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_md',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Notebook', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '3',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '2',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '1',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'items_space',
            'heading'     => esc_html__( 'Items Space', 'wpus-core' ),
            'description' => esc_html__( 'Select space between columns.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );