jQuery( document ).ready(function() {
    jQuery(".menu-item-has-children").click(function() {
	  	jQuery(this).find('.sub-menu').toggleClass('active');
	});
});