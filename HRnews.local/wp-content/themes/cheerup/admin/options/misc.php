<?php
/**
 * Misc features options
 */

$social = [[
	'id'     => 'misc-social',
	'title'  => esc_html_x('Social Media Links', 'Admin', 'cheerup'),
	'desc'   => esc_html_x('Enter full URLs to your social media profiles. They will be used anywhere you use social profiles such as header, sidebar etc.', 'Admin', 'cheerup'),
	'fields' => [
		[
			'name'   => 'social_profiles[facebook]',
			'value'  => '',
			'label'  => esc_html_x('Facebook', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],

		[
			'name'   => 'social_profiles[twitter]',
			'value'  => '',
			'label'  => esc_html_x('Twitter', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[instagram]',
			'value'  => '',
			'label'  => esc_html_x('Instagram', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],	
		
		[
			'name'   => 'social_profiles[pinterest]',
			'value'  => '',
			'label'  => esc_html_x('Pinterest', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[bloglovin]',
			'value'  => '',
			'label'  => esc_html_x('BlogLovin', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[bloglovin]',
			'value'  => '',
			'label'  => esc_html_x('BlogLovin', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[gplus]',
			'value'  => '',
			'label'  => esc_html_x('Google+', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[youtube]',
			'value'  => '',
			'label'  => esc_html_x('YouTube', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[dribbble]',
			'value'  => '',
			'label'  => esc_html_x('Dribbble', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[tumblr]',
			'value'  => '',
			'label'  => esc_html_x('Tumblr', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[linkedin]',
			'value'  => '',
			'label'  => esc_html_x('LinkedIn', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[flickr]',
			'value'  => '',
			'label'  => esc_html_x('Flickr', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[soundcloud]',
			'value'  => '',
			'label'  => esc_html_x('SoundCloud', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[vimeo]',
			'value'  => '',
			'label'  => esc_html_x('Vimeo', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[rss]',
			'value'  => get_bloginfo('rss2_url'),
			'label'  => esc_html_x('RSS', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
		
		[
			'name'   => 'social_profiles[vk]',
			'value'  => '',
			'label'  => esc_html_x('VKontakte', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
			
		[
			'name'   => 'social_profiles[lastfm]',
			'value'  => '',
			'label'  => esc_html_x('Last.fm', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
			
		[
			'name'   => 'social_profiles[steam]',
			'value'  => '',
			'label'  => esc_html_x('Steam', 'Admin', 'cheerup'),
			'desc'   => '',
			'type'   => 'text'
		],
	]
]];

// Other settings
$other = [[
	'id'     => 'other-settings',
	'title'  => esc_html_x('Miscellaneous Settings', 'Admin', 'cheerup'),
	'fields' => [

		[
			'name'   => 'search_posts_only',
			'value'  => 1,
			'label'  => esc_html_x('Limit Search To Posts', 'Admin', 'cheerup'),
			'desc'   => esc_html_x('Enabling this feature will exclude pages from WordPress search.', 'Admin', 'cheerup'),
			'type'   => 'checkbox'
		],
		
		[
			'name'    => 'enable_lightbox',
			'label'   => esc_html_x('Enable Lightbox for Images', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => '',
			'type'    => 'checkbox',
		],

		[
			'name'    => 'enable_lightbox_mobile',
			'label'   => esc_html_x('Lightbox on Small Screens', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => '',
			'type'    => 'checkbox',
			'context' => [['key' => 'enable_lightbox', 'value' => 1]],
		],

		[
			'name'    => 'amp_enabled',
			'label'   => esc_html_x('AMP: Enable Theme Styles', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => esc_html_x('Enable our special changes for the AMP plugin. Note: Only works when the "Bunyad AMP" plugin is active.', 'Admin', 'cheerup'),
			'type'    => 'checkbox',
		],

		[
			'name'    => 'guten_styles',
			'label'   => esc_html_x('Gutenberg: Add front-end Styles', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => esc_html_x('By default Gutenberg has its own styling. Ticking this will enable our custom styles so that the backend is similar looking to frontend.', 'Admin', 'cheerup'),
			'type'    => 'checkbox',
		],

		[
			'name'  => 'fontawesome4',
			'label' => esc_html_x('Legacy: Load FontAwesome 4', 'Admin', 'cheerup'),
			'value' => 0,
			'desc'  => esc_html_x('Legacy: If you used custom FA4 icons before CheerUp v7.0, enable this.', 'Admin', 'cheerup'),
			'type'  => 'checkbox',
		],

	] // fields
]];

// Performance
$performance = [[
	'id'     => 'misc-performance',
	'title'  => esc_html_x('Performance', 'Admin', 'cheerup'),
	'fields' => [

		[
			'name'  => 'lazyload_enabled',
			'label' => esc_html_x('LazyLoad Images', 'Admin', 'cheerup'),
			'value' => 1,
			'desc'  => '',
			'type'  => 'checkbox',
		],
			
		[
			'name'    => 'lazyload_type',
			'label'   => esc_html_x('Lazy Loader Type', 'Admin', 'cheerup'),
			'value'   => 'normal',
			'desc'    => '',
			'type'    => 'radio',
			'options' => [
				'normal' => esc_html_x('Normal - Load Images on scroll', 'Admin', 'cheerup'),
				'smart'  => esc_html_x('Smart - Preload Images on Desktops', 'Admin', 'cheerup')
			]
		],

		[
			'name'  => 'lazyload_aggressive',
			'label' => esc_html_x('Aggressive Lazy Load', 'Admin', 'cheerup'),
			'value' => 0,
			'desc'  => esc_html_x('By default, only featured and single images are lazyloaded. Aggressive enables lazyloading on all sidebar widgets and footer as well.', 'Admin', 'cheerup'),
			'type'  => 'checkbox',
		],

		[
			'name'  => 'disable_bg_images',
			'label' => esc_html_x('Disable BG Image Method', 'Admin', 'cheerup'),
			'value' => 0,
			'desc'  => esc_html_x('Advanced: Plugins like WebP Express have a setting to inject <picture> tag when using a CDN. This will requires our bg image method to be disabled.', 'Admin', 'cheerup'),
			'type'  => 'checkbox',
		],
	]
]];

// WooCommerce
$woocommerce = [[
	'id'     => 'misc-woocommerce',
	'title'  => esc_html_x('WooCommerce/Shop', 'Admin', 'cheerup'),
	'desc'   => esc_html_x('Settings here only apply if you have WooCommerce installed.', 'Admin', 'cheerup'),
	'fields' => [

		[
			'name'    => 'woocommerce_per_page',
			'label'   => esc_html_x('Shop Products / Page', 'Admin', 'cheerup'),
			'value'   => 9,
			'desc'    => '',
			'type'    => 'number'
		],
			
		[
			'name'    => 'woocommerce_image_zoom',
			'label'   => esc_html_x('Product Page - Image Zoom', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => '',
			'type'    => 'checkbox'
		],
	]
]];

$options['misc-social'] = [
	'sections' => $social
];
$options['misc-other'] = ['sections' => $other];
$options['misc-performance'] = ['sections' => $performance];
$options['misc-woocommerce'] = [];

if (function_exists('is_woocommerce')) {
	$options['misc-woocommerce'] = ['sections' => $woocommerce];
}

return $options;