<?php
/**
 * Visual Composer: Video
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_video',
    'icon'        => 'icon-wpus-video',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Video Player', 'wpus-core' ),
    'description' => esc_html__( 'Embed YouTube/Vimeo player', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'param_name'  => 'link',
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Video Link', 'wpus-core' ),
            'description' => sprintf( __( 'Enter link to video (Note: read more about available formats at WordPress <a href="%s" target="_blank">codex page</a>)', 'wpus-core' ), 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' ),
            'value'       => 'http://vimeo.com/42411918',
            'admin_label' => true,
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