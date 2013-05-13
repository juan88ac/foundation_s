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
		<div class="large-12 small-12 columns">
		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>
		</div>
		<div class="large-12 columns">
			<?php
				wp_nav_menu( array( 
					'walker' => new MV_Cleaner_Walker_Nav_Menu(),
					'theme_location'=> 'footer-menu',
					'container' => false,
					'items_wrap' => '<dl id="%1$s" class="sub-nav"><dt>Submenu:</dt>%3$s</dl>',											
				) );
			?>
		</div>
		<div class="site-info large-12 columns">
			<?php do_action( '_s_credits' ); ?>
			<div class="large-4 columns">			
				<p class="copyright row"><?php echo date("Y",time()); ?> &copy; <?php _e('All rights reserved','_s') ?> <?php bloginfo( 'name' ); ?> </p>
			</div>
			<div id="credits" class="large-4 columns">
				<p class="row">
				<?php printf( __( 'Theme: <!--%1$s--> foundation_s by %2$s.', '_s' ), '_s', '<a href="http://lonchbox.com/" rel="designer">lonchbox</a>' ); ?>
				<a class="wordpress" href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', '_s' ); ?>"><span aria-hidden="true" class="icon-wordpress"></span></a>
				</p>
			</div>
		</div><!-- .site-info -->	
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<script>
document.write('<script src=<?php echo get_template_directory_uri(); ?>/js/foundation/vendor/' + ('__proto__' in {} ? 'zepto' : 'jquery')   + '.js><\/script>');</script>

<?php wp_footer(); ?>

<script>
document.getElementById("glyphs").addEventListener("click", function(e) {
	var target = e.target;
	if (target.tagName === "INPUT") {
		target.select();
	}
});	
</script>

</body>
</html>