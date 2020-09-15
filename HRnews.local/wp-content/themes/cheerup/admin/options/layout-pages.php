<?php
/**
 * Global Page Layout options
 */

$fields = [
	[
		'name'  => '_n_layout_pages',
		'type'  => 'message',
		'label' => '',
		'text'  => 'Design and some other settings of pages are shared with single posts. 
			Check <a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-single-design">Single Post Design</a> section.',
		'style' => 'message-info',
	],
	[
		'name'    => 'page_sidebar',
		'label'   => esc_html_x('Single Page Sidebar', 'Admin', 'cheerup'),
		'desc'    => esc_html_x('Default is from Main Layout settings. This setting can also be changed per post or page.', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'select',
		'options' => [
			''      => esc_html_x('Default / Global', 'Admin', 'cheerup'),
			'none'  => esc_html_x('No Sidebar', 'Admin', 'cheerup'),
			'right' => esc_html_x('Right Sidebar', 'Admin', 'cheerup') 
		],
	],
	[
		'name'       => 'css_page_title_typo',
		'label'      => esc_html_x('Page Titles Typography', 'Admin', 'cheerup'),
		'desc'       => '',
		'value'      => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.the-page .the-page-title',
	],

	/**
	 * Group: 404 Page
	 */
	[
		'name'  => '_g_page_404',
		'label' => esc_html_x('404 Page', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
		[
			'name'    => 'page_404_title',
			'label'   => esc_html_x('404 Title', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => esc_html__('Page Not Found!', 'cheerup'),
			'type'    => 'text',
			'group'   => '_g_page_404'
		],
		[
			'name'    => 'page_404_text',
			'label'   => esc_html_x('404 Title', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => esc_html__("We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it and we'll try to fix it. In the meantime, try one of these options:", 'cheerup'),
			'type'    => 'textarea',
			'group'   => '_g_page_404'
		],
	
];

$options['layout-pages'] = [
	'sections' => [[
		'id'     => 'layout-pages',
		'title'  => esc_html_x('Pages Layouts', 'Admin', 'cheerup'),
		'desc'   => '',
		'fields' => $fields
	]]
];

return $options;