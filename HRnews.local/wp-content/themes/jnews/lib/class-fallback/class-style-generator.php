<?php
/**
 * @author : Jegtheme
 */

namespace Jeg\Util;

class Style_Generator {

	private static $instance;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {}

	public function get_font_url() {
		return false;
	}
}
