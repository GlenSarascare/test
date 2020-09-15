<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Element;

use JNews\Module\ModuleOptionAbstract;

/**
 * Class Element_Userlist_Option
 *
 * @package JNews\Module\Element
 */
class Element_Userlist_Option extends ModuleOptionAbstract {
	public function compatible_column() {
		return array( 4, 8, 12 );
	}

	public function set_options() {
		$this->set_general_option();
		$this->set_header_option();
		$this->set_content_filter_option( 5 );
	}

	public function get_module_name() {
		return esc_html__( 'JNews - User List', 'jnews' );
	}

	public function get_category() {
		return esc_html__( 'JNews - Element', 'jnews' );
	}

	public function role_list() {
		global $wp_roles;
		$roles    = $wp_roles->roles;
		$rolelist = array();

		if ( $roles ) {
			foreach ( $roles as $key => $value ) {
				$rolelist[ $value['name'] ] = $key;
			}

			return $rolelist;
		}
	}

	public function set_general_option() {
		$dependency_style_4  = array(
			'element'  => 'userlist_style',
			'operator' => '==',
			'value'    => array( 'style-1', 'style-2', 'style-3', 'style-5' ),
		);
		$dependency_style_45 = array(
			'element'  => 'userlist_style',
			'operator' => '==',
			'value'    => array( 'style-1', 'style-2', 'style-3' ),
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'userlist_style',
			'std'         => 'style-1',
			'value'       => array(
				esc_html__( 'Style 1', 'jnews' ) => 'style-1',
				esc_html__( 'Style 2', 'jnews' ) => 'style-2',
				esc_html__( 'Style 3', 'jnews' ) => 'style-3',
				esc_html__( 'Style 4', 'jnews' ) => 'style-4',
				esc_html__( 'Style 5', 'jnews' ) => 'style-5',
			),
			'heading'     => esc_html__( 'User List Style', 'jnews' ),
			'description' => esc_html__( 'Choose which style that fit your site.', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'userlist_block1',
			'heading'     => esc_html__( 'User Blocks Width', 'jnews' ),
			'description' => esc_html__( 'Please choose the width of author block that fit your column layout.', 'jnews' ),
			'std'         => 'jeg_4_block',
			'value'       => array(
				esc_html__( '1 Block  — (100%)', 'jnews' ) => 'jeg_1_block',
				esc_html__( '2 Blocks — (50%)', 'jnews' )  => 'jeg_2_block',
				esc_html__( '3 Blocks — (33%)', 'jnews' )  => 'jeg_3_block',
				esc_html__( '4 Blocks — (25%)', 'jnews' )  => 'jeg_4_block',
				esc_html__( '5 Blocks — (20%)', 'jnews' )  => 'jeg_5_block',
			),
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-1', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'userlist_block2',
			'heading'     => esc_html__( 'User Blocks Width', 'jnews' ),
			'description' => esc_html__( 'Please choose the width of user block that fit your column layout.', 'jnews' ),
			'std'         => 'jeg_3_block',
			'value'       => array(
				esc_html__( '1 Block  — (100%)', 'jnews' ) => 'jeg_1_block',
				esc_html__( '2 Blocks — (50%)', 'jnews' )  => 'jeg_2_block',
				esc_html__( '3 Blocks — (33%)', 'jnews' )  => 'jeg_3_block',
			),
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2' ),
			),
		);

		$this->options[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'userlist_block3',
			'heading'     => esc_html__( 'User Blocks Width', 'jnews' ),
			'description' => esc_html__( 'Please choose the width of user block that fit your column layout.', 'jnews' ),
			'std'         => 'jeg_5_block',
			'value'       => array(
				esc_html__( '1 Block  — (100%)', 'jnews' ) => 'jeg_1_block',
				esc_html__( '2 Blocks — (50%)', 'jnews' )  => 'jeg_2_block',
				esc_html__( '3 Blocks — (33%)', 'jnews' )  => 'jeg_3_block',
				esc_html__( '4 Blocks — (25%)', 'jnews' )  => 'jeg_4_block',
				esc_html__( '5 Blocks — (20%)', 'jnews' )  => 'jeg_5_block',
				esc_html__( '6 Blocks — (17%)', 'jnews' )  => 'jeg_6_block',
			),
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-3' ),
			),
		);

