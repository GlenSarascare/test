<?php
/**
 * CheerUp Theme!
 * 
 * Anything theme-specific that won't go into the core framework goes here.
 */
class Bunyad_Theme_Cheerup
{
	public function __construct() 
	{	
		// Perform the after_setup_theme 
		add_action('after_setup_theme', array($this, 'theme_init'), 12);

		// i18n
		load_theme_textdomain('cheerup', get_template_directory() . '/languages');
		
		// Init skins
		add_action('bunyad_core_post_init', array($this, 'init_skins'));
		
		/**
		 * Load theme functions and helpers.
		 * 
		 * Note: Bunyad::options() isn't ready yet. Bunyad_Core::init() enables it later.
		 * Use filters:
		 *   'bunyad_core_post_init' OR 'after_setup_theme'
		 */
		
		// Customizer features
		require_once get_theme_file_path('inc/customizer.php');

		// Ready up the custom css handlers
		require_once get_theme_file_path('inc/custom-css.php');
		
		// Likes / heart functionality
		require_once get_theme_file_path('inc/likes.php');
		
		// Social sharing buttons
		require_once get_theme_file_path('inc/social.php');
		
		// Template tags related to general layout
		require_once get_theme_file_path('inc/helpers.php');
		require_once get_theme_file_path('inc/media.php');
		require_once get_theme_file_path('inc/lazyload.php');
		
		// Special galleries
		require_once get_theme_file_path('inc/galleries.php');
				
		// Have WooCommerce?
		if (function_exists('is_woocommerce')) {
			require_once get_theme_file_path('inc/woocommerce.php');
		}
		
		require_once get_theme_file_path('inc/admin/theme-updates.php');

		// AMP features - available for active method.
		require_once get_theme_file_path('inc/amp/amp.php');
		
		// Admin only or when wpcli is used.
		if (is_admin() || defined('WP_CLI')) {
		
			// Admin (backend) functionality 
			require_once get_theme_file_path('inc/admin.php');
			require_once get_theme_file_path('inc/admin/migrations.php');
		}

		// Define options to initialize early on customizer preview. Normally options
		// are only available after wp_loaded in preview.
		add_filter('bunyad_customize_early_init_options', function() {
			return ['sidebar_titles_style'];
		});

	}
	
