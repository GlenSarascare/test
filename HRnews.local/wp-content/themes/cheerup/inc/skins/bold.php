<?php
/**
 * CheerUp Bold Blog Skin setup
 */
class Bunyad_Skins_Bold
{
	public function __construct() 
	{
		// Special thumbs for this skin
		add_filter('bunyad_image_sizes', array($this, 'image_sizes'));
		
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

	/**
	 * Filter callback: Modify image sizes for this skin
	 * 
	 * @see Bunyad_Theme_Cheerup::theme_init()
	 */
	public function image_sizes($sizes) 
	{
		$modified = array(
 			'cheerup-grid'  => array('width' => 370, 'height' => 247),
			'cheerup-carousel-b' => array('width' => 370, 'height' => 247), // Re-do Alias
// 			'cheerup-thumb' => array('width' => 110, 'height' => 73),
		);
		
		return array_merge($sizes, $modified);
	}
}

// init and make available in Bunyad::get('skins_bold')
Bunyad::register('skins_bold', array(
	'class' => 'Bunyad_Skins_Bold',
	'init' => true
));