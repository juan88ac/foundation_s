$(document).ready(function() {
	
	/* WORDPRESS NAV-BAR SUPPORT ------------- */
	/* Adds support for the nav-bar with flyouts in WordPress */	
/*
	$('.nav-bar li').has('ul').addClass("has-flyout");
	$('.nav-bar li.has-flyout a').addClass("link-item");
	$('.nav-bar li ul').addClass("flyout");  
*/
	
	$('.top-bar li').has('ul').addClass("has-dropdown");
	$('.top-bar li ul').addClass("dropdown");

});