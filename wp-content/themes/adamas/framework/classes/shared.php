<?php
/**
 * Adamas Shared Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasShared {

	/**
	 * Animation type
     *
     * @since 1.0
	 */
    public static function animation( $prefix = 'wow ' ) {
    	return apply_filters( 'adamas_shared_animation', array(
			$prefix . 'fadeIn'            => 'fadeIn',
			$prefix . 'fadeInDown'        => 'fadeInDown',
			$prefix . 'fadeInDownBig'     => 'fadeInDownBig',
			$prefix . 'fadeInLeft'        => 'fadeInLeft',
			$prefix . 'fadeInLeftBig'     => 'fadeInLeftBig',
			$prefix . 'fadeInRight'       => 'fadeInRight',
			$prefix . 'fadeInRightBig'    => 'fadeInRightBig',
			$prefix . 'fadeInUp'          => 'fadeInUp',
			$prefix . 'fadeInUpBig'       => 'fadeInUpBig',
			$prefix . 'bounceIn'          => 'bounceIn',
			$prefix . 'bounceInDown'      => 'bounceInDown',
			$prefix . 'bounceInLeft'      => 'bounceInLeft',
			$prefix . 'bounceInRight'     => 'bounceInRight',
			$prefix . 'bounceInUp'        => 'bounceInUp',
			$prefix . 'flip'              => 'flip',
			$prefix . 'flipInX'           => 'flipInX',
			$prefix . 'flipInY'           => 'flipInY',
			$prefix . 'lightSpeedIn'      => 'lightSpeedIn',
			$prefix . 'rotateIn'          => 'rotateIn',
			$prefix . 'rotateInDownLeft'  => 'rotateInDownLeft',
			$prefix . 'rotateInDownRight' => 'rotateInDownRight',
			$prefix . 'rotateInUpLeft'    => 'rotateInUpLeft',
			$prefix . 'rotateInUpRight'   => 'rotateInUpRight',
			$prefix . 'zoomIn'            => 'zoomIn',
			$prefix . 'zoomInDown'        => 'zoomInDown',
			$prefix . 'zoomInLeft'        => 'zoomInLeft',
			$prefix . 'zoomInRight'       => 'zoomInRight',
			$prefix . 'zoomInUp'          => 'zoomInUp',
			$prefix . 'rollIn'            => 'rollIn',
		) );
    }

    /**
     * Image size
     *
     * @since 1.0
     */
    public static function image_size() {
    	return apply_filters( 'adamas_shared_image_size', array(
			'adamas-image-square'           => esc_html__( 'Square (600X600)', 'adamas' ),
			'adamas-image-square-large'     => esc_html__( 'Square Large (1200X1200)', 'adamas' ),
			'adamas-image-horizontal'       => esc_html__( 'Landscape (800X600)', 'adamas' ),
			'adamas-image-horizontal-wide'  => esc_html__( 'Landscape Wide (800X500)', 'adamas' ),
			'adamas-image-horizontal-large' => esc_html__( 'Landscape Large (1170X660)', 'adamas' ),
			'adamas-image-vertical'         => esc_html__( 'Portrait (600X800)', 'adamas' ),
			'adamas-image-vertical-large'   => esc_html__( 'Portrait Large (600X1120)', 'adamas' ),
			'thumbnail'                     => esc_html_x( 'Thumbnail', 'Image Size', 'adamas' ),
			'large'                         => esc_html_x( 'Large', 'Image Size', 'adamas' ),
			'full'                          => esc_html_x( 'Full', 'Image Size', 'adamas' ),
			'custom'                        => esc_html_x( 'Custom Size', 'Image Size', 'adamas' ),
		) );
    }

    /**
     * Columns
     *
     * @since 1.0
     */
    public static function columns() {
    	return apply_filters( 'adamas_shared_columns', array(
			'1'  => '1',
		    '2'  => '2',
		    '3'  => '3',
		    '4'  => '4',
		    '5'  => '5',
		    '6'  => '6',
		    '7'  => '7',
		    '8'  => '8',
		    '9'  => '9',
		    '10' => '10',
		) );
    }

    /**
     * Margin
     *
     * @since 1.0
     */
    public static function margin() {
    	return apply_filters( 'adamas_shared_margin', array(
    		''     => esc_html__( 'Default', 'adamas' ),
		    '0px'  => '0px',
		    '1px'  => '1px',
		    '2px'  => '2px',
		    '3px'  => '3px',
		    '4px'  => '4px',
		    '5px'  => '5px',
		    '10px' => '10px',
		    '15px' => '15px',
		    '20px' => '20px',
		    '25px' => '25px',
		    '30px' => '30px',
		    '35px' => '35px',
		    '40px' => '40px',
		    '45px' => '45px',
		    '50px' => '50px',
		    '55px' => '55px',
		    '60px' => '60px',
		) );
    }

    /**
     * Border radius
     *
     * @since 1.0
     */
    public static function border_radius() {
    	return apply_filters( 'adamas_shared_border_radius', array(
			''     => esc_html__( 'Default', 'adamas' ),
			'0px'  => '0px',
			'1px'  => '1px',
			'2px'  => '2px',
			'3px'  => '3px',
			'4px'  => '4px',
			'5px'  => '5px',
			'10px' => '10px',
			'15px' => '15px',
			'20px' => '20px',
			'25px' => '25px',
			'30px' => '30px',
			'35px' => '35px',
			'50%'  => '50%',
			'100%' => '100%',
		) );
    }

    /**
     * Border style
     *
     * @since 1.0
     */
    public static function border_style() {
    	return apply_filters( 'adamas_shared_border_style', array(
			''       => esc_html__( 'Default', 'adamas' ),
			'none'   => esc_html__( 'None', 'adamas' ),
			'solid'  => esc_html__( 'Solid', 'adamas' ),
			'dotted' => esc_html__( 'Dotted', 'adamas' ),
			'dashed' => esc_html__( 'Dashed', 'adamas' ),
			'double' => esc_html__( 'Double', 'adamas' ),
		) );
    }

    /**
     * Border width
     *
     * @since 1.0
     */
    public static function border_width() {
    	return apply_filters( 'adamas_shared_border_width', array(
			''     => esc_html__( 'Default', 'adamas' ),
		    '1px'  => '1px',
		    '2px'  => '2px',
		    '3px'  => '3px',
		    '4px'  => '4px',
		    '5px'  => '5px',
		) );
    }

    /**
     * Alignments
     *
     * @since 1.0
     */
    public static function alignment( $sufix = false, $prefix = 'text'  ) {

		$sufix  = $sufix  ? '-' . $sufix  : '';
		$prefix = $prefix ? $prefix . '-' : '';

    	return apply_filters( 'adamas_shared_alignment', array(
			''                          => esc_html__( 'Default', 'adamas' ),
			$prefix . 'left' . $sufix   => esc_html__( 'Left', 'adamas' ),
			$prefix . 'right' . $sufix  => esc_html__( 'Right', 'adamas' ),
			$prefix . 'center' . $sufix => esc_html__( 'Center', 'adamas' ),
		) );
    }

    /**
     * Tag
     *
     * @since 1.0
     */
    public static function tag() {
    	return apply_filters( 'adamas_shared_tag', array(
			'h2'   => 'h2',
			'h3'   => 'h3',
			'h4'   => 'h4',
			'h5'   => 'h5',
			'h6'   => 'h6',
			'p'    => 'p',
			'div'  => 'div',
			'span' => 'span',
		) );
    }

	/**
	 * Image hovers
     *
     * @since 1.0
	 */
    public static function image_hovers() {
    	return apply_filters( 'adamas_shared_image_hovers', array(
			''       => esc_html__( 'None', 'adamas' ),
			'grow'   => esc_html_x( 'Grow', 'Image Hover', 'adamas' ),
			'shrink' => esc_html_x( 'Shrink', 'Image Hover', 'adamas' ),
		) );
    }

    /**
     * Autoplay
     *
     * @since 1.0
     */
    public static function autoplay() {
    	return apply_filters( 'adamas_shared_autoplay', array(
			''      => esc_html__( 'No', 'adamas' ),
			'1000'  => esc_html__( '1 Second', 'adamas' ),
			'2000'  => esc_html__( '2 Seconds', 'adamas' ),
			'3000'  => esc_html__( '3 Seconds', 'adamas' ),
			'4000'  => esc_html__( '4 Seconds', 'adamas' ),
			'5000'  => esc_html__( '5 Seconds', 'adamas' ),
			'6000'  => esc_html__( '6 Seconds', 'adamas' ),
			'7000'  => esc_html__( '7 Seconds', 'adamas' ),
			'8000'  => esc_html__( '8 Seconds', 'adamas' ),
			'9000'  => esc_html__( '9 Seconds', 'adamas' ),
			'10000' => esc_html__( '10 Seconds', 'adamas' ),
			'11000' => esc_html__( '11 Seconds', 'adamas' ),
			'12000' => esc_html__( '12 Seconds', 'adamas' ),
			'13000' => esc_html__( '13 Seconds', 'adamas' ),
			'14000' => esc_html__( '14 Seconds', 'adamas' ),
			'15000' => esc_html__( '15 Seconds', 'adamas' ),
		) );
    }

    /**
     * Appearance
     *
     * @since 1.0
     */
    public static function appearance() {
    	return apply_filters( 'adamas_shared_appearance', array(
			''                 => esc_html__( 'Always Hide', 'adamas' ),
			'wpus-hover-show'  => esc_html__( 'Show on Mouse Hover', 'adamas' ),
			'wpus-hover-hide'  => esc_html__( 'Hide on Mouse Hover', 'adamas' ),
			'wpus-always-show' => esc_html__( 'Always Show', 'adamas' ),
		) );
    }

    /**
     * Boolean
     *
     * @since 1.0
     */
    public static function boolean() {
    	return apply_filters( 'adamas_shared_boolean', array(
			'false' => esc_html__( 'No', 'adamas' ),
			'true'  => esc_html__( 'Yes', 'adamas' ),
		) );
    }

    /**
     * Orderby
     *
     * @since 1.0
     */
    public static function orderby() {
    	return apply_filters( 'adamas_shared_orderby', array(
			'none'     => esc_html__( 'None', 'adamas' ),
			'ID'       => esc_html__( 'ID', 'adamas' ),
			'author'   => esc_html__( 'Author', 'adamas' ),
			'title'    => esc_html__( 'Title', 'adamas' ),
			'name'     => esc_html__( 'Name', 'adamas' ),
			'date'     => esc_html__( 'Date', 'adamas' ),
			'modified' => esc_html__( 'Modified', 'adamas' ),
			'rand'     => esc_html__( 'Rand', 'adamas' ),
		) );
    }

    /**
     * Order
     *
     * @since 1.0
     */
    public static function order() {
    	return apply_filters( 'adamas_shared_order', array(
			'ASC'  => esc_html__( 'Ascending', 'adamas' ),
			'DESC' => esc_html__( 'Descending', 'adamas' ),
		) );
    }

    /**
     * Position
     *
     * @since 1.0
     */
    public static function position() {
    	return apply_filters( 'adamas_shared_position', array(
			'wpus-position-lt' => esc_html__( 'Left Top', 'adamas' ),
		    'wpus-position-lc' => esc_html__( 'Left center', 'adamas' ),
		    'wpus-position-lb' => esc_html__( 'Left Bottom', 'adamas' ),
		    'wpus-position-ct' => esc_html__( 'Center Top', 'adamas' ),
		    'wpus-position-cc' => esc_html__( 'Center Center', 'adamas' ),
		    'wpus-position-cb' => esc_html__( 'Center Bottom', 'adamas' ),
		    'wpus-position-rt' => esc_html__( 'Right Top', 'adamas' ),
		    'wpus-position-rc' => esc_html__( 'Right center', 'adamas' ),
		    'wpus-position-rb' => esc_html__( 'Right Bottom', 'adamas' ),
		) );
    }

    /**
     * Opacity
     *
     * @since 1.0
     */
    public static function opacity() {
    	return apply_filters( 'adamas_shared_opacity', array(
			''    => esc_html__( 'Default', 'adamas' ),
			'1'   => '1',
			'0.9' => '0.9',
			'0.8' => '0.8',
			'0.7' => '0.7',
			'0.6' => '0.6',
			'0.5' => '0.5',
			'0.4' => '0.4',
			'0.3' => '0.3',
			'0.2' => '0.2',
			'0.1' => '0.1',
		) );
    }

    /**
     * Masonry style
     *
     * @since 1.0
     */
    public static function masonry_style() {
    	return apply_filters( 'adamas_shared_masonry_style', array(
			'style-1' => esc_html__( 'Style 1', 'adamas' ),
			'style-2' => esc_html__( 'Style 2', 'adamas' ),
			'style-3' => esc_html__( 'Style 3', 'adamas' ),
			'style-4' => esc_html__( 'Style 4', 'adamas' ),
			'style-5' => esc_html__( 'Style 5', 'adamas' ),
			'style-6' => esc_html__( 'Style 6', 'adamas' ),
		) );
    }

    /**
	 * Social media
     *
     * @since 1.0
	 */
	public static function social() {
	    return apply_filters( 'adamas_shared_social', array(
	        'facebook'     => 'Facebook',
	        'twitter'      => 'Twitter',
	        'google-plus'  => 'GooglePlus',
	        'linkedin'     => 'Linkedin',
	        'vk'           => 'VK',
	        'instagram'    => 'Instagram',
	        'pinterest-p'  => 'Pinterest',
	        'dribbble'     => 'Dribbble',
	        '500px'        => '500px',
	        'flickr'       => 'Flickr',
	        'deviantart'   => 'Deviantart',
	        'behance'      => 'Behance',
	        'youtube-play' => 'Youtube',
	        'vimeo'        => 'Vimeo',
	        'soundcloud'   => 'Soundcloud',
	        'github-alt'   => 'GitHub',
	        'foursquare'   => 'Foursquare',
	        'tumblr'       => 'Tumblr',
	        'lastfm'       => 'Lastfm',
	        'spotify'      => 'Spotify',
	        'dropbox'      => 'Dropbox',
	        'stumbleupon'  => 'Stumbleupon',
	        'yelp'         => 'Yelp',
	    ) );
	}

	/**
	 * Link target
     *
     * @since 1.0
	 */
	public static function target() {
	    return array(
			'_self'  => esc_html__( 'Same Window', 'adamas' ),
			'_blank' => esc_html__( 'New Window', 'adamas' ),
	    );
	}

	/**
	 * Sidebars
     *
     * @since 1.0
	 */
	public static function sidebars() {

		global $wp_registered_sidebars;
	    $sedebars = array();

		foreach( $wp_registered_sidebars as $sidebar ) {
		    $sedebars[$sidebar['id']] = $sidebar['name'];
		}

	    return $sedebars;

	}

	/**
	 * Theme Sliders
     *
     * @since 1.0
	 */
	public static function sliders() {

	    $posts = get_posts( array(
			'post_type'      => 'sliders',
			'posts_per_page' => '-1',
	    ) );

	    $sliders = array();

	    if ( $posts ) {
	    	$sliders[] = esc_html__( 'Select Adamas Slider...', 'adamas' );
	        foreach ( $posts as $k ) {
	            $sliders[$k->ID] = $k->post_title;
	        }
	    } else {
	        $sliders[] = esc_html__( 'No sliders found', 'adamas' );
	    }

	    return $sliders;

	}

	/**
	 * Revolution Sliders
     *
     * @since 1.0
	 */
	public static function rev_sliders() {

		$revsliders = array();

		if ( class_exists( 'RevSlider' ) ) {
		    $revslider  = new RevSlider();
		    $revslider  = $revslider->getArrSliders();
		    if ( is_array( $revslider ) && ! empty( $revslider ) ) {
		        $revsliders[] = esc_html__( 'Select Revolution Slider...', 'adamas' );
		        foreach( $revslider as $slider ){
		            $revsliders[$slider->getAlias()] = $slider->getTitle();
		        }
		    }
		} else {
		    $revsliders[] = esc_html__( 'No sliders found', 'adamas' );
		}

		return $revsliders;

	}

	/**
     * Background Repeat
     *
     * @since 1.0
     */
    public static function background_repeat() {
    	return apply_filters( 'adamas_shared_background_repeat', array(
	        'no-repeat' => esc_html__( 'No Repeat', 'adamas' ),
	        'repeat'    => esc_html__( 'Repeat All', 'adamas' ),
	        'repeat-x'  => esc_html__( 'Repeat Horizontally', 'adamas' ),
	        'repeat-y'  => esc_html__( 'Repeat Vertically', 'adamas' ),
	        'inherit'   => esc_html__( 'Inherit', 'adamas' ),
		) );
    }

    /**
     * Background Size
     *
     * @since 1.0
     */
    public static function background_size() {
    	return apply_filters( 'adamas_shared_background_size', array(
	        'inherit' => esc_html__( 'Inherit', 'adamas' ),
	        'cover'   => esc_html__( 'Cover', 'adamas' ),
	        'contain' => esc_html__( 'Contain', 'adamas' ),
		) );
    }

    /**
     * Background Attachment
     *
     * @since 1.0
     */
    public static function background_attachment() {
    	return apply_filters( 'adamas_shared_background_attachment', array(
	        'fixed'   => esc_html__( 'Fixed', 'adamas' ),
	        'scroll'  => esc_html__( 'Scroll', 'adamas' ),
	        'inherit' => esc_html__( 'Inherit', 'adamas' ),
		) );
    }

    /**
     * Background Position
     *
     * @since 1.0
     */
    public static function background_position() {
    	return apply_filters( 'adamas_shared_background_position', array(
			'left top'      => esc_html__( 'Left Top', 'adamas' ),
			'left center'   => esc_html__( 'Left center', 'adamas' ),
			'left bottom'   => esc_html__( 'Left Bottom', 'adamas' ),
			'center top'    => esc_html__( 'Center Top', 'adamas' ),
			'center center' => esc_html__( 'Center Center', 'adamas' ),
			'center bottom' => esc_html__( 'Center Bottom', 'adamas' ),
			'right top'     => esc_html__( 'Right Top', 'adamas' ),
			'right center'  => esc_html__( 'Right center', 'adamas' ),
			'right bottom'  => esc_html__( 'Right Bottom', 'adamas' ),
		) );
    }

    /**
     * Background animation
     *
     * @since 1.0
     */
    public static function background_animation() {
    	return apply_filters( 'adamas_shared_background_animation', array(
			'bg-animate-up'    => esc_html__( 'Animate Up', 'adamas' ),
			'bg-animate-right' => esc_html__( 'Animate Right', 'adamas' ),
			'bg-animate-down'  => esc_html__( 'Animate Down', 'adamas' ),
			'bg-animate-left'  => esc_html__( 'Animate Left', 'adamas' ),
		) );
    }

    /**
     * Parallax
     *
     * @since 1.0
     */
    public static function parallax() {
    	return apply_filters( 'adamas_shared_parallax', array(
			'parallax-up'    => esc_html__( 'Paralax Up', 'adamas' ),
			'parallax-right' => esc_html__( 'Paralax Right', 'adamas' ),
			'parallax-down'  => esc_html__( 'Paralax Down', 'adamas' ),
			'parallax-left'  => esc_html__( 'Paralax Left', 'adamas' ),
		) );
    }

	/**
     * Font Weight
     *
     * @since 1.0
     */
    public static function fonts_weight() {
    	return apply_filters( 'adamas_shared_font_weight', array(
    		'100' => esc_html__( 'Ultra Light 100', 'adamas' ),
	        '200' => esc_html__( 'Light 200', 'adamas' ),
	        '300' => esc_html__( 'Book 300', 'adamas' ),
	        '400' => esc_html__( 'Normal 400', 'adamas' ),
	        '500' => esc_html__( 'Medium 500', 'adamas' ),
	        '600' => esc_html__( 'Semi Bold 600', 'adamas' ),
	        '700' => esc_html__( 'Bold 700', 'adamas' ),
	        '800' => esc_html__( 'Extra Bold 800', 'adamas' ),
	        '900' => esc_html__( 'Ultra Bold 900', 'adamas' ),
		) );
    }

    /**
     * Font Style
     *
     * @since 1.0
     */
    public static function fonts_style() {
    	return apply_filters( 'adamas_shared_font_style', array(
    		'normal' => esc_html__( 'Normal', 'adamas' ),
	        'italic' => esc_html__( 'Italic', 'adamas' ),
		) );
    }

	/**
	 * Array of Google Font options
     *
     * @since 1.0
	 */
	public static function fonts() {

	    $array     = array( '' => esc_html__( 'Default', 'adamas' ) );
	    $std_fonts = self::standard_fonts();
	    $array     = array_merge( $array, $std_fonts );

	    if ( $google_fonts = self::google_fonts() ) {
	        $array = array_merge( $array, $google_fonts );
	    }

	    return $array;
	}

	/**
	 * List of standard fonts
     *
     * @since 1.0
	 */
	public static function standard_fonts() {
	    return apply_filters( 'adamas_shared_standard_fonts', array(
	        'Arial, Helvetica, sans-serif',
	        'Arial Black, Gadget, sans-serif',
	        'Bookman Old Style, serif',
	        'Comic Sans MS, cursive',
	        'Courier, monospace',
	        'Georgia, serif',
	        'Garamond, serif',
	        'Impact, Charcoal, sans-serif',
	        'Lucida Console, Monaco, monospace',
	        'Lucida Sans Unicode, Lucida Grande, sans-serif',
	        'MS Sans Serif, Geneva, sans-serif',
	        'MS Serif, New York, sans-serif',
	        'Palatino Linotype, Book Antiqua, Palatino, serif',
	        'Tahoma, Geneva, sans-serif',
	        'Times New Roman, Times, serif',
	        'Trebuchet MS, Helvetica, sans-serif',
	        'Verdana, Geneva, sans-serif',
	        'Paratina Linotype',
	        'Trebuchet MS',
	    ) );
	}

	/**
	 * List of All GooGle fonts
     *
     * @since 1.0
	 */
	public static function google_fonts() {
	    return apply_filters( 'adamas_shared_google_fonts', array('ABeeZee', 'Abel', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Alegreya Sans SC', 'Alex Brush', 'Alfa Slab One', 'Alice', 'Alike', 'Alike Angular', 'Allan', 'Allerta', 'Allerta Stencil', 'Allura', 'Almendra', 'Almendra Display', 'Almendra SC', 'Amarante', 'Amaranth', 'Amatic SC', 'Amethysta', 'Anaheim', 'Andada', 'Andika', 'Angkor', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Antic Didone', 'Antic Slab', 'Anton', 'Arapey', 'Arbutus', 'Arbutus Slab', 'Architects Daughter', 'Archivo Black', 'Archivo Narrow', 'Arimo', 'Arizonia', 'Armata', 'Artifika', 'Arvo', 'Asap', 'Asset', 'Astloch', 'Asul', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Averia Sans Libre', 'Averia Serif Libre', 'Bad Script', 'Balthazar', 'Bangers', 'Basic', 'Battambang', 'Baumans', 'Bayon', 'Belgrano', 'Belleza', 'BenchNine', 'Bentham', 'Berkshire Swash', 'Bevan', 'Bigelow Rules', 'Bigshot One', 'Bilbo', 'Bilbo Swash Caps', 'Bitter', 'Black Ops One', 'Bokor', 'Bonbon', 'Boogaloo', 'Bowlby One', 'Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buda', 'Buenard', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Calligraffitti', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Caudex', 'Cedarville Cursive', 'Ceviche One', 'Changa One', 'Chango', 'Chau Philomene One', 'Chela One', 'Chelsea Market', 'Chenla', 'Cherry Cream Soda', 'Cherry Swash', 'Chewy', 'Chicle', 'Chivo', 'Cinzel', 'Cinzel Decorative', 'Clicker Script', 'Coda', 'Coda Caption', 'Codystar', 'Combo', 'Comfortaa', 'Coming Soon', 'Concert One', 'Condiment', 'Content', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Courgette', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster', 'Crete Round', 'Crimson Text', 'Croissant One', 'Crushed', 'Cuprum', 'Cutive', 'Cutive Mono', 'Damion', 'Dancing Script', 'Dangrek', 'Dawning of a New Day', 'Days One', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Domine', 'Donegal One', 'Doppio One', 'Dorsa', 'Dosis', 'Dr Sugiyama', 'Droid Sans', 'Droid Sans Mono', 'Droid Serif', 'Duru Sans', 'Dynalight', 'EB Garamond', 'Eagle Lake', 'Eater', 'Economica', 'Ek Mukta', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Engagement', 'Englebert', 'Enriqueta', 'Erica One', 'Esteban', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Fascinate', 'Fascinate Inline', 'Faster One', 'Fasthand', 'Fauna One', 'Federant', 'Federo', 'Felipa', 'Fenix', 'Finger Paint', 'Fira Mono', 'Fira Sans', 'Fjalla One', 'Fjord One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Freckle Face', 'Fredericka the Great', 'Fredoka One', 'Freehand', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz One', 'GFS Didot', 'GFS Neohellenic', 'Gabriela', 'Gafata', 'Galdeano', 'Galindo', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gorditas', 'Goudy Bookletter 1911', 'Graduate', 'Grand Hotel', 'Gravitas One', 'Great Vibes', 'Griffy', 'Gruppo', 'Gudea', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Headland One', 'Henny Penny', 'Herr Von Muellerhoff', 'Hind', 'Holtwood One SC', 'Homemade Apple', 'Homenaje', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'IM Fell Double Pica SC', 'IM Fell English', 'IM Fell English SC', 'IM Fell French Canon', 'IM Fell French Canon SC', 'IM Fell Great Primer', 'IM Fell Great Primer SC', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie Flower', 'Inika', 'Irish Grover', 'Istok Web', 'Italiana', 'Italianno', 'Jacques Francois', 'Jacques Francois Shadow', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Josefin Sans', 'Josefin Slab', 'Joti One', 'Judson', 'Julee', 'Julius Sans One', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kalam', 'Kameron', 'Kantumruy', 'Karla', 'Karma', 'Kaushan Script', 'Kavoon', 'Kdam Thmor', 'Keania One', 'Kelly Slab', 'Kenia', 'Khand', 'Khmer', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'La Belle Aurore', 'Laila', 'Lancelot', 'Lato', 'League Script', 'Leckerli One', 'Ledger', 'Lekton', 'Lemon', 'Libre Baskerville', 'Life Savers', 'Lilita One', 'Lily Script One', 'Limelight', 'Linden Hill', 'Lobster', 'Lobster Two', 'Londrina Outline', 'Londrina Shadow', 'Londrina Sketch', 'Londrina Solid', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Magra', 'Maiden Orange', 'Mako', 'Marcellus', 'Marcellus SC', 'Marck Script', 'Margarine', 'Marko One', 'Marmelad', 'Marvel', 'Mate', 'Mate SC', 'Maven Pro', 'McLaren', 'Meddon', 'MedievalSharp', 'Medula One', 'Megrim', 'Meie Script', 'Merienda', 'Merienda One', 'Merriweather', 'Merriweather Sans', 'Metal', 'Metal Mania', 'Metamorphous', 'Metrophobic', 'Michroma', 'Milonga', 'Miltonian', 'Miltonian Tattoo', 'Miniver', 'Miss Fajardose', 'Modern Antiqua', 'Molengo', 'Molle', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Montserrat Alternates', 'Montserrat Subrayada', 'Moul', 'Moulpali', 'Mountains of Christmas', 'Mouse Memoirs', 'Mr Bedfort', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Saint Delafield', 'Mrs Sheppards', 'Muli', 'Mystery Quest', 'Neucha', 'Neuton', 'New Rocker', 'News Cycle', 'Niconne', 'Nixie One', 'Nobile', 'Nokora', 'Norican', 'Nosifer', 'Nothing You Could Do', 'Noticia Text', 'Noto Sans', 'Noto Serif', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Open Sans Condensed', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Patua One', 'Paytone One', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Port Lligat Sans', 'Port Lligat Slab', 'Prata', 'Preahvihear', 'Press Start 2P', 'Princess Sofia', 'Prociono', 'Prosto One', 'Puritan', 'Purple Purse', 'Quando', 'Quantico', 'Quattrocento', 'Quattrocento Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing Sans One', 'Radley', 'Rajdhani', 'Raleway', 'Raleway Dots', 'Rambla', 'Rammetto One', 'Ranchers', 'Rancho', 'Rationale', 'Redressed', 'Reenie Beanie', 'Revalia', 'Ribeye', 'Ribeye Marrow', 'Righteous', 'Risque', 'Roboto', 'Roboto Condensed', 'Roboto Slab', 'Roboto Mono', 'Rochester', 'Rock Salt', 'Rokkitt', 'Romanesco', 'Ropa Sans', 'Rosario', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik Mono One', 'Rubik One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sail', 'Salsa', 'Sanchez', 'Sancreek', 'Sansita One', 'Sarina', 'Sarpanch', 'Satisfy', 'Scada', 'Schoolbell', 'Seaweed Script', 'Sevillana', 'Seymour One', 'Shadows Into Light', 'Shadows Into Light Two', 'Shanti', 'Share', 'Share Tech', 'Share Tech Mono', 'Shojumaru', 'Short Stack', 'Siemreap', 'Sigmar One', 'Signika', 'Signika Negative', 'Simonetta', 'Sintony', 'Sirin Stencil', 'Six Caps', 'Skranji', 'Slabo 13px', 'Slabo 27px', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Snowburst One', 'Sofadi One', 'Sofia', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Special Elite', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Stalemate', 'Stalinist One', 'Stardos Stencil', 'Stint Ultra Condensed', 'Stint Ultra Expanded', 'Stoke', 'Strait', 'Sue Ellen Francisco', 'Sunshiney', 'Supermercado One', 'Suwannaphum', 'Swanky and Moo Moo', 'Syncopate', 'Tangerine', 'Taprom', 'Tauri', 'Teko', 'Telex', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturCook', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Yanone Kaffeesatz', 'Yellowtail', 'Yeseva One', 'Yesteryear', 'Zeyada') );
	}

}
