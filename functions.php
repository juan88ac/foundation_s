<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails', array('post','slider', 'page') );
	add_image_size( 'slider', 1000, 400, true); /* slider image size used in partials/content-slider.php */
	add_image_size( 'template-slider', 667, 400, true); /* slider image size for Slider Template */	
	add_image_size( 'single-featured', 637, 400, true); /* Single post image side used in partials/content.php */	
	add_image_size( 'page-featured', 833, 300, true); /* Page image side used in partials/content-page.php */		
	add_image_size( 'gallery-thumbnail', 208, 220, true); /* Image size for thumbnail of a Foundation Clearing gallery inc/new-gallery-markup.php */			

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'header-menu' => __( 'Main Menu', '_s' ),
		'footer-menu' => __( 'Footer Menu', '_s' ),		
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function _s_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( '_s_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', '_s_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Front Page Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Right', '_s' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', '_s' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel callout">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', '_s' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', '_s' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel callout">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', '_s' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', '_s' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel callout">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', '_s' ),
		'id' => 'sidebar-6',
		'description' => __( 'An optional widget area for your site footer', '_s' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s panel callout">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function _s_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'large-12 small-12 columns';
			break;
		case '2':
			$class = 'small-block-grid-1 large-block-grid-2';
			break;
		case '3':
			$class = 'small-block-grid-1 large-block-grid-3';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Enqueue scripts and styles
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	//wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_s-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/*
*Making jQuery Google API
*/
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', false, '2.0.0');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

/**
 * Implement foundation
 */
require( get_template_directory() . '/inc/foundation.php' );

/**
 * style.min.css
 */
function style_min_stylesheet() {
    wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.min.css' );
}

add_action( 'wp_enqueue_scripts', 'style_min_stylesheet' );

/**
 * Implement WP dashboard & backend hacks.
 */
require( get_template_directory() . '/inc/hacks.php' );

/**
 * Optimize [gallery] markup to use foundation clearing galleries.
 */
require( get_template_directory() . '/inc/custom-gallery-markup.php' );

/**
 * wp_nav_menu markup to use foundation sub-nav styles.
 */
require( get_template_directory() . '/inc/custom-menu-walker.php' );



/**
 * Implement advanced custom post type framework
 */
require( get_template_directory() . '/inc/acpt.php' );

/**
 * Initialize the metabox class
 */
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'inc/metaboxes/example-metaboxes.php' );
		require_once( 'inc/metaboxes/init.php' );

	}
}

/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options/' );
	require_once dirname( __FILE__ ) . '/inc/options/options-framework.php';
}


