<?php
/**
 * Visual Composer: Adamas Slider
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_slider',
    'icon'        => 'icon-wpus-slider',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Adamas Slider', 'wpus-core' ),
    'description' => esc_html__( 'Add adamas slider', 'wpus-core' ),
    'params'      => array(

        array(
            'type'        => 'dropdown',
            'param_name'  => 'id',
            'heading'     => esc_html__( 'Slider', 'wpus-core' ),
            'description' => esc_html__( 'Select slider.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::sliders() ),
            'admin_label' => true,
        ),


    ),

) );