<?php
/**
 * Base class for our custom controls
 */
class Bunyad_Customizer_Controls_Text extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control
	 */
	public $type = 'bunyad-text';

	public function to_json()
	{
		parent::to_json();

		$this->json = array_merge($this->json, array(
			'input_type'  => str_replace('bunyad-', '', $this->type),
		));
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
	public function template_devices_multi() {
		echo '<input type="{{ data.input_type }}" value="{{ data.value[device] }}" {{{ input_attrs }}} data-bunyad-cz-key="{{ device }}" />';
	}

	/**
	 * @inheritDoc
	 */
	public function template_devices_single() {
		echo '<input type="{{ data.input_type }}" value="{{ data.value }}" {{{ input_attrs }}} {{{ data.link }}} />';
	}
}