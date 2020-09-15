<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Post;

use JNews\Module\ModuleOptionAbstract;

class Post_Related_Option extends ModuleOptionAbstract {

	public function get_category() {
		return esc_html__( 'JNews - Post', 'jnews' );
	}

	public function compatible_column() {
		return [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ];
	}

	public function get_module_name() {
		return esc_html__( 'JNews - Related Post', 'jnews' );
	}

	public function set_options() {
		$this->set_post_option();
		$this->set_style_option();
	}

	public function set_post_option() {
		$this->options[] = [
			'type'        => 'dropdown',
			'param_name'  => 'match',
			'heading'     => esc_html__( 'Related Post Filter', 'jnews' ),
			'description' => esc_html__( 'Select how related post will filter article.', 'jnews' ),
			'std'         => '',
			'value'       => [
				esc_html__( 'Category', 'jnews' ) => 'category',
				esc_html__( 'Tag', 'jnews' )      => 'tag',
			],
		];

		$this->options[] = [
			'type'        => 'radioimage',
			'param_name'  => 'header_type',
			'std'         => 'heading_6',
			'value'       => [
				JNEWS_THEME_URL . '/assets/img/admin/heading-1.png'  => 'heading_1',
				JNEWS_THEME_URL . '/assets/img/admin/heading-2.png'  => 'heading_2',
				JNEWS_THEME_URL . '/assets/img/admin/heading-3.png'  => 'heading_3',
				JNEWS_THEME_URL . '/assets/img/admin/heading-4.png'  => 'heading_4',
				JNEWS_THEME_URL . '/assets/img/admin/heading-5.png'  => 'heading_5',
				JNEWS_THEME_URL . '/assets/img/admin/heading-6.png'  => 'heading_6',
				JNEWS_THEME_URL . '/assets/img/admin/heading-7.png'  => 'heading_7',
				JNEWS_THEME_URL . '/assets/img/admin/heading-8.png'  => 'heading_8',
				JNEWS_THEME_URL . '/assets/img/admin/heading-9.png'  => 'heading_9',
			],
			'heading'     => esc_html__( 'Header Type', 'jnews' ),
			'description' => esc_html__( 'Choose which header type fit with your content design.', 'jnews' ),
		];

		$this->options[] = [
			'type'        => 'dropdown',
			'param_name'  => 'pagination',
			'heading'     => esc_html__( 'Related Pagination Style', 'jnews' ),
			'description' => esc_html__( 'Adjust how related post will shown.', 'jnews' ),
			'std'         => '',
			'value'       => [
				esc_html__( 'No Pagination', 'jnews' ) => 'disable',
				esc_html__( 'Next Prev', 'jnews' )     => 'nextprev',
				esc_html__( 'Load More', 'jnews' )     => 'loadmore',
				esc_html__( 'Auto Load on Scroll', 'jnews' ) => 'scrollload',
			],
		];

		$this->options[] = [
			'type'        => 'slider',
			'param_name'  => 'number',
			'heading'     => esc_html__( 'Number of Post', 'jnews' ),
			'description' => esc_html__( 'Set the number of post each related post load.', 'jnews' ),
			'min'         => 2,
			'max'         => 10,
			'step'        => 1,
			'std'         => 5,
		];

		$this->options[] = [
			'type'        => 'dropdown',
			'param_name'  => 'unique_content',
			'heading'     => esc_html__( 'Include into Unique Content Group', 'jnews' ),
			'description' => esc_html__( 'Choose unique content option, and this module will be included into unique content group. It won\'t duplicate content across the group. Ajax loaded content won\'t affect this unique content feature.', 'jnews' ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
			'std'         => 'disable',
			'value'       => [
				esc_html__( 'Disable', 'jnews' ) => 'disable',
				esc_html__( 'Unique Content - Group 1', 'jnews' ) => 'unique1',
				esc_html__( 'Unique Content - Group 2', 'jnews' ) => 'unique2',
				esc_html__( 'Unique Content - Group 3', 'jnews' ) => 'unique3',
				esc_html__( 'Unique Content - Group 4', 'jnews' ) => 'unique4',
				esc_html__( 'Unique Content - Group 5', 'jnews' ) => 'unique5',
			],
		];

		$this->options[] = [
			'type'        => 'slider',
			'param_name'  => 'auto_load',
			'heading'     => esc_html__( 'Auto Load Limit', 'jnews' ),
			'description' => esc_html__( 'Limit of auto load when scrolling, set to zero to always load until end of content.', 'jnews' ),
			'min'         => 0,
			'max'         => 500,
			'step'        => 1,
			'std'         => 3,
			'dependency'  => [
				'element' => 'pagination',
				'value'   => [ 'nextprev', 'loadmore', 'scrollload' ],
			],
		];

		$this->options[] = [
			'type'        => 'radioimage',
			'param_name'  => 'template',
			'std'         => 'template_9',
			'value'       => [
				JNEWS_THEME_URL . '/assets/img/admin/content-1.png' => 'template_1',
				JNEWS_THEME_URL . '/assets/img/admin/content-2.png' => 'template_2',
				JNEWS_THEME_URL . '/assets/img/admin/content-3.png' => 'template_3',
				JNEWS_THEME_URL . '/assets/img/admin/content-4.png' => 'template_4',
				JNEWS_THEME_URL . '/assets/img/admin/content-5.png' => 'template_5',
				JNEWS_THEME_URL . '/assets/img/admin/content-6.png' => 'template_6',
				JNEWS_THEME_URL . '/assets/img/admin/content-7.png' => 'template_7',
				JNEWS_THEME_URL . '/assets/img/admin/content-8.png' => 'template_8',
				JNEWS_THEME_URL . '/assets/img/admin/content-9.png' => 'template_9',
				JNEWS_THEME_URL . '/assets/img/admin/content-10.png' => 'template_10',
				JNEWS_THEME_URL . '/assets/img/admin/content-11.png' => 'template_11',
				JNEWS_THEME_URL . '/assets/img/admin/content-12.png' => 'template_12',
				JNEWS_THEME_URL . '/assets/img/admin/content-13.png' => 'template_13',
				JNEWS_THEME_URL . '/assets/img/admin/content-14.png' => 'template_14',
				JNEWS_THEME_URL . '/assets/img/admin/content-15.png' => 'template_15',
				JNEWS_THEME_URL . '/assets/img/admin/content-16.png' => 'template_16',
				JNEWS_THEME_URL . '/assets/img/admin/content-17.png' => 'template_17',
				JNEWS_THEME_URL . '/assets/img/admin/content-18.png' => 'template_18',
				JNEWS_THEME_URL . '/assets/img/admin/content-19.png' => 'template_19',
				JNEWS_THEME_URL . '/assets/img/admin/content-20.png' => 'template_20',
				JNEWS_THEME_URL . '/assets/img/admin/content-21.png' => 'template_21',
				JNEWS_THEME_URL . '/assets/img/admin/content-22.png' => 'template_22',
				JNEWS_THEME_URL . '/assets/img/admin/content-23.png' => 'template_23',
				JNEWS_THEME_URL . '/assets/img/admin/content-24.png' => 'template_24',
				JNEWS_THEME_URL . '/assets/img/admin/content-25.png' => 'template_25',
				JNEWS_THEME_URL . '/assets/img/admin/content-26.png' => 'template_26',
				JNEWS_THEME_URL . '/assets/img/admin/content-27.png' => 'template_27',
			],
			'heading'     => esc_html__( 'Related PostTemplate', 'jnews' ),
			'description' => esc_html__( 'Choose your related post template.', 'jnews' ),
		];

		$this->options[] = [
			'type'        => 'slider',
			'param_name'  => 'excerpt',
			'heading'     => esc_html__( 'Excerpt Length', 'jnews' ),
			'description' => esc_html__( 'Set word length of excerpt on related post.', 'jnews' ),
			'min'         => 0,
			'max'         => 200,
			'step'        => 1,
			'std'         => 20,
		];

		$this->options[] = [
			'type'        => 'dropdown',
			'param_name'  => 'date',
			'heading'     => esc_html__( 'Related Post Date Format', 'jnews' ),
			'description' => esc_html__( 'Choose which date format you want to use for archive content.', 'jnews' ),
			'std'         => 'default',
			'value'       => [
				esc_attr__( 'Relative Date/Time Format (ago)', 'jnews' ) => 'ago',
				esc_attr__( 'WordPress Default Format', 'jnews' ) => 'default',
				esc_attr__( 'Custom Format', 'jnews' ) => 'custom',
			],
		];

		$this->options[] = [
			'type'        => 'textfield',
			'param_name'  => 'date_custom',
			'heading'     => esc_html__( 'Custom Date Format for Related Post', 'jnews' ),
			'description' => wp_kses(
				sprintf(
					__(
						"Please set your date format for related post content, for more detail about this format, please refer to
                        <a href='%s' target='_blank'>Developer Codex</a>.",
						'jnews'
					),
					'https://developer.wordpress.org/reference/functions/current_time/'
				),
				wp_kses_allowed_html()
			),
			'std'         => 'Y/m/d',
		];
	}

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'title_typography',
				'label'       => esc_html__( 'Title Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for post title', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_post_title > a,{{WRAPPER}} .jeg_block_title',
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
