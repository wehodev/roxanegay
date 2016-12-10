<?php
/**
 * Shortcode: Tabs
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

global $adamas_sc_tabs;
$adamas_sc_tabs = array();

// Extract shortcodes variables
extract( shortcode_atts( array(

	// General tab
	'style'                   => 'style-standart',
	'align'                   => '',
	'tabs_margin_bottom'      => '',
	
	// Style tab
	'icon_size'               => '',
	'icon_color'              => '',
	'icon_hover_color'        => '',
	'icon_active_color'       => '',
	'title_color'             => '',
	'title_hover_color'       => '',
	'title_active_color'      => '',
	'active_background_color' => '',
	'title_typography'        => '',
	
	// Animation tab
	'animation_type'          => '',
	'animation_delay'         => '',
	'animation_duration'      => '',
	
	// Extra tab
	'el_id'                   => '',
	'el_class'                => '',
	'el_hidden'               => '',

), $atts ) );

do_shortcode( $content );

if ( empty( $adamas_sc_tabs ) ) { 
	return;
}

// Enqueue Google Font
WpusVcHelper::get_google_font( $title_typography );

// Declare variables
$unique_id = AdamasHelper::get_unique_id();
$build_css = '';

// Wrap ID
$wrap_id = AdamasHelper::get_html_id( $el_id );

// Wrap class
$wrap_class = array(
	'wpus-tab-wrapper',
	$style,
	$align,
	$el_class,
	$el_hidden,
	$animation_type,
);

// Wrap atributes
$wrap_attr = AdamasHelper::get_html_attributes( array(
	'wow-delay'    => AdamasHelper::sanitize_animation( $animation_delay ),
	'wow-duration' => AdamasHelper::sanitize_animation( $animation_duration ),
) );

// Style: Tabs margin botton
if ( $tabs_margin_bottom = AdamasHelper::get_style( array( 'margin_bottom' => $tabs_margin_bottom ) ) ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header{{$tabs_margin_bottom}}";
}

// Style: Title regular
$title_css  = AdamasHelper::get_style( array(
	'color'      => $title_color,
	'typography' => $title_typography,
) );

if ( $title_css ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header a{{$title_css}}";
}

// Style: Title hover
if ( $title_hover_css = AdamasHelper::get_style( array( 'color' => $title_hover_color ) ) ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header a:hover{{$title_hover_css}}";
}

// Style: Title active
$title_active_css  = AdamasHelper::get_style( array(
	'color'            => $title_active_color,
	'background_color' => $active_background_color,
) );

if ( $title_active_css ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header a.active{{$title_active_css}}";
}

// Style: Icon regular
$icon_css = AdamasHelper::get_style( array(
	'color'     => $icon_color,
	'font_size' => $icon_size,
) );

if ( $icon_css ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header i{{$icon_css}}";
}

// Style: Icon hover
if ( $icon_hover_css = AdamasHelper::get_style( array( 'color' => $icon_hover_color ) ) ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header a:hover i{{$icon_hover_css}}";
}

// Style: Icon active 
if ( $icon_active_css = AdamasHelper::get_style( array( 'color' => $icon_active_color ) ) ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-header a.active i{{$icon_active_css}}";
}

// Style: Content
if ( $content_css = AdamasHelper::get_style( array( 'background_color' => $active_background_color ) ) ) {
	$build_css .= ".wpus-tab-wrapper.{$unique_id} .wpus-tab-content{{$content_css}}";
}

// Generate CSS style
if ( $build_css ) {
    AdamasHelper::build_css( $build_css );
    $wrap_class[] = $unique_id;
}

// Generate tab nav
$tab_nav_html = '<ul class="wpus-tab-header">';
	foreach( $adamas_sc_tabs as $key => $value ) {

		// Get icon
		$icon_html = '';

		if ( 'style-with-icon' == $style && isset( $value['atts']['icon_type'] ) ) :
		    switch ( $value['atts']['icon_type'] ) {
		        case 'etline':
		        	wp_enqueue_style( 'etline' );
		            $icon_html = '<i class="' . sanitize_html_class( $value['atts']['icon_etline'] ) . '"></i>';
		            break;
		        case 'fontawesome':
		            $icon_html = '<i class="' . sanitize_html_class( $value['atts']['icon_fontawesome'] ) . '"></i>';
		            break;
		        case 'linecons':
		        	vc_icon_element_fonts_enqueue( 'linecons' );
		            $icon_html = '<i class="' . sanitize_html_class( $value['atts']['icon_linecons'] ) . '"></i>';
		            break;
		    }
	    endif;

		$tab_nav_html .= '<li><a href="#tab-' . $unique_id . '-' . $key . '" >' . $icon_html . esc_html( $value['atts']['title'] ) . ' </a></li>';

	}
$tab_nav_html .= '</ul>';

// Get wrap class
$wrap_class = AdamasHelper::get_html_class( $wrap_class );

// Shortcode
$output = '<div' . $wrap_id . $wrap_class . $wrap_attr . '>';

	$output .= $tab_nav_html;

	foreach ( $adamas_sc_tabs as $key => $value ) {
		$_content = do_shortcode( AdamasHelper::do_kses( $value['content'] ) );
		$output .= '<div id="tab-' . $unique_id . '-' . $key . '" class="wpus-tab-content">';
			$output .= ( $_content == '' || $_content == ' ' ) ? __( 'Empty section. Edit page to add content here.', 'wpus-core' ) : do_shortcode( $_content );
		$output .= '</div>';
	}

$output .= '</div>';

// Echo shortcode
echo $output;