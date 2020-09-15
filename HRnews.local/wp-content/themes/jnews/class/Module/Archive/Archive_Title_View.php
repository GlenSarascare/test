<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Archive;

Class Archive_Title_View extends ArchiveViewAbstract {
	public function render_module_back( $attr, $column_class ) {

		$title = ! empty( $attr['title'] ) ? $attr['title'] : '';
		$style = $this->generate_style( $attr );

		return
			"<div {$this->element_id($attr)} class='jeg_archive_title_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <h1 class=\"jeg_archive_title\">{$title}Category Title</h1>
            </div>";
	}

	public function render_module_front( $attr, $column_class ) {

		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format', 'jnews' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'jnews' ) );
		} elseif ( is_day() ) {
			$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'jnews' ) );
		}

		$style = $this->generate_style( $attr );

		if ( ! empty( $attr['title'] ) ) {
			$title = $attr['title'] . $title;
		}

		return
			"<div {$this->element_id($attr)} class='jeg_archive_title_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <h1 class=\"jeg_archive_title\">{$title}</h1>
            </div>";
	}

	public function generate_style( $attr ) {

		$result = '';

		if ( isset( $attr['title_color'] ) && $attr['title_color'] ) {
			$result .= 'color: ' . $attr['title_color'] . ';';
		}

		if ( isset( $attr['font_size'] ) && $attr['font_size'] ) {
			$result .= 'font-size: ' . $attr['font_size'] . ';';
		}

		if ( $result ) {
			$result = '<style>' . $this->element_id( $attr ) . ' .jeg_archive_title {' . $result . '}' . '</style>';
		}

		return $result;
	}
}
