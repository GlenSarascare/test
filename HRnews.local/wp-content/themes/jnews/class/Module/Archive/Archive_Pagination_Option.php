<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Archive;

use JNews\Module\ModuleOptionAbstract;

Class Archive_Pagination_Option extends ModuleOptionAbstract
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
        return esc_html__('JNews - Archive Pagination', 'jnews');
    }

    public function set_options()
    {
    	$this->set_general_option();
        $this->set_style_option();
    }

	public function set_general_option()
	{
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
			)
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
			)
		);

		$this->options[] = array(
			'type'          => 'checkbox',
			'param_name'    => 'pagination_navtext',
			'group'         => esc_html__('Pagination', 'jnews'),
			'heading'       => esc_html__('Show Navigation Text', 'jnews'),
			'value'         => array( esc_html__("Show navigation text (next, prev).", 'jnews') => 'yes' )
		);

		$this->options[] = array(
			'type'          => 'checkbox',
			'param_name'    => 'pagination_pageinfo',
			'group'         => esc_html__('Pagination', 'jnews'),
			'heading'       => esc_html__('Show Page Info', 'jnews'),
			'value'         => array( esc_html__("Show page info text (Page x of y).", 'jnews') => 'yes' ),
		);
	}

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'pagination_typography',
				'label'       => esc_html__( 'Typography', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_pagination *',
			]
		);
	}
}
