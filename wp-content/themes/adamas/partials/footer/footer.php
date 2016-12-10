<?php
/**
 * Template: Footer
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! adamas_get_meta_data( 'footer_widgets', '', true ) && ! adamas_get_meta_data( 'footer_copyright', '', true ) ) {
	return; // Return if footer and copyright isn't enabled 
}

// Footer class
$footer_class = apply_filters( 'adamas_footer_class', array(
    'site-footer',
    adamas_get_data( 'footer_fixed' ) ? 'footer-fixed' : '',
) );
?>

<footer id="colophon"<?php AdamasHelper::html_class( $footer_class ); ?>>

	<?php 
    // Include the footer widgets template
    get_template_part( 'partials/footer/widgets' ); ?>

    <?php 
    // Include the footer copyright template
    get_template_part( 'partials/footer/copyright' ); ?>

</footer><!-- #colophon -->