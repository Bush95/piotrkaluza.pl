<?php get_header(); ?>
<?php
    $title = '404';
    $image = 's';
?>
<?php if ($image): ?>
	<div class="banner">
	    <?php if ($title): ?>
		    <div class="banner__content-container">
		        <h1 class="banner__title"><?php echo $title; ?><?php if (empty($title)) echo get_the_title(); ?></h1>
		    </div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<main>
    <div class="container">
        <h2>404</h2>
        <h3><?php _e("Strona na którą próbujesz się dostać nie istnieje."); ?></h3>
        <p>Sprawdź pisownię lub wróć do strony głównej</p>
        <br>
        <p>
        	<a href="<?php echo get_home_url(); ?>" class="btn">Powrót do strony głownej</a>
        </p>
        <br>
    </div>
</main>
<?php get_footer(); ?>
