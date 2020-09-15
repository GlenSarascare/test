<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Archive;

use JNews\Module\ModuleOptionAbstract;

Class Archive_Title_Option extends ModuleOptionAbstract
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
        return esc_html__('JNews - Archive Title', 'jnews');
    }

    public function set_options()
    {
    	$this->set_general_option();
        $this->set_style_option();
    }

	public function set_general_option()
	{
		$this->options[] = array(
			'type'          => 'textfield',
			'param_name'    => 'title',
			'heading'       => esc_html__('Title', 'jnews'),
			'description'   => esc_html__('Insert a text for block link title.', 'jnews'),
		);

		$this->options[] = array(
			'type'          => 'colorpicker',
			'param_name'    => 'title_color',
			'heading'       => esc_html__('Title Color', 'jnews'),
			'description'   => esc_html__('Set title color.', 'jnews'),
		);

		$this->options[] = array(
			'type'          => 'textfield',
			'param_name'    => 'font_size',
			'heading'       => esc_html__('Font Size', 'jnews'),
			'description'   => esc_html__('Set font size with unit (Ex: 36px or 4em).', 'jnews'),
		);
	}

	public function set_typography_option( $instance ) {
		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'title_typography',
				'label'       => esc_html__( 'Typography', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_archive_title',
			]
		);
	}
}
