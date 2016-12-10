<?php
/**
 * Shortcode: Accordion Tab
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

global $adamas_acc_data;

// Extract shortcodes variables
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

do_shortcode( $content );

$tag = $adamas_acc_data['tag'] ? $adamas_acc_data['tag'] : 'p';

// Shortcode
$output = '<div class="wpus-toggle-section">';
	$output .= '<' . $tag . ' class="wpus-toggle-header"><i class="wpus-toggle-icon"></i><span>' . esc_html( $title ) . '</span></' . $tag . '>';
	$output .= '<div class="wpus-toggle-content">';
	    $output .= ( $content == '' || $content == ' ' ) ? esc_html( 'Empty section. Edit page to add content here.', 'wpus-core' ) : wpb_js_remove_wpautop( $content );
	$output .= '</div>';
$output .= '</div>';

// Echo shortcode
echo $output;