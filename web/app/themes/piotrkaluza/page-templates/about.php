<?php /* Template Name: About */ ?>
<?php the_post(); ?>
<?php get_header(); ?>

<header>
    <?php echo get_template_part('template-parts/banner/banner', 'default'); ?>
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
    <?php echo get_template_part('template-parts/ctas'); ?>
</main>
<?php get_footer(); ?>
