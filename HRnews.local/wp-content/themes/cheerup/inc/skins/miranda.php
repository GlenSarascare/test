<?php
/**
 * CheerUp Miranda Skin setup
 */
class Bunyad_Skins_Miranda
{
	/**
	 * Skins are initialized at after framework intialized and options setup.
	 */
	public function __construct() 
	{
		// $this->change_options();
	}

	/**
	 * Add extra selectors needed for the skin
	 */
	public function change_options()
	{	
	}
}

// init and make available in Bunyad::get('skins_miranda')
Bunyad::register('skins_miranda', array(
	'class' => 'Bunyad_Skins_Miranda',
	'init' => true
));