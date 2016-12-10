<?php
/**
 * Portfolio navigation
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.1.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! adamas_get_data( 'project_nav' ) ) {
	return;
}

?>

<div class="wpus-portfolio-nav">
	<div class="container">

		<?php
			$prev_post = get_previous_post();
			if( $prev_post ) {
			   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
			   echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="prev">'. $prev_title . '</a>';
			}

			$next_post = get_next_post();
			if( $next_post ) {
			   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
			   echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="next">'. $next_title . '</a>';
			}
		?>

	</div>
</div>
