'use strict';

//
// Carousel
// --------------------------------------------------

function initCarousel() {

    $('.carousel').owlCarousel({
        'items': 1, // The number of items you want to see on the screen.
        'margin': 30, // Margin-right(px) on item.
        'loop': true // Infinity loop. Duplicate last and first items to get loop illusion.
    });
}

$(document).ready(function() {
    initCarousel();
});
