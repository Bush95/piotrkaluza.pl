<?php get_header(); ?>
<?php $image = get_field('banner_image'); ?>

<div class="cover-image">
	<?php if ($image): ?>
		<?php $fullSize = wp_get_attachment_image_src( $image['id'], 'full', false, '' )[0]; ?>
		<div id="home-image" data-src="<?php echo $fullSize; ?>" data-alt="<?php echo $image['alt']; ?>"></div>
	<?php endif; ?>
</div>

<?php if (!(isset($_COOKIE['welcome-off']) && $_COOKIE['welcome-off'] == 1)): ?>
	<div class="welcome">
	    <div class="page-navigation__logo-wrapper">
	        <strong class="name">Piotr Kałuża</strong>
	        <div class="sub">Fotografia</div>
	    </div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>