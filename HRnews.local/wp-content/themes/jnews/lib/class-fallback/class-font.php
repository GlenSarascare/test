<?php
/**
 * @author : Jegtheme
 */

namespace Jeg\Util;

class Font {

	private static $instance = null;

	private function __construct() {}

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function is_google_font( $fontname ) {}
}
