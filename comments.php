<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package holy-trinity-parish-website
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area  content-item-underlay box-shadow">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title title">
			<?php
			$parish_comment_count = get_comments_number();
				printf(
					esc_html( 'Комментарии', 'parish'  ),
					number_format_i18n( $parish_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			?>
		</h2><!-- .comments-title -->

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
					'avatar_size'=> 64,
					'per_page'	 => 20,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'parish' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		array(
			'title_reply_before'	=> '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'		=> '</h3>',
			'logged_in_as'			=> '',
			'comment_field'			=> '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'must_log_in'			=> '<p class="must-log-in">' .  sprintf( __( 'You must be logged in to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>'
		)
	);
	?>

</div><!-- #comments -->
