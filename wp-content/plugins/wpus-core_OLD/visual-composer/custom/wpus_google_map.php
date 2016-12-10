<?php
/**
 * Visual Composer: Google Map
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_google_map',
    'icon'        => 'icon-wpus-google-map',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Google Map', 'wpus-core' ),
    'description' => esc_html__( 'Add google map', 'wpus-core' ),
    'params'      => array(

        // General tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'latitude',
            'heading'     => esc_html__( 'Latitude', 'wpus-core' ),
            'description' => sprintf( __( '<a href="%s" target="_blank">Here is a tool</a> Where you can find Latitude & Longitude of your location.', 'wpus-core' ), 'http://universimmedia.pagesperso-orange.fr/geo/loc.htm' ),
            'value'       => '51.51526',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'longitude',
            'heading'     => esc_html__( 'Longitude', 'wpus-core' ),
            'description' => sprintf( __( '<a href="%s" target="_blank">Here is a tool</a> Where you can find Latitude & Longitude of your location.', 'wpus-core' ), 'http://universimmedia.pagesperso-orange.fr/geo/loc.htm' ),
            'value'       => '-0.13218',
            'admin_label' => true,
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'height',
            'heading'     => esc_html__( 'Map Height', 'wpus-core' ),
            'description' => esc_html__( 'Google map height.', 'wpus-core' ),
            'value'       => '500',
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'zoom',
            'heading'     => esc_html__( 'Zoom Level', 'wpus-core' ),
            'description' => esc_html__( 'Value between 1-20.', 'wpus-core' ),
            'value'       => '17',
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'map_scrollwheel',
            'heading'     => esc_html__( 'Scrollwheel Zoom', 'wpus-core' ),
            'description' => esc_html__( 'Allow scroll wheel zooming.', 'wpus-core' ),
            'value'       => array(
                'Disable' => 'false',
                'Enable'  => 'true',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'map_controls',
            'heading'     => esc_html__( 'Control Elements', 'wpus-core' ),
            'description' => esc_html__( 'Show / Hide map controls.', 'wpus-core' ),
            'value'       => array(
                'Disabled' => 'true',
                'Enabled'  => 'false',
            ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'map_zoom',
            'heading'     => esc_html__( 'Zoom Button', 'wpus-core' ),
            'description' => esc_html__( 'Show / Hide map zoom button.', 'wpus-core' ),
            'value'       => array(
                'Enabled'  => 'true',
                'Disabled' => 'false',
            ),
        ),

        // Style tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'type',
            'heading'     => esc_html__( 'Map Type', 'wpus-core' ),
            'description' => esc_html__( 'Select map type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Roadmap', 'wpus-core' )   => 'ROADMAP', 
                esc_html__( 'Satellite', 'wpus-core' ) => 'SATELLITE',
                esc_html__( 'Hybrid', 'wpus-core' )    => 'HYBRID',
                esc_html__( 'Terrain', 'wpus-core' )   => 'TERRAIN'
            ),
            'admin_label' => true,
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'style',
            'heading'     => esc_html__( 'Map Style', 'wpus-core' ),
            'description' => esc_html__( 'Select map style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Default', 'wpus-core' )   => '',
                esc_html__( 'Greyscale', 'wpus-core' ) => 'greyscale',
                esc_html__( 'Dark', 'wpus-core' )      => 'dark',
                esc_html__( 'Custom', 'wpus-core' )    => 'custom',

            ),
            'dependency' => array( 'element' => 'type', 'value' => array( 'ROADMAP' ) ),
            'group'      => esc_html__( 'Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'textarea_raw_html',
            'param_name'  => 'custom_style',
            'heading'     => esc_html__( 'Color Scheme Code', 'wpus-core' ),
            'description' => sprintf( __( 'Paste your <a href="%s" target="_blank">snazzymaps.com</a> styles here.', 'wpus-core' ), 'http://snazzymaps.com' ),
            'dependency'  => array( 'element' => 'style', 'value' => array( 'custom' ) ),
            'group'       => esc_html__( 'Style', 'wpus-core' ),
        ),

        // Marker tab
        array(
            'type'        => 'attach_image',
            'param_name'  => 'marker_image',
            'heading'     => esc_html__( 'Custom Marker Image', 'wpus-core' ),
            'description' => esc_html__( 'Select image from media library.', 'wpus-core' ),
            'group'       => esc_html__( 'Marker', 'wpus-core' ),
        ),

        array(
            'type'        => 'textarea',
            'param_name'  => 'infowindow',
            'heading'     => esc_html__( 'Infowindow', 'wpus-core' ),
            'description' => esc_html__( 'Text to add to the Infowindow.', 'wpus-core' ),
            'group'       => esc_html__( 'Marker', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

   ),

) );
