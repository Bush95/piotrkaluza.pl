<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php if (WP_ENV == 'production'): ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133913826-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133913826-1');
  </script>
<?php endif; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="preconnect" href="http://fonts.googleapis.com/" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
<meta name="theme-color" content="#1B1B1B" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/favicon/ms-icon-144x144.png">

<?php wp_head(); ?>

<?php if (WP_ENV == 'production'): ?>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '2372095823064684');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=2372095823064684&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
<?php endif; ?>
</head>
<body <?php body_class(); ?>>
  <div class="body-loader"></div>
  
    <nav class="page-navigation">
        <div class="page-navigation__wrapper">
              <a href="<?php echo get_home_url(); ?>" class="page-navigation__logo-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/piotrkaluza_logo.svg" alt="piotrkaluza.pl logo">
              </a>
            <nav class="main-nav">
                <?php wp_nav_menu(
                array(  'theme_location'=>'header_menu',
                'container'=>false));
                ?>
                <ul class="social">
                    <li>
                        <a href="https://www.facebook.com/PiotrKaluzaFotografia/" title="Odwiedź moją stronę na facebooku" target="_blank"><i class="icon-facebook-official"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/piotr_kaluza/" title="Zobacz mojego instagrama" target="_blank"><i class="icon-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://500px.com/piotrkaluza95" target="_blank" title="Odwiedź mój profil na 500px"><i class="icon-500px"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="fixed-contact d-lg-none">
            <a href="mailto:kontakt@piotrkaluza.pl" title="Skontaktuj się przez email"><i class="icon-envelope-o"></i></a>
            <a href="tel:+48789324850" title="Skontaktuj się przez telefon"><i class="icon-phone"></i></a>
        </div>

        <div class="hamburger">
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    <div class="page-wrapper">
