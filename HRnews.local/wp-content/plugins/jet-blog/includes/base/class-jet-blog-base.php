<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

abstract class Jet_Blog_Base extends Widget_Base {

	public $_context          = 'render';
	public $_processed_item   = false;
	public $_processed_index  = 0;
	public $_query            = array();
	public $_load_level       = 100;
	public $_include_controls = array();
	public $_exclude_controls = array();
	public $_new_icon_prefix  = 'selected_';

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		$this->_load_level = (int) jet_blog_settings()->get( 'widgets_load_level', 100 );

		$widget_name = $this->get_name();

		$this->_include_controls = apply_filters( "jet-blog/editor/{$widget_name}/include-controls", array(), $widget_name, $this );
		$this->_exclude_controls = apply_filters( "jet-blog/editor/{$widget_name}/exclude-controls", array(), $widget_name, $this );
	}

	public function get_jet_help_url() {
		return false;
	}

	public function get_help_url() {

		$url = $this->get_jet_help_url();

		if ( ! empty( $url ) ) {
			return add_query_arg(
				array(
					'utm_source'   => 'jetblog',
					'utm_medium'   => $this->get_name(),
					'utm_campaign' => 'need-help',
				),
				esc_url( $url )
			);
		}

		return false;
	}

	public function render_macros( $str ) {

		$macros_list = array(
			'/%current_id%/' => get_the_ID(),
		);

		return preg_replace( array_keys( $macros_list ), array_values( $macros_list ), $str );
	}

	/**
	 * Get globaly affected template
	 *
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function _get_global_template( $name = null ) {

		$template = call_user_func( array( $this, sprintf( '_get_%s_template', $this->_context ) ), $name );

		if ( ! $template ) {
			$template = jet_blog()->get_template( $this->get_name() . '/global/' . $name . '.php' );
		}

		return $template;
	}

	/**
	 * Get front-end template
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function _get_render_template( $name = null ) {
		return jet_blog()->get_template( $this->get_name() . '/render/' . $name . '.php' );
	}

	/**
	 * Get editor template
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function _get_edit_template( $name = null ) {
		return jet_blog()->get_template( $this->get_name() . '/edit/' . $name . '.php' );
	}

	/**
	 * Get global looped template for settings
	 * Required only to process repeater settings.
	 *
	 * @param  string $name    Base template name.
	 * @param  string $setting Repeater setting that provide data for template.
	 * @return void
	 */
	public function _get_global_looped_template( $name = null, $setting = null ) {

		$templates = array(
			'start' => $this->_get_global_template( $name . '-loop-start' ),
			'loop'  => $this->_get_global_template( $name . '-loop-item' ),
			'end'   => $this->_get_global_template( $name . '-loop-end' ),
		);

		call_user_func(
			array( $this, sprintf( '_get_%s_looped_template', $this->_context ) ), $templates, $setting
		);

	}

	/**
	 * Get render mode looped template
	 *
	 * @param  array  $templates [description]
	 * @param  [type] $setting   [description]
	 * @return [type]            [description]
	 */
	public function _get_render_looped_template( $templates = array(), $setting = null ) {

		$loop = $this->get_settings( $setting );

		if ( empty( $loop ) ) {
			return;
		}

		if ( ! empty( $templates['start'] ) ) {
			include $templates['start'];
		}

		foreach ( $loop as $item ) {

			$this->_processed_item = $item;
			if ( ! empty( $templates['start'] ) ) {
				include $templates['loop'];
			}
			$this->_processed_index++;
		}

		$this->_processed_item = false;
		$this->_processed_index = 0;

		if ( ! empty( $templates['end'] ) ) {
			include $templates['end'];
		}

	}

	/**
	 * Get edit mode looped template
	 *
	 * @param  array  $templates [description]
	 * @param  [type] $setting   [description]
	 * @return [type]            [description]
	 */
	public function _get_edit_looped_template( $templates = array(), $setting = null ) {
		?>
		<# if ( settings.<?php echo $setting; ?> ) { #>
		<?php
			if ( ! empty( $templates['start'] ) ) {
				include $templates['start'];
			}
		?>
			<# _.each( settings.<?php echo $setting; ?>, function( item ) { #>
			<?php
				if ( ! empty( $templates['loop'] ) ) {
					include $templates['loop'];
				}
			?>
			<# } ); #>
		<?php
			if ( ! empty( $templates['end'] ) ) {
				include $templates['end'];
			}
		?>
		<# } #>
		<?php
	}

	/**
	 * Get current looped item dependends from context.
	 *
	 * @param  string $key Key to get from processed item
	 * @return mixed
	 */
	public function _loop_item( $keys = array(), $format = '%s' ) {

		return call_user_func( array( $this, sprintf( '_%s_loop_item', $this->_context ) ), $keys, $format );

	}

	/**
	 * Loop edit item
	 *
	 * @param  [type]  $keys       [description]
	 * @param  string  $format     [description]
	 * @param  boolean $nested_key [description]
	 * @return [type]              [description]
	 */
	public function _edit_loop_item( $keys = array(), $format = '%s' ) {

		$settings = $keys[0];

		if ( isset( $keys[1] ) ) {
			$settings .= '.' . $keys[1];
		}

		ob_start();

		echo '<# if ( item.' . $settings . ' ) { #>';
		printf( $format, '{{{ item.' . $settings . ' }}}' );
		echo '<# } #>';

		return ob_get_clean();
	}

	/**
	 * Loop render item
	 *
	 * @param  string  $format     [description]
	 * @param  [type]  $key        [description]
	 * @param  boolean $nested_key [description]
	 * @return [type]              [description]
	 */
	public function _render_loop_item( $keys = array(), $format = '%s' ) {

		$item = $this->_processed_item;

		$key        = $keys[0];
		$nested_key = isset( $keys[1] ) ? $keys[1] : false;

		if ( empty( $item ) || ! isset( $item[ $key ] ) ) {
			return false;
		}

		if ( false === $nested_key || ! is_array( $item[ $key ] ) ) {
			$value = $item[ $key ];
		} else {
			$value = isset( $item[ $key ][ $nested_key ] ) ? $item[ $key ][ $nested_key ] : false;
		}

		if ( ! empty( $value ) ) {
			return sprintf( $format, $value );
		}

	}

	/**
	 * Include global template if any of passed settings is defined
	 *
	 * @param  [type] $name     [description]
	 * @param  [type] $settings [description]
	 * @return [type]           [description]
	 */
	public function _glob_inc_if( $name = null, $settings = array() ) {

		$template = $this->_get_global_template( $name );

		call_user_func( array( $this, sprintf( '_%s_inc_if', $this->_context ) ), $template, $settings );

	}

	/**
	 * Include render template if any of passed setting is not empty
	 *
	 * @param  [type] $file     [description]
	 * @param  [type] $settings [description]
	 * @return [type]           [description]
	 */
	public function _render_inc_if( $file = null, $settings = array() ) {

		foreach ( $settings as $setting ) {
			$val = $this->get_settings( $setting );

			if ( ! empty( $val ) ) {
				include $file;
				return;
			}

		}

	}

	/**
	 * Include render template if any of passed setting is not empty
	 *
	 * @param  [type] $file     [description]
	 * @param  [type] $settings [description]
	 * @return [type]           [description]
	 */
	public function _edit_inc_if( $file = null, $settings = array() ) {

		$condition = null;
		$sep       = null;

		foreach ( $settings as $setting ) {
			$condition .= $sep . 'settings.' . $setting;
			$sep = ' || ';
		}

		?>

		<# if ( <?php echo $condition; ?> ) { #>

			<?php include $file; ?>

		<# } #>

		<?php
	}

	/**
	 * Open standard wrapper
	 *
	 * @return void
	 */
	public function _open_wrap() {
		printf( '<div class="elementor-%s jet-blog">', $this->get_name() );
	}

	/**
	 * Close standard wrapper
	 *
	 * @return void
	 */
	public function _close_wrap() {
		echo '</div>';
	}

	/**
	 * Print HTML markup if passed setting not empty.
	 *
	 * @param  string $setting Passed setting.
	 * @param  string $format  Required markup.
	 * @param  array  $args    Additional variables to pass into format string.
	 * @param  bool   $echo    Echo or return.
	 * @return string|void
	 */
	public function _html( $setting = null, $format = '%s' ) {

		call_user_func( array( $this, sprintf( '_%s_html', $this->_context ) ), $setting, $format );

	}

	/**
	 * Returns HTML markup if passed setting not empty.
	 *
	 * @param  string $setting Passed setting.
	 * @param  string $format  Required markup.
	 * @param  array  $args    Additional variables to pass into format string.
	 * @param  bool   $echo    Echo or return.
	 * @return string|void
	 */
	public function _get_html( $setting = null, $format = '%s' ) {

		ob_start();
		$this->_html( $setting, $format );
		return ob_get_clean();

	}

	/**
	 * Print HTML template
	 *
	 * @param  [type] $setting [description]
	 * @param  [type] $format  [description]
	 * @return [type]          [description]
	 */
	public function _render_html( $setting = null, $format = '%s' ) {

		if ( is_array( $setting ) ) {
			$key     = $setting[1];
			$setting = $setting[0];
		}

		$val = $this->get_settings( $setting );

		if ( ! is_array( $val ) && '0' === $val ) {
			printf( $format, $val );
		}

		if ( is_array( $val ) && empty( $val[ $key ] ) ) {
			return '';
		}

		if ( ! is_array( $val ) && empty( $val ) ) {
			return '';
		}

		if ( is_array( $val ) ) {
			printf( $format, $val[ $key ] );
		} else {
			printf( $format, $val );
		}

	}

	/**
	 * Render meta for passed position
	 *
	 * @param string $position
	 * @param string $base
	 * @param array  $context
	 * @param array  $settings
	 *
	 * @return void
	 */
	public function _render_meta( $position = '', $base = '', $context = array( 'before' ), $settings = array() ) {

		$settings      = ! empty( $settings ) ? $settings : $this->get_settings();
		$config_key    = $position . '_meta';
		$show_key      = 'show_' . $position . '_meta';
		$position_key  = 'meta_' . $position . '_position';
		$meta_show     = ! empty( $settings[ $show_key ] ) ? $settings[ $show_key ] : false;
		$meta_position = ! empty( $settings[ $position_key ] ) ? $settings[ $position_key ] : false;
		$meta_config   = ! empty( $settings[ $config_key ] ) ? $settings[ $config_key ] : false;

		if ( 'yes' !== $meta_show ) {
			return;
		}

		if ( ! $meta_position || ! in_array( $meta_position, $context ) ) {
			return;
		}

		if ( empty( $meta_config ) ) {
			return;
		}

		$result = '';

		foreach ( $meta_config as $meta ) {

			if ( empty( $meta['meta_key'] ) ) {
				continue;
			}

			$key      = $meta['meta_key'];
			$callback = ! empty( $meta['meta_callback'] ) ? $meta['meta_callback'] : false;
			$value    = get_post_meta( get_the_ID(), $key, false );

			if ( ! $value ) {
				continue;
			}

			$callback_args = array( $value[0] );

			if ( $callback ) {

				switch ( $callback ) {

					case 'wp_get_attachment_image':

						$callback_args[] = 'full';

						break;

					case 'date':
					case 'date_i18n':

						$timestamp       = $value[0];
						$timestamp       = $this->prepare_meta_date_value( $timestamp, $key );
						$valid_timestamp = jet_blog_tools()->is_valid_timestamp( $timestamp );

						if ( ! $valid_timestamp ) {
							$timestamp = strtotime( $timestamp );
						}

						$format        = ! empty( $meta['date_format'] ) ? $meta['date_format'] : 'F j, Y';
						$callback_args = array( $format, $timestamp );

						break;
				}
			}

			if ( ! empty( $callback ) && is_callable( $callback ) ) {
				$meta_val = call_user_func_array( $callback, $callback_args );
			} else {
				$meta_val = $value[0];
			}

			$meta_val = sprintf( $meta['meta_format'], $meta_val );

			$label = ! empty( $meta['meta_label'] )
				? sprintf( '<div class="%1$s__item-label">%2$s</div>', $base, $meta['meta_label'] )
				: '';

			$result .= sprintf(
				'<div class="%1$s__item">%2$s<div class="%1$s__item-value">%3$s</div></div>',
				$base, $label, $meta_val
			);

		}

		if ( empty( $result ) ) {
			return;
		}

		printf( '<div class="%1$s">%2$s</div>', $base, $result );

	}

	public function prepare_meta_date_value( $meta_value, $meta_key ) {

		// For ACF meta date field
		if ( function_exists( 'acf_get_field' ) && acf_get_field( $meta_key ) ) {
			$meta_value = strtotime( $meta_value );
		}

		return $meta_value;
	}

	/**
	 * Add meta controls for selected position
	 *
	 * @param string $position_slug
	 * @param string $position_name
	 */
	public function _add_meta_controls( $position_slug, $position_name ) {

		$this->add_control(
			'show_' . $position_slug . '_meta',
			array(
				'label'        => sprintf( esc_html__( 'Show Meta %s', 'jet-blog' ), $position_name ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'jet-blog' ),
				'label_off'    => esc_html__( 'No', 'jet-blog' ),
				'return_value' => 'yes',
				'default'      => '',
				'separator'    => 'before',
			)
		);

		$this->add_control(
			'meta_' . $position_slug . '_position',
			array(
				'label'   => esc_html__( 'Meta Fields Position', 'jet-blog' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'before',
				'options' => array(
					'before' => esc_html__( 'Before', 'jet-blog' ),
					'after'  => esc_html__( 'After', 'jet-blog' ),
				),
				'condition'   => array(
					'show_' . $position_slug . '_meta' => 'yes',
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'meta_key',
			array(
				'label'       => esc_html__( 'Key', 'jet-blog' ),
				'description' => esc_html__( 'Meta key from postmeta table in database', 'jet-blog' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
			)
		);

		$repeater->add_control(
			'meta_label',
			array(
				'label'   => esc_html__( 'Label', 'jet-blog' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$repeater->add_control(
			'meta_format',
			array(
				'label'       => esc_html__( 'Value Format', 'jet-blog' ),
				'description' => esc_html__( 'Value format string, accepts HTML markup. %s - is meta value', 'jet-blog' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '%s',
			)
		);

		$repeater->add_control(
			'meta_callback',
			array(
				'label'   => esc_html__( 'Prepare meta value with callback', 'jet-blog' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => apply_filters( 'jet-blog/base/meta-callbacks', array(
					''                        => esc_html__( 'Clean', 'jet-blog' ),
					'get_permalink'           => 'get_permalink',
					'get_the_title'           => 'get_the_title',
					'wp_get_attachment_url'   => 'wp_get_attachment_url',
					'wp_get_attachment_image' => 'wp_get_attachment_image',
					'date'                    => esc_html__( 'Format date', 'jet-blog' ),
					'date_i18n'               => esc_html__( 'Format date (localized)', 'jet-blog' ),
				) ),
			)
		);

		$repeater->add_control(
			'date_format',
			array(
				'label'       => esc_html__( 'Format', 'jet-blog' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'F j, Y',
				'description' => sprintf( '<a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">%s</a>', esc_html__( 'Documentation on date and time formatting', 'jet-blog' ) ),
				'condition'   => array(
					'meta_callback' => array( 'date', 'date_i18n' ),
				),
			)
		);

		$this->add_control(
			$position_slug . '_meta',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'title_field' => '{{{ meta_key }}}',
				'default'     => array(
					array(
						'meta_label' => esc_html__( 'Label', 'jet-blog' ),
					)
				),
				'condition'   => array(
					'show_' . $position_slug . '_meta' => 'yes',
				),
			)
		);

	}

	/**
	 * Add meta controls for selected position
	 *
	 * @param string $position_slug
	 * @param string $position_name
	 * @param string $base
	 *
	 * @return void
	 */
	public function _add_meta_style_controls( $position_slug, $position_name, $base ) {

		$this->_add_control(
			$position_slug . '_meta_styles',
			array(
				'label'     => sprintf( esc_html__( 'Meta Styles %s', 'jet-blog' ), $position_name ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->_add_control(
			$position_slug . '_meta_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'jet-blog' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .' . $base => 'background-color: {{VALUE}}',
				),
			),
			75
		);

		$this->_add_control(
			$position_slug . '_meta_label_heading',
			array(
				'label'     => esc_html__( 'Meta Label', 'jet-blog' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			),
			25
		);

		$this->_add_control(
			$position_slug . '_meta_label_color',
			array(
				'label'     => esc_html__( 'Color', 'jet-blog' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .' . $base . '__item-label' => 'color: {{VALUE}}',
				),
			),
			25
		);

		$this->_add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => $position_slug . '_meta_label_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .' . $base . '__item-label',
			),
			50
		);

		$this->_add_control(
			$position_slug . '_meta_label_display',
			array(
				'label'   => esc_html__( 'Display Meta Label and Value', 'jet-blog' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					'inline-block' => esc_html__( 'Inline', 'jet-blog' ),
					'block'        => esc_html__( 'As Blocks', 'jet-blog' ),
				),
				'selectors' => array(
					'{{WRAPPER}} .' . $base . '__item-label' => 'display: {{VALUE}}',
					'{{WRAPPER}} .' . $base . '__item-value' => 'display: {{VALUE}}',
				),
			),
			50
		);

		$this->_add_control(
			$position_slug . '_meta_label_gap',
			array(
				'label'       => esc_html__( 'Horizontal Gap Between Label and Value', 'jet-blog' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 5,
				'min'         => 0,
				'max'         => 20,
				'step'        => 1,
				'selectors' => array(
					'{{WRAPPER}} .' . $base . '__item-label' => 'margin-right: {{VALUE}}px',
				),
			),
			50
		);

		$this->_add_control(
			$position_slug . '_meta_value_heading',
			array(
				'label'     => esc_html__( 'Meta Value', 'jet-blog' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			),
			25
		);

		$this->_add_control(
			$position_slug . '_meta_color',
			array(
				'label'     => esc_html__( 'Color', 'jet-blog' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .' . $base . '__item-value' => 'color: {{VALUE}}',
				),
			),
			25
		);

		$this->_add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => $position_slug . '_meta_typography',
				'selector' => '{{WRAPPER}} .' . $base . '__item-value',
			),
			50
		);

		$this->_add_responsive_control(
			$position_slug . '_meta_margin',
			array(
				'label'      => esc_html__( 'Margin', 'jet-blog' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .' . $base => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'separator' => 'before',
			),
			50
		);

		$this->_add_responsive_control(
			$position_slug . '_meta_padding',
			array(
				'label'      => esc_html__( 'Padding', 'jet-blog' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .' . $base => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
			75
		);

		$this->_add_responsive_control(
			$position_slug . '_meta_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'jet-blog' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .' . $base => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
			75
		);

		$this->_add_responsive_control(
			$position_slug . '_meta_align',
			array(
				'label'   => esc_html__( 'Alignment', 'jet-blog' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'left' => array(
						'title' => esc_html__( 'Left', 'jet-blog' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'jet-blog' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'jet-blog' ),
						'icon'  => 'fa fa-align-right',
					),
					'justify' => array(
						'title' => esc_html__( 'Justified', 'jet-blog' ),
						'icon'  => 'fa fa-align-justify',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .' . $base => 'text-align: {{VALUE}};',
				),
			),
			50
		);

	}

	/**
	 * Print underscore template
	 *
	 * @param  [type] $setting [description]
	 * @param  [type] $format  [description]
	 * @return [type]          [description]
	 */
	public function _edit_html( $setting = null, $format = '%s' ) {

		if ( is_array( $setting ) ) {
			$setting = $setting[0] . '.' . $setting[1];
		}

		echo '<# if ( settings.' . $setting . ' ) { #>';
		printf( $format, '{{{ settings.' . $setting . ' }}}' );
		echo '<# } #>';
	}

	/**
	 * Set posts query results
	 */
	public function _set_query( $posts ) {
		$this->_query = $posts;
	}

	/**
	 * Return posts query results
	 */
	public function _get_query() {
		return $this->_query;
	}

	/**
	 * Check if is Library template preview.
	 *
	 * @return boolean [description]
	 */
	public function _is_template_preview() {

		$is_preview = false;

		if ( isset( $_GET['elementor_library'] ) && isset( $_GET['preview'] ) ) {
			$is_preview = true;
		}

		return apply_filters( 'jet-blog/base/is-template-preview', $is_preview );

	}

	/**
	 * Is visible control
	 *
	 * @param $control_id
	 * @param $load_level
	 *
	 * @return bool
	 */
	public function _is_visible_control( $control_id, $load_level ) {

		if ( ( $this->_load_level < $load_level || in_array( $control_id, $this->_exclude_controls ) )
			&& ! in_array( $control_id, $this->_include_controls )
		) {
			return false;
		}

		return true;
	}

	/**
	 * Add control.
	 *
	 * @param bool  $control_id
	 * @param array $control_args
	 * @param int   $load_level
	 *
	 * @return bool|void
	 */
	public function _add_control( $control_id = false, $control_args = array(), $load_level = 1 ) {

		if ( ! $this->_is_visible_control( $control_id, $load_level ) ) {
			return false;
		}

		if ( function_exists( 'jet_styles_manager' ) && jet_styles_manager()->compatibility ) {
			$control_args = jet_styles_manager()->compatibility->set_control_args(
				$control_args,
				$load_level,
				'jet-blog'
			);
		}

		$this->add_control( $control_id, $control_args );
	}

	/**
	 * Add responsive control
	 *
	 * @param bool  $control_id
	 * @param array $control_args
	 * @param int   $load_level
	 *
	 * @return bool|void
	 */
	public function _add_responsive_control( $control_id = false, $control_args = array(), $load_level = 1 ) {

		if ( ! $this->_is_visible_control( $control_id, $load_level ) ) {
			return false;
		}

		if ( function_exists( 'jet_styles_manager' ) && jet_styles_manager()->compatibility ) {
			$control_args = jet_styles_manager()->compatibility->set_control_args(
				$control_args,
				$load_level,
				'jet-blog'
			);
		}

		$this->add_responsive_control( $control_id, $control_args );
	}

	/**
	 * Add group control
	 *
	 * @param bool  $group_control_type
	 * @param array $group_control_args
	 * @param int   $load_level
	 *
	 * @return bool|void
	 */
	public function _add_group_control( $group_control_type = false, $group_control_args = array(), $load_level = 1 ) {

		if ( ! $this->_is_visible_control( $group_control_args['name'], $load_level ) ) {
			return false;
		}

		if ( function_exists( 'jet_styles_manager' ) && jet_styles_manager()->compatibility ) {
			$group_control_args = jet_styles_manager()->compatibility->set_group_control_args(
				$group_control_type,
				$group_control_args,
				$load_level,
				'jet-blog'
			);
		}

		$this->add_group_control( $group_control_type, $group_control_args );
	}

	/**
	 * Start controls section
	 *
	 * @param bool  $controls_section_id
	 * @param array $controls_section_args
	 * @param int   $load_level
	 *
	 * @return bool|void
	 */
	public function _start_controls_section( $controls_section_id = false, $controls_section_args = array(), $load_level = 25 ) {

		if ( ! $controls_section_id || $this->_load_level < $load_level ) {
			return false;
		}

		$this->start_controls_section( $controls_section_id, $controls_section_args );
	}

	/**
	 * End controls section
	 *
	 * @param int $load_level
	 *
	 * @return bool|void
	 */
	public function _end_controls_section( $load_level = 25 ) {

		if ( $this->_load_level < $load_level ) {
			return false;
		}

		$this->end_controls_section();
	}

	/**
	 * Start controls tabs
	 *
	 * @param bool $tabs_id
	 * @param int  $load_level
	 *
	 * @return bool|void
	 */
	public function _start_controls_tabs( $tabs_id = false, $load_level = 25 ) {

		if ( ! $tabs_id || $this->_load_level < $load_level ) {
			return false;
		}

		$this->start_controls_tabs( $tabs_id );
	}

	/**
	 * End controls tabs
	 *
	 * @param int $load_level
	 *
	 * @return bool|void
	 */
	public function _end_controls_tabs( $load_level = 25 ) {

		if ( $this->_load_level < $load_level ) {
			return false;
		}

		$this->end_controls_tabs();
	}

	/**
	 * Start controls tab
	 *
	 * @param bool  $tab_id
	 * @param array $tab_args
	 * @param int   $load_level
	 *
	 * @return bool|void
	 */
	public function _start_controls_tab( $tab_id = false, $tab_args = array(), $load_level = 25 ) {

		if ( ! $tab_id || $this->_load_level < $load_level ) {
			return false;
		}

		$this->start_controls_tab( $tab_id, $tab_args );
	}

	/**
	 * End controls tab
	 *
	 * @param int $load_level
	 *
	 * @return bool|void
	 */
	public function _end_controls_tab( $load_level = 25 ) {

		if ( $this->_load_level < $load_level ) {
			return false;
		}

		$this->end_controls_tab();
	}

	/**
	 * Returns HTML icon markup
	 *
	 * @param  array  $setting
	 * @param  array  $settings
	 * @param  string $format
	 * @param  string $icon_class
	 * @return string
	 */
	public function _get_icon( $setting = null, $settings = null, $format = '%s', $icon_class = '' ) {
		return $this->_render_icon( $setting, $settings, $format, $icon_class, false );
	}

	/**
	 * Print HTML icon template
	 *
	 * @param  array  $setting
	 * @param  array  $settings
	 * @param  string $format
	 * @param  string $icon_class
	 * @param  bool   $echo
	 *
	 * @return void|string
	 */
	public function _render_icon( $setting = null, $settings = null, $format = '%s', $icon_class = '', $echo = true ) {

		if ( null === $settings ) {
			$settings = $this->get_settings_for_display();
		}

		$new_setting = $this->_new_icon_prefix . $setting;

		$migrated = isset( $settings['__fa4_migrated'][ $new_setting ] );
		$is_new = ( empty( $settings[ $setting ] ) || 'false' === $settings[ $setting ] )
				  && class_exists( 'Elementor\Icons_Manager' ) && Icons_Manager::is_migration_allowed();

		$icon_html = '';

		if ( $is_new || $migrated ) {

			$attr = array( 'aria-hidden' => 'true' );

			if ( ! empty( $icon_class ) ) {
				$attr['class'] = $icon_class;
			}

			if ( isset( $settings[ $new_setting ] ) ) {
				ob_start();
				Icons_Manager::render_icon( $settings[ $new_setting ], $attr );

				$icon_html = ob_get_clean();
			}

		} else if ( ! empty( $settings[ $setting ] ) ) {

			if ( empty( $icon_class ) ) {
				$icon_class = $settings[ $setting ];
			} else {
				$icon_class .= ' ' . $settings[ $setting ];
			}

			$icon_html = sprintf( '<i class="%s" aria-hidden="true"></i>', $icon_class );
		}

		if ( empty( $icon_html ) ) {
			return;
		}

		if ( ! $echo ) {
			return sprintf( $format, $icon_html );
		}

		printf( $format, $icon_html );
	}
}
