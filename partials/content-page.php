<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ): ?>
	<div class="entry-thumbnail">
		<?php if ( is_page_template('template-rightbar.php') || is_page_template('template-leftbar.php') ): ?>
			<?php the_post_thumbnail('single-featured'); ?>
		<?php else: ?>
			<?php the_post_thumbnail('page-featured'); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>	

	<header class="page-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="page-content">
		<?php edit_post_link( __( 'Edit', '_s' ), '<footer class="page-meta"><span class="tiny button round edit-link">', '</span></footer>' ); ?>	
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
