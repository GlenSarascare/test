<?php
/**
 * CheerUp Fitness Skin setup
 */
class Bunyad_Skins_Fitness
{
	public function __construct() 
	{
		// Add additional options
		$this->change_options();

		// Divider - even on post-meta-a - is only supported on grid.
		add_filter('bunyad_post_meta_args', function($args, $type) {

			if (isset($args['style']) && $args['style'] !== 'a') {
				return $args;
			}

			$support_sep = ['grid'];
			if (!in_array($type, $support_sep)) {
				$args['divider'] = false;
			}

			return $args;

		}, 10, 2);
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

// init and make available in Bunyad::get('skins_fitness')
Bunyad::register('skins_fitness', array(
	'class' => 'Bunyad_Skins_Fitness',
	'init' => true
));