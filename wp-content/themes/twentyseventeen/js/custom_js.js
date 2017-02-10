jQuery( document ).ready(function() {
    jQuery(".menu-item-has-children").hover(function() {
	  	jQuery(this).find('.sub-menu').toggleClass('active');
	});

    jQuery( function() {
    	var points = [];
    	jQuery('.title-pro-pass-js').each(function( index ) {
		  points.push( jQuery( this ).text() );
		});
    jQuery( ".form-search .search-field" ).autocomplete({
      source: points
    });
  } );

    jQuery(window).on('load', function() {
      jQuery('#slider').nivoSlider(); 
    }); 
     jQuery(".push-button").click(function() {
	  	jQuery('#nav-mainmenu').toggleClass('active');
	});
console.log(jQuery('#slider img').height());
     jQuery('#slider').height(jQuery('#slider>img').height());
});