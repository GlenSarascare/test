<?php
/**
 * CheerUp Fashion Skin setup
 */
class Bunyad_Skins_Fashion
{
	public function __construct() 
	{
		// Add additional options
		$this->change_options();
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

// init and make available in Bunyad::get('skins_fashion')
Bunyad::register('skins_fashion', array(
	'class' => 'Bunyad_Skins_Fashion',
	'init' => true
));