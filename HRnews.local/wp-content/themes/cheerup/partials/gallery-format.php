<?php
/**
 * Partial Template - Display the gallery slider for gallery post formats
 */

$image_ids = Bunyad::posts()->get_first_gallery_ids();

if (!$image_ids) {
	return;
}

$images = get_posts(array(
	'post_type' => 'attachment',
	'post_status' => 'inherit',
	'post__in' => $image_ids,
	'orderby' => 'post__in',
	'posts_per_page' => -1
));


/**
 * Image size - setting $image before overrides it
 */
$image_size = 'cheerup-main';

if ((!in_the_loop() && Bunyad::posts()->meta('layout_style') == 'full') OR Bunyad::core()->get_sidebar() == 'none') {
	$image_size = 'cheerup-main-full';
}

// Set if not already set
extract(array(
	'image'   => $image_size,
	'context' => '',
), EXTR_SKIP);

?>

<div class="gallery-slider common-slider">
	<?php foreach ($images as $attachment): ?>
		<div>
			<?php
				
				$caption = '';
				if ($attachment->post_excerpt) {
					$caption = '<div class="caption">' . esc_html($attachment->post_excerpt) . '</div>';
				}

				$wrapper    = '<a href="%1$s" class="%2$s">%3$s'. $caption . '</a>';
				$image_data = [];

				// bg_image rendering doesn't work well with creative gallery.
				if ($context === 'creative') {
					$image_data['bg_image'] = false;
				}

				$image_data = Bunyad::media()->featured_image($image, $image_data, $attachment->ID);
				
				$classes = [
					$image_data['ratio_class']
				];

				// Creative large requires no media-ratio wrapper.
				if ($context !== 'creative') {
					$classes[] = 'media-ratio';
				}

				printf(
					$wrapper,
					wp_get_attachment_url($attachment->ID),
					join(' ', $classes),
					$image_data['output']
				);
			?>
		</div>
	<?php endforeach; // no reset query needed; get_posts() uses a new instance ?>
</div>