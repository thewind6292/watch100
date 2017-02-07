jQuery( document ).ready(function() {
    jQuery(".menu-item-has-children").hover(function() {
	  	jQuery(this).find('.sub-menu').toggleClass('active');
	});

	// jQuery( ".menu-item-has-children .sub-menu" ).mouseout(function() {
	// 	if( jQuery(this).hasClass('active')) {
	// 		jQuery(this).removeClass('active');
	// 	}
	// });
});