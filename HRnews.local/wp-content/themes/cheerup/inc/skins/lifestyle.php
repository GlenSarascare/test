<?php
/**
 * CheerUp Lifestyle Skin setup
 */
class Bunyad_Skins_Lifestyle
{
	public function __construct() 
	{
		// Add additional options
		$this->change_options();
		
		// Options are re-initialzed by init_preview, so need to be added again
		// @see Bunyad_Theme_Customizer::init_preview() 
		add_action('customize_preview_init', array($this, 'change_options'), 11);

		// add_action('after_setup_theme', array($this, 'theme_init'), 13);
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

// init and make available in Bunyad::get('skins_content')
Bunyad::register('skins_lifestyle', array(
	'class' => 'Bunyad_Skins_Lifestyle',
	'init' => true
));