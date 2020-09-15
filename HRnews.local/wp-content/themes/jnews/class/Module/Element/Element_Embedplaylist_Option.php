<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Element;

use JNews\Module\ModuleOptionAbstract;

Class Element_Embedplaylist_Option extends ModuleOptionAbstract {
	public function compatible_column() {
		return array( 4, 8, 12 );
	}

	public function get_category() {
		return esc_html__( 'JNews - Element', 'jnews' );
	}

	public function show_color_scheme() {
		return false;
	}

	public function set_options() {
		$this->set_playlist_option();
		$this->set_style_option();
	}

	public function get_module_name() {
		return esc_html__( 'JNews - Youtube / Vimeo Playlist', 'jnews' );
	}

	public function set_playlist_option() {
		$api = get_theme_mod( 'jnews_youtube_api' );

		if ( ! $api ) {
			$this->options[] = array(
				'type'        => 'alert',
				'param_name'  => 'compatible_column_notice',
				'heading'     => esc_html__( 'YouTube API ', 'jnews' ),
				'description' => esc_html__( 'You are not yet enter you YouTube API, please go to Customizer > Additional Option > Global API Key', 'jnews' ),
				'std'         => 'error'
			);
		}

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'layout',
			'heading'     => esc_html__( 'Video Playlist Layout', 'jnews' ),
			'description' => esc_html__( 'Choose video playlist layout.', 'jnews' ),
			'std'         => 'default',
			'value'       => array(
				esc_html__( 'Horizontal', 'jnews' ) => 'horizontal',
				esc_html__( 'Vertical', 'jnews' )   => 'vertical',
			)
		);
		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'scheme',
			'heading'     => esc_html__( 'Video Playlist Scheme', 'jnews' ),
			'description' => esc_html__( 'Choose video scheme color.', 'jnews' ),
			'std'         => 'light',
			'value'       => array(
				esc_html__( 'Light Scheme', 'jnews' ) => 'light',
				esc_html__( 'Dark Scheme', 'jnews' )  => 'dark',
			)
		);
		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'playlist',
			'heading'     => esc_html__( 'YouTube / Vimeo Video', 'jnews' ),
			'description' => esc_html__( 'Enter your youtube / vimeo video separated by comma (Ex : https://www.youtube.com/watch?v=IvcE4o36cAo, https://vimeo.com/180337696).', 'jnews' ),
		);
	}

	public function set_typography_option( $instance ) {

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'title_typography',
				'label'       => esc_html__( 'Title Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for title', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_video_playlist_current_info a,{{WRAPPER}} .jeg_video_playlist_title',
			]
		);

		$instance->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'        => 'meta_typography',
				'label'       => esc_html__( 'Meta Typography', 'jnews' ),
				'description' => esc_html__( 'Set typography for post meta', 'jnews' ),
				'selector'    => '{{WRAPPER}} .jeg_video_playlist_category',
			]
		);
	}
}
