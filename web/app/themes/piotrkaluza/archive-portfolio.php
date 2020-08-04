<?php get_header(); ?>
<?php

    global $wp_query;

    $post_type = $wp_query->query['post_type'];
    $post = get_page_by_path($post_type);
    setup_postdata($post);
?>
<header>
    <?php echo get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <?php 
        global $wp;
        $currentUrl = home_url( $wp->request )
    ?>
    <span id="currentlink" data-currentlink="<?php echo $currentUrl; ?>"></span>
    <div class="container">
        <div class="archive-intro">
            <div class="content">
                <?php the_content(); ?>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="container gallery-container">
        <div class="row">
            <?php while (have_posts()): the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <?php echo get_template_part('template-parts/block', 'gallery'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<?php get_footer();
