import Navigation from '../modules/navigation.js';
import Progressiveimages from '../modules/progressiveimages.js';
// import disableContextMenu from '../modules/disableContextMenu.js';
import BannerParallax from '../modules/bannerParallax.js';
import ScrollAnimations from '../modules/scrollanimations.js';
import { setCookie } from "../utils/cookies";
import isExternal from "../utils/isExternal";
import Gallery from '../modules/gallery';
import GLightbox from 'glightbox';


export default {
    init() {
        // disableContextMenu();
        new ScrollAnimations();
        new Navigation(),
        new Progressiveimages();
        new BannerParallax();
        new Gallery(".thumb-grid", 8);
        this.addListeners();
        this.initGalleries();
    },
    finalize() {
		$(document).on('click', 'a', function(e) {
			if (!isExternal(this) && !this.classList.contains('thumb-grid__item') && !this.classList.contains('gallery-link') && this.target != '_blank') {
				document.body.classList.add('unloading');
				setCookie('loading-transition', 1, 0.0002); // ~16 sec expiry time
			}
		});
        $(document).on('click', '.print-block', function(e) {
            gtag('event', 'print_click', { 
                'event_category': 'Klikniecie na block printa',
                'event_label': $(this).find('img')[0].alt
            });
        })

        $(document).on('click', '.welcome-buttons .btn', function(e) {
            gtag('event', 'home_click', { 
                'event_category': 'Klikniecie na przycisk archiwum',
                'event_label': $(this).html()
            });
        })
    },
    addListeners() {
        $('.gallery-block').on('click', function() {
            gtag('event', 'portfolio_click', { 
                'event_category': 'Klikniecie Portfolio',
                'event_label': $(this).find('.gallery-block__title').html()
            });
        });
    },
    initGalleries() {
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: false,
            selector: 'gallery-link',
            openEffect: 'fadeIn',
            closeEffect: 'fadeOut'
        });
    }
}
