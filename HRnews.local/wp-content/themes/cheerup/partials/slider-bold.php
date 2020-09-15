<?php
/**
 * Partial: Slider for the featured area
 */

$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'bold',
	'data-autoplay'  => Bunyad::options()->slider_autoplay,
	'data-speed'     => Bunyad::options()->slider_delay,
	'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => Bunyad::options()->slider_parallax
);

?>
	
	<section class="common-slider bold-slider">
	
		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
			
				<?php		
				
				// Disable lazyload for first image of slider
				if ($query->current_post == 0) {
					// Bunyad::lazyload()->disable();
				}
				elseif ($query->current_post == 1) {
					// Bunyad::lazyload()->restore();
				}
				
				?>
		
				<div class="item">
					<?php 
						Bunyad::media()->the_image(
							'cheerup-large-cover', 
							[
								'height'  => 0,
								'attr'    => ['sizes' => '100vw'],
								'bg_image'    => true,
								'ratio_class' => false
							]
						); 
					?>
					
					<div class="overlay cf">
					
						<span class="cats"><?php Bunyad::helpers()->meta_cats(); ?></span>
						
						<h2 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="author"><?php printf(esc_html_x('by %s', 'Post Meta', 'cheerup'), get_the_author_posts_link()); ?></div>
						
					</div>
					
				</div>

			<?php endwhile; $query->rewind_posts(); ?>
		</div>
		
		<div class="thumbs-wrap">		
			<div class="thumbs">
			
				<?php 
					// Disable for thumbs again
					// Bunyad::lazyload()->disable();
				?>
			
				<?php while ($query->have_posts()): $query->the_post(); ?>
				
				<div class="post-thumb">
					<?php 
						Bunyad::media()->the_image('cheerup-slider-bold-sm');
					?>
				</div>
				
				<?php endwhile; ?>
	
			</div>
		</div>

	</section>
	
	<?php wp_reset_postdata(); ?>