	/**
	 * Setup enque data and actions
	 */
	public function theme_init()
	{
		/**
		 * Enqueue assets (css, js)
		 * 
		 * Register Custom CSS at a lower priority for CSS specificity
		 */
		add_action('wp_enqueue_scripts', array($this, 'register_assets'));

		// Register images / post thumbnails.
		$this->register_images();
		
		// Setup navigation menu
		register_nav_menu('cheerup-main', esc_html_x('Main Navigation', 'Admin', 'cheerup'));
		register_nav_menu('cheerup-mobile', esc_html_x('Mobile Menu (Optional)', 'Admin', 'cheerup'));
		
		// Optional topbar menu if enabled
		if (Bunyad::options()->topbar_top_menu) {
			register_nav_menu('cheerup-top-menu', esc_html_x('Topbar Menu (Optional)', 'Admin', 'cheerup'));
		}
		
		// Optional footer menu
		if (Bunyad::options()->footer_links) {
			register_nav_menu('cheerup-footer-links', esc_html_x('Footer Links (Bold Footer Only)', 'Admin', 'cheerup'));
		}
		
		/**
		 * Additional Theme support not defined in Bunyad Core
		 */
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('title-tag');
		add_theme_support('custom-background');

		// Gutenberg
		add_theme_support('align-wide');
			
		// Add content width for oEmbed and similar
		global $content_width;
		
		if (!isset($content_width)) {
			$content_width = 770;
		}
		
		/**
		 * Register Sidebars and relevant filters
		 */
		add_action('widgets_init', array($this, 'register_sidebars'));
		
		// Category widget settings
		add_filter('widget_categories_args', array($this, 'category_widget_query'));
		
		/**
		 * Posts related filter
		 */
		
		// Add the orig_offset for offset support in blocks
		add_filter('bunyad_block_query_args', array(Bunyad::posts(), 'add_query_offset'), 10, 1);
		
		// Video format auto-embed
		add_filter('bunyad_featured_video', array($this, 'featured_media_auto_embed'));
		add_filter('embed_defaults', array($this, 'soundcloud_embed'), 10, 2);
		
		// Remove hentry microformat, we use schema.org/Article
		add_action('post_class', array($this, 'fix_post_class'));
		
		// Fix content_width for full-width posts
		add_filter('wp_head', array($this, 'content_width_fix'));
				
		// Limit number of posts on homepage via a separate setting 
		// Additionally, fix hanging posts for assorted layout
		add_filter('pre_get_posts', array($this, 'home_posts_limit'));
		
		// After customzier is done with its work, hence 11 priority.
		add_action('wp_loaded', [$this, 'theme_wp_loaded_init'], 11);

		// Default comment fields re-order.
		add_filter('comment_form_fields', array($this, 'comment_form_order'), 20);
		
		/**
		 * Admin and editor styling
		 */
		if (is_admin()) {
			
			// Add editor styles
			$styles = array(get_stylesheet_uri());
			$skin   = $this->get_style();
			
			// Add skin css second
			if (isset($skin['css'])) {
				array_push($styles, get_template_directory_uri() . '/css/' . $skin['css'] . '.css');
			}
			
			$styles = array_merge($styles, array(
				get_template_directory_uri() . '/css/admin/editor-style.css',
				$this->get_fonts_enqueue()
			));

			if (!empty($skin['local_fonts'])) {
				foreach ((array) $skin['local_fonts'] as $font) {
					$styles[] = get_theme_file_uri('css/fonts/' . $font . '.css');
				}
			}

			add_editor_style($styles);
		}
		

		/**
		 * Mega menu and navigation
		 */
		add_filter('bunyad_mega_menu_end_lvl', array($this, 'attach_mega_menu'));
		add_filter('wp_nav_menu_items', array($this, 'add_navigation_icons'), 10, 2);

		//add_filter('wp_nav_menu_items', array($this, 'add_navigation_logo'), 10, 2);
		
		add_action('wp_footer', array($this, 'add_pinterest'), 2);
		
		
		/**
		 * Misc
		 */
		add_filter('body_class', array($this, 'the_body_class'));
		
		/**
		 * Setup multi-weight post titles
		 */
		if (!is_admin()) {
			
			add_filter('the_title', array($this, 'title_styling'));
						
			// Apply at priority 8 so wp_kses() filter strips the tags
			add_filter('single_post_title', array($this, 'title_styling'), 8);
		}
				
		/**
		 * Sphere Core aliases
		 */
		if (class_exists('\Sphere\Core\Plugin')) {
			Bunyad::register('social-follow', array('object' => \Sphere\Core\Plugin::get('social-follow')));
		}

		// Filter via social file
		add_filter('bunyad_social_share_float_active', function() { 
			return Bunyad::options()->share_float_services; 
		});

		// Disable bg images for media to resolve plugin conflicts - if enabled.
		if (Bunyad::options()->disable_bg_images) {

			add_filter('bunyad_media_image_options', function($options) {
				$options['bg_image'] = false;
				return $options;
			}, 11);
		}

		/**
		 * 3rd Party plugins fixes.
		 */
		add_action('init', array($this, 'jetpack_fix'));
		add_filter('jp_carousel_force_enable', '__return_true');
		
		// Activate Jetpack module if missing.
		add_action('admin_init', array($this, 'jetpack_modules_fix'));

		// Disable activation notice for Self-hosted Google Fonts plugin.
		add_filter('sgf/admin/active_notice', '__return_false');

		// Yoast SEO separator wrapper. Early define as it runs on WPSEO_Breadcrumbs::__construct()
		add_filter('wpseo_breadcrumb_separator', function($sep) {
			return sprintf('<span class="delim">%s</span>', $sep);
		});

	}

	/**
	 * When WordPress is fully loaded. We hook into 'wp_loaded' due to customizer.
	 */
	public function theme_wp_loaded_init() 
	{
		// Read more text.
		Bunyad::posts()->more_text = Bunyad::options()->post_read_more_text;
		Bunyad::posts()->more_html = ' ';

		// Limit search to posts.
		if (Bunyad::options()->search_posts_only) {
			add_filter('pre_get_posts', array($this, 'limit_search'));
		}
	}
	
