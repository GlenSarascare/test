<?php
/**
 * Customize Color Control class.
 * 
 * @see WP_Customize_Control
 */
class Bunyad_Customizer_Controls_ColorAlpha extends WP_Customize_Color_Control {

	public $type = 'bunyad-color-alpha';

	use Bunyad_Customizer_Controls_BaseTrait;

	/**
	 * Enqueue scripts/styles for the color picker.
	 */
	public function enqueue() {

		// Works with both plugins and theme. For future.
		$current_dir = dirname(__DIR__);
		if (strpos($current_dir, WP_PLUGIN_DIR) !== false) {
			$control_root_url = dirname(plugin_dir_url(__FILE__));
		}
		else {
			$control_root_url = str_replace(
				realpath(untrailingslashit(get_template_directory())),
				get_template_directory_uri(),
				$current_dir
			);
		}

		wp_enqueue_script(
			'bunyad-control-color-picker-alpha',
			$control_root_url . '/js/dist/color-alpha.js',
			['jquery', 'wp-color-picker'],
			'1.1',
			true
		);
	}

	public function to_json() 
	{
		$this->base_json();
	}

	/**
	 * Empty PHP Render.
	 * 
	 * @return void
	 */
	public function render_content() {}

	public function content_template() {
		?>
		<# 
			var defaultValue = data.defaultValue;
		#>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-content">
			<label>
				<span class="screen-reader-text">{{{ data.label }}}</span>
				<input class="alpha-color-control" type="text" placeholder="#RRGGBB" 
					data-show-opacity="true" data-palette="false" 
					data-default-color="{{ defaultValue }}"
					{{{ data.link }}} />
			</label>
		</div>
		<?php
	}
}