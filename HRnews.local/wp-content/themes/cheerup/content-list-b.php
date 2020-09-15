<?php
/**
 * Content Template is used for every post format and used on single posts
 * 
 * It is also used on archives called via loop.php
 */

$props = isset($props) ? $props : [];

Bunyad::core()->partial('content-list', array_merge(
	[
		'image'   => 'cheerup-list-b',
		'style'   => 'b',
		'show_read_more' => true,
		'show_social'    => false,
	],
	$props
));
