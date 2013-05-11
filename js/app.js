$(document).ready(function() {
	
	/* WORDPRESS NAV-BAR SUPPORT ------------- */
	/* Adds support for the top-bar with flyouts in WordPress */	
	
	$('.top-bar-section li').has('ul').addClass("has-dropdown");
	$('.top-bar-section li ul').addClass("dropdown");

	/* WORDPRESS WP_Nav_Menu_Widget SUPPORT ------------- */
	/* Adds support for the side-nav styles in wordpress menu widget */	

	$('aside.widget_nav_menu ul.menu').addClass("side-nav");
	$('aside.widget_nav_menu ul.menu li.current-menu-item').addClass("active");	

});