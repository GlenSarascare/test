<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Archive;

use JNews\Module\ModuleOptionAbstract;

Class Archive_Breadcrumb_Option extends ModuleOptionAbstract
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
        return esc_html__('JNews - Archive Breadcrumb', 'jnews');
    }

    public function set_options()
    {
	    $this->options[] = array(
		    'type'          => 'colorpicker',
		    'param_name'    => 'text_color',
		    'heading'       => esc_html__('Text Color', 'jnews'),
		    'description'   => esc_html__('Set text color.', 'jnews'),
	    );

	    $this->options[] = array(
		    'type'          => 'colorpicker',
		    'param_name'    => 'text_color_hover',
		    'heading'       => esc_html__('Hover Text Color', 'jnews'),
		    'description'   => esc_html__('Set hover text color.', 'jnews'),
	    );

	    $this->options[] = array(
		    'type'          => 'colorpicker',
		    'param_name'    => 'arrow_color',
		    'heading'       => esc_html__('Arrow Color', 'jnews'),
		    'description'   => esc_html__('Set arrow icon color.', 'jnews'),
	    );

	    $this->options[] = array(
		    'type'          => 'textfield',
		    'param_name'    => 'font_size',
		    'heading'       => esc_html__('Font Size', 'jnews'),
		    'description'   => esc_html__('Set font size with unit (Ex: 36px or 4em).', 'jnews'),
	    );

        $this->set_style_option();
    }

	public function set_typography_option( $instance ) {
		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'breadcrumb_typography',
				'label'       => esc_html__( 'Typography', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_breadcrumbs span a',
			]
		);
	}
}
