<?php
/**
 * Visual Composer: Image Carousel
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_image_carousel',
    'icon'        => 'icon-wpus-image-carousel',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Image Carousel', 'wpus-core' ),
    'description' => esc_html__( 'Add image carousel', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'attach_images',
            'param_name'  => 'images_ids',
            'heading'     => esc_html__( 'Images', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library.', 'wpus-core' ),
        ),

        array(
            'type'        => 'attach_images',
            'param_name'  => 'images_ids2',
            'heading'     => esc_html__( 'Images on Mouse Hover', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_size',
            'heading'     => esc_html__( 'Image Size', 'wpus-core' ),
            'description' => esc_html__( 'Select image size.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_size() ),
            'std'         => 'adamas-image-horizontal',
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
            'param_name'  => 'lighbox',
            'heading'     => esc_html__( 'Lighbox', 'wpus-core' ),
            'description' => esc_html__( 'Open photo in lighbox.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
        ),

        // Settings tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'columns_lg',
            'heading'     => esc_html__( 'Maximum Columns', 'wpus-core' ),
            'description' => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::columns() ),
            'std'         => '4',
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_md',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Notebook', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '3',
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '2',
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '1',
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'items_space',
            'heading'     => esc_html__( 'Items Space', 'wpus-core' ),
            'description' => esc_html__( 'Select space between columns.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'autoplay',
            'heading'     => esc_html__( 'Autoplay', 'wpus-core' ),
            'description' => esc_html__( 'Auto rotate slides each X seconds.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::autoplay() ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'inifnity_loop',
            'heading'     => esc_html__( 'Inifnity Loop', 'wpus-core' ),
            'description' => esc_html__( 'Duplicate last and first items to get loop illusion.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows',
            'heading'     => esc_html__( 'Arrows', 'wpus-core' ),
            'description' => esc_html__( 'Show prew/next arrows.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'std'         => 'true',
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'arrows_space',
            'heading'     => esc_html__( 'Space between Arrows and Content', 'wpus-core' ),
            'description' => esc_html__( 'You can use px value. Default: 15px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'arrows_appearance',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Arrows: Appearance', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows appearance.', 'wpus-core' ),
            'value'            => array(
                esc_html__( 'Always show', 'wpus-core' )   => '',
                esc_html__( 'Show on Hover', 'wpus-core' ) => 'arrows-hover-show',
            ),
            'dependency' => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'      => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'arrows_style',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Arrows: Style', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows style.', 'wpus-core' ),
            'value'            => array(
                esc_html__( 'Outline', 'wpus-core' )    => 'arrows-outline',
                esc_html__( 'Background', 'wpus-core' ) => 'arrows-bg',
            ),
            'dependency'  => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'arrows_border_radius',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Arrows: Border Radius', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows border radius.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::border_radius() ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows_border_style',
            'heading'     => esc_html__( 'Arrows: Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'dependency'  => array( 'element' => 'arrows_style', 'value' => 'arrows-outline' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows_border_width',
            'heading'     => esc_html__( 'Arrows: Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'checkbox',
            'param_name'       => 'arrows_hidden',
            'edit_field_class' => 'vc_col-sm-12 vc_column wpus-vc-inline-checkbox',
            'heading'          => esc_html__( 'Hide Arrows on:', 'wpus-core' ),
            'description'      => esc_html__( 'Control arrows visibility.', 'wpus-core' ),
            'value'            => array(
                esc_html__( 'Desktop', 'wpus-core' )  => 'arrows-hidden-lg',
                esc_html__( 'Notebook', 'wpus-core' ) => 'arrows-hidden-md',
                esc_html__( 'Tablet', 'wpus-core' )   => 'arrows-hidden-sm',
                esc_html__( 'Mobile', 'wpus-core' )   => 'arrows-hidden-xs',
            ),
            'dependency'  => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'dots',
            'heading'     => esc_html__( 'Dots', 'wpus-core' ),
            'description' => esc_html__( 'Show dots pagiation.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'dots_position',
            'heading'     => esc_html__( 'Dots Position', 'wpus-core' ),
            'description' => esc_html__( 'Select dots position.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Outside', 'wpus-core' ) => '',
                esc_html__( 'Inside', 'wpus-core' )  => 'dots-inside',
            ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'dots_space',
            'heading'     => esc_html__( 'Space between Dots and Content', 'wpus-core' ),
            'description' => esc_html__( 'You can use px value. Default: 30px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'dots_appearance',
            'heading'     => esc_html__( 'Dots: Appearance', 'wpus-core' ),
            'description' => esc_html__( 'Select dost appearance.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Always show', 'wpus-core' )   => '',
                esc_html__( 'Show on Hover', 'wpus-core' ) => 'dots-hover-show',
            ),
            'dependency' => array( 'element' => 'dots_position', 'value' => 'dots-inside' ),
            'group'      => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'dots_color',
            'heading'     => esc_html__( 'Dots: Color', 'wpus-core' ),
            'description' => esc_html__( 'Select dots color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
        ),

        array(
            'type'             => 'checkbox',
            'param_name'       => 'dots_hidden',
            'edit_field_class' => 'vc_col-sm-12 vc_column wpus-vc-inline-checkbox',
            'heading'          => esc_html__( 'Hide Dots on:', 'wpus-core' ),
            'description'      => esc_html__( 'Control dots visibility.', 'wpus-core' ),
            'value'            => array(
                esc_html__( 'Desktop', 'wpus-core' )  => 'dots-hidden-lg',
                esc_html__( 'Notebook', 'wpus-core' ) => 'dots-hidden-md',
                esc_html__( 'Tablet', 'wpus-core' )   => 'dots-hidden-sm',
                esc_html__( 'Mobile', 'wpus-core' )   => 'dots-hidden-xs',
            ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settings', 'wpus-core' ),
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