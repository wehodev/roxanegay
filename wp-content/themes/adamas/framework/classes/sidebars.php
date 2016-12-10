<?php
/**
 * Unlimited Sidebars Class
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasUnlimitedSidebars {

	var $sidebars = array();
	var $stored   = '';
    
	/**
	 * Constructor of the class
	 */
	function __construct() {

		$this->stored = 'adamas_sidebars';
	
		add_action( 'load-widgets.php', array( &$this, 'enqueue_scripts' ), 5 );
		add_action( 'widgets_init', array( &$this, 'register_custom_sidebars' ), 1000 );
		add_action( 'wp_ajax_adamas_ajax_delete_custom_sidebar', array( &$this, 'delete_custom_sidebar' ), 1000 );

	}

	/**
	 * Enqueue CSS/JS
	 */
	function enqueue_scripts() {
		add_action( 'admin_print_scripts', array( &$this, 'template_add_widget_field' ) );
		add_action( 'load-widgets.php', array( &$this, 'add_sidebar_area' ), 100 );
		wp_enqueue_script( 'wpus-sidebar', ADAMAS_FRAMEWORK_ASSETS . '/js/sidebar.js' );  
	}

	/**
	 * Widget form template
	 */
	function template_add_widget_field() {

		$nonce =  wp_create_nonce ( 'wpus-delete-sidebar' );
		$nonce = '<input type="hidden" name="wpus-delete-sidebar" value="' . $nonce . '" />';

		echo "\n<script type='text/html' id='wpus-add-sidebar'>";
		echo "\n<form class='wpus-add-sidebar' method='POST'>";
		echo "\n<h3>" . esc_html__( 'Create Widget Area', 'adamas' ) . "</h3>";
		echo "\n<input type='text' value='' placeholder = '" . esc_html__( 'Enter Name of the new Widget Area', 'adamas' )."' name='wpus-add-sidebar'/>";
		echo "\n<input class='button-primary' type='submit' value='". esc_html__( 'Add Widget Area', 'adamas' ) . "' />";
		echo "\n" . $nonce;
		echo "\n</form>";
		echo "\n</script>\n";

	}

	/**
	 * Add sidebar area to the db
	 */
	function add_sidebar_area() {

		if ( !empty( $_POST['wpus-add-sidebar'] ) ) {

			$this->sidebars = get_option( $this->stored );
			$name = trim( $this->get_name( $_POST['wpus-add-sidebar'] ) );

			if ( empty( $this->sidebars ) ) {
				$this->sidebars = array( $name );
			} else {
				$this->sidebars = array_merge( $this->sidebars, array( $name ) );
			}

			update_option( $this->stored, $this->sidebars );
			wp_redirect( admin_url( 'widgets.php' ) );

			die();
		}

	}

	/**
	 * Delete sidebar area from the db
	 */
	function delete_custom_sidebar(){

		check_ajax_referer( 'wpus-delete-sidebar' );

		if ( !empty( $_POST['name'] ) ) {

			$name = stripslashes( trim( $_POST['name'] ) );
			$this->sidebars = get_option( $this->stored );

			if ( ( $key = array_search( $name, $this->sidebars ) ) !== false ) {
				unset( $this->sidebars[$key] );
				update_option( $this->stored, $this->sidebars );
				echo "sidebar-deleted";
			}
		}
		die();
	}

	/**
	 * Checks the user submitted name and makes sure that there are no colitions
	 */
	function get_name( $name ) {

		if ( empty( $GLOBALS['wp_registered_sidebars'] ) ) {
			return $name;
		}

		$taken = array();

		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
			$taken[] = $sidebar['name'];
		}

		if ( empty( $this->sidebars ) ) {
			$this->sidebars = array();
		}

		$taken = array_merge( $taken, $this->sidebars );

		if ( in_array( $name, $taken ) ) {

			$counter  = substr( $name, -1 );  
			$new_name = "";

			if ( !is_numeric( $counter ) ) {
				$new_name = $name . " 1";
			} else {
				$new_name = substr( $name, 0, -1 ) . ( (int) $counter + 1 );
			}

			$name = $this->get_name( $new_name );
		}

		return $name;

	}

	/**
	 * Register custom sidebar areas
	 */
	function register_custom_sidebars() {
	
		if ( empty( $this->sidebars ) ) {
			$this->sidebars = get_option( $this->stored );
		}

		$args = array(
			'description'   => esc_html__( 'The custom sidebar.', 'adamas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h6 class="widget-title">',
            'after_title'   => '</h6>',
		);
			
		if ( is_array( $this->sidebars ) ) {
			foreach ( $this->sidebars as $sidebar ) {	
				$args['name']  = $sidebar;
				$args['id']    = $sidebar;
				$args['class'] = 'adamas_custom_sidebar';
				register_sidebar( $args );
			}
		}
	}

}

$adamas_unlimited_sidebars = new AdamasUnlimitedSidebars;