	/**
	 * Register image sizes used internally.
	 * 
	 * Only 3 crops generated since v7.
	 */
	public function register_images()
	{
		/**
		 * INFO: 
		 *  3 extra images sizes are generated in total, by default. Rest are just 
		 *  definitions to be used by the theme for internal calculations.
		 */
		$image_sizes = [

			// Generic images used in many locations.
			'cheerup-small'     => ['width' => 175, 'height' => 0, 'crop' => false, 'generate' => true],
			'cheerup-medium'    => ['width' => 450, 'height' => 0, 'crop' => false, 'generate' => true],
			'cheerup-full'      => ['width' => 1170, 'height' => 0, 'crop' => false, 'generate' => true],

			/**
			 * Images definitions below are not images on disk. They're aliases to native
			 * images generated by WordPress.
			 */

			// Alias for native '2048x2048' size, only generated for WordPress older than 5.3 or if removed.
			'cheerup-viewport'  => ['width' => 2048, 'height' => 2048, 'crop' => false, 'generate' => true],

			// Alias for native 'medium_large', only generated if it was removed by a plugin.
			'cheerup-768'       => ['width' => 768, 'height' => 0, 'crop' => false, 'generate' => true],
		];

		/**
		 * Definitions for CSS sizes and internal calculations.
		 * 
		 * Images definitions below are not images on disk. They're definitions either
		 * for internal calculations or CSS pixels.
		 */
		$pixel_definitions = [

			// Featured image size for normal and full width.
			'cheerup-main'             => ['width' => 770, 'height' => 515],
			'cheerup-main-full'        => ['width' => 1170, 'height' => 508],

			// Unconstrained main image. Will use 'medium_large' or 'large' size usually.
			'cheerup-main-uc'          => ['width' => 770, 'height' => 0],

			// Slider image definitions.
			'cheerup-slider-alt'       => ['width' => 1170, 'height' => 508], // Alias for cheerup-main-full
			'cheerup-slider-trendy'    => ['width' => 960, 'height' => 508],
			'cheerup-slider-stylish'   => ['width' => 900, 'height' => 515],
			'cheerup-slider-grid'      => ['width' => 870, 'height' => 600],
			'cheerup-slider-grid-sm '  => ['width' => 300, 'height' => 300],
			'cheerup-slider-carousel'  => ['width' => 370, 'height' => 370],
			'cheerup-slider-grid-b'    => ['width' => 554, 'height' => 466],
			'cheerup-slider-grid-b-sm' => ['width' => 306, 'height' => 466],
			'cheerup-slider-bold-sm'   => ['width' => 136, 'height' => 90],
			'cheerup-widget-slider'    => ['width' => 340, 'height' => 400],

			// Featured Grids - simply for width definitions.
			'cheerup-feat-grid-lg'     => ['width' => 585, 'height' => 0],
			'cheerup-feat-grid-sm'     => ['width' => 292, 'height' => 0],
			'cheerup-feat-grid-lg-vw'  => ['width' => 1170, 'height' => 0],
			'cheerup-feat-grid-sm-vw'  => ['width' => 500, 'height' => 0],

			// Grid Posts (~4:3)
			'cheerup-grid'             => ['width' => 370, 'height' => 278],

			// Carousel - Aliases
			'cheerup-carousel'         => ['width' => 370, 'height' => 305], // Alias for cheerup-list-b
			'cheerup-carousel-b'       => ['width' => 370, 'height' => 285], // Alias for cheerup-grid

			// List Posts
			'cheerup-list'             => ['width' => 260, 'height' => 200],
			'cheerup-list-full'        => ['width' => 395, 'height' => 304],
			'cheerup-list-b'           => ['width' => 370, 'height' => 305],
			'cheerup-list-b-full'      => ['width' => 450, 'height' => 371],

			// Thumbs for sidebar
			'cheerup-thumb'            => ['width' => 87, 'height' => 67],
			'cheerup-thumb-alt'        => ['width' => 150, 'height' => 150], // Alias for thumbnail

			// Used in Mega Menu only.
			'post-thumbnail'           => ['width' => 270, 'height' => 180],

			// Mainly for width defintions, aliases.
			'cheerup-large-cover'      => ['width' => 1920, 'height' => 0],
			// 'cheerup-slider-fashion' => array('width' => 1170, 'height' => 0),
			'cheerup-masonry'          => ['width' => 370, 'height' => 0],

			// Small posts: Highlights blocks, News grid etc. 4:3 like grid.
			'cheerup-small-post'       => ['width' => 110, 'height' => 83],
		];

		$image_sizes += $pixel_definitions;

		// Register the 3 image sizes with WordPress API.
		$image_sizes = apply_filters('bunyad_image_sizes', $image_sizes);
		foreach ($image_sizes as $key => $size) {

			// For default thumbnail, just redefining size.
			if ($key === 'post-thumbnail') {
				set_post_thumbnail_size($size['width'], $size['height'], true);
				continue;
			}
			
			// Not marked to be generated, skip.
			if (empty($size['generate'])) {
				continue;
			}
			
			// Set default crop to true
			$size['crop'] = (!isset($size['crop']) ? true : $size['crop']);

			add_image_size($key, $size['width'], $size['height'], $size['crop']);	
		}
	}

