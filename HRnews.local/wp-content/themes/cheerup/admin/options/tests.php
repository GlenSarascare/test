<?php

add_filter('-------bunyad_theme_options', function($options) {

	$to_add = [
		'name'       => 'css_foobar22',
		'label'      => 'Heading Font',
		//'desc'       => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
		'desc' => sprintf(
			'This applies skin styles like colors, fonts etc. If you want to import full demo settings or sample content, see %1$sImport Demos%2$s',
			'<a href="#" class="focus-link is-with-nav" data-section="bunyad-import-demos" data-nav-text="Theme Intro & Help">', '</a>'
		),
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		// 'controls_options' => ['size' => ['value' => 10]],
		// 'controls' => ['size', 'family'],
		'text'       => '',
		// 'css'        => '.foo-bar',
		'css' => '.main-head.compact .dark .posts-ticker .heading'
	];

	foreach (range(0, 100) as $key) {
		$add = $to_add;
		$add['name'] = 'css_foobar_' . $key;
		$options[0]['sections'][0]['fields'][] = $add;
	}

	// foreach (range(0, 900) as $key) {
	// 	$add = $to_add;
	// 	$add['name'] = 'css_foobar___' . $key;
	// 	$add['type'] = 'text';
	// 	$options[0]['sections'][0]['fields'][] = $add;
	// }

	return $options;
});


