<?php
/**
 * Visual Composer: Instagram
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_instagram',
    'icon'        => 'icon-wpus-instagram',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Instagram', 'wpus-core' ),
    'description' => esc_html__( 'Add instagram', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Type', 'wpus-core' ),
            'description' => esc_html__( 'Select instagram type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Carousel', 'wpus-core' ) => 'wpus-carousel',
                esc_html__( 'Grid', 'wpus-core' )     => 'wpus-grid',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'username',
            'heading'     => esc_html__( 'Username', 'wpus-core' ),
            'description' => esc_html__( 'Enter instagram username.', 'wpus-core' ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'number',
            'heading'     => esc_html__( 'Number', 'wpus-core' ),
            'description' => esc_html__( 'Number of photos to show.', 'wpus-core' ),
            'std'         => '10',
            'admin_label' => true,
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
            'std'         => '5',
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_md',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Notebook', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '4',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '3',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '2',
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

        array(
            'type'        => 'dropdown',
            'param_name'  => 'autoplay',
            'heading'     => esc_html__( 'Autoplay', 'wpus-core' ),
            'description' => esc_html__( 'Auto rotate slides each X seconds.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::autoplay() ),
            'dependency'  => array( 'element' => 'type', 'value_' => 'wpus-carousel' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'inifnity_loop',
            'heading'     => esc_html__( 'Inifnity Loop', 'wpus-core' ),
            'description' => esc_html__( 'Duplicate last and first items to get loop illusion.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'dependency'  => array( 'element' => 'type', 'value' => 'wpus-carousel' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows',
            'heading'     => esc_html__( 'Arrows', 'wpus-core' ),
            'description' => esc_html__( 'Show prew/next arrows.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'std'         => 'true',
            'dependency'  => array( 'element' => 'type', 'value' => 'wpus-carousel' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'arrows_space',
            'heading'     => esc_html__( 'Space between Arrows and Content', 'wpus-core' ),
            'description' => esc_html__( 'You can use px value. Default: 15px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'      => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'arrows_border_radius',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Arrows: Border Radius', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows border radius.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::border_radius() ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'arrows', 'value' => 'true' ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows_border_style',
            'heading'     => esc_html__( 'Arrows: Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'dependency'  => array( 'element' => 'arrows_style', 'value' => 'arrows-outline' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows_border_width',
            'heading'     => esc_html__( 'Arrows: Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select arrows border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'arrows_hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Arrows: Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select arrows hover border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'arrows_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),
        
        array(
            'type'        => 'dropdown',
            'param_name'  => 'dots',
            'heading'     => esc_html__( 'Dots', 'wpus-core' ),
            'description' => esc_html__( 'Show dots pagiation.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'dependency'  => array( 'element' => 'type', 'value' => 'wpus-carousel' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'dots_space',
            'heading'     => esc_html__( 'Space between Dots and Content', 'wpus-core' ),
            'description' => esc_html__( 'You can use px value. Default: 30px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'      => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'dots_color',
            'heading'     => esc_html__( 'Dots: Color', 'wpus-core' ),
            'description' => esc_html__( 'Select dots color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'dots', 'value' => 'true' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
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
            'std'         => 'wpus-hover-show',
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
            'std'         => 'wpus-hover-show',
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