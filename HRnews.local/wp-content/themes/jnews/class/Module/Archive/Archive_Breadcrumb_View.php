<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Archive;

Class Archive_Breadcrumb_View extends ArchiveViewAbstract {

	private $last_link_class = 'breadcrumb_last_link';

	public function render_module_back( $attr, $column_class ) {

		$style = $this->generate_style( $attr );

		return
			"<div {$this->element_id($attr)} class='jeg_archive_breadcrumb_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <div class=\"jeg_breadcrumbs jeg_breadcrumb_container\">
                    <div id=\"breadcrumbs\">
                        <span class=\"\">
                            <a href=\"#\" target=\"_self\">Home</a>
                        </span>
                        <i class=\"fa fa-angle-right\"></i>
                        <span class=\"\">
                            <a href=\"\" target=\"_self\">Category</a>
                        </span>
                        <i class=\"fa fa-angle-right\"></i>
                        <span class=\"breadcrumb_last_link\">
                            <a href=\"#\" target=\"_self\">Child Category</a>
                        </span>
                    </div>            
                </div>
            </div>";
	}

	public function render_module_front( $attr, $column_class ) {

		$breadcrumb = '';
		$style      = $this->generate_style( $attr );

		if ( is_author() ) {
			$user       = get_userdata( get_query_var( 'author' ) );
			$breadcrumb = $this->build_breadcrumb( $user->ID );
		} else {
			$term = $this->get_term();
			if ( isset( $term->term_id ) ) {
				$breadcrumb = $this->build_breadcrumb( $term->term_id );
			}
		}

		return
			"<div {$this->element_id($attr)} class='jeg_archive_breadcrumb_wrapper {$attr['scheme']} {$attr['el_class']}'>
				{$style}
                <h2 class=\"jeg_archive_description\">{$breadcrumb}</h2>
            </div>";
	}

	public function build_breadcrumb( $id ) {

		$breadcrumb   = array();
		$breadcrumb[] = $this->breadcrumb_text( esc_url( home_url( '/' ) ), esc_html__( 'Home', 'jnews' ) );

		if ( is_author() ) {
			$breadcrumb[] = $this->breadcrumb_text( '', esc_html__( 'Author', 'jnews' ) );
			$breadcrumb[] = $this->breadcrumb_text( '', get_the_author_meta( 'display_name', $id ), $this->last_link_class );
		} else {
			if ( is_category() ) {
				$breadcrumb[] = $this->breadcrumb_text( '', esc_html__( 'Category', 'jnews' ) );
			} elseif ( is_tag() ) {
				$breadcrumb[] = $this->breadcrumb_text( '', esc_html__( 'Tag', 'jnews' ) );
			}

			$this->recursive_category( $id, $breadcrumb, true );
		}

		$breadcrumb = implode( "<i class=\"fa fa-angle-right\"></i>", $breadcrumb );
		$breadcrumb = "<div id=\"breadcrumbs\">$breadcrumb</div>";

		return apply_filters( 'jnews_native_breadcrumb_category', $breadcrumb, $id );
	}

	public function breadcrumb_text( $url, $title, $class = null ) {

		return
			"<span class=\"{$class}\">
                <a href=\"{$url}\">{$title}</a>
            </span>";
	}

	public function recursive_category( $category, &$breadcrumb, $islast = false ) {

		if ( $category ) {

			$cat = get_term( $category );

			if ( $cat->parent ) {
				$this->recursive_category( $cat->parent, $breadcrumb );
			}

			$class = $islast ? $this->last_link_class : "";

			$breadcrumb[] = $this->breadcrumb_text( get_category_link( $cat->term_id ), $cat->name, $class );
		}
	}

	public function generate_style( $attr ) {

		$result = '';

		if ( isset( $attr['text_color'] ) && $attr['text_color'] ) {
			$result .= $this->element_id( $attr ) . ' .jeg_breadcrumbs span a{color:' . $attr['text_color'] . '}';
		}

		if ( isset( $attr['text_color_hover'] ) && $attr['text_color_hover'] ) {
			$result .= $this->element_id( $attr ) . ' .jeg_breadcrumbs span a:hover{color:' . $attr['text_color_hover'] . '}';
		}

		if ( isset( $attr['arrow_color'] ) && $attr['arrow_color'] ) {
			$result .= $this->element_id( $attr ) . ' .jeg_breadcrumbs i{color:' . $attr['arrow_color'] . '}';
		}

		if ( isset( $attr['font_size'] ) && $attr['font_size'] ) {
			$result .= $this->element_id( $attr ) . ' .jeg_breadcrumbs span a,' . $this->element_id( $attr ) . ' .jeg_breadcrumbs i{font-size:' . $attr['font_size'] . '}';
		}

		if ( $result ) {
			$result = '<style>' . $result . '</style>';
		}

		return $result;
	}
}
