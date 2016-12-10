<?php
/**
 * Visual Composer Helper Class
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

class WpusVcHelper {

    /**
     * Return image size
     *
     * @since 1.0
     */
    public static function get_image_size( $image_size = 'full', $image_width = '', $image_height = '' ) {

        $image_width  = absint( $image_width );
        $image_height = absint( $image_height );
        
        if ( 'custom' == $image_size && ( $image_width || $image_height ) ) {
            $image_width  = $image_width  ? $image_width  : '';
            $image_height = $image_height ? $image_height : '';
            $size         = array( $image_width, $image_height );
        } else {
            $size = 'custom' != $image_size ? $image_size : 'full';
        }

        return $size;
    }

    /**
     * Return vc autocomplete terms
     *
     * @since 1.0
     */
    public static function autocomplete_terms( $terms ) {

        // If empty return
        if ( empty( $terms ) ) {
            return;
        }

        $taxonomies      = get_terms( $terms, array( 'hide_empty' => false ) );
        $taxonomies_list = array();

        if ( $taxonomies ) {
            foreach ( $taxonomies as $term ) {
                $taxonomies_list[] = array(
                    'label' => $term->name,
                    'value' => $term->term_id,
                );
            }
        }

        return $taxonomies_list;
    }

    /**
     * Building links using link param
     *
     * @since 1.0
     */
    public static function build_link( $link, $text = '', $class = '' ) {

        // If empty return
        if ( empty( $link ) || '||' == $link ) {
            return $text;
        }

        // Build link
        $link     = array_filter( vc_build_link( $link ) );
        $link_url = isset( $link['url'] ) ? ' href="' . esc_url( $link['url'] ) . '"' : '';

        // Return if url is empty
        if ( empty( $link_url ) ) {
            return $text;
        }

        $link_title  = isset( $link['title'] ) ? ' title="' . esc_attr( $link['title'] ) . '"' : '';
        $link_target = isset( $link['target'] ) ? ' target="' . trim( esc_attr( $link['target'] ) ) . '"' : '';
        $link_class  = AdamasHelper::get_html_class( $class );

        // Return
        return '<a' . $link_class . $link_url . $link_title . $link_target . '>' . $text . '</a>';
    }

    /**
     * Get hover image class
     *
     * @since 1.0
     */
    public static function get_hover_image_class( $class ) {
        switch ( $class ) {
            case 'grow':
                return 'shrink';
                break;
            case 'shrink':
                return 'grow';
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Return masonry image size
     *
     * @since 1.0
     */
    public static function get_masonry_size( $i, $style ) {

        $imagesize = '';

        if ( $style == 'style-1' ) {
            switch( $i ) {
                case 2:
                case 4:
                case 5:
                case 6:
                    $imagesize = 'size-tall';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }
        } else if ( $style == 'style-2' ) {
            switch( $i ) {
                case 1:
                case 7:
                    $imagesize = 'size-widetall';
                    break;
                case 2:
                case 8:
                    $imagesize= 'size-wide';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }
        } else if ( $style == 'style-3' ) {
            switch($i) {
                case 1:
                case 5:
                case 9:
                    $imagesize = 'size-wide';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }   
        } else if ( $style == 'style-4' ) {
            switch( $i ) {
                case 1:
                    $imagesize = 'size-widetall';
                    break;
                case 3:
                case 5:
                    $imagesize = 'size-tall';
                    break;
                case 6:
                    $imagesize = 'size-wide';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }   
        } else if ( $style == 'style-5' ) {
            switch( $i ) {
                case 1 :
                case 8 :
                    $imagesize = 'size-widetall';
                    break;
                case 4 :
                    $imagesize= 'size-tall';
                    break;
                case 2 :
                case 11 :
                    $imagesize= 'size-wide';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }
        } else if ( $style == 'style-6' ) {
            switch( $i ) {
                case 3 :
                    $imagesize = 'size-widetall';
                    break;
                case 9 :
                case 12 :
                    $imagesize= 'size-wide';
                    break;
                default:
                    $imagesize = 'size-regular';
                    break;
            }
        } 

        return $imagesize;
    }

    /**
     * Get google font
     *
     * @since 1.0
     */
    public static function get_google_font( $typo ) {

        // If empty return
        if ( empty( $typo ) ) {
            return false;
        }

        preg_match( '/font-family\s*:\s*([^;]*);?/', $typo, $matches );

        if ( isset( $matches[1] ) ) {
            AdamasHelper::enqueue_google_font( $matches[1] );
        }
    }



}