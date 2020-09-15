<?php
/**
 * Checkbox Control modified to include the base.
 * 
 * NOTE: Does NOT support devices.
 * 
 * @see WP_Customize_Color_Control
 */
class Bunyad_Customizer_Controls_Checkbox extends WP_Customize_Control
{
	use Bunyad_Customizer_Controls_BaseTrait;

	/**
	 * Unique name is required here to prevent #tmpl-customize-control-checkbox-content.
	 * But when initializing, set type to checkbox or set templateId manually.
	 */
	public $type = 'bunyad-checkbox';

	public function to_json()
	{
		$this->base_json();
		$this->json['templateId'] = 'customize-control-default-content';
	}
}
