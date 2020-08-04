export default {
    init() {
        
    },
    finalize() {
        $(document).on('click', '.post-view .cms-content a', function(e) {
            gtag('event', 'content_link', { 
                'event_category': 'link',
                'event_label': 'Text: ' + this.innerText() + ', url: ' + this.href
            });
        })
    }
}
