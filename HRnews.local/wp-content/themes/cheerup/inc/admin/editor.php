<?php
/**
 * Features and modifications for the block editor.
 */
class Bunyad_Theme_Admin_Editor
{
	public function __construct() 
	{
		// Only to be used for logged in users
		if (!current_user_can('edit_pages') && !current_user_can('edit_posts')) {
			return;
		}
		
		// Hook at after_setup_theme for add_theme_support()
		add_action('after_setup_theme', array($this, 'setup'));
	}

	/**
	 * Setup at init hook
	 */
	public function setup()
	{
		/**
		 * Gutenberg
		 */
		if (Bunyad::options()->guten_styles) {
			add_action('enqueue_block_editor_assets', array($this, 'add_new_editor_style'));
			add_filter('block_editor_settings', array($this, 'guten_styles'), 11);
		}

		// Custom line-height and units for 5.5+
		add_theme_support('custom-line-height');
		add_theme_support('custom-units');

		// Guten editor font sizes
		add_theme_support('editor-font-sizes', array(
			array(
				'name' => esc_html_x('small', 'Admin', 'cheerup'),
				'shortName' => esc_html_x('S', 'Admin', 'cheerup'),
				'size' => 13,
				'slug' => 'small'
			),
			array(
				'name' => esc_html_x('regular', 'Admin', 'cheerup'),
				'shortName' => esc_html_x('M', 'Admin', 'cheerup'),
				'size' => 17,
				'slug' => 'regular'
			),
			array(
				'name' => esc_html_x('large', 'Admin', 'cheerup'),
				'shortName' => esc_html_x('L', 'Admin', 'cheerup'),
				'size' => 22,
				'slug' => 'large'
			),
			array(
				'name' => esc_html_x('larger', 'Admin', 'cheerup'),
				'shortName' => esc_html_x('XL', 'Admin', 'cheerup'),
				'size' => 28,
				'slug' => 'larger'
			)
		));
	}

	/**
	 * Add editor styles for gutenberg
	 */
	public function add_new_editor_style()
	{
		wp_enqueue_style(
			'cheerup-editor-styles', 
			get_theme_file_uri('css/admin/guten-editor.css'), 
			false, 
			Bunyad::options()->get_config('theme_version')
		);

		// Skin styles
		$skin = Bunyad::get('theme')->get_style();
		if (!empty($skin['css'])) {
			$style = get_theme_file_uri('css/admin/editor/' . $skin['css'] . '.css');
			
			wp_enqueue_style(
				'cheerup-editor-skin', 
				$style,
				false, 
				Bunyad::options()->get_config('theme_version')
			);
		}

		// Overwrite Core theme styles with empty styles - we provide these
		wp_deregister_style('wp-block-library-theme');
		wp_register_style('wp-block-library-theme', '');

		// Add Google Fonts
		wp_enqueue_style('cheerup-editor-gfonts', Bunyad::get('theme')->get_fonts_enqueue());

		// Add local fonts
		Bunyad::get('theme')->skin_local_fonts($skin, 'cheerup-editor-skin');

		// Add Typekit Kit
		if (Bunyad::options()->typekit_id) {
			wp_enqueue_style('cheerup-editor-typekit', esc_url('https://use.typekit.net/' . Bunyad::options()->typekit_id . '.css'), [], null);
		}
	}

	/**
	 * Filter gutenberg settings.
	 */
	public function guten_styles($setting)
	{
		if (!empty($setting['styles'])) {

			// This is the default editor-styles.css file which isn't needed as we provide the necessary.
			if (!empty($setting['styles'][0]['css'])) {
				unset($setting['styles'][0]);
			}

			if (
				!empty($setting['styles'][1]['css']) 
				&& strstr($setting['styles'][1]['css'], 'Noto Serif')
			) {
				unset($setting['styles'][1]);
			}
		}
		else {
			$setting['styles'] = [];
		}

		/**
		 * Add dynamic CSS to the gutenberg style renderer.
		 */
		require_once get_theme_file_path('inc/custom-css.php');
		
		if (Bunyad::get('custom_css')->has_custom_css()) {
			require_once get_theme_file_path('inc/css-generator.php');
			
			$render = new Bunyad_Css_Generator;
			$render->args = ['bunyad_custom_css' => 1];

			$css = $render->render();
			$css = str_replace(
				['.entry-content', '.post-content'], 
				// Replace the front-end wrappers with the backend wrapper.
				// Ideally: [':root', ':root'],
				['.block-editor-block-list__layout', '.block-editor-block-list__layout'],
				$css
			);

			array_push($setting['styles'], ['css' => $css]);

			// Setup Google Fonts enqueue.
			$google_fonts = $render->get_google_fonts_url();
			if ($google_fonts) {
				wp_enqueue_style('cheerup-gfonts-custom', $google_fonts, array(), null);
			}
		}

		return $setting;
	}

}

// init and make available in Bunyad::get('admin_editor')
Bunyad::register('admin_editor', array(
	'class' => 'Bunyad_Theme_Admin_Editor',
	'init' => true
));