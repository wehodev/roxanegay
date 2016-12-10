<?php
/**
 * Adamas Blog Class
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

class AdamasBlog {

    /**
     * Get blog layout
     *
     * @since 1.0
     */
    public static function layout( $class = '' ) {

        $layout = apply_filters( 'layout', array(
            'no-sidebar'   == adamas_get_page_layout() ? 'col-md-12'     : 'col-md-9',
            'left-sidebar' == adamas_get_page_layout() ? 'col-md-push-3' : '',
            $class,
        ) );

        AdamasHelper::html_class( $layout );
    }
    
    /**
     * Get blog template
     *
     * @since 1.0
     */
    public static function template() {

        $blog_template = adamas_get_data( 'blog_template', '', 'large' );

        if ( isset( $_GET['blog_template'] ) ) {
            $blog_template = esc_attr( $_GET['blog_template'] );
        }

        return apply_filters( 'adamas_blog_template', $blog_template  );
    }

    /**
     * Get blog class
     *
     * @since 1.0
     */
    public static function classes( $class = '' ) {

        if ( 'grid' == self::template() || 'masonry' == self::template() ) {
            $_class = 'grid';
        } else {
            $_class = self::template();
        }

        $blog_class = AdamasHelper::get_html_class( array(
            'wpus-blog',
            'wpus-blog-' . $_class,
            'wpus-grid',
            $class,
        ), false );

        echo apply_filters( 'adamas_blog_class', $blog_class  );
    }

    /**
     * Get blog atributes
     *
     * @since 1.0
     */
    public static function atributes() {
        if ( 'grid' == self::template() ) {
            echo apply_filters( 'adamas_blog_grid_atributes', AdamasHelper::get_html_attributes( array(
                'column-lg'     => 'no-sidebar' == adamas_get_page_layout() ? '3' : '2',
                'column-md'     => 'no-sidebar' == adamas_get_page_layout() ? '3' : '2',
                'column-sm'     => '2',
                'column-xs'     => '1',
                'margin-right'  => '40',
                'margin-bottom' => '60',
                'layout'        => 'fitRows',
            ) ) );
        } elseif ( 'masonry' == self::template() ) {
            echo apply_filters( 'adamas_blog_masonry_atributes', AdamasHelper::get_html_attributes( array(
                'column-lg'     => 'no-sidebar' == adamas_get_page_layout() ? '3' : '2',
                'column-md'     => 'no-sidebar' == adamas_get_page_layout() ? '3' : '2',
                'column-sm'     => '2',
                'column-xs'     => '1',
                'margin-right'  => '40',
                'margin-bottom' => '60',
            ) ) );
        } elseif ( 'large' == self::template()) {
            echo apply_filters( 'adamas_blog_large_atributes', AdamasHelper::get_html_attributes( array(
                'column-lg'     => '1',
                'column-md'     => '1',
                'column-sm'     => '1',
                'column-xs'     => '1',
                'margin-bottom' => '70',
            ) ) );
        } elseif ( 'medium' == self::template() ) {
            echo apply_filters( 'adamas_blog_medium_atributes', AdamasHelper::get_html_attributes( array(
                'column-lg'     => '1',
                'column-md'     => '1',
                'column-sm'     => '1',
                'column-xs'     => '1',
                'margin-bottom' => '60',
            ) ) );
        }
    }

    /**
     * Return post thumbnail
     *
     * @since 1.0
     */ 
    public static function get_thumbnail( $size = 'full' ) {

        // Return if password required
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        // Get thumbnail
        $thumbnail = get_the_post_thumbnail( get_the_ID(), $size );

        // Return if $thumbnail is empty
        if ( empty( $thumbnail ) ) {
            return;
        }

        if ( ! is_single() ) {
            $thumbnail = sprintf( '
                <a href="%s" title="%s" rel="bookmark">%s</a>',
                get_the_permalink(),
                get_the_title(),
                $thumbnail
            );
        }

        // Return
        return apply_filters( 'adamas_post_thumbnail', '<div class="entry-media">' . $thumbnail . '</div>' );

    }

    /**
     * Echo post thumbnail
     *
     * @since 1.0
     */
    public static function thumbnail( $size = 'full' ) {
        echo self::get_thumbnail( $size );
    }

    /**
     * Return post video
     *
     * @since 1.0
     */ 
    public static function get_video() {

        // Return if password required
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Return if video is disabled
        if ( is_single() && ! adamas_get_meta_data( 'post_featured_image' ) ) {
            return;
        }

        // Get video URL
        $video_url = get_post_meta( get_the_ID(), 'adamas_post_video_url', true );

        // Return if $video_url is empty
        if ( empty( $video_url ) ) {
            return;
        }

        // Build post video
        $html = '<div class="entry-media">';
            $html .= '<div class="wpus-video-embed">' . wp_oembed_get( $video_url ) . '</div>';
        $html .= '</div>';

        // Return
        return apply_filters( 'adamas_post_video', $html );

    }

    /**
     * Echo post video
     *
     * @since 1.0
     */
    public static function video() {
        echo self::get_video();
    }

    /**
     * Return post audio
     *
     * @since 1.0
     */ 
    public static function get_audio() { 

        // Return if password required
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Return if audio is disabled
        if ( is_single() && ! adamas_get_meta_data( 'post_featured_image' ) ) {
            return;
        }

        // Get audio URL
        $mp3   = get_post_meta( get_the_ID(), 'adamas_post_audio_mp3', true );
        $ogg   = get_post_meta( get_the_ID(), 'adamas_post_audio_ogg', true );
        $embed = get_post_meta( get_the_ID(), 'adamas_post_audio_embed', true );

        // Build post audio
        $html = '';

        if ( !empty( $embed ) ) {

            $html .= stripslashes( htmlspecialchars_decode( $embed ) );

        } elseif ( !empty( $mp3 ) || ! empty( $ogg ) ) {

            $html = '[audio ';                
                if ( !empty( $mp3 ) ) { $html .= 'mp3="' . $mp3 . '" '; }
                if ( !empty( $ogg ) ) { $html .= 'ogg="' . $ogg . '"'; }                  
            $html .= ']';
            $html = do_shortcode( $html ); 

        } else {
            return;
        }

        // Return
        return apply_filters( 'adamas_post_audio', '<div class="entry-media">' . $html . '</div>' );

    }

    /**
     * Echo post audio
     *
     * @since 1.0
     */
    public static function audio() {
        echo self::get_audio();
    }

    /**
     * Return post gallery
     *
     * @since 1.0
     */ 
    public static function get_gallery( $size = 'full' ) {

        // Return if password required
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Return if video is disabled
        if ( is_single() && ! adamas_get_meta_data( 'post_featured_image' ) ) {
            return;
        }

        // Get data
        $ids = get_post_meta( get_the_ID(), 'adamas_post_gallery_ids', true );
        $ids = explode( ',', $ids );
        $ids = array_filter( $ids );

        // Return if ids is empty
        if ( ! is_array( $ids ) || empty( $ids ) ) {
            return;
        }

        // Wrap atributes
        $wrap_atributes = apply_filters( 'adamas_post_gallery_args', array(
            'single'      => 'true',
            'arrows'      => 'true',
            'auto-height' => 'true',
        ) );

        // Build post gallery
        $html = '<div class="entry-media">';
            $html .= '<div class="wpus-slider wpus-carousel arrows-outline"' . AdamasHelper::get_html_attributes( $wrap_atributes ) . '>';
                foreach ( $ids as $id ) {
                    $html .= wp_get_attachment_image( $id, $size );
                }
            $html .= '</div>';
        $html .= '</div>';

        // Return
        return apply_filters( 'adamas_post_gallery', $html );

    }

    /**
     * Echo post gallery
     *
     * @since 1.0
     */
    public static function gallery( $size = 'full' ) {
        echo self::get_gallery( $size);
    }

}