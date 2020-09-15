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
Class JNews_Split_Type_16 extends JNews_Split_Type_Abstract {

	public function render() {
		$output = $this->before_content;
		$output .= $this->render_content();

		return $output;
	}

	public function render_content() {
		$output = null;

		$contents = $this->splitter->get_all_result();
		$contents = $contents['content'];

		foreach ( $contents as $id => $content ) {
			$output .= "<div class='split-wrapper active' data-id='{$id}'>";
			$output .= $this->get_first_image( $content['description'] );
			$output .= $this->get_split_content( $id, $content['description'] );
			$output .= "</div>";
		}

		$output = "<div class='split-carousel owl-carousel has-nav-content top-split-nav'>{$output}</div>";

		$split_var   = 'jnews_split_' . uniqid();
		$script_json = wp_json_encode( $this->js_variable() );
		$script      = "<script> var {$split_var} = {$script_json} </script>";

		$output =
			"<div class='split-container split-template-{$this->get_split_type()}' data-id='{$split_var}'>
                {$output}
                {$script}
            </div>";

		return $output;
	}

	public function get_split_content( $id, $content ) {
		$output    = '';
		$page_text = sprintf( jnews_return_translation( "Page %s of %s", 'jnews-split', 'page_s_of_s' ), $this->get_page_number( $id + 1 ), $this->max_page );

		$output .= "<span class='page_info'>{$page_text}</span>";
		$output .= $this->get_current_title( $id );
		$output .= $this->get_parsed_content( $content );

		$output = "<div class='split-content'>{$output}</div>";

		return $output;
	}

	public function get_current_title( $index ) {
		$title   = $this->all_title[ $index ];
		$heading = $this->header_tag;

		return "<" . $heading . " class=\"current_title\">{$title}</" . $heading . ">";
	}

	public function get_split_type() {
		return "16";
	}
}

