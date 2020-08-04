<?php /* Template Name: Row 2 col */ ?>
<?php the_post(); ?>
<?php get_header(); ?>

<header>
    <?php echo get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <?php if (get_the_content()): ?>
         <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="cms-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>    
        </div>
    <?php endif; ?>
    <?php for ($i = 1; $i<=7; $i++): ?>
        <?php 
            $content = get_field('content_' . $i);
            $photos = get_field('photos_' . $i);
            $link = get_field('link_' . $i);
            $isEven = ($i % 2 == 0);
        ?>
        <?php if ($content): ?>
            <div class="dual-row <?php if ($isEven) echo 'even'; else echo 'odd'; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="cms-content">
                                <?php echo $content; ?>

                                <?php if ($link): ?>
                                    <a href="<?php echo $link['url']; ?>" class="btn <?php if ($isEven) echo 'btn--light '; ?> dual-row__link" <?php if($link['target']) echo 'target="_blank"'; ?>><?php echo $link['title']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <?php if ($photos): ?>
                                <div class="image-carousel owl-carousel">
                                    <?php foreach ($photos as $photo): ?>
                                        <?php if ($photo): ?>
                                            <?php echo wp_get_attachment_image( $photo['id'], 'post-thumb'); ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</main>
<?php get_footer(); ?>
