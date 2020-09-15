<?php
/**
 * CheerUp Magazine Skin setup
 */
class Bunyad_Skins_Magazine
{
	public function __construct() 
	{
		// Special thumbs for this skin
		add_filter('bunyad_image_sizes', array($this, 'image_sizes'));
		
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

	/**
	 * Filter callback: Modify image sizes for this skin
	 * 
	 * @see Bunyad_Theme_Cheerup::theme_init()
	 */
	public function image_sizes($sizes) 
	{
		$modified = array(
			'cheerup-grid'  => array('width' => 370, 'height' => 247),
			'cheerup-list'  => array('width' => 270, 'height' => 180),
			'cheerup-thumb' => array('width' => 110, 'height' => 73),
			'cheerup-small-post' => array('width' => 110, 'height' => 73),
		);
		
		return array_merge($sizes, $modified);
	}
}

// init and make available in Bunyad::get('skins_magazine')
Bunyad::register('skins_magazine', array(
	'class' => 'Bunyad_Skins_Magazine',
	'init' => true
));