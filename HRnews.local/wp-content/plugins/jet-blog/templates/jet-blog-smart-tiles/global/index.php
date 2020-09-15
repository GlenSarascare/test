<?php
/**
 * Smart tiles main template
 */

global $post;

$settings = $this->get_settings();
$excerpt  = '';

if ( 'yes' === $settings['excerpt_on_hover'] ) {
	$excerpt = ' jet-hide-excerpt';
}

$dir = is_rtl() ? 'rtl' : 'ltr';
?>
<div class="<?php $this->_tiles_wrap_classes(); ?>" <?php $this->_slider_atts(); ?> dir="<?php echo $dir; ?>"><?php

	foreach ( $this->_get_query() as $post ) {

		setup_postdata( $post );

		$this->_maybe_open_slide_wrapper( $settings );
		include $this->_get_global_template( 'post' );
		$this->_maybe_close_slide_wrapper( $settings );

	}

	$this->_reset_data();
?></div>