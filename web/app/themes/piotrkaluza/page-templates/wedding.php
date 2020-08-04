<?php /* Template Name: Wedding */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<?php
    $image1     = get_field('image_1');
    $image2     = get_field('image_2');
    $image3     = get_field('image_3');
    $gallery    = get_field('gallery');
    $galleryArr = explode(',', $gallery);
    $text1      = get_field('text_section_1');
    $text2      = get_field('text_section_2');
?>

<main>
    <div class="wedding-parallax-wrapper">
        <div id="wedding-parallax" class="wedding-parallax">
            <div class="wedding-parallax__bg" data-depth="0.05"></div>
            <div class="wedding-parallax__title" data-depth="0.2">
                <h1>Fotografia ślubna</h1>
            </div>
            <div class="t1" data-depth="0.4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart_left.svg" alt="">
            </div>
            <div class="t2" data-depth="0.3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart_right.svg" alt="">
            </div>
        </div>
        <div class="wedding-arrow-wrap">
            <div class="wedding-arrow">
                <div class="line"></div>
            </div>
        </div>
    </div>
    
    <div class="wedding-text">
        <div class="container">
            <div class="cms-content scroll-trigger fromBottom">
                <?php echo $text1; ?>
            </div>
        </div>
    </div>

    <div class="wedding-gallery gallery">
        <div class="container">
            <div class="row">
                <?php foreach ($galleryArr as $key => $image): ?>
                    <div class="col-6 col-md-4 col-lg-3 scroll-trigger fromBottom">
                        <a class="gallery-link" href="<?php echo wp_get_attachment_image_src( $image, 'large' )[0]; ?>" data-gallery="gallery1">
                            <?php progressiveImage($image, 'gallery-thumb', get_post_meta($image, '_wp_attachment_image_alt', TRUE)); ?>
                            <div class="gallery-link__hover">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="wedding-text">
        <div class="container">
            <div class="cms-content scroll-trigger fromBottom">
                <?php echo $text2; ?>
            </div>
        </div>
    </div>

    <div class="wedding-plans">
        <div class="container">
            <h2 class="wedding-plans__title text-center scroll-trigger fromBottom">Pakiety fotograficzne</h2>
            <div class="row justify-content-around">
                <div class="col-md-6 col-lg-4 scroll-trigger fromBottom">
                    <div class="plan">
                        <h3>Reportaż <br>podstawowy</h3>
                        <i class="icon-angle-down"></i>
                        <ul>
                            <li>Reportaż od przygotowań do pierwszych 4 godzin wesela na sali</li>
                            <li>300 obrobionych zdjęć w formie elektronicznej</li>
                            <li>Pendrive z nagranym reportażem</li>
                            <li>30 fotografii wydrukowanych w formacie 15x23cm w stylowym pudełku</li>
                        </ul>
                        <button data-value="Reportaż podstawowy" class="btn" type="button">Wybieram</button>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 scroll-trigger fromBottom">
                    <div class="plan">
                        <h3>Reportaż <br>standardowy</h3>
                        <i class="icon-angle-down"></i>
                        <ul>
                            <li>Reportaż ślubny trwający od przygotowań do oczepin</li>
                            <li>500 obrobionych zdjęć w formie elektronicznej</li>
                            <li>Pendrive z nagranym reportażem</li>
                            <li>50 fotografii wydrukowanych w formacie 15x23cm w stylowym pudełku</li>
                            <li>Krótka sesja plenerowa w dniu ślubu, w okolicach lokalizacji sali</li>
                            <li>Fotoalbum 20x30cm</li>
                        </ul>
                        <button data-value="Reportaż standardowy" class="btn" type="button">Wybieram</button>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 scroll-trigger fromBottom">
                    <div class="plan">
                        <h3>Reportaż <br>rozszerzony</h3>
                        <i class="icon-angle-down"></i>
                        <ul>
                            <li>Reportaż ślubny trwający od przygotowań do oczepin</li>
                            <li>700 obrobionych zdjęć w formie elektronicznej</li>
                            <li>Pendrive z nagranym reportażem</li>
                            <li>70 fotografii wydrukowanych w formacie 15x23cm w stylowym pudełku</li>
                            <li>Sesja plenerowa w wybranym miejscu na terytorium Polski</li>
                            <li>Fotoalbum 20x30cm</li>
                        </ul>
                        <button data-value="Reportaż rozszerzony" class="btn" type="button">Wybieram</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wedding-contact">
        <div class="container">
            <div class="wedding-contact__text text-center">
                <h2>Zapytaj o ofertę</h2>
            </div>
            <?php echo do_shortcode( '[wpforms id="1072" title="false" description="false"]' ); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

