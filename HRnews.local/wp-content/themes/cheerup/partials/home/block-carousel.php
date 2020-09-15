<?php
/**
 * Partial Template: Home Carousel to be shown at top below slider
 */

if (Bunyad::amp()->active()) {
	return;
}

$args = array(
	'posts_per_page'      => Bunyad::options()->home_carousel_posts, 
	'ignore_sticky_posts' => 1
);

// Sort posts by liked
if (Bunyad::options()->home_carousel_type == 'liked') {
	$args = array_merge($args, array(
		 'meta_key' => '_sphere_user_likes_count', 
		 'orderby' => 'meta_value'
	));
} 

// Use a tag?
$tags = trim(Bunyad::options()->home_carousel_tag);
if ($tags) {
	$args['tag_slug__in'] = array_map('trim', explode(',', $tags));
}

// Setup the home carousel query
$query = new WP_Query(apply_filters('bunyad_block_query_args', $args, 'carousel'));

if (!$query->have_posts()) {
	return;
}

// Default props
$props = isset($props) ? $props : [];
$props = array_replace([
	'title_style'      => Bunyad::options()->home_carousel_title_style,
	'meta_global'      => Bunyad::options()->post_meta_h_carousel_global,
	'meta_items_above' => Bunyad::options()->post_meta_h_carousel_above,
	'meta_items_below' => Bunyad::options()->post_meta_h_carousel_below,
], $props);

/**
 * Custom ratio - when a custom ratio is available, most of the images will fallback
 * to uncropped large or cheerup-full.
 */
$media_ratio   = Bunyad::helpers()->get_ratio('home_carousel_ratio');
$image_options = [
	'ratio'   => $media_ratio,
	'classes' => 'post-link'
];

$image = 'cheerup-carousel';

/**
 * Post Meta
 */
$meta_args = [
	'title_class' => 'post-title',
	'align'       => 'center'
];

// Override items if not using global meta.
if (!$props['meta_global']) {
	$meta_args += Bunyad::helpers()->pick_deaffixed($props, 'meta_');
}

?>

<?php if (Bunyad::options()->home_carousel_style == 'style-b'): ?>

	<section class="block posts-carousel-b">

		<div class="the-carousel">

			<h3 class="block-head block-heading"><span class="title"><?php echo esc_html(Bunyad::options()->home_carousel_title); ?></span></h3>
		
			<div class="posts" data-slides="3">
			
			<?php while ($query->have_posts()): $query->the_post(); ?>
			
				<article class="post">

					<?php
						Bunyad::media()->the_image('cheerup-carousel-b', $image_options);
					?>
					
					<?php 
						Bunyad::helpers()->post_meta('posts-carousel-b', $meta_args);
					?>
					
				</article>
			
			<?php endwhile; wp_reset_postdata(); ?>
			
			</div>
			
			<div class="navigate"></div>
		</div>
	</section>

<?php else: ?>

	<?php

	$class = array('block', 'posts-carousel', 'posts-carousel-a');

	if (Bunyad::options()->home_carousel_sep) {
		$class[] = 'has-sep';
	}

	?>

	<section <?php Bunyad::markup()->attribs('posts-carousel-wrap', array('class' => $class)); ?>>

		<?php if (Bunyad::options()->home_carousel_title): ?>
			
			<div class="block-head <?php echo esc_attr($props['title_style']); ?>">
				<h4 class="title"><?php echo esc_html(Bunyad::options()->home_carousel_title); ?></h4>
			</div>

		<?php endif; ?>

		<div class="the-carousel">
		
			<div class="posts">
			
			<?php while ($query->have_posts()): $query->the_post(); ?>
			
				<article class="post">
				
					<?php
						Bunyad::media()->the_image($image, $image_options);
					?>
					
					<?php 
						Bunyad::helpers()->post_meta('posts-carousel', $meta_args);
					?>
					
				</article>
			
			<?php endwhile; wp_reset_postdata(); ?>
			
			</div>
			
			<div class="navigate"></div>
		</div>
	</section>

<?php endif; ?>