<?php
    $title = get_field('banner_title');
    $image = get_field('banner_image');

	if (is_category()) {
		$cat = get_queried_object();
		$title = get_field('banner_title', $cat);
		$image = get_field('banner_image', $cat);
	}

	if (is_tag()) {
    	$image = get_field('banner_image', get_option('page_for_posts'));
		$title = '<i class="icon-tags"></i> ' . single_tag_title('', false);
	}

?>
<?php if ($image): ?>
	<div class="banner">
		
	    <?php progressiveImage( $image['id'], 'full', wp_get_attachment_caption($image['id']), 'banner-pixels'); ?>
	    
	    <?php if ($title): ?>
		    <div class="banner__content-container">
		        <h1 class="banner__title"><?php echo $title; ?><?php if (empty($title)) echo get_the_title(); ?></h1>
		    </div>
		<?php endif; ?>
	</div>
<?php else: ?>
	<div class="banner banner--placeholder"></div>
<?php endif; ?>