	/**
	 * Register and enqueue theme CSS and JS files
	 */
	public function register_assets()
	{
		// Theme version
		$version = Bunyad::options()->get_config('theme_version');
		
		// Only add to front-end
		if (!is_admin()) {
			
			/**
			 * Add CSS styles
			 */
			
			// Get style configs for current style
			$style = $this->get_style(Bunyad::options()->predefined_style);
			
			// Add Typekit Kit
			if (Bunyad::options()->typekit_id) {
				wp_enqueue_style('cheerup-typekit', esc_url('https://use.typekit.net/' . Bunyad::options()->typekit_id . '.css'), [], null);
			}
	
			// Add Google fonts
			if (!empty($style['font_args'])) {
				wp_enqueue_style('cheerup-fonts', $this->get_fonts_enqueue(), [], null);
			}
			
			// Add extra CSS if any
			if (!empty($style['extra_css'])) {
				foreach ($style['extra_css'] as $id => $file) {
					wp_enqueue_style($id, get_template_directory_uri() . $file);
				}
			}
				
			// Add core css
			if (apply_filters('bunyad_enqueue_core_css', true)) {
				wp_enqueue_style('cheerup-core', get_stylesheet_uri(), [], $version);
			}

			// Add lightbox to pages and single posts
			if (!Bunyad::amp()->active()) {
				wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.mfp-lightbox.js', [], $version, true);
				
				// Our lightbox CSS
				wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/lightbox.css', [], $version);
			}

			/**
			 * Load all the required JS scripts.
			 * 
			 * Third party assets without prefix in compliance with /wp-standard-handles
			 */
			
			// 3rd Party: FontAwesome - for backward compatibility only if enabled.
			if (Bunyad::options()->fontawesome4) {
				wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css', [], $version);
			}

			// Our own theme icons.
			wp_enqueue_style('cheerup-icons', get_template_directory_uri() . '/css/icons/icons.css', [], $version);

			// 3rd Party: FitVids
			wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', ['jquery'], $version, true);
			wp_enqueue_script('imagesloaded');

			// 3rd Party: https://github.com/bfred-it/object-fit-images
			wp_enqueue_script('object-fit-images', get_template_directory_uri() . '/js/object-fit-images.js', [], $version, true);

			// 3rd Party: https://github.com/WeCodePixels/theia-sticky-sidebar
			wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/js/jquery.sticky-sidebar.js', ['jquery'], $version, true);

			// 3rd Party: jQuery Slick
			wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/js/jquery.slick.js', ['jquery'], $version, true);

			// 3rd Party: https://github.com/nk-o/jarallax
			wp_enqueue_script('jarallax', get_template_directory_uri() . '/js/jarallax.js', ['jquery'], $version, true);

			// Main Theme Script - included after others.
			wp_enqueue_script('cheerup-theme', get_template_directory_uri() . '/js/theme.js', ['jquery'], $version, true);

			// Masonry if needed - loading custom one due to outdated masonry in core. We need v4.0+
			if (Bunyad::options()->post_grid_masonry) {
				wp_enqueue_script('cheerup-masonry', get_template_directory_uri() . '/js/jquery.masonry.js', ['jquery'], $version, true);
			}

			// Polyfills that will only load on old browsers.
			wp_enqueue_script('cheerup-ie-polyfills', get_theme_file_uri('/js/ie-polyfills.js'), [], $version);
			wp_script_add_data('cheerup-ie-polyfills', 'nomodule', true);


			/**
			 * Enqueue pre-defined skins and fonts CSS.
			 */
		
			// Pre-defined scheme / skin CSS - add it below others
			if (!empty($style['css'])) {
				
				// Enqueue with WooCommerce dependency if it exists
				wp_enqueue_style(
					'cheerup-skin',
					get_template_directory_uri() . '/css/' . $style['css'] . '.css',
					[(function_exists('is_woocommerce') ? 'cheerup-woocommerce' : 'cheerup-core')],
					$version
				);

				$this->skin_local_fonts($style);

			}
		}
	}

	/**
	 * Setup any skin data and configs.
	 */
	public function init_skins()
	{
		// Include our skins constructs
		if (Bunyad::options()->predefined_style) {
			
			$style = $this->get_style();
			
			if (!isset($style['non_legacy'])) {

				// Re-init if class already initialized.
				if (Bunyad::get('skins_legacy')) {
					Bunyad::get('skins_legacy')->init();
				}
				else {
					require_once get_theme_file_path('inc/skins/legacy.php');
				}
			}

			if (!empty($style['bootstrap'])) {
				require_once get_theme_file_path($style['bootstrap']);
			}
		}
	}

	/**
	 * Enqueue local fonts for skins
	 */
	public function skin_local_fonts($style, $deps = '')
	{
		// Custom skin fonts?
		if (empty($style['local_fonts'])) {
			return;
		}

		$fonts = (array) $style['local_fonts'];

		// Only load skin fonts if main fonts haven't been changed in customizer
		$primary   = Bunyad::options()->css_font_text;
		$secondary = Bunyad::options()->css_font_secondary;

		if (!(empty($primary['font_name']) || empty($secondary['font_name']))) {
			return;
		}

		if (empty($deps)) {
			$deps = 'cheerup-skin';
		}

		foreach ($fonts as $font) {
			wp_enqueue_style(
				'cheerup-font-' . esc_attr($font),
				get_theme_file_uri('css/fonts/' . $font . '.css'),
				$deps,
				Bunyad::options()->get_config('theme_version')
			);
		}
	}
	
	/**
	 * Setup the sidebars.
	 */
	public function register_sidebars()
	{
	
		/**
		 * Title styles
		 */
		$title_class = Bunyad::options()->sidebar_titles_style;
		if ($title_class) {
			$title_class .= ' has-style';
		}

		$before_title = '<h5 class="widget-title '. esc_attr($title_class) .'"><span class="title">';

		/**
		 * Widget boxed vs non-boxed
		 */
		$widget_class = 'widget';
		if (Bunyad::options()->sidebar_widgets_style == 'boxed') {
			$widget_class .= ' widget-boxed';
		}

		// register dynamic sidebar
		register_sidebar([
			'name'          => esc_html_x('Main Sidebar', 'Admin', 'cheerup'),
			'id'            => 'cheerup-primary',
			'description'   => esc_html_x('Widgets in this area will be shown in the default sidebar.', 'Admin', 'cheerup'),
			'before_title'  => $before_title,
			'after_title'   => '</span></h5>',
			'before_widget' => '<li id="%1$s" class="' . esc_attr($widget_class) . ' %2$s">',
			'after_widget'  => "</li>\n",
		]);

		// register dynamic sidebar
		register_sidebar([
			'name'          => esc_html_x('Split Sidebar - Top', 'Admin', 'cheerup'),
			'id'            => 'cheerup-split-top',
			'description'   => esc_html_x('For when using Assorted home-page only - top part of the split.', 'Admin', 'cheerup'),
			'before_title'  => $before_title,
			'after_title'   => '</span></h5>',
			'before_widget' => '<li id="%1$s" class="' . esc_attr($widget_class) . ' %2$s">',
			'after_widget'  => "</li>\n",
		]);

		// register dynamic sidebar
		register_sidebar([
			'name'          => esc_html_x('Home Call To Action Boxes', 'Admin', 'cheerup'),
			'id'            => 'cheerup-home-cta',
			'description'   => esc_html_x('Use the "CheerUp - Call To Action" in this area to show CTAs below slider.', 'Admin', 'cheerup'),
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => "</div>\n",
		]);

		// Footer widgets.
		register_sidebar([
			'name'          => esc_html_x('Footer Widgets', 'Admin', 'cheerup'),
			'id'            => 'cheerup-footer',
			'description'   => esc_html_x('Add three widgets for the footer area. (Optional)', 'Admin', 'cheerup'),

			// .has-style used to skip default styles.
			'before_title'  => '<h5 class="widget-title has-style">',
			'after_title'   => '</h5>',
			'before_widget' => '<li id="%1$s" class="widget column col-4 %2$s">',
			'after_widget'  => '</li>',
		]);
		
		// Instagram widget area in footer.
		register_sidebar([
			'name'          => esc_html_x('Footer Instagram', 'Admin', 'cheerup'),
			'id'            => 'cheerup-instagram',
			'description'   => esc_html_x('Simply add a single widget using "WP Instagram Widget" plugin. (Optional)', 'Admin', 'cheerup'),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '',
			'after_widget'  => '',
		]);

		// Special styles for MailChimp for WP plugin and subscribe widget.
		add_filter('dynamic_sidebar_params', function($params) {

			foreach ($params as $key => $data) {

				// Skip for footer.
				if (empty($data['widget_id']) || $data['id'] == 'cheerup-footer') {
					continue;
				}

				// Only required if has-style is being applied.
				if (strpos($data['before_title'], 'has-style') === false) {
					continue;
				}

				if (preg_match('/(mc4wp_form_widget|bunyad-widget-subscribe)/', $data['widget_id'])) {
					
					$params[$key] = array_replace($data, [
						'before_title' => preg_replace('/(\bhas-style|block-head-[a-z]+)/', '', $data['before_title']),
					]);
				}
			}

			return $params;
		});
	}
	
	/**
	 * Styles and skins
	 */
	public function get_style($style = '')
	{
		// Get from settings
		if (empty($style)) {
			$style = Bunyad::options()->predefined_style;
		}
		
		if (empty($style)) {
			$style = 'default';
		}
		
		$styles = array(

			'default' => array(
				'font_args' => array('family' => 'IBM Plex Sans:400,500,600,700|Merriweather:300,300i|Lora:400,400i'),
				'css' => ''
			),
						
			'general' => array(
				'font_args' => array('family' => 'Poppins:400,500,600,700|Merriweather:300italic,400,400italic,700'),
				'css' => 'skin-general',
				'bootstrap' => 'inc/skins/general.php',
			),

			'beauty' => array(
				'font_args' => array('family' => 'Lato:400,500,700,900|Merriweather:300italic'),
				'css' => 'skin-beauty',
				'local_fonts' => array('libre-bodoni'),
			),
			 
			'trendy' => array(
				'font_args' => array('family' => 'Lato:400,500,700,900|Lora:400,400italic,700,700italic'),
				'css' => 'skin-trendy',
				'local_fonts' => array('tex-gyre'),
			),
				
			'miranda' => array(
				'font_args' => array('family' => 'Playfair Display:400,400i,700i|Source Sans Pro:400,400i,600,700|Noto Sans:400,700|Lora:400i'),
				'css' => 'skin-miranda',
				'bootstrap' => 'inc/skins/miranda.php',
			),
				
			'rovella' => array(
				'font_args' => array('family' => 'Lato:400,700,900|Noto Sans:400,400i,700|Lora:400i'),
				'css' => 'skin-rovella',
				'bootstrap' => 'inc/skins/rovella.php',
				'local_fonts' => array('trueno'),
			),
				
			'travel' => array(
				'font_args' => array('family' => 'Lato:400,700,900|Roboto:400,400i,500,700|Lora:400i|Rancho:400'),
				'css' => 'skin-travel',
				'bootstrap' => 'inc/skins/travel.php',
			),
			
			'magazine' => array(
				'font_args' => array('family' => 'Lato:400,400i,700,900|Open Sans:400,600,700,800'),
				'css' => 'skin-magazine',
				'bootstrap' => 'inc/skins/magazine.php',
			),
			
			'bold' => array(
				'font_args' => array('family' => 'Open Sans:400,400i,600,700|Lora:400i'),
				'css' => 'skin-bold',
				'bootstrap' => 'inc/skins/bold.php',
			),

			'fashion' => array(
				'font_args' => array('family' => 'Cormorant:600,700,700i'),
				'css' => 'skin-fashion',
				'bootstrap'   => 'inc/skins/fashion.php',
				'local_fonts' => array('ibm-plex')
			),

			'mom' => array(
				'font_args' => array('family' => 'Arima Madurai:500,700|Lato:400,400i,700,900|Montserrat:500,600'),
				'css' => 'skin-mom',
				'bootstrap' => 'inc/skins/mom.php',
				'local_fonts' => array('lato2'),
			),

			'fitness' => array(
				'font_args' => array('family' => 'Karla:400,400i,600|Lora:400i'),
				'css' => 'skin-fitness',
				'bootstrap' => 'inc/skins/fitness.php',
				'local_fonts' => array('renner'),
			),

			'lifestyle' => array(
				'font_args' => array('family' => 'Nunito Sans:400,400i,700,800|IBM Plex Serif:400'),
				'css' => 'skin-lifestyle',
				'bootstrap' => 'inc/skins/lifestyle.php',
				'local_fonts' => array('hk-grotesk'),
			),
		);
		
		//Bunyad::options()->typekit_id = '';
		
		if (!Bunyad::options()->typekit_id) {
			$styles['bold']['local_fonts'] = array('raleway');
		}
	
		// Load up TypeKit modifications for general if it's active and disable google fonts.
		if ($style == 'general' && Bunyad::options()->typekit_id) {
			$styles['general'] = array(
				'font_args' => '',
				'css' => 'skin-typekit'
			);
		}
		
		if (empty($styles[$style])) {
			return [];
		}
		
		return $styles[$style];
	}
	
	/**
	 * Get Google Fonts Embed URL
	 * 
	 * @return string URL for enqueue
	 */
	public function get_fonts_enqueue()
	{
		// Add google fonts
		$style = $this->get_style(Bunyad::options()->predefined_style);
		$args  = $style['font_args'];
	
		if (Bunyad::options()->font_charset) {
			$args['subset'] = implode(',', array_filter(Bunyad::options()->font_charset));
		}

		if (Bunyad::options()->font_display) {
			$args['display'] = Bunyad::options()->font_display;
		}

		return add_query_arg(
			urlencode_deep($args), 
			'https://fonts.googleapis.com/css'
		);
	}	

	/**
	 * Filter callback: Modify category widget for only top-level categories, if 
	 * enabled in customizer.
	 * 
	 * @param array $query
	 */
	public function category_widget_query($query)
	{
		if (!Bunyad::options()->widget_cats_parents) {
			return $query;
		}
		
		// Set to display top-level only
		$query['parent'] = 0;
		
		return $query;
	}
	
	/**
	 * Filter callback: Auto-embed video/audio using a link or shortcode.
	 * 
	 * @param string $content
	 */
	public function featured_media_auto_embed($content) 
	{
		global $wp_embed;
		
		if (!is_object($wp_embed)) {
			return $content;
		}
		
		// Also supports a shortcode instead.
		return do_shortcode($wp_embed->autoembed($content));
	}
	
	/**
	 * Filter callback: Adjust dimensions for soundcloud auto-embed. A height of 
	 * width * 1.5 isn't ideal for the theme.
	 * 
	 * @param array  $dimensions
	 * @param string $url
	 * @see wp_embed_defaults()
	 */
	public function soundcloud_embed($dimensions, $url)
	{
		if (!strstr($url, 'soundcloud.com')) {
			return $dimensions;
		}
		
		$dimensions['height'] = 300;
		
		return $dimensions;
	}

	/**
	 * Filter callback: Remove unnecessary classes
	 */
	public function fix_post_class($classes = [])
	{
		// remove hentry, we use schema.org
		$classes = array_diff($classes, array('hentry'));
		
		return $classes;
	}
	
	/**
	 * Adjust content width for full-width posts
	 */
	public function content_width_fix()
	{
		global $content_width;
	
		if (Bunyad::core()->get_sidebar() == 'none') {
			$content_width = Bunyad::options()->layout_width;
		}
	}	
	
	/**
	 * Filter callback: Fix search by limiting to posts
	 * 
	 * @param object $query
	 */
	public function limit_search($query)
	{
		if (!$query->is_search || !$query->is_main_query()) {
			return $query;
		}

		// ignore if on bbpress and woocommerce - is_woocommerce() cause 404 due to using get_queried_object()
		if (is_admin() || (function_exists('is_bbpress') && is_bbpress()) || (function_exists('is_shop') && is_shop())) {
			return $query;
		}
		
		// limit it to posts
		$query->set('post_type', 'post');
		
		return $query;
	}
	
	/**
	 * Limit number of posts shown on the home-page
	 * 
	 * @param object $query
	 */
	public function home_posts_limit($query)
	{
		// bail out if incorrect query
		if (is_admin() || !$query->is_home() || !$query->is_main_query()) {
			return $query;
		}
		
		$posts_per_page = Bunyad::options()->home_posts_limit;
		if (!$posts_per_page) {
			$posts_per_page = get_option('posts_per_page');
		}
		
		// Reduce one post for subsequent pages when using assorted, to account
		// for one large post on main home.
		if ($query->is_paged() && Bunyad::options()->home_layout == 'assorted') {
			$posts_per_page--;
		}

		$query->set('posts_per_page', $posts_per_page);
		
		return $query;
	}
	
	/**
	 * Adjust comment form fields order 
	 * 
	 * @param array $fields
	 */
	public function comment_form_order($fields)
	{

		// Un-necessary for WooCommerce
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return $fields;
		}
		
		// From Justin Tadlock's plugin
		if (isset($fields['comment'])) {
			
			// Grab the comment field.
			$comment_field = $fields['comment'];
			
			// Remove the comment field from its current position.
			unset($fields['comment']);
			
			// Put the comment field at the end but before consent
			if (!empty($fields['cookies'])) {

				$offset = array_search('cookies', $fields);

				$fields = array_merge(
					array_slice($fields, 0, $offset - 1),
					array('comment' => $comment_field),
					array_slice($fields, $offset)
				);
			}
			else {
				$fields['comment'] = $comment_field;
			}
		}
		
