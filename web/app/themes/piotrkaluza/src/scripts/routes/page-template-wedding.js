import Parallax from 'parallax-js';

export default {
    init() {
        this.scene = document.getElementById('wedding-parallax');
    },
    finalize() {
        if (this.scene) {
            this.parallax = new Parallax(this.scene, {
            });            
        }

        $('.plan .btn').on('click', e => {
        	let value = e.target.dataset.value;

        	$('body, html').animate({
        		scrollTop: $('.wedding-contact').offset().top
        	}, 700, f => {
        		document.querySelector('.plan-select select').focus();

        		setTimeout(_ => {
	        		document.querySelector('.plan-select select').value = value;
        		}, 500);
        	});

        });

        $('.wedding-arrow-wrap').on('click', e => {
            $('body, html').animate({
                scrollTop: $('.wedding-parallax-wrapper').height()
            }, 1000);
        })
    }
}
 