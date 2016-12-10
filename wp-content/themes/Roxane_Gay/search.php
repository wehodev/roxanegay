<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
<div class="post">


		<h2 class="pagetitle">Search Results for <em><?php the_search_query(); ?></em></h2>
</div>


		<?php while (have_posts()) : the_post(); ?>
		

<div class="post">

		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				

				<div class="entry">
					<?php the_content('READ MORE &gt;'); ?>
				</div>

				<small><?php the_time('l') ?> ~ <?php the_category(' &amp; ') ?> ~ <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '~ ', '  '); ?></small>
			</div>

		<?php endwhile; ?>

<div class="post">

			<div class="alignleft"><?php next_posts_link('&lt; OLDER POSTS') ?></div>
			<div class="alignright"><?php previous_posts_link('NEWER POSTS &gt;') ?></div>

</div>

	<?php else : ?>
<div class="post">

		<h2>Not Found, Sorry.</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>