<?php
/**
 * foundation.min.css
 */
function foundation_stylesheet() {
    wp_enqueue_style( 'foundation.min', get_template_directory_uri() . '/css/foundation.min.css' );
}

add_action( 'wp_enqueue_scripts', 'foundation_stylesheet' );

/**
 * app.js Personalization JS for the site
 */
function foundation_app_script() {
	wp_enqueue_script('app', get_template_directory_uri() . '/js/app-ck.js',array('jquery'));
}	
	
add_action('wp_enqueue_scripts', 'foundation_app_script');

/**
 * foundation js
 */
function foundation_script() {
	//wp_deregister_script('jquery');
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/js/foundation/vendor/jquery.js');
	wp_enqueue_script('custom.modernizr',		get_template_directory_uri() . '/js/foundation/vendor/custom.modernizr.js' );
	
	wp_enqueue_script('foundation',				get_template_directory_uri() . '/js/foundation/foundation.js', array('jquery') );
	wp_enqueue_script('foundation.alerts',			get_template_directory_uri() . '/js/foundation/foundation.alerts.js', array('jquery') );
	wp_enqueue_script('foundation.clearing',			get_template_directory_uri() . '/js/foundation/foundation.clearing.js', array('jquery') );	
	wp_enqueue_script('foundation.cookie',			get_template_directory_uri() . '/js/foundation/foundation.cookie.js', array('jquery') );			
	wp_enqueue_script('foundation.dropdown',	get_template_directory_uri() . '/js/foundation/foundation.dropdown.js', array('jquery') );
	wp_enqueue_script('foundation.forms',			get_template_directory_uri() . '/js/foundation/foundation.forms.js', array('jquery') );	
	wp_enqueue_script('foundation.joyride',			get_template_directory_uri() . '/js/foundation/foundation.joyride.js', array('jquery') );	
	wp_enqueue_script('foundation.magellan',			get_template_directory_uri() . '/js/foundation/foundation.magellan.js', array('jquery') );	
	wp_enqueue_script('foundation.orbit',			get_template_directory_uri() . '/js/foundation/foundation.orbit.js', array('jquery') );					
	wp_enqueue_script('foundation.placeholder',			get_template_directory_uri() . '/js/foundation/foundation.placeholder.js', array('jquery') );	
	wp_enqueue_script('foundation.reveal',			get_template_directory_uri() . '/js/foundation/foundation.reveal.js', array('jquery') );	
	wp_enqueue_script('foundation.section',			get_template_directory_uri() . '/js/foundation/foundation.section.js', array('jquery') );	
	wp_enqueue_script('foundation.tooltips',			get_template_directory_uri() . '/js/foundation/foundation.tooltips.js', array('jquery') );
	wp_enqueue_script('foundation.topbar',			get_template_directory_uri() . '/js/foundation/foundation.topbar.js', array('jquery') );	
	wp_enqueue_script('foundation.interchange',			get_template_directory_uri() . '/js/foundation/foundation.interchange.js', array('jquery') );	
	wp_enqueue_script('foundation-settings', get_template_directory_uri() . '/js/foundation-settings-ck.js',array('jquery'),'1.0', true);
}	
	
add_action('wp_enqueue_scripts', 'foundation_script');

