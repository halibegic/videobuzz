'use strict';

//
// Carousel
// --------------------------------------------------

function initCarousel () {

    var settings = {
        'items': 1, // The number of items you want to see on the screen.
        'margin': 30, // Margin-right(px) on item.
        'loop': true // Infinity loop. Duplicate last and first items to get loop illusion.
    };

    $( '.carousel' ).owlCarousel( settings );
}

//
// SmoothState
// --------------------------------------------------

function initSmoothState () {

    var settings = {
        debug: true
    };

    $( '#main' ).smoothState( settings );
}

$(document).ready(function() {
    initCarousel();
    initSmoothState();
});
