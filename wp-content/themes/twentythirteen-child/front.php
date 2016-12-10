<?php
/*
Template Name: Front
*/
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Tinos:400,400italic|Open+Sans+Condensed:300|Libre+Baskerville:400,400italic|Domine' rel='stylesheet' type='text/css'>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script language="javascript">
$(document).ready(function(){
	$('#blurbs .slide');
	setInterval(function(){
		$('#blurbs .slide').filter(':visible').fadeOut(4000,function(){
			if($(this).next('li.slide').size()){
				$(this).next().fadeIn(2000);
			}
			else{
				$('#blurbs .slide').eq(0).fadeIn(2000);
			}
		});
	},4000);	
});
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site full-background">						
							

		<div id="main" class="site-main">

	<div id="primary" class="content-area transparent">
		<div id="content" class="site-content transparent" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header" style="display: none;">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content online-page front-content">
					
					<div id="front-cover" alt="An Untamed State Cover">
						<a href="an-untamed-state"><img src="wp-content/themes/twentythirteen-child/images/front-cover.jpg"></a>
					</div>
					
					<div id="blurb-wrapper">
							<ul id="blurbs">
					            <li class="slide">
					              <div class="quote">
					              	&#8220;<em>An Untamed State</em> is written at a pace that will match your racing heart.&#8221;
					              </div>
					              <br/>
					                <div class="author">&mdash;Edwidge Danticat,<br/>
					                author of <em>Breath, Eyes, Memory</em>
					                </div>
					            </li>
					            <li class="slide" style="display: none;">
					             <div class="quote">
					             	&#8220;<em>An Untamed State</em> is magical and dangerous. I could not put it down.&#8221;</div>
					              <br/>
					                <div class="author">&mdash;Tayari Jones,<br/>
					                author of <em>Silver Sparrow</em><br />
					                </div>
					            </li>
					            <li class="slide" style="display: none;">
					             <div class="quote">
					             	&#8220;A harrowing, suspenseful novel. Roxane Gay is a remarkable writer.&#8221;</div>
					              <br/>
					                <div class="author">&mdash;Tom Perrotta,<br/>
					                author of <em>Little Children</em><br />
					                </div>
					            </li>
					            <li class="slide" style="display: none;">
					             <div class="quote">
					             	&#8220;Awesome, powerful, impossible to ignore. Arrives like a hurricane.&#8221;</div>
					              <br/>
					                <div class="author">&mdash;Mat Johnson,<br/>
					                author of <em>Pym</em><br />
					                </div>
					            </li>
					          </ul>
					</div><!-- #blurb-wrapper -->

					<div id="order-wrapper">
						<div class="order-left">
							<a href="http://www.indiebound.org/book/9780802122513" class="indiebound" target="_blank" title="Order An Untamed State on IndieBound"></a>
						</div>
						<div class="order-right">
							<a href="http://www.barnesandnoble.com/w/an-untamed-state-roxane-gay/1116903503" class="barnes-noble" target="_blank" title="Order An Untamed State on Barnes & Noble"></a>
							<a href="http://www.amazon.com/An-Untamed-State-Roxane-Gay/dp/0802122515" class="amazon" target="_blank" title="Order An Untamed State on Amazon"></a>
						</div>
					</div>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

				<div id="front-header">
					<img src="wp-content/themes/twentythirteen-child/images/header.png">
				</div>

				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<div class="social-header-front">
						<a href="http://twitter.com/rgay" class="twitter" title="Twitter link" target="_blank"></a>
						<a href="https://www.facebook.com/roxane.gay" class="facebook" title="Facebook link" target="_blank"></a>
					</div><!-- social-header-front -->
				</nav><!-- #site-navigation -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php endwhile; ?>

			<div id="front-footer"></div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>