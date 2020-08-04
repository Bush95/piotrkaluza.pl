    </div> <?php // End of .page-wrapper div ?>
    <footer class="page-footer">


    	<div class="container">
            <ul class="social">
                <li>
                    <a href="https://www.facebook.com/PiotrKaluzaFotografia/" title="Odwiedź moją stronę na facebooku" target="_blank"><i class="icon-facebook-official"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/piotrkaluza_fotografia/" title="Zobacz mojego instagrama" target="_blank"><i class="icon-instagram"></i></a>
                </li>
                <li>
                    <a href="https://500px.com/piotrkaluza95" target="_blank" title="Odwiedź mój profil na 500px"><i class="icon-500px"></i></a>
                </li>
            </ul>
            <div class="page-footer__wrapper">
                <div class="copy"><span>&copy; Piotr Kałuża <?php echo date('Y'); ?>. Wszelkie prawa zastrzeżone</span></div>
                <?php wp_nav_menu(array(  
                    'theme_location'=>'footer_menu',
                    'container'=>false
                )); ?>
            </div>
        </div>
    </footer>

    <div class="fixed-contact">
        <a href="mailto:kontakt@piotrkaluza.pl" title="Skontaktuj się przez email"><i class="icon-envelope-o"></i></a>
        <a href="tel:+48789324850" title="Skontaktuj się przez telefon"><i class="icon-phone"></i></a>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
