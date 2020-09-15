<?php
/**
 * Partial: Slider for the featured area
 */

$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'fashion',
	'data-autoplay'  => Bunyad::options()->slider_autoplay,
	'data-speed'     => Bunyad::options()->slider_delay,
	'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => Bunyad::options()->slider_parallax
);

?>
	
	<section class="common-slider fashion-slider ts-contain">
	<div class="wrap">
		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
		
				<div class="item">

					<?php 
						Bunyad::media()->the_image('cheerup-slider-fashion', [
							'width'  => Bunyad::options()->layout_width,
							'height' => 0,
							'bg_image'    => true,
							'ratio_class' => false
						]); 
					?>
					
					<div class="overlay-wrap cf">

						<div class="overlay">
						<?php 
							Bunyad::helpers()->post_meta(
								'slider-fashion',
								[
									'items_above' => ['cat'],
									'items_below' => ['date', 'comments'],
									'title_class' => 'post-title',
									'divider'     => false,
									'align'       => 'center'
								]
							);
						?>
						</div>
						
					</div>
					
				</div>
				
			<?php endwhile; ?>
		</div>

	</div>
	</section>
	
	<?php wp_reset_postdata(); ?>