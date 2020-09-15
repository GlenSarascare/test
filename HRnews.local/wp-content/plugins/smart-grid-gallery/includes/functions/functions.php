<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Detecting youtube or video link
 *
 * @param $url
 *
 * @return string
 */
function origincode_gallery_video_youtube_or_vimeo( $url ) {
	if ( strpos( $url, 'youtube' ) !== false || strpos( $url, 'youtu' ) !== false ) {
		if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match ) ) {
			return 'youtube';
		}
	} elseif ( strpos( $url, 'vimeo' ) !== false ) {
		$explode = explode( "/", $url );
		$end     = end( $explode );
		if ( strlen( $end ) == 8 || strlen( $end ) == 9 ) {
			return 'vimeo';
		}
	}

	return 'image';
}

/**
 * Returns Youtube or Vimeo URL ID
 *
 * @param $url
 *
 * @return array
 */
function origincode_gallery_video_get_video_id_from_url( $url ) {
	if ( strpos( $url, 'youtube' ) !== false || strpos( $url, 'youtu' ) !== false ) {
		if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match ) ) {
			return array( $match[1], 'youtube' );
		}
	} else {
		$vimeoid = explode( "/", $url );
		$vimeoid = end( $vimeoid );

		return array( $vimeoid, 'vimeo' );
	}
}
