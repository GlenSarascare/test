<?php
/**
 * Partial: Slider for the featured area
 */

$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'beauty',
	'data-autoplay'  => Bunyad::options()->slider_autoplay,
	'data-speed'     => Bunyad::options()->slider_delay,
	'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => Bunyad::options()->slider_parallax
);

?>
	
	<section class="common-slider beauty-slider ts-contain">
	<div class="wrap">
		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
		
				<div class="item">

					<?php Bunyad::media()->the_image('cheerup-slider-alt'); ?>
					
					<div class="overlay cf">

					<?php
						Bunyad::helpers()->post_meta(
							'slider-beauty',
							[
								'items_above' => ['cat'],
								'items_below' => ['date'],
								'title_class' => 'post-title',
								'text_labels' => [],
								'divider'     => false,
								'align'       => 'center'
							]
						);
					?>
						
					</div>
					
				</div>
				
			<?php endwhile; ?>
		</div>
	</div>
	</section>
	
	<?php wp_reset_postdata(); ?>