<?php $link = get_permalink(); ?>

<div class="block-post block-post--small">
	<a href="<?php echo $link; ?>" class="block-post__thumb">
		<?php the_post_thumbnail( 'post-thumb-small'); ?>
	</a>
	<div class="block-post__content">
		<h2 class="block-post__title"><a class="block-post__title-inner" href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
		<p class="block-post__date"><?php echo get_the_date('j F Y'); ?></p>
	</div>
</div>