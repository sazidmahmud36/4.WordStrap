<div class="comments">
	<?php if (have_comments()): ?>
		<h3 class="comments-title">
			<?php if (get_comments_number() == 1){
				echo get_comments_number(). 'Comments';
			}else{
				echo get_comments_number(). 'Comments';
			}
			?>
		</h3>
		<ul class="row comment-list">
			<?php 
				wp_list_comments(array(
					'avatar_size' => 90, 
					'callback' => 'add_theme_comments', 
				)); 
			 ?>
		</ul>
	<?php endif ?>
	<?php 
		//If comments are closed and there are comments, lets leave a little note, shall we?
		if (! comments_open() && '0' !=	 get_comments_number() && post_type_supports(get_post_type(),'comments')): ?>
			<p class="no-comments"><?php _e('Comments are closed.', 'dazzling'); ?></p>
		
	<?php endif ?>
</div>
<hr>

<?php 
	$comments_args = array(
		//change the title of send button
		'label_submit' => 'Send',
		//change the title of reply section
		'title_reply' => 'Write a reply or Comment',
		//remove "text or html to be displayed after the set of comment fields"
		'comment_notes_after' => '',
		//redifine your own textarea(the comment body)
		'comment_field' => '<p class="comment-form-comment"><label for = "comment">'. _x('Comment','noun') . 
		'</label></br><textarea class="form-control" id="comment" name="comment" aria-required = "true"></textarea></p>',
	);
	comment_form($comments_args);
 ?>