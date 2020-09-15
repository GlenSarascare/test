<?php
/**
 * Post Format icon
 */

if (!Bunyad::options()->post_format_icons) {
	return;
}

?>

<?php if (get_post_format() == 'video'): ?>

	<span class="format-icon format-video">
		<i class="icon tsi tsi-play"></i>
	</span>

<?php elseif (get_post_format() == 'gallery'): ?>

	<span class="format-icon format-gallery">
		<i class="icon tsi tsi-clone"></i>
	</span>

<?php endif; ?>