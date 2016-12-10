<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts);  ?>

					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<p class="postmetadata"><?php the_tags('', ', ', '<br />'); ?></p>
						<h2><?php the_title(); ?></h2>
						<small>In <?php the_category(', ') ?> on <strong><?php the_time(get_option('date_format')) ?></strong> at <strong><?php the_time() ?></strong></small>

						<div class="entry">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
							<?php wp_link_pages(); ?>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
						</div>
					</div>

					<?php comments_template(); ?>
					
					<div class="navigation">
						<div class="previous">
								<?php previous_post_link('%link', '<span class="arrow">&laquo;</span> <span class="link"> <span class="before">'.__('Before').'</span> <span class="title">%title</span> <span class="date">%date</span> </span>') ?>
						</div>
						
						<div class="next">
								<?php next_post_link('%link', '<span class="link"> <span class="after">'.__('After').'</span><span class="title">%title</span> <span class="date">%date</span></span> <span class="arrow">&raquo;</span>') ?>
						</div>
						<div class="clear"></div>
					</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
