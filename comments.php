<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to _s_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package _s
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<span class="radius secondary label">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', '_s' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
			</span>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', '_s' ); ?></h1>
			<div class="pagination-centered">
			  <ul class="pagination">
			    <li class="arrow"><?php previous_comments_link( __( '&larr; Older Comments', '_s' ) ); ?></li>
				<li class="arrow"><?php next_comments_link( __( 'Newer Comments &rarr;', '_s' ) ); ?></li>
			  </ul>
			</div>
		</nav><!-- #comment-nav-before -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use _s_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define _s_comment() and that will be used instead.
				 * See _s_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => '_s_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', '_s' ); ?></h1>
			<div class="pagination-centered">
			  <ul class="pagination">
			    <li class="arrow"><?php previous_comments_link( __( '&larr; Older Comments', '_s' ) ); ?></li>
				<li class="arrow"><?php next_comments_link( __( 'Newer Comments &rarr;', '_s' ) ); ?></li>
			  </ul>
			</div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><span class="radius secondary label"><?php _e( 'Comments are closed.', '_s' ); ?></span></p>
	<?php endif; ?>

	<div class="panel">
	<?php 
	$comments_args= array(

    'fields' => apply_filters(
        'comment_form_default_fields', array(
            'author' => 
            '<div class="comment-form-author row collapse">' . 
                '<div class="small-3 columns">
                	<span class="prefix radius">
                		<label for="author">' . __( 'Your Name', '_s') . ( $req ? '<strong class="required">*</strong></label>
                	</span>' : '' ) . 
                '</div>' .
            	'<div class="small-9 columns">
            		<input id="author" placeholder="Your Name (No Keywords)" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
            	</div>'.
            '</div>'
                ,
            'email'  =>
            '<div class="comment-form-email row collapse">' . 
                '<div class="small-3 columns">
                	<span class="prefix radius">
                		<label for="email">' . __( 'Your Email', '_s' ) . ( $req ? '<strong class="required">*</strong></label> 
                	</span>' : '' ) .
                '</div>' .
            	'<div class="small-9 columns">
            		<input id="email" placeholder="' . __( 'your-real-email@example.com', '_s' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' />
                </div>' .
            '</div>',
            'url' => 
            '<div class="comment-form-url row collapse">' .
    			'<label class="hide" for="url">' . __( 'Website', '_s' ) . '</label>' .            
				'<div class="small-3 columns">				
					<span class="prefix radius">http://</span>
				</div>' .
				'<div class="small-9 columns">
					<input id="url" name="url" placeholder="' . __( 'http://your-site-name.com', '_s' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> 
				</div>
            </div>'
        )
    ),
    'comment_field' => 
    '<div class="comment-form-comment">' .
    	'<label for="comment">' . __( 'Let us know what you have to say:', '_s' ) . '</label>' .
        '<textarea class="large-12 columns" id="comment" name="comment" placeholder="' . __( 'Express your thoughts, idea or write a feedback by clicking here & start an awesome comment', '_s') . '" aria-required="true"></textarea>' .
    '</div>',
    'comment_notes_after' => '',
    'title_reply' => '<h5>' . __( 'Please Post Your Comments & Reviews', '_s') . '</h5>'
);
	comment_form($comments_args, $post_id);
	$req = get_option('require_name_email');
	$commenter = wp_get_current_commenter();
	$aria_req = ( $req ? " aria-required='true'" : '' );
	?>
	</div>
</div><!-- #comments -->
