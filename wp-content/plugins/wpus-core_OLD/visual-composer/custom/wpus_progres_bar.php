<?php
/**
 * Visual Composer: Progress Bar
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_progres_bar',
    'icon'        => 'icon-wpus-progres-bar',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Progress Bar', 'wpus-core' ),
    'description' => esc_html__( 'Add progress bar', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Style', 'wpus-core' ),
            'description' => esc_html__( 'Select progress bar style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Text Top', 'wpus-core' )    => 'text-top',
                esc_html__( 'Text Bottom', 'wpus-core' ) => 'text-bottom',
                esc_html__( 'Text Inside', 'wpus-core' ) => 'text-inside',
            ),
            'admin_label' => true
        ),

        array(
            'type'        => 'param_group',
            'heading'     => esc_html__( 'Values', 'wpus-core' ),
            'description' => esc_html__( 'Enter values for bar - title, value and color.', 'wpus-core' ),
            'param_name'  => 'values',
            'value'       => urlencode( json_encode( array(
                array(
                    'title' => esc_html__( 'Development', 'wpus-core' ),
                    'value' => '90',
                ),
                array(
                    'title' => esc_html__( 'Design', 'wpus-core' ),
                    'value' => '80',
                ),
                array(
                    'title' => esc_html__( 'Marketing', 'wpus-core' ),
                    'value' => '70',
                ),
            ) ) ),
            'params' => array(

                array(
                    'type'        => 'textfield',
                    'param_name'  => 'title',
                    'heading'     => esc_html__( 'Title', 'wpus-core' ),
                    'description' => esc_html__( 'Enter text used as title of bar.', 'wpus-core' ),
                    'admin_label' => true
                ),

                array(
                    'type'        => 'textfield',
                    'param_name'  => 'value',
                    'heading'     => esc_html__( 'Value', 'wpus-core' ),
                    'description' => esc_html__( 'Enter value of bar.', 'wpus-core' ),
                    'admin_label' => true
                ),

                array(
                    'type'        => 'colorpicker',
                    'param_name'  => 'title_color',
                    'heading'     => esc_html__( 'Title Color', 'wpus-core' ),
                    'description' => esc_html__( 'Select title color.', 'wpus-core' ),
                ),

                array(
                    'type'        => 'colorpicker',
                    'param_name'  => 'active_background',
                    'heading'     => esc_html__( 'Active Bar Background Color', 'wpus-core'),
                    'description' => esc_html__( 'Select active bar background color.', 'wpus-core' ),
                ),

                array(
                    'type'        => 'colorpicker',
                    'param_name'  => 'inactive_background',
                    'heading'     => esc_html__( 'Inactive Bar Background Color', 'wpus-core'),
                    'description' => esc_html__( 'Select inactive bar background color.', 'wpus-core' ),
                ),

            ),

            'callbacks' => array( 'after_add' => 'vcChartParamAfterAddCallback' )
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'space',
            'heading'     => esc_html__( 'Space', 'wpus-core' ),
            'description' => esc_html__( 'Set the space between two items.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
        ),

        array(
            'type'       => 'checkbox',
            'heading'    => esc_html__( 'Options', 'wpus-core' ),
            'param_name' => 'options',
            'value'      => array(
                esc_html__( 'Add animation', 'wpus-core' )             => 'animate_width',
                esc_html__( 'Add stripes', 'wpus-core' )               => 'stripes',
                esc_html__( 'Add animation for stripes', 'wpus-core' ) => 'animate_stripes'
            ),
            'std' => 'animate_width,stripes,animate_stripes',
        ),

        // Bar style tab
        array(
            'type'             => 'colorpicker',
            'param_name'       => 'active_background',
            'edit_field_class' => 'vc_col-sm-6 vc_column wpus-padding-top',
            'heading'          => esc_html__( 'Active Bar Background Color', 'wpus-core'),
            'description'      => esc_html__( 'Select active bar background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Bar Style', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'inactive_background',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Inactive Bar Background Color', 'wpus-core'),
            'description'      => esc_html__( 'Select inactive bar background color.', 'wpus-core' ),
            'group'            => esc_html__( 'Bar Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'bar_height',
            'heading'     => esc_html__( 'Bar Height', 'wpus-core' ),
            'description' => esc_html__( 'Enter bar height in px.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'style', 'value_not_equal_to' => array( 'wpus-style-3' ) ),
            'group'       => esc_html__( 'Bar Style', 'wpus-core' ),
        ),

        // Title style tab
        array(
            'type'        => 'colorpicker',
            'param_name'  => 'title_color',
            'heading'     => esc_html__( 'Title Color', 'wpus-core' ),
            'description' => esc_html__( 'Select title color.', 'wpus-core' ),
            'group'       => esc_html__( 'Title Style', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'title_typography',
            'options'    => array( 'text-align' => false ),
            'group'      => esc_html__( 'Title Style', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );