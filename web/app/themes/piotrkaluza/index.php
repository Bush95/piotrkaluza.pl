<?php get_header(); ?>
<header>
    <?php 
        if (is_home()) {
            global $post;
            $post = get_page(get_option( 'page_for_posts' ));
            setup_postdata( $post );

            get_template_part('template-parts/banner/banner', 'default'); 

            wp_reset_postdata();
        } else {
            get_template_part('template-parts/banner/banner', 'default'); 
        }
    ?>
</header>
<main itemscope itemtype="https://schema.org/Blog">
    <meta itemprop="name" content="Piotr Kałuża blog">
    <meta itemprop="url" content="<?php echo get_permalink(get_option('page_for_posts')); ?>">
    <meta itemprop="description" content="Blog o zdjęciach, wyprawach fotograficznych, sprzęcie do fotografii oraz poradniki o fotografii.">
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="Piotr Kałuża">
        <meta itemprop="sameAs" content="<?php echo get_permalink(get_page_by_path('o-mnie')); ?>">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <meta itemprop="name" content="Logo piotrkaluza">
            <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/assets/images/piotrkaluza_logo.png">
            <meta itemprop="width" content="512px">
            <meta itemprop="height" content="250px">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8 col-xl-9">
                <?php $i = 0; ?>
                <?php if ( have_posts() ): ?>
                    <ul class="row blog-list">
                        <?php while ( have_posts() ): the_post(); $i++; ?>
                            <?php if ($i == 1): ?>
                                <li class="col-sm-12">
                                    <?php echo get_template_part('template-parts/block', 'post-featured'); ?>
                                </li>
                            <?php else: ?>
                                <li class="col-sm-6 col-md-12 col-lg-6">
                                    <?php echo get_template_part('template-parts/block', 'post'); ?>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php
                        the_posts_pagination( array( 
                            'mid_size'  => 2,
                            'prev_text' => '<i class="icon-angle-left"></i>', 
                            'next_text' => '<i class="icon-angle-right"></i>', 
                        ) );
                    ?>
                <?php endif; ?>
            </div>
            <div class="col-md-5 col-lg-4 col-xl-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();
