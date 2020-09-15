<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Widget\Module;

use JNews\Module\ModuleOptionAbstract;
use JNews\Module\ModuleViewAbstract;
use JNews\Widget\WidgetAbstract;
use Jeg\Form\Form_Widget;

abstract class WidgetModuleAbstract extends WidgetAbstract {
	/**
	 * @var String
	 */
	protected $option_class;

	/**
	 * @var String
	 */
	protected $view_class;

	/**
	 * @var ModuleOptionAbstract
	 */
	protected $option_instance;

	/**
	 * @var ModuleViewAbstract
	 */
	protected $view_instance;

	protected $group = array();

	public function __construct() {
		$base_name = $this->get_base_name();

		if ( is_admin() ) {
			$instance = $this->get_option_instance();
			parent::__construct( $base_name, $instance->get_module_name(), array(
				'description' => $instance->get_module_name()
			) );
		} else {
			parent::__construct( $base_name, null, null );
		}
	}

	public function get_base_name() {
		$base_name = str_replace( '_Widget', '', get_class( $this ) );
		$base_name = str_replace( 'JNews', 'JNews_Module', $base_name );

		return strtolower( $base_name );
	}

	public function get_option_instance() {
		if ( ! $this->option_instance ) {
			$this->option_instance = call_user_func( array( $this->get_module_option_class(), 'getInstance' ) );
		}

		return $this->option_instance;
	}

	public function get_view_instance() {
		if ( ! $this->view_instance ) {
		    $mod = $this->get_module_view_class();
			do_action('jnews_build_shortcode_' . strtolower($mod));
			$this->view_instance = call_user_func( array( $mod, 'getInstance' ) );
		}

		return $this->view_instance;
	}

	public function form( $instance ) {
        if ( ! is_customize_preview() ) {
            $id = $this->get_field_id('widget_news_element');
            $options = $this->option_instance->get_options();
            $segments = $this->prepare_segments($options);
            $fields = $this->prepare_fields($instance, $options);

            $this->compatible_column();
            if ( class_exists( 'Jeg\Form\Form_Widget' ) ) {
            	Form_Widget::render_form($id, $segments, $fields);	
            }
        }
	}

	public function prepare_segments( $options ) {
		$segments = array();
		$priority = 1;

		foreach ( $options as $option ) {
			if ( ! isset( $option['group'] ) || empty( $option['group'] ) ) {
				$option['group'] = $this->get_default_group();
			}

			$id = sanitize_title_with_dashes( $option['group'] );

			if ( ! isset( $segments[ $id ] ) ) {
				$segments[ $id ] = array(
					'id'       => $id,
					'type'     => 'widget',
					'name'     => $option['group'],
					'priority' => $priority ++,
				);
			}
		}

		return $segments;
	}

