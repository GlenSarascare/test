<?php
/**
 * Partial: Defaut Slider
 */

$props = array_replace([
	'slider_autoplay' => Bunyad::options()->slider_autoplay,
	'slider_delay'    => Bunyad::options()->slider_delay,
	'slider_parallax' => Bunyad::options()->slider_parallax
], $props);

// setup attribs
$attrs = array(
	'class'          => 'slides',
	'data-slider'    => 'main',
	'data-autoplay'  => $props['slider_autoplay'],
	'data-speed'     => $props['slider_delay'],
	//'data-animation' => Bunyad::options()->slider_animation,
	'data-parallax'  => $props['slider_parallax']
);


$extra_class = '';
$image       = 'cheerup-main';
$type        = empty($type) ? '' : $type;

// Stylish slider variant?
if ($type == 'stylish') {
	$extra_class = ' stylish-slider';
	$image = 'cheerup-slider-stylish';
}
else {
	$extra_class = ' classic-slider';
}

?>
	
	<section class="main-slider common-slider<?php echo esc_attr($extra_class); ?>">

		<div <?php Bunyad::markup()->attribs('slider-slides', $attrs); ?>>
		
			<?php while ($query->have_posts()): $query->the_post(); ?>
		
				<div class="item">

					<?php 
						Bunyad::media()->the_image($image, ['width' => '901']); 
					?>
					
					 <?php 
					 // Primary category
					 if (($cat_label = Bunyad::posts()->meta('cat_label'))) {
					 	$category = get_category($cat_label);
					 }
					 else {
					 	$category = current(get_the_category());
					 }
					 
					 ?>
					
					<div class="slider-overlay">
						<a href="<?php 
							echo esc_url(get_category_link($category)); ?>" class="category"><?php echo esc_html($category->name); 
						?></a>
						
						<h2 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="text excerpt"><?php echo Bunyad::posts()->excerpt(null, 5, array('add_more' => false)); ?></div>
						
						<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Read More', 'cheerup'); ?></a>	
					</div>
				</div>
				
			<?php endwhile; ?>
		</div>

	</section>
	
	<?php wp_reset_postdata(); ?>