		$this->options[] = array(
			'type'       => 'checkbox',
			'param_name' => 'userlist_desc',
			'heading'    => esc_html__( 'Hide Description', 'jnews' ),
			'value'      => array( esc_html__( '  Hide user description.', 'jnews' ) => 'no' ),
			'dependency' => $dependency_style_45,
		);

		if ( defined( 'JNEWS_VIDEO' ) ) {
			$this->options[] = array(
				'type'       => 'checkbox',
				'param_name' => 'follow_button',
				'heading'    => esc_html__( 'Show Follow Button', 'jnews' ),
				'value'      => array( esc_html__( '  Show Follow Button.', 'jnews' ) => 'yes' ),
				'dependency' => array(
					'element' => 'userlist_style',
					'value'   => array( 'style-2', 'style-3', 'style-5' ),
				),
			);

			$this->options[] = array(
				'type'       => 'checkbox',
				'param_name' => 'userlist_subscriber',
				'heading'    => esc_html__( 'Show User Subscriber', 'jnews' ),
				'value'      => array( esc_html__( '  Show user subscriber.', 'jnews' ) => 'yes' ),
				'dependency' => array(
					'element' => 'userlist_style',
					'value'   => array( 'style-2', 'style-3', 'style-5' ),
				),
			);
		}

		$this->options[] = array(
			'type'       => 'checkbox',
			'param_name' => 'userlist_trunc',
			'heading'    => esc_html__( 'Truncate Description', 'jnews' ),
			'value'      => array( esc_html__( '  Truncate user description if it is too long.', 'jnews' ) => 'no' ),
			'dependency' => $dependency_style_45,
		);

		$this->options[] = array(
			'type'       => 'checkbox',
			'param_name' => 'userlist_social',
			'heading'    => esc_html__( 'Hide Socials', 'jnews' ),
			'value'      => array( esc_html__( '  Hide user social accounts.', 'jnews' ) => 'no' ),
			'dependency' => $dependency_style_45,
		);

