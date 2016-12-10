<?php
/**
 * Search form template
 *  
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
	<input id="s" class="search-field" type="search" name="s" placeholder="<?php esc_html_e( 'Search and hit enter...', 'adamas' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
</form>