<?php get_header(); ?>
<?php the_post(); ?>
<?php 
    /**
     * Google Microdata - Article
     * @property - datePublished (required)
     * @property - dateModified
     * @property - headline (required)
     * @property - image (required)
     * @property - articleBody (required)
     * @property - author (required) Can be string or person object
     * @property - publisher (required) Can be organization or person object
     */
?>
<article class="post-view" itemscope itemtype="https://schema.org/BlogPosting">
    <header class="post-view__header">
        <?php get_template_part('template-parts/banner/banner', 'small'); ?>

        <div class="post-view__info">
            <div class="post-view__meta">
                
                <meta itemprop="author" content="Piotr Kałuża">
                <meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>">
                <meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>">
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
                <meta itemprop="image" content="<?php echo wp_get_attachment_image_src( get_field('banner_image')['id'], 'full')[0]; ?>">
                <meta itemprop="url" content="<?php the_permalink(); ?>">
                <meta content="" itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
            </div>
        </div>

        <div class="container">
            <p class="block-post__categories"><?php echo get_the_category_list( '<i>|</i>', '', get_the_ID() ); ?></p>
            <h1 class="block-post__title post-view__title" itemprop="headline"><span class="block-post__title-inner"><?php the_title(); ?></span></h1>
            <p class="block-post__date"><?php echo get_the_date(); ?></p>
        </div>
    </header>
    <div class="cms-content" itemprop="articleBody">
        <?php the_content(); ?>
    </div>
    <footer>
        <div class="container">

            <div class="row">
                <div class="col-xl-10 offset-xl-1">

                    <?php echo get_template_part('template-parts/block', 'share'); ?>
            
                    <?php // Tags comments ?>
                    <?php $tags =  get_the_tag_list('<li>','</li><li>','</li>'); ?>
                    <?php if ($tags): ?>
                        <ul class="post-tags">
                            <?php echo $tags; ?>
                        </ul>
                    <?php endif; ?>

                    <?php // Fb comments ?>
                    <?php echo do_shortcode( '[wpdevart_facebook_comment facebook_app_id="1638418549774901" curent_url="' . get_permalink() . '" title_text="" title_text_color="#000000" title_text_font_size="0" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#FFFFFF" animation_effect="none" locale="pl_PL" count_of_comments="10" ]'); ?>

                </div>
            </div>
            
            <?php echo get_template_part('template-parts/block', 'latest-news'); ?>

        </div>
    </footer>
</article>
<?php get_footer(); ?>