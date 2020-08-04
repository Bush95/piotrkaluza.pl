<?php $link = get_permalink(); ?>

<div class="block-post">
	<a href="<?php echo $link; ?>" class="block-post__thumb">
		<?php the_post_thumbnail( 'post-thumb'); ?>
	</a>
	<p class="block-post__categories"><?php echo get_the_category_list( '<i>|</i>', '', get_the_ID() ); ?></p>
	<h2 class="block-post__title"><a class="block-post__title-inner"  href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
	<p class="block-post__date"><?php echo get_the_date(); ?></p>
</div>