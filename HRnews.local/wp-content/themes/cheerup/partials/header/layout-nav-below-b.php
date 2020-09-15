<?php
/**
 * Header Layout: Variation of Navigation Below Logo with Dark Top Bar
 */

$classes = 'nav-below nav-below-b';
$classes .= ' has-search-' . Bunyad::options()->search_style;

Bunyad::core()->partial('partials/header/layout-nav-below', array(
	'top_bar' => 'top-bar-b',
	'classes' => $classes,
));