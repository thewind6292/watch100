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
});