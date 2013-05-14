<?php
/**
 * The Footer Sidebar containing the main widget areas.
 *
 * @package _s
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-4'  )
		&& ! is_active_sidebar( 'sidebar-5' )
		&& ! is_active_sidebar( 'sidebar-6'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<ul id="supplementary" <?php _s_footer_sidebar_class(); ?>>
	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<li id="first" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</li><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<li id="second" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</li><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<li id="third" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</li><!-- #third .widget-area -->
	<?php endif; ?>
</ul><!-- #supplementary -->