<?php
/**
 * Visual Composer: Pricing Table
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'                    => 'wpus_pricing_table',
    'icon'                    => 'icon-wpus-pricing-table',
    'content_element'         => true,
    'show_settings_on_create' => true,
    'is_container'            => true,
    'category'                => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'                    => esc_html__( 'Pricing Table', 'wpus-core' ),
    'description'             => esc_html__( 'Add pricing table', 'wpus-core' ),
    'params'                  => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Enter title.', 'wpus-core' ),
            'value'       => 'Basic',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'subtitle',
            'heading'     => esc_html__( 'Subtitle', 'wpus-core' ),
            'description' => esc_html__( 'Enter subtitle.', 'wpus-core' ),
            'value'       => 'Perfect for basic sites',
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'price',
            'heading'     => esc_html__( 'Price', 'wpus-core' ),
            'description' => esc_html__( 'Enter price.', 'wpus-core' ),
            'value'       => '19.99',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'currency',
            'heading'     => esc_html__( 'Currency', 'wpus-core' ),
            'description' => esc_html__( 'Enter currency.', 'wpus-core' ),
            'value'       => '$',
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'period',
            'heading'     => esc_html__( 'Period', 'wpus-core' ),
            'description' => esc_html__( 'Enter period. Ex: month, year...', 'wpus-core' ),
            'value'       => '/ month',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textarea_html',
            'param_name'  => 'content',
            'heading'     => esc_html__( 'Features List', 'wpus-core' ),
            'description' => esc_html__( 'Use the "Bulleted List" button on the editor to add the Pricing Plan values.', 'wpus-core' ),
            'value'       => '<ul><li>Free domain name</li><li>10 website</li><li>20GB web space</li><li>24/7 Technical Support</li><li><span style="color: #cccccc;">1-click installs of 200+ apps</span></li><li><span style="color: #cccccc;">Free daily backup</span></li></ul>',
        ),

        array(
            'type'        => 'vc_link',
            'param_name'  => 'button_link',
            'heading'     => esc_html__( 'Button URL (Link)', 'wpus-core' ),
            'description' => esc_html__( 'Button link.', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'button_title',
            'heading'     => esc_html__( 'Button Text', 'wpus-core' ),
            'description' => esc_html__( 'Text on the button.', 'wpus-core' ),
            'value'       => 'Order Now',
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'align',
            'heading'     => esc_html__( 'Content Align', 'wpus-core' ),
            'description' => esc_html__( 'Select content alignment.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::alignment() ),
        ),

        // Style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'subtitle_color',
            'heading'     => esc_html__( 'Subtitle Color', 'wpus-core' ),
            'description' => esc_html__( 'Select subtitle color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'price_color',
            'heading'     => esc_html__( 'Price Color', 'wpus-core' ),
            'description' => esc_html__( 'Select price color.', 'wpus-core' ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'button_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Button Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select button color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'button_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Button Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select button hover color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'button_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Button Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select button background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'button_hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Button Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select button hover background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Style', 'wpus-core' ),
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

));