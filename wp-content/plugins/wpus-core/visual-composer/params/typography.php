<?php
/**
 * Visual Composer - Typography param
 * 
 * @author  WP Uber Studio
 * @package Adamas
 * @since   1.0.0
 * @version 1.0.0
 */

function wpus_vc_typography( $settings, $value ) {

    // Get data
    $param_name  = $settings['param_name'];
    $type        = $settings['type'];
    $options     = isset( $settings['options'] ) ? $settings['options'] : array();

    // Set up the default form values
    $defaults = array(
        'font-family'     => true,
        'font-size'       => true,
        'line-height'     => true,
        'letter-spacing'  => true,
        'font-weight'     => true,
        'font-style'      => true,
        'text-transform'  => true,
        'text-align'      => true,
    );

    // Merge the user-selected arguments with the defaults
    $options = wp_parse_args( $options, $defaults ); 

    // Column size
    $input_size = 'vc_col-xs-4';
    if ( ! $options['font-size'] || ! $options['line-height'] || ! $options['letter-spacing'] ) {
        $input_size = 'vc_col-xs-6';
    }

    $select_size = 'vc_col-xs-3';
    if ( ! $options['font-weight'] || ! $options['font-style'] || ! $options['text-transform'] || ! $options['text-align'] ) {
        $select_size = 'vc_col-xs-4';
    }
    
    // Build
    $html = '<div class="wpus-typography-wrap vc_row">';
    
        $html .= "<input type='hidden' class='wpb_vc_param_value {$type} {$param_name}' name='{$param_name}' value='{$value}'/>";

        // Font family
        if ( $options['font-family'] === true ) {

            $html .=  '<div class="wpus-typography-inner wpus-field-font-family vc_col-xs-12">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Font Family', 'wpus-core' ) . '</span>';
                $html .=  '<select name="' . $param_name . '-font-family" class="wpus-typography-input wpb-input wpb-select dropdown" data-type="font-family">';
                    foreach ( AdamasShared::fonts() as $value ) {
                        $html .=  '<option value="' . $value . '">' . $value . '</option>';
                    }
                $html .=  '</select>';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'Select font family.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Font size
        if ( $options['font-size'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-font-size ' . $input_size . '">';
                $html .= '<span class="wpb_element_label">' . esc_html__( 'Font Size', 'wpus-core' ) . '</span>';
                $html .= '<input type="text" name="' . $param_name . '[font-size]" class="wpus-typography-input wpb-textinput textfield" value="" data-type="font-size">';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'You can use px or em values.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Line height
        if ( $options['line-height'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-line-height ' . $input_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Line height', 'wpus-core' ) . '</span>';
                $html .=  '<input type="text" name="' . $param_name . '[line-height]" class="wpus-typography-input wpb-textinput textfield" value="" data-type="line-height">';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'You can use px or em values.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Letter spacing
        if ( $options['letter-spacing'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-letter-spacing ' . $input_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Letter spacing', 'wpus-core' ) . '</span>';
                $html .=  '<input type="text" name="' . $param_name . '[letter-spacing]" class="wpus-typography-input wpb-textinput textfield" value="" data-type="letter-spacing">';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'You can use px or em values.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Font weight
        if ( $options['font-weight'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-font-weight ' . $select_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Font Weight', 'wpus-core' ) . '</span>';
                $html .=  '<select name="' . $param_name . '[font-weight]" class="wpus-typography-input wpb-input wpb-select dropdown" data-type="font-weight">';
                    $html .=  '<option value="">' . esc_html__( 'Default', 'wpus-core' ) . '</option>';
                    $html .=  '<option value="100">Ultra Light 100</option>';
                    $html .=  '<option value="200">Light 200</option>';
                    $html .=  '<option value="300">Book 300</option>';
                    $html .=  '<option value="400">Normal 400</option>';
                    $html .=  '<option value="500">Medium 500</option>';
                    $html .=  '<option value="600">Semi Bold 600</option>';
                    $html .=  '<option value="700">Bold 700</option>';
                    $html .=  '<option value="800">Extra Bold 800</option>';
                    $html .=  '<option value="900">Ultra Bold 900</option>';
                $html .=  '</select>';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'Choose a font weight.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Font style
        if ( $options['font-style'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-font-style ' . $select_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Font Style', 'wpus-core' ) . '</span>';
                $html .=  '<select name="' . $param_name . '[font-style]" class="wpus-typography-input wpb-input wpb-select dropdown" data-type="font-style">';
                    $html .=  '<option value="">' . esc_html__( 'Default', 'wpus-core' ) . '</option>';
                    $html .=  '<option value="normal">Normal</option>';
                    $html .=  '<option value="italic">Italic</option>';
                $html .=  '</select>';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'Choose a font style.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Text transform
        if ( $options['text-transform'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-text-transform ' . $select_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Text Transform', 'wpus-core' ) . '</span>';
                $html .=  '<select name="' . $param_name . '[text-transform]" class="wpus-typography-input wpb-input wpb-select dropdown" data-type="text-transform">';
                    $html .=  '<option value="">' . esc_html__( 'Default', 'wpus-core' ) . '</option>';
                    $html .=  '<option value="none">None</option>';
                    $html .=  '<option value="lowercase">Lowercase</option>';
                    $html .=  '<option value="capitalize">Capitalize</option>';
                    $html .=  '<option value="uppercase">Uppercase</option>';
                $html .=  '</select>';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'Choose a text transform.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

        // Text align
        if ( $options['text-align'] === true ) {
            $html .=  '<div class="wpus-typography-inner wpus-field-text-align ' . $select_size . '">';
                $html .=  '<span class="wpb_element_label">' . esc_html__( 'Text Align', 'wpus-core' ) . '</span>';
                $html .=  '<select name="' . $param_name . '-text-align" class="wpus-typography-input wpb-input wpb-select dropdown" data-type="text-align">';
                    foreach ( adamas_text_align_array() as $k => $v ) {
                        $html .=  '<option value="' . $k . '">' . $v . '</option>';
                    }
                $html .=  '</select>';
                $html .= '<span class="vc_description vc_clr">' . esc_html__( 'Choose a text align.', 'wpus-core' ) . '</span>';
            $html .=  '</div>';
        }

    $html .= '</div>';

    // Return field
    return $html;
}

vc_add_shortcode_param( 'wpus_typography', 'wpus_vc_typography', ADAMAS_CORE_PLUGIN_URL . 'visual-composer/assets/js/vc.js' );