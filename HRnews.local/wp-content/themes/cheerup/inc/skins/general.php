<?php
/**
 * CheerUp General Skin setup
 */
class Bunyad_Skins_General
{
	public function __construct() 
	{
		// Divider - even on post-meta-a - is only supported on grid and large.
		add_filter('bunyad_post_meta_args', function($args, $type) {

			if (isset($args['style']) && $args['style'] !== 'a') {
				return $args;
			}

			$support_sep = ['grid', 'large', 'large-b'];
			if (!in_array($type, $support_sep)) {
				$args['divider'] = false;
			}

			return $args;

		}, 10, 2);
	}
}

// init and make available in Bunyad::get('skins_general')
Bunyad::register('skins_general', array(
	'class' => 'Bunyad_Skins_General',
	'init' => true
));