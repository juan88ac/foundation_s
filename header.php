<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no," />
<meta name="apple-mobile-web-app-capable" content="yes" />

<?php /*CUSTOM STYLES*/
	$favicon_ico = of_get_option('favicon_ico');
	$favicon_png = of_get_option('favicon_png');
	$icon_iphone = of_get_option('touch_icon_iphone');
	$icon_iphone4 = of_get_option('touch_icon_iphone4');	
	$icon_ipad3 = of_get_option('touch_icon_ipad3');		
?>

<!-- Setting favicon and Apple Touch Icon -->
<link rel="apple-touch-icon" href="<?php bloginfo ('template_url');?>/images/touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo ('template_url');?>/images/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo ('template_url');?>/images/touch-icon-iphone4.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo ('template_url');?>/images/touch-icon-ipad3.png">
<link rel="icon" type="image/png" href="<?php bloginfo ('template_url'); ?>/images/favicon.ico">
<link rel="canonical" href="<?php bloginfo ('url'); ?>"/>
<link rel="shortcut icon" href="<?php bloginfo ('template_url'); ?>/images/favicon.png" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="author" href="<?php bloginfo ('template_url'); ?>/humans.txt" />


<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'olahotels_base' ), max( $paged, $page ) );
	
		?>
</title>
	
	<?php
	if (is_single() || is_category() || is_tag()) {
	$postTags = get_the_tags();
	$tagNames = array();
	if($postTags){
	foreach($postTags as $tag) {
	$tagNames[] = $tag->name;
	}
	}
	}
	?>
	<?php
	//if single post then add excerpt as meta description
	if (is_single()) {
	?>
	<meta name="keywords" content="<?php echo implode($tagNames,","); ?>" />
	<?php
	//if homepage use standard meta description
	} else if(is_home() || is_page()) {
	?>
	<meta name="keywords" content="<?php get_bloginfo ( 'description' );?>" />
	<?php
	//if category page, use category description as meta description
	} else if(is_category()) {
	?>
	<meta name="keywords" content="<?php echo implode($tagNames,","); ?>" />
	<?php } ?>
	
	<?php if(is_single() || is_page() || is_home()) { ?>
	    <meta name="googlebot" content="index,noarchive,follow,noodp" />
	    <meta name="robots" content="all,index,follow" />
		<meta name="msnbot" content="all,index,follow" />
	<?php } else { ?>
	    <meta name="googlebot" content="noindex,noarchive,follow,noodp" />
	    <meta name="robots" content="noindex,follow" />
		<meta name="msnbot" content="noindex,follow" />
	<?php }?>

	<meta name="title" content="<?php if((is_home()) || (is_front_page())) {
	echo bloginfo('name'); bloginfo('description');
	} elseif(is_category()) {
	echo category_description();
	} elseif(is_tag()) {
	echo 'Tag archive page for this blog - ' . single_tag_title();
	} elseif(is_month()) {
	echo 'Archive page for this blog - ' . the_time('F, Y');
	} else {
	echo get_post_meta($post->ID, 'metadescription', true);
	} ?>">
	
	<meta name="description" content="
	<?php if((is_home()) || (is_front_page())) {
	echo bloginfo('name'); bloginfo('description');
	} elseif(is_category()) {
	echo category_description();
	} elseif(is_tag()) {
	echo 'Tag archive page for this blog - ' . single_tag_title();
	} elseif(is_month()) {
	echo 'Archive page for this blog - ' . the_time('F, Y');
	} else {
	echo get_post_meta($post->ID, 'metadescription', true);
	} ?>" />

<meta name="geo.region" content="<?php echo of_get_option('geo_region'); ?>" />
<meta name="geo.placename" content="<?php echo of_get_option('geo_placename'); ?>" />
<meta name="geo.position" content="<?php echo of_get_option('geo_position'); ?>" />
<meta name="ICBM" content="<?php echo of_get_option('geo_icbm'); ?>" /> 

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if IE 7]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css">
<![endif]-->

<!--[if IE 8]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css">
<![endif]-->

