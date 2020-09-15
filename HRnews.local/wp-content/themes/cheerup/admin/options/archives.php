<?php
/**
 * Categories & Archives Options
 */

$fields = [
			
	[
		'name'    => 'archive_sidebar',
		'label'   => esc_html_x('Listings Sidebar', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => esc_html_x('Applies to all type of archives except home.', 'Admin', 'cheerup'),
		'type'    => 'radio',
		'options' => [
			''      => esc_html_x('Default', 'Admin', 'cheerup'),
			'none'  => esc_html_x('No Sidebar', 'Admin', 'cheerup'),
			'right' => esc_html_x('Right Sidebar', 'Admin', 'cheerup') 
		],
	],

	[
		'name'    => 'category_loop',
		'label'   => esc_html_x('Category Listing Style', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''                      => esc_html_x('Classic Large Posts', 'Admin', 'cheerup'),
			'loop-1st-large'        => esc_html_x('One Large Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-large-list'   => esc_html_x('One Large Post + List', 'Admin', 'cheerup'),
			'loop-1st-overlay'      => esc_html_x('One Overlay Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-overlay-list' => esc_html_x('One Overlay Post + List', 'Admin', 'cheerup'),
				
			'loop-1-2'      => esc_html_x('Mixed: Large Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-list' => esc_html_x('Mixed: Large Post + 2 List ', 'Admin', 'cheerup'),

			'loop-1-2-overlay'      => esc_html_x('Mixed: Overlay Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-overlay-list' => esc_html_x('Mixed: Overlay Post + 2 List ', 'Admin', 'cheerup'),
				
			'loop-list'   => esc_html_x('List Posts', 'Admin', 'cheerup'),
			'loop-grid'   => esc_html_x('Grid Posts', 'Admin', 'cheerup'),
			'loop-grid-3' => esc_html_x('Grid Posts (3 Columns)', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'    => 'archive_loop',
		'label'   => esc_html_x('Archive Listing Style', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''                      => esc_html_x('Classic Large Posts', 'Admin', 'cheerup'),
			'loop-1st-large'        => esc_html_x('One Large Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-large-list'   => esc_html_x('One Large Post + List', 'Admin', 'cheerup'),
			'loop-1st-overlay'      => esc_html_x('One Overlay Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-overlay-list' => esc_html_x('One Overlay Post + List', 'Admin', 'cheerup'),
				
			'loop-1-2'      => esc_html_x('Mixed: Large Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-list' => esc_html_x('Mixed: Large Post + 2 List ', 'Admin', 'cheerup'),

			'loop-1-2-overlay'      => esc_html_x('Mixed: Overlay Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-overlay-list' => esc_html_x('Mixed: Overlay Post + 2 List ', 'Admin', 'cheerup'),
				
			'loop-list'   => esc_html_x('List Posts', 'Admin', 'cheerup'),
			'loop-grid'   => esc_html_x('Grid Posts', 'Admin', 'cheerup'),
			'loop-grid-3' => esc_html_x('Grid Posts (3 Columns)', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'    => 'search_loop',
		'label'   => esc_html_x('Search Listing Style', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [

			''                      => esc_html_x('Classic Large Posts', 'Admin', 'cheerup'),
			'loop-1st-large'        => esc_html_x('One Large Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-large-list'   => esc_html_x('One Large Post + List', 'Admin', 'cheerup'),
			'loop-1st-overlay'      => esc_html_x('One Overlay Post + Grid', 'Admin', 'cheerup'),
			'loop-1st-overlay-list' => esc_html_x('One Overlay Post + List', 'Admin', 'cheerup'),
				
			'loop-1-2'      => esc_html_x('Mixed: Large Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-list' => esc_html_x('Mixed: Large Post + 2 List ', 'Admin', 'cheerup'),

			'loop-1-2-overlay'      => esc_html_x('Mixed: Overlay Post + 2 Grid ', 'Admin', 'cheerup'),
			'loop-1-2-overlay-list' => esc_html_x('Mixed: Overlay Post + 2 List ', 'Admin', 'cheerup'),
				
			'loop-list'   => esc_html_x('List Posts', 'Admin', 'cheerup'),
			'loop-grid'   => esc_html_x('Grid Posts', 'Admin', 'cheerup'),
			'loop-grid-3' => esc_html_x('Grid Posts (3 Columns)', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'  => 'archive_descriptions',
		'value' => 0,
		'label' => esc_html_x('Show Category Descriptions?', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'checkbox'
	],
	
];

$options['archives'] = [
	'sections' => [[
		'id'     => 'archives',
		'title'  => esc_html_x('Categories & Archives', 'Admin', 'cheerup'),
		'fields' => $fields
	]]
];