class Progressiveimages {
	constructor() {
		this.query = [];
		this.placeholders = document.querySelectorAll('.progressive-image');

		if (this.placeholders) {
			this.init();
		}
		
	}

	init() {
		this.query = [].slice.call(this.placeholders);
		this.loadQuery();
	}

	addElementToQuery(el) {
		this.query.push(el);
	}

	loadQuery() {
		if (this.query.length >= 1) {
			let el = this.query[0];
		    let image = new Image();

		    image.src = el.dataset.large; 
		    image.alt = el.dataset.alt; 

		    image.onload = () => {
		        el.classList.add('loaded');
		        el.src = image.src;


			    this.query.shift();
		        this.loadQuery();
		    };

		}
	}
}

export default Progressiveimages;