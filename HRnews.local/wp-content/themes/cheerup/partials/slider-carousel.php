<?php
/**
 * Partial: "Carousel" Slider for the featured area
 */

$props = array_replace([
	'slider_autoplay' => Bunyad::options()->slider_autoplay,
	'slider_delay'    => Bunyad::options()->slider_delay,
	'slider_parallax' => Bunyad::options()->slider_parallax
], $props);

$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'carousel',
	'data-autoplay'  => $props['slider_autoplay'],
	'data-speed'     => $props['slider_delay'],
	//'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => $props['slider_parallax']
);

?>
	
	<section class="common-slider carousel-slider ts-contain">
	<div class="wrap">
		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
		
				<div class="item">

					<?php Bunyad::media()->the_image('cheerup-slider-carousel'); ?>
					
					<div class="overlay cf">

						<?php Bunyad::helpers()->meta_cats(); ?>
							
						<h2 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
					</div>
					
				</div>
				
			<?php endwhile; ?>
		</div>
	</div>
	</section>
	
	<?php wp_reset_postdata(); ?>