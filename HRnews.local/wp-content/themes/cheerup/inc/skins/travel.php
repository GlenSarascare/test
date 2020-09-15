<?php
/**
 * CheerUp Travel Skin setup
 */
class Bunyad_Skins_Travel
{
	/**
	 * Skins are initialized at after framework intialized and options setup.
	 */
	public function __construct() 
	{
		$this->change_options();

		// Special thumbs for this skin
		// add_filter('bunyad_image_sizes', array($this, 'image_sizes'));

		// Extra CSS:
		// block-head-d styling extras: .sidebar .block-head-d {}
	}

	/**
	 * Add extra selectors needed for the skin
	 */
	public function change_options()
	{	
		$elements = Bunyad::options()->defaults;

		// Commit to options memory.
		Bunyad::options()->defaults = $elements;
	}
}

// init and make available in Bunyad::get('skins_travel')
Bunyad::register('skins_travel', array(
	'class' => 'Bunyad_Skins_Travel',
	'init' => true
));