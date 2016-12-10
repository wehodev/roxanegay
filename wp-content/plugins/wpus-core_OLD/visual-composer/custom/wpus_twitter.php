<?php
/**
 * Visual Composer: Twitter
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_twitter',
    'icon'        => 'icon-wpus-twitter',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Twitter', 'wpus-core' ),
    'description' => esc_html__( 'Add twitter', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'username',
            'heading'     => esc_html__( 'Username', 'wpus-core' ),
            'description' => esc_html__( 'Enter twitter username.', 'wpus-core' ),
            'value'       => 'envato',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'number',
            'heading'     => esc_html__( 'Number', 'wpus-core' ),
            'description' => esc_html__( 'Number of tweets to show.', 'wpus-core' ),
            'std'         => '8',
            'admin_label' => true,
        ),

        // Settngs tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'max_width',
            'heading'     => esc_html__( 'Content Maximum Width', 'wpus-core' ),
            'description' => esc_html__( 'You can use px, em or % values. Default: 80%', 'wpus-core' ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align', 'wpus-core' ),
            'description'      => esc_html__( 'Select content alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment() ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select content alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'sm' ) ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'align_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Align on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select content alignment.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::alignment( 'xs' ) ),
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'autoplay',
            'heading'     => esc_html__( 'Autoplay', 'wpus-core' ),
            'description' => esc_html__( 'Auto rotate slides each X seconds.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::autoplay() ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'inifnity_loop',
            'heading'     => esc_html__( 'Inifnity Loop', 'wpus-core' ),
            'description' => esc_html__( 'Duplicate last and first items to get loop illusion.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'arrows',
            'heading'     => esc_html__( 'Arrows', 'wpus-core' ),
            'description' => esc_html__( 'Show prew/next arrows.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'std'         => 'true',
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'arrows_space',
            'heading'     => esc_html__( 'Space between Arrows and Content', 'wpus-core' ),
            'description' => esc_html__( 'You can use px value. Default: 0px.', 'wpus-core' ),
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

        // Style tab
        array(
            'type'             => 'colorpicker',
            'param_name'       => 'link_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column wpus-padding-top',
            'heading'          => esc_html__( 'Link Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select link color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'link_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Link Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select link hover color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'text_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Text Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select text color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'date_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Date Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select date color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'text_typography',
            'heading'    => esc_html__( 'Text Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'date_typography',
            'heading'    => esc_html__( 'Date Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );