<?php
/**
 * Base functionality for controls class.
 * 
 * Note: The reason for using a trait here is to extend native controls. 
 */
trait Bunyad_Customizer_Controls_BaseTrait 
{
	/**
	 * @var boolean Denotes a control with per-device settings
	 */
	public $devices = false;
	public $group;
	public $fields;

	// Already available at WP_Customize_Control.
	// public $input_attrs;

	/**
	 * @var array Contextually active / dependencies
	 */
	public $context;

	/**
	 * @var mixed Display / render style info for this control
	 */
	public $style;

	/**
	 * @var string Add extra classes to add to container.
	 */
	public $classes;

	public function base_json()
	{
		parent::to_json();

		// Parent to_json adds this but we don't want this for JS templates.
		unset($this->json['content']);

		// Per-device control?
		$this->json['id']      = $this->id;
		$this->json['devices'] = $this->devices;
		$this->json['group']   = $this->group;
		// $this->json['link']    = $this->get_link();
		$this->json['link']    = 'data-customize-setting-key-link="default"';
		$this->json['input_attrs'] = $this->input_attrs;
		$this->json['style']   = $this->style;
		$this->json['classes'] = $this->classes;

		if ($this->context) {

			$prefix = Bunyad::options()->get_config('theme_prefix') .'_theme_options';

			// Add options key prefix to context keys
			$context = array_map(function($value) use($prefix) {
				return array_replace(
					$value, 
					[
						'key'     => $prefix . '[' . $value['key'] . ']',
						'origKey' => $value['key']
					]
				);
			}, $this->context);

			$this->json['context'] = (object) $context;
		}

		/**
		 * Backward compatibility fix - pre 7.0 corrupt migration?
		 */
		$value = $this->value();
		if ($this->devices) {

			if (!is_array($value)) {
				$value = array_merge(
					(array) $this->settings['default']->default,
					['main' => $value]
				);
			}
		}

		$this->json['value']        = $value;
		$this->json['initialValue'] = $value;
	}

	/**
	 * Template for multiple devices, or a deviceless field.
	 */
	public function template_devices()
	{
		?>
			<# if ( data.devices ) { #>

				<# _.each( data.devices, function(device) { #>

					<#
						var value = data.value[ device ];
						var isChecked = value && value['limit'] ? 'checked' : '';
					#>

					<div class="bunyad-cz-device bunyad-cz-device-{{ device }}" data-device="{{ device }}">
						<?php echo $this->template_devices_multi(); // phpcs:ignore WordPress.Security.EscapeOutput -- Hardcoded safe HTML. ?>

						<# if ( device == 'main' ) { #>

							<label class="bunyad-cz-device-limit">
								<input type="checkbox" value="1" {{ isChecked }} data-bunyad-cz-device-key="limit">
								<?php echo esc_html_x('Apply to large screens only.', 'Admin', 'cheerup'); ?>
							</label>

						<# } #>

					</div>

				<# } ) #>

			<# } else { #>

				<?php echo $this->template_devices_single(); // phpcs:ignore WordPress.Security.EscapeOutput -- Hardcoded safe HTML. ?>

			<# } #>		
		<?php
	}

	/**
	 * Common heading template for controls
	 */
	public function template_heading()
	{
		?>

		<#
		var icons = {
			'main': 'desktop',
			'medium': 'tablet',
			'small': 'smartphone'
		};
		#>

		<# if ( data.label ) { #>
			<span class="customize-control-title">
				<label for="bunyad-cz-control-{{ data.id }}">{{{ data.label }}}</label>

				<# if ( data.devices ) { #>
					<span class="bunyad-cz-devices">
						<# _.each( data.devices, function(key) { #>

							<a href="#" class="device <# if ( key == 'main' ) { #> active <# } #>" data-device="{{ key }}">
								<i class="dashicons dashicons-{{ icons[ key ] }}"></i>
							</a>

						<# } ) #>
					</span>
				<# } #>
			</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<?php
	}

	public function template_before()
	{
		echo '<div class="control-wrap">';
	}

	public function template_after()
	{
		echo '</div>';
	}

	/**
	 * Markup for field for each device.
	 */
	public function template_devices_multi() {}

	/**
	 * Markup to use for a single field without any device support.
	 */
	public function template_devices_single() {}
}