$options['tests'] = [
	'sections' => [
		[
			'id'     => 'welcome',
			'title'  => esc_html_x('Theme Intro & Help', 'Admin', 'cheerup'),
			'fields' => [
		
				[
					'name' => 'welcome_info',
					'type' => 'content',
					'text' => $info
				],

				[
					'name'  => '_n_the_notice',
					'type'  => 'message',
					'label' => 'Beware the Slider',
					'text'  => 'Please note that the slider here is just a sample of an elite representation of the real thing.',
					'style' => 'message-info',
				],

				// Test
				[
					'name'       => 'css_foobar233',
					'label'      => 'Heading Font',
					//'desc'       => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'desc' => sprintf(
						'This applies skin styles like colors, fonts etc. If you want to import full demo settings or sample content, see %1$sImport Demos%2$s',
						'<a href="#" class="focus-link is-with-nav" data-section="bunyad-import-demos" data-nav-text="Theme Intro & Help">', '</a>'
					),
					'type'       => 'group',
					'group_type' => 'typography',
					'style'      => 'edit',
					// 'controls_options' => ['size' => ['value' => 10]],
					// 'controls' => ['size', 'family'],
					'text'       => '',
					// 'css'        => '.foo-bar',
					'css' => '.main-head.compact .dark .posts-ticker .heading'
				],

				/**
				 * Group: Test
				 */
				[
					'name'    => '_g_testing_group',
					'label'   => esc_html_x('Group test', 'Admin', 'cheerup'),
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'group',
					'style'   => 'collapsible',
				],

				[
					'name'    => 'testing2_group',
					'label'   => esc_html_x('Group test 2', 'Admin', 'cheerup'),
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'group',
					'style'   => 'collapsible',
				],

				// Test
				[
					'name'    => 'toggle_parent',
					'label'   => esc_html_x('Toggle Parent', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing2_group',
					'style'   => 'inline-sm',
				],

				// Test
				[
					'name'    => 'toggle_child_context',
					'label'   => esc_html_x('Toggle Child + Context', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'text',
					'group'   => 'testing2_group',
					'style'   => 'inline-sm',
					'context' => ['control' => ['key' => 'toggle_parent', 'value' => 1]],
					'css'     => [
						'.foo2' => [
							'all'   => ['props' => ['font-size' => '%s']],
							'large' => ['props' => ['font-size' => '%s'], 'value_key' => 'main'],
						],
					],
				],

				// Test
				[
					'name'    => 'css_testing56',
					'label'   => esc_html_x('Toggle disabled', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'text',
					'group'   => 'testing2_group',
					'style'   => 'inline-sm',
					'context' => ['control' => ['key' => 'toggle_parent', 'value' => '']],
					'css'     => [
						'.foo3' => [
							'all'   => ['props' => ['font-size' => '%s']],
							'large' => ['props' => ['font-size' => '%s'], 'value_key' => 'main'],
						],
					],
				],

				// Test
				[
					'name'    => 'testing6',
					'label'   => esc_html_x('Enable Something Else', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing2_group',
					'devices' => true,
				],

				// Test
				[
					'name'       => 'css_testing_typo_nested',
					'label'      => 'Nested Font',
					//'desc'       => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'       => 'group',
					'group_type' => 'typography',
					'style'      => 'edit',
					// 'controls_options' => ['size' => ['value' => 10]],
					// 'controls' => ['size', 'family'],
					'text'       => '',
					// 'css'        => '.foo-bar',
					'css'     => '.main-head.compact .dark .posts-ticker .heading',
					'group'   => 'testing2_group',
				],					

				// Test
				[
					'name'    => 'testing_inlinesm',
					'label'   => esc_html_x('Inline-SM', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing2_group',
					'style'   => 'inline-sm',
					'devices' => true,
				],

				// Test
				[
					'name'    => 'testing_inlinesm2',
					'label'   => esc_html_x('Inline-SM 2', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing2_group',
					'style'   => 'inline-sm',
					'devices' => true,
				],
				// Test
				[
					'name'    => 'testing_inline',
					'label'   => esc_html_x('Inline', 'Admin', 'cheerup'),
					'value'   => '',
					// 'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'select',
					'group'   => 'testing2_group',
					'style'   => 'inline',
					'options' => [
						'foo' => 'Foo'
					],
				],

				// Test
				[
					'name'    => 'testing_inline2',
					'label'   => esc_html_x('Inline 2', 'Admin', 'cheerup'),
					'value'   => '',
					// 'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'select',
					'group'   => 'testing2_group',
					'style'   => 'inline',
					'options' => [
						'foo' => 'Foo'
					],
					'devices' => true
				],



				// Test
				[
					'name'      => 'testing3_group',
					'label'     => esc_html_x('Slider Posts Tag', 'Admin', 'cheerup'),
					'desc'      => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'      => 'group',
					'style'     => 'collapsible',
					'collapsed' => false,
					'group'     => 'testing2_group'
				],


				// Test
				[
					'name'    => 'testing7',
					'label'   => esc_html_x('Enable Something Here 1', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing3_group',
					'style'   => 'inline-sm',
					'devices' => true,
				],					

				// Test
				[
					'name'    => 'testing8',
					'label'   => esc_html_x('Enable Something Else 1', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'toggle',
					'group'   => 'testing3_group',
					'devices' => true,
				],



				// Test
				[
					'name'    => 'css_testing4',
					'label'   => esc_html_x('Slider Posts Tag', 'Admin', 'cheerup'),
					'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					// 'value'   => array('main' => 'featured', 'small' => 's', 'medium' => ''),
					'value'   => '',
					'type'    => 'slider',
					// 'group'   => 'testing_group',
					// 'style'   => 'inline-sm',
					'devices'     => true,
					'input_attrs' => ['min' => 20, 'max' => 150, 'step' => 1],
					'css'         => [
						'.foo2' => [
							'all'                                              => ['props' => ['font-size' => '%s']],
							'large'                                            => ['props' => ['font-size' => 'calc(%s * .9)'], 'value_key' => 'main'],
							'@media (min-width: 200px) and (max-width: 500px)' => ['props' => ['font-size' => '%s'], 'value_key' => 'main'],
						],
					],
					'group'   => 'testing2_group',
				],

				// Test
				[
					'name'    => 'css_testing10',
					'label'   => esc_html_x('Padding', 'Admin', 'cheerup'),
					'value'   => '',
					//'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
					'type'    => 'dimensions',
					// 'group'   => 'testing_group',
					// 'style'   => 'inline-sm',
					'devices'  => true,
					'css'      => [
						'.top-bar-content' => ['dimensions' => 'padding']
					]
				],

				// // Test
				// array(
				// 	'name'       => 'css_gg2',
				// 	'label'      => 'Heading Font',
				// 	'desc'       => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
				// 	'type'       => 'group',
				// 	'group_type' => 'typography',
				// 	'style'      => 'edit',
				// 	// 'controls_options' => ['size' => ['value' => 10]],
				// 	// 'controls' => ['size', 'family'],
				// 	'text'       => '',
				// ),

			] // fields
			
		] // section			
	] // sections
];