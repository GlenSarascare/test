<?php
/**
 * @author Jegtheme
 */

namespace JNews\Archive\Builder;

use Jeg\Form\Form_Archive;

abstract class OptionAbstract {

	protected static $instance;

	protected $prefix;

	public static function getInstance() {
		$class = get_called_class();

		if ( ! isset( self::$instance[ $class ] ) ) {
			static::$instance[ $class ] = new $class();
		}

		return static::$instance[ $class ];
	}

	private function __construct() {
		$this->setup_hook();
	}

	public function render_options( $tag ) {
		$id = $this->get_id( $tag );

		if ( null !== $id ) {
			$segments = $this->prepare_segments();
			$fields   = $this->prepare_fields( $id );
			$id       = 'archive-' . $id;

			if ( class_exists( 'Jeg\Form\Form_Archive' ) ) {
				Form_Archive::render_form($id, $segments, $fields);
			}
		}
	}

	public function prepare_fields( $term_id ) {
		$setting = array();
		$fields  = $this->get_options();

		foreach ( $fields as $key => $field ) {
			$setting[ $key ]                = array();
			$setting[ $key ]['id']          = $key;
			$setting[ $key ]['fieldID']     = $key . '_' . $term_id;
			$setting[ $key ]['fieldName']   = $key;
			$setting[ $key ]['type']        = $field['type'];
			$setting[ $key ]['title']       = isset( $field['title'] ) ? $field['title'] : '';
			$setting[ $key ]['description'] = isset( $field['desc'] ) ? $field['desc'] : '';
			$setting[ $key ]['segment']     = isset( $field['segment'] ) ? sanitize_title_with_dashes( $field['segment'] ) : '';
			$setting[ $key ]['default']     = isset( $field['default'] ) ? $field['default'] : '';
			$setting[ $key ]['priority']    = isset( $field['priority'] ) ? $field['priority'] : 10;
			$setting[ $key ]['options']     = isset( $field['options'] ) ? $field['options'] : array();
			$setting[ $key ]['dependency']  = isset( $field['dependency'] ) ? $field['dependency'] : array();
			$setting[ $key ]['multiple']    = isset( $field['multiple'] ) ? $field['multiple'] : 1;
			$setting[ $key ]['ajax']        = isset( $field['ajax'] ) ? $field['ajax'] : '';
			$setting[ $key ]['nonce']       = isset( $field['nonce'] ) ? $field['nonce'] : '';
			$setting[ $key ]['fields']      = isset( $field['fields'] ) ? $field['fields'] : array();
			$setting[ $key ]['row_label']   = isset( $field['row_label'] ) ? $field['row_label'] : array();

			$setting[ $key ]['value'] = $this->get_value( $key, $term_id, $setting[ $key ]['default'] );

			// only for image type
			if ( 'image' === $setting[ $key ]['type'] ) {
				$image = wp_get_attachment_image_src( $setting[ $key ]['value'], 'full' );
				if ( isset( $image[0] ) ) {
					$setting[ $key ]['imageUrl'] = $image[0];
				}
			}
		}

		return $setting;
	}

	public function get_value( $key, $term_id, $default ) {
		$value = get_option( $this->prefix . $key, false );

		if ( isset( $value[ $term_id ] ) ) {
			return $value[ $term_id ];
		} else {
			return $default;
		}
	}

	protected function save_value( $key, $term_id, $value ) {
		$values = get_option( $this->prefix . $key, array() );
		$values[ $term_id ] = $value;
		update_option( $this->prefix . $key, $values );
	}

	protected function do_save($options, $input) {
		foreach ( $options as $key => $field ) {
			if ( isset( $field['items'] ) ) {
				foreach ( $field['items'] as $key1 => $value1 ) {
					$option = isset( $_POST[ $key1 ] ) ? $_POST[ $key1 ] : false;
					$this->save_value( $key1, $input, $option );
				}
			} else {
				$option = isset( $_POST[ $key ] ) ? $_POST[ $key ] : false;
				$this->save_value( $key, $input, $option );
			}
		}
	}

	abstract protected function get_options();

	abstract protected function setup_hook();

	abstract protected function prepare_segments();

	abstract protected function get_id( $tag );
}
