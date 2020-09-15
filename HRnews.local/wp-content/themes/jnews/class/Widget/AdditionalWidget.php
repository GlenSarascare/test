<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Widget;

use Jeg\Form\Form_Widget;

Class AdditionalWidget {
	/**
	 * @var AdditionalWidget
	 */
	private static $instance;

	/**
	 * @return AdditionalWidget
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {
		if ( is_admin() ) {
			if ( ! is_customize_preview() ) {
				add_action( 'in_widget_form', array( $this, 'additional_form' ), null, 3 );
			}
			add_filter( 'widget_update_callback', array( $this, 'update_widget_form' ), 99, 2 );
		}
	}

	// Return new instance instead older instance
	function update_widget_form( $instance, $new_instance ) {
		if ( class_exists( 'Jetpack' ) && \Jetpack::is_module_active( 'widget-visibility' ) || defined( 'POLYLANG_VERSION' ) || defined( 'ICL_SITEPRESS_VERSION' ) ) {
			return array_merge( $instance, $new_instance );
		}

		return $new_instance;
	}

	public function unique_id() {
		return uniqid();
	}

	/**
	 * @param $t \WP_Widget
	 * @param $return
	 * @param $instance
	 */
	public function additional_form( $t, $return, $instance ) {
		// generator nya disini
		if ( strpos( $t->id_base, 'jnews_' ) === false ) {
			$id       = $t->get_field_id( 'widget_news_element' );
			$segments = $this->prepare_segments();
			$fields   = $this->prepare_fields( $t, $instance );

			if ( class_exists( 'Jeg\Form\Form_Widget' ) ) {
				Form_Widget::render_form( $id, $segments, $fields );	
			}
		}
	}

	public function prepare_fields( $t, $instance ) {
		$setting = array();
		$fields  = $this->header_form();

		foreach ( $fields as $field ) {
			foreach ( $field as $key => $item ) {
				$setting[ $key ]                = array();
				$setting[ $key ]['id']          = $key;
				$setting[ $key ]['fieldID']     = $t->get_field_id( $key );
				$setting[ $key ]['fieldName']   = $t->get_field_name( $key );
				$setting[ $key ]['type']        = $item['type'];
				$setting[ $key ]['title']       = isset( $item['title'] ) ? $item['title'] : '';
				$setting[ $key ]['description'] = isset( $item['desc'] ) ? $item['desc'] : '';
				$setting[ $key ]['segment']     = isset( $item['group'] ) ? sanitize_title_with_dashes( $item['group'] ) : '';
				$setting[ $key ]['default']     = isset( $item['default'] ) ? $item['default'] : '';
				$setting[ $key ]['priority']    = isset( $item['priority'] ) ? $item['priority'] : 10;
				$setting[ $key ]['options']     = isset( $item['options'] ) ? $item['options'] : array();
				$setting[ $key ]['multiple']    = isset( $item['multiple'] ) ? $item['multiple'] : 1;
				$setting[ $key ]['ajax']        = isset( $item['ajax'] ) ? $item['ajax'] : '';
				$setting[ $key ]['nonce']       = isset( $item['nonce'] ) ? $item['nonce'] : '';
				$setting[ $key ]['value']       = $this->get_value( $key, $instance, $setting[ $key ]['default'] );
				$setting[ $key ]['fields']      = isset( $item['fields'] ) ? $item['fields'] : array();
				$setting[ $key ]['row_label']   = isset( $item['row_label'] ) ? $item['row_label'] : array();
				$setting[ $key ]['dependency']  = isset( $item['dependency'] ) ? $item['dependency'] : '';
			}
		}

		return $setting;
	}

	public function prepare_segments() {
		$segments = array();
		$priority = 1;
		$options  = $this->header_form();

		foreach ( $options as $key => $item ) {
			$id = sanitize_title_with_dashes( $key );

			if ( ! isset( $segments[ $id ] ) ) {
				$segments[ $id ] = array(
					'id'       => $id,
					'type'     => 'default',
					'name'     => $key,
					'priority' => $priority ++,
				);
			}
		}

		return $segments;
	}

	public function get_value( $id, $value, $default ) {
		if ( isset( $value[ $id ] ) ) {
			return $value[ $id ];
		} else {
			return $default;
		}
	}

	public function header_form() {
		return array(
			esc_html__( 'Header Settings', 'jnews' )   => array(
				'second_title' => array(
					'type'    => 'text',
					'title'   => esc_html__( 'Second Title', 'jnews' ),
					'desc'    => esc_html__( 'Secondary title of Widget.', 'jnews' ),
					'default' => '',
					'options' => '',
					'name'    => 'second_title',
					'group'   => 'header-settings'
				),

				'header_url' => array(
					'type'    => 'text',
					'title'   => esc_html__( 'Title URL', 'jnews' ),
					'desc'    => esc_html__( 'Insert URL for heading title.', 'jnews' ),
					'default' => '',
					'options' => '',
					'name'    => 'header_url',
					'group'   => 'header-settings'
				),

				'header_type' => array(
					'type'    => 'radioimage',
					'title'   => esc_html__( 'Header Type', 'jnews' ),
					'desc'    => esc_html__( 'Choose which header type fit with your content design.', 'jnews' ),
					'default' => 'heading_6',
					'options' => array(
						'heading_1' => JNEWS_THEME_URL . '/assets/img/admin/heading-1.png',
						'heading_2' => JNEWS_THEME_URL . '/assets/img/admin/heading-2.png',
						'heading_3' => JNEWS_THEME_URL . '/assets/img/admin/heading-3.png',
						'heading_4' => JNEWS_THEME_URL . '/assets/img/admin/heading-4.png',
						'heading_5' => JNEWS_THEME_URL . '/assets/img/admin/heading-5.png',
						'heading_6' => JNEWS_THEME_URL . '/assets/img/admin/heading-6.png',
						'heading_7' => JNEWS_THEME_URL . '/assets/img/admin/heading-7.png',
						'heading_8' => JNEWS_THEME_URL . '/assets/img/admin/heading-8.png',
						'heading_9' => JNEWS_THEME_URL . '/assets/img/admin/heading-9.png',
					),
					'name'    => 'header_type',
					'group'   => 'header-settings'
				),

				'header_background' => array(
					'type'    => 'color',
					'title'   => esc_html__( 'Header Background', 'jnews' ),
					'desc'    => esc_html__( 'This option may not work for all of heading type.', 'jnews' ),
					'default' => '',
					'options' => '',
					'name'    => 'header_background',
					'group'   => 'header-settings'
				),

				'header_text_color' => array(
					'type'    => 'color',
					'title'   => esc_html__( 'Header Text Color', 'jnews' ),
					'desc'    => esc_html__( 'This option may not work for all of heading type.', 'jnews' ),
					'default' => '',
					'options' => '',
					'name'    => 'header_text_color',
					'group'   => 'header-settings'
				)
			),
			esc_html__( 'Advanced Settings', 'jnews' ) => array(
				'widget_boxed'  => array(
					'type'    => 'checkbox',
					'title'   => esc_html__( 'Enable Boxed', 'jnews' ),
					'desc'    => esc_html__( 'Enable boxed for this widget.', 'jnews' ),
					'default' => false,
					'name'    => 'widget_boxed',
					'group'   => 'advanced-settings'
				),
				'widget_shadow' => array(
					'type'       => 'checkbox',
					'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
					'desc'       => esc_html__( 'Enable shadow for this widget.', 'jnews' ),
					'default'    => false,
					'name'       => 'widget_shadow',
					'dependency' => array(
						array(
							'field'    => 'widget_boxed',
							'operator' => '==',
							'value'    => true
						),
					),
					'group'      => 'advanced-settings'
				),
				'widget_class'  => array(
					'type'    => 'text',
					'title'   => esc_html__( 'Extra class name', 'jnews' ),
					'desc'    => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'jnews' ),
					'default' => '',
					'options' => '',
					'name'    => 'widget_class',
					'group'   => 'advanced-settings'
				),
			)
		);
	}
}

