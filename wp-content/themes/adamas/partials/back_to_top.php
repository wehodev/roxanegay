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

if ( ! adamas_get_data( 'back_to_top' ) ) {
    return; // Return if back to top isn't enabled
}
?>

<a href="#" id="back-to-top">
	<i class="fa fa-chevron-up"></i>
</a>