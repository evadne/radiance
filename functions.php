<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

$themecolors = array(
	'bg' => 'fff',
	'border' => '777',
	'text' => '1c1c1c',
	'link' => '004276',
);

function tj_comment_class( $classname='' ) {
	global $comment, $post;

	$c = array();	
	if ($classname)
		$c[] = $classname;

	// Collects the comment type (comment, trackback),
	$c[] = $comment->comment_type;

	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);

		// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
		$c[] = "byuser comment-author-" . sanitize_title_with_dashes(strtolower($user->user_login));
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	// Separates classes with a single space, collates classes for comment LI
	return join(' ', apply_filters('comment_class', $c));
}



function ev_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>
   <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?> >
      <div class="comment_mod">
      <?php if ($comment->comment_approved == '0') : ?>
      <em>Your comment is awaiting moderation.</em>
      <?php endif; ?></div>

      <div class="comment_text"><?php comment_text() ?></div>

      <div class="comment-author">
      <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
      <p><strong><?php comment_author_link() ?></strong></p>
      <p><small><?php comment_date('j M y') ?> at <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <? edit_comment_link(__('Edit', 'sandbox'), ' ', ''); ?></small></p>
      </div>
      
      <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>

      <div class="clear"></div>
    
<?php
        }
       
function journalist_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID(); ?>" class="group">
		<?php if ($comment->comment_approved == '0') : ?>
	<div class="comment_mod">
		<em><?php _e('Your comment is awaiting moderation.',journalist);?></em>
	</div>
		<?php endif; ?>
    <div class="comment_author">
        <div class="comment_author_gravatar"><?php echo get_avatar($comment,$size='64',$default='<path_to_url>');?></div>
		<p><strong><?php comment_author_link() ?></strong></p>
		<p><small><?php comment_date(__('j M y',journalist)) ;?> <?php _e('at',journalist); ?> <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></small></p>
		<p><small><?php edit_comment_link(__('Edit',journalist)); ?> <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small></p>
    </div>
	<div class="comment_text">
		<?php comment_text() ?>
	</div>
     </div>
<?php
        }

?>