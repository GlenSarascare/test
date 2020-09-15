<?php
/**
 * Base class for our custom controls
 */
class Bunyad_Customizer_Controls_FontFamily extends Bunyad_Customizer_Controls_Select {
	
	/**
	 * @var boolean Type of control
	 */
	public $type = 'bunyad-font-family';
	public $choices = [];


	public function to_json()
	{
		parent::to_json();
		$this->json['choices'] = $this->choices;
	}

	/**
	 * @inheritDoc
	 */
	public function enqueue()
	{
		wp_enqueue_script(
			'cheerup-customize-selectbox', 
			get_template_directory_uri() . '/js/admin/selectize.js', 
			array('jquery'),
			Bunyad::options()->get_config('theme_version')
		);

		wp_enqueue_style('cheerup-customize-selectbox', get_template_directory_uri() . '/css/admin/selectize.css');


		/**
		 * Register google fonts.
		 */

		// enqueue() is run everytime. Make sure we only add it once.
		if (Bunyad::registry()->customizer_fonts_registered) {
			return;
		}

		ob_start();
		include get_theme_file_path('inc/customizer/google-fonts.json');
		$google_fonts = ob_get_clean();
		$google_fonts = json_decode($google_fonts, true);

		$fonts = [
			'google' => $google_fonts,
			'system' => [
				[
					'label' => esc_html_x('Sans-Serif Stack', 'Admin', 'cheerup'),
					'value' => 'sans-serif',
					'group' => 'system'
				],
				[
					'label' => esc_html_x('Serif Stack', 'Admin', 'cheerup'),
					'value' => 'serif',
					'group' => 'system'
				],
				[
					'label' => esc_html_x('Helvetica', 'Admin', 'cheerup'),
					'value' => 'helvetica',
					'group' => 'system'
				],
				[
					'label' => esc_html_x('Georgia', 'Admin', 'cheerup'),
					'value' => 'georgia',
					'group' => 'system'
				],
			]
		];

		// Add Google Fonts to the JS
		wp_localize_script('bunyad-customizer-controls', 'Bunyad_Fonts_List', $fonts);
		Bunyad::registry()->customizer_fonts_registered = 1;
	}
}