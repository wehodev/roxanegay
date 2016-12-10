<?php
/**
 * Visual Composer: Message Box
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_message',
    'icon'        => 'icon-wpus-message',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Message Box', 'wpus-core' ),
    'description' => esc_html__( 'Add message box', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Type', 'wpus-core' ),
            'description' => esc_html__( 'Select message box type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Success', 'wpus-core' ) => 'success',
                esc_html__( 'Info', 'wpus-core' )    => 'info',
                esc_html__( 'Notice', 'wpus-core' )  => 'notice',
                esc_html__( 'Warning', 'wpus-core' ) => 'warning',
                esc_html__( 'Error', 'wpus-core' )   => 'error',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'textarea',
            'param_name'  => 'content',
            'heading'     => esc_html__( 'Message', 'wpus-core' ),
            'description' => esc_html__( 'Enter your message.', 'wpus-core' ),
            'value'       => esc_html__( 'I am message box text.', 'wpus-core' ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'close',
            'heading'     => esc_html__( 'Close Button', 'wpus-core' ),
            'description' => esc_html__( 'Show close button.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'std'         => 'true',
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