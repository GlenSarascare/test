<?php
/**
 * Base class for our custom controls.
 */
class Bunyad_Customizer_Controls_Toggle extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control.
	 */
	public $type = 'bunyad-toggle';

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

		<div class="bunyad-cz-toggle <# if ( theValue ) { #>is-checked<# } #>">
			<input 
				class="bunyad-cz-toggle__input" 
				id="{{ data.id }}" 
				type="checkbox" value="{{ theValue }}" 
				<?php echo (string) ($single ? '{{{ data.link }}}' : 'data-bunyad-cz-key="{{ device }}"'); ?> 
				<# if ( theValue ) { #> checked="checked" <# } #> 
			/>
			<span class="bunyad-cz-toggle__track"></span>
			<span class="bunyad-cz-toggle__thumb"></span>
			
			<svg class="bunyad-cz-toggle__on" width="2" height="6" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 6">
				<path d="M0 0h2v6H0z"></path>
			</svg>

			<svg class="bunyad-cz-toggle__off" width="6" height="6" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6 6">
				<path d="M3 1.5c.8 0 1.5.7 1.5 1.5S3.8 4.5 3 4.5 1.5 3.8 1.5 3 2.2 1.5 3 1.5M3 0C1.3 0 0 1.3 0 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"></path>
			</svg>
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