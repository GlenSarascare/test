<?php
/**
 * Partial: Slider for the featured area
 */

$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'large',
	'data-autoplay'  => Bunyad::options()->slider_autoplay,
	'data-speed'     => Bunyad::options()->slider_delay,
	'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => Bunyad::options()->slider_parallax
);

?>
	
	<section class="common-slider large-slider">
	
		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
		
				<div class="item">

					<?php 
						Bunyad::media()->the_image(
							'cheerup-large-cover', 
							[
								'height'  => 0,
								'attr'    => ['sizes' => '100vw']
							]
						); 
					?>
					
					<div class="overlay cf">
					
						<span class="category"><?php Bunyad::helpers()->meta_cats(); ?></span>
						
						<h2 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Continue Reading', 'cheerup'); ?></a>
						
					</div>
					
				</div>
				
			<?php endwhile; ?>
		</div>

	</section>
	
	<?php wp_reset_postdata(); ?>