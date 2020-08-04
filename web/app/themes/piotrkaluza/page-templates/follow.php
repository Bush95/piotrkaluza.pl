<?php /* Template Name: Follow */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<header>
    <?php get_template_part('template-parts/banner/banner', 'default'); ?>
</header>
<main>
    <div class="container">
    	<div class="cms-content">
    		<?php the_content(); ?>
        </div>		

    	<div class="row">
    		<div class="col-6 col-sm-6 col-lg-3">
    			<a class="social-profile" href="https://www.facebook.com/PiotrKaluzaFotografia/" target="_blank">
					<i class="icon-facebook-official"></i><span>@FotografiaPiotrKałuża</span>
    			</a>
    		</div>
            <div class="col-6 col-sm-6 col-lg-3">
                <a class="social-profile" href="https://500px.com/piotrkaluza95" target="_blank">
                    <i class="icon-500px"></i><span>@piotrkaluza95</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
                <a class="social-profile" href="https://www.instagram.com/piotrkaluza_fotografia/" target="_blank">
                    <i class="icon-instagram"></i><span>@piotrkaluza_fotografia</span>
                </a>
            </div>
    		<div class="col-6 col-sm-6 col-lg-3">
    			<a class="social-profile" href="https://www.instagram.com/piotrkaluza_portraits/" target="_blank">
					<i class="icon-instagram"></i><span>@piotrkaluza_portraits</span>
    			</a>
    		</div>
    	</div>
    </div>
</main>
<?php get_footer(); ?>