	/**
	 * Prepare option to be loaded on Widget
	 *
     * @param array $instance
     * @param array $fields
	 *
	 * @return mixed
	 */
	public function prepare_fields( $instance, $fields ) {
		$setting = array();

		foreach ( $fields as $key => $field ) {
			if ( $field['param_name'] === 'compatible_column_notice' ) {
				continue;
			}

			$setting[ $key ]              = array();
			$setting[ $key ]['id']        = $field['param_name'];
			$setting[ $key ]['fieldID']   = $this->get_field_id( $field['param_name'] );
			$setting[ $key ]['fieldName'] = $this->get_field_name( $field['param_name'] );
			$setting[ $key ]['type']      = $this->convert_type( $field['type'] );

			$setting[ $key ]['title']       = isset( $field['heading'] ) ? $field['heading'] : '';
			$setting[ $key ]['description'] = isset( $field['description'] ) ? $field['description'] : '';
			$setting[ $key ]['segment']     = isset( $field['group'] ) ? sanitize_title_with_dashes( $field['group'] ) : sanitize_title_with_dashes( $this->get_default_group() );
			$setting[ $key ]['default']     = isset( $field['std'] ) ? $field['std'] : '';
			$setting[ $key ]['priority']    = isset( $field['priority'] ) ? $field['priority'] : 10;
			$setting[ $key ]['options']     = isset( $field['value'] ) ? array_flip( $field['value'] ) : array();

			if ( $field['type'] === 'slider' || $field['type'] === 'number' ) {
				$setting[ $key ]['options'] = array(
					'min'  => $field['min'],
					'max'  => $field['max'],
					'step' => $field['step'],
				);
			}

			if ( 'select' === $field['type'] ) {
				if ( isset( $field['value'] ) ) {
					$setting[ $key ]['options'] = array_flip( $field['value'] );
				}
				if ( isset( $field['options'] ) ) {
					$value                      = isset( $instance[ $field['param_name'] ] ) ? $instance[ $field['param_name'] ] : null;
					$setting[ $key ]['options'] = call_user_func_array( $field['options'], array( $value ) );
				}
			}

			if ( isset( $field['dependency'] ) ) {
				if ( is_array( $field['dependency'] ) ) {
					$setting[ $key ]['dependency'] = array(
						array(
							'field'    => $field['dependency']['element'],
							'operator' => 'in',
							'value'    => $field['dependency']['value']
						)
					);
				}

				if ( 'true' === $field['dependency']['value'] || 'false' === $field['dependency']['value'] ) {
					$setting[ $key ]['dependency'] = array(
						array(
							'field'    => $field['dependency']['element'],
							'operator' => '==',
							'value'    => $field['dependency']['value'] ? true : false,
						)
					);
				}
			}

			$setting[ $key ]['multiple']  = isset( $field['multiple'] ) ? $field['multiple'] : 1;
			$setting[ $key ]['ajax']      = isset( $field['ajax'] ) ? $field['ajax'] : '';
			$setting[ $key ]['nonce']     = isset( $field['nonce'] ) ? $field['nonce'] : '';
			$setting[ $key ]['value']     = $this->get_value( $field['param_name'], $instance, $setting[ $key ]['default'] );
			$setting[ $key ]['fields']    = isset( $field['fields'] ) ? $field['fields'] : array();
			$setting[ $key ]['row_label'] = isset( $field['row_label'] ) ? $field['row_label'] : array();


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

	public function convert_type( $type ) {
		if ( $type === 'textfield' ) {
			return 'text';
		}

		if ( $type === 'colorpicker' ) {
			return 'color';
		}

		if ( $type === 'dropdown' ) {
			return 'select';
		}

		if ( $type === 'textarea_html' ) {
			return 'textarea';
		}

		if ( $type === 'attach_image' ) {
			return 'image';
		}

		return $type;
	}

	public function compatible_column() {
		?>
        <div class="alert-element alert-info" style='margin-top: 15px;'>
            <strong>Compatible
                Column: <?php echo esc_html( implode( ', ', $this->option_instance->compatible_column() ) ); ?></strong>
            <div class="alert-description"><?php esc_html_e( 'Please check style / design tab to change Module / Block width and make it fit with your current column width', 'jnews' ) ?></div>
        </div>
		<?php
	}

	/**
	 * Get related module class name
	 *
	 * @return mixed
	 */
	public function get_module_option_class() {
		$module_class = get_class( $this );
		$module_name  = str_replace( '_Widget', '', $module_class );

		return jnews_get_option_class_from_shortcode( $module_name );
	}

	public function get_module_view_class() {
		$module_class = get_class( $this );
		$module_name  = str_replace( '_Widget', '', $module_class );

		return jnews_get_view_class_from_shortcode( $module_name );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : "" );

		echo jnews_sanitize_output( $args['before_widget'] );

		if ( ! empty( $title ) ) {
			echo jnews_sanitize_output( $args['before_title'] ) . esc_html( $title ) . jnews_sanitize_output( $args['after_title'] );
		}

		$widget_instance = $this->get_view_instance();
		$widget_instance->render_widget( $instance );

		echo jnews_sanitize_output( $args['after_widget'] );
	}

	/**
	 * Get menu default value
	 *
	 * @param string $id Key of field option.
	 * @param array $value Array of value.
	 * @param mixed $default Default value for this item.
	 *
	 * @return mixed
	 */
	public function get_value( $id, $value, $default ) {
		if ( isset( $value[ $id ] ) ) {
			return $value[ $id ];
		} else {
			return $default;
		}
	}
}
