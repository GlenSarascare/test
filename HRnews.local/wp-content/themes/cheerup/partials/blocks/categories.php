<?php
/**
 * Categories listing block's template file.
 */
$props = isset($props) ? (array) $props : [];
$props = array_replace([
	'parent'        => '',
	'terms'         => '',
	'terms_exclude' => '',
	'taxonomy'      => 'category',
	'style'         => '',
	'style_round'   => '',
	'style_border'  => '',
	'columns'       => 3,
	'counters'      => false,
	'limit'         => 10,
	'ratio'         => '',
], $props);

// Slugs used instead of ids?
if ($props['terms']) {
	$terms = explode(',', $terms);
				
	if (count($terms) && !is_numeric($terms[0])) {
		$results = get_terms([
			'slug'         => $terms,
			'hide_empty'   => false, 
			'hierarchical' => false,
			'taxonomy'     => $props['taxonomy'],
		]);

		$terms = wp_list_pluck($results, 'term_id');
	}

	$props['terms'] = $terms;
}

$terms = get_terms([
	'include'      => $props['terms'],
	'taxonomy'     => $props['taxonomy'],
	'number'       => $props['limit'] ? $props['limit'] : null,
	'hide_empty'   => false,
	'hierarchical' => false,
	'child_of'     => $props['parent'] ? intval($props['parent']) : null,
]);

if (!$terms) {
	return;
}

// Default to style a.
if (!$props['style']) {
	$props['style'] = 'a';
}

$classes = [
	'block categories-block',
	'grid-' . $props['columns'],
	'sm:grid-' . min(2, $props['columns']),
	'md:grid-' . min(4, $props['columns']),
	'categories-block-c' . $props['columns'],
];

$classes_box = [
	'category',
];

/**
 * Image box styles.
 */
if ($props['style'] !== 'list') {
	$classes_box[] = 'image-box image-box-' . $props['style'];

	$ratio_class = !empty($props['ratio']) ? 'ratio-' . $props['ratio'] : 'ratio-1-1';

	// For rounded style, only square ratio is supported.
	if (!empty($props['style_round'])) {
		$ratio_class   = 'ratio-1-1';
		$classes_box[] = 'image-box-round';
	}
	
	// Add a border.
	if (!empty($props['style_border'])) {
		$classes_box[] = 'image-box-border';
	}
}
else {
	// List style.

	$classes[] = 'cat-block-list';
}



?>

<div <?php Bunyad::markup()->attribs('categories-block', ['class' => $classes]); ?>>
	<?php 
		foreach ($terms as $term): 
			$term_image = get_term_meta($term->term_id, '_bunyad_image', true);
			$link       = get_term_link($term);
	?>

		<div <?php Bunyad::markup()->attribs('categories-block-box', ['class' => $classes_box]); ?>>

		<?php if ($props['style'] !== 'list'): ?>
			<a href="<?php echo esc_url($link); ?>" class="media media-ratio <?php echo esc_attr($ratio_class); ?>" title="<?php echo esc_attr($term->name); ?>">
				<?php if ($term_image): ?>
					<?php 
						echo wp_get_attachment_image($term_image, 'large');
					?>
				<?php endif; ?>
			</a>
		<?php endif; ?>

			<div class="content">
				<a href="<?php echo esc_url($link); ?>" class="label">
					<?php echo esc_html($term->name); ?>
					<?php if ($props['counters']): ?>
						<span class="post-count">
							<?php echo esc_html($term->count); ?>
						</span>
					<?php endif; ?>
				</a>
			</div>
		</div>

	<?php endforeach; ?>
</div>