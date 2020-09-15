<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Archive;

use JNews\Module\ModuleOptionAbstract;

Class Archive_Block_Option extends ModuleOptionAbstract
{
    public function get_category()
    {
        return esc_html__('JNews - Archive', 'jnews');
    }

    public function compatible_column()
    {
        return array( 1,2,3,4,5,6,7,8,9,10,11,12 );
    }

    public function get_module_name()
    {
        return esc_html__('JNews - Archive Block', 'jnews');
    }

    public function set_options()
    {
    	$this->set_general_option();
//	    $this->set_pagination_option();
        $this->set_style_option();
    }

    public function set_pagination_option() {
	    $this->options[] = array(
		    'type'          => 'dropdown',
		    'param_name'    => 'pagination_mode',
		    'heading'       => esc_html__('Pagination Mode', 'jnews'),
		    'description'   => esc_html__('Choose which pagination mode that fit with your block.', 'jnews'),
		    'group'         => esc_html__('Pagination', 'jnews'),
		    'std'           => 'nav_1',
		    'value'         => array(
			    esc_html__('Normal - Navigation 1', 'jnews') => 'nav_1',
			    esc_html__('Normal - Navigation 2', 'jnews') => 'nav_2',
			    esc_html__('Normal - Navigation 3', 'jnews') => 'nav_3',
//			    esc_html__('Ajax - Next Prev', 'jnews') => 'nextprev',
//			    esc_html__('Ajax - Load More', 'jnews') => 'loadmore',
//			    esc_html__('Ajax - Auto Scroll Load', 'jnews') => 'scrollload',
		    )
	    );

	    $this->options[] = array(
		    'type'          => 'slider',
		    'param_name'    => 'pagination_scroll_limit',
		    'group'         => esc_html__('Pagination', 'jnews'),
		    'heading'       => esc_html__('Auto Load Limit', 'jnews'),
		    'description'   => esc_html__('Limit of auto load when scrolling, set to zero to always load until end of content.', 'jnews'),
		    'min'           => 0,
		    'max'           => 99999,
		    'step'          => 1,
		    'std'           => 0,
		    'dependency'    => array( 'element' => 'pagination_mode', 'value' => array( 'scrollload' ) )
	    );

	    $this->options[] = array(
		    'type'          => 'dropdown',
		    'param_name'    => 'pagination_align',
		    'heading'       => esc_html__('Pagination Align', 'jnews'),
		    'description'   => esc_html__('Choose pagination alignment.', 'jnews'),
		    'group'         => esc_html__('Pagination', 'jnews'),
		    'std'           => 'nav_1',
		    'value'         => array(
			    esc_html__('Left', 'jnews') => 'left',
			    esc_html__('Center', 'jnews') => 'center',
		    ),
		    'dependency'    => array( 'element' => 'pagination_mode', 'value' => array( 'nav_1', 'nav_2', 'nav_3' ) )
	    );

	    $this->options[] = array(
		    'type'          => 'checkbox',
		    'param_name'    => 'pagination_navtext',
		    'group'         => esc_html__('Pagination', 'jnews'),
		    'heading'       => esc_html__('Show Navigation Text', 'jnews'),
		    'value'         => array( esc_html__("Show navigation text (next, prev).", 'jnews') => 'yes' ),
		    'dependency'    => array( 'element' => 'pagination_mode', 'value' => array( 'nav_1', 'nav_2', 'nav_3' ) )
	    );

	    $this->options[] = array(
		    'type'          => 'checkbox',
		    'param_name'    => 'pagination_pageinfo',
		    'group'         => esc_html__('Pagination', 'jnews'),
		    'heading'       => esc_html__('Show Page Info', 'jnews'),
		    'value'         => array( esc_html__("Show page info text (Page x of y).", 'jnews') => 'yes' ),
		    'dependency'    => array( 'element' => 'pagination_mode', 'value' => array( 'nav_1', 'nav_2', 'nav_3' ) )
	    );
    }

	public function set_general_option()
	{
		$content_layout = apply_filters('jnews_get_content_layout_block_option', array(
			JNEWS_THEME_URL . '/assets/img/admin/content-3.png'  => '3',
			JNEWS_THEME_URL . '/assets/img/admin/content-4.png'  => '4',
			JNEWS_THEME_URL . '/assets/img/admin/content-5.png'  => '5',
			JNEWS_THEME_URL . '/assets/img/admin/content-6.png'  => '6',
			JNEWS_THEME_URL . '/assets/img/admin/content-7.png'  => '7',
			JNEWS_THEME_URL . '/assets/img/admin/content-9.png'  => '9',
			JNEWS_THEME_URL . '/assets/img/admin/content-10.png'  => '10',
			JNEWS_THEME_URL . '/assets/img/admin/content-11.png'  => '11',
			JNEWS_THEME_URL . '/assets/img/admin/content-12.png'  => '12',
			JNEWS_THEME_URL . '/assets/img/admin/content-14.png'  => '14',
			JNEWS_THEME_URL . '/assets/img/admin/content-15.png'  => '15',
			JNEWS_THEME_URL . '/assets/img/admin/content-18.png'  => '18',
			JNEWS_THEME_URL . '/assets/img/admin/content-22.png'  => '22',
			JNEWS_THEME_URL . '/assets/img/admin/content-23.png'  => '23',
			JNEWS_THEME_URL . '/assets/img/admin/content-25.png'  => '25',
			JNEWS_THEME_URL . '/assets/img/admin/content-26.png'  => '26',
			JNEWS_THEME_URL . '/assets/img/admin/content-27.png'  => '27',
			JNEWS_THEME_URL . '/assets/img/admin/content-32.png'  => '32',
			JNEWS_THEME_URL . '/assets/img/admin/content-33.png'  => '33',
			JNEWS_THEME_URL . '/assets/img/admin/content-34.png'  => '34',
			JNEWS_THEME_URL . '/assets/img/admin/content-35.png'  => '35',
			JNEWS_THEME_URL . '/assets/img/admin/content-36.png'  => '36',
			JNEWS_THEME_URL . '/assets/img/admin/content-37.png'  => '37',
			JNEWS_THEME_URL . '/assets/img/admin/content-38.png'  => '38',
			JNEWS_THEME_URL . '/assets/img/admin/content-39.png'  => '39'
		));

		$this->options[] = array(
			'type'          => 'radioimage',
			'param_name'    => 'block_type',
			'std'           => '3',
			'value'         => $content_layout,
			'heading'       => esc_html__('Block Type', 'jnews'),
			'description'   => esc_html__('Choose which block type that fit your content design.', 'jnews'),
		);

		$this->options[] = array(
			'type'          => 'slider',
			'param_name'    => 'number_post',
			'heading'       => esc_html__('Number of post', 'jnews'),
			'description'   => esc_html__('Set number of post for this block.', 'jnews'),
			'min'           => 1,
			'max'           => 100,
			'step'          => 1,
			'std'           => 5
		);

		$this->options[] = array(
			'type'          => 'checkbox',
			'param_name'    => 'boxed',
			'heading'       => esc_html__('Enable Boxed', 'jnews'),
			'value'         => array( esc_html__("This option will turn the module into boxed.", 'jnews') => 'yes' ),
			'dependency'    => array( 'element' => 'block_type', 'value' => array( '3', '4', '5', '6', '7', '9', '10', '14', '18', '22', '23', '25', '26', '27', '39' ) )
		);

		$this->options[] = array(
			'type'          => 'checkbox',
			'param_name'    => 'boxed_shadow',
			'heading'       => esc_html__('Enable Shadow', 'jnews'),
			'description'   => esc_html__('Enable excerpt ellipsis', 'jnews'),
			'dependency'    => array('element' => "boxed", 'value' => 'yes')
		);

		$this->options[] = array(
			'type'          => 'slider',
			'param_name'    => 'excerpt_length',
			'heading'       => esc_html__('Excerpt Length', 'jnews'),
			'description'   => esc_html__('Set word length of excerpt on post block.', 'jnews'),
			'min'           => 0,
			'max'           => 200,
			'step'          => 1,
			'std'           => 20,
			'dependency'    => array( 'element' => 'block_type', 'value' => array( '3', '4', '5', '6', '7', '10', '12', '23', '25', '26', '27', '32', '33', '35', '36', '39' ) )
		);

		$this->options[] = array(
			'type'          => 'textfield',
			'param_name'    => 'excerpt_ellipsis',
			'heading'       => esc_html__('Excerpt Ellipsis', 'jnews'),
			'description'   => esc_html__('Define excerpt ellipsis', 'jnews'),
			'std'           => '...',
			'dependency'    => array( 'element' => 'block_type', 'value' => array( '3', '4', '5', '6', '7', '10', '12', '23', '25', '26', '27', '32', '33', '35', '36', '38' ) )
		);

		$this->options[] = array(
			'type'          => 'dropdown',
			'param_name'    => 'date_format',
			'heading'       => esc_html__('Content Date Format', 'jnews'),
			'description'   => esc_html__('Choose which date format you want to use.', 'jnews'),
			'std'           => 'default',
			'value'         => array(
				esc_html__('Relative Date/Time Format (ago)', 'jnews') => 'ago',
				esc_html__('WordPress Default Format', 'jnews')        => 'default',
				esc_html__('Custom Format', 'jnews')                   => 'custom',
			),
			'dependency'    => array( 'element' => 'block_type', 'value' => array( '3', '4', '5', '6', '7', '10', '12', '23', '25', '26', '27', '32', '33', '35', '36', '37', '38', '39' ) )
		);

		$this->options[] = array(
			'type'          => 'textfield',
			'param_name'    => 'date_format_custom',
			'heading'       => esc_html__('Custom Date Format', 'jnews'),
			'description'   => wp_kses(sprintf(__('Please write custom date format for your module, for more detail about how to write date format, you can refer to this <a href="%s" target="_blank">link</a>.', 'jnews'), 'https://codex.wordpress.org/Formatting_Date_and_Time'), wp_kses_allowed_html()),
			'std'           => 'Y/m/d',
			'dependency'    => array('element' => 'date_format', 'value' => array('custom')),
		);

		$this->options[] = array(
			'type'          => 'checkbox',
			'param_name'    => 'first_page',
			'heading'       => esc_html__('Only First Page', 'jnews'),
			'description'   => esc_html__('Enable this option if you want to show this block only on the first page.', 'jnews'),
			'std'           => false
		);

		$this->options = apply_filters( 'jnews_custom_block_option', $this->options );
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

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'content_typography',
				'label'       => esc_html__( 'Post Content Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for post content', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_post_excerpt, {{WRAPPER}} .jeg_readmore',
			]
		);
	}
}
