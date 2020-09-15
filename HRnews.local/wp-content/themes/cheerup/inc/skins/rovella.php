<?php
/**
 * CheerUp Rovella Skin setup
 */
class Bunyad_Skins_Rovella
{
	public function __construct() 
	{
		// Special thumbs for this skin
		// add_filter('bunyad_image_sizes', array($this, 'image_sizes'));
	}
}

// init and make available in Bunyad::get('skins_rovella')
Bunyad::register('skins_rovella', array(
	'class' => 'Bunyad_Skins_Rovella',
	'init' => true
));