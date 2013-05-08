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
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header row" role="banner">
		<hgroup class="hide-for-small">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if ( of_get_option('logo') ): ?>
		            <img src="<?php echo of_get_option('logo'); ?>" />
	            <?php else: ?>
		            <?php bloginfo( 'name' ); ?>
		        <?php endif; ?>
	            </a>
            </h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="navigation-main top-bar" role="navigation">

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
					'theme_location'=> 'primary',
					'menu_class'	=> 'left',
					'container'		=> '',
					'container_class'	=> ''
				) ); ?>
	        </section>
			
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="main" class="site-main row">
