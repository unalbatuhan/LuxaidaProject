jQuery(document).ready(function() { 
	
	"use strict";
	
	// Accordion
	jQuery( ".accordion" ).accordion( { autoHeight: false } );

	// Toggle	
	jQuery( ".toggle > .inner" ).hide();
	jQuery(".toggle .title").on("click",function() {
		jQuery(this).toggleClass("active");
		if (jQuery(this).hasClass("active")) {
			jQuery(this).closest(".toggle").find(".inner").slideDown(200, "easeOutCirc");
		} else {
			jQuery(this).closest(".toggle").find(".inner").slideUp(200, "easeOutCirc");
		}
	});
	
	// Tabs
	jQuery(function() {
		jQuery( "#tabs" ).tabs();
	});
	
});