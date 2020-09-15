<?php
/**
 * Color Control modified to include the base
 * 
 * @see WP_Customize_Color_Control
 */
class Bunyad_Customizer_Controls_Color extends WP_Customize_Color_Control
{	
	use Bunyad_Customizer_Controls_BaseTrait;

	public $type = 'bunyad-color';

	/**
	 * @inheritDoc
	 */
	public function to_json() 
	{
		$this->base_json();

		// Recall for correct order 
		// parent::to_json();	
	}
}
