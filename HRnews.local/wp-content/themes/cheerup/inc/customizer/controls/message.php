<?php
/**
 * Show a message or notice.
 */
class Bunyad_Customizer_Controls_Message extends Bunyad_Customizer_Controls_Base
{

	public $type  = 'message';
	public $text  = '';
	public $style = '';

	// Collapsed is for hiding.
	public $collapsed = false;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() 
	{
		parent::to_json();

		$this->json['text']     = $this->text;
		$this->json['style']    = $this->style;
	}

	/**
	 * Render a JS template
	 */
	public function content_template() 
	{
		?>
		<div class="bunyad-cz-message bunyad-cz-{{ data.style }}">
		
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.text ) { #>
				{{{ data.text }}}
			<# } #>

		</div>

		<?php 
	}
}