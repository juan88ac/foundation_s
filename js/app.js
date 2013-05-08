$(document).ready(function() {
	
	/* WORDPRESS NAV-BAR SUPPORT ------------- */
	/* Adds support for the nav-bar with flyouts in WordPress */	
	
	$('.top-bar-section li').has('ul').addClass("has-dropdown");
	$('.top-bar-section li ul').addClass("dropdown");

});