<?php
    $image = get_field('banner_image');

	if (is_tax('krajobrazy_kategoria')) {
		$image = get_field('gallery_banner_image', get_queried_object());
	}
?>
<?php if ($image): ?>
	<div class="banner banner--small">
	    <?php progressiveImage( $image['id'], 'full', wp_get_attachment_caption($image['id']), 'banner-pixels'); ?>
	</div>
<?php else: ?>
	<div class="banner banner--placeholder"></div>
<?php endif; ?>