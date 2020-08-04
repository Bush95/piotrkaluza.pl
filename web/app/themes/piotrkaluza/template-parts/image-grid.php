<?php 
	$images = CFS()->get( 'image_grid' );
?>
<?php if ($images): ?>
	<div class="image-grid">
		<?php foreach ( $images as $image ): ?>
			<?php echo wp_get_attachment_image( $image['image'], 'grid', false, array('alt' => $image['image_alt'])); ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>