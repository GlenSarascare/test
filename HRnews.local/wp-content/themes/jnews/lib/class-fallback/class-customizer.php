<?php
/**
 * @author : Jegtheme
 */

namespace Jeg\Customizer;

class Customizer {

	private static $instance;

	public static function get_instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {}

	public function add_section( $section ) {}

	public function add_panel( $panel ) {}
}
