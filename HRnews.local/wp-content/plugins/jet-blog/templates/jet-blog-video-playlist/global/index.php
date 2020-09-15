<?php
/**
 * Main video playlist template
 */

$settings     = $this->get_settings_for_display();
$source       = isset( $settings['source'] ) ? $settings['source'] : 'custom';
$active_class = ' jet-blog-active';
$caching      = true;

if ( ! empty( $settings['disable_caching'] ) && 'yes' === $settings['disable_caching'] ) {
	$caching = false;
}

if ( 'custom' === $source ) {
	$list = $settings['videos_list'];
} else {
	$list = jet_blog_video_data()->get_video_list_from_source( $settings['source_url'], $settings['max_results'], $caching );
}

$hide = $this->_get_hide_classes( $settings );

?>
<div class="<?php $this->_container_classes( $settings ); ?>">
	<div class="jet-blog-playlist__canvas"><div class="jet-blog-playlist__canvas-overlay"></div></div>
	<div class="jet-blog-playlist__items">
		<?php include $this->_get_global_template( 'item-heading' ); ?>
		<div class="jet-blog-playlist__items-list">
			<div class="jet-blog-playlist__items-list-content"><?php
			foreach ( $list as $index => $item ) {

				$video_data = jet_blog_video_data()->get( $item['url'], $caching );

				printf(
					'<div class="jet-blog-playlist__item%2$s" %1$s>',
					$this->_get_video_data_atts( $video_data, $item, $settings, $index ),
					$active_class
				);
				include $this->_get_global_template( 'item-index' );
				include $this->_get_global_template( 'item-thumb' );
				echo '<div class="jet-blog-playlist__item-content">';
					include $this->_get_global_template( 'item-title' );
					include $this->_get_global_template( 'item-duration' );
				echo '</div>';
				echo '</div>';

				$active_class = '';
			}
			?></div>
		</div>
	</div>
</div>