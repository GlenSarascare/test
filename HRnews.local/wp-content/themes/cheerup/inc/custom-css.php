<?php
/**
 * Custom CSS generator for modifications
 */
class Bunyad_Theme_CustomCSS
{
	public function __construct()
	{
		add_action('after_setup_theme', [$this, 'init'], 12);
		add_action('customize_save', [$this, 'flush_cache']);
		add_action('bunyad_import_done', [$this, 'flush_cache']);
	}	
	
	public function init()
	{	
		add_action('wp_enqueue_scripts', [$this, 'register_custom_css'], 99);
	}
	
	/**
	 * Remove any custom CSS parser caches
	 * 
	 * @see Bunyad_Css_Generator::render()
	 */
	public function flush_cache()
	{
		delete_transient('bunyad_custom_css_cache');
		delete_transient('bunyad_custom_css_state');
	}
	
	/**
	 * Check if the theme has any custom css
	 */
	public function has_custom_css()
	{
		if (is_customize_preview()) {
			$css_state = false;
		}
		else {
			$css_state = apply_filters('bunyad_custom_css_state', get_transient('bunyad_custom_css_state'));
		}

		// State 1/truthy: It's known Custom CSS exists.
		if ($css_state) {
			return true;
		}

		// State 0/falsey (except false): Custom CSS was checked and not found.
		if ($css_state !== false && !$css_state) {
			return false;
		}

		// We don't know yet if there's custom CSS.
		if ($css_state === false) {

			$return = false;
			$state  = 0;

			include_once get_template_directory() . '/inc/css-generator.php';

			$css = new Bunyad_Css_Generator;
			$css->init();

			if (count($css->get_css_elements())) {
				$return = true;
				$state  = true;
			}

			// Don't store transient in preview as changesets can differ.
			if (!is_customize_preview()) {
				set_transient('bunyad_custom_css_state', $state);
			}

			return $return;
		}
	}

	/**
	 * Action callback: Register Custom CSS with low priority 
	 */
	public function register_custom_css()
	{
		if (is_admin()) {
			return;
		}

		// add custom css
		if ($this->has_custom_css()) {
			
			include_once get_template_directory() . '/inc/css-generator.php';

			$query_args = array('bunyad_custom_css' => 1);
			
			// Setup renderer
			$render = new Bunyad_Css_Generator;
			$render->args = $query_args;
			
			/**
			 * Custom CSS Output Method - external or on-page?
			 */
			if (Bunyad::options()->css_custom_output == 'external')  {
				wp_enqueue_style('cheerup-custom-css', add_query_arg($query_args, get_site_url() . '/'));
			}
			else {

				// associate custom css at the end
				$source = 'cheerup-core';
				
				$check  = array_reverse(array('cheerup-woocommerce', 'cheerup-skin', 'cheerup-child'));
				foreach ($check as $sheet) {
					if (wp_style_is($sheet, 'enqueued')) {
						$source = $sheet;
						break;
					}
				}
				
				// Add to on-page custom css
				Bunyad::core()->enqueue_css(
					$source, 
					apply_filters('bunyad_custom_css_enqueue', $render->render())
				);
			}

			// Setup Google Fonts enqueue
			$google_fonts = $render->get_google_fonts_url();
			if ($google_fonts) {
				wp_enqueue_style('cheerup-gfonts-custom', $google_fonts, array(), null);
			}
		}
	}
}

// init and make available in Bunyad::get('custom_css')
Bunyad::register('custom_css', array(
	'class' => 'Bunyad_Theme_CustomCSS',
	'init' => true
));