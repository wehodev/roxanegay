<?php
/**
 * Template: Preloader
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_data( 'preloader' ) ) {
    return; // Return if preloader isn't enabled
}
?>

<div id="wpus-preloader">
    <div class="wpus-preloader"></div>
</div>