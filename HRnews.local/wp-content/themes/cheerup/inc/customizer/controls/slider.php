<?php
/**
 * Base class for our custom controls
 */
class Bunyad_Customizer_Controls_Slider extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control
	 */
	public $type = 'bunyad-slider';

	public function to_json()
	{
		parent::to_json();
	}

	/**
	 * @inheritDoc
	 */
	public function content_template()
	{
		?>

		<#
		var input_attrs = [];
		if (data.input_attrs) {
			_.each(data.input_attrs, function(value, attr) {
				input_attrs.push(
					attr + '="' + _.escape(value) + '"'
				);
			});

			input_attrs = input_attrs.join(' ');
		}
		#>

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
		$value = $single ? 'data.value' : 'data.value[ device ]';
		?>

		<#
			data.id = <?php echo (string) ($single ? 'data.id' : 'data.id + device'); ?>;
		#>

		<div class="bunyad-cz-slider">
			<input
				class="bunyad-cz-slider-track"
				type="range"
				value="{{ <?php echo esc_attr($value); ?> }}" 
				{{{ input_attrs }}} />

			<input
				class="slider-number"
				type="number"
				id="{{ data.id }}"
				<?php echo (string) ($single ? '{{{ data.link }}}' : 'data-bunyad-cz-key="{{ device }}"'); ?> 
				aria-label="{{ data.label }}"
				value="{{ <?php echo esc_attr($value); ?> }}" 
				{{{ input_attrs }}} />
							
		</div>

		<?php
	}

	/**
	 * @inheritDoc
	 */
	public function template_devices_single() {
		$this->template_devices_multi(true);
	}
}