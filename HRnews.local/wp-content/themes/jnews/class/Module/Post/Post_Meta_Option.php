<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Post;

use JNews\Module\ModuleOptionAbstract;

Class Post_Meta_Option extends ModuleOptionAbstract {
	public function get_category() {
		return esc_html__( 'JNews - Post', 'jnews' );
	}

	public function compatible_column() {
		return array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );
	}

	public function get_module_name() {
		return esc_html__( 'JNews - Post Meta', 'jnews' );
	}

	public function set_options() {
		$this->set_post_option();
		$this->set_style_option();
	}

	public function set_post_option() {
		$this->options[] = array(
			'type'        => 'select',
            'multiple'    => PHP_INT_MAX,
			'param_name'  => 'meta_left',
			'heading'     => esc_html__( 'Left Meta Element', 'jnews' ),
			'description' => esc_html__( 'Pick element you want to add on meta wrapper.', 'jnews' ),
			'group'       => esc_html__( 'Meta Option', 'jnews' ),
			'std'         => '',
			'value'       => array(
				esc_html__( 'Author', 'jnews' )       => 'author',
				esc_html__( 'Date', 'jnews' )         => 'date',
				esc_html__( 'Category', 'jnews' )     => 'category',
				esc_html__( 'Comment', 'jnews' )      => 'comment',
				esc_html__( 'Like Button', 'jnews' )  => 'like',
				esc_html__( 'Zoom Button', 'jnews' )  => 'zoom',
				esc_html__( 'Trending', 'jnews' )     => 'trending',
				esc_html__( 'Reading Time', 'jnews' ) => 'reading_time'
			)
		);

		$this->options[] = array(
			'type'        => 'select',
            'multiple'    => PHP_INT_MAX,
			'param_name'  => 'meta_right',
			'heading'     => esc_html__( 'Right Meta Element', 'jnews' ),
			'description' => esc_html__( 'Pick element you want to add on meta wrapper.', 'jnews' ),
			'group'       => esc_html__( 'Meta Option', 'jnews' ),
			'std'         => '',
			'value'       => array(
				esc_html__( 'Author', 'jnews' )       => 'author',
				esc_html__( 'Date', 'jnews' )         => 'date',
				esc_html__( 'Category', 'jnews' )     => 'category',
				esc_html__( 'Comment', 'jnews' )      => 'comment',
				esc_html__( 'Like Button', 'jnews' )  => 'like',
				esc_html__( 'Zoom Button', 'jnews' )  => 'zoom',
				esc_html__( 'Trending', 'jnews' )     => 'trending',
				esc_html__( 'Reading Time', 'jnews' ) => 'reading_time'
			)
		);

		$this->options[] = array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Show avatar image on author element', 'jnews' ),
			'param_name' => 'show_avatar',
			'group'      => esc_html__( 'Meta Option', 'jnews' ),
			'value'      => array( esc_html__( "Show avatar image.", 'jnews' ) => 'yes' ),
			'std'        => 'yes',
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'post_date',
			'heading'     => esc_html__( 'Post Date', 'jnews' ),
			'description' => esc_html__( 'Choose which post date type that you want to show.', 'jnews' ),
			'group'       => esc_html__( 'Meta Option', 'jnews' ),
			'std'         => 'modified',
			'value'       => array(
				esc_html__( 'Modified Date', 'jnews' )  => 'modified',
				esc_html__( 'Published Date', 'jnews' ) => 'publish',
			)
		);
	}

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'meta_typography',
				'label'    => esc_html__( 'Typography', 'jnews' ),
				'selector' => '{{WRAPPER}} .jeg_post_meta, {{WRAPPER}} .jeg_post_meta .fa, {{WRAPPER}}.jeg_postblock .jeg_subcat_list > li > a:hover, {{WRAPPER}} .jeg_pl_md_card .jeg_post_category a, {{WRAPPER}}.jeg_postblock .jeg_subcat_list > li > a.current, {{WRAPPER}} .jeg_pl_md_5 .jeg_post_meta, {{WRAPPER}} .jeg_pl_md_5 .jeg_post_meta .fa, {{WRAPPER}} .jeg_post_category a',
			]
		);
	}
}
