$(document).ready(function(){
    $(".testimonials").owlCarousel({
        itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 1],
            [800, 1],
            [1000, 1],
            [1200, 1],
            [1400, 1],
            [1600, 1]
        ],
        slideSpeed: 		200,
        paginationSpeed: 	800,
        rewindSpeed: 		1000,
        autoPlay: 			true,
        stopOnHover: 		false,
        navigation: 		false,
        scrollPerPage: 		false,
        pagination: 		true,
        paginationNumbers: 	false,
        mouseDrag: 			true,
        touchDrag: 			true,
        navigationText: 	["Prev", "Next"],
        leftOffSet: 		0,
    });

    $(".carry-services").owlCarousel({
        itemsCustom : [
            [0, 2],
            [450, 3],
            [600, 3],
            [700, 4],
            [800, 4],
            [1000, 5],
            [1200, 5],
            [1400, 6],
            [1600, 6]
        ],
        slideSpeed: 		200,
        paginationSpeed: 	800,
        rewindSpeed: 		1000,
        autoPlay: 			true,
        stopOnHover: 		false,
        navigation: 		true,
        scrollPerPage: 		false,
        pagination: 		false,
        paginationNumbers: 	false,
        mouseDrag: 			true,
        touchDrag: 			true,
        navigationText: 	['<img src="images/icon-left.png" />', '<img src="images/icon-right.png" />'],
        leftOffSet: 		0,
    });
});