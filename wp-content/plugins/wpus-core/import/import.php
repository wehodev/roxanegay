<?php
/**
 * Import Class
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/**
 * WPUS Import Class
 *
 * @since 1.0
 */
class WpusImport {

    public $message     = '';
    public $attachments = false;

    /**
     * Constructor of the class
     *
     * @since 1.0
     */
    function __construct() {
        add_action( 'admin_menu', array( &$this, 'add_menu_page' ) );
        add_action( 'admin_init', array( &$this, 'register_import_settings' ) );
    }

    /**
     * Register import settings
     *
     * @since 1.0
     */
    function register_import_settings() {
        register_setting( 'wpus_import_page', 'wpus_options_import');
    }

    /**
     * Add menu page
     *
     * @since 1.0
     */
    function add_menu_page() {
        $this->pagehook = add_menu_page(
            esc_html__( 'Demo Import', 'adamas'),
            esc_html__( 'Demo Import', 'adamas'),
            'manage_options',
            'wpus_import_page',
            array( &$this, 'generate_import_page' ),
            'dashicons-download'
        );
    }

    /**
     * Generate import page
     */
    function generate_import_page() { ?>
        <div class="wrap">
            <div class="wpus-wrap">

                <h1><?php echo esc_html__( 'Adamas - One-Click Demo Import', 'adamas') ?></h1>

                <div id="wpus-import" class="wpus-import-wrap">
                    <form method="post" action="">

                        <h3 class="wpus-title"><?php esc_html_e( 'Import Demo Content', 'adamas' ) ?></h3>

                        <div class="wpus-row">
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e( 'Demo Site', 'adamas' ); ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Choose demo site you want to import', 'adamas' ); ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <div class="wpus-select-field">
                                    <select name="import_demo" id="import_demo">
                                    
                                        <option value="demo">Main Demo</option>

                                        <option value="demo1/light">Demo 1 (Light)</option>
                                        <option value="demo1/dark">Demo 1 (Dark)</option>
                                        
                                        <option value="demo2/light">Demo 2 (Light)</option>
                                        <option value="demo2/dark">Demo 2 (Dark)</option>

                                        <option value="demo3">Demo 3</option>

                                        <option value="demo4" disabled>Demo 4 (coming soon)</option>

                                    </select>
                                </div>
                                <img id="wpus-import-demo-image" src="http://adamas.wpuberstudio.com/import/demo/screenshot.png" alt="demo site" />
                            </div>
                        </div>

                        <div class="wpus-row" >
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e('Import Type', 'adamas'); ?></span>
                                <span class="wpus-desc"><?php esc_html_e('Choose if you would like to import all or specific content', 'adamas' ); ?></span>
                            </div>

                            <div class="wpus-col-md-8">
                                <div class="wpus-select-field">
                                    <select name="import_option" id="import_option">
                                        <option value=""><?php esc_html_e( 'Please Select', 'adamas' ) ?></option>
                                        <option value="all_content"><?php esc_html_e( 'All', 'adamas' ) ?></option>
                                        <option value="content"><?php esc_html_e( 'Content', 'adamas' ) ?></option>
                                        <option value="widgets"><?php esc_html_e( 'Widgets', 'adamas' ) ?></option>
                                        <option value="options"><?php esc_html_e( 'Options', 'adamas' ) ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="wpus-row" >
                            <div class="wpus-col-md-4">
                                <span class="wpus-label"><?php esc_html_e('Import Attachments', 'adamas'); ?></span>
                                <span class="wpus-desc"><?php esc_html_e( 'Do you want to import media files?', 'adamas' ); ?></span>
                            </div>
                            <div class="wpus-col-md-8">
                                <div class="wpus-select-field">
                                    <select name="import_attachments" id="import_attachments">
                                        <option value="no"><?php esc_html_e( 'No', 'adamas' ) ?></option>
                                        <option value="yes"><?php esc_html_e( 'Yes', 'adamas' ) ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="wpus-row">
                            <div class="wpus-col-md-12">

                                <input type="submit" class="button button-primary" value="<?php esc_html_e( 'Import Demo Content', 'adamas' ); ?>" name="import" id="wpus-import-button" />
                                <div class="wpus-import-success"><strong><?php esc_html_e( 'Import is completed', 'adamas' ) ?></strong></div>
                        
                                <div class="wpus-message wpus-info">
                                    <strong><?php esc_html_e( 'Important Notes:', 'adamas' ) ?></strong>
                                    <ol>
                                        <li><?php esc_html_e( 'We recommend to run the Demo Import on a clean WordPress installation.', 'adamas' ); ?></li>
                                        <li><?php esc_html_e( 'Please note that import process will take time needed to download all attachments from demo web site.', 'adamas' ); ?></li>
                                        <li><?php esc_html_e( 'If you plan to use shop, please install WooCommerce before you run import.', 'adamas' )?></li>
                                        <li><?php printf( __( 'To reset your installation (if the import fails) we recommend <a href="%s" target="_blank">Wordpress Reset Plugin</a>', 'adamas' ), 'https://wordpress.org/plugins/wordpress-reset/' ); ?></li>
                                        <li><?php esc_html_e( 'Do not run the Demo Import multiple times, it will result in duplicated content.', 'adamas' ); ?></li>
                                    </ol>
                                </div>

                                <div class="wpus-import-load">
                                    <div class="wpus-import-load-inner">
                                        <h4><?php esc_html_e( 'Import Demo Content...', 'adamas' ) ?></h4>
                                        <span><?php esc_html_e('The import process may take some time. Please be patient.', 'adamas') ?> </span><br>
                                        <img src="<?php echo ADAMAS_FRAMEWORK_ASSETS . '/images/ajax-loader.gif' ?>" />
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

                <script type="text/javascript">
                    jQuery(document).ready(function ($) {

                        $('#import_demo').on('change', function (e) {
                            var optionSelected = $("option:selected", this).val();
                            $('#wpus-import-demo-image').attr('src', 'http://adamas.wpuberstudio.com/import/' + optionSelected + '/screenshot.png' );
                        });

                        $(document).on('click', '#wpus-import-button', function(e) {

                            e.preventDefault();

                            if ($( "#import_option" ).val() == "") {
                                alert('Please select Import Type.');
                                return false;
                            }

                            if (confirm('Are you sure, you want to import Demo Data now?')) {

                                $('.wpus-import-load').addClass('active');

                                var import_opt  = $( "#import_option" ).val();
                                var import_expl = $( "#import_demo" ).val();
                                var str         = 'content.xml';

                                if (import_opt == 'content') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'adamas_import_content',
                                            xml: str,
                                            example: import_expl,
                                            import_attachments: $("#import_attachments").val()
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            $('.wpus-import-load').removeClass('active');
                                            $('.wpus-import-success').addClass('active'); 
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                        }
                                    });
                                } else if (import_opt == 'widgets') {
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'adamas_import_widgets',
                                            example: import_expl
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            $('.wpus-import-load').removeClass('active');
                                            $('.wpus-import-success').addClass('active');
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                        }
                                    });
                                    $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                                } else if (import_opt == 'options'){
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'adamas_import_options',
                                            example: import_expl
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            $('.wpus-import-load').removeClass('active');
                                            $('.wpus-import-success').addClass('active');
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                        }
                                    });
                                    $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                                } else if (import_opt == 'all_content'){
                                    jQuery.ajax({
                                        type: 'POST',
                                        url: ajaxurl,
                                        data: {
                                            action: 'adamas_import_all_content',
                                            xml: str,
                                            example: import_expl,
                                            import_attachments: $("#import_attachments").val()
                                        },
                                        success: function(data, textStatus, XMLHttpRequest){
                                            $('.wpus-import-load').removeClass('active');
                                            $('.wpus-import-success').addClass('active');
                                        },
                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                        }
                                    });
                                }
                            }

                            return false;
                        });
                    });
                </script>

            </div>
        </div>
    <?php   
    }

    /**
     * Import content
     */
    public function import_content( $file ) {
        if ( ! class_exists( 'WP_Importer' ) ) {

            echo $file;

            ob_start();

            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            require_once( $class_wp_importer );
            require_once( ADAMAS_CORE_PLUGIN_PATH . '/import/class.wordpress-importer.php' );
            $adamas_import = new WP_Import();
            set_time_limit(0);
            $adamas_import->fetch_attachments = $this->attachments;
            $returned_value = $adamas_import->import($file);

            if ( is_wp_error( $returned_value ) ) {
                $this->message = esc_html__( 'An Error Occurred During Import', 'adamas' );
            } else {
                $this->message = esc_html__( 'Content imported successfully', 'adamas' );
            }

            ob_get_clean();

        } else {
            $this->message = esc_html__( 'Error loading files', 'adamas' );
        }
    }

    /**
     * Import sidebars
     */
    public function import_widgets( $file, $file2 ) {
        $this->import_custom_sidebars( $file2 );
        $options = $this->file_options( $file );

        foreach ( ( array ) $options['widgets'] as $adamas_widget_id => $adamas_widget_data) {
            update_option( 'widget_' . $adamas_widget_id, $adamas_widget_data );
        }

        $this->import_sidebars_widgets( $file );
        $this->message = esc_html__( 'Widgets imported successfully', 'adamas' );
    }

    /**
     * Import widgets
     */
    public function import_sidebars_widgets( $file ) {

        $adamas_sidebars = get_option( 'sidebars_widgets' );
        unset( $adamas_sidebars['array_version'] );
        $data = $this->file_options( $file );

        if ( is_array( $data['sidebars']) ) {
            $adamas_sidebars = array_merge( ( array ) $adamas_sidebars, ( array ) $data['sidebars'] );
            unset( $adamas_sidebars['wp_inactive_widgets'] );
            $adamas_sidebars = array_merge( array( 'wp_inactive_widgets' => array() ), $adamas_sidebars );
            $adamas_sidebars['array_version'] = 2;
            wp_set_sidebars_widgets( $adamas_sidebars );
        }
    }

    /**
     * Import sidebars
     */
    public function import_custom_sidebars( $file ) {
        $options = $this->file_options( $file );
        update_option( 'adamas_sidebars', $options );
        $this->message = esc_html__( 'Custom sidebars imported successfully', 'adamas' );
    }

    /**
     * Import options
     */
    public function import_options( $file ) {
        $options = $this->file_options( $file );
        update_option( 'adamas_data', $options );
        $this->message = esc_html__( 'Options imported successfully', 'adamas' );
    }

    /**
     * Import menus
     */
    public function import_menus( $file ) {

        global $wpdb;
        $adamas_terms_table = $wpdb->prefix . 'terms';
        $this->menus_data = $this->file_options( $file );
        $menu_array = array();

        foreach ( $this->menus_data as $registered_menu => $menu_slug ) {

            $term_rows = $wpdb->get_results( "SELECT * FROM $adamas_terms_table where slug='{$menu_slug}'", ARRAY_A );

            if ( isset($term_rows[0]['term_id'] ) ) {
                $term_id_by_slug = $term_rows[0]['term_id'];
            } else {
                $term_id_by_slug = null;
            }

            $menu_array[$registered_menu] = $term_id_by_slug;
        }

        set_theme_mod( 'nav_menu_locations', array_map( 'absint', $menu_array ) );

    }

    /**
     * Import setteings pages
     */
    public function import_settings_pages( $file ) {
        $pages = $this->file_options( $file );
        foreach ( $pages as $adamas_page_option => $adamas_page_id ) {
            update_option( $adamas_page_option, $adamas_page_id );
        }
    }

    /**
     * Get options file
     */
    public function file_options( $file ) {

        $file_content = '';
        $file_content = $this->file_contents( $file );

        if ( $file_content ) {

            $unserialized_content = unserialize( base64_decode( $file_content ) );

            if ( $unserialized_content ) {
                return $unserialized_content;
            }

        }

        return false;
    }

    /**
     * Get contents file
     */
    function file_contents( $path ) {
        $url      = "http://adamas.wpuberstudio.com/import/" . $path;
        $response = wp_remote_get( $url );
        $body     = wp_remote_retrieve_body( $response );
		return $body;
    }
    
}

