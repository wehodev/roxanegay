<?php
/**
 * Page Hero Basic Template
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Declare slider variables
$id = adamas_get_page_id();

// Get data
$title                    = get_post_meta( $id, 'adamas_hero_title', true );
$desc                     = get_post_meta( $id, 'adamas_hero_desc', true );
$align                    = get_post_meta( $id, 'adamas_hero_align', true );
$layout                   = get_post_meta( $id, 'adamas_hero_layout', true );
$fade_content             = get_post_meta( $id, 'adamas_hero_fade_content', true );

$title_animation          = get_post_meta( $id, 'adamas_hero_title_animation', true );
$title_animation_delay    = get_post_meta( $id, 'adamas_hero_title_animation_delay', true );
$title_animation_duration = get_post_meta( $id, 'adamas_hero_title_animation_duration', true );

$desc_animation           = get_post_meta( $id, 'adamas_hero_desc_animation', true );
$desc_animation_delay     = get_post_meta( $id, 'adamas_hero_desc_animation_delay', true );
$desc_animation_duration  = get_post_meta( $id, 'adamas_hero_desc_animation_duration', true );

$background               = adamas_get_background();

// Wrap class
$wrap_class = AdamasHelper::get_html_class( array(
    'site-hero',
    $layout,
    $align,
    'hero-boxed' == $layout ? 'container' : '',
    $fade_content ? 'has-fade-content' : '',
) );

// Text fade attributes
$content_attr = AdamasHelper::get_html_attributes( array(
    '250-top'  => 'yes' == $fade_content? 'opacity:1;' : '',
    '-250-top' => 'yes' == $fade_content? 'opacity:0;' : '',
) );

// Title: Class
$title_class = AdamasHelper::get_html_class( array(
    'wpus-hero-title',
    $title_animation ? 'wow ' . $title_animation : '',
) );

// Title: Attributes
$title_attr = AdamasHelper::get_html_attributes( array(
    'wow-delay'    => AdamasHelper::sanitize_animation( $title_animation_delay ),
    'wow-duration' => AdamasHelper::sanitize_animation( $title_animation_duration ),
) );

// Title: Markup
$title = $title ? $title : get_the_title();
$title = '<h2' . $title_class . $title_attr . '><span>' . do_shortcode( $title ) . '</span></h2><br>';

// Description: Class
$desc_class = AdamasHelper::get_html_class( array(
    'wpus-hero-desc',
    $desc_animation ? 'wow ' . $desc_animation : '',
) );

// Description: Attributes
$desc_attr = AdamasHelper::get_html_attributes( array(
    'wow-delay'    => AdamasHelper::sanitize_animation( $desc_animation_delay ),
    'wow-duration' => AdamasHelper::sanitize_animation( $desc_animation_duration ),
) );

// Description: Markup
$desc = $desc ? '<h5' . $desc_class . $desc_attr . '><span>' . do_shortcode( $desc ) . '</span></h5>' : '';

// Hero markup
$output = '<div id="site-hero"' . $wrap_class . '>';

    $output .= $background;

    $output .= '<div class="site-hero-inner"' . $content_attr . '>';

        $output .= '<div class="container">';
            $output .= $title;
            $output .= $desc;
        $output .= '</div>';

    $output .= '</div>';

$output .= '</div>';

// Echo hero
echo $output;
