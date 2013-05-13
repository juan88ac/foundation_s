<?php
/**
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php _s_posted_on(); ?> <?php edit_post_link( __( 'Edit', '_s' ), '<span class="tiny button round edit-link">', '</span>' ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link small button round"><span aria-hidden="true" class="icon-comment-fill"></span> <?php comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->
	
	<?php if ( has_post_thumbnail() ): ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail('single-featured'); ?>
	</div>
	<?php endif; ?>		

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
	<ul class="no-bullet">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', '_s' ) );
				if ( $categories_list && _s_categorized_blog() ) :
			?>
			<li>
				<span aria-hidden="true" class="icon-bookmark"></span>
				<span class="radius secondary label"><?php _e('Posted in','_s'); ?></span>
				<?php printf( __( '%1$s', '_s' ), $categories_list ); ?>
			</li>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', '_s' ) );
				if ( $tags_list ) :
			?>
			<li>
				<span aria-hidden="true" class="icon-tags">
				<span class="radius secondary label"><?php _e('Tagged ','_s'); ?></span>			
				<?php printf( __( '%1$s', '_s' ), $tags_list ); ?>
			</li>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
	</ul>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
