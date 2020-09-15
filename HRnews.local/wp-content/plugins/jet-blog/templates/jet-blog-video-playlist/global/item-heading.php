<?php
/**
 * Item heading template
 */

$show_heading = $settings['show_heading'];

if ( 'yes' !== $show_heading ) {
	return;
}
?>
<div class="jet-blog-playlist__heading">
	<?php $this->_render_icon( 'heading_icon', $settings, '<span class="jet-blog-playlist__heading-icon jet-blog-icon">%s</span>' ); ?>
	<div class="jet-blog-playlist__heading-content">
		<?php $this->_html( 'heading_text', '<div class="jet-blog-playlist__heading-title">%s</div>' ); ?>
		<?php $this->_video_counter( $settings, $list ); ?>
	</div>
</div>
