<?php
/**
 * Partial: Grid Slider for the featured area
 */

$orig_props = $props;
$props = array_replace([

	'grid_width'       => 'container',
	'grid_type'        => 'grid-c',
	'has_ratio'        => true,
	'has_slider'       => true,
	'overlay_style'    => Bunyad::options()->feat_grid_overlay,

	// Show meta on hover.
	'meta_on_hover'    => Bunyad::options()->feat_grid_meta_on_hover,
	'meta_below'       => Bunyad::options()->feat_grid_meta_below,
	'content_position' => Bunyad::options()->feat_grid_overlay_pos,
	// 'content_position' => 'center',
	'cat_style'        => Bunyad::options()->feat_grid_cat_style,
	'hover_effect'     => Bunyad::options()->feat_grid_hover_effect

	// Internal: per_slide, slide_scroll, slide_scroll_md

], $props);

$slide_attrs = [
	'class' => ['slides'],
	'data-parallax' => Bunyad::options()->slider_parallax,
];

// No posts to show.
if (!$query->post_count) {
	return;
}

/**
 * Configuration for different type of common items.
 */

// Default configs.
$configs = [
	'meta_props' => [
		'items_above' => ['cat'],
		'items_below' => $props['meta_below'],
		'title_class' => 'post-title',
		'title_tag'   => 'h3',
		'add_class'   => 'meta-contrast',
		'cat_style'   => isset($props['cat_style']) ? $props['cat_style'] : null,
		'text_labels' => [],
		
		// Auto-alignment - no post-meta alignment classes.
		'align'       => ''
	],
	'image_data' => [
		// Size for small and medium is half width of viewport in mobiles.
		// Main/large overrides it.
		'attr' => ['sizes' => '(max-width: 768px) 50vw, %1$dpx'],
		'bg_image'    => true,
		'ratio_class' => false
	],

	// Default to small.
	'class' => 'item-small',
	'image' => 'cheerup-feat-grid-sm',
];

// Uses defaults.
$item_small = [];

$item_main = [
	'class' => 'item-large item-main',
	'image' => 'cheerup-feat-grid-lg',
	'image_data' => array_replace($configs['image_data'], [
		// To filter out images in responsive srcset that are too small of a height.
		// Most of the time, a minimum height of 500 will be desired.
		'srcset_filter' =>  [
			'min_height' => 500,
		],

		// Large / main is fine with default WP sizes.
		'attr' => []
	])
];

$item_medium = [
	'class' => 'item-medium',
	'image' => 'cheerup-feat-grid-lg',
	'image_data' => array_replace($configs['image_data'], [
		'srcset_filter' =>  [
			'min_height' => 500,
		]
	])
];

// Configuration for items at specific positions.
$item_configs = [
	1 => $item_main,
];

// Type of featured grid.
$equal_items = false;
$max_slides  = 25;

switch ($props['grid_type']) {

	case 'grid-a':
		$props['per_slide']       = 5;
		$props['slide_scroll']    = 1;
		$props['slide_scroll_md'] = 1;

		// Without slide, 1 slide is max.
		$max_slides = !$props['has_slider'] ? 1 : $max_slides;
		break;

	case 'grid-b':
		$props['per_slide']       = 3;
		$props['slide_scroll']    = 1;
		$props['slide_scroll_md'] = 1;

		// Without slide, 1 slide is max.
		$max_slides = !$props['has_slider'] ? 1 : $max_slides;

		// Medium class (title etc.) but small image.
		$item_medium_sm = array_replace($item_small, ['class' => 'item-medium']);
		$item_configs = [
			1 => $item_main,
			2 => $item_medium_sm,
			3 => $item_medium_sm,
		];

		// Default to no hover effects unless specified.
		if (!isset($orig_props['hover_effect'])) {
			$props['hover_effect'] = null;
		}

		break;

	case 'grid-c':
		$props['per_slide']       = 3;
		$props['slide_scroll']    = 1;
		$props['slide_scroll_md'] = 1;
		
		// Without slide, 1 slide is max.
		$max_slides = !$props['has_slider'] ? 1 : $max_slides;

		$item_configs = [
			1 => $item_main,
			2 => $item_medium,
			3 => $item_medium,
		];

		break;

	case 'grid-d':
		$props['per_slide']       = 1;
		$props['slide_scroll']    = 2;
		$props['slide_scroll_md'] = 2;
		$equal_items = true;

		$item_configs = array_fill(1, $query->post_count, array_replace(
			$item_main, ['class' => 'item-main item-medium']
		));
		
		break;

	case 'grid-e':
		$props['per_slide']       = 1;
		$props['slide_scroll']    = 3;
		$props['slide_scroll_md'] = 2;
		$equal_items = true;

		$_conf = array_replace(
			$item_main, ['class' => 'item-main item-medium']
		);

		$_conf['width'] = ['wrap' => 400, 'full' => 700];
		$item_configs = array_fill(1, $query->post_count, $_conf);
		
		break;

	case 'grid-f':
		$props['per_slide']       = 1;
		$props['slide_scroll']    = 4;
		$props['slide_scroll_md'] = 2;
		$equal_items = true;

		$_conf = array_replace(
			$item_main, ['class' => 'item-main item-medium']
		);

		$_conf['width'] = ['wrap' => 400, 'full' => 550];
		$item_configs = array_fill(1, $query->post_count, $_conf);
		
		break;

	case 'grid-g':
		$props['per_slide']       = 1;
		$props['slide_scroll']    = 5;
		$props['slide_scroll_md'] = 2;
		$equal_items = true;

		$_conf = array_replace(
			$item_main, ['class' => 'item-main item-small']
		);

		// 550 because 450 or less may get a height too less.
		$_conf['width'] = ['wrap' => 350, 'full' => 500];
		$item_configs = array_fill(1, $query->post_count, $_conf);
		
		break;

	default:
		// Unknown grid type.
		return;
}

