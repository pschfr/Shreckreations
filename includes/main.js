// Initiates jQuery properly, otherwise I can't use $ because of WordPress...
(function($) {
    // Initiates simpleLightbox
    var lightbox = $('.entry-content a').simpleLightbox({
        'captionsData': 'alt'
    });
})(jQuery);
