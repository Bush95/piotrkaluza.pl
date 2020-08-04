<?php get_header(); ?>
<header>
    <?php echo get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <?php 
        $id = get_the_ID();
        global $wp;
        $currentUrl = home_url( $wp->request )
    ?>
    <span id="currentlink" data-currentlink="<?php echo $currentUrl; ?>"></span>
    <div class="container">
        <div class="archive-intro">
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php if ( have_posts() ): ?>
        <?php $gallery = acf_photo_gallery('gallery', $id); ?>
        <div class="thumb-grid">
            <?php foreach ($gallery as $image): ?>
                <a 
                    data-id="<?php echo str_to_id($image['title']); ?>" 
                    class="thumb-grid__item" 
                    title="<?php echo $image['title']; ?>" 
                    href="<?php echo $image['full_image_url']; ?>"
                >
                    <?php echo wp_get_attachment_image( $image['id'], 'medium' ); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <script>
            var allPosts = {
                <?php foreach ($gallery as $image): ?>
                    '<?php echo str_to_id($image['title']); ?>': '<?php echo $image['full_image_url']; ?>',
                <?php endforeach; ?>
            };
        </script>
    <?php endif; ?>
</main>

<?php
    $nextPost = get_next_post();
    $prevPost = get_previous_post();
?>

    <div class="other-galleries">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <?php if ($prevPost): ?>
                        <a class="other-galleries__item prev" href="<?php echo get_permalink($prevPost->ID); ?>">
                            <div>
                                <span><?php echo $prevPost->post_title; ?></span>
                                <i class="icon-angle-left"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <?php if ($nextPost): ?>
                        <a class="other-galleries__item next" href="<?php echo get_permalink($nextPost->ID); ?>">
                            <div>
                                <span><?php echo $nextPost->post_title; ?></span>
                                <i class="icon-angle-right"></i>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- 
        <div class="text-center">
            <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn"><i class="icon-angle-left"></i>&nbsp; Portfolio</a>
        </div> -->
    </div>
    

<?php get_footer();
