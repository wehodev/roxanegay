<?php get_header(); ?>

	<?php
		query_posts($query_string . "&showposts=-1");
		if (have_posts()) :
	?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	<?php } ?>
	<?php if (is_search()) : ?> <h2 class="pagetitle">Search for &#8220;<?php the_search_query(); ?>&#8221;</h2><?php endif; ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php $count++; ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadata"><?php the_tags('', ', ', '<br />'); ?></p>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small>In <?php the_category(', ') ?> on <strong><?php the_time(get_option('date_format')) ?></strong> at <strong><?php the_time() ?></strong></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>	
					<?php wp_link_pages(); ?>
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
				</div>						
			</div>
			
			<div id="showcomments" class="archive"><div class="divider"></div><a href="<?php the_permalink() ?>#comments">&#9654; <?php comments_number('Comment', 'View 1 Comment', 'View % Comments'); ?></a></div>


		<?php endwhile; ?>

		<?php if ( is_day() || is_month() || is_year() ) : ?>
			<div class="navigation">
				<div class="previous">
					<?php previous_archive_link('<span class="arrow">&laquo;</span> <span class="link"><span class="before">'.__('Before').'</span><span class="title">%title</span><span class="date">&nbsp;</span> </span>');?>
				</div>
				<div class="next">
					<?php next_archive_link('<span class="link"> <span class="after">'.__('After').'</span> <span class="title">%title</span> <span class="date">&nbsp;</span> </span> <span class="arrow">&raquo;</span>');?>
				</div>
				<div class="clear"></div>
			</div>
		<?php endif; ?>

	<?php else : ?>
		<h2 class="pagetitle">Nothing Found</h2>
		<div class="post" style="text-align: center;">
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