/**
 * Slide configs, it enabled.
 */
$slides = 1;

if ($query->post_count) {
	$slides = ceil($query->post_count / max(1, intval($props['per_slide'])));
	$slides = min($slides, $max_slides);
}

// When number of slides are greater than 1, activate the slider.
if ($props['has_slider']) {
	$slide_attrs = array_replace($slide_attrs, [
		'data-slider'    => 'feat-grid',
		'data-autoplay'  => Bunyad::options()->slider_autoplay,
		'data-speed'     => Bunyad::options()->slider_delay,

		// Can't have fade animation for carousel-esque sliders.
		// 'data-animation' => Bunyad::options()->slider_animation,
		'data-scroll-num' => $props['slide_scroll']
	]);

	if (isset($props['slide_scroll_md'])) {
		$slide_attrs['data-scroll-num-md'] = $props['slide_scroll_md'];
	}
}

/**
 * Setup classes for grid container.
 */
$feat_class = 'feat-' . $props['grid_type'];
$grid_classes = [
	'feat-grid', 
	$feat_class,
];

// Static or slider.
$slide_type     = $props['has_slider'] ? 'slider' : 'static';
$grid_classes[] = $slide_type;

if ($slide_type == 'slider') {
	$grid_classes = array_merge($grid_classes, [
		'common-slider',
		'arrow-hover',
	]);
}

if ($props['grid_width'] == 'viewport') {
	$grid_classes[] = 'feat-grid-full';
	$grid_classes[] = $feat_class . '-full';
}
else {
	// Add wrapper to slides wrapper if not viewport width.
	$slide_attrs['class'][] = 'wrap';
}

if ($props['has_ratio']) {
	$grid_classes[] = 'feat-grid-ratio';
}

// A grid with items of equal dimensions.
if ($equal_items) {
	$grid_classes[] = 'feat-grid-equals';
}

?>
	
<section <?php Bunyad::markup()->attribs('feat-grid-wrap', ['class' => $grid_classes]); ?>>

	<div <?php Bunyad::markup()->attribs('slider-slides', $slide_attrs); ?>>
	
	<?php 
		// Loop through to display all the required slides.
		$count = 1;
		$i = 0;

		while ($count <= $slides): 
			$count++; 
	?>

		<?php if (!$equal_items): // Items wrap is only added to non-equal item grids. ?>
			<div class="items-wrap slide-wrap">
		<?php endif; ?>
			
			<?php 
			while ($query->have_posts()): 
				$query->the_post(); 
				$i++;
				
				$class      = $configs['class'];
				$image      = $configs['image'];
				$image_data = $configs['image_data'];
				$meta_props = $configs['meta_props'];
				$width      = null;
				
				// If configs exist for the item at this specific position, overwrite.
				if (isset($item_configs[$i])) {
					$data = (array) $item_configs[$i];

					// Add defaults and override meta props if needed.
					if (isset($data['meta_props'])) {
						$meta_props = array_replace($meta_props, $data['meta_props']);

						// Unset or extract will override.
						unset($data['meta_props']);
					}

					extract($data);
				}

				// Viewport width gets different image name.
				if ($props['grid_width'] == 'viewport') {
					$image .= '-vw';			
				}

				// Width is manually specified to ensure right responsive width is set.
				if (!empty($width)) {
					$image_data['width'] = $props['grid_width'] !== 'viewport' 
						? $width['wrap']
						: $width['full'];
				}

				// Item classes.
				$item_class = ['item', $class, 'item-' . $i];
				$pos_map = [
					'top'        => 'pos-top',
					'top-center' => 'pos-center pos-top',
					'bot-center' => 'pos-center pos-bot',
					'center'     => 'pos-center pos-v-center',
					'bottom'     => 'pos-bot',
				];

				if (array_key_exists($props['content_position'], $pos_map)) {
					$item_class[] = $pos_map[ $props['content_position'] ];
				}

				// Classes for overlay wrapper.
				$overlay_class = ['grid-overlay', 'grid-overlay-' . $props['overlay_style']];
				if ($props['meta_below'] && $props['meta_on_hover']) {
					$overlay_class[] = 'meta-hide';
				}

				if ($props['hover_effect']) {
					$overlay_class[] = $props['hover_effect'];
				}

			?>
				
				<div class="<?php echo esc_attr(join(' ', $item_class)); ?>">

					<div class="<?php echo esc_attr(join(' ', $overlay_class)); ?>">
						<div class="post-thumb">
							<?php
								Bunyad::media()->the_image($image, $image_data);
							?>
						</div>
						
						<div class="content">

							<?php 
								Bunyad::helpers()->post_meta(
									'feat-grid',
									$meta_props
								);
							?>
								
						</div>
						
					</div>
				</div>
							
			<?php 
				// Items per slide.
				if (($i % $props['per_slide']) === 0) {

					// Reset counters for non-equals.
					if (!$equal_items) {
						$i = 0;
					}

					break;
				}

			endwhile;
			?>
				
		<?php if (!$equal_items): ?>
			</div>
		<?php endif; ?>

	<?php endwhile; ?>
	</div>

</section>

<?php wp_reset_postdata(); ?>