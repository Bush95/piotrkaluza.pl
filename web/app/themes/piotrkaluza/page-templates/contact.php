<?php /* Template Name: Contact */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<main>
    <div class="wedding-contact contact d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="text-center">
                <h1>Skontaktuj się ze mną</h1>
            </div>
            <?php echo do_shortcode('[wpforms id="123" title="false" description="false"]'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
