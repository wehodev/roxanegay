<?php
/**
 * Visual Composer: Row
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map_update( 'vc_row', array(

    'params' => array(  

        // General tab
        array(
            'type'             => 'dropdown',
            'param_name'       => 'row_type',
            'heading'          => __( 'Row Type', 'wpus-core' ),
            'description'      => __( 'Select row type.', 'wpus-core' ),
            'value'            => array(
                __( 'In container', 'wpus-core' )          => 'in-container-section',
                __( 'Full width background', 'wpus-core' ) => 'full-width-section',
                __( 'Full width content', 'wpus-core' )    => 'full-width-content',
            ),
            'admin_label' => true,
        ),

        array(
            'type'        => 'checkbox',
            'heading'     => __( 'No Padding', 'wpus-core' ),
            'param_name'  => 'no_padding',
            'value'       => array( __( 'Yes, please', 'wpus-core' ) => 'no-padding' ),
            'description' => __( 'If checked columns will be set to without padding.' , 'wpus-core' ),
            'dependency'  => array( 'element' => 'row_type', 'value' => 'full-width-content' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'max_width',
            'heading'     => __( 'Maximum Width', 'wpus-core' ),
            'description' => __( 'You can use px values. Ex: 1200px', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'min_height',
            'heading'     => __( 'Minimum Height', 'wpus-core' ),
            'description' => __( 'You can use px values. Ex: 600px', 'wpus-core' ),
        ),

        array(
            'type'        => 'checkbox',
            'param_name'  => 'full_height',
            'heading'     => __( 'Full Height Row?', 'wpus-core' ),
            'description' => __( 'If checked row will be set to full height.', 'wpus-core' ),
            'value'       => array( __( 'Yes, please!', 'wpus-core' ) => 'full-height-section' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'full_height_valign',
            'heading'     => __( 'Content position', 'wpus-core' ),
            'description' => __( 'Select content position within row.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Top', 'wpus-core' )    => '',
                esc_html__( 'Middle', 'wpus-core' ) => 'valign-middle',
                esc_html__( 'Bottom', 'wpus-core' ) => 'valign-bottom',
            ),
            'dependency'  => array( 'element' => 'full_height', 'not_empty' => true ),
        ),

        array(
            'type'        => 'checkbox',
            'param_name'  => 'equal_col_height',
            'heading'     => __( 'Equal Column Height?', 'wpus-core' ),
            'description' => __( 'If checked, all the columns in this row will have the equal height.', 'wpus-core' ),
            'value'       => array( __( 'Yes, please!', 'wpus-core' ) => 'equal-columns-height' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'equal_col_valign',
            'heading'     => esc_html__( 'Equal Height Column Vertical Align', 'wpus-core' ),
            'description' => esc_html__( 'Choose vertical alignment for inner columns of equal height.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Top', 'wpus-core' )    => '',
                esc_html__( 'Middle', 'wpus-core' ) => 'col-valign-middle',
                esc_html__( 'Bottom', 'wpus-core' ) => 'col-valign-bottom',
            ),
            'dependency' => array( 'element' => 'equal_col_height', 'not_empty' => true ),
        ),

        array(
            'type'       => 'checkbox',
            'param_name' => 'fade_content',
            'heading'    => __( 'Fade content on scroll?', 'wpus-core' ),
            'value'      => array( __( 'Yes, please!', 'wpus-core' ) => 'yes' ),
        ),

        // Background tab
        array(
            'type'             => 'dropdown',
            'param_name'       => 'background_type',
            'heading'          => __( 'Background Type', 'wpus-core' ),
            'description'      => __( 'Select background type.', 'wpus-core' ),
            'value'            => array(
                __( 'Default (set in design tab)', 'wpus-core' ) => '',
                __( 'Image', 'wpus-core' )                       => 'image',
                __( 'Background Video Youtube', 'wpus-core' )    => 'youtube',
            ),
            'group' => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'attach_image',
            'param_name'  => 'background_image',
            'heading'     => __( 'Background Image', 'wpus-core' ),
            'description' => __( 'Select image from media library.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'background_repeat',
            'heading'     => __( 'Background Repeat', 'wpus-core' ),
            'description' => __( 'Select background repeat.', 'wpus-core' ),
            'value'       => array( __( 'Default', 'wpus-core' ) => '' ) + array_flip( AdamasShared::background_repeat() ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'background_position',
            'heading'     => __( 'Background Position', 'wpus-core' ),
            'description' => __( 'Select background position.', 'wpus-core' ),
            'value'       => array( __( 'Default', 'wpus-core' ) => '' ) + array_flip( AdamasShared::background_position() ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'background_attachment',
            'heading'     => __( 'Background Attachment', 'wpus-core' ),
            'description' => __( 'Select background attachment.', 'wpus-core' ),
            'value'       => array( __( 'Default', 'wpus-core' ) => '' ) + array_flip( AdamasShared::background_attachment() ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'background_size',
            'heading'     => __( 'Background Size', 'wpus-core' ),
            'description' => __( 'Select background size.', 'wpus-core' ),
            'value'       => array( __( 'Default', 'wpus-core' ) => '' ) + array_flip( AdamasShared::background_size() ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'background_animation',
            'heading'     => __( 'Animate Pattern', 'wpus-core' ),
            'description' => __( 'Select pattern background animation.', 'wpus-core' ),
            'value'       => array( __( 'None', 'wpus-core' ) => '' ) + array_flip( AdamasShared::background_animation() ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'image' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'youtube_url',
            'heading'     => __( 'YouTube Link', 'wpus-core' ),
            'description' => __( 'Enter YouTube URL.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'background_type', 'value' => 'youtube' ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'parallax',
            'heading'     => __( 'Parallax', 'wpus-core' ),
            'description' => __( 'Choose a scrolling effect for the background.', 'wpus-core' ),
            'value'       => array( __( 'None', 'wpus-core' ) => '' ) + array_flip( AdamasShared::parallax() ),
            'dependency'  => array( 'element' => 'background_type', 'background_type', 'not_empty' => true ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'overlay_color',
            'heading'     => __( 'Overlay Background Color', 'wpus-core' ),
            'description' => __( 'Select overlay color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'background_type', 'not_empty' => true ),
            'group'       => __( 'Background', 'wpus-core' ),
        ),
        
        // Row style
        array(
            'type'        => 'dropdown',
            'param_name'  => 'row_top_slant',
            'heading'     => __( 'Row Top Style', 'wpus-core' ),
            'description' => __( 'Choose the top style for the row', 'wpus-core' ),
            'value'       => array(
                __( 'None', 'wpus-core' )                => '',
                __( 'Slant left to right', 'wpus-core' ) => 'slant-top-left',
                __( 'Slant right to left', 'wpus-core' ) => 'slant-top-right',
            ),
            'group' => __( 'Row Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'row_top_slant_color',
            'heading'     => __( 'Row Top Slant Background Color', 'wpus-core' ),
            'description' => __( 'Select row top slant background color', 'wpus-core' ),
            'dependency'  => array( 'element' => 'row_top_slant', 'not_empty' => true ),
            'group'       => __( 'Row Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'row_bottom_slant',
            'heading'     => __( 'Row Bottom Style', 'wpus-core' ),
            'description' => __( 'Choose the bottom style for the row', 'wpus-core' ),
            'value'       => array(
                __( 'None', 'wpus-core' )                => '',
                __( 'Slant left to right', 'wpus-core' ) => 'slant-bottom-left',
                __( 'Slant right to left', 'wpus-core' ) => 'slant-bottom-right',
            ),
            'group' => __( 'Row Style', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'row_bottom_slant_color',
            'heading'     => __( 'Row Bottom Slant Background Color', 'wpus-core' ),
            'description' => __( 'Select row bottom slant background color', 'wpus-core' ),
            'dependency'  => array( 'element' => 'row_bottom_slant', 'not_empty' => true ),
            'group'       => __( 'Row Style', 'wpus-core' ),
        ),

        // Design tab
        WpusVcParams::param_css(),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),

    ),

    'js_view' => 'VcRowView'

) );