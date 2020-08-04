class Navigation {
	constructor() {
		this.element = document.querySelector('.page-navigation');
		this.elementHeight = this.element.clientHeight;
		this.addListeners();
	}

	closeMenu() {
		document.querySelector('body').classList.remove('nav-open');
	}

	toggleMenu() {
		document.querySelector('body').classList.toggle('nav-open');
	}

	addListeners() {
		document.querySelector('.hamburger').addEventListener('click', this.toggleMenu);


		// Header scroll hide
	    if (this.element != null) {
	       var lastposition = 0;
	       var delta = 5;
	       var hasScrolled = false;

	        window.onscroll = function() {
	           hasScrolled = true;
	        };

	        setInterval((function(){
           		if (hasScrolled) {
					let doc = document.documentElement;
					let top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

					if (Math.abs(lastposition - top) <= delta) {
				   		return;
					}

					if (top > lastposition && top > this.elementHeight) {
				   		this.element.classList.add('is-hidden');
					} else {
				   		this.element.classList.remove('is-hidden');
					}

					lastposition = top;
		            hasScrolled = false;
		        }
	        }).bind(this), 250);

	    }
	}

}

export default Navigation;