<?php
function remove_pages_columns($defaults) {
  unset($defaults['comments']);
  return $defaults;
}
add_filter('manage_pages_columns', 'remove_pages_columns');

/*
* remove login errors
*/
add_filter('login_errors',create_function('$a', "return null;"));

function admin_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_url').'/images/admin-logo.png) !important; height:200px !important; background-position: 0 0; }
    </style>';
}

add_action('login_head', 'admin_login_logo');

/*
* Remove footer admin
*/
function remove_footer_admin () {
  echo '';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/*
* Remove default wordpress dashboard 
*/
 function admin_remove_dashboard_widgets() {
 	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
 	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );	
 	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
 	//remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side' );
 } 
 
add_action('wp_dashboard_setup', 'admin_remove_dashboard_widgets' );


/*
* remove junk from head
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*===================================================================================
 * Add Author Links
 * =================================================================================*/
function add_to_author_profile( $contactmethods ) {
	$contactmethods['rss_url'] = 'RSS URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

/*
* detect visitor browser
*/
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}


/*
* Remove admin bar menu and WP logo
*/
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

/*
* allways activate secont row of TinyMCE
*/
function add_fontselect_row_3( $mce_buttons ) {
$mce_buttons[] = 'fontselect';
return $mce_buttons;
}

/*
* preserve image quality
*/
//add_filter('jpeg_quality', function($arg){return 100;});


/*
* Remove menus from dashboard
*/
add_action('admin_menu', 'remove_menus', 102);
function remove_menus()
{
global $submenu;

//remove_menu_page( 'edit.php' ); // Posts
//remove_menu_page( 'upload.php' ); // Media
//remove_menu_page( 'edit-comments.php' ); // Comments
//remove_menu_page( 'edit.php?post_type=page' ); // Pages
//remove_menu_page( 'plugins.php' ); // Plugins
//remove_menu_page( 'themes.php' ); // Appearance
//remove_menu_page( 'users.php' ); // Users
//remove_menu_page( 'tools.php' ); // Tools
//remove_menu_page(‘options-general.php’); // Settings

//remove_submenu_page ( 'index.php', 'update-core.php' );    //Dashboard->Updates
//remove_submenu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
//remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
remove_submenu_page ( 'plugins.php', 'plugin-editor.php' ); // Plugins-->Editor
//remove_submenu_page ( 'options-general.php', 'options-general.php' ); // Settings->General
//remove_submenu_page ( 'options-general.php', 'options-writing.php' ); // Settings->writing
//remove_submenu_page ( 'options-general.php', 'options-reading.php' ); // Settings->Reading
//remove_submenu_page ( 'options-general.php', 'options-discussion.php' ); // Settings->Discussion
//remove_submenu_page ( 'options-general.php', 'options-media.php' ); // Settings->Media
}

/*
* remove default widgets
*/
function unregister_default_wp_widgets() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  //unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  //unregister_widget('WP_Widget_Text');
  //unregister_widget('WP_Widget_Categories');
  //unregister_widget('WP_Widget_Recent_Posts');
  //unregister_widget('WP_Widget_Recent_Comments');
  //unregister_widget('WP_Widget_RSS');
  //unregister_widget('WP_Widget_Tag_Cloud');
  //unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

// Add the column
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Featured');
  return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'thumbnail' );
      else
        echo 'Not supported in theme';
      break;
  }
}

// remove post/pages metaboxes
function remove_extra_meta_boxes() {
//remove_meta_box( 'postcustom' , 'post' , 'normal' ); // custom fields for posts
//remove_meta_box( 'postcustom' , 'page' , 'normal' ); // custom fields for pages
//remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); // post excerpts
//remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); // page excerpts
//remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); // recent comments for posts
//remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); // recent comments for pages
//remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' ); // post tags
//remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); // page tags
//remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); // post trackbacks
//remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); // page trackbacks
//remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); // allow comments for posts
//remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); // allow comments for pages
//remove_meta_box('slugdiv','post','normal'); // post slug
//remove_meta_box('slugdiv','page','normal'); // page slug
//remove_meta_box('pageparentdiv','page','side'); // Page Parent
}
add_action( 'admin_menu' , 'remove_extra_meta_boxes' );


// remove deactivate and edit form plugins
/*
function slt_lock_plugins( $actions, $plugin_file, $plugin_data, $context ) {
    // Remove edit link for all
    if ( array_key_exists( 'edit', $actions ) )
        unset( $actions['edit'] );
    // Remove deactivate link for crucial plugins
    if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
        'sitepress-multilingual-cms/sitepress.php',
        'wpml-string-translation/plugin.php',
        'wpml-media/plugin.php',
        'slimjetpack/slimjetpack.php',
        'tablepress/tablepress.php',
        
    )))
        unset( $actions['deactivate'] );
    return $actions;
}
add_filter( 'plugin_action_links', 'slt_lock_plugins', 10, 4 );
*/
