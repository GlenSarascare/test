<?php
/**
 * Special pseudo-group heading sections
 */
class Bunyad_Customizer_Sections_Message extends WP_Customize_Section 
{
	public $type = 'bunyad-message';
	public $style = 'message-info';

	/**
	 * @inheritDoc
	 */
	public function json()
	{
		$json = array_merge(parent::json(), [
			'style' => $this->style
		]);

		return $json;
	}

	/**
	 * @inheritDoc
	 */
	protected function render_template() 
	{
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<div class="bunyad-cz-message bunyad-cz-{{ data.style }}">
			
				<# if ( data.title ) { #>
					<span class="customize-control-title">{{ data.title }}</span>
				<# } #>

				<# if ( data.description ) { #>
					{{{ data.description }}}
				<# } #>

			</div>
		</li>
		<?php
	}
}