import owlCarousel from 'owl.carousel';

export default {
    init() {
        this.$imageCarousel = $('.image-carousel');

        this.$imageCarousel.on('initialized.owl.carousel', () => {
            this.$imageCarousel.find('.owl-item.cloned .progressive-image img:not(.loaded)').addClass('loaded');
        });

        this.$imageCarousel.owlCarousel({
            items: 1,
            loop: false,
            smartSpeed: 400,
            animateOut: 'fadeOut',
            dots: true,
            nav: false,
            navText: ['<i class="icon-angle-left"></i>', '<i class="icon-angle-right"></i>'],
        });
    },
    finalize() {

    }
}
