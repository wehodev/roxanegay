<?php
/**
 * Visual Composer: Column
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

global $vc_column_width_list;

$vc_column_width_list = array(
    __( '1 column - 1/12', 'wpus-core' )    => '1/12',
    __( '2 columns - 1/6', 'wpus-core' )    => '1/6',
    __( '3 columns - 1/4', 'wpus-core' )    => '1/4',
    __( '4 columns - 1/3', 'wpus-core' )    => '1/3',
    __( '5 columns - 5/12', 'wpus-core' )   => '5/12',
    __( '6 columns - 1/2', 'wpus-core' )    => '1/2',
    __( '7 columns - 7/12', 'wpus-core' )   => '7/12',
    __( '8 columns - 2/3', 'wpus-core' )    => '2/3',
    __( '9 columns - 3/4', 'wpus-core' )    => '3/4',
    __( '10 columns - 5/6', 'wpus-core' )   => '5/6',
    __( '11 columns - 11/12', 'wpus-core' ) => '11/12',
    __( '12 columns - 1/1', 'wpus-core' )   => '1/1',
);

vc_map_update( 'vc_column', array(

    'params' => array(

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),

        // Design tab
        WpusVcParams::param_css(),

        // Responsive tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'width',
            'heading'     => __( 'Width', 'wpus-core' ),
            'description' => __( 'Select column width', 'wpus-core' ),
            'value'       => $vc_column_width_list,
            'std'         => '1/1',
            'group'       => __( 'Responsive', 'wpus-core' ),
        ),

        array(
            'type'        => 'column_offset',
            'param_name'  => 'offset',
            'heading'     => __( 'Responsiveness', 'wpus-core' ),
            'description' => __( 'Adjust column for different screen sizes. Control width, offset and visibility settings', 'wpus-core' ),
            'group'       => __( 'Responsive', 'wpus-core' ),
        ),

        // Animation tab
        WpusVcParams::param_animation_type(),
        WpusVcParams::param_animation_delay(),
        WpusVcParams::param_animation_duration(),

    ),

) );