<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts);  ?>

		

					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<p class="postmetadata"><?php the_tags('', ', ', '<br />'); ?></p>
						<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
						<small>In <?php the_category(', ') ?> on <strong><?php the_time(get_option('date_format')) ?></strong> at <strong><?php the_time() ?></strong></small>

						<div class="entry">
							
							<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
							
							<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>
							
							<?php the_content('Read the rest of this entry &raquo;'); ?>

							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
						</div>
						


					</div>

					<div id="showcomments"><a href="#comments">&#9654; <?php comments_number('Comment', 'View 1 Comment', 'View % Comments'); ?></a></div>
					
					<div id="comments">
						<?php comments_template(); ?>
					</div>
					
					<div class="navigation attachment">
						<div class="previous">
							
							<div class="link">
								<span class="title image"><?php previous_image_link() ?></span>
							</div>	
						</div>
						
						<div class="next">
							<div class="link">
								<span class="title image"><?php next_image_link() ?></span>
							</div>	
						</div>
						<div class="clear"></div>
					</div>	

	
	
	
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
