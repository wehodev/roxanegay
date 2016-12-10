<?php
/**
 * Class for handling JavaScript / Stylesheets in the theme
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasThemeEnqueue {

	/**
	 * Constructor of the class
	 *
	 * @since 1.0
	 */
	public function __construct() {

		// Registers JavaScript for the theme
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_scripts' ) );

		// Registers stylesheets for the theme
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ), 20 );

		// Registers JavaScript for the admin
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 20 );

		// Registers stylesheets for the admin
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ), 99 );
	}

	/**
	 * Registers JavaScript for the theme
	 *
	 * @since 1.0
	 */
	public function theme_enqueue_scripts() {

		// deregister script
		wp_deregister_script( 'waypoints' );
		wp_deregister_script( 'isotope' );

		// html5shiv
		wp_register_script( 'html5shiv', '//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.2', false );
		wp_enqueue_script( 'html5shiv' );

		// modernizr
		wp_register_script( 'modernizr', ADAMAS_THEME_ASSETS . '/js/vendors/modernizr.min.js', array( 'jquery' ), ADAMAS_THEME_VERSION, false );
		wp_enqueue_script( 'modernizr' );

		// YouTube API
		wp_register_script( 'youtube-api', '//www.youtube.com/iframe_api', array(), ADAMAS_THEME_VERSION, true );

		if ( ! adamas_get_data( 'minify_js', '', true ) ) {

			// easing
			wp_register_script( 'easing', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.easing.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'easing' );

			// imagesloaded
			wp_register_script( 'imagesloaded', ADAMAS_THEME_ASSETS . '/js/vendors/imagesloaded.pkgd.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'imagesloaded' );

			// waypoints
			wp_register_script( 'waypoints', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.waypoints.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'waypoints' );

			// perfectScrollbar
			wp_register_script( 'perfectScrollbar', ADAMAS_THEME_ASSETS . '/js/vendors/perfect-scrollbar.jquery.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'perfectScrollbar' );

			// wow
			wp_register_script( 'wow', ADAMAS_THEME_ASSETS . '/js/vendors/wow.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'wow' );

			// isotope
			wp_register_script( 'isotope', ADAMAS_THEME_ASSETS . '/js/vendors/isotope.pkgd.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'isotope' );

			// packery-mode
			wp_register_script( 'packery-mode', ADAMAS_THEME_ASSETS . '/js/vendors/packery-mode.pkgd.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'packery-mode' );

			// owl-carousel
			wp_register_script( 'owl-carousel', ADAMAS_THEME_ASSETS . '/js/vendors/owl.carousel.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'owl-carousel' );

			// magnific-popup
			wp_register_script( 'magnific-popup', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.magnific-popup.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'magnific-popup' );

			// swiper
			wp_register_script( 'swiper', ADAMAS_THEME_ASSETS . '/js/vendors/swiper.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'swiper' );

			// skrollr
			wp_register_script( 'skrollr', ADAMAS_THEME_ASSETS . '/js/vendors/skrollr.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'skrollr' );

			// easypiechart
			wp_register_script( 'easypiechart', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.easypiechart.js', array( 'jquery' ), '2.1.6', true );
			wp_enqueue_script( 'easypiechart' );

			// counterup
			wp_register_script( 'counterup', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.counterup.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'counterup' );

			// matchHeight
			wp_register_script( 'matchHeight', ADAMAS_THEME_ASSETS . '/js/vendors/jquery.matchHeight.js', array( 'jquery' ), '0.6.2', true );
			wp_enqueue_script( 'matchHeight' );

			// prismjs
			wp_register_script( 'prismjs', ADAMAS_THEME_ASSETS . '/js/vendors/prismjs.min.js', 'jquery', ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'prismjs' );

			// Custom
			wp_register_script( 'adamas-custom', ADAMAS_THEME_ASSETS . '/js/custom.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'adamas-custom' );

		} else {

			// Vendors
			wp_register_script( 'adamas-vendors', ADAMAS_THEME_ASSETS . '/js/vendors.min.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'adamas-vendors' );

			// Custom
			wp_register_script( 'adamas-custom', ADAMAS_THEME_ASSETS . '/js/custom.min.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
			wp_enqueue_script( 'adamas-custom' );

		}

		// Enqueue comments script
		if ( is_single() || ( is_page() && comments_open() ) ) {
			wp_enqueue_script( 'comment-reply' );
		} else {
			wp_dequeue_script( 'comment-reply' );
		}

		// Loacalize script
		wp_localize_script( 'adamas-custom', 'adamas', array(
			'nonce'     => wp_create_nonce( 'adamas_nonce' ),
			'ajaxurl'   => admin_url( 'admin-ajax.php' ),
			'theme_uri' => ADAMAS_THEME_URI,
		) );

	}

	/**
	 * Registers stylesheets for the theme
	 *
	 * @since 1.0
	 */
	public function theme_enqueue_styles() {

		// Deregister plugin styles
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'yith-wcwl-font-awesome' );

		// Register stylesheets
		if ( ! adamas_get_data( 'minify_css', '', true ) ) {

			// Bootstrap
			wp_register_style( 'bootstrap', ADAMAS_THEME_ASSETS . '/css/vendors/bootstrap.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'bootstrap' );

			// Font Awesome
			wp_register_style( 'font-awesome', ADAMAS_THEME_ASSETS . '/css/vendors/font-awesome.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'font-awesome' );

			// et-line
			wp_register_style( 'et-line', ADAMAS_THEME_ASSETS . '/css/vendors/et-line.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'et-line' );

			// Animate
			wp_register_style( 'animate', ADAMAS_THEME_ASSETS . '/css/vendors/animate.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'animate' );

			// owl carousel
			wp_register_style( 'owl-carousel', ADAMAS_THEME_ASSETS . '/css/vendors/owl.carousel.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'owl-carousel' );

			// Swiper
			wp_register_style( 'swiper', ADAMAS_THEME_ASSETS . '/css/vendors/swiper.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'swiper' );

			// magnific-popup
			wp_register_style( 'magnific-popup', ADAMAS_THEME_ASSETS . '/css/vendors/magnific-popup.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'magnific-popup' );

			// Main
			wp_register_style( 'adamas-main', ADAMAS_THEME_ASSETS . '/css/main.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'adamas-main' );

		} else {

			// Vendors
			wp_register_style( 'adamas-vendors', ADAMAS_THEME_ASSETS . '/css/vendors.min.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'adamas-vendors' );

			// Style
			wp_register_style( 'adamas-main', ADAMAS_THEME_ASSETS . '/css/main.min.css', false, ADAMAS_THEME_VERSION, 'all' );
			wp_enqueue_style( 'adamas-main' );

		}

	}

	/**
	 * Registers JavaScript for the admin
	 *
	 * @since 1.0
	 */
	public function admin_enqueue_scripts() {

		// Register scripts
		wp_register_script( 'adamas-framework', ADAMAS_FRAMEWORK_ASSETS . '/js/framework.js', 'jquery', ADAMAS_THEME_VERSION, true );

		// Enqueue scripts
		wp_enqueue_script( 'adamas-framework' );

		// Localize scripts
		wp_localize_script( 'adamas-framework', 'adamas', array(
			'post_id'        => adamas_get_page_id(),
			'nonce'          => wp_create_nonce( 'wpus-gallery-ajax' ),
			'video_title'    => esc_html__( 'Please select a video file', 'adamas' ),
			'audio_title'    => esc_html__( 'Please select a audio file', 'adamas' ),
			'image_title'    => esc_html__( 'Please select a image file', 'adamas' ),
			'cancel'         => esc_html__( 'Cancel', 'adamas' ),
			'saving'         => esc_html__( 'Saving...', 'adamas' ),
			'create_gallery' => esc_html__( 'Create gallery', 'adamas' ),
			'edit_gallery'   => esc_html__( 'Edit gallery', 'adamas' ),
			'save_gallery'   => esc_html__( 'Save gallery', 'adamas' ),
		) );

	}

	/**
	 * Registers stylesheets for the admin
	 *
	 * @since 1.0
	 */
	public function admin_enqueue_styles() {

		// Register Styles
		wp_register_style( 'et-line', ADAMAS_THEME_ASSETS . '/css/vendors/et-line.css', false, ADAMAS_THEME_VERSION, 'all' );
		wp_register_style( 'adamas-vc-extend', ADAMAS_FRAMEWORK_ASSETS . '/css/vc-extend.css', false, ADAMAS_THEME_VERSION, 'all' );
		wp_register_style( 'adamas-framework', ADAMAS_FRAMEWORK_ASSETS . '/css/framework.css', false, ADAMAS_THEME_VERSION, 'all' );

		// Enqueue style
		wp_enqueue_style( 'et-line' );
		wp_enqueue_style( 'adamas-vc-extend' );
		wp_enqueue_style( 'adamas-framework' );

	}

}

$adamas_theme_enqueue = new AdamasThemeEnqueue;
