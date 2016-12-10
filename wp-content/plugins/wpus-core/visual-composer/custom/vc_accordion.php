<?php
/**
 * Visual Composer: Accordion
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map_update( 'vc_accordion', array(

    'deprecated' => false,
    'category'   => esc_html__( 'Content', 'wpus-core' ),
    'params'     => array(

        // Settngs tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Type', 'wpus-core' ),
            'description' => esc_html__( 'Select accordion type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Accordion', 'wpus-core' ) => 'accordion',
                esc_html__( 'Toggle', 'wpus-core' )    => 'toggle',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select accordion style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
                esc_html__( 'Minimal', 'wpus-core' )    => 'style-minimal',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'tag',
            'heading'     => esc_html__( 'Title Tag', 'wpus-core' ),
            'description' => esc_html__( 'Select title tag.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::tag() ),
            'std'         => 'p',
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'icon_position',
            'heading'     => esc_html__( 'Icon Position', 'wpus-core' ),
            'description' => esc_html__( 'Select icon position.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Left', 'wpus-core' )  => 'has-left-icon',
                esc_html__( 'Right', 'wpus-core' ) => 'has-right-icon',
            ),
            'std'        => 'has-left-icon',
            'dependency' => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'space',
            'heading'     => esc_html__( 'Space Between two Items', 'wpus-core' ),
            'description' => esc_html__( 'Select space.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
        ),
        
        array(
            'type'        => 'textfield',
            'param_name'  => 'active',
            'heading'     => esc_html__( 'Active Tab', 'wpus-core' ),
            'description' => esc_html__( 'Enter tab number to be active on load or leave empty to collapse all tabs.', 'wpus-core' ),
        ),

        // Style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_color',
            'heading'     => esc_html__( 'Title: Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_hover_color',
            'heading'     => esc_html__( 'Title: Hover Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title hover color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_background_color',
            'heading'     => esc_html__( 'Title: Background Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title background color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-bg' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_border_color',
            'heading'     => esc_html__( 'Title: Border Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-outline' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon: Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_background_color',
            'heading'     => esc_html__( 'Icon: Background Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon background color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-bg' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_border_color',
            'heading'     => esc_html__( 'Icon: Border Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value' => 'style-minimal' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'title_typography',
            'heading'    => esc_html__( 'Typography', 'wpus-core'),
            'options'    => array( 'text-align' => false ),
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

vc_map_update( 'vc_accordion_tab', array(

    'deprecated' => false,
    'params'     => array(

        array(
            'type'        => 'textfield',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Section title', 'wpus-core' )
        ),

    ),

) );