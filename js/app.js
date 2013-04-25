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
			
/*
	$('#featured').orbit({
		animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
		animationSpeed: 800,                // how fast animtions are
		timer: false,                        // true or false to have the timer
		resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress
		advanceSpeed: 4000,                 // if timer is enabled, time between transitions
		pauseOnHover: false,                // if you hover pauses the slider
		startClockOnMouseOut: false,        // if clock should start on MouseOut
		startClockOnMouseOutAfter: 1000,    // how long after MouseOut should the timer start again
		directionalNav: true,               // manual advancing directional navs
		captions: true,                     // do you want captions?
		captionAnimation: 'fade',           // fade, slideOpen, none
		captionAnimationSpeed: 800,         // if so how quickly should they animate in
		bullets: true,                     // true or false to activate the bullet navigation
		bulletThumbs: false,                // thumbnails for the bullets
		//bulletThumbLocation: '',            // location from this file where thumbs will be
		afterSlideChange: function(){},     // empty function
		fluid: true                         // or set a aspect ratio for content slides (ex: '4x3')
	});
*/

});

$(document).foundation('section orbit', {
  timer_speed: 10000,
  animation_speed: 500,
  bullets: true,
  stack_on_small: true,
  container_class: 'orbit-container',
  stack_on_small_class: 'orbit-stack-on-small',
  next_class: 'orbit-next',
  prev_class: 'orbit-prev',
  timer_container_class: 'orbit-timer',
  timer_paused_class: 'paused',
  timer_progress_class: 'orbit-progress',
  slides_container_class: 'orbit-slides-container',
  bullets_container_class: 'orbit-bullets',
  bullets_active_class: 'active',
  slide_number_class: 'orbit-slide-number',
  caption_class: 'orbit-caption',
  active_slide_class: 'active',
  orbit_transition_class: 'orbit-transitioning'
},
function (response) {
  console.log(response.errors);
});