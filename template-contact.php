<?php
/**
Template Name: Contact
 *
 * This is the template that displays Theme Options contact details.
 * it also shows custom css for contact form 7, gravity forms & custom form.
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area large-10 large-centered columns">
		<div id="content" class="site-content row" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/content', 'contact' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
