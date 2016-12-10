<?php
/**
 * Adamas Theme Options Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

/**
 * Return if Redux Framework isn't enabled
 *
 * @since 1.0
 */
if ( ! class_exists( 'ReduxFramework' ) ) {
    return;
}

/**
 * Config Redux Framework
 *
 * @since 1.0
 */
class AdamasThemeOptions {

    protected $opt_data    = 'adamas_data';
    public    $args        = array();
    public    $sections    = array();
    public    $ReduxFramework;

    /**
     * Constructor of the class
     *
     * @since 1.0
     */
    public function __construct() {

        // This is needed. Bah WordPress bugs. ;)
        if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
            $this->initSettings();
        } else {
            add_action( 'plugins_loaded', array( $this, 'initSettings'), 10 );
        }

        // Enqueue assets
        add_action( 'redux/page/' . $this->opt_data . '/enqueue', array( $this, 'enqueue_assets' ) );

        // Remove redux menu under the tools
        add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 );

        // Removing Demo Mode and Notices
        add_action( 'init', array( $this, 'remove_demo_mode_link' ) );

    }

    /**
     * Enqueue assets
     *
     * @since 1.0
     */
    public function enqueue_assets() {
        wp_enqueue_script( 'adamas-redux', ADAMAS_FRAMEWORK_ASSETS . '/js/redux.js', array( 'jquery' ), ADAMAS_THEME_VERSION, true );
        wp_enqueue_style( 'adamas-redux', ADAMAS_FRAMEWORK_ASSETS . '/css/redux.css', false, ADAMAS_THEME_VERSION, 'all' );
    }

    /**
     * Remove redux menu under the tools
     *
     * @since 1.0
     */
    public function remove_redux_menu() {
        remove_submenu_page( 'tools.php', 'redux-about' );
    }

    /**
     * Removing Demo Mode and Notices
     *
     * @since 1.0
     */
    public function remove_demo_mode_link() {
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
        }
    }

    /**
     * Init settings
     *
     * @since 1.0
     */
    public function initSettings() {

        // Set the default arguments
        $this->setArguments();

        // Create the sections and fields
        $this->setSections();

        // Init Redux Framework
        $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
    }

    /**
     * Set arguments
     *
     * @since 1.0
     */
    public function setArguments() {
        $this->args = array(
            'opt_name'            => $this->opt_data,
            'global_variable'     => $this->opt_data,
            'page_slug'           => $this->opt_data,
            'display_name'        => 'Adamas',
            'display_version'     => ADAMAS_THEME_VERSION,
            'menu_title'          => esc_html__( 'Theme Options', 'adamas' ),
            'page_title'          => esc_html__( 'Theme Options', 'adamas' ),
            'async_typography'    => true,
            'admin_bar'           => false,
            'disable_save_warn'   => true,
            'show_options_object' => false,
            'disable_tracking'    => true,
            'dev_mode'            => false,
            'forced_dev_mode_off' => true,
        );
    }

    /**
     * Set sections
     *
     * @since 1.0
     */
    public function setSections() {

        // General
        $this->sections[] = array(
            'title'  => esc_html__( 'General', 'adamas' ),
            'icon'   => 'el el-icon-home',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'general_section',
                    'title'  => esc_html__( 'General Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'back_to_top',
                    'title'    => esc_html__( 'Back To Top', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display a "Back to Top" button.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'preloader',
                    'title'    => esc_html__( 'Preloader', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display a preloader for your site.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'minify_js',
                    'title'    => esc_html__( 'Minify Java Script Files', 'adamas' ),
                    'subtitle' => esc_html__( 'Minify and load all theme related javascript in one single, minified file.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'minify_css',
                    'title'    => esc_html__( 'Minify CSS Files', 'adamas' ),
                    'subtitle' => esc_html__( 'Minify and load all theme related css in one single, minified file.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'vc_set_as_theme',
                    'title'    => esc_html__( 'Visual Composer Theme Mode', 'adamas' ),
                    'subtitle' => esc_html__( 'If you have purchased a license of the Visual Composer and want to activate it for automatic updates you can do so by disabling the this option.', 'adamas' ),
                    'default'  => true,
                ),

            ),
        );

        // Favicon
        $this->sections[] = array(
            'title'      => esc_html__( 'Favicon', 'adamas' ),
            'icon'       => 'el el-asterisk',
            'subsection' => true,
            'fields'     => array(

                array(
                    'type'   => 'section',
                    'id'     => 'favicon_section',
                    'title'  => esc_html__( 'Favicon Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'favicon',
                    'title'    => esc_html__( 'Favicon', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose a favicon image (16px x 16px)', 'adamas' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'iphone_favicon',
                    'title'    => esc_html__( 'Apple iPhone Icon', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose a favicon image for Apple iPhone (57px x 57px)', 'adamas' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'iphone_retina_favicon',
                    'title'    => esc_html__( 'Apple iPhone Retina Icon', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose a favicon image for Apple iPhone Retina Version (114px x 114px)', 'adamas' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'ipad_favicon',
                    'title'    => esc_html__( 'Apple iPad Iconn', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose a favicon image for Apple iPad (72px x 72px)', 'adamas' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'ipad_retina_favicon',
                    'title'    => esc_html__( 'Apple iPad Retina Icon', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose a favicon image for Apple iPad Retina Version (144px x 144px)', 'adamas' ),
                ),

            ),
        );

        // Style
        $this->sections[] = array(
            'title'  => esc_html__( 'Style', 'adamas' ),
            'icon'   => 'el el-brush ',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'style_settings_section',
                    'title'  => esc_html__( 'Style Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'accent_color',
                    'title'       => esc_html__( 'Accent Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select accent color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'first_color',
                    'title'       => esc_html__( 'First Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select first color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'second_color',
                    'title'       => esc_html__( 'Second Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select second color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'third_color',
                    'title'       => esc_html__( 'Third Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select third color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'el_border_color',
                    'title'       => esc_html__( 'Elements Border Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select element border color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'el_background_color',
                    'title'       => esc_html__( 'Elements Background Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select element background color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'   => 'section',
                    'id'     => 'body_bg_settings_section',
                    'title'  => esc_html__( 'Body Background', 'adamas' ),
                    'indent' => true,
                ),

                array(
				    'id'       => 'body_background',
				    'type'     => 'background',
				    'title'    => __('Body Background', 'adamas'),
				    'subtitle' => __('Body background with image, color, etc.', 'adamas'),
				),

				array(
                    'type'   => 'section',
                    'id'     => 'preloader_style_settings_section',
                    'title'  => esc_html__( 'Preloader', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'preloader_color',
                    'title'       => esc_html__( 'Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'preloader_bg_color',
                    'title'       => esc_html__( 'Background Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select background color.', 'adamas' ),
                    'transparent' => false,
                ),

            ),
        );

        // Typography
        $this->sections[] = array(
            'title'  => esc_html__( 'Typography', 'adamas' ),
            'icon'   => 'el el-font',
            'fields' => array(

                /** Body */
                array(
                    'type'   => 'section',
                    'id'     => 'body_typography_section',
                    'title'  => esc_html__( 'Body Typography', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'           => 'typography',
                    'id'             =>'body_typography',
                    'title'          => '',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                /** Headings */
                array(
                    'type'   => 'section',
                    'id'     => 'headings_typography_section',
                    'title'  => esc_html__( 'Headings Typography', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h1_typography',
                    'title'          => 'H1',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h2_typography',
                    'title'          => 'H2',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h3_typography',
                    'title'          => 'H3',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h4_typography',
                    'title'          => 'H4',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h5_typography',
                    'title'          => 'H5',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'h6_typography',
                    'title'          => 'H6',
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'all_styles'     => true,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                /** Menu */
                array(
                   'id'     => 'menu_typography_section',
                   'type'   => 'section',
                   'title'  => esc_html__( 'Menu Typography', 'adamas' ),
                   'indent' => true,
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'menu_1st_typography',
                    'title'          => esc_html__( 'Menu: 1st Level', 'adamas' ),
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'line-height'    => false,
                    'all_styles'     => false,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

                array(
                    'type'           => 'typography',
                    'id'             => 'menu_2nd_typography',
                    'title'          => esc_html__( 'Menu: 2nd Level', 'adamas' ),
                    'full_width'     => true,
                    'color'          => false,
                    'text-align'     => false,
                    'text-transform' => true,
                    'letter-spacing' => true,
                    'line-height'    => false,
                    'all_styles'     => false,
                    'default'        => array( 'font-family' => 'Source Sans Pro' ),
                ),

            ),
        );

        // Top Bar
        $this->sections[] = array(
            'title'  => esc_html__( 'Top Bar', 'adamas' ),
            'icon'   => 'el el-minus',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'top_bar_settings_section',
                    'title'  => esc_html__( 'Top Bar Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'top_bar',
                    'title'    => esc_html__( 'Show Top Bar', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will show top bar.', 'adamas' ),
                    'desc'     => esc_html__( 'This is a global options for every page or post, and this can be overridden by individual page/post options.', 'adamas' ),
                    'default'  => false,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'top_bar_wide',
                    'title'    => esc_html__( 'Wide Layout', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display wide top bar.', 'adamas' ),
                    'default'  => false,
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'top_bar_columns',
                    'title'    => esc_html__( 'Top Bar Widget Columns', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose number of top bar widget columns.', 'adamas' ),
                    'default'  => '2',
                    'options'  => array(
                        '1' => esc_html__( '1 Column', 'adamas' ),
                        '2' => esc_html__( '2 Columns', 'adamas' ),
                        '3' => esc_html__( '3 Columns', 'adamas' ),
                    ),
                ),

                array(
                   'type'   => 'section',
                   'id'     => 'top_bar_style_section',
                   'title'  => esc_html__( 'Top Bar Style', 'adamas' ),
                   'indent' => true,
                ),

                array(
                    'type'          => 'slider',
                    'id'            => 'top_bar_height',
                    'title'         => esc_html__( 'Top Bar Height', 'adamas' ),
                    'display_value' => 'text',
                    'default'       => 50,
                    'min'           => 1,
                    'max'           => 200,
                    'step'          => 1,
                ),

                array(
                    'type'  => 'color',
                    'id'    => 'top_bar_background_color',
                    'title' => esc_html__( 'Top Bar Background Color', 'adamas' ),
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'top_bar_text_color',
                    'title'       => esc_html__( 'Top Bar Text Color', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'top_bar_links_color',
                    'title'       => esc_html__( 'Top Bar Links Color', 'adamas' ),
                    'transparent' => false,
                ),

            ),
        );

        // Header
        $this->sections[] = array(
            'title'  => esc_html__( 'Header', 'adamas' ),
            'icon'   => 'el el-circle-arrow-up',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'header_settings_section',
                    'title'  => esc_html__( 'Header Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'image_select',
                    'id'       => 'header_type',
                    'title'    => esc_html__( 'Header Type', 'adamas' ),
                    'subtitle' => esc_html__( 'Select header type.', 'adamas' ),
                    'options'  => array(
                        'header-type-1'    => array( 'alt' => esc_html__( 'Headere 1', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/header_1.png' ),
                        'header-type-2'    => array( 'alt' => esc_html__( 'Headere 2', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/header_2.png' ),
                        'header-type-3'    => array( 'alt' => esc_html__( 'Headere 3', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/header_3.png' ),
                        'header-type-4'    => array( 'alt' => esc_html__( 'Headere 4', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/header_4.png' ),
                        'header-type-5'    => array( 'alt' => esc_html__( 'Headere 5', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/header_5.png' ),
                    ),
                    'default' => 'header-type-1',
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_wide',
                    'title'    => esc_html__( 'Wide Layout', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display wide header.', 'adamas' ),
                    'default'  => false,
                ),

                array(
                    'type'     => 'slider',
                    'id'       => 'header_height',
                    'title'    => esc_html__( 'Header Height', 'adamas' ),
                    'subtitle' => esc_html__( 'Adjust the size of your header.', 'adamas' ),
                    'default'  => 90,
                    'min'      => 0,
                    'max'      => 500,
                    'step'     => 1,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_sticky',
                    'title'    => esc_html__( 'Sticky Header', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the sticky header.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'slider',
                    'id'       => 'header_sticky_height',
                    'title'    => esc_html__( 'Sticky Header Height', 'adamas' ),
                    'subtitle' => esc_html__( 'Adjust the size of your sticky header.', 'adamas' ),
                    'default'  => 70,
                    'min'      => 0,
                    'max'      => 500,
                    'step'     => 1,
                    'required' => array( 'header_sticky', '=', true ),
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'menu_type',
                    'title'    => esc_html__( 'Menu Type', 'adamas' ),
                    'subtitle' => esc_html__( 'Select menu type.', 'adamas' ),
                    'options'  => array(
                        'menu-standart' => esc_html__( 'Standart', 'adamas' ),
                        'menu-side'     => esc_html__( 'Side', 'adamas' ),
                    ),
                    'default' => 'menu-standart',
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_search',
                    'title'    => esc_html__( 'Search Icon', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the search icon in the header.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_cart',
                    'title'    => esc_html__( 'Cart Icon', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the cart icon in the header.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'   => 'section',
                    'id'     => 'header_style_section',
                    'title'  => esc_html__( 'Header Style', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_box_shadow',
                    'title'    => esc_html__( 'Header Box Shadow', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable header box shadow.', 'adamas' ),
                    'desc'     => esc_html__( 'This is a global options for every page or post, and this can be overridden by individual page/post options.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'header_border',
                    'title'    => esc_html__( 'Header Border', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable header border.', 'adamas' ),
                    'desc'     => esc_html__( 'This is a global options for every page or post, and this can be overridden by individual page/post options.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'header_background_color',
                    'title'       => esc_html__( 'Background Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select header background color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'header_border_color',
                    'title'       => esc_html__( 'Border Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select header border color.', 'adamas' ),
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'header_link_color',
                    'title'       => esc_html__( 'Link Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select header link color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'header_link_hover_color',
                    'title'       => esc_html__( 'Link Hover Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select header link hover color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'submenu_background_color',
                    'title'       => esc_html__( 'Submenu Background Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select submenu background color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'submenu_link_color',
                    'title'       => esc_html__( 'Submenu Link Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select submenu link color.', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'submenu_link_hover_color',
                    'title'       => esc_html__( 'Submenu Link Hover Color', 'adamas' ),
                    'subtitle'    => esc_html__( 'Select submenu link hover color.', 'adamas' ),
                    'transparent' => false,
                ),

            ),
        );

        // Logo
        $this->sections[] = array(
            'title'      => esc_html__( 'Logo', 'adamas' ),
            'icon'       => 'el el-leaf',
            'subsection' => true,
            'fields'     => array(

                array(
                   'type'     => 'section',
                   'id'       => 'logo_image_section',
                   'title'    => esc_html__( 'Logo Image', 'adamas' ),
                   'indent'   => true,
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'default_logo',
                    'title'    => esc_html__( 'Default Logo', 'adamas' ),
                    'subtitle' => esc_html__( 'Use 2x logo size for retina ready display.', 'adamas' ),
                    'default'  => array( 'url' => ADAMAS_THEME_ASSETS . '/images/logo-default.png' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'light_transparent_header_logo',
                    'title'    => esc_html__( 'Logo for Light Transparent Header', 'adamas' ),
                    'subtitle' => esc_html__( 'Use 2x logo size for retina ready display.', 'adamas' ),
                    'default'  => array( 'url' => ADAMAS_THEME_ASSETS . '/images/logo-light.png' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'dark_transparent_header_logo',
                    'title'    => esc_html__( 'Logo for Dark Transparent Header', 'adamas' ),
                    'subtitle' => esc_html__( 'Use 2x logo size for retina ready display.', 'adamas' ),
                    'default'  => array( 'url' => ADAMAS_THEME_ASSETS . '/images/logo-default.png' ),
                ),

                array(
                    'type'     => 'media',
                    'id'       => 'mobile_logo',
                    'title'    => esc_html__( 'Mobile Logo', 'adamas' ),
                    'subtitle' => esc_html__( 'Use 2x logo size for retina ready display.', 'adamas' ),
                    'default'  => array( 'url' => ADAMAS_THEME_ASSETS . '/images/logo-mobile.png' ),
                ),

                array(
                   'type'     => 'section',
                   'id'       => 'logo_width_section',
                   'title'    => esc_html__( 'Logo Width', 'adamas' ),
                   'indent'   => true,
                ),

                array(
                    'type'          => 'slider',
                    'id'            => 'default_logo_width',
                    'title'         => esc_html__( 'Default Logo: Width', 'adamas'),
                    'subtitle'      => esc_html__( 'Enter the 1x logo width, do not enter the 2x logo width.', 'adamas'),
                    'default'       => 70,
                    'min'           => 0,
                    'step'          => 1,
                    'max'           => 300,
                    'display_value' => 'text',
                ),

                array(
                    'type'          => 'slider',
                    'id'            => 'sticky_header_logo_width',
                    'title'         => esc_html__( 'Sticky Header Logo: Width', 'adamas'),
                    'subtitle'      => esc_html__( 'Enter the 1x logo width, do not enter the 2x logo width.', 'adamas'),
                    'default'       => 70,
                    'min'           => 0,
                    'step'          => 1,
                    'max'           => 300,
                    'display_value' => 'text',
                ),

                array(
                    'type'          => 'slider',
                    'id'            => 'mobile_logo_width',
                    'title'         => esc_html__( 'Mobile Logo: Width', 'adamas'),
                    'subtitle'      => esc_html__( 'Enter the 1x logo width, do not enter the 2x logo width.', 'adamas'),
                    'default'       => 30,
                    'min'           => 0,
                    'step'          => 1,
                    'max'           => 300,
                    'display_value' => 'text',

                ),

            ),
        );

        // Footer
        $this->sections[] = array(
            'title'  => esc_html__( 'Footer', 'adamas' ),
            'icon'   => 'el el-circle-arrow-down',
            'fields' => array(

                array(
                   'id'     => 'footer_settings_section',
                   'type'   => 'section',
                   'title'  => esc_html__( 'Footer Settings', 'adamas' ),
                   'indent' => true,
                ),

                array(
                    'id'       => 'footer_widgets',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Footer Widget Area', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will show widgetized footer area.', 'adamas' ),
                    'desc'     => esc_html__( 'This is a global options for every page or post, and this can be overridden by individual page/post options.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'id'       => 'footer_columns',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Footer Widget Columns', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose number of footer widget columns.', 'adamas' ),
                    'default'  => '5',
                    'options'  => array(
                        '1' => esc_html__( '1 Column', 'adamas' ),
                        '2' => esc_html__( '2 Columns', 'adamas' ),
                        '3' => esc_html__( '3 Columns', 'adamas' ),
                        '4' => esc_html__( '4 Columns', 'adamas' ),
                        '5' => esc_html__( '5 Columns', 'adamas' ),
                        '6' => esc_html__( '6 Columns', 'adamas' ),
                    ),
                ),

                array(
                    'id'       => 'footer_fixed',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Fixed Footer', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display a fixed footer for your site.', 'adamas' ),
                    'default'  => false,
                ),

                array(
                   'id'     => 'footer_style_section',
                   'type'   => 'section',
                   'title'  => esc_html__( 'Footer Style', 'adamas' ),
                   'indent' => true ,
                ),

                array(
                    'id'            => 'footer_padding',
                    'type'          => 'slider',
                    'title'         => esc_html__( 'Footer Padding Top/Bottom', 'adamas' ),
                    'display_value' => 'text',
                    'default'       => 60,
                    'min'           => 1,
                    'max'           => 200,
                    'step'          => 1,
                ),

                array(
                    'id'    => 'footer_background_color',
                    'type'  => 'color',
                    'title' => esc_html__( 'Footer Background Color', 'adamas' ),
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'footer_widget_title_color',
                    'title'       => esc_html__( 'Footer Widget Title Color', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'footer_text_color',
                    'title'       => esc_html__( 'Footer Text Color', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'footer_links_color',
                    'title'       => esc_html__( 'Footer Links Color', 'adamas' ),
                    'transparent' => false,
                ),

            ),
        );

        // Copyright
        $this->sections[] = array(
            'title'      => esc_html__( 'Copyright', 'adamas' ),
            'icon'       => 'el el-cc',
            'subsection' => true,
            'fields'     => array(

                array(
                    'type'   => 'section',
                    'id'     => 'copyright_settings_section',
                    'title'  => esc_html__( 'Copyright Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'footer_copyright',
                    'title'    => esc_html__( 'Show Copyright Area', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will show copyright area.', 'adamas' ),
                    'desc'     => esc_html__( 'This is a global options for every page or post, and this can be overridden by individual page/post options.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'copyright_columns',
                    'title'    => esc_html__( 'Copyright Widget Columns', 'adamas' ),
                    'subtitle' => esc_html__( 'Choose number of copyright widget columns.', 'adamas' ),
                    'default'  => '2',
                    'options'  => array(
                        '1' => esc_html__( '1 Column', 'adamas' ),
                        '2' => esc_html__( '2 Columns', 'adamas' ),
                        '3' => esc_html__( '3 Columns', 'adamas' ),
                    ),
                ),

                array(
                   'type'   => 'section',
                   'id'     => 'copyright_style_section',
                   'title'  => esc_html__( 'Copyright Style', 'adamas' ),
                   'indent' => true,
                ),

                array(
                    'type'          => 'slider',
                    'id'            => 'copyright_padding',
                    'title'         => esc_html__( 'Copyright Padding Top/Bottom', 'adamas' ),
                    'display_value' => 'text',
                    'default'       => 25,
                    'min'           => 1,
                    'max'           => 200,
                    'step'          => 1,
                ),

                array(
                    'type'  => 'color',
                    'id'    => 'copyright_background_color',
                    'title' => esc_html__( 'Copyright Background Color', 'adamas' ),
                ),

                array(
                    'type'  => 'color',
                    'id'    => 'copyright_border_color',
                    'title' => esc_html__( 'Copyright Border Color', 'adamas' ),
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'copyright_text_color',
                    'title'       => esc_html__( 'Copyright Text Color', 'adamas' ),
                    'transparent' => false,
                ),

                array(
                    'type'        => 'color',
                    'id'          => 'copyright_links_color',
                    'title'       => esc_html__( 'Copyright Links Color', 'adamas' ),
                    'transparent' => false,
                ),

            ),
        );

        // Blog
        $this->sections[] = array(
            'title'  => esc_html__( 'Blog', 'adamas' ),
            'icon'   => 'el el-icon-pencil',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'blog_settings_section',
                    'title'  => esc_html__( 'Blog Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'blog_slider',
                    'title'    => esc_html__( 'Blog Header Adamas Slider', 'adamas' ),
                    'subtitle' => esc_html__( 'Select blog header slider.', 'adamas' ),
                    'options'  => AdamasShared::sliders(),
                ),

                array(
                    'type'     => 'image_select',
                    'id'       => 'blog_layout',
                    'title'    => esc_html__( 'Blog Layout', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the blog layout.', 'adamas' ),
                    'options'  => array(
                        'no-sidebar'    => array( 'alt' => esc_html__( 'No sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/1cl.png' ),
                        'right-sidebar' => array( 'alt' => esc_html__( 'Right sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cr.png' ),
                        'left-sidebar'  => array( 'alt' => esc_html__( 'Left sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cl.png' ),
                    ),
                    'default' => 'no-sidebar',
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'blog_template',
                    'title'    => esc_html__( 'Blog Template', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the blog template.', 'adamas' ),
                    'options'  => array(
                        'large'   => esc_html__( 'Large Image', 'adamas' ),
                        'medium'  => esc_html__( 'Medium Image', 'adamas' ),
                        'grid'    => esc_html__( 'Grid', 'adamas' ),
                        'masonry' => esc_html__( 'Masonry', 'adamas' ),
                    ),
                    'default' => 'large',
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'blog_pagination',
                    'title'    => esc_html__( 'Blog Pagination', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the blog pagination type.', 'adamas' ),
                    'options'  => array(
                        'numbered' => esc_html__( 'Numbered Pagination', 'adamas' ),
                        'loadmore' => esc_html__( 'Load More', 'adamas' ),
                    ),
                    'default' => 'numbered',
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'blog_featured_image',
                    'title'    => esc_html__( 'Featured Image', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the featured image.', 'adamas' ),
                    'default'  => 1,
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'blog_content_type',
                    'title'    => esc_html__( 'Excerpt or Full Blog Content', 'adamas'),
                    'subtitle' => esc_html__( 'Choose to display an excerpt or full content on blog pages.', 'adamas'),
                    'options'  => array(
                        'excerpt' => esc_html__( 'Excerpt', 'adamas' ),
                        'full'    => esc_html__( 'Full Content', 'adamas' ),
                    ),
                    'default'  => 'excerpt',
                ),

                array(
                    'type'     => 'text',
                    'id'       => 'blog_excerpt_length',
                    'title'    => esc_html__( 'Excerpt Length', 'adamas'),
                    'subtitle' => esc_html__( 'Insert the number of words you want to show in the post excerpts.', 'adamas'),
                    'default'  => '17',
                    'required' => array( 'blog_content_type', "=", 'excerpt' ),
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'blog_header_box_shadow',
                    'title'    => esc_html__( 'Disable Header Box Shadow', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable header box shadow.', 'adamas' ),
                    'default'  => 0,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'blog_header_border',
                    'title'    => esc_html__( 'Disable Header Border', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable header border.', 'adamas' ),
                    'default'  => 0,
                ),

            ),
        );

        // Post
        $this->sections[] = array(
            'title'      => esc_html__( 'Single Post', 'adamas' ),
            'icon'       => 'el el-icon-pencil',
            'subsection' => true,
            'fields'     => array(

                array(
                    'type'   => 'section',
                    'id'     => 'single_post_settings_section',
                    'title'  => esc_html__( 'Single Post', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'image_select',
                    'id'       => 'post_layout',
                    'title'    => esc_html__( 'Post Layout', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the post layout.', 'adamas' ),
                    'options'  => array(
                        'no-sidebar'    => array( 'alt' => esc_html__( 'No sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/1cl.png' ),
                        'right-sidebar' => array( 'alt' => esc_html__( 'Right sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cr.png' ),
                        'left-sidebar'  => array( 'alt' => esc_html__( 'Left sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cl.png' ),
                    ),
                    'default' => 'no-sidebar',
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'post_sidebar',
                    'title'    => esc_html__( 'Search Page Sidebar', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the search page sidebar.', 'adamas' ),
                    'data'     => 'sidebars',
                    'default'  => 'sidebar-blog',
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'post_featured_image',
                    'title'    => esc_html__( 'Featured Image', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the featured image.', 'adamas' ),
                    'default'  => 1,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'post_meta',
                    'title'    => esc_html__( 'Metadata', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the metadata.', 'adamas' ),
                    'default'  => 1,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'post_share',
                    'title'    => esc_html__( 'Social Sharing', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the social sharing.', 'adamas' ),
                    'default'  => true,
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'post_navigation',
                    'title'    => esc_html__( 'Post Navigation', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the post navigation.', 'adamas' ),
                    'default'  => true,
                ),

            ),
        );

        // Portfolio
        $this->sections[] = array(
            'title'  => esc_html__( 'Portfolio', 'adamas' ),
            'icon'   => 'el el-briefcase',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'project_settings_section',
                    'title'  => esc_html__( 'Portfolio Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'text',
                    'id'       => 'portfolio_slug',
                    'title'    => esc_html__( 'Portfolio Slug', 'adamas'),
                    'subtitle' => esc_html__( 'Enter if you wish to use a different Single Project slug.', 'adamas' ),
                    'default'  => 'portfolio-item',
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'project_nav',
                    'title'    => esc_html__( 'Single Project Prev / Next Link', 'adamas' ),
                    'subtitle' => esc_html__( 'Enabling this option will display a "Prev / Next" link.', 'adamas' ),
                    'default'  => false,
                ),

            ),
        );

        // WooCommerce
        if ( class_exists( 'WooCommerce' ) ) {

            // WooCommerce Products
            $this->sections[] = array(
                'title'  => esc_html__( 'Shop', 'adamas' ),
                'icon'   => 'el el-shopping-cart',
                'fields' => array(

                    array(
                        'type'   => 'section',
                        'id'     => 'shop_settings_section',
                        'title'  => esc_html__( 'Shop General Settings', 'adamas' ),
                        'indent' => true,
                    ),

                    array(
                        'type'     => 'image_select',
                        'id'       => 'shop_layout',
                        'title'    => esc_html__( 'Shop Layout', 'adamas' ),
                        'subtitle' => esc_html__( 'Select the shop layout.', 'adamas' ),
                        'options'  => array(
                            'no-sidebar'    => array( 'alt' => esc_html__( 'No sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/1cl.png' ),
                            'right-sidebar' => array( 'alt' => esc_html__( 'Right sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cr.png' ),
                            'left-sidebar'  => array( 'alt' => esc_html__( 'Left sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cl.png' ),
                        ),
                        'default' => 'no-sidebar',
                    ),

                    array(
                        'type'     => 'text',
                        'id'       => 'shop_per_page',
                        'title'    => esc_html__( 'Products per Page', 'adamas'),
                        'subtitle' => esc_html__( 'Number of products per page.', 'adamas'),
                        'default'  => esc_html__( '12', 'adamas' ),
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'shop_toolbar',
                        'title'    => esc_html__( 'Tool Bar', 'adamas'),
                        'subtitle' => esc_html__( 'Enable / Disable the shop tool bar.', 'adamas'),
                        'default'  => 0,
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_pagination',
                        'title'    => esc_html__( 'Shop Pagination', 'adamas' ),
                        'subtitle' => esc_html__( 'Select pagination type.', 'adamas' ),
                        'options'  => array(
                            'numbered' => esc_html__( 'Numbered Pagination', 'adamas' ),
                            'loadmore' => esc_html__( 'Load More', 'adamas' ),
                        ),
                        'default' => 'numbered',
                    ),

                    array(
                        'type'   => 'section',
                        'id'     => 'shop_columns_section',
                        'title'  => esc_html__( 'Shop Columns Settings', 'adamas' ),
                        'indent' => true,
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_columns_lg',
                        'title'    => esc_html__( 'Maximum Columns', 'adamas' ),
                        'subtitle' => esc_html__( 'Maximum columns on desktop.', 'adamas' ),
                        'options'  => AdamasShared::columns(),
                        'default'  => '4',
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_columns_md',
                        'title'    => esc_html__( 'Columns on Notebook', 'adamas' ),
                        'subtitle' => esc_html__( 'Maximum columns on notebook.', 'adamas' ),
                        'options'  => AdamasShared::columns(),
                        'default'  => '3',
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_columns_sm',
                        'title'    => esc_html__( 'Columns on Tablet', 'adamas' ),
                        'subtitle' => esc_html__( 'Maximum columns on tablet.', 'adamas' ),
                        'options'  => AdamasShared::columns(),
                        'default'  => '2',
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_columns_xs',
                        'title'    => esc_html__( 'Columns on Mobile', 'adamas' ),
                        'subtitle' => esc_html__( 'Maximum columns on mobile.', 'adamas' ),
                        'options'  => AdamasShared::columns(),
                        'default'  => '1',
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_items_margin_right',
                        'title'    => esc_html__( 'Columns Margin Right', 'adamas' ),
                        'subtitle' => esc_html__( 'Select items margin right.', 'adamas' ),
                        'options'  => AdamasShared::margin(),
                        'default'  => '25px',
                    ),

                    array(
                        'type'     => 'select',
                        'id'       => 'shop_items_margin_bottom',
                        'title'    => esc_html__( 'Columns Margin Bottom', 'adamas' ),
                        'subtitle' => esc_html__( 'Select items margin bottom.', 'adamas' ),
                        'options'  => AdamasShared::margin(),
                        'default'  => '40px',
                    ),

                ),
            );

            // WooCommerce Product
            $this->sections[] = array(
                'title'      => esc_html__( 'Single Product', 'adamas' ),
                'icon'       => 'el el-shopping-cart',
                'subsection' => true,
                'fields'     => array(

                    array(
                        'type'   => 'section',
                        'id'     => 'product_settings_section',
                        'title'  => esc_html__( 'Product Settings', 'adamas' ),
                        'indent' => true,
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'product_breadcrumb',
                        'title'    => esc_html__( 'Breadcrumb', 'adamas' ),
                        'subtitle' => esc_html__( 'Enable / Disable breadcrumb.', 'adamas' ),
                        'default'  => true,
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'product_image_lightbox',
                        'title'    => esc_html__( 'Lightbox Image', 'adamas' ),
                        'subtitle' => esc_html__( 'Enable / Disable lightbox image.', 'adamas' ),
                        'default'  => true,
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'product_related',
                        'title'    => esc_html__( 'Related Products', 'adamas' ),
                        'subtitle' => esc_html__( 'Enable / Disable related products.', 'adamas' ),
                        'default'  => true,
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'product_header_box_shadow',
                        'title'    => esc_html__( 'Disable Header Box Shadow', 'adamas' ),
                        'subtitle' => esc_html__( 'Enable / Disable header box shadow.', 'adamas' ),
                        'default'  => true,
                    ),

                    array(
                        'type'     => 'switch',
                        'id'       => 'product_header_border',
                        'title'    => esc_html__( 'Disable Header Border', 'adamas' ),
                        'subtitle' => esc_html__( 'Enable / Disable header border.', 'adamas' ),
                        'default'  => true,
                    ),

                    array(
                       'type'   => 'section',
                       'id'     => 'product_style_section',
                       'title'  => esc_html__( 'Style', 'adamas' ),
                       'indent' => true,
                    ),

                    array(
                        'type'     => 'color',
                        'id'       => 'product_background_color',
                        'title'    => esc_html__( 'Background Color', 'adamas' ),
                        'subtitle' => esc_html__( 'Product details background color.', 'adamas' ),
                    ),

                ),
            );

        }

        // Search
        $this->sections[] = array(
            'title'  => esc_html__( 'Search Page', 'adamas' ),
            'icon'   => 'el el-search',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'search-settings-section',
                    'title'  => esc_html__( 'Search Page Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'image_select',
                    'id'       => 'search_layout',
                    'title'    => esc_html__( 'Search Page Layout', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the search page layout.', 'adamas' ),
                    'options'  => array(
                        'no-sidebar'    => array( 'alt' => esc_html__( 'No sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/1cl.png' ),
                        'right-sidebar' => array( 'alt' => esc_html__( 'Right sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cr.png' ),
                        'left-sidebar'  => array( 'alt' => esc_html__( 'Left sidebar', 'adamas' ), 'img' => ADAMAS_FRAMEWORK_ASSETS . '/images/2cl.png' ),
                    ),
                    'default' => 'no-sidebar',
                ),

                array(
                    'type'     => 'select',
                    'id'       => 'search_sidebar',
                    'title'    => esc_html__( 'Search Page Sidebar', 'adamas' ),
                    'subtitle' => esc_html__( 'Select the search page sidebar.', 'adamas' ),
                    'data'     => 'sidebars',
                    'default'  => 'sidebar-blog',
                    'required' => array( 'search_layout', "!=", 'no-sidebar' ),
                ),

                array(
                    'type'     => 'text',
                    'id'       => 'search_excerpt_length',
                    'title'    => esc_html__( 'Excerpt Length', 'adamas'),
                    'subtitle' => esc_html__( 'Enter the number of words you want to show in the post excerpts.', 'adamas'),
                    'default'  => '55',
                ),

            ),
        );

        // 404
        $this->sections[] = array(
            'title'  => esc_html__( '404 Page', 'adamas' ),
            'icon'   => 'el el-error-alt',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => '404_page_settings_section',
                    'title'  => esc_html__( '404 Page Settings', 'adamas' ),
                    'indent' => true,
                ),

                array(
                    'type'     => 'text',
                    'id'       =>'title_404',
                    'title'    => esc_html__( 'Title', 'adamas' ),
                    'subtitle' => esc_html__( 'Enter title for 404 page.', 'adamas' ),
                    'default'  => esc_html__( 'Oops! That Page Can\'t Be Found.', 'adamas' ),
                ),

                array(
                    'type'     => 'text',
                    'id'       =>'subtitle_404',
                    'title'    => esc_html__( 'Subtitle', 'adamas' ),
                    'subtitle' => esc_html__( 'Enter subtitle for 404 page.', 'adamas' ),
                    'default'  => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'adamas' ),
                ),

                array(
                    'type'     => 'switch',
                    'id'       => 'search_404',
                    'title'    => esc_html__( 'Search Form', 'adamas' ),
                    'subtitle' => esc_html__( 'Enable / Disable the search form.', 'adamas' ),
                    'default'  => true,
                ),
            ),
        );

        // Third Party API
        $this->sections[] = array(
            'title'  => esc_html__( 'Third Party API', 'adamas' ),
            'icon'   => 'el el-icon-puzzle',
            'fields' => array(

                array(
                    'type' => 'info',
                    'id'   => 'twitter_api_info',
                    'desc' => sprintf(
                        __( '<ol class="adamas_redux_info">
                                <li>Go to <a href="%s">dev.twitter.com/apps</a>, login with your twitter account and click "Create a new application".</li>
                                <li>Fill out the required fields, accept the rules of the road, and then click on the "Create your Twitter application" button. You will not need a callback URL for this app, so feel free to leave it blank.</li>
                                <li>Once the app has been created, click the "Create my access token" button.</li>
                                <li>You are done! You will need the following data later on:</li>
                            </ol>', 'adamas' ),
                        'https://dev.twitter.com/apps' ),
                    ),

                array(
                    'type'     => 'section',
                    'id'       => 'twitter_api_section',
                    'title'    => esc_html__( 'Twitter API Settings', 'adamas' ),
                    'indent'   => true,
                ),

                array(
                    'type'     => 'text',
                    'id'       => 'twitter_consumer_key',
                    'title'    => esc_html__( 'Twitter Consumer Key', 'adamas' ),
                    'subtitle' => esc_html__( 'Enter twitter consumer key.', 'adamas' ),
                ),

                array(
                    'type'     => 'text',
                    'id'       => 'twitter_consumer_secret',
                    'title'    => esc_html__( 'Twitter Consumer Secret', 'adamas' ),
                    'subtitle' => esc_html__( 'Enter twitter consumer secret.', 'adamas' ),
                ),

            ),
        );

        // Custom Code
        $this->sections[] = array(
            'title'  => esc_html__( 'Custom Code', 'adamas' ),
            'icon'   => 'el el-icon-adjust-alt',
            'fields' => array(

                array(
                    'type'   => 'section',
                    'id'     => 'custom_code_section',
                    'title'  => esc_html__( 'Custom Code', 'adamas' ),
                    'indent' => true,
                ),

               array(
                    'type'     => 'ace_editor',
                    'id'       => 'custom_css',
                    'title'    => esc_html__( 'Custom CSS', 'adamas' ),
                    'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'adamas' ),
                    'mode'     => 'css',
                    'theme'    => 'monokai',
                ),

               array(
                    'type'     => 'ace_editor',
                    'id'       => 'header_js',
                    'title'    => esc_html__( 'Header JavaScript Code', 'adamas' ),
                    'subtitle' => esc_html__( 'Paste your custom JS code here. The code will be added to the header of your site. Note: jQuery selector is "$j" because of the conflict mode.', 'adamas' ),
                    'mode'     => 'javascript',
                    'theme'    => 'monokai',
                ),

                array(
                    'type'     => 'ace_editor',
                    'id'       => 'footer_js',
                    'title'    => esc_html__( 'Footer JavaScript Code', 'adamas'),
                    'subtitle' => esc_html__( 'Paste your custom JS code here. The code will be added to the footer of your site. Note: jQuery selector is "$j" because of the conflict mode', 'adamas' ),
                    'mode'     => 'javascript',
                    'theme'    => 'monokai',
                ),

            ),
        );

        // Import / Export
        $this->sections[] = array(
            'title'  => esc_html__( 'Import / Export', 'adamas' ),
            'icon'   => 'el el-icon-refresh',
            'fields' => array(

                array(
                    'type'     => 'section',
                    'id'       => 'import_export_section',
                    'title'    => esc_html__( 'Import Export', 'adamas' ),
                    'subtitle' => esc_html__( 'Save and restore your theme options.', 'adamas' ),
                    'indent'   => true,
                ),

                array(
                    'type'       => 'import_export',
                    'id'         => 'opt-import-export',
                    'title'      => '',
                    'full_width' => true,
                ),

            ),
        );
    }

}

$adamas_theme_options = new AdamasThemeOptions();
