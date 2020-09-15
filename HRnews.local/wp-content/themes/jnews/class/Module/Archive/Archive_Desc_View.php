<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Archive;

Class Archive_Desc_View extends ArchiveViewAbstract {
	public function render_module_back( $attr, $column_class ) {
		$style = $this->generate_style( $attr );

		return
			"<div {$this->element_id($attr)} class='jeg_archive_description_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <h2 class=\"jeg_archive_description\">Archive description goes here, it will change into related archive description on frontend website.</h2>
            </div>";
	}

	public function render_module_front( $attr, $column_class ) {
		$term  = $this->get_term();
		$desc  = isset( $term->description ) ? $term->description : '';
		$style = $this->generate_style( $attr );

		return
			"<div {$this->element_id($attr)} class='jeg_archive_description_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <h2 class=\"jeg_archive_description\">{$desc}</h2>
            </div>";
	}

	public function generate_style( $attr ) {

		$result = '';

		if ( isset( $attr['text_color'] ) && $attr['text_color'] ) {
			$result .= 'color: ' . $attr['text_color'] . ';';
		}

		if ( isset( $attr['font_size'] ) && $attr['font_size'] ) {
			$result .= 'font-size: ' . $attr['font_size'] . ';';
		}

		if ( $result ) {
			$result = '<style>' . $this->element_id( $attr ) . ' .jeg_archive_description {' . $result . '}' . '</style>';
		}

		return $result;
	}
}