global $wpus_import;
$wpus_import = new WpusImport();

/**
 * Import Content
 *
 * @since 1.0
 */ 
function adamas_import_content() {

    global $wpus_import;

    if ( $_POST['import_attachments'] == 'yes' ) {
        $wpus_import->attachments = true;
    } else {
        $wpus_import->attachments = false;
    }

    $folder = adamas_import_folder();
    $wpus_import->import_content( $folder . $_POST['xml'] );

    die();
}

add_action('wp_ajax_adamas_import_content', 'adamas_import_content');

/**
 * Import Widgets
 *
 * @since 1.0
 */ 
function adamas_import_widgets() {
    global $wpus_import;
    $folder = adamas_import_folder();
    $wpus_import->import_widgets( $folder . 'widgets.txt', $folder . 'sidebars.txt' );
    die();
}

add_action('wp_ajax_adamas_import_widgets', 'adamas_import_widgets');

/**
 * Import Options
 *
 * @since 1.0
 */ 
function adamas_import_options() {
    global $wpus_import;
    $folder = adamas_import_folder();
    $wpus_import->import_options( $folder . 'options.txt' );
    die();
}

add_action('wp_ajax_adamas_import_options', 'adamas_import_options');

/**
 * Import All Content
 *
 * @since 1.0
 */
function adamas_import_all_content() {

    global $wpus_import;

    $folder = adamas_import_folder();

    if ( $_POST['import_attachments'] == 'yes' ) {
        $wpus_import->attachments = true;
    } else {
        $wpus_import->attachments = false;
    }

    $wpus_import->import_content( $folder . $_POST['xml'] );
    $wpus_import->import_settings_pages( $folder . 'settingpages.txt' );
    $wpus_import->import_options( $folder . 'options.txt' );
    $wpus_import->import_menus( $folder . 'menus.txt' );
    $wpus_import->import_widgets( $folder . 'widgets.txt', $folder . 'sidebars.txt' );
    
    die();
}

add_action('wp_ajax_adamas_import_all_content', 'adamas_import_all_content');

/**
 * Get Demo Folder
 *
 * @since 1.0
 */
function adamas_import_folder() {
    $folder = ! empty( $_POST['example'] ) ? $_POST['example'] . "/" : "demo/";
    return $folder;
}