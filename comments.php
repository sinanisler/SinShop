

<div id="comments">

<ol class="commentlist">
	<?php
		 
		wp_list_comments( array( 'callback' => 'twentyten_comment' ) );
	?>
</ol>




<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
<?php return; endif; ?>
 
<?php if ( have_comments() ) : ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			
<?php endif;   ?>

<?php else :  	if ( ! comments_open() ) : ?>
	<p class="nocomments"><?php _e( 'Yorumlara kapalı..' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>





</div><!-- #comments -->









