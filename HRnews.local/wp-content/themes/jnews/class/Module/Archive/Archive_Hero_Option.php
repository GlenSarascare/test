<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Archive;

use JNews\Module\ModuleOptionAbstract;

Class Archive_Hero_Option extends ModuleOptionAbstract {
	public function get_category() {
		return esc_html__( 'JNews - Archive', 'jnews' );
	}

	public function compatible_column() {
		return array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );
	}

	public function get_module_name() {
		return esc_html__( 'JNews - Archive Hero', 'jnews' );
	}

	public function set_options() {
		$this->set_general_option();
		$this->set_design_option();
		$this->set_overlay_option();
		$this->set_style_option();
	}

	public function set_general_option() {
		$this->options[] = array(
			'type'        => 'radioimage',
			'param_name'  => 'hero_type',
			'std'         => '1',
			'value'       => array(
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-1.png'    => '1',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-2.png'    => '2',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-3.png'    => '3',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-4.png'    => '4',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-5.png'    => '5',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-6.png'    => '6',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-7.png'    => '7',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-8.png'    => '8',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-9.png'    => '9',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-10.png'   => '10',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-11.png'   => '11',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-12.png'   => '12',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-13.png'   => '13',
				JNEWS_THEME_URL . '/assets/img/admin/hero-type-skew.png' => 'skew'
			),
			'heading'     => esc_html__( 'Hero Type', 'jnews' ),
			'description' => esc_html__( 'Choose which hero type that fit your content design.', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'radioimage',
			'param_name'  => 'hero_style',
			'std'         => 'jeg_hero_style_1',
			'value'       => array(
				JNEWS_THEME_URL . '/assets/img/admin/hero-1.png' => 'jeg_hero_style_1',
				JNEWS_THEME_URL . '/assets/img/admin/hero-2.png' => 'jeg_hero_style_2',
				JNEWS_THEME_URL . '/assets/img/admin/hero-3.png' => 'jeg_hero_style_3',
				JNEWS_THEME_URL . '/assets/img/admin/hero-4.png' => 'jeg_hero_style_4',
				JNEWS_THEME_URL . '/assets/img/admin/hero-5.png' => 'jeg_hero_style_5',
				JNEWS_THEME_URL . '/assets/img/admin/hero-6.png' => 'jeg_hero_style_6',
				JNEWS_THEME_URL . '/assets/img/admin/hero-7.png' => 'jeg_hero_style_7',
			),
			'heading'     => esc_html__( 'Hero Style', 'jnews' ),
			'description' => esc_html__( 'Choose which hero style that fit your content design.', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);

		$this->options[] = array(
			'type'        => 'slider',
			'param_name'  => 'hero_margin',
			'heading'     => esc_html__( 'Hero Margin', 'jnews' ),
			'description' => esc_html__( 'Margin of each hero element.', 'jnews' ),
			'min'         => 0,
			'max'         => 30,
			'step'        => 1,
			'std'         => 0,
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'date_format',
			'heading'     => esc_html__( 'Choose Date Format', 'jnews' ),
			'description' => esc_html__( 'Choose which date format you want to use.', 'jnews' ),
			'std'         => 'default',
			'value'       => array(
				esc_html__( 'Relative Date/Time Format (ago)', 'jnews' ) => 'ago',
				esc_html__( 'WordPress Default Format', 'jnews' )        => 'default',
				esc_html__( 'Custom Format', 'jnews' )                   => 'custom',
			),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);

		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'date_format_custom',
			'heading'     => esc_html__( 'Custom Date Format', 'jnews' ),
			'description' => wp_kses( sprintf( __( 'Please write custom date format for your module, for more detail about how to write date format, you can refer to this <a href="%s" target="_blank">link</a>.', 'jnews' ), 'https://codex.wordpress.org/Formatting_Date_and_Time' ), wp_kses_allowed_html() ),
			'std'         => 'Y/m/d',
			'dependency'  => array( 'element' => 'date_format', 'value' => array( 'custom' ) )
		);

		$this->options[] = array(
			'type'        => 'checkbox',
			'param_name'  => 'first_page',
			'heading'     => esc_html__( 'Only First Page', 'jnews' ),
			'description' => esc_html__( 'Enable this option if you want to show this hero only on the first page.', 'jnews' ),
			'std'         => false
		);
	}

	public function set_design_option() {
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_desktop',
			'heading'     => esc_html__( 'Hero Height on Dekstop', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_1024',
			'heading'     => esc_html__( 'Hero Height on 1024px Width Screen', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_768',
			'heading'     => esc_html__( 'Hero Height on 768px Width Screen', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_667',
			'heading'     => esc_html__( 'Hero Height on 667px Width Screen', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_568',
			'heading'     => esc_html__( 'Hero Height on 568px Width Screen', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'hero_height_480',
			'heading'     => esc_html__( 'Hero Height on 480px Width Screen', 'jnews' ),
			'description' => esc_html__( 'Height on pixel / px, leave it empty to use the default number.', 'jnews' ),
			'group'       => esc_html__( 'Hero Design', 'jnews' ),
			'dependency'  => array(
				'element' => 'hero_type',
				'value'   => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'skew'
				)
			)
		);
	}

	public function set_overlay_option() {
		for ( $i = 1; $i <= 7; $i ++ ) {
			$dependency = '';

			switch ( $i ) {
				case 1:
					$dependency = array(
						'element' => 'hero_type',
						'value'   => array(
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'8',
							'9',
							'10',
							'11',
							'12',
							'13',
							'skew'
						)
					);
					break;

				case 2:
					$dependency = array(
						'element' => 'hero_type',
						'value'   => array(
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'8',
							'9',
							'10',
							'11',
							'12',
							'skew'
						)
					);
					break;

				case 3:
					$dependency = array(
						'element' => 'hero_type',
						'value'   => array( '1', '2', '3', '4', '5', '6', '7', '8', '10', '11', '12' )
					);
					break;

				case 4:
					$dependency = array(
						'element' => 'hero_type',
						'value'   => array( '1', '2', '3', '6', '7', '10', '11', '12' )
					);
					break;

				case 5:
					$dependency = array( 'element' => 'hero_type', 'value' => array( '2', '10', '11', '12' ) );
					break;

				case 6:
					$dependency = array( 'element' => 'hero_type', 'value' => array( '10' ) );
					break;

				case 7:
					$dependency = array( 'element' => 'hero_type', 'value' => array( '10' ) );
					break;
			}

			$this->options[] = array(
				'type'        => 'checkbox',
				'param_name'  => 'hero_item_' . $i . '_enable',
				'heading'     => sprintf( esc_html__( 'Override overlay for item %s', 'jnews' ), $i ),
				'group'       => esc_html__( 'Hero Style', 'jnews' ),
				'description' => esc_html__( 'Override overlay style for this item', 'jnews' ),
				'dependency'  => $dependency
			);

			$this->options[] = array(
				'type'       => 'slider',
				'param_name' => 'hero_item_' . $i . '_degree',
				'heading'    => sprintf( esc_html__( 'Hero Item %s : Overlay Gradient Degree', 'jnews' ), $i ),
				'group'      => esc_html__( 'Hero Style', 'jnews' ),
				'min'        => 0,
				'max'        => 360,
				'step'       => 1,
				'std'        => 0,
				'dependency' => array( 'element' => 'hero_item_' . $i . '_enable', 'value' => 'true' )
			);

			$this->options[] = array(
				'type'       => 'colorpicker',
				'std'        => 'rgba(255,255,255,0.5)',
				'param_name' => 'hero_item_' . $i . '_start_color',
				'group'      => esc_html__( 'Hero Style', 'jnews' ),
				'heading'    => sprintf( esc_html__( 'Hero Item %s : Gradient Start Color', 'jnews' ), $i ),
				'dependency' => array( 'element' => 'hero_item_' . $i . '_enable', 'value' => 'true' )
			);

			$this->options[] = array(
				'type'       => 'colorpicker',
				'std'        => 'rgba(0,0,0,0.5)',
				'param_name' => 'hero_item_' . $i . '_end_color',
				'group'      => esc_html__( 'Hero Style', 'jnews' ),
				'heading'    => sprintf( esc_html__( 'Hero Item %s : Gradient End Color', 'jnews' ), $i ),
				'dependency' => array( 'element' => 'hero_item_' . $i . '_enable', 'value' => 'true' )
			);
		}
	}

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'title_typography',
				'label'       => esc_html__( 'Title Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for post title', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_post_title > a',
			]
		);

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'meta_typography',
				'label'       => esc_html__( 'Meta Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for post meta', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_post_meta, {{WRAPPER}} .jeg_post_meta .fa, {{WRAPPER}}.jeg_postblock .jeg_subcat_list > li > a:hover, {{WRAPPER}} .jeg_pl_md_card .jeg_post_category a, {{WRAPPER}}.jeg_postblock .jeg_subcat_list > li > a.current, {{WRAPPER}} .jeg_pl_md_5 .jeg_post_meta, {{WRAPPER}} .jeg_pl_md_5 .jeg_post_meta .fa, {{WRAPPER}} .jeg_post_category a',
			]
		);
	}
}
