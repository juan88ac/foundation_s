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
	
	<section class="contact-details large-12 columns">
	<div class="row">
		<?php
			$address = of_get_option('address');
			$postal = of_get_option('postal_code');
			$location = of_get_option('location');
			$state = of_get_option('state');
			$phone = of_get_option('phone');
			$email = of_get_option('email');
			$gmap = of_get_option('google_maps');			
		?>
		<address>
			<ul class="vcard large-6 columns">
			<?php if($address != ''): ?>
			  <li class="street-address"><span aria-hidden="true" class="icon-location"></span> <?php echo $address ?></li>
			<?php endif; ?>
			<?php if($location != ''): ?>
			  <li class="locality"><?php echo $location ?></li>
			<?php endif; ?>
			  <li><?php if($state != ''): ?><span class="state"><?php echo $state ?></span>, <?php endif; ?><?php if($postal != ''): ?><span class="zip"><?php echo $postal ?></span><?php endif; ?></li>
			<?php if($email != ''): ?>
			  <li class="email"><span aria-hidden="true" class="icon-envelope"></span> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
			<?php endif; ?>
			<?php if($phone != ''): ?>
			  <li class="tel"><span aria-hidden="true" class="icon-phone"></span> <a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></li>
			<?php endif; ?>
			</ul>
		</address>
		<div class="large-6 columns">
		<?php if($gmap != ''): ?>
			<iframe border="0" src="<?php echo $gmap ?>" border="0"></iframe>
		<?php endif; ?>
		</div>
	</div>
	</section>
</article><!-- #post-## -->
