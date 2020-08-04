import { getCookie, setCookie } from '../utils/cookies.js';

export default {
    init() {
	    this.imageLoaded = false;
	    const timeout = 7000;
		let el = document.querySelector('#home-image');
	    let image = new Image();
	    let interval = '';
	    let intervalTime = 0;

	    if (getCookie('welcome-off') == 1) {
	    	document.body.classList.add('document-loaded');
	        document.body.classList.add('image-loaded');
	        document.body.classList.add('image-preloaded');

	        this.loadHeroImage(image, el);
	        document.body.classList.add('image-loaded');
	    } else {

		    window.onload = () => {
		    	document.body.classList.add('document-loaded');
			    this.loadHeroImage(image, el);

			    interval = setInterval(e=> {
			    	intervalTime += 100;

			    	if (intervalTime >= 1600 && this.imageLoaded == true) {
				        document.body.classList.add('image-loaded');
			    	}
			    }, 100);

			    setTimeout(_=> {
			        document.body.classList.add('image-loaded');
			    }, timeout); // add class anyway after 7s
		    }

		   setCookie('welcome-off', 1);
	   	}
    },
    finalize() {

    },
    loadHeroImage(image, el) {
	    image.src = el.dataset.src; 
	    image.alt = el.dataset.alt;

	    image.onload = () => {
	        el.parentNode.appendChild(image);
	        this.imageLoaded = true;
	    }; 
    }
}
