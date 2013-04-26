<?php
	$sliders = array(
		'post_type' => 'slider',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'menu_order',		
	);
	
	$orbit_slider = new WP_Query($sliders);
?>
<?php if ($orbit_slider->have_posts()) : ?>
	<ul data-orbit>
		<?php while ($orbit_slider->have_posts()) : $orbit_slider->the_post(); ?>
		  <li>
			<?php the_post_thumbnail('slider'); ?>
		    <div class="orbit-caption">
			    <?php the_excerpt(); ?>
		    </div>
		  </li>
		<?php endwhile; ?>  
	</ul>
<?php endif; ?>