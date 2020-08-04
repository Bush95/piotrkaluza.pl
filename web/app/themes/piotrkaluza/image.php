<?php
	global $post;
	wp_redirect(get_permalink($post->post_parent));
?>