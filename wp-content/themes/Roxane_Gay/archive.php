<?php get_header(); ?>

	<div id="content" class="single">

		<?php if (have_posts()) : ?>
<div class="post">

<?php 
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name); // NOTE: 2.0 bug requires get_userdatabylogin(get_the_author_login());
else :
$curauth = get_userdata(intval($author));
endif;
?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php single_cat_title(); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php single_tag_title(); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php the_time('F Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php echo $curauth->nickname; ?> </h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>

  </div> 

		<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">

				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				

				<div class="entry">
					<?php the_content('READ MORE &gt;'); ?>
				</div>

				<small><?php the_time('l') ?> ~ <?php the_category(' &amp; ') ?> ~ <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '~ ', '  '); ?></small>
			</div>

<?php ?>

		<?php endwhile; ?>
<div class="post">

			<div class="alignleft"><?php next_posts_link('&lt; older') ?></div>
			<div class="alignright"><?php previous_posts_link('newer &gt;') ?></div>

</div>

	<?php else : ?>	
	<div id="post">

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
		</div>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
