<?php
/**
 * Adamas Helper Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasHelper {

	/**
	 * Return unique ID
     *
     * @since 1.0
	 */
	public static function get_unique_id() {
	    global $adamas_global_array;
	    return 'adamas_custom_' . $adamas_global_array['id']++;
	}

	/**
	 * Sanitize animation
     *
     * @since 1.0
	 */
	public static function sanitize_animation( $value ) {
		return $value ? absint( $value ) / 1000 . 's' : '';
	}

	/**
	 * Sanitize CSS unit
     *
     * @since 1.0
	 */
	public static function sanitize_unit( $value ) {

		// Return if $value is empty
	    if ( empty( $value ) ) {
	        return false;
	    }

	    // Allowed unit
	    $pattern = '/(px|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax|\%)$/';

	    // Parse value
		$regexr = preg_match( $pattern, $value, $matches );

		// Return unit
		return isset( $matches[1] ) ? floatval( $value ) . $matches[1] : floatval( $value ) . 'px';
	}

	/**
	 * Return class
     *
     * @since 1.0
	 */
	public static function get_class( $args ) {

	    if ( ! is_array( $args ) ) {
	        $args = preg_split( '/\s+/', $args );
	    }

	    $args = array_filter( $args );
	    $args = array_unique( $args );
	    $args = str_replace( ',', ' ', $args );
	    $args = array_map( array( 'self', 'sanitize_html_classes' ), $args );

	    if ( ! empty( $args ) ) {
	    	$args = implode( ' ', $args );
	    	$args = preg_replace( '/\s+/', ' ', $args );
	        return $args;
	    }

	    return false;
	}

	/**
	 * Return HTML class
     *
     * @since 1.0
	 */
	public static function get_html_class( $args ) {
		$args = self::get_class( $args );
	    return $args ? ' class="' . $args . '"' : '';
	}

	/**
	 * Echo HTML class
     *
     * @since 1.0
	 */
	public static function html_class( $args ) {
		echo self::get_html_class( $args );
	}

	/*
	 * Return HTML ID
     *
     * @since 1.0
	 */
	public static function get_html_id( $id ) {
		return $id ? ' id="' . sanitize_html_class( $id ) . '"' : '';
	}

	/*
	 * Echo HTML ID
     *
     * @since 1.0
	 */
	public static function html_id( $id ) {
		echo self::get_html_id( $id );
	}

	/**
	 * Return HTML atributes
     *
     * @since 1.0
	 */
	public static function get_html_attributes( $args ) {

	    // Parse attributes
	    if ( $args = array_filter( $args ) ) {
	    	$output = '';
	        foreach ( $args as $key => $value ) {
	            $output .= 'data-' . esc_attr( $key ) . '="' . esc_attr( $value ) . '" ';
	        }
	    } else {
	    	return false;
	    }

	    // Return attributes
		return ' ' . trim( $output );
	}

	/**
	 * Echo HTML atributes
     *
     * @since 1.0
	 */
	public static function html_attributes( $args ) {
		echo self::get_html_attributes( $args );
	}

	/**
	 * Return style
     *
     * @since 1.0
	 */
	public static function get_style( $args = array() ) {
	    $style = new AdamasStyle( $args );
	    return $style->return_style();
	}

	/**
	 * Return inline style
     *
     * @since 1.0
	 */
	public static function get_inline_style( $args = array() ) {
		$style = self::get_style( $args );
	    return $style ? ' style="' . $style . '"' : '';
	}

	/**
	 * Echo inline style
     *
     * @since 1.0
	 */
	public static function inline_style( $args = array() ) {
	    echo self::get_inline_style( $args );
	}

	/**
	 * Return VC design tab css style
     *
     * @since 1.0
	 */
	public static function get_vc_style( $css ) {
		$css = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $css, $matches );
		if ( isset( $matches[2] ) ) {
			return $matches[2];
		} else {
			return false;
		}
	}

	/**
	 * Prepares css for printing in footer
     *
     * @since 1.0
	 */
	public static function build_css( $css ) {
	    global $adamas_global_array;
	    if ( ! in_array( $css, $adamas_global_array['style'] ) ) {
	        array_push( $adamas_global_array['style'], $css );
	    }
	}

	/**
	 * Enqueues a Google Font
     *
     * @since 1.0
	 */
	public static function enqueue_google_font( $font ) {

	    // Get list of all Google Fonts
	    $google_fonts = AdamasShared::google_fonts();

	    // Make sure font is in our list of fonts
	    if ( ! $google_fonts || ! in_array( $font, $google_fonts ) ) {
	        return;
	    }

	    // Sanitize handle
	    $handle = trim( $font );
	    $handle = strtolower( $handle );
	    $handle = str_replace( ' ', '-', $handle );

	    // Sanitize font name
	    $font = trim( $font );
	    $font = str_replace( ' ', '+', $font );
	    $font = str_replace( ' ', '%20', $font );

	    // Subset
	    $subset = 'latin'; //adamas_get_mod( 'google_font_subsets', 'latin' );
	    $subset = $subset ? $subset : 'latin';
	    $subset = '&amp;subset='. $subset;

	    // Style
	    $style  = ':100italic,200italic,300italic,400italic,600italic,700italic,800italic,900italic,900,800,700,600,500,400,300,200,100';

	    // Font URL
	    $font_url = '';

	    /*
	    Translators: If there are characters in your language that are not supported
	    by chosen font(s), translate this to 'off'. Do not translate into your own language.
	     */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'adamas' ) ) {
	        $font_url = add_query_arg( 'family', $font . $style . $subset, "//fonts.googleapis.com/css" );
	    }

	    // Enqueue style
	    wp_enqueue_style(
	        'wpus-footer-google-font-'. $handle,
	        $font_url,
	        false,
	        false,
	        'all'
	    );
	}

	/**
	 * Return filtered string of HTML
     *
     * @since 1.0
	 */
	public static function do_kses( $string ) {

		$allow = array_merge( wp_kses_allowed_html( 'post' ), array(

	        // Link
	        'link' => array(
	            'href' => true,
	            'type' => true,
	        ),

	        // Iframe
	        'iframe' => array(
	            'src'             => array(),
	            'height'          => array(),
	            'width'           => array(),
	            'frameborder'     => array(),
	            'allowfullscreen' => array(),
	        ),

	    ) );

	    return wp_kses( $string, $allow );
	}

	/**
	 * Convert HEX to RGBA
     *
     * @since 1.0
	 */
	public static function hex2rgba( $hex, $alpha = 1 ) {

		// Return if $hex is empty
		if ( ! $hex ) {
	        return false;
	    }

	    // Remove any trailing '#' symbols from the color value
	    $hex = str_replace( '#', '', $hex );

	    // Set red, green, blue
	    if ( strlen( $hex ) == 3 ) {
	        $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
	        $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
	        $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	    } else {
	        $r = hexdec( substr( $hex, 0, 2 ) );
	        $g = hexdec( substr( $hex, 2, 2 ) );
	        $b = hexdec( substr( $hex, 4, 2 ) );
	    }

	    // Return rgba color
	    return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . floatval( $alpha ) . ')';
	}

	/**
	 * Return minify CSS
     *
     * @since 1.0
	 */
	public static function get_minify_css( $css ) {

	    $css = preg_replace( '/\s+/', ' ', $css );
	    $css = preg_replace( '/;(?=\s*})/', '', $css );
	    $css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
	    $css = preg_replace( '/(,|;|\{|}|\()/', '$1', $css );
	    $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	    $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

	    // Return minified css
	    return trim( $css );

	}

	/**
	 * Remove wpautop
     *
     * @since 1.0
	 */
	public static function js_remove_wpautop( $content, $autop = false ) {

		if ( $autop ) {
			$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
		}

		return do_shortcode( shortcode_unautop( $content ) );
	}

    /**
     * sanitize_html_class works just fine for a single class
     * Some times le wild <span class="blue hedgehog"> appears, which is when you need this function,
     * to validate both blue and hedgehog,
     * Because sanitize_html_class doesn't allow spaces.
     *
     * @since 1.0
     */
    public static function sanitize_html_classes( $class, $fallback = null ) {

        if ( is_string( $class ) ) {
            $class = explode( ' ', $class );
        }

        if ( is_array( $class ) && count( $class ) > 0 ) {
            $class = array_map( 'sanitize_html_class' , $class );
            return implode( ' ', $class);
        } else {
            return sanitize_html_class( $class, $fallback );
        }
    }

    /**
	 * Get YouTube / Vimeo video ID
     *
     * @since 1.0
	 */
    public static function get_video_embed_id( $url ) {

    	$id = '';

        if ( strpos( $url, 'youtube' ) ) {
            preg_match( '/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches );
            $id = $matches[1];
        }

        if ( strpos( $url, 'vimeo' ) ) {
            preg_match( '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', $url, $matches );
            $id = $matches[2];
        }

        if ( ! empty( $id )  ) {
        	return $id;
        } else {
        	return false;
        }

    }

}
