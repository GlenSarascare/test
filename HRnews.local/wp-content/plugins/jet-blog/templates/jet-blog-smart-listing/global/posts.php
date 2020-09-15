<?php
/**
 * Listing main template
 */
global $post;
$context  = 'simple';

$this->_maybe_adjust_query();

$query    = $this->_get_query();
$settings = $this->_get_widget_settings();
$meta_pos = isset( $settings['meta_position'] ) ? $settings['meta_position'] : 'after';

if ( empty( $query ) ) {
	wp_reset_postdata();
	return;
}

?>
<div class="jet-smart-listing__posts">
	<?php

		foreach ( $query as $post ) {
			setup_postdata( $post );
			$is_featured = false;
			?>
			<div class="jet-smart-listing__post-wrapper">
				<div class="<?php $this->_post_classes(); ?>">
					<?php $this->_post_terms( $is_featured ); ?>
					<?php $this->_featured_image( $context ); ?>
					<div class="jet-smart-listing__post-content"><?php

						if ( 'before' === $meta_pos ) {
							include $this->_get_global_template( 'post-meta' );
						}

						$this->_post_title( $context );

						if ( 'after' === $meta_pos ) {
							include $this->_get_global_template( 'post-meta' );
						}

						$this->_post_excerpt( $context );

						if ( 'after-excerpt' === $meta_pos ) {
							include $this->_get_global_template( 'post-meta' );
						}

						$this->_read_more( $context );
					?></div>
				</div>
			</div>
			<?php
		}

		wp_reset_postdata();
	?>
</div>