<!--[if IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie9.css">
<![endif]-->

<?php wp_head(); ?>

<?php /*CUSTOM STYLES*/
	$bgColor = of_get_option('page_back_color');
	$linksColor = of_get_option('link_color');
	$linksColorHover = of_get_option('link_hover_color');
	$menuBackColor = of_get_option('back_color_menu');	
	$menuLinksColor = of_get_option('link_color_menu');
	$menuLinksHoverColor = of_get_option('link_hover_color_menu');	
	$menuButtonHoverColor = of_get_option('button_hover_color_menu');
?>
<style type="text/css">
	
	<?php if($bgColor != ''): ?>
		header#masthead hgroup, #main, footer#colophon, header#masthead #social-networks { background-color: <?php echo $bgColor?>; background: <?php echo $bgColor?>; }
	<?php endif; ?>
	<?php if($linksColor != ''): ?>
		a, .pagination li a, .side-nav li a { color: <?php echo $linksColor?>; }
	<?php endif; ?>
	<?php if($linksColorHover != ''): ?>
		a:hover, .pagination li a:hover, .side-nav li a:hover { color: <?php echo $linksColorHover?>; }
		.button, .panel.callout {border-color: <?php echo $linksColorHover?>; }
	<?php endif; ?>
	<?php if($menuBackColor != ''): ?>
		.top-bar, .top-bar-section ul, .top-bar-section ul li>a, .top-bar-section li a:not(.button),
		.button, .panel.callout { 
			background: <?php echo $menuBackColor?>
		}
	<?php endif; ?>
	<?php if($menuLinksColor != ''): ?>
		.top-bar-section ul li>a, .button, .button a {
			color: <?php echo $menuLinksColor?>;
		}
	<?php endif; ?>
	<?php if($menuLinksHoverColor != ''): ?>
		.top-bar-section ul li>a:hover, .top-bar-section li a:not(.button):hover, .button:hover, .button a:hover { 
			color: <?php echo $menuLinksHoverColor?>;
		}
	<?php endif; ?>	
	<?php if($menuButtonHoverColor != ''): ?>
		.top-bar-section ul li>a:hover, .top-bar-section li a:not(.button):hover, .button:hover { 
			background: <?php echo $menuButtonHoverColor?>;
		}
	<?php endif; ?>	
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php
			$fb_profile = of_get_option('fb_profile');
			$fb_page = of_get_option('fb_page');
			$twitter = of_get_option('twitter');
			$linkedin = of_get_option('linkedin');
			$gplus = of_get_option('google_plus');
			$instagram = of_get_option('instagram');
			$github = of_get_option('github');
			$flickr = of_get_option('flickr');			
		?>
		<div id="social-networks" class="row">
			<dl class="sub-nav large-12 columns">
				<dt><?php _e('Social networks','_s'); ?></dt>
			<?php if($fb_profile != ''): ?>
				<dd><a href="<?php echo $fb_profile ?>"><span aria-hidden="true" class="icon-facebook"></span></a></dd>
			<?php endif; ?>
			<?php if($fb_page != ''): ?>
				<dd><a href="<?php echo $fb_page ?>"><span aria-hidden="true" class="icon-facebook"></span></a></dd>
			<?php endif; ?>
			<?php if($twitter != ''): ?>
				<dd><a href="<?php echo $twitter ?>"><span aria-hidden="true" class="icon-twitter"></span></a></dd>
			<?php endif; ?>
			<?php if($linkedin != ''): ?>
				<dd><a href="<?php echo $linkedin ?>"><span aria-hidden="true" class="icon-linkedin"></span></a></dd>
			<?php endif; ?>
			<?php if($gplus != ''): ?>
				<dd><a href="<?php echo $gplus ?>"><span aria-hidden="true" class="icon-google-plus"></span></a></dd>
			<?php endif; ?>
			<?php if($instagram != ''): ?>
				<dd><a href="<?php echo $instagram ?>"><span aria-hidden="true" class="icon-instagram"></span></a></dd>
			<?php endif; ?>
			<?php if($github != ''): ?>
				<dd><a href="<?php echo $github ?>"><span aria-hidden="true" class="icon-github"></span></a></dd>
			<?php endif; ?>
			<?php if($flickr != ''): ?>
				<dd><a href="<?php echo $flickr ?>"><span aria-hidden="true" class="icon-flickr"></span></a></dd>
			<?php endif; ?>
			</dl>
		</div>
		<hgroup class="hide-for-small row">
			<h1 class="site-title large-12 small-12 columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if ( of_get_option('logo') ): ?>
		            <img src="<?php echo of_get_option('logo'); ?>" />
	            <?php else: ?>
		            <?php bloginfo( 'name' ); ?>
		        <?php endif; ?>
	            </a>
            </h1>
			<h2 class="site-description large-12 small-12 columns"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
		
		<div class="header-image row">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
			</a>
		<?php } // if ( ! empty( $header_image ) ) ?>
		</div>
		
		<div class="main-menu-fixed" data-magellan-expedition="fixed">
		<nav id="site-navigation" class="navigation-main top-bar row" role="navigation">

			<ul class="title-area hide-for-medium-up">
				<!-- Title Area -->
				<li class="name">
					<h1>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php if ( of_get_option('logo') ): ?>
				            <img src="<?php echo of_get_option('logo'); ?>" />
			            <?php else: ?>
				            <?php bloginfo( 'name' ); ?>
				        <?php endif; ?>
			            </a>
		            </h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
  
	        <section class="top-bar-section">
				<?php wp_nav_menu( array( 
					'theme_location'=> 'header-menu',
					'menu_class'	=> 'left',
					'container'		=> '',
					'container_class'	=> ''
				) ); ?>
	        </section>
			
		</nav><!-- #site-navigation -->
		</div>

	</header><!-- #masthead -->

	<div id="main" class="site-main row">
