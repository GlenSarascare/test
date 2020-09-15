<?php
/**
 * Textarea control.
 */
class Bunyad_Customizer_Controls_Textarea extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control.
	 */
	public $type = 'bunyad-textarea';

	/**
	 * @inheritDoc
	 */
	public function content_template()
	{
		?>

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
		?>
		<#
			var theValue = <?php echo (string) ($single ? 'data.value' : 'data.value[ device ]'); ?>;
			data.id = <?php echo (string) ($single ? 'data.id' : 'data.id + device'); ?>;
		#>

		<textarea
			id="{{ data.id }}"
			rows="5"
			<?php echo (string) ($single ? '{{{ data.link }}}' : 'data-bunyad-cz-key="{{ device }}"'); ?>>
				{{ theValue }}
		</textarea>
		
		<?php
	}

	/**
	 * @inheritDoc
	 */
	public function template_devices_single() {
		$this->template_devices_multi(true);
	}
}