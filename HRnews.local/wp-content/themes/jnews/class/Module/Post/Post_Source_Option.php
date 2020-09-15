<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Post;

use JNews\Module\ModuleOptionAbstract;

Class Post_Source_Option extends ModuleOptionAbstract {

	public function get_category() {
		return esc_html__( 'JNews - Post', 'jnews' );
	}

	public function compatible_column() {
		return array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );
	}

	public function get_module_name() {
		return esc_html__( 'JNews - Source and Via', 'jnews' );
	}

	public function set_options() {
		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'source_via',
			'heading'     => esc_html__( 'Source & Via', 'jnews' ),
			'description' => esc_html__( 'Choose which info that you want to show.', 'jnews' ),
			'std'         => 'source',
			'value'       => array(
				esc_html__( 'Show Source Content', 'jnews' ) => 'source',
				esc_html__( 'Show Via Content', 'jnews' ) => 'via',
			),
		);

		$this->set_style_option();
	}
}
