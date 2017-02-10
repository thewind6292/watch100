jQuery(function() {
	
 jQuery('.block-content').owlCarousel({
            loop:true,
	    margin:20,
            items:4,
            pagination:false,
            autoplay:true,
	    responsiveClass:true,
             navigation:true,
            navigationText:[" "," "],
	    responsive:{
                0:{
                        items:2,
                        nav:false,
                        dots:true
						
                },
                400:{
                        items:2,
                        nav:false,
                        dots:true
                },
                600:{
                        items:3,
                        nav:true,
                        dots:false
                },
                835:{
                        items:3,
                        nav:true,
                        dots:false
                }
            }
	});
});