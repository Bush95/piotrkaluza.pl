<?php /* Template Name: Container - 12 */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<header>
    <?php get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <div class="container">
		<div class="cms-content">
			<?php the_content(); ?>
        </div>	
    </div>
</main>
<?php get_footer(); ?>
