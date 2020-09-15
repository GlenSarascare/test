<?php
/**
 * Base class for our custom controls
 */
class Bunyad_Customizer_Controls_Base extends WP_Customize_Control 
{
	use Bunyad_Customizer_Controls_BaseTrait;

	public function to_json()
	{
		$this->base_json();
	}

	/**
	 * We don't use the PHP-based render.
	 */
	public function render_content() {}
}