		$this->options[] = array(
			'type'       => 'dropdown',
			'param_name' => 'userlist_align',
			'std'        => 'jeg_user_align_left',
			'value'      => array(
				esc_html__( 'Center', 'jnews' ) => 'jeg_user_align_center',
				esc_html__( 'Left', 'jnews' )   => 'jeg_user_align_left',
				esc_html__( 'Right', 'jnews' )  => 'jeg_user_align_right',
			),
			'heading'    => esc_html__( 'User List Align', 'jnews' ),
			'dependency' => $dependency_style_4,
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'title_color',
			'heading'     => esc_html__( 'Title Color', 'jnews' ),
			'description' => esc_html__( 'This option will change your Title color.', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'desc_color',
			'heading'     => esc_html__( 'Description Color', 'jnews' ),
			'description' => esc_html__( 'This option will change your Description color.', 'jnews' ),
			'std'         => '#A0A0A0',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-1' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'border_color',
			'heading'     => esc_html__( 'Border Color', 'jnews' ),
			'description' => esc_html__( 'This option will change your Border color.', 'jnews' ),
			'std'         => '#EEEEEE',
			'dependency'  => $dependency_style_45,
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'accent_color',
			'heading'     => esc_html__( 'Accent Color & Link Hover', 'jnews' ),
			'description' => esc_html__( 'This option will change your accent color.', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'block_background',
			'heading'     => esc_html__( 'Block Background', 'jnews' ),
			'description' => esc_html__( 'This option will change your Block Background', 'jnews' ),
			'std'         => '#F9F9F9',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-1', 'style-2', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_background',
			'heading'     => esc_html__( 'Subscribe Button Background', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button background color', 'jnews' ),
			'std'         => '#FFFFFF',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_color',
			'heading'     => esc_html__( 'Subscribe Button Color', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button text color', 'jnews' ),
			'std'         => '#53585C',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_border_color',
			'heading'     => esc_html__( 'Subscribe Button Border Color', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button border color', 'jnews' ),
			'std'         => '#E8E8E8',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_hover_background',
			'heading'     => esc_html__( 'Subscribe Button Hover Background', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button background hover color', 'jnews' ),
			'std'         => '#FFFFFF',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_hover_color',
			'heading'     => esc_html__( 'Subscribe Button Hover Color', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button text hover color', 'jnews' ),
			'std'         => '#53585C',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'subscribe_hover_border_color',
			'heading'     => esc_html__( 'Subscribe Button Hover Border Color', 'jnews' ),
			'description' => esc_html__( 'Change the subscribe button hover border color', 'jnews' ),
			'std'         => '#E8E8E8',
			'dependency'  => array(
				'element' => 'userlist_style',
				'value'   => array( 'style-2', 'style-3', 'style-5' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'alt_color',
			'heading'     => esc_html__( 'Meta Color', 'jnews' ),
			'description' => esc_html__( 'This option will change your meta color.', 'jnews' ),
			'std'         => '#A0A0A0',
		);
	}

	public function set_header_option() {
		$this->options[] = array(
			'type'        => 'iconpicker',
			'param_name'  => 'header_icon',
			'heading'     => esc_html__( 'Header Icon', 'jnews' ),
			'description' => esc_html__( 'Choose icon for this block icon.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
			'std'         => '',
			'settings'    => array(
				'emptyIcon'    => true,
				'iconsPerPage' => 100,
			),
		);

		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'first_title',
			'holder'      => 'span',
			'heading'     => esc_html__( 'Title', 'jnews' ),
			'description' => esc_html__( 'Main title of Module Block.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'second_title',
			'holder'      => 'span',
			'heading'     => esc_html__( 'Second Title', 'jnews' ),
			'description' => esc_html__( 'Secondary title of Module Block.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'textfield',
			'param_name'  => 'url',
			'heading'     => esc_html__( 'Title URL', 'jnews' ),
			'description' => esc_html__( 'Insert URL of heading title.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'radioimage',
			'param_name'  => 'header_type',
			'std'         => 'heading_6',
			'value'       => array(
				JNEWS_THEME_URL . '/assets/img/admin/heading-1.png' => 'heading_1',
				JNEWS_THEME_URL . '/assets/img/admin/heading-2.png' => 'heading_2',
				JNEWS_THEME_URL . '/assets/img/admin/heading-3.png' => 'heading_3',
				JNEWS_THEME_URL . '/assets/img/admin/heading-4.png' => 'heading_4',
				JNEWS_THEME_URL . '/assets/img/admin/heading-5.png' => 'heading_5',
				JNEWS_THEME_URL . '/assets/img/admin/heading-6.png' => 'heading_6',
				JNEWS_THEME_URL . '/assets/img/admin/heading-7.png' => 'heading_7',
				JNEWS_THEME_URL . '/assets/img/admin/heading-8.png' => 'heading_8',
				JNEWS_THEME_URL . '/assets/img/admin/heading-9.png' => 'heading_9',
			),
			'heading'     => esc_html__( 'Header Type', 'jnews' ),
			'description' => esc_html__( 'Choose which header type fit with your content design.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'header_background',
			'heading'     => esc_html__( 'Header Background', 'jnews' ),
			'description' => esc_html__( 'This option may not work for all of heading type.', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
			'dependency'  => array(
				'element' => 'header_type',
				'value'   => array(
					'heading_1',
					'heading_2',
					'heading_3',
					'heading_4',
					'heading_5',
				),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'header_secondary_background',
			'heading'     => esc_html__( 'Header Secondary Background', 'jnews' ),
			'description' => esc_html__( 'change secondary background', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
			'dependency'  => array(
				'element' => 'header_type',
				'value'   => array( 'heading_2' ),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'header_text_color',
			'heading'     => esc_html__( 'Header Text Color', 'jnews' ),
			'description' => esc_html__( 'Change color of your header text', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'header_line_color',
			'heading'     => esc_html__( 'Header line Color', 'jnews' ),
			'description' => esc_html__( 'Change line color of your header', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
			'dependency'  => array(
				'element' => 'header_type',
				'value'   => array(
					'heading_1',
					'heading_5',
					'heading_6',
					'heading_9',
				),
			),
		);

		$this->options[] = array(
			'type'        => 'colorpicker',
			'param_name'  => 'header_accent_color',
			'heading'     => esc_html__( 'Header Accent', 'jnews' ),
			'description' => esc_html__( 'Change Accent of your header', 'jnews' ),
			'group'       => esc_html__( 'Header', 'jnews' ),
			'dependency'  => array(
				'element' => 'header_type',
				'value'   => array(
					'heading_6',
					'heading_7',
				),
			),
		);
	}

	public function set_content_filter_option( $number = 10, $hide_number_post = false ) {

		$this->options[] = array(
			'type'        => 'slider',
			'param_name'  => 'number_user',
			'heading'     => esc_html__( 'Number of user', 'jnews' ),
			'description' => esc_html__( 'Show number of user on this module.', 'jnews' ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
			'min'         => 1,
			'max'         => 30,
			'step'        => 1,
			'std'         => $number,
		);

		$this->options[] = array(
			'type'        => 'select',
			'multiple'    => PHP_INT_MAX,
			'param_name'  => 'userlist_show_role',
			'std'         => '',
			'value'       => $this->role_list(),
			'heading'     => esc_html__( 'Show Role', 'jnews' ),
			'description' => esc_html__( 'Enter which user role will be shown in this module.', 'jnews' ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'select',
			'multiple'    => PHP_INT_MAX,
			'param_name'  => 'userlist_hide_role',
			'std'         => '',
			'value'       => $this->role_list(),
			'heading'     => esc_html__( 'Hide Role', 'jnews' ),
			'description' => esc_html__( 'Enter which user role will be hidden in this module.', 'jnews' ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
		);

		$this->options[] = array(
			'type'        => 'select',
			'multiple'    => PHP_INT_MAX,
			'ajax'        => 'jeg_find_author',
			'options'     => 'jeg_get_author_option',
			'nonce'       => wp_create_nonce( 'jeg_find_author' ),

			'param_name'  => 'include_user',
			'heading'     => esc_html__( 'Include User ID', 'jnews' ),
			'description' => wp_kses( __( 'Tips :<br/> - You can search user id by inputing the user display name.<br/>- You can also directly insert the user id, and click enter to add it on the list.', 'jnews' ), wp_kses_allowed_html() ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
			'std'         => '',
		);

		$this->options[] = array(
			'type'        => 'select',
			'multiple'    => PHP_INT_MAX,
			'ajax'        => 'jeg_find_author',
			'options'     => 'jeg_get_author_option',
			'nonce'       => wp_create_nonce( 'jeg_find_author' ),

			'param_name'  => 'exclude_user',
			'heading'     => esc_html__( 'Exclude User ID', 'jnews' ),
			'description' => wp_kses( __( 'Tips :<br/> - You can search user id by inputing the user display name.<br/>- You can also directly insert the user id, and click enter to add it on the list.', 'jnews' ), wp_kses_allowed_html() ),
			'group'       => esc_html__( 'Content Filter', 'jnews' ),
			'std'         => '',
		);

	}
}
