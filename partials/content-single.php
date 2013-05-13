<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php _s_posted_on(); ?> <?php edit_post_link( __( 'Edit', '_s' ), '<span class="tiny button round edit-link">', '</span>' ); ?>		
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php if ( has_post_thumbnail() ): ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail('single-featured'); ?>
	</div>
	<?php endif; ?>	

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
	<ul class="no-bullet">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', '_s' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', '_s' ) );
			?>
			<?php

			if ( ! _s_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '
					<li>
						<span aria-hidden="true" class="icon-tags"></span>
						<span class="radius secondary label">This entry was tagged</span> %2$s.
					</li>
					<li>
						<span aria-hidden="true" class="icon-link"></span>					
						<span class="radius secondary label">
							Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.
						</span>
					</li>
					', '_s' );
				} else {
					$meta_text = __( '
					<li>
						<span aria-hidden="true" class="icon-link"></span>
						<span class="radius secondary label">
							Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.
						</span>
					</li>
					', '_s' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '
					<li>
						<span aria-hidden="true" class="icon-bookmark"></span>
						<span class="radius secondary label">This entry was posted in</span> %1$s.
					</li>
					<li>
						<span aria-hidden="true" class="icon-tags">
						<span class="radius secondary label">Tagged</span> %2$s.
					</li>
					<li>
						<span aria-hidden="true" class="icon-link"></span>
						<span class="radius secondary label">
							Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.
						</span>
					</li>
					', '_s' );
				} else {
					$meta_text = __( '
					<li>
						<span aria-hidden="true" class="icon-bookmark"></span>
						<span class="radius secondary label">This entry was posted in</span> %1$s.
					</li>
					<li>
						<span aria-hidden="true" class="icon-link"></span>
						<span class="radius secondary label">Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>
					</li>
					', '_s' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>
	</ul>
	</footer><!-- .entry-meta -->
	
	<?php get_template_part( 'partials/content', 'bio' ); ?>	
</article><!-- #post-## -->
