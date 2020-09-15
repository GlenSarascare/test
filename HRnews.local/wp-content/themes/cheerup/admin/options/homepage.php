<?php
/**
 * Homepage options
 */

$contexts = [
	'is_grid' => [
		'key'   => 'home_slider', 
		'value' => ['grid-a', 'grid-b', 'grid-c', 'grid-d', 'grid-e', 'grid-f', 'grid-g']
	]
];

$has_static_home = 'page' == get_option('show_on_front');

/**
 * Fields: General
 */
if ($has_static_home) {
	$message = sprintf(
		'<p>Layout settings will not apply to homepage when a static homepage is set. They will apply to Posts/Blog page instead. </p>'
		. '<p>Set homepage to show latest posts from <a href="%1$s" target="_blank">Settings > Reading</a> if you wish to use these.</p>',
		esc_url(admin_url('options-reading.php'))
	);
}

$fields_general = [
	($has_static_home ? [
		'name'  => '_n_home_general',
		'type'  => 'message',
		'label' => '',
		'text'  => $message,
		'style' => 'message-info',
	] : []),

	[
		'name'    => 'home_layout',
		'label'   => esc_html_x('Home Layout', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'radio',
		'options' => [
			''                      => esc_html_x('Classic Large Posts', 'Admin', 'cheerup'),
			'assorted'              => esc_html_x('Assorted - (Large Post + Sidebar, Shop, Grid + Sidebar)', 'Admin', 'cheerup'),
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
		'name'  => 'home_grid_large_info',
		'label' => esc_html_x('Grid / Large Style, Pagination & More', 'Admin', 'cheerup'),
		'type'  => 'content',
		'text'  => sprintf(
			esc_html_x('There are multiple Grid Posts, Large Posts, Pagination styles, and many more options available. Customize them by going back and to %1$sPosts Listings & Blocks%2$s.', 'Admin', 'cheerup'),
			'<a href="#" class="focus-link is-with-nav" data-panel="bunyad-posts-listings">', '</a>'
		)
	],
	
	[
		'name'    => 'home_sidebar',
		'label'   => esc_html_x('Home Sidebar', 'Admin', 'cheerup'),
		'value'   => 'right',
		'desc'    => '',
		'type'    => 'radio',
		'options' => [
			'none'  => esc_html_x('No Sidebar', 'Admin', 'cheerup'),
			'right' => esc_html_x('Right Sidebar', 'Admin', 'cheerup') 
		],
	],
	
	[
		'name'  => 'home_posts_limit',
		'label' => esc_html_x('Number of Posts', 'Admin', 'cheerup'),
		'value' => '',
		'desc'  => esc_html_x('When you wish to use different posts per page from global setting in Settings > Reading which applies to all archives too.', 'Admin', 'cheerup'),
		'type'  => 'number'
	],


	[
		'name'    => 'home_logo_h1',
		'label'   => esc_html_x('Use H1 tag on Logo for SEO', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => '',
		'type'    => 'checkbox',
	]
];

/**
 * Fields: Home Slider
 */
$fields_slider = [
	[
		'name'    => 'home_slider',
		'label'   => esc_html_x('Featured Type', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''          => esc_html_x('Disabled', 'Admin', 'cheerup'),
			'stylish'   => esc_html_x('Stylish (3 images)', 'Admin', 'cheerup'),
			'default'   => esc_html_x('Classic Slider (3 Images)', 'Admin', 'cheerup'),
			'beauty'    => esc_html_x('Beauty (Single Image)', 'Admin', 'cheerup'),
			'fashion'   => esc_html_x('Fashion (Single Image)', 'Admin', 'cheerup'),
			'trendy'    => esc_html_x('Trendy (2 Images)', 'Admin', 'cheerup'),
			'large'     => esc_html_x('Large Full Width', 'Admin', 'cheerup'),
			'carousel'  => esc_html_x('Carousel (3 Small Posts)', 'Admin', 'cheerup'),
			'bold'      => esc_html_x('Bold Full Width', 'Admin', 'cheerup'),

			'grid-a'  => esc_html_x('Grid 1: 1 Large + 4 small', 'Admin', 'cheerup'),
			'grid-b'  => esc_html_x('Grid 2: 1 Large + 2 small', 'Admin', 'cheerup'),
			'grid-c'  => esc_html_x('Grid 3: 1 Large + 2 medium', 'Admin', 'cheerup'),
			'grid-d'  => esc_html_x('Grid 4: 2 Columns', 'Admin', 'cheerup'),
			'grid-e'  => esc_html_x('Grid 5: 3 Columns', 'Admin', 'cheerup'),
			'grid-f'  => esc_html_x('Grid 6: 4 Columns', 'Admin', 'cheerup'),
			'grid-g'  => esc_html_x('Grid 7: 5 Columns', 'Admin', 'cheerup'),
		],
	],

	// More Settings.
	[
		'name'    => '_n_feat_grids_opts',
		'type'    => 'message',
		'label'   => 'More Settings',
		'text'    => 'Beyond these basic settings, customization for featured grids are available in <a href="#" class="focus-link is-with-nav" data-panel="bunyad-posts-feat-grids">Featured Grid</a>.',
		'style'   => 'message-info',
		'context' => [$contexts['is_grid']],
	],

	[
		'name'    => '_n_sliders_opts',
		'type'    => 'message',
		'label'   => 'More Settings',
		'text'    => 'Beyond these basic settings, customization for featured sliders are available in <a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-sliders">Featured Sliders</a>.',
		'style'   => 'message-info',
		'context' => [
			['compare' => '!='] + $contexts['is_grid']
		],
	],

	[
		'name'    => 'slider_posts',
		'label'   => esc_html_x('Post Count', 'Admin', 'cheerup'),
		'value'   => 6,
		'desc'    => esc_html_x('Total number of posts for slider.', 'Admin', 'cheerup'),
		'type'    => 'number',
	],

	[
		'name'    => 'slider_static',
		'label'   => esc_html_x('Static Grid (No Slider)?', 'Admin', 'cheerup'),
		'desc'    => esc_html_x('Disable slides, make grid static, and use a different look on mobile.', 'Admin', 'cheerup'),
		'value'   => 1,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
		'context' => [$contexts['is_grid']]
	],

	[
		'name'    => 'slider_width',
		'label'   => esc_html_x('Featured Width', 'Admin', 'cheerup'),
		'value'   => 'container',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'classes' => 'sep-bottom',
		'options' => [
			'container' => esc_html_x('Container', 'Admin', 'cheerup'),
			'viewport'  => esc_html_x('Full Browser Width', 'Admin', 'cheerup'),
		],
		'context' => [$contexts['is_grid']]
	],
	
	[
		'name'    => 'slider_tag',
		'label'   => esc_html_x('Slider Posts Tag', 'Admin', 'cheerup'),
		'value'   => 'featured',
		'desc'    => esc_html_x('Posts with this tag will be shown in the slider. Leaving it empty will show latest posts.', 'Admin', 'cheerup'),
		'type'    => 'text',
	],
		
	[
		'name'    => 'slider_post_ids',
		'label'   => esc_html_x('Slider Post IDs', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => esc_html_x('Advance Usage: Enter post ids separated by comma you wish to show in the slider, in order you wish to show them in. Example: 11, 105, 2', 'Admin', 'cheerup'),
		'type'    => 'text',
	],
		
	[
		'name'    => 'slider_parallax',
		'label'   => esc_html_x('Enable Parallax Effect?', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => '',
		'type'    => 'checkbox',
	],
	
	[
		'name'    => 'slider_autoplay',
		'label'   => esc_html_x('Slider Autoplay', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => '',
		'type'    => 'checkbox',
	],
	
	[
		'name'    => 'slider_animation',
		'label'   => esc_html_x('Slider Animation', 'Admin', 'cheerup'),
		'value'   => 'fade',
		'desc'    => '',
		'type'    => 'radio',
		'options' => [
			'fade'  => esc_html_x('Fade Animation', 'Admin', 'cheerup'),
			'slide' => esc_html_x('Slide Animation', 'Admin', 'cheerup'),
		],
		'context' => [['key' => 'home_slider', 'value' => ['beauty', 'fashion', 'large', 'bold']]]
	],
	
	[
		'name'        => 'slider_delay',
		'label'       => esc_html_x('Slide Autoplay Delay', 'Admin', 'cheerup'),
		'value'       => 5000,
		'desc'        => '',
		'type'        => 'number',
		'input_attrs' => ['min' => 500, 'max' => 50000, 'step' => 500],
	],
];

/**
 * Fields: Home Carousel
 */
$fields_carousel = [
			
	[
		'name'    => 'home_carousel',
		'label'   => esc_html_x('Enable Posts Carousel On Home', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => esc_html_x('Will show a posts carousel below main slider.', 'Admin', 'cheerup'),
		'type'    => 'checkbox',
	],
		
	[
		'name'    => 'home_carousel_style',
		'label'   => esc_html_x('Carousel Style', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''          => esc_html_x('Default - 4 Images', 'Admin', 'cheerup'),
			'style-b'   => esc_html_x('Style B - 3 Images and Boxed', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'    => 'home_carousel_posts',
		'label'   => esc_html_x('Home Carousel Posts', 'Admin', 'cheerup'),
		'value'   => 8,
		'desc'    => '',
		'type'    => 'number',
	],

	[
		'name'    => 'home_carousel_title',
		'label'   => esc_html_x('Home Carousel Title', 'Admin', 'cheerup'),
		'value'   => esc_html__('Most Popular', 'cheerup'),
		'desc'    => '',
		'type'    => 'text',
	],

	[
		'name'    => 'home_carousel_title_style',
		'label'   => esc_html_x('Title Style', 'Admin', 'cheerup'),
		'value'   => 'block-head-d',
		'desc'    => sprintf(
			'Further styling from %1$sPosts Listings > Common Settings%2$s, under "Design: Block Headings". ',
			'<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-listings-common">',
			'</a>'
		),
		'type'    => 'select',
		'options' => $_common['heading_options'],
		'context' => [['key' => 'home_carousel_style', 'value' => '']],
	],
	
	[
		'name'    => 'home_carousel_type',
		'label'   => esc_html_x('Home Carousel Type', 'Admin', 'cheerup'),
		'value'   => 'posts',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			'liked'   => esc_html_x('Most Liked', 'Admin', 'cheerup'),
			'posts'   => esc_html_x('Latest / By Tag', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'    => 'home_carousel_tag',
		'label'   => esc_html_x('Home Carousel Tag - Optional', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'text',
		'content' => ['control' => ['key' => 'home_carousel_type', 'value' => 'posts']]
	],

	[
		'name'    => 'home_carousel_sep',
		'label'   => esc_html_x('Add Separator Below?', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => '',
		'type'    => 'checkbox',
		'context' => ['control' => ['key' => 'home_carousel_style', 'value' => '']]
	],

	[
		'name'    => 'home_carousel_ratio',
		'label'   => esc_html_x('Image Aspect Ratio', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
	],
	[
		'name'        => 'home_carousel_ratio_custom',
		'label'       => esc_html_x('Custom Ratio', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.posts-carousel .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [['key' => 'home_carousel_ratio', 'value' => 'custom']],
	],

	/**
	 * Group: Post Meta
	 */
	[
		'name'  => '_g_h_carousel_meta',
		'label' => esc_html_x('Post Meta', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
];

Bunyad::helpers()->repeat_options(
	$_common['listing_meta_tpl'],
	[
		'h_carousel' => ['group' => '_g_h_carousel_meta']
	],
	$fields_carousel,
	['replace_in' => ['context']]
);


/**
 * Fields: Home Subscribe
 */
$fields_subscribe = [
	[
		'name'  => 'home_subscribe',
		'label' => esc_html_x('Enable Subscribe Box?', 'Admin', 'cheerup'),
		'value' => 0,
		'desc'  => '',
		'type'  => 'checkbox',
	],
		
	[
		'name'  => 'home_subscribe_url',
		'label' => esc_html_x('Mailchimp Form URL', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'text',
	],
		
	[
		'name'  => 'home_subscribe_label',
		'label' => esc_html_x('Subscribe Message', 'Admin', 'cheerup'),
		'value' => esc_html__('Subscribe to my newsletter to get updates in your inbox!', 'cheerup'),
		'desc'  => '',
		'type'  => 'text'
	],

	[
		'name'  => 'home_subscribe_btn_label',
		'label' => esc_html_x('Button Label', 'Admin', 'cheerup'),
		'value' => esc_html__('Subscribe Now', 'cheerup'),
		'desc'  => '',
		'type'  => 'text'
	],
		
];

/**
 * Sections and final.
 */
$message = 'Layout / General settings will apply to home only when not using a static home.';
if ($has_static_home) {
	$message = <<<EOF
<p>Layout / General settings will not apply to homepage when a static homepage is set.</p>
<p>Sliders, Carousel etc. require page template to be: Homepage.</p>
EOF;

}

$sections = [
	[
		'id'     => 'home-message',
		'title'  => '',
		'desc'   => $message,
		'type'   => 'message',
		'fields' => [],
	],
	
	[
		'id'     => 'home-layout',
		'title'  => esc_html_x('Layout / General', 'Admin', 'cheerup'),
		// 'add_heading' => 'Core Home',
		// 'add_heading_after' => true,
		'fields' => $fields_general	
	],

	[
		'id'     => 'home-slider',
		'title'  => esc_html_x('Featured Area / Slider', 'Admin', 'cheerup'),
		'fields' => $fields_slider,
	],
	
	[
		'id'     => 'home-carousel',
		'title'  => esc_html_x('Posts Carousel', 'Admin', 'cheerup'),
		'fields' => $fields_carousel,
	],			
		
	[
		'id'    => 'home-subscribe',
		'title' => esc_html_x('Subscribe Box', 'Admin', 'cheerup'),
		'desc'  => 
			sprintf(
				esc_html_x('Enable a Mailchimp subscribe box below the slider on home. IMPORTANT: Setup your form first by following %sthis guide%s.', 'Admin', 'cheerup'),
				'<a href="http://cheerup.theme-sphere.com/documentation/#widget-subscribe" target="_blank">', '</a>'
			),
		'fields' => $fields_subscribe
	],
];

$options['homepage'] = [
	'title'    => esc_html_x('Homepage / Blog', 'Admin', 'cheerup'),
	'id'       => 'homepage',
	'sections' => $sections
];

return $options;