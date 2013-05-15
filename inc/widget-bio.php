<?php

class Bio_widget extends WP_Widget {
        public function __construct() {
               // widget actual processes
               parent::WP_Widget(false,'Destinos','description=Muestra un mapa con los hoteles por destino.');
        }

        public function form( $instance ) {
               //echo 'include html coding in here';
        }

        public function update( $new_instance, $old_instance ) {
               // processes widget options to be saved
        }

        public function widget( $args, $instance ) {
		?>												
		<!--BEGIN .author-bio-->
			<aside id="author-bio" class="panel">
				<div class="large-3 small-12 columns author-description">
					<?php echo get_avatar( get_the_author_meta('email'), '40' ); ?>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'first_name' ); ?> <?php echo get_the_author_meta( 'last_name' ); ?></a>
					<p><?php the_author_meta('description'); ?></p>
				</div>
				<div class="large-9 small-12 columns">
					<ul class="no-bullet">
						<li class="author-social-networks">
							<ul class="inline-list">
								<li class="author-email"><a href="mailto:<?php echo get_the_author_meta( get_the_author_meta( 'ID' ) ); ?>"><span aria-hidden="true" class="icon-envelope"></span></a></li>
								<li class="author-website"><a href="<?php the_author_meta('user_url');?>"><span aria-hidden="true" class="icon-globe"></span></a></li>
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
			</aside>
		<?php
        }

}
register_widget( 'Bio_widget' );

?>