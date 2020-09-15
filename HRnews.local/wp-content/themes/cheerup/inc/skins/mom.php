<?php
/**
 * CheerUp Mom Skin setup
 */
class Bunyad_Skins_Mom
{
	public function __construct() 
	{
		// Add additional options
		$this->change_options();
		
		// Options are re-initialzed by init_preview, so need to be added again
		// @see Bunyad_Theme_Customizer::init_preview() 
		add_action('customize_preview_init', array($this, 'change_options'), 11);
	}
	
	/**
	 * Add extra selectors needed for the skin
	 */
	public function change_options()
	{	
		$opts = Bunyad::options()->defaults;

		// commit to options memory
		Bunyad::options()->defaults = $opts;
	}
}

// init and make available in Bunyad::get('skins_mom')
Bunyad::register('skins_mom', array(
	'class' => 'Bunyad_Skins_Mom',
	'init' => true
));