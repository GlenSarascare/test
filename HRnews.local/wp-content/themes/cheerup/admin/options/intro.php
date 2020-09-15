<?php
/**
 * Intro options and info.
 */

$info = <<<EOF
	
	<p>To get up and running with the theme, start with <a href="https://cheerup.theme-sphere.com/documentation/" target="_blank">theme documentation</a>.</p>
	
	<p>Resources:</p>
	<ul>
		<li>- <a href="https://cheerup.theme-sphere.com/documentation/" target="_blank">Documentation</a></li>
		<li>- <a href="https://theme-sphere.com" target="_blank">Theme Support</a></li>
		<li>- <a href="https://theme-sphere.com/feedback/" target="_blank">Suggestions & Feedback?</a> (We want to know if your experience has been pleasant)</li>
	</ul>
EOF;

$options['intro'] = [
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
			]
		]
	]
];