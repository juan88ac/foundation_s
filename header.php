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

<!-- Schema.org Description -->
<meta itemprop="name" content="">
<meta itemprop="description" content="">

<!-- Setting favicon and Apple Touch Icon -->
<link rel="apple-touch-icon" href="<?php bloginfo ("template_url");?>/images/touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo ("template_url");?>/images/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo ("template_url");?>/images/touch-icon-iphone4.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo ("template_url");?>/images/touch-icon-ipad3.png">
<link rel="icon" type="image/png" href="<?php bloginfo ("template_url"); ?>/images/favicon.ico">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lte IE 7]><script src="<?php echo get_template_directory_uri(); ?>/lte-ie7.js"></script><![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
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
		header#masthead hgroup, #main, footer#colophon { background-color: <?php echo $bgColor?>; background: <?php echo $bgColor?>; }
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
