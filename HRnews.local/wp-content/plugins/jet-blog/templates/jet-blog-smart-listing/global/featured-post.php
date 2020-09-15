<?php
/**
 * Feeatured post template
 */
global $post;

foreach ( $this->_get_query() as $post ) {

	setup_postdata( $post );

	$settings          = $this->_get_widget_settings();
	$layout            = $settings['featured_layout'];
	$context           = 'featured';
	$featured_meta_pos = isset( $settings['featured_meta_position'] ) ? $settings['featured_meta_position'] : 'after';

	?>
	<div class="<?php $this->_featured_post_classes(); ?>"<?php $this->_get_item_thumbnail_bg(); ?>>
	<?php

		$is_featured = true;

		$this->_post_terms( $is_featured );

		if ( 'simple' === $layout ) {
			$this->_featured_image( $context );
		} else {
			printf( '<a href="%s" class="jet-smart-listing__featured-box-link">', get_permalink() );
		}

		echo '<div class="jet-smart-listing__featured-content">';

			if ( 'before' === $featured_meta_pos ) {
				include $this->_get_global_template( 'post-meta' );
			}

			$this->_post_title( $context );

			if ( 'after' === $featured_meta_pos ) {
				include $this->_get_global_template( 'post-meta' );
			}

			$this->_post_excerpt( $context );

			if ( 'after-excerpt' === $featured_meta_pos ) {
				include $this->_get_global_template( 'post-meta' );
			}

			$this->_read_more( $context );
		echo '</div>';

		if ( 'simple' !== $layout ) {
			echo '</a>';
		}
	?>
	</div>
	<?php
}
