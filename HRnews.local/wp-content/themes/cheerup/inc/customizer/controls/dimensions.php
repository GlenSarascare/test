<?php
/**
 * Dimensions control for things like spacing - margins, paddings etc.
 */
class Bunyad_Customizer_Controls_Dimensions extends Bunyad_Customizer_Controls_Base {
	
	/**
	 * @var boolean Type of control.
	 */
	public $type = 'bunyad-dimensions';
	public $fields = ['top', 'right', 'bottom', 'left'];

	/**
	 * @inheritDoc
	 */
	public function to_json()
	{
		parent::to_json();
		
		$this->json['inputFields'] = $this->fields;
		$this->json['linked']      = false;
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
			var theValue = Object.assign(
				{top: '', right: '', bottom: '', left: '', unit: 'px'}, 
				Object(<?php echo (string) ($single ? 'data.value' : 'data.value[ device ]'); ?>)
			);

			var inputAttrs = '';
			var czKey = device || 'default';
		#>

		<div class="bunyad-cz-dimensions">

			<div class="bunyad-cz-dimensions-inputs">

				<# if (data.inputFields.indexOf('top') !== -1) { #>
					<label>
						<input type="number" value="{{ theValue['top'] }}" {{{ inputAttrs }}} data-bunyad-cz-key="{{ czKey }}" data-bunyad-cz-subkey="top" />
						<?php echo esc_html_x('Top', 'Admin', 'cheerup'); ?>
					</label>
				<# } #>

				<# if (data.inputFields.indexOf('right') !== -1) { #>
					<label>
						<input type="number" value="{{ theValue['right'] }}" {{{ inputAttrs }}} data-bunyad-cz-key="{{ czKey }}" data-bunyad-cz-subkey="right" />
						<?php echo esc_html_x('Right', 'Admin', 'cheerup'); ?>
					</label>
				<# } #>

				<# if (data.inputFields.indexOf('bottom') !== -1) { #>
					<label>
						<input type="number" value="{{ theValue['bottom'] }}" {{{ inputAttrs }}} data-bunyad-cz-key="{{ czKey }}" data-bunyad-cz-subkey="bottom" />
						<?php echo esc_html_x('Bottom', 'Admin', 'cheerup'); ?>
					</label>
				<# } #>

				<# if (data.inputFields.indexOf('left') !== -1) { #>
					<label>
						<input type="number" value="{{ theValue['left'] }}" {{{ inputAttrs }}} data-bunyad-cz-key="{{ czKey }}" data-bunyad-cz-subkey="left" />
						<?php echo esc_html_x('Left', 'Admin', 'cheerup'); ?>
					</label>
				<# } #>

				<button class="bunyad-cz-dimensions-linked" title="<?php echo esc_attr_x('Link Values', 'Admin', 'cheerup'); ?>">
					<i class="icon active-icon dashicons dashicons-admin-links"></i>
					<i class="icon dashicons dashicons-editor-unlink"></i>
				</button>

				<span class="bunyad-cz-dimensions-unit">
					<input type="text" value="{{ theValue['unit'] }}" data-bunyad-cz-key="{{ czKey }}" data-bunyad-cz-subkey="unit" />
				</span>

			</div>
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