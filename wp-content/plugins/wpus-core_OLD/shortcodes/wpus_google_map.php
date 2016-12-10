<?php
/**
 * Shortcode: Google Map
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

function adamas_google_map_shortcode( $atts, $content=null, $code ) {

    // Extract shortcodes variables
    extract( shortcode_atts( array(

        // General tab
        'latitude'          => '51.51526',
        'longitude'         => '-0.13218',
        'height'            => '500',
        'zoom'              => '17',
        'map_scrollwheel'   => 'false',
        'map_controls'      => 'true',
        'map_zoom'          => 'true',
        
        // Style tab
        'type'              => 'ROADMAP',
        'style'             => '',
        'custom_style'      => '',
        
        // Marker tab
        'marker_image'      => '',
        'infowindow'        => '',
        'infowindowdefault' => '',
        
        // Design tab
        'css'               => '',
        
        // Extra tab
        'el_id'             => '',
        'el_class'          => '',
        'el_hidden'         => '',

    ), $atts ) );

    // Print google map script
    wp_print_scripts( 'google-maps-api' );

    // Declare variables
    $unique_id = AdamasHelper::get_unique_id();
    $build_css = '';
    $map_style = '';
    $marker    = '';

    // Wrap class
    $wrap_class = array(
        'wpus-google-map-wrap',
        $el_class,
        $unique_id,
        $el_hidden,
    );

    // Generate CSS style
    if ( $wrap_css = AdamasHelper::get_vc_style( $css ) ) {
        $build_css .= ".wpus-google-map-wrap.{$unique_id} {{$wrap_css}}";
        AdamasHelper::build_css( $build_css );
    }
    
    // Map style
    if ( 'greyscale' == $style ) {
        $map_style = 'styles:[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],';
    } elseif ( 'dark' == $style ) {
        $map_style = 'styles:[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]}],';
    } elseif ( 'custom' == $style ) {
        $map_style = 'styles:' . rawurldecode( base64_decode( $custom_style ) ). ',';
    }

    // Marker image
    if ( $marker_image ) {
        $marker = wp_get_attachment_image_src( $marker_image, 'full' );
        $marker = $marker[0];
    }

    // Shortcode markup
    ob_start(); 
    
    ?>    
        
        <script type="text/javascript">
        jQuery( document ).ready( function ($) {
            "use strict";

            google.maps.event.addDomListener( window, 'load', init );

            function init() {

                var myLatlng = new google.maps.LatLng(<?php echo esc_js( $latitude ) ?>, <?php echo esc_js( $longitude ) ?>);

                var mapOptions = {
                    zoom: <?php echo absint( $zoom ) ?>,
                    center: myLatlng,
                    zoomControl: <?php echo esc_js( $map_zoom ); ?>,
                    scrollwheel: <?php echo esc_js( $map_scrollwheel ); ?>,
                    disableDefaultUI: <?php echo esc_js( $map_controls ); ?>,
                    scaleControl: false,
                    mapTypeId: google.maps.MapTypeId.<?php echo esc_js( $type ); ?>,
                    <?php echo AdamasHelper::do_kses( $map_style ) ?>
                    streetViewControl: false,
                    panControl: false,
                };

                var mapID = new google.maps.Map( document.getElementById('<?php echo esc_js( $unique_id ); ?>'), mapOptions );
                var image = '<?php echo esc_url( $marker ); ?>';

                setTimeout( function() {

                    var marker = new google.maps.Marker({
                        position: mapID.getCenter(),
                        map: mapID,
                        animation: google.maps.Animation.DROP,
                        <?php if ( $marker ) echo 'icon: image,'; ?>
                    });


                    <?php if ( '' != $infowindow ) : ?>

                        var contentString = '<?php echo esc_js( $infowindow ); ?>';
                        var infowindow    = new google.maps.InfoWindow({
                            content: contentString
                        });

                        google.maps.event.addListener( marker, 'click', function() {
                            infowindow.open( mapID, marker );
                        });

                    <?php endif; ?>

                }, 1500 );

                $(window).resize( function () { 
                    var center = mapID.getCenter();
                    google.maps.event.trigger( mapID, 'resize' ); 
                    mapID.setCenter( center );
                });

            }


        });
        </script>
        
        <div<?php AdamasHelper::html_id( $el_id ) . AdamasHelper::html_class( $wrap_class ) ?>>
            <div id="<?php echo esc_attr( $unique_id ); ?>" class="wpus-google-map" style="height:<?php echo absint( $height ) ?>px;"></div>
        </div>

    <?php
    $map_html = ob_get_contents();
    ob_end_clean();

    // Return shortcode
    return $map_html;
}

add_shortcode( 'wpus_google_map', 'adamas_google_map_shortcode' );

/**
 * Enqueue google maps script
 * 
 * @since 1.0
 */
function adamas_google_maps_js() {
    wp_register_script( 'google-maps-api', 'http://maps.google.com/maps/api/js?sensor=false', false, NULL, true );
}

add_action( 'wp_enqueue_scripts', 'adamas_google_maps_js' );