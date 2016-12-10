<?php 
/**
 * The template for displaying comments
 * 
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( post_password_required() ) {
    return; // Return if password is required
}

// Comments area column
$comments_col = apply_filters( 'adamas_post_col', array(
    'no-sidebar'   == adamas_get_page_layout() ? 'col-md-10 centered' : 'col-md-9',
    'left-sidebar' == adamas_get_page_layout() ? 'col-md-push-3' : '',
) );
?>

<div id="comments" class="comments-area">
    <div class="container">
        <div class="row">
            <div<?php AdamasHelper::html_class( $comments_col ); ?>>

                <?php if ( have_comments() ) : ?>
                    <div class="comments-wrap">

                        <h3 class="comments-title">
                            <?php
                                printf( _nx( 'One reply on &ldquo;%2$s&rdquo;', '%1$s replies on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'adamas' ),
                                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                            ?>
                        </h3><!-- .comment-title -->

                        <ol class="comment-list">
                            <?php 
                                wp_list_comments( array( 
                                    'avatar_size' => '100',
                                ) );
                            ?>
                        </ol><!-- .comment-list -->

                        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                            <nav class="comment-navigation" role="navigation">
                                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'adamas' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'adamas' ) ); ?></div>
                            </nav><!-- .comment-navigation -->
                        <?php endif; ?>

                    </div><!-- .comments-wrap -->
                <?php endif; ?>

                <?php
                // If comments are closed and there are comments, let's leave a little note, shall we?
                if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'adamas' ); ?></p>
                <?php endif; ?>

                <?php
                    $commenter = wp_get_current_commenter();
                    $req       = get_option( 'require_name_email' );
                    $aria_req  = ( $req ? " aria-required='true'" : '' );

                    comment_form( array(
                        'comment_notes_before' => '',
                        'fields' => apply_filters( 'comment_form_default_fields', array(
                                'author' => '<div id="comment-input" class="clr"><input id="author" name="author" type="text" class="comment-form-author" placeholder="' . esc_html__( 'Your Name *', 'adamas' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="2" ' . $aria_req . '/>',
                                'email'  => '<input id="email" name="email" type="email" class="comment-form-email" placeholder="' . esc_html__( 'Email Address *', 'adamas' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" tabindex="3" ' . $aria_req . '/>',
                                'url'    => '<input id="url" name="url" type="url" class="comment-form-url" placeholder="' . esc_html__( 'Website', 'adamas' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="4" ' . $aria_req . '/></div>',
                            )
                        ),
                        'logged_in_as'        => false,            
                        'comment_notes_after' => false,
                        'comment_field'       => '<div class="comment_form_message"><textarea id="comment" name="comment" rows="7" cols="45" placeholder="' . esc_html__( 'Write your comment here...', 'adamas' ) . '" tabindex="1"></textarea></div>',
                        'cancel_reply_link'   => '<i class="fa fa-times"></i>',
                    ) );
                ?>

            </div><!-- $comments_col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .comments-area -->