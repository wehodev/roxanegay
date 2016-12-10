<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
             

		<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">

				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				

				<div class="entry">
					<?php the_content('READ MORE &gt;'); ?>
				</div>

				<small><?php the_time('n/j/y g:ia') ?> ~ <?php the_category(' &amp; ') ?> ~ <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '~ ', '  '); ?></small>
			</div>

<?php ?>

		<?php endwhile; ?>
<div class="post">

			<div class="alignleft"><?php next_posts_link('&lt; older') ?></div>
			<div class="alignright"><?php previous_posts_link('newer &gt;') ?></div>

</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>


<?php get_footer(); ?>
