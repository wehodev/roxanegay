<?php 
/**
 * Page Meta Box
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

global $post;
global $wpalchemy_media_access; 
$screen = get_current_screen();
$i = 1;
?>

<div class="wpus-wrap wpus-has-tabs wpus-meta-box">

    <ul class="wpus-tab-header">
        <?php if ( 'post' == $screen->id ) : ?>
        <li><span data-tab="#tab-post">Post</span></li>
        <?php endif; ?>
        <li><span data-tab="#tab-general">General</span></li>
        <li><span data-tab="#tab-hero">Page Header</span></li>
        <li><span data-tab="#tab-footer">Footer</span></li>
    </ul><!-- .wpus-tab-header -->
    
    <?php if ( 'post' == $screen->id ) : ?>
        <?php include( 'post.inc.php' ); ?>
    <?php endif; ?>

    <?php include( 'general.inc.php' ); ?>
    <?php include( 'hero.inc.php' ); ?>
    <?php include( 'footer.inc.php' ); ?>


</div><!-- .wpus-meta-box -->

<script>
	jQuery(function($){

        // Hide Sidebar
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--no-sidebar', function() {       
            $('#wpus--page-sidebar').slideUp();
        });
        
        // Show Sidebar
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--tight-sidebar, #wpus--left-sidebar', function() {      
            $('#wpus--page-sidebar').slideDown();
        });

        // Show / Hide Top Bar
        $('select[name="adamas_page_meta_data[transparent_header]"]').change( function() {
            var get_hero_type = $('select[name="adamas_page_meta_data[transparent_header]"]').val();
            if (get_hero_type === '') {
                $('#wpus--top-bar').slideDown();
            } else {
                $('#wpus--top-bar').slideUp();
            }
        }).trigger('change');

        // Show / Hide Hero Type
        $('select[name="adamas_page_meta_data[hero_type]"]').change( function() {
            var get_hero_type = $('select[name="adamas_page_meta_data[hero_type]"]').val();
            if (get_hero_type === 'revslider') {
                $('#wpus--hero-revslider').fadeIn();
                $('#wpus--hero-slider').fadeOut();
                $('#wpus--hero-basic').fadeOut();
            } else if (get_hero_type === 'slider') {
                $('#wpus--hero-slider').fadeIn();
                $('#wpus--hero-revslider').fadeOut();
                $('#wpus--hero-basic').fadeOut();
            } else if (get_hero_type === 'basic') {
                $('#wpus--hero-basic').fadeIn();
                $('#wpus--hero-slider').fadeOut();
                $('#wpus--hero-revslider').fadeOut();
            } else if (get_hero_type === 'off') {
                $('#wpus--hero-revslider').fadeOut();
                $('#wpus--hero-slider').fadeOut();
                $('#wpus--hero-basic').fadeOut();
            }
        }).trigger('change');

        // Hide Header Height
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--hero-full-screen', function() {       
            $('#wpus--hero-height').slideUp();
        });
        
        // Show Header Height
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--hero-boxed, #wpus--hero-full-width', function() {      
            $('#wpus--hero-height').slideDown();
        });

        // Hide Header Max Width
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--hero-boxed, #wpus--hero-full-screen', function() {       
            $('#wpus--hero-max-width').slideUp();
        });

        // Show Header Max Width
        $('#adamas_page_meta_data_metabox').on('click', '#wpus--hero-full-width', function() {      
            $('#wpus--hero-max-width').slideDown();
        });

	});
</script>