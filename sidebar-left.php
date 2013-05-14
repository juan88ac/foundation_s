<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _s
 */
?>
	<div id="secondary" class="widget-area large-4 columns" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
