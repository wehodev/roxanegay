<?php get_header(); ?>
<script type="text/javascript" charset="utf-8">
/*<![CDATA[ */
<?php if($_GET['preview']) : ?> setTimeout( function(){ depo_init(); }, 2000); <?php endif; ?>

jQuery(document).ready(depo_init);

function depo_init() {
	var biggest = 0;
	jQuery('#content .post').each(function() {
		element = jQuery(this).attr('clientHeight');
		if(element > biggest) {
			biggest = element;
			entry_height = jQuery(this).attr('clientHeight');
		}
	});
	jQuery('#content .post').css('height', entry_height);
	jQuery('#content .post:gt(0)').css('border-left', '1px solid #999');
	jQuery('#content .readmore a').each(function() {
		var item  = jQuery(this);
		var width = (item.width() / 2) + 7;
		item.css('margin-left', -width);
	});
}
/* ]]> */
</script>

<div class="group">
	<?php if (have_posts()) : ?>
		<?php query_posts('showposts=3'); ?>
		<?php while (have_posts()) : the_post(); 
			if( $post->ID == $do_not_duplicate or $count > 2) continue; update_post_caches($posts); $count++; ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadata"><?php the_tags('', ', ', '<br />'); ?></p>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small>In <?php the_category(', ') ?> on <strong><?php the_time(get_option('date_format')) ?></strong> at <strong><?php the_time() ?></strong></small>

				<div class="entry">
					<?php the_content(' '); ?>

					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
				</div>
				<div class="readmore">
					<?php
					if((!strpos($post->post_content, '<!--more')) && !strpos($post->post_content, '<!--nextpage'))
						$full = true;
					else
						$full = false;

					if(strpos($post->post_content, '<!--nextpage'))
						$next = '2/';
					else
						$next = '';

					if( $full == true && $post->comment_status == 'open' ) { ?>
						<a href="<?php the_permalink() ?>#comments" title="Comment on <?php the_title_attribute(); ?>">Comment&nbsp;&raquo; </a>
					<?php } elseif(!$full && $post->comment_status == 'open') { ?>
						<a href="<?php the_permalink(); echo $next; ?>" title="Comment and continue reading <?php the_title_attribute(); ?>">Read&nbsp;More&nbsp;and&nbsp;Comment&nbsp;&raquo;</a>
					<?php } elseif(!$full && $post->comment_status == 'closed') { ?>
						<a href="<?php the_permalink(); echo $next; ?>" title="Continue reading <?php the_title_attribute(); ?>">Read&nbsp;More&raquo;</a>
					<?php } else { ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Permalink&nbsp;&raquo; </a>
					<?php } ?>

				</div>
				
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
