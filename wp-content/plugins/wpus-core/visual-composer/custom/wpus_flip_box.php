<?php
/**
 * Visual Composer: Flip Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_flip_box',
    'icon'        => 'icon-wpus-flip-box',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Flip Box', 'wpus-core' ),
    'description' => esc_html__( 'Add flip box', 'wpus-core' ),
    'params'      => array(

        // Front tab
        WpusVcParams::param_icon_type( array( 'group' => esc_html__( 'Front Content', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_etline( array( 'group' => esc_html__( 'Front Content', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_fontawesome( array( 'group' => esc_html__( 'Front Content', 'wpus-core' ) ) ),
        WpusVcParams::param_icon_linecons( array( 'group' => esc_html__( 'Front Content', 'wpus-core' ) ) ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'front_icon_size',
            'heading'     => esc_html__( 'Icon Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'icon_type', 'not_empty' => true  ),
            'group'       => esc_html__( 'Front Content', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'front_title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Enter flip box front title.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Content', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'front_subtitle',
            'heading'     => esc_html__( 'Subtitle', 'wpus-core' ),
            'description' => esc_html__( 'Enter flip box front subtitle.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Content', 'wpus-core' ),
        ),

        // Back tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'back_title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Enter flip box back title.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Content', 'wpus-core' ),
        ),

        array(
            'type'        => 'textarea',
            'param_name'  => 'back_content',
            'heading'     => esc_html__( 'Content', 'wpus-core' ),
            'description' => esc_html__( 'Enter flip box back content.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Content', 'wpus-core' ),
        ),

        array(
            'type'        => 'vc_link',
            'param_name'  => 'back_link',
            'heading'     => esc_html__( 'Button URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Enable a URL link for the current element.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Content', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'back_button_text',
            'heading'     => esc_html__( 'Button Text', 'wpus-core' ),
            'value'       => esc_html__( 'Button', 'wpus-core' ),
            'description' => esc_html__( 'Text on the button.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Content', 'wpus-core' ),
        ),

        // Front style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'front_icon_color',
            'heading'     => esc_html__( 'Icon Color', 'wpus-core' ),
            'description' => esc_html__( 'Select icon color.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'front_title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core'),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'front_subtitle_color',
            'heading'     => esc_html__( 'Subtitle Color', 'wpus-core'),
            'description' => esc_html__( 'Select subtitle color.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'front_background_color',
            'heading'     => esc_html__( 'Background Color', 'wpus-core'),
            'description' => esc_html__( 'Select background color.', 'wpus-core' ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'front_border_style',
            'heading'     => esc_html__( 'Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select content border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'front_border_width',
            'heading'     => esc_html__( 'Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'front_border_style', 'value_not_equal_to' => 'none' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'front_border_color',
            'heading'     => esc_html__( 'Border Color', 'wpus-core' ),
            'description' => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'front_border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'front_title_typography',
            'heading'    => esc_html__( 'Title Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'front_subtitle_typography',
            'heading'    => esc_html__( 'Subtitle Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Front Style', 'wpus-core' ),
        ),

        // Back style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core'),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_content_color',
            'heading'     => esc_html__( 'Content Color', 'wpus-core'),
            'description' => esc_html__( 'Select content color.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_button_color',
            'heading'     => esc_html__( 'Button Color', 'wpus-core'),
            'description' => esc_html__( 'Select Button color.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_button_background_color',
            'heading'     => esc_html__( 'Button Background Color', 'wpus-core'),
            'description' => esc_html__( 'Select button background color.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_background_color',
            'heading'     => esc_html__( 'Background Color', 'wpus-core'),
            'description' => esc_html__( 'Select background color.', 'wpus-core' ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'back_border_style',
            'heading'     => esc_html__( 'Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select content border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'back_border_width',
            'heading'     => esc_html__( 'Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'back_border_style', 'value_not_equal_to' => 'none' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'back_border_color',
            'heading'     => esc_html__( 'Border Color', 'wpus-core' ),
            'description' => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'back_border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'back_title_typography',
            'heading'    => esc_html__( 'Title Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'back_content_typography',
            'heading'    => esc_html__( 'Content Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'back_button_typography',
            'heading'    => esc_html__( 'Button Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false, 'line-height' => false ),
            'group'      => esc_html__( 'Back Style', 'wpus-core' ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );