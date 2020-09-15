<?php
/**
 * Handle migrations to newer version of themes
 */
class Bunyad_Theme_Admin_Migrations
{
	public $from_version;
	public $to_version;
	protected $options;
	protected $prev_options;

	public function __construct()
	{
		add_action('bunyad_theme_version_change', array($this, 'begin'));

		// Debug: Enable to test without saving version number to db.
		// add_filter('bunyad_theme_version_update_done', '__return_false');
	}

	/**
	 * Begin migration
	 */
	public function begin($from_version)
	{
		$this->from_version = $from_version;
		$this->to_version = Bunyad::options()->get_config('theme_version');

		// If from_version is empty, it's likely fresh install.
		if (!$this->from_version) {
			return;
		}

		// Releases with an upgrader
		$releases = array(
			'7.0.2',
			'7.0.0',
			'6.0.0', 
			'5.1.0'
		);

		$releases = array_reverse($releases);
		$this->load_options();

		foreach ($releases as $index => $release) {

			// This shouldn't happen. Can't be a migrator method that's newer than 
			// installed version.
			if (version_compare($this->to_version, $release, '<')) {
				continue;
			}

			// Current version is newer or already at it, continue to next.
			if (version_compare($this->from_version, $release, '>=')) {
				continue;
			}
			
			$handler = array($this, 'migrate_' . str_replace('.', '', $release));
			if (is_callable($handler)) {
				call_user_func($handler);
			}
		}

		$this->save_options();
	}

	/**
	 * Upgrade to version 7.0.2
	 */
	public function migrate_702()
	{
		// Bug fix: Didn't migrate properly.
		if (isset($this->options['css_font_text']) && is_array($this->options['css_font_text'])) {
			$this->options['css_font_text'] = $this->options['css_font_text']['font_name'];
		}

		if (isset($this->options['css_font_secondary']) && is_array($this->options['css_font_secondary'])) {
			$this->options['css_font_secondary'] = $this->options['css_font_secondary']['font_name'];
		}

		// css_font_post_h1-h6 has changed. No more font_size and supports devices now.
		foreach (range(1, 6) as $key) {
			$opt = "css_font_post_h{$key}";
			if (!isset($this->options[$opt])) {
				continue;
			}
			
			if (!is_array($this->options[$opt]) || !($size = $this->options[$opt]['font_size'])) {
				unset($this->options[$opt]);
				continue;
			}

			$this->options[$opt] = ['main' => $size];
		}
	}

	/**
	 * Upgrade to version 7.0.0
	 */	
	public function migrate_700()
	{

		// $this->options['css_body_color'] = '#494949';
		// $this->options['css_logo_padding_bottom'] = 70;

		// $this->options['css_topbar_bg'] = '#494949';
		// $this->options['topbar_style'] = 'light';
		// unset($this->options['topbar_style']);
		// $this->options['css_nav_hover'] = '#foo';
		// $this->options['css_nav_drop_hover'] = '#drop';
		// $this->options['css_posts_title_footer'] = '#footer';
		// $this->options['featured_crop'] = '1';
		// $this->options['css_font_titles_grid'] = ['font_name' => 'Abril', 'font_weight' => '600', 'font_size' => '23'];
		// $this->options['css_font_post_body'] = ['font_name' => 'Abril', 'font_weight' => '700', 'font_size' => '1'];
		// $this->options['css_font_single_body'] = ['font_name' => 'Abril', 'font_weight' => '', 'font_size' => '23'];
		// $this->options['css_font_nav_drops'] = ['font_name' => 'Abril', 'font_weight' => '', 'font_size' => '23'];

		// $this->options['sidebar_sticky'] = '0';
		// $this->options['post_layout_spacious'] = 1;

		// $this->options['home_carousel_style'] = 'b';
		// $this->options['meta_style'] = 'style-b';

		// Sticky defaults to 1 now. sidebar_sticky==1 will be removed later below.
		if (empty($this->options['sidebar_sticky'])) {
			$this->options['sidebar_sticky'] = 0;
		}

		// Spacious defaults to 1 now. post_layout_spacious==1 will be removed later below.
		if (empty($this->options['post_layout_spacious'])) {
			$this->options['post_layout_spacious'] = 0;
		}
		
		/**
		 * Remove new defaults or possibly errorenously set values that were old defaults.
		 * Not always required, but just to be safe.
		 */
		$this->unset_if_match([
			'css_body_color'     => '#494949',
			'css_main_color'     => '#318892',
			'css_font_text'      => ['font_name' => ''],
			'css_font_secondary' => ['font_name' => ''],
			'css_topbar_social'  => '#fff',
			'css_logo_padding_top'    => 70,
			'css_logo_padding_bottom' => 70,
			'css_sidebar_widget_margin' => 45,
			'css_topbar_bg' => '#fff',
			'css_nav_bg' => '#fff',
			'css_nav_drop_color' => '#535353',
			'css_nav_drop_hover' => '#318892',
			'css_nav_color' => '#494949',
			'css_nav_hover' => '#318892',
			
			// Now default.
			'sidebar_sticky' => 1,
			'post_layout_spacious' => 1,
		], null);

		/**
		 * Rename and reconfigure options that have changed.
		 */
		$this->rename_options([
			'css_sidebar_widget_title' => 'css_sidebar_title_bg',
			'topbar_cart' => 'header_cart_icon',
			'css_topbar_search' => 'css_header_search'
		]);

		// Convert to css_topbar_bg_dark/light based on topbar_style.
		$this->rename_option('css_topbar_bg', 'css_topbar_bg', ['topbar_style', 'light']);

		$this->rename_option('css_nav_bg', 'css_nav_bg', ['nav_style', 'light']);
		$this->rename_option('css_nav_color', 'css_nav_color', ['nav_style', 'light']);

		// css_nav_active_(light|dark) based on nav_style, from css_nav_hover.
		if (!empty($this->options['css_nav_hover'])) {
			$option = $this->_option_suffix('css_nav_active', 'nav_style', 'light');
			$this->options[ $option ] = $this->options['css_nav_hover'];
		}

		// Home grid sliders have been converted to featured grids.
		if (!empty($this->options['home_slider'])) {
			$slider = $this->options['home_slider'];
			
			if ($slider == 'grid') {
				$slider = 'grid-b';

				$this->options['feat_grid_overlay_pos'] = 'center';
				$this->options['feat_grid_cat_style']   = 'labels';
				$this->options['feat_grid_overlay']     = 'b';
			}

			if ($slider == 'grid-tall') {
				$slider = 'grid-c';

				$this->options['feat_grid_hover_effect'] = 'hover-zoom';
				$this->options['feat_grid_cat_style']    = 'labels';
				$this->options['feat_grid_meta_below']   = ['author', 'date'];
			}

			$this->options['home_slider'] = $slider;
		}

		// Old colors affected all styles.
		if (isset($this->options['css_post_meta'])) {
			$this->copy_option('css_post_meta', 'css_meta_a_color');
			$this->copy_option('css_post_meta', 'css_meta_b_color');
			$this->rename_option('css_post_meta', 'css_meta_c_color');
		}

		if (isset($this->options['css_post_meta_cat'])) {
			$this->copy_option('css_post_meta_cat', 'css_meta_a_cat_color');
			$this->copy_option('css_post_meta_cat', 'css_meta_b_cat_color');
			$this->rename_option('css_post_meta_cat', 'css_meta_c_cat_color');
		}

		$this->rename_option('css_nav_hover', 'css_nav_hover', ['nav_style', 'light']);
		$this->rename_option('css_nav_drop_bg', 'css_drop_bg', ['nav_style', 'light']);
		$this->rename_option('css_nav_drop_color', 'css_drop_color', ['nav_style', 'light']);
		$this->rename_option('css_nav_drop_hover', 'css_drop_active', ['nav_style', 'light']);
		$this->rename_option('css_posts_title_menu', 'css_mega_title_color', ['nav_style', 'light']);

		// Page sidebar is separate from single_sidebar now.
		$this->copy_option('single_sidebar', 'page_sidebar');

		// featured_crop is split and renamed.
		if (isset($this->options['featured_crop'])) {
			$this->copy_option('featured_crop', 'post_large_featured_crop');
			$this->rename_option('featured_crop', 'single_featured_crop');
		}

		if (isset($this->options['css_posts_title_footer'])) {
			$suffixer = function($default) {
				$value = isset($this->options['footer_layout']) ? $this->options['footer_layout'] : $default;

				return (
					in_array($value, ['bold', 'classic', 'stylish', 'stylish-b', 'contrast'])
						? 'dark' : 'light'
				);
			};

			$this->rename_option('css_posts_title_footer', 'css_footer_post_title', [$suffixer, '']);
		}

		// Has devices now.
		if (isset($this->options['css_sidebar_widget_margin'])) {
			$this->options['css_sidebar_widget_margin'] = ['main' => $this->options['css_sidebar_widget_margin']];
		}

		/**
		 * Redo old typography options.
		 */
		$redo_typo = function($old, $old_default, array $map = [], $remove_old = true, $devices = true) {
			if (!isset($this->options[$old])) {
				return;
			}

			if ($this->options[$old] == $old_default) {
				return;
			}

			$values = $this->options[$old];
			foreach ($values as $key => $val) {

				if (empty($val)) {
					continue;
				}

				if (array_key_exists($key, $map)) {
					$options = (array) $map[$key];

					foreach ($options as $option) {
						// For font_size, most of the time, devices is enabled and it should go under main.
						$this->options[ $option ] = $devices && $key === 'font_size' ? ['main' => $val] : $val;
					}
				}
			}

			if ($remove_old) {
				unset($this->options[$old]);
			}
		};

		$redo_typo('css_font_text',
			['font_name' => ''], 
			['font_name' => 'css_font_text'],
			false
		);

		$redo_typo('css_font_secondary',
			['font_name' => ''], 
			['font_name' => 'css_font_secondary'],
			false
		);

		$redo_typo('css_font_titles_grid',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '23'], 
			['font_size' => 'css_post_grid_title', 'font_weight' => 'css_post_grid_title_weight'],
			true,
			false
		);

		$redo_typo('css_font_titles_list',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '23'], 
			['font_size' => 'css_post_list_title', 'font_weight' => 'css_font_titles_list_weight'],
			true,
			false
		);

		$redo_typo('css_font_post_body',
			['font_name' => '', 'font_weight' => '400', 'font_size' => ''], 
			[
				'font_name'   => ['css_single_body_typo_family', 'css_excerpts_typo_family'],
				'font_size'   => ['css_single_body_typo_size', 'css_excerpts_typo_size'],
				'font_weight' => ['css_single_body_typo_weight', 'css_excerpts_typo_weight']
			]
		);
		$redo_typo('css_font_single_body',
			['font_name' => '', 'font_weight' => '400', 'font_size' => ''], 
			[
				'font_name'   => 'css_single_body_typo_family',
				'font_size'   => 'css_single_body_typo_size',
				'font_weight' => 'css_single_body_typo_weight',
			]
		);

		$redo_typo('css_font_titles_large',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '25'], 
			[
				'font_size'   => ['css_post_large_title', 'css_post_large_title_c'],
				'font_weight' => 'css_post_large_title_typo_weight',
			],
			true,
			false
		);	

		$redo_typo('css_font_sidebar_title',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '12'], 
			[
				'font_name'   => 'css_sidebar_title_typo_family',
				'font_size'   => 'css_sidebar_title_typo_size',
				'font_weight' => 'css_sidebar_title_typo_weight',
			]
		);

		$redo_typo('css_font_nav_drops',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '11'], 
			[
				'font_name'   => ['css_drop_typo_inline_family', 'css_drop_typo_default_family'],
				'font_size'   => ['css_drop_typo_inline_size', 'css_drop_typo_default_size'],
				'font_weight' => ['css_drop_typo_inline_weight', 'css_drop_typo_default_weight']
			],
			true,
			false
		);	

		$redo_typo('css_font_nav_links',
			['font_name' => '', 'font_weight' => '600', 'font_size' => '11'], 
			[
				'font_name'   => ['css_nav_typo_inline_family', 'css_nav_typo_default_family'],
				'font_size'   => ['css_nav_typo_inline_size', 'css_nav_typo_default_size'],
				'font_weight' => ['css_nav_typo_inline_weight', 'css_nav_typo_default_weight']
			],
			true,
			false
		);

		$redo_typo('css_font_post_titles',
			['font_name' => ''], 
			['font_name' => 'css_font_post_titles_family']
		);

		/**
		 * Post Meta Changes.
		 */
		$meta_style = 'a';
		if (!empty($this->options['meta_style'])) {
			$meta_style = str_replace('style-', '', $this->options['meta_style']);
			unset($this->options['meta_style']);
		}

		$old_meta = [
			'a' => [
				'above' => ['cat', 'date'],
				'below' => [],
			],
			'c' => [
				'above' => [],
				'below' => ['author', 'date']
			]
		];

		// The new default is 'b'.
		if ($meta_style !== 'b') {
			$this->options['post_meta_above'] = $old_meta[$meta_style]['above'];
			$this->options['post_meta_below'] = $old_meta[$meta_style]['below'];

			// Single has different for a and c.
			if ($meta_style == 'c') {
				$this->options += [
					'post_meta_single_global' => '0',
					'post_meta_single_above'  => [],
					'post_meta_single_below'  => ['author', 'date']
				];
			}
			// Style: a
			else {
				$this->options += [
					'post_meta_single_global' => '0',
					'post_meta_single_above'  => ['cat'],
					'post_meta_single_below'  => ['date']
				];
			}
		}

		$this->options['post_meta_style'] = $meta_style;

		// List post meta update.
		if (!empty($this->options['post_list_style']) && $this->options['post_list_style'] == 'list-b') {
			$this->options['post_meta_list_global'] = '0';
			$this->options['post_meta_list_above']  = ['date', 'cat'];
			$this->options['post_meta_list_below']  = [];
		}

		// Grid meta update.
		if (!empty($this->options['post_grid_meta_style'])) {
			$meta_style = str_replace('style-', '', $this->options['post_grid_meta_style']);
			unset($this->options['post_grid_meta_style']);

			if ($meta_style !== 'b') {
				$this->options['post_meta_grid_global'] = '0';
				$this->options['post_meta_grid_above']  = $old_meta[$meta_style]['above'];
				$this->options['post_meta_grid_below']  = $old_meta[$meta_style]['below'];
			}

			$this->options['post_meta_grid_style'] = $meta_style;
		}

		// Old read more was tied to post_footer_grid setting and only supported in grid-b.
		if (isset($this->options['post_grid_style']) && $this->options['post_grid_style'] == 'grid-b') {
			if (!isset($this->options['post_footer_grid']) || $this->options['post_footer_grid']) {
				$this->options['post_grid_read_more'] = 1;
			}
		}

		/**
		 * Skins changes.
		 */

		// Old empty is the new general.
		if (empty($this->options['predefined_style'])) {
			$skin = 'general';
			
			$this->options['predefined_style'] = $skin;

			// Default main color has changed in new. But this is only needed for general skin
			// as other skins have their defaults in CSS.
			if (empty($this->options['css_main_color'])) {
				$this->options['css_main_color'] = '#318892';
			}

			// Post meta a has a divider. So using b.
			$this->options['post_meta_single_style'] = 'b';
			$this->options['post_meta_single_below'] = ['date', 'comments'];
		}
		else {
			$skin = $this->options['predefined_style'];
		}

		if ($skin == 'magazine') {
			$this->options['widget_titles_style'] = 'block-head-d';
			$this->options['sidebar_titles_style'] = 'block-head-d';
		}

		if ($skin == 'bold') {
			$this->options['sidebar_titles_style'] = 'block-head-c';
		}

		if ($skin == 'travel' || $skin == 'mom') {
			$this->options['sidebar_titles_style'] = 'block-head-d';
		}

		if ($skin == 'lifestyle') {
			$this->options['read_more_style'] = 'basic';
		}

		if ($skin == 'fitness') {
			// Post meta a has a divider. So using b.
			$this->options['post_meta_single_style'] = 'b';
		}


		if (in_array($skin, ['general', 'beauty'])) {
			$this->options['home_carousel_title_style'] = 'block-head-legacy';
		}

		if (in_array($skin, ['trendy', 'miranda', 'bold'])) {
			$this->options['sidebar_widgets_style'] = 'boxed';
		}

		if (in_array($skin, ['general', 'fitness', 'travel'])) {
			$this->options['post_meta_a_divider'] = 1;
		}

		// Remove "in" for all skins except the three.
		if (!in_array($skin, ['miranda', 'bold', 'fashion'])) {
			$this->options['post_meta_labels'] = ['by'];
		}

		/**
		 * Home Carousel Post Meta migration.
		 */
		$meta_above = isset($this->options['post_meta_above']) ? $this->options['post_meta_above'] : Bunyad::options()->post_meta_above;
		$meta_below = isset($this->options['post_meta_below']) ? $this->options['post_meta_below'] : Bunyad::options()->post_meta_below;

		if (empty($this->options['home_carousel_style'])) {
			$hc_above = ['cat'];
			$hc_below = ['date'];
		}
		else {
			// Home carousel Style B.
			$hc_above = ['cat'];
			$hc_below = ['date', 'comments'];
		}

		// These skins had meta below disabled.
		if (in_array($skin, ['fitness', 'rovella', 'travel', 'bold'])) {
			$hc_below = [];
		}

		// Unless same as old, set override.
		if ($meta_above != $hc_above || $meta_below != $hc_below) {
			$this->options += [
				'post_meta_h_carousel_global' => 0,
				'post_meta_h_carousel_above'  => $hc_above,
				'post_meta_h_carousel_below'  => $hc_below
			];
		}

		// No longer needed.
		unset($this->options['theme_version']);
		unset($this->options['theme_version_previous']);

		// Migrate Custom CSS to native "Additional CSS".
		if (isset($this->options['css_custom'])) {
			$css      = $this->options['css_custom'];
			$existing = wp_get_custom_css();

			if (!empty($existing)) {
				$css = $existing . $css;
			}

			$update = wp_update_custom_css_post($css);
			if (!is_wp_error($update)) {
				unset($this->options['css_custom']);
			}
		}
	}

	/**
	 * Upgrade to version 6.0.0
	 */
	public function migrate_600()
	{
		/**
		 * Pre-6.0, featured_crop=1 was default. Respect the old defaults unless user had set something already.
		 */
		if (!isset($this->options['featured_crop'])) {
			$this->options['featured_crop'] = 1;
		}

		/**
		 * Color / customization settings with defaults changed
		 */
		$this->unset_if_match('css_footer_upper_bg', '#f7f7f7');
		$this->unset_if_match('css_footer_lower_bg', '#f7f7f7');

		// Font settings no longer have a default size
		$this->unset_if_match('css_font_post_body', array('font_size' => '14'));
		$this->unset_if_match('css_font_post_h1', array('font_size' => '25'));
		$this->unset_if_match('css_font_post_h2', array('font_size' => '23'));
		$this->unset_if_match('css_font_post_h3', array('font_size' => '20'));
		$this->unset_if_match('css_font_post_h4', array('font_size' => '18'));
		$this->unset_if_match('css_font_post_h5', array('font_size' => '16'));
		$this->unset_if_match('css_font_post_h6', array('font_size' => '14'));


		/**
		 * Search overlay was default earlier
		 */
		$this->options['search_style'] = 'overlay';
	}

	/**
	 * Unset if a key exists in the options array with same value
	 *
	 * @param string|array $key
	 * @param string|null $value
	 * @return void
	 */
	public function unset_if_match($key, $value = null)
	{
		if (is_array($key)) {
			foreach ($key as $k => $v) {
				$this->unset_if_match($k, $v);
			}
			return;
		}

		if (!isset($this->options[$key])) {
			return;
		}

		if ($this->options[$key] == $value) {
			unset($this->options[$key]);
		}
		else if (is_array($value)) {

			$opt = &$this->options[$key];

			/**
			 * Remove for arrays of type 
			 */
			foreach ($value as $k => $v) {
				if (!is_string($k)) {
					continue;
				}
				
				// Remove if same
				if (!empty($opt[$k]) && $opt[$k] == $v) {
					unset($opt[$k]);
				}
			}

			if (empty($opt)) {
				unset($opt);
			}
		}
	}

	/**
	 * Rename old options.
	 */
	public function rename_options($options) 
	{
		foreach ($options as $old => $new) {
			$this->rename_option($old, $new);
		}
	}

	/**
	 * Copy the value from an option to another, optionally adding a suffix.
	 */
	public function copy_option($old, $new, array $suffix_opt = []) {
		if (!isset($this->options[$old])) {
			return false;
		}

		if (count($suffix_opt)) {
			list($suffix_key, $suffix_default) = $suffix_opt;

			$new = $this->_option_suffix($new, $suffix_key, $suffix_default);
		}

		$this->options[ $new ] = $this->options[ $old ];
		return true;
	}

	/**
	 * Rename an option and delete old.
	 *
	 * @param string $old Old option key.
	 * @param string $new New option key.
	 * @param array $suffix_opt Pair to be used as $check and $default params for _option_suffix.
	 * 
	 * @return void
	 */
	public function rename_option($old, $new, array $suffix_opt = []) {
		if ($this->copy_option($old, $new, $suffix_opt)) { 
			unset($this->options[ $old ]);
		}
	}

	/**
	 * Apply a suffix based on the value of an option, or use a default suffix.
	 *
	 * @param string $key Option key to add suffix to.
	 * @param callable|string $check
	 * @param string $default
	 * 
	 * @return string
	 */
	protected function _option_suffix($key, $check, $default = '') {
		
		if (is_string($check)) {
			$suffix = 
				isset($this->options[ $check ]) 
					? $this->options[ $check ]
					: $default;
		}

		if (is_callable($check)) {
			$suffix = call_user_func($check, $default);
		}

		return $key . '_' . $suffix;
	}

	/**
	 * Load fresh options to the memory.
	 */
	public function load_options()
	{
		// Fresh init to discard any leaky overrides.
		Bunyad::options()->init();
		$this->options = get_option(Bunyad::options()->get_config('theme_prefix') .'_theme_options');

		// Save in previous options to detect changes.
		$this->prev_options = $this->options;
	}

	/**
	 * Save options and clear the caches.
	 */
	public function save_options()
	{
		// Nothing changed.
		if ($this->options === $this->prev_options) {
			return;
		}

		// Save the changes
		Bunyad::options()
			->set_all($this->options)
			->update();

		// Flush CSS cache
		delete_transient('bunyad_custom_css_cache');
		delete_transient('bunyad_custom_css_state');
		wp_cache_flush();
	}
}

// init and make available in Bunyad::get('theme_migrations')
Bunyad::register('theme_migrations', array(
	'class' => 'Bunyad_Theme_Admin_Migrations',
	'init'  => true
));