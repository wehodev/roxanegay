<?php
/**
 * Adamas Theme Filters Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasThemeFiltres {

   /**
	 * Constructor of the class
	 *
	 * @since 1.0
	 */
    public function __construct() {

    	// Fixes HTTPS issues with wp_get_attachment_url()
        add_filter( 'wp_get_attachment_url', array( $this, 'ssl_for_attachments_fix' ) );

        // Excerpt length
        add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );

        // Excerpt more
        add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );

        // Remove tag cloud inline style
        add_filter( 'wp_generate_tag_cloud', array( $this, 'remove_tag_inline_style' ), 10, 3 );

        // Limit number of tags cloud widget
        add_filter( 'widget_tag_cloud_args', array( $this, 'tags_limit' ) );

        // Customising the output of wp_list_categories
        add_filter( 'wp_list_categories', array( $this, 'categories_list_count' ) );

        // Customising the output of get_archives_link
        add_filter( 'get_archives_link', array( $this, ( 'archives_list_count' ) ) );

        // Remove Shortcodes from Search Results Excerpt
        add_filter( 'the_excerpt', array( $this, 'remove_shortcode_from_excerpt' ) );

        // Password form
        add_filter( 'the_password_form', array( $this, 'password_form' ) );
    }

    /**
     * Fixes HTTPS issues with wp_get_attachment_url()
     *
     * @since 1.0
     */
    public static function ssl_for_attachments_fix( $url ) {

        $http     = site_url( FALSE, 'http' );
        $https    = site_url( FALSE, 'https' );
        $isSecure = false;

        if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) {
            $isSecure = true;
        }

        return ( $isSecure ) ? str_replace( $http, $https, $url ) : $url;
    }

    /**
     * Excerpt length
     *
     * @since 1.0
     */
    public static function excerpt_length( $length ) {

        $new_length = adamas_get_data( 'blog_excerpt_length', '', '17' );

        if ( isset( $_GET['excerpt'] ) ) {
            $new_length = intval( $_GET['excerpt'] );
        }

        if ( is_search() ) {
            $new_length = adamas_get_data( 'search_excerpt_length', '', '55' );
        }

        if ( $new_length > 0 ) {
            return $new_length;
        }

        return $length;
    }

    /**
     * Excerpt more
     *
     * @since 1.0
     */
    public static function excerpt_more( $more ) {
        return '&hellip;';
    }

    /**
     * Remove tag cloud inline style
     *
     * @since 1.0
     */
    public static function remove_tag_inline_style( $tag_string ) {
        return preg_replace( "/style='font-size:.+pt;'/", '', $tag_string );
    }

    /**
     * Limit number of tags cloud widget
     *
     * @since 1.0
     */
    public static function tags_limit( $args ) {

        if ( isset( $args['taxonomy'] ) && $args['taxonomy'] == 'post_tag' ) {
            $args['number'] = 12;
        }

        return $args;
    }

    /**
     * Customising the output of wp_list_categories
     *
     * @since 1.0
     */
    public static function categories_list_count( $output ) {
        $output = str_replace( '</a> (', '<span class="post-count">(', $output );
        $output = str_replace( ')', ')</span></a>', $output );
        return $output;
    }

    /**
     * Customising the output of get_archives_link
     *
     * @since 1.0
     */
    public static function archives_list_count( $output ) {

        if ( strpos( $output, '</a>&nbsp;(') ) {
            $output = str_replace( '</a>&nbsp;(', '<span class="post-count">(', $output );
            $output = str_replace( ')', ')</span></a>', $output );
        }

        return $output;
    }

    /**
     * Remove Shortcodes from Search Results Excerpt
     *
     * @since 1.0
     */
    public static function remove_shortcode_from_excerpt( $excerpt ) {

        if ( is_search() ) {
            $excerpt = strip_shortcodes( $excerpt );
        }

        return $excerpt;
    }

    /**
     * Password form
     *
     * @since 1.0
     */
    public static function password_form() {
        global $post;

        $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

        $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
        ' . esc_html__( "To view this protected post, enter the password below:", 'adamas' ) . '
        <input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'adamas' ) . '" />
        </form>
        ';

        return $o;
    }

}

$adamas_theme_filtres = new AdamasThemeFiltres;
