<?php
/**
 * Posts navigation template
 */

$settings  = $this->get_settings();
$prev_text = $this->_prev_text();
$next_text = $this->_next_text();

if ( ! empty( $settings['prev_icon'] ) ) {
	$prev_text = jet_blog_tools()->get_carousel_arrow( $settings['prev_icon'], 'prev' ) . $prev_text;
}

if ( ! empty( $settings['next_icon'] ) ) {
	$next_text .= jet_blog_tools()->get_carousel_arrow( $settings['next_icon'], 'next' );
}

$args = array(
	'prev_text' => $prev_text,
	'next_text' => $next_text,
);

if ( is_single() ) {
	the_post_navigation( $args );
} else {
	the_posts_navigation( $args );
}
