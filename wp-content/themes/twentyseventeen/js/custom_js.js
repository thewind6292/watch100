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

     codenegar_format_range = function(template, min, max){
        var ret = template;
        min = min.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
        max = max.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
        ret = ret.replace("%s", min);
        ret = ret.replace("%e", max);
        return ret;
    }
});