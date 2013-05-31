<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

		/* Site personalizacion */
		$options[] = array(
			'name' => __('Brand Settings', 'options_framework_theme'),
			'type' => 'heading');
	
		$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('This creates a full size uploader that previews the image.', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload'
		);
		
		$options[] = array(
		'name' => __('Custom Typography', 'options_framework_theme'),
		'desc' => __('Custom typography options.', 'options_framework_theme'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );
		
		$options[] = array(
		'name' => __('Page background color', 'options_framework_theme'),
		'desc' => __('The color for the page content background.', 'options_framework_theme'),
		'id' => 'page_back_color',
		'type' => 'color'
		);
		
		$options[] = array(
		'name' => __('Links color', 'options_framework_theme'),
		'desc' => __('The color for the links.', 'options_framework_theme'),
		'id' => 'link_color',
		'type' => 'color');
		
		$options[] = array(
		'name' => __('Links on hover color', 'options_framework_theme'),
		'desc' => __('The color for the links on hovered.', 'options_framework_theme'),
		'id' => 'link_hover_color',
		'type' => 'color');		

		$options[] = array(
		'name' => __('Menu bar backgroud color', 'options_framework_theme'),
		'desc' => __('The color for background of the menu bar.', 'options_framework_theme'),
		'id' => 'back_color_menu',
		'type' => 'color');
				
		$options[] = array(
		'name' => __('Menu bar links color', 'options_framework_theme'),
		'desc' => __('The color for the links in the menu bar.', 'options_framework_theme'),
		'id' => 'link_color_menu',
		'type' => 'color');
		
		$options[] = array(
		'name' => __('Menu bar links hover color', 'options_framework_theme'),
		'desc' => __('The color for the links in the menu bar.', 'options_framework_theme'),
		'id' => 'link_hover_color_menu',
		'type' => 'color');

		$options[] = array(
		'name' => __('Menu bar button hover color', 'options_framework_theme'),
		'desc' => __('The color for the links in the menu bar.', 'options_framework_theme'),
		'id' => 'button_hover_color_menu',
		'type' => 'color');
		
		$options[] = array(
		'name' => __('Favicon ICO', 'options_framework_theme'),
		'desc' => __('Use http://www.favicon.cc/ to create .ico file.', 'options_framework_theme'),
		'id' => 'favicon_ico',
		'type' => 'upload'
		);

		$options[] = array(
		'name' => __('Favicon PNG', 'options_framework_theme'),
		'desc' => __('Can be 16x16px or 32x32px PNG file.', 'options_framework_theme'),
		'id' => 'favicon_png',
		'type' => 'upload'
		);

		$options[] = array(
		'name' => __('iPhone & iPad Icon', 'options_framework_theme'),
		'desc' => __('72x72 PNG image. Or use http://www.pic2icon.com/site_icon_for_iphone_ipad_generator.php', 'options_framework_theme'),
		'id' => 'touch_icon_iphone',
		'type' => 'upload'
		);

		$options[] = array(
		'name' => __('iPhone 4', 'options_framework_theme'),
		'desc' => __('114x114 PNG image. Or use http://www.pic2icon.com/site_icon_for_iphone_ipad_generator.php', 'options_framework_theme'),
		'id' => 'touch_icon_iphone4',
		'type' => 'upload'
		);

		$options[] = array(
		'name' => __('iPad 3', 'options_framework_theme'),
		'desc' => __('144x144 PNG image. Or use http://www.pic2icon.com/site_icon_for_iphone_ipad_generator.php', 'options_framework_theme'),
		'id' => 'touch_icon_ipad3',
		'type' => 'upload'
		);

		
		/* Social networks links */
		$options[] = array(
			'name' => __('Social Networks', 'options_framework_theme'),
			'type' => 'heading');
	
		$options[] = array(
		'name' => __('Facebook Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'fb_profile',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Facebook Page', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'fb_page',
		'type' => 'text'
		);
		
		$options[] = array(
		'name' => __('Twitter Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'twitter',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Linkedin Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'linkedin',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('WordPress.org Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'wp_org_profile',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Youtube Channel', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'youtube_channel',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Vimeo Channel', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'vimeo_channel',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Google+ Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'google_plus',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Instagram Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'instagram',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Flickr Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'flickr',
		'type' => 'text'
		);
		
		$options[] = array(
		'name' => __('Dribbble Profile', 'options_framework_theme'),
		'desc' => __('Paste full url with http://.', 'options_framework_theme'),
		'id' => 'dribbble',
		'type' => 'text'
		);

		/* Contact details - Used in contact template */
		$options[] = array(
			'name' => __('Contact Details', 'options_framework_theme'),
			'type' => 'heading');
	
		$options[] = array(
		'name' => __('Address', 'options_framework_theme'),
		'desc' => __('i.e: Very long Av. N12, Calle Orell 4, 5ºA', 'options_framework_theme'),
		'id' => 'address',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Postal Code', 'options_framework_theme'),
		'desc' => __('i.e: 007340', 'options_framework_theme'),
		'id' => 'postal_code',
		'class' => 'mini',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Location', 'options_framework_theme'),
		'desc' => __('i.e: Caprica City', 'options_framework_theme'),
		'id' => 'location',
		'type' => 'text'
		);
		
		$options[] = array(
		'name' => __('State/Province', 'options_framework_theme'),
		'desc' => __('i.e: Caprica', 'options_framework_theme'),
		'id' => 'state',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Phone', 'options_framework_theme'),
		'desc' => __('i.e: +34 971 00 00 00', 'options_framework_theme'),
		'id' => 'phone',
		'class' => 'mini',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Email', 'options_framework_theme'),
		'desc' => __('i.e: info[at]domain[dot]com', 'options_framework_theme'),
		'id' => 'email',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Google Maps', 'options_framework_theme'),
		'desc' => __('Paste full url.', 'options_framework_theme'),
		'id' => 'google_maps',
		'type' => 'text'
		);
		

		/* Legal details - Used in footer.php adn legal template */
		$options[] = array(
			'name' => __('Footer Links', 'options_framework_theme'),
			'type' => 'heading');
		
		$options[] = array(
		'name' => __('Select Pages', 'options_framework_theme'),
		'desc' => __('Selected pages will show as footer links. Choose pages like: Legal, Impressum, Copyrights, Credits', 'options_framework_theme'),
		'id' => 'footer_pages',
		'type' => 'multicheck',
		'options' => $options_pages);		
		

		/* MetaSEO details - Used in contact template */
		$options[] = array(
			'name' => __('GEO Metas', 'options_framework_theme'),
			'type' => 'heading');
	
		$options[] = array(
		'name' => __('Region', 'options_framework_theme'),
		'desc' => __('Find it here http://www.geo-tag.de/generator/en.html', 'options_framework_theme'),
		'id' => 'geo_region',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Place name', 'options_framework_theme'),
		'desc' => __('Find it here http://www.geo-tag.de/generator/en.html', 'options_framework_theme'),
		'id' => 'geo_placename',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('Position', 'options_framework_theme'),
		'desc' => __('Find it here http://www.geo-tag.de/generator/en.html', 'options_framework_theme'),
		'id' => 'geo_position',
		'type' => 'text'
		);

		$options[] = array(
		'name' => __('ICBM', 'options_framework_theme'),
		'desc' => __('Find it here http://www.geo-tag.de/generator/en.html', 'options_framework_theme'),
		'id' => 'geo_icbm',
		'type' => 'text'
		);


	return $options;
}