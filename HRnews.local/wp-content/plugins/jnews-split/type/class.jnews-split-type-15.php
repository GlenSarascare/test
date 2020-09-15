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
Class JNews_Split_Type_15 extends JNews_Split_Type_Abstract {

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
			$image         = $this->get_first_image( $content['description'] );
			$number        = '';
			$wrapper_class = 'no-image';

			if ( ! empty( $image ) ) {
				$number        = $this->page_span( $id );
				$wrapper_class = "with-image";
			}

			$output .= "<div class='split-wrapper split-postlist {$wrapper_class} active' data-id='{$id}'>";
			$output .= "<div class='split-image-wrap'>{$number}{$image}</div>";
			$output .= $this->get_split_content( $id, $content['description'] );
			$output .= "</div>";
		}

		$split_var   = 'jnews_split_' . uniqid();
		$script_json = wp_json_encode( $this->js_variable() );
		$script      = "<script> var {$split_var} = {$script_json} </script>";

		$output =
			"<div class='split-container top-split-nav split-template-{$this->get_split_type()}' data-id='{$split_var}'>
                {$output}
                {$script}
            </div>";

		return $output;
	}

	public function page_span( $index ) {
		$number = $this->get_page_number( $index + 1 );

		return "<span class=\"pagenum\">" . $number . "</span>";
	}

	public function get_split_content( $id, $content ) {
		$output = '';
		$title  = '';

		if ( empty( $this->get_first_image( $content ) ) ) {
			$title = $this->get_current_title( $id, true );
		} else {
			$title = $this->get_current_title( $id );
		}

		$output .= $title;
		$output .= $this->get_parsed_content( $content );

		$output = "<div class='split-content'>{$output}</div>";

		return $output;
	}

	public function get_current_title( $index, $with_number = false ) {
		$title   = $this->all_title[ $index ];
		$number  = $with_number ? $this->page_span( $index ) : "";
		$heading = $this->header_tag;

		return "<" . $heading . " class=\"current_title {$index}\">{$number}{$title}</" . $heading . ">";
	}

	public function get_split_type() {
		return "15";
	}
}

