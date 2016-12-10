<?php
/**
 * Visual Composer: Code Snippet
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_code_snippet',
    'icon'        => 'icon-wpus-code-snippet',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Code Snippet', 'wpus-core' ),
    'description' => esc_html__( 'Add code snippet', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Language', 'wpus-core' ),
            'description' => esc_html__( 'Select code snippet language.', 'wpus-core' ),
            'param_name'  => 'language',
            'value'       => array(
                'HTML'       => 'markup',
                'CSS'        => 'css',
                'PHP'        => 'php',
                'JavaScript' => 'javascript',
            ),
            'std'         => 'markup',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textarea_raw_html',
            'param_name'  => 'content',
            'heading'     => esc_html__( 'Code Snippet', 'wpus-core' ),
            'description' => esc_html__( 'Enter your code snippet.', 'wpus-core' ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

) );