<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package vt-patricia
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" class="input-form" placeholder="' . esc_attr(__('Name', 'vt-patricia')) . '"/></div>',
    'email'  => '<div class="col-sm-6"><input type="text" name="email" id="email" class="input-form" placeholder="' . esc_attr(__('Email*', 'vt-patricia')) . '"/></div>',
    'url'=>'<div class="col-sm-12"><input type="text" name="url" id="url" class="input-form" placeholder="' . esc_attr(__('Website', 'vt-patricia')) . '"/></div></div>'

);
$custom_comment_form = array( 
    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'         => '
    <textarea name="comment" id="message" class="textarea-form" placeholder="' . esc_attr(__('Comment', 'vt-patricia')) . '"  rows="1"></textarea>',
    /* translators: 1: user login as */
	'logged_in_as' 			=> '<p class="logged-in-as">' . esc_html(__( "Logged in as ",'vt-patricia' )).'<a href="'. esc_url( admin_url( 'profile.php' ) ).'">'.$user_identity.'</a>'. '<a href="'. esc_url( wp_logout_url( get_permalink() )).'">'.esc_html(__(" Log out?",'vt-patricia')).'</a>' . '</p>',
    'cancel_reply_link'     => esc_html(__( 'Cancel','vt-patricia')),
    'comment_notes_before'  => '',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html(__( 'Leave a Reply','vt-patricia')),
	'label_submit'			=> esc_html(__( 'Submit','vt-patricia')),
    'id_submit'             => 'comment_submit',
);


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// vt_patricia_before_comments hook
do_action( 'vt_patricia_before_comments' );

	if ( comments_open() || '0' != get_comments_number() ) {

	if ( post_password_required() ) {
		return;
	}

	if ( comments_open() ) {
		$comment_class = 'comments-open';
	} else {
		$comment_class = 'comments-closed';
	}
	};

?>

<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area <?php echo esc_attr( $comment_class ); ?>">
        <?php if ( comments_open() ) : ?>
            <h4 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( 
					esc_html_x( 'One Comment', 'comments title', 'vt-patricia' ) );
				} else {
					printf(
						/* translators: %1$s for number of comments */
						esc_html( _nx(
							'%1$s Comment',
							'%1$s Comments',
							$comments_number,
							'comments title',
							'vt-patricia'
						)),
						esc_html(number_format_i18n( $comments_number ) ) // WPCS: XSS OK							
					);
				}				
			?>
			
			</h4>
			
			
       	<?php endif; ?>
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vt-patricia' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link( esc_attr(__( '&larr; Older Comments', 'vt-patricia' )) ); ?></div>
    		<div class="nav-next"><?php next_comments_link( esc_attr(__( 'Newer Comments &rarr;', 'vt-patricia' )) ); ?></div>
    	</nav><!-- #comment-nav-above -->
    	<?php endif; // Check for comment navigation. ?>    
    	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 70,
                'callback'	  => 'vt_patricia_custom_comment'
			) );
		?>
    	</ol><!-- .comment-list -->    
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vt-patricia' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link( esc_attr(__( '&larr; Older Comments', 'vt-patricia' )) ); ?></div>
    		<div class="nav-next"><?php next_comments_link( esc_attr(__( 'Newer Comments &rarr;', 'vt-patricia' )) ); ?></div>
    	</nav><!-- #comment-nav-below -->
    	<?php endif; // Check for comment navigation. ?>    
    	<?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php esc_attr(__( 'Comments are closed.','vt-patricia' )); ?></p>
    	<?php endif; ?>
</div>
<?php endif; ?>
<!-- Leave reply -->
<?php comment_form($custom_comment_form); ?>
<!-- Leave reply -->