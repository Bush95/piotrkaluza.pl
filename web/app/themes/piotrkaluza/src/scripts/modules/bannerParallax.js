import ScrollParallax from "scroll-parallax";
import isVisible from "../utils/isVisible";

class BannerParallax {
	constructor() {
		this.banner = document.querySelector('.banner');

		if (this.banner) {
			if (!isVisible(document.querySelector('.hamburger'))) {
				this.init();
			} else {
				this.banner.classList.add('loaded');
			}
		}
	}

	init() {
		if (this.banner.querySelector('img')) {
			this.parallax = new ScrollParallax('.banner img', {
			  offsetYBounds: 10,
			  intensity: 40,
			  center: 1.3,
			  safeHeight: 0.50
			});

			this.parallax.on('images:loaded', (image) => {
				this.banner.classList.add('loaded');
			});

			this.parallax.init();
		}
	}
}

export default BannerParallax;