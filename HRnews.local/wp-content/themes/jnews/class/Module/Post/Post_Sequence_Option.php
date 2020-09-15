<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Post;

use JNews\Module\ModuleOptionAbstract;

Class Post_Sequence_Option extends ModuleOptionAbstract
{
    public function get_category()
    {
        return esc_html__('JNews - Post', 'jnews');
    }

    public function compatible_column()
    {
        return array( 1,2,3,4,5,6,7,8,9,10,11,12 );
    }

    public function get_module_name()
    {
        return esc_html__('JNews - Post Next Prev', 'jnews');
    }

    public function set_options()
    {
        $this->set_style_option();
    }

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Title Typography', 'jnews' ),
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'nav_typography',
				'label'    => esc_html__( 'Nav Text Typography', 'jnews' ),
				'selector' => '{{WRAPPER}} .jeg_prevnext_post .caption',
			]
		);
	}

}
