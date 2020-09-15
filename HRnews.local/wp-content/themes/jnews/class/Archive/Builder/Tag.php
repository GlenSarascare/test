<?php
/**
 * @author Jegtheme
 */

namespace JNews\Archive\Builder;

class Tag extends OptionAbstract {

	protected $prefix = 'jnews_tag_';

	protected function setup_hook() {
		add_action( 'post_tag_edit_form', array( $this, 'render_options' ) );
		add_action( 'edit_post_tag', array( $this, 'save_tag' ) );
	}

	protected function get_id( $tag ) {
		if ( ! empty( $tag->term_id ) ) {
			return $tag->term_id;
		} else {
			return null;
		}
	}

	public function prepare_segments() {
		$segments = array();

		$segments[] = array(
			'id'   => 'override-tag-setting',
			'name' => esc_html__( 'Tag Setting', 'jnews' ),
		);

		return $segments;
	}

	public function save_tag() {
		if ( isset( $_POST['taxonomy'] ) && $_POST['taxonomy'] === 'post_tag' ) {
			$options = $this->get_options();
			$this->do_save( $options, $_POST['tag_ID'] );
		}
	}

	protected function get_options() {
		$options     = array();
		$all_sidebar = apply_filters( 'jnews_get_sidebar_widget', null );
		$content_layout = apply_filters('jnews_get_content_layout_option', array(
			'3'  => JNEWS_THEME_URL . '/assets/img/admin/content-3.png',
			'4'  => JNEWS_THEME_URL . '/assets/img/admin/content-4.png',
			'5'  => JNEWS_THEME_URL . '/assets/img/admin/content-5.png',
			'6'  => JNEWS_THEME_URL . '/assets/img/admin/content-6.png',
			'7'  => JNEWS_THEME_URL . '/assets/img/admin/content-7.png',
			'9'  => JNEWS_THEME_URL . '/assets/img/admin/content-9.png',
			'10' => JNEWS_THEME_URL . '/assets/img/admin/content-10.png',
			'11' => JNEWS_THEME_URL . '/assets/img/admin/content-11.png',
			'12' => JNEWS_THEME_URL . '/assets/img/admin/content-12.png',
			'14' => JNEWS_THEME_URL . '/assets/img/admin/content-14.png',
			'15' => JNEWS_THEME_URL . '/assets/img/admin/content-15.png',
			'18' => JNEWS_THEME_URL . '/assets/img/admin/content-18.png',
			'22' => JNEWS_THEME_URL . '/assets/img/admin/content-22.png',
			'23' => JNEWS_THEME_URL . '/assets/img/admin/content-23.png',
			'25' => JNEWS_THEME_URL . '/assets/img/admin/content-25.png',
			'26' => JNEWS_THEME_URL . '/assets/img/admin/content-26.png',
			'27' => JNEWS_THEME_URL . '/assets/img/admin/content-27.png',
			'32' => JNEWS_THEME_URL . '/assets/img/admin/content-32.png',
			'33' => JNEWS_THEME_URL . '/assets/img/admin/content-33.png',
			'34' => JNEWS_THEME_URL . '/assets/img/admin/content-34.png',
			'35' => JNEWS_THEME_URL . '/assets/img/admin/content-35.png',
			'36' => JNEWS_THEME_URL . '/assets/img/admin/content-36.png',
			'37' => JNEWS_THEME_URL . '/assets/img/admin/content-37.png',
			'38' => JNEWS_THEME_URL . '/assets/img/admin/content-38.png',
			'39' => JNEWS_THEME_URL . '/assets/img/admin/content-39.png'
		));

		$tag_override = array(
			'field'    => 'tag_override',
			'operator' => '==',
			'value'    => true
		);

		$custom_template = array(
			'field'    => 'page_layout',
			'operator' => '!=',
			'value'    => 'custom-template'
		);

		$options['tag_override'] = array(
			'segment' => 'override-tag-setting',
			'title'   => esc_html__( 'Override Archive Setting', 'jnews' ),
			'desc'    => esc_html__( 'Override general archive setting for this post tag.', 'jnews' ),
			'type'    => 'checkbox',
			'default' => false
		);

		$options['page_layout'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Page Layout', 'jnews' ),
			'desc'       => esc_html__( 'Choose the page layout.', 'jnews' ),
			'type'       => 'radioimage',
			'default'    => 'right-sidebar',
			'options'    => array(
				'right-sidebar'        => JNEWS_THEME_URL . '/assets/img/admin/single-post-right-sidebar.png',
				'left-sidebar'         => JNEWS_THEME_URL . '/assets/img/admin/single-post-left-sidebar.png',
				'right-sidebar-narrow' => JNEWS_THEME_URL . '/assets/img/admin/single-post-wide-right-sidebar.png',
				'left-sidebar-narrow'  => JNEWS_THEME_URL . '/assets/img/admin/single-post-wide-left-sidebar.png',
				'double-sidebar'       => JNEWS_THEME_URL . '/assets/img/admin/single-post-double-sidebar.png',
				'double-right-sidebar' => JNEWS_THEME_URL . '/assets/img/admin/single-post-double-right.png',
				'no-sidebar'           => JNEWS_THEME_URL . '/assets/img/admin/single-post-no-sidebar.png',
				'custom-template'      => JNEWS_THEME_URL . '/assets/img/admin/single-post-custom.png',
			),
			'dependency' => array(
				$tag_override
			)
		);

		$options['tag_template'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Tag Template', 'jnews' ),
			'desc'       => esc_html__( 'Choose archive template that you want to use for this tag.', 'jnews' ),
			'type'       => 'select',
			'options'    => jnews_get_all_custom_archive_template(),
			'dependency' => array(
				$tag_override,
				array(
					'field'    => 'page_layout',
					'operator' => '==',
					'value'    => 'custom-template'
				)
			)
		);

		$options['number_post'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Number of Post', 'jnews' ),
			'desc'       => esc_html__( 'Set the number of post per page on tag page.', 'jnews' ),
			'type'       => 'text',
			'default'    => '10',
			'dependency' => array(
				$tag_override,
				array(
					'field'    => 'page_layout',
					'operator' => '==',
					'value'    => 'custom-template'
				)
			)
		);

		$options['sidebar'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Tag Sidebar', 'jnews' ),
			'desc'       => wp_kses( __( "Choose your tag sidebar. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
			'type'       => 'select',
			'default'    => 'default-sidebar',
			'options'    => $all_sidebar,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'page_layout',
					'operator' => '!=',
					'value'    => 'no-sidebar'
				)
			)
		);

		$options['second_sidebar'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Second Tag Sidebar', 'jnews' ),
			'desc'       => wp_kses( __( "Choose your second sidebar for tag page. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
			'type'       => 'select',
			'default'    => 'default-sidebar',
			'options'    => $all_sidebar,
			'dependency' => array(
				$tag_override,
				array(
					'field'    => 'page_layout',
					'operator' => 'in',
					'value'    => array( 'double-sidebar', 'double-right-sidebar' )
				)
			)
		);

		$options['sticky_sidebar'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Tag Sticky Sidebar', 'jnews' ),
			'desc'       => esc_html__( 'Enable sticky sidebar on this tag page.', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => true,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'page_layout',
					'operator' => '!=',
					'value'    => 'no-sidebar'
				)
			)
		);

		$options['content_layout'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Tag Content Layout', 'jnews' ),
			'desc'       => esc_html__( 'Choose your tag content layout.', 'jnews' ),
			'default'    => '3',
			'type'       => 'radioimage',
			'options'    => $content_layout,
			'dependency' => array(
				$tag_override,
				$custom_template,
			)
		);

		$options['content_boxed'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Enable Boxed', 'jnews' ),
			'desc'       => esc_html__( 'This option will turn the module into boxed.', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => false,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_layout',
					'operator' => 'in',
					'value'    => array( '3', '4', '5', '6', '7', '9', '10', '14', '18', '22', '23', '25', '26', '27', '39' )
				)
			)
		);

		$options['content_boxed_shadow'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
			'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => false,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_boxed',
					'operator' => '==',
					'value'    => true
				),
				array(
					'field'    => 'content_layout',
					'operator' => 'in',
					'value'    => array( '3', '4', '5', '6', '7', '9', '10', '14', '18', '22', '23', '25', '26', '27', '39' )
				)
			)
		);

		$options['content_box_shadow'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
			'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => false,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_layout',
					'operator' => 'in',
					'value'    => array( '37', '35', '33', '36', '32', '38' )
				)
			)
		);

		$options['content_excerpt'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Excerpt Length', 'jnews' ),
			'desc'       => esc_html__( 'Set the word length of excerpt on post.', 'jnews' ),
			'type'       => 'number',
			'options'    => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'default'    => 20,
			'dependency' => array(
				$tag_override,
				$custom_template,
			)
		);

		$options['content_date'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Choose Date Format', 'jnews' ),
			'desc'       => esc_html__( 'Choose which date format you want to use for tag content element.', 'jnews' ),
			'default'    => 'default',
			'type'       => 'select',
			'options'    => array(
				'ago'     => esc_html__( 'Relative Date/Time Format (ago)', 'jnews' ),
				'default' => esc_html__( 'WordPress Default Format', 'jnews' ),
				'custom'  => esc_html__( 'Custom Format', 'jnews' ),
			),
			'dependency' => array(
				$tag_override,
				$custom_template,
			)
		);

		$options['content_date_custom'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Custom Date Format', 'jnews' ),
			'desc'       => wp_kses( sprintf( __( "Please set custom date format for tag content element. For more detail about this format, please refer to <a href='%s' target='_blank'>Developer Codex</a>.", "jnews" ), "https://developer.wordpress.org/reference/functions/current_time/" ), wp_kses_allowed_html() ),
			'default'    => 'Y/m/d',
			'type'       => 'text',
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_date',
					'operator' => '==',
					'value'    => 'custom'
				)
			)
		);

		$options['content_pagination'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Choose Pagination Mode', 'jnews' ),
			'desc'       => esc_html__( 'Choose which pagination mode that fit with your block.', 'jnews' ),
			'default'    => 'nav_1',
			'type'       => 'select',
			'options'    => array(
				'nav_1' => esc_html__( 'Normal - Navigation 1', 'jnews' ),
				'nav_2' => esc_html__( 'Normal - Navigation 2', 'jnews' ),
				'nav_3' => esc_html__( 'Normal - Navigation 3', 'jnews' ),
			),
			'dependency' => array(
				$tag_override,
				$custom_template,
			)
		);

		$options['content_pagination_limit'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Auto Load Limit', 'jnews' ),
			'desc'       => esc_html__( 'Limit of auto load when scrolling, set to zero to always load until end of content.', 'jnews' ),
			'type'       => 'number',
			'options'    => array(
				'min'  => '0',
				'max'  => '9999',
				'step' => '1',
			),
			'default'    => 0,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_pagination',
					'operator' => '==',
					'value'    => 'scrollload'
				)
			)
		);

		$options['content_pagination_align'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Pagination Align', 'jnews' ),
			'desc'       => esc_html__( 'Choose pagination alignment.', 'jnews' ),
			'default'    => 'center',
			'type'       => 'select',
			'options'    => array(
				'left'   => esc_html__( 'Left', 'jnews' ),
				'center' => esc_html__( 'Center', 'jnews' ),
			),
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_pagination',
					'operator' => 'in',
					'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
				)
			)
		);

		$options['content_pagination_text'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Show Navigation Text', 'jnews' ),
			'desc'       => esc_html__( 'Show navigation text (next, prev).', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => false,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_pagination',
					'operator' => 'in',
					'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
				)
			)
		);

		$options['content_pagination_page'] = array(
			'segment'    => 'override-tag-setting',
			'title'      => esc_html__( 'Show Page Info', 'jnews' ),
			'desc'       => esc_html__( 'Show page info text (Page x of y).', 'jnews' ),
			'type'       => 'checkbox',
			'default'    => false,
			'dependency' => array(
				$tag_override,
				$custom_template,
				array(
					'field'    => 'content_pagination',
					'operator' => 'in',
					'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
				)
			)
		);

		return apply_filters( 'jnews_custom_option', $options );
	}
}
