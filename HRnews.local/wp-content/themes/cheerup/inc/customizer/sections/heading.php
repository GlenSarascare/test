<?php
/**
 * Special pseudo-group heading sections
 */
class Bunyad_Customizer_Sections_Heading extends WP_Customize_Section 
{
	public $type = 'bunyad-heading';

	/**
	 * @inheritDoc
	 */
	protected function render_template() 
	{
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<h3 class="the-title">
				{{ data.title }}
			</h3>
		</li>
		<?php
	}
}