<?php
/**
 * For all the legacy skins.
 */
class Bunyad_Skins_Legacy
{
	public function __construct() 
	{
		$this->init();
	}

	public function init() {
		// Add additional options
		$this->change_options();
	}
	
	/**
	 * Add extra selectors needed for the skin
	 */
	public function change_options()
	{	
		$elements = Bunyad::options()->defaults;
		$options  = Bunyad::options()->get_all();

		// Except for a few (which use "Read More"), most need Keep Reading.
		if (!in_array($options['predefined_style'], ['fashion', 'fitness', 'bold', 'lifestyle'])) {
			$read_more = esc_html__('Keep Reading', 'cheerup');
		}

		// Miranda and Travel use Continue Reading.
		if (in_array($options['predefined_style'], ['miranda', 'travel'])) {
			$read_more = esc_html__('Continue Reading', 'cheerup');
		}

		if (!isset($read_more)) {
			return;
		}

		// Also set current in-memory, value unless user has changed it.
		if (
			!isset($options['post_read_more_text']) 
			|| $elements['post_read_more_text']['value'] === $options['post_read_more_text']
		) {
			Bunyad::options()->set('post_read_more_text', $read_more);
		}

		// Change default and set current in-memory.
		$elements['post_read_more_text']['value'] = $read_more;

		// Commit to options memory.
		Bunyad::options()->defaults = $elements;
	}
}

// init and make available in Bunyad::get('skins_legacy')
Bunyad::register('skins_legacy', array(
	'class' => 'Bunyad_Skins_Legacy',
	'init' => true
));