		return $fields;
	}
	
	/**
	 * Filter Callback: Add our custom mega-menus
	 *
	 * @param array $args
	 */
	public function attach_mega_menu($args)
	{
		extract($args);

		// Have a mega menu?
		if (empty($item->mega_menu)) {
			return $sub_menu;
		}
		
		ob_start();
		
		// Get our partial
		Bunyad::core()->partial('partials/mega-menu', compact('item', 'sub_menu', 'sub_items', 'args'));
		
		// Return template output
		return ob_get_clean();
	}
	
	/**
	 * Add icons for header nav-below-b
	 * 
	 * @param string $items
	 * @param object $args
	 */
	public function add_navigation_icons($items, $args)
	{
		if (!in_array(Bunyad::options()->header_layout, array('nav-below-b', 'compact')) || $args->theme_location != 'cheerup-main') {
			return $items;
		}
		
		ob_start();
		?>
		
		<li class="nav-icons">
			<div>
				<?php do_action('bunyad_header_nav_icons'); ?>

				<?php if (Bunyad::options()->header_cart_icon && class_exists('Bunyad_Theme_WooCommerce')): ?>
				
				<div class="cart-action cf">
					<?php echo Bunyad::get('woocommerce')->cart_link(); ?>
				</div>
				
				<?php endif; ?>
				
				<?php if (Bunyad::options()->topbar_search): ?>
				
				<a href="#" title="<?php esc_attr_e('Search', 'cheerup'); ?>" class="search-link"><i class="tsi tsi-search"></i></a>
				
				<div class="search-box-overlay">
					<?php
					Bunyad::helpers()->search_form('alt', array(
						'text' => esc_html__('Type and press enter', 'cheerup')
					));
					?>
				</div>
				
				<?php endif; ?>
			</div>
		</li>
		
		<?php
		
		$items .= ob_get_clean();
		
		return $items;
	}
	
	/**
	 * Filter callback: Add logo to the sticky navigation
	 */
	public function add_navigation_logo($items, $args)
	{
		if (!Bunyad::options()->topbar_sticky OR $args->theme_location != 'cheerup-main') {
			return $items;
		}
		
		if (Bunyad::options()->image_logo) {
			$logo = '<img src="' . esc_attr(Bunyad::options()->image_logo) .'" />'; 
		}
		
		$items = '<li class="sticky-logo"><a href="'. esc_url(home_url('/')) .'">' . $logo . '</a></li>' . $items;
		
		return $items;
	}
	
	/**
	 * Filter callback: Add slider and home to the body if activated on home
	 * 
	 * @param array $classes
	 */
	public function the_body_class($classes) 
	{
		
		if (Bunyad::options()->predefined_style) {
			$classes[] = 'skin-' . Bunyad::options()->predefined_style;	
		}

		// Denotes if lightbox is active.
		if (Bunyad::options()->enable_lightbox) {
			$classes[] = 'has-lb';

			if (Bunyad::options()->enable_lightbox_mobile) {
				$classes[] = 'has-lb-s';
			}
		}
		
		/**
		 * The classes below are only for home.
		 */
		if (!is_home() && !is_front_page()) {
			return $classes; 
		}
		
		if (Bunyad::options()->home_slider || (is_page() && Bunyad::posts()->meta('featured_slider'))) {
			
			$slider = Bunyad::posts()->meta('featured_slider') ? Bunyad::posts()->meta('featured_slider') : Bunyad::options()->home_slider;
			
			$classes[] = 'has-slider';
			$classes[] = 'has-slider-' . $slider;
		}
		
		// Add home layout class
		if (Bunyad::options()->home_layout) {
			$classes[] = 'home-' . Bunyad::options()->home_layout;
		}
		
		return $classes;
	}
	
	/**
	 * Filter callback: Add support or bold and emphasis in markdown format.
	 * 
	 * Example:
	 * 
	 * __bold__ OR **bold** is converted to <strong>bold</strong>
	 * _text_  OR *text*  is converted to <em>text</em>
	 * 
	 * @param string $title
	 */
	public function title_styling($title)
	{
		$title = preg_replace(
			array('/(\*\*|__)(.*?)\1/', '/(\*|_)(.*?)\1/'),
			array('<strong>\2</strong>', '<em>\2</em>'),
			$title
		);
		
		return $title;
	}
	
	/**
	 * Add Pinterest hover button template
	 */
	public function add_pinterest()
	{
		if (!Bunyad::options()->pinit_button) {
			return;
		}
		
		$heading = '';
		$title   = Bunyad::options()->pinit_button_text;
		$show_on = implode(',', Bunyad::options()->pinit_show_on);
		
		if (is_single()) {
			$heading = get_post_field('post_title', get_the_ID(), 'raw');
		}
		
		?>
		
		<a href="https://www.pinterest.com/pin/create/bookmarklet/?url=%url%&media=%media%&description=%desc%" class="pinit-btn" target="_blank" title="<?php 
			echo esc_html($title); ?>" data-show-on="<?php echo esc_attr($show_on); ?>" data-heading="<?php echo esc_attr($heading); ?>">
			<i class="tsi tsi-pinterest-p"></i>
			
			<?php if (Bunyad::options()->pinit_button_label): ?>
				<span class="label"><?php echo esc_html($title); ?></span>
			<?php endif; ?>
			
		</a>
		<?php
	}
	
	/**
	 * Fix JetPack polluting the excerpts
	 */
	public function jetpack_fix()
	{
		// Fix JetPack adding sharing to widgets and small posts
		remove_filter('the_excerpt', 'sharing_display', 19);
	}

	/**
	 * Jetpack tiled galleries need to be activated if not already active
	 */
	public function jetpack_modules_fix()
	{
		if (!class_exists('Jetpack') || !is_callable(['Jetpack', 'is_module_active'])) {
			return;
		}

		// Activate tiled galleries if not active
		if (!Jetpack::is_module_active('tiled-gallery')) {
			Jetpack::activate_module('tiled-gallery', false, false);
		}
	}
}
