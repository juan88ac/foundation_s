<!--BEGIN .author-bio-->
<div class="author-bio panel">
	<div class="large-3 small-12 columns"><?php echo get_avatar( get_the_author_meta('email'), '149' ); ?></div>
	<div class="large-9 small-12 columns">
	<ul class="no-bullet">
		<li class="author-description">
			<blockquote>
				<?php the_author_meta('description'); ?>
				<cite class="author-name"> 
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'first_name' ); ?> <?php echo get_the_author_meta( 'last_name' ); ?></a>
				</cite>
			</blockquote>
		</li>
		<li class="author-social-networks">
			<ul class="inline-list">
				<li class="author-website"><a href="<?php the_author_meta('user_url');?>"><span aria-hidden="true" class="icon-globe"></span></a><?php //the_author_link(); ?></li>
				<?php
					$rss_url = get_the_author_meta( 'rss_url' );
					if ( $rss_url && $rss_url != '' ) {
						echo '
			<li class="rss"><a href="' . esc_url($rss_url) . '"><span aria-hidden="true" class="icon-feed"></span></a></li>
			';
					}
					$google_profile = get_the_author_meta( 'google_profile' );
					if ( $google_profile && $google_profile != '' ) {
						echo '
			<li class="google"><a href="' . esc_url($google_profile) . '"><span aria-hidden="true" class="icon-google-plus"></span></a></li>
			';
					}
					$twitter_profile = get_the_author_meta( 'twitter_profile' );
					if ( $twitter_profile && $twitter_profile != '' ) {
						echo '
			<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><span aria-hidden="true" class="icon-twitter"></span></a></li>
			';
					}
					$facebook_profile = get_the_author_meta( 'facebook_profile' );
					if ( $facebook_profile && $facebook_profile != '' ) {
						echo '
			<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><span aria-hidden="true" class="icon-facebook"></span></a></li>
			';
					}
					$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
					if ( $linkedin_profile && $linkedin_profile != '' ) {
						echo '
			<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><span aria-hidden="true" class="icon-linkedin"></span></a></li>
			';
					}
				?>
			</ul>
		</li>
	</ul>
	</div>
</div>
<!--END .author-bio-->
<!-- Check fonts/index.html to know how to use the icons -->