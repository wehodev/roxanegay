<?php
/**
 * Shortcode: Pie Chart
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */
 
function adamas_pie_chart_shortcode( $atts, $content = null ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'percentage'       => '90',
        'label_type'       => 'text',
        'label'            => '90%',
        'icon_type'        => 'fontawesome',
        'icon_etline'      => 'etline-mobile',
        'icon_fontawesome' => 'fa fa-info-circle',
        'icon_linecons'    => 'linecons-heart',
        'icon_style'       => 'wpus-style-1',
        'chart_size'       => 'standart',
        'line_thickness'   => '5',
        'line_style'       => 'round',
        'align'            => 'pie-chart-center',
        'align_sm'         => '',
        'align_xs'         => '',
        
        // Style tab
        'bar_color'        => adamas_get_data( 'accent_color', '', '#81c689' ),
        'track_color'      => AdamasHelper::hex2rgba( adamas_get_data( 'accent_color', '', '#81c689' ), '0.1' ),
        'label_color'      => '',
        'label_typography' => '',
        'icon_color'       => '',
        'icon_size'        => '',
        
        // Extra tab
        'el_id'            => '',
        'el_class'         => '',
        'el_hidden'        => '',

    ), $atts ) );

    // Enqueue scripts
    WpusVcHelper::get_google_font( $label_typography );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';

    // Wrap ID
    $wrap_id = AdamasHelper::get_html_id( $el_id );

    // Wrap class
    $wrap_class = array(
        'wpus-pie-chart',
        $align,
        $align_sm,
        $align_xs,
        $el_class,
        $el_hidden,
    );

    // Chart size
    if ( 'small' == $chart_size ) {
        $_chart_size = 100;
    } else if ( 'large' == $chart_size ) {
        $_chart_size = 140;
    } else {
        $_chart_size = 120;
    }

    // Chart attributes
    $chart_attr = AdamasHelper::get_html_attributes( array(
        'percent'    => absint( $percentage ),
        'size'       => absint( $_chart_size ),
        'linecap'    => esc_attr( $line_style ),
        'width'      => absint( $line_thickness ),
        'trackcolor' => esc_attr( $track_color ),
        'barcolor'   => esc_attr( $bar_color ),
    ) );

    // Style: Chart
    $chart_css = AdamasHelper::get_style( array(
        'width'       => $_chart_size,
        'height'      => $_chart_size,
        'line_height' => $_chart_size,
    ) );

    $build_css .= ".wpus-pie-chart.{$unique_id}{{$chart_css}}";

    // Style: Label
    $label_css  = AdamasHelper::get_vc_style( $label_typography );
    $label_css .= AdamasHelper::get_style( array( 'color' => $label_color ? $label_color : $bar_color ) );

    if ( $label_css ) {
        $build_css .= ".wpus-pie-chart.{$unique_id} h3{{$label_css}}";
    }

    // Style: Icon
    $icon_css  = AdamasHelper::get_style( array( 
        'color'     => $icon_color ? $icon_color : $bar_color,
        'font_size' => $icon_size,
    ) );

    if ( $icon_css ) {
        $build_css .= ".wpus-pie-chart.{$unique_id} i{{$icon_css}}";
    }

    // Generate CSS style
    if ( $build_css ) {
        AdamasHelper::build_css( $build_css );
        $wrap_class[] = $unique_id;
    }

    // Label markup
    if ( 'icon' == $label_type ) {
        switch ( $icon_type ) {
            case 'etline':
                wp_enqueue_style( 'etline' );
                $chart_label = '<i class="' . esc_attr( $icon_etline ) . '"></i>';
                break;
            case 'fontawesome':
                $chart_label = '<i class="' . esc_attr( $icon_fontawesome ) . '"></i>';
                break;
            case 'linecons':
                vc_icon_element_fonts_enqueue( 'linecons' );
                $chart_label = '<i class="' . esc_attr( $icon_linecons ) . '"></i>';
                break;     
        }
    } else {
        $chart_label = '<h3>' . esc_html( $label ) . '</h3>';
    }

    // Get wrap class
    $wrap_class = AdamasHelper::get_html_class( $wrap_class );

    // Shortcode
    $output = '<div' . $wrap_id . $wrap_class . $chart_attr . '>';
        $output .= $chart_label;
    $output .= '</div>';

    // Return shortcode
    return $output;
}

add_shortcode( 'wpus_pie_chart', 'adamas_pie_chart_shortcode' );