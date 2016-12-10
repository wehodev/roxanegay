<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

    <?php
    // Include the site footer template
    get_template_part( 'partials/footer/footer' ); ?>

</div><!-- SITE WRAPPER (start in the header.php) -->

<?php
// Include the site side menu template
get_template_part( 'partials/header/menu-side' ); ?>

<?php
// Include the site search template
get_template_part( 'partials/search' ); ?>

<?php
// Include the site cart template
get_template_part( 'partials/woocommerce/cart' ); ?>

<?php
// Include the back to top template
get_template_part( 'partials/back_to_top' ); ?>

<div id="site-overlay" class="site-overlay"></div>

<?php
/* Always have wp_footer() just before the closing </body>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to reference JavaScript files.
 */
wp_footer(); ?>

</body>
</html>