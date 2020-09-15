<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Theme JNews_Post_Split
 */
Class JNews_Split_Type_17 extends JNews_Split_Type_Abstract {

	public function render() {
		$output = $this->before_content;
		$output .= "<div class='top-split-nav'>" . $this->drop_section() . "</div>";
		$output .= $this->render_content();

		return $output;
	}

	public function drop_section() {
		$output =
			" <div class=\"jeg_splitpost_bar jeg_splitpost_4\">
                " . $this->current_title() . "
            </div>";

		return $output;
	}

	public function get_split_type() {
		return "17";
	}
}

