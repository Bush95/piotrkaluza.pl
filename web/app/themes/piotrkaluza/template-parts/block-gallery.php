<?php $thumb = get_field('photo'); ?>
<a class="gallery-block" href="<?php echo get_permalink(); ?>">
    <?php echo wp_get_attachment_image( $thumb['id'], 'post-thumb'); ?>
    <h2 class="gallery-block__title"><?php the_title(); ?></h2>
</a>