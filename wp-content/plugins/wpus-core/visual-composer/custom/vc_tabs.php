<?php
/**
 * Visual Composer: Tabs
 * 
 * @author  WP Uber Studio
 * @package Adamas
 * @since   1.0.0
 * @version 1.0.0
 */

vc_map_update( 'vc_tabs', array(

    'category'   => esc_html__( 'Content', 'wpus-core' ),
    'deprecated' => false,
    'params'     => array(

        // General
        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Standart', 'wpus-core' )  => 'style-standart',
                esc_html__( 'Minimal', 'wpus-core' )   => 'style-minimal',
                esc_html__( 'With Icon', 'wpus-core' ) => 'style-with-icon',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'align',
            'heading'     => esc_html__( 'Tabs Align', 'wpus-core' ),
            'description' => esc_html__( 'Select tabs alignment.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Default', 'wpus-core' ) => '' ,
                esc_html__( 'Left', 'wpus-core' )    => 'tabs-left',
                esc_html__( 'Right', 'wpus-core' )   => 'tabs-right',
                esc_html__( 'Center', 'wpus-core' )  => 'tabs-center',
            ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'tabs_margin_bottom',
            'heading'     => esc_html__( 'Tabs Margin Bottom', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-standart' ),
        ),

        // Style tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_size',
            'heading'     => esc_html__( 'Icon Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-with-icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-with-icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_hover_color',
            'heading'     => esc_html__( 'Icon Hover Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-with-icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_active_color',
            'heading'     => esc_html__( 'Icon Active Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-with-icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_hover_color',
            'heading'     => esc_html__( 'Title Hover Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_active_color',
            'heading'     => esc_html__( 'Title Active Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'active_background_color',
            'heading'     => esc_html__( 'Background Color', 'wpus-core' ),
            'description' => esc_html__( 'Select background color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-with-icon' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'title_typography',
            'heading'    => esc_html__( 'Title Typography', 'wpus-core'),
            'options'    => array(  'text-align' => false, 'line-height' => false ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
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

vc_map_update( 'vc_tab', array(

    'deprecated' => false,
    'params'     => array(

        array(
            'type'       => 'tab_id',
            'param_name' => 'tab_id',
            'heading'    => esc_html__( 'Tab ID', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Tab title', 'wpus-core' ),
        ),

        WpusVcParams::param_icon_type(),
        WpusVcParams::param_icon_etline(),
        WpusVcParams::param_icon_fontawesome(),
        WpusVcParams::param_icon_linecons(),

    ),

) );