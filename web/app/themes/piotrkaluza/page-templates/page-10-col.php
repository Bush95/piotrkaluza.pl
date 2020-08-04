<?php /* Template Name: Container - 10 */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<header>
    <?php get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <div class="container">
    	<div class="row">
    		<div class="col-md-10 offset-md-1">
	    		<div class="cms-content">
	    			<?php the_content(); ?>
		        </div>	
    		</div>
    	</div>
    </div>
</main>
<?php get_footer(); ?>
