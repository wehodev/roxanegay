<?php
/**
 * Visual Composer: Empty Space
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(
    'base'        => 'wpus_empty_space',
    'icon'        => 'icon-wpus-empty-space',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Empty Space', 'wpus-core' ),
    'description' => esc_html__( 'Blank space with custom height', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'height',
            'heading'     => esc_html__( 'Height', 'wpus-core' ),
            'description' => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'value'       => '40px',
            'admin_label' => true,
        ),
        
        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),
        
    ),
) );