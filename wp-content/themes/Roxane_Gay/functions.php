<?php  
function mytheme_comment($comment, $args, $depth) {  
$GLOBALS['comment'] = $comment; ?>  
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">  
<div id="comment-<?php comment_ID(); ?>">  
<div class="comment-author vcard">  
<?php echo get_avatar($comment,$size='36',$default='<path_to_url>' ); ?>  

<div class="commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link( $comment->comment_ID )) ?>">  
<?php printf(__('%1$s'), get_comment_date('n/j/y g:ia')) ?></a><?php edit_comment_link(__('Edit'),' ~ ','') ?></div>  
  
<?php printf(__('<cite class="fn">%s</cite>  <span class="says">says:</span>'), get_comment_author_link()) ?>  
</div>  
<?php if ($comment->comment_approved == '0') : ?>  
<em><?php _e('Your comment is awaiting moderation.') ?></em>  
<br />  
<?php endif; ?>  
  
<?php comment_text() ?>  
<?php if($args['max_depth']!=$depth) { ?>  
<div class="reply">  
<small><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small>
</div>  
<?php } ?>  
</div>  
<?php 
} 
?>