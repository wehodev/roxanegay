<?php
/**
 * Visual Composer: List
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_list',
    'icon'        => 'icon-wpus-list',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'List Icon', 'wpus-core' ),
    'description' => esc_html__( 'Add list icon', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textarea_html',
            'param_name'  => 'content',
            'heading'     => esc_html__( 'List Items', 'wpus-core' ),
            'description' => esc_html__( 'Use the "Bulleted List" button on the editor.', 'wpus-core' ),
            'value'       => '<ul><li>List Item One</li><li>List Item Two</li><li>List Item Three</li><li>List Item Four</li><li>List Item Five</li></ul>',
        ),

        WpusVcParams::param_icon_type(),
        WpusVcParams::param_icon_etline(),
        WpusVcParams::param_icon_linecons(),
        WpusVcParams::param_icon_fontawesome(),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'icon_type', 'not_empty' => true  ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_size',
            'heading'     => esc_html__( 'Icon Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

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