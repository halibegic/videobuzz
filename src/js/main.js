'use strict';

//
// Carousel
// --------------------------------------------------

function initCarousel() {

    var _$el = $('.carousel');

    var settings = {
        'items': 1, // The number of items you want to see on the screen.
        'margin': 30, // Margin-right(px) on item.
        'loop': true // Infinity loop. Duplicate last and first items to get loop illusion.
    };

    _$el.owlCarousel(settings);
}

//
// SmoothState
// --------------------------------------------------

function initSmoothState() {

    var _$el = $('#main');

    var settings = {
        blacklist: '.comment-reply-link',
        prefetch: true,
        pageCacheSize: 8,
        onStart: {
            duration: 300,
            render: function($container) {
                _$el.removeClass('transition-start').addClass('transition-end');
            }
        },
        onAfter: function($container, $content) {
            _$el.removeClass('transition-end').addClass('transition-start');
            initCarousel(); // reinitilize
        }
    };

    _$el.addClass('transition-start');

    _$el.smoothState(settings);
}

//
// Ready
// --------------------------------------------------

$(document).ready(function() {
    initCarousel();
    initSmoothState();
});
