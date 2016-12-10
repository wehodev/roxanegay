<?php
/**
 * Visual Composer: Icon Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0.1
 */

class WPBakeryShortCode_wpus_icon_box extends WPBakeryShortCodesContainer {}

vc_map( array(

    'base'                    => 'wpus_icon_box',
    'icon'                    => 'icon-wpus-icon-box',
    'content_element'         => true,
    'js_view'                 => 'VcColumnView',
    'show_settings_on_create' => true,
    'as_parent'               => array( 'only' => 'wpus_button, wpus_divider, wpus_heading, vc_column_text, wpus_empty_space, wpus_counter' ),
    'category'                => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'                    => esc_html__( 'Icon Box', 'wpus-core' ),
    'description'             => esc_html__( 'Add icon box', 'wpus-core' ),
    'params'                  => array(

        // General tab
        WpusVcParams::param_icon_type(),
        WpusVcParams::param_icon_etline(),
        WpusVcParams::param_icon_fontawesome(),
        WpusVcParams::param_icon_linecons(),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select icon style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
                esc_html__( 'Minimal', 'wpus-core' )    => 'style-minimal',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'position',
            'heading'     => esc_html__( 'Position', 'wpus-core' ),
            'description' => esc_html__( 'Select icon position.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Center', 'wpus-core' )      => 'wpus-icon-center',
                esc_html__( 'Center Top', 'wpus-core' )  => 'wpus-icon-center-top',
                esc_html__( 'Left', 'wpus-core' )        => 'wpus-icon-left',
                esc_html__( 'Float left', 'wpus-core' )  => 'wpus-icon-float-left',
                esc_html__( 'Right', 'wpus-core' )       => 'wpus-icon-right',
                esc_html__( 'Float Right', 'wpus-core' ) => 'wpus-icon-float-right',
            ),
            'std'   => 'wpus-icon-float-left',
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_size',
            'heading'     => esc_html__( 'Size', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_padding',
            'heading'     => esc_html__( 'Padding', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_margin_bottom',
            'heading'     => esc_html__( 'Margin Bottom', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'position', 'value' => array( 'wpus-icon-center', 'wpus-icon-left', 'wpus-icon-right' ) ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_margin_right',
            'heading'     => esc_html__( 'Margin Right', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'position', 'value' => 'wpus-icon-float-left' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'icon_margin_left',
            'heading'     => esc_html__( 'Margin Left', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em values.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'position', 'value' => 'wpus-icon-float-right' ),
        ),

        // Link tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'link_type',
            'heading'     => esc_html__( 'Link Type', 'wpus-core' ),
            'description' => esc_html__( 'Select link type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'None', 'wpus-core' )                     => '',
                esc_html__( 'Link', 'wpus-core' )                     => 'link',
                esc_html__( 'Open Image in Lighbox', 'wpus-core' )    => 'image',
                esc_html__( 'Open Youtube in Lightbox', 'wpus-core' ) => 'youtube',
                esc_html__( 'Open Vimeo in Lightbox', 'wpus-core' )   => 'vimeo',
            ),
            'group' => esc_html__( 'Link', 'wpus-core' ),
        ),

        array(
            'type'        => 'vc_link',
            'param_name'  => 'link',
            'heading'     => esc_html__( 'URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Enable a URL link for the current element.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'link' ) ),
            'group'       => esc_html__( 'Link', 'wpus-core' ),
        ),

        array(
            'type'        => 'attach_image',
            'param_name'  => 'image_id',
            'heading'     => esc_html__( 'Choose image', 'wpus-core' ),
            'description' => esc_html__( 'Select images from media library.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'image' ) ),
            'group'       => esc_html__( 'Link', 'wpus-core' ),
        ),

        array(
            'param_name'  => 'youtube_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Youtube URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter youtube URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'youtube' ) ),
            'group'       => esc_html__( 'Link', 'wpus-core' ),
        ),

        array(
            'param_name'  => 'vimeo_url',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Vimeo URL', 'wpus-core' ),
            'description' => esc_html__( 'Enter vimeo URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'link_type', 'value' => array( 'vimeo' ) ),
            'group'       => esc_html__( 'Link', 'wpus-core' ),
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
            'dependency'       => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ),
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
            'description'      => esc_html__( 'Select border hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'border_radius',
            'heading'     => esc_html__( 'Border Radius', 'wpus-core' ),
            'description' => esc_html__( 'Select border radius.', 'wpus-core' ),
            'value'      => array_flip( AdamasShared::border_radius() ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => array( 'style-minimal' ) ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        WpusVcParams::param_box_shadow( array( 'group' => esc_html__( 'Style', 'wpus-core' ), 'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ) ) ),
        WpusVcParams::param_hover_box_shadow( array( 'group' => esc_html__( 'Style', 'wpus-core' ), 'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => 'style-minimal' ) ) ),


        // Design tab
        WpusVcParams::param_css(),

        // Animation tab
        WpusVcParams::param_animation_type(),
        WpusVcParams::param_animation_delay(),
        WpusVcParams::param_animation_duration(),

        WpusVcParams::param_animation_type( array(
            'param_name' => 'icon_animation_type',
            'heading'    => esc_html__( 'Icon Animation', 'wpus-core' ),
        ) ),

        WpusVcParams::param_animation_delay( array(
            'param_name' => 'icon_animation_delay',
            'heading'    => esc_html__( 'Icon Animation Delay', 'wpus-core' ),
            'dependency' => array( 'element' => 'icon_animation_type', 'not_empty' => true ),
        ) ),

        WpusVcParams::param_animation_duration(array(
            'param_name' => 'icon_animation_duration',
            'heading'    => esc_html__( 'Icon Animation Duration', 'wpus-core' ),
            'dependency' => array( 'element' => 'icon_animation_type', 'not_empty' => true ),
        ) ),
        
        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),
                                                                                                  
    ),

) );