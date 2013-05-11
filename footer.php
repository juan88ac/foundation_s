<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _s
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div id="footer-sidebar" class="widget-area large-12 columns" role="complementary">
			<?php do_action( 'before_footerbar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', '_s' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
	
				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', '_s' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
	
			<?php endif; // end sidebar widget area ?>			
		</div>
		<div class="large-12 columns">
			<div class="row">
				<?php
					wp_nav_menu( array( 
						'walker' => new MV_Cleaner_Walker_Nav_Menu(),
						'theme_location'=> 'footer-menu',
						'container' => false,
						'items_wrap'      => '<dl id="%1$s" class="sub-nav">%3$s</dl>',											
					) );
				?>

			</div>
		</div>
		<div class="site-info">
			<?php do_action( '_s_credits' ); ?>
			<div class="large-4 columns">			
				<p class="copyright row"><?php echo date("Y",time()); ?> &copy; <?php _e('All rights reserved','_s') ?> <?php bloginfo( 'name' ); ?> </p>
			</div>
			<div id="credits" class="large-4 columns">
				<div class="row">
				<?php printf( __( 'Theme: <!--%1$s--> foundation_s by %2$s.', '_s' ), '_s', '<a href="http://lonchbox.com/" rel="designer">lonchbox</a>' ); ?>
				<a class="wordpress" href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', '_s' ); ?>">
					<img src="http://s.wordpress.org/about/images/wpmini-grey.png" align="top"/>
				</a>
				</div>
			</div>
		</div><!-- .site-info -->	
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>document.write('<script src=<?php echo get_template_directory_uri(); ?>/js/foundation/vendor/' + ('__proto__' in {} ? 'zepto' : 'jquery')   + '.js><\/script>');</script>

<?php wp_footer(); ?>

</body>
</html>