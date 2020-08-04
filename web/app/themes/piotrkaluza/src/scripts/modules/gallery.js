class Gallery {
	constructor(selector, imagesToLoadOnScroll) {
		this.rowHeight = 300;
		this.selector = selector;
		this.scrollNum = imagesToLoadOnScroll;
        this.currentLink = '/';

		let windowWidth = $(window).width();

        if (document.getElementById('currentlink')) {
            this.currentLink = document.getElementById('currentlink').dataset.currentlink;
        }

        if (windowWidth < 768) {
            this.rowHeight = 150;
        } else if (windowWidth < 992) {
            this.rowHeight = 190;
        } else if (windowWidth > 2000) {
        	this.rowHeight = 300;
        }

        this.init();

        if (window.location.hash) {
            this.openPopupOnLoad(window.location.hash);
        }

	}

	init() {
		this.initGallery();
		this.initMagnificPopup();
	}

    strToId(str) {
        let id = str.replace(',', '');
        id = str.replace('.', '');
        id = id.replace(/&(amp;)?#?[a-z0-9]+;/g, '-');
        id = id.replace(/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/g, "\\1");
        return id;
    }

	initGallery() {
        $(this.selector).justifiedGallery({
            rowHeight: this.rowHeight,
            margins: 10,
        }).on('jg.complete', () => {
            $(this.selector).addClass('loaded');
        });
	}

    openPopupOnLoad(hash) {
        const id = hash.substr(1);
        let that = this;

        if ((typeof allPosts !== 'undefined') && (id in allPosts)) {
            $.magnificPopup.open({
                items: {
                    src: allPosts[id]
                },
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                tClose: 'Zamknij',
                midClick: false,
                removalDelay: 500,
                callbacks: {
                    beforeOpen: function(e) {
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = 'mfp-zoom-in';
                    },
                    open: function() {
                        const targettedImage = $(this.content).find('img');

                        if ($(targettedImage).length) {
                            gtag('event', 'image_hash_popup', { 
                                'event_category': 'Zdjęcie otwarte z linku hash',
                                'event_label': this.items[0].data.title
                            });
                        }
                    },
                    change: function() {
                        if (this.isOpen) {
                            this.wrap.addClass('mfp-open');
                        }
                    },
                    close: function() {
                        window.history.replaceState(undefined, undefined, that.currentLink);
                    }
                },
                image: {
                    verticalFit: true,
                    titleSrc: function(item) {
                        return id;
                    }
                },
                gallery: {
                    enabled: true,
                    tCounter: '%curr% / %total%',
                    tPrev: 'Poprzednie zdjęcie', // title for left button
                    tNext: 'Następne zdjęcie', // title for right button
                }
            }, 0);
        }
    }

	initMagnificPopup() {
        let that = this;
        $(this.selector).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            tClose: 'Zamknij',
            midClick: false,
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function(e) {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'mfp-zoom-in';
                },
                open: function() {
                    const targettedImage = $(this.content).find('img');

                    if ($(targettedImage).length) {
                        gtag('event', 'image_click', { 
                            'event_category': 'img_popup_click',
                            'event_label': targettedImage.attr('alt')
                        });
                    }
                },
                change: function() {
                    window.history.replaceState(undefined, undefined, '#' + that.strToId($(this.content).find('.mfp-title .image-id').html()));

                    if (this.isOpen) {
                        this.wrap.addClass('mfp-open');
                    }
                },
                close: function() {
                    window.history.replaceState(undefined, undefined, that.currentLink);
                }
            },
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + '<span class="sr-only image-id">' + item.el.attr('data-id') + '</span>';;
                }
            },
            gallery: {
                enabled: true,
                tCounter: '%curr% / %total%',
                tPrev: 'Poprzednie zdjęcie', // title for left button
				tNext: 'Następne zdjęcie', // title for right button
            }
        });
	}
}

export default Gallery;