<?php
/**
 * Adamas Style Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasStyle {

    private $style = array();

    /**
     * Constructor of the class
     *
     * @since 1.0
     */
    public function __construct( $args ) {

        if ( is_array( $args ) && ! empty( $args ) ) {
            foreach ( $args as $key => $value ) {
                if ( '' != $value && '|' != $value ) {
                    $method = 'parse_' . trim( str_replace( '-', '_', $key ) );
                    if ( method_exists( $this, $method ) ) {
                        $this->$method( $value );
                    }
                }
            }
        }

    }

    /**
     * Width
     *
     * @since 1.0
     */
    private function parse_width( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'width:' . $value . ';';
    }

    /**
     * Min-Width
     *
     * @since 1.0
     */
    private function parse_min_width( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'min-width:' . $value . ';';
    }

    /**
     * Max-Width
     *
     * @since 1.0
     */
    private function parse_max_width( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'max-width:' . $value . ';';
    }

    /**
     * Background Image
     *
     * @since 1.0
     */
    private function parse_background_image( $value ) {
        $this->style[] = 'background-image:url(' . esc_url( $value ) . ');';
    }

    /**
     * Background Repeat
     *
     * @since 1.0
     */
    private function parse_background_repeat( $value ) {
        $this->style[] = 'background-repeat:' . $value . ';';
    }

    /**
     * Background Size
     *
     * @since 1.0
     */
    private function parse_background_size( $value ) {
        $this->style[] = '-webkit-background-size:' . $value . ';';
        $this->style[] = 'background-size:' . $value . ';';
    }

    /**
     * Background Attachment
     *
     * @since 1.0
     */
    private function parse_background_attachment( $value ) {
        $this->style[] = 'background-attachment:' . $value . ';';
    }

    /**
     * Background Position
     *
     * @since 1.0
     */
    private function parse_background_position( $value ) {
        $this->style[] = 'background-position:' . $value . ';';
    }

    /**
     * Background Color
     *
     * @since 1.0
     */
    private function parse_background_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'background-color:' . $value . ';';
    }

    /**
     * Gradient
     *
     * @since 1.0
     */
    private function parse_gradient( $value ) {

        $value        = explode( '|', $value );
        $top_color    = 'transparent';
        $bottom_color = 'transparent';

        if ( isset( $value[0] ) ) {
            $top_color = strpos( $value[0], '0.01' ) ? 'transparent' : $value[0];
        }

        if ( isset( $value[1] ) ) {
            $bottom_color = strpos( $value[1], '0.01' ) ? 'transparent' : $value[1];
        }

        $this->style[] = 'background: -webkit-linear-gradient(to bottom, ' . $top_color . ', ' . $bottom_color . ');';
        $this->style[] = 'background: -moz-linear-gradient(to bottom, ' . $top_color . ', ' . $bottom_color . ');';
        $this->style[] = 'background: -ms-linear-gradient(to bottom, ' . $top_color . ', ' . $bottom_color . ');';
        $this->style[] = 'background: -o-linear-gradient(to bottom, ' . $top_color . ', ' . $bottom_color . ');';
        $this->style[] = 'background: linear-gradient(to bottom, ' . $top_color . ', ' . $bottom_color . ');';
    }

    /**
     * Border: Color
     *
     * @since 1.0
     */
    private function parse_border_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'border-color:' . $value . ';';
    }

    /**
     * Border Width
     *
     * @since 1.0
     */
    private function parse_border_width( $value ) {
        $this->style[] = 'border-width:' . absint( $value ) . 'px;';
    }

    /**
     * Border Style
     *
     * @since 1.0
     */
    private function parse_border_style( $value ) {
        $this->style[] = 'border-style:' . $value . ';';
    }

    /**
     * Border: Top Width
     *
     * @since 1.0
     */
    private function parse_border_top_width( $value ) {
        $this->style[] = 'border-top-width:' . absint( $value ) . 'px;';
    }

    /**
     * Border: Top Style
     *
     * @since 1.0
     */
    private function parse_border_top_style( $value ) {
        $this->style[] = 'border-top-style:' . $value . ';';
    }

    /**
     * Border: Top Color
     *
     * @since 1.0
     */
    private function parse_border_top_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'border-top-color:' . $value . ';';
    }

    /**
     * Border: Right Width
     *
     * @since 1.0
     */
    private function parse_border_right_width( $value ) {
        $this->style[] = 'border-right-width:' . absint( $value ) . 'px;';
    }

    /**
     * Border: Right Style
     *
     * @since 1.0
     */
    private function parse_border_right_style( $value ) {
        $this->style[] = 'border-right-style:' . $value . ';';
    }

    /**
     * Border: Right Color
     *
     * @since 1.0
     */
    private function parse_border_right_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'border-right-color:' . $value . ';';
    }

    /**
     * Border: Bottom Width
     *
     * @since 1.0
     */
    private function parse_border_bottom_width( $value ) {
        $this->style[] = 'border-bottom-width:' . absint( $value ) . 'px;';
    }

    /**
     * Border: Bottom Style
     *
     * @since 1.0
     */
    private function parse_border_bottom_style( $value ) {
        $this->style[] = 'border-bottom-style:' . $value . ';';
    }

    /**
     * Border: Bottom Color
     *
     * @since 1.0
     */
    private function parse_border_bottom_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'border-bottom-color:' . $value . ';';
    }

    /**
     * Border: Left Width
     *
     * @since 1.0
     */
    private function parse_border_left_width( $value ) {
        $this->style[] = 'border-left-width:' . absint( $value ) . 'px;';
    }

    /**
     * Border: Left Style
     *
     * @since 1.0
     */
    private function parse_border_left_style( $value ) {
        $this->style[] = 'border-left-style:' . $value . ';';
    }

    /**
     * Border: Left Color
     *
     * @since 1.0
     */
    private function parse_border_left_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'border-left-color:' . $value . ';';
    }

    /**
     * Margin
     *
     * @since 1.0
     */
    private function parse_margin( $value ) {
        $this->style[] = 'margin:' . $value . ';';
    }

    /**
     * Margin: Right
     *
     * @since 1.0
     */
    private function parse_margin_right( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'margin-right:' . $value . ';';
    }

    /**
     * Margin: Left
     *
     * @since 1.0
     */
    private function parse_margin_left( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'margin-left:' . $value . ';';
    }

    /**
     * Margin: Top
     *
     * @since 1.0
     */
    private function parse_margin_top( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'margin-top:' . $value . ';';
    }

    /**
     * Margin: Bottom
     *
     * @since 1.0
     */
    private function parse_margin_bottom( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'margin-bottom:' . $value . ';';
    }

    /**
     * Padding
     *
     * @since 1.0
     */
    private function parse_padding( $value ) {
        $this->style[] = 'padding:' . $value . ';';
    }

    /**
     * Padding: Top
     *
     * @since 1.0
     */
    private function parse_padding_top( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'padding-top:' . $value . ';';
    }

    /**
     * Padding: Bottom
     *
     * @since 1.0
     */
    private function parse_padding_bottom( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'padding-bottom:' . $value . ';';
    }

    /**
     * Padding: Left
     *
     * @since 1.0
     */
    private function parse_padding_left( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'padding-left:' . $value . ';';
    }

    /**
     * Padding: Right
     *
     * @since 1.0
     */
    private function parse_padding_right( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'padding-right:' . $value . ';';
    }

    /**
     * Font-Size
     *
     * @since 1.0
     */
    private function parse_font_size( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'font-size:'  .$value . ';';
    }

    /**
     * Font-Style
     *
     * @since 1.0
     */
    private function parse_font_style( $value ) {
        $this->style[] = 'font-style:' . $value . ';';
    }

    /**
     * Font Weight
     *
     * @since 1.0
     */
    private function parse_font_weight( $value ) {
        $this->style[] = 'font-weight:' . $value . ';';
    }

    /**
     * Font Family
     *
     * @since 1.0
     */
    private function parse_font_family( $value ) {
        $this->style[] = 'font-family:' .  $value  .';';
    }

    /**
     * Color
     *
     * @since 1.0
     */
    private function parse_color( $value ) {
        $value = strpos( $value, '0.01' ) ? 'transparent' : $value;
        $this->style[] = 'color:' . $value . ';';
    }

    /**
     * Opacity
     *
     * @since 1.0
     */
    private function parse_opacity( $value ) {
        $this->style[] = 'opacity:' . $value . ';';
    }

    /**
     * Text Align
     *
     * @since 1.0
     */
    private function parse_text_align( $value ) {
        $replace = array( 'text-', '-lg', '-md', '-sm', '-xs' );
        $this->style[] = 'text-align:' . str_replace( $replace, '', $value ) . ';';
    }

    /**
     * Text Transform
     *
     * @since 1.0
     */
    private function parse_text_transform( $value ) {
        $this->style[] = 'text-transform:' . $value . ';';
    }

    /**
     * Letter Spacing
     *
     * @since 1.0
     */
    private function parse_letter_spacing( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'letter-spacing:' . $value . ';';
    }

    /**
     * Line-Height
     *
     * @since 1.0
     */
    private function parse_line_height( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'line-height:' . $value . ';';
    }

    /**
     * Height
     *
     * @since 1.0
     */
    private function parse_height( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'height:' . $value . ';';
    }

    /**
     * Min-Height
     *
     * @since 1.0
     */
    private function parse_min_height( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'min-height:' . $value . ';';
    }

    /**
     * Max-Height
     *
     * @since 1.0
     */
    private function parse_max_height( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'max-height:' . $value . ';';
    }

    /**
     * Border Radius
     *
     * @since 1.0
     */
    private function parse_border_radius( $value ) {
        $value = AdamasHelper::sanitize_unit( $value );
        $this->style[] = 'border-radius:' . $value . ';';
    }

    /**
     * Box Shadow
     *
     * @since 1.0
     */
    private function parse_box_shadow( $value ) {
        $this->style[] = '-webkit-box-shadow:' . $value . ';';
        $this->style[] = '-moz-box-shadow:' . $value . ';';
        $this->style[] = 'box-shadow:' . $value . ';';
    }

    /**
     * Animation name
     *
     * @since 1.0
     */
    private function parse_animation_name( $value ) {
        $this->style[] = '-webkit-animation-name: ' . $value . ';';
        $this->style[] = '-moz-animation-name: ' . $value . ';';
        $this->style[] = '-o-animation-name: ' . $value . ';';
        $this->style[] = 'animation-name: ' . $value . ';';
    }

    /**
     * Animation delay
     *
     * @since 1.0
     */
    private function parse_animation_delay( $value ) {
        $this->style[] = '-webkit-animation-delay: ' . $value . ';';
        $this->style[] = '-moz-animation-delay: ' . $value . ';';
        $this->style[] = '-o-animation-delay: ' . $value . ';';
        $this->style[] = 'animation-delay: ' . $value . ';';
    }

    /**
     * Animation duration
     *
     * @since 1.0
     */
    private function parse_animation_duration( $value ) {
        $this->style[] = '-webkit-animation-duration: ' . $value . ';';
        $this->style[] = '-moz-animation-duration: ' . $value . ';';
        $this->style[] = '-o-animation-duration: ' . $value . ';';
        $this->style[] = 'animation-duration: ' . $value . ';';
    }

    /**
     * Typography
     *
     * @since 1.0
     */
    private function parse_typography( $value ) {
        $array = array( 'font-family:Default;' => '', 'font-family:Default' => '' );
        $value = strtr( $value, $array );
        $this->style[] = $value;
    }

    /**
     * Returns the styles
     *
     * @since 1.0
     */
    public function return_style() {
        if ( ! empty( $this->style ) ) {
            $this->style = implode( false, $this->style );
            return esc_attr( $this->style );
        } else {
            return null;
        }
    }

}
