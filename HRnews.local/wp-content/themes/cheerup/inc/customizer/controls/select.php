<?php
/**
 * Base class for our custom controls.
 */
class Bunyad_Customizer_Controls_Select extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control.
	 */
	public $type = 'bunyad-select';
	public $choices = [];

	/**
	 * @var array Present array of choices.
	 */
	public $presets = [];
	public $preset;

	public function __construct($manager, $id, $args = array())
	{
		parent::__construct($manager, $id, $args);

		// Note: w- prefix added to numeric values to preserve order (JS objects have numeric first).
		// Key/value will be used from the array.
		$this->presets = [
			'font_weights' => [
				''        => esc_html_x('Default', 'Admin', 'cheerup'),
				'normal'  => 'Normal',
				'bold'    => 'Bold',
				'w-200'  => [200, '200 Extra-Light'],
				'w-300'  => [300, '300 Light'],
				'w-500'  => [500, '500 Medium'],
				'w-600'  => [600, '600 Semi-bold'],
				'w-800'  => [800, '800 Extra Bold'],
				'w-900'  => [900, '900 Black'],
			],
			'font_style' => [
				''        => esc_html_x('Default', 'Admin', 'cheerup'),
				'normal'  => esc_html_x('Normal', 'Admin', 'cheerup'),
				'italic'  => esc_html_x('Italic', 'Admin', 'cheerup'),
			],
			'font_transform' => [
				''           => esc_html_x('Default', 'Admin', 'cheerup'),
				'initial'    => esc_html_x('Normal', 'Admin', 'cheerup'),
				'uppercase'  => esc_html_x('Uppercase', 'Admin', 'cheerup'),
				'lowercase'  => esc_html_x('Lowercase', 'Admin', 'cheerup'),
				'capitalize' => esc_html_x('Capitalize', 'Admin', 'cheerup'),
			]
		];
	}

	public function to_json()
	{
		parent::to_json();

		$this->json['choices'] = $this->choices;
		$this->json['preset']  = $this->preset;
	}

	/**
	 * @inheritDoc
	 */
	public function content_template()
	{
		?>

		<?php if ($this->type == 'bunyad-select'): // Ignore for sub-classes ?>
		<#
			var presets = <?php echo json_encode($this->presets); ?>;

			if (data.preset && presets[ data.preset ]) {
				data.choices = presets[ data.preset ];
			}
		#>
		<?php endif; ?>

		<?php $this->template_before(); ?>
		
		<?php $this->template_heading(); ?>

		<div class="customize-control-content">

			<?php $this->template_devices(); ?>

		</div>

		<?php $this->template_after(); ?>

		<?php
	}

	/**
	 * @inheritDoc
	 */
	public function template_devices_multi($single = false) 
	{
		$value_check = $single ? 'data.value' : 'data.value[ device ]';

		?>

		<#
			var theValue = <?php echo (string) ($single ? 'data.value' : 'data.value[ device ]'); ?>;
			if (typeof theValue !== 'string') {
				theValue = '';
			}

			data.id = <?php echo (string) ($single ? 'data.id' : 'data.id + device'); ?>;
		#>

		<select id="{{ data.id }}" <?php echo (string) ($single ? '{{{ data.link }}}' : 'data-bunyad-cz-key="{{ device }}"'); ?> data-selected="{{ theValue }}">
		
			<# 
			_.each( data.choices, function( label, key ) {

				// Key/Label pair as an array - usually to preserve order as JS puts 
				// numeric keys first in objects.
				if (_.isArray(label)) {
					key   = label[0];
					label = label[1];
				}

			#>
				<option <# if ( <?php echo esc_js($value_check); ?> == key ) { #> selected="selected" <# } #> value="{{ key }}">{{{ label }}}</option>
			<# } ); #>

		</select>
		
		<?php
	}

	/**
	 * @inheritDoc
	 */
	public function template_devices_single() {
		$this->template_devices_multi(true);
	}
}