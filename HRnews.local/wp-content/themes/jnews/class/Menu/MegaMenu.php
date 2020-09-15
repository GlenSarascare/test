<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Menu;

Class MegaMenu {

	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_asset' ) );
		add_action( 'wp_update_nav_menu_item', array( $this, 'custom_nav_update' ), 10, 2 );

		if ( apply_filters( 'jnews_load_mega_menu_option', false ) ) {
			add_filter( 'jeg_load_form_menu', '__return_true' );
			add_filter( 'jeg_custom_menu_segment', array( $this, 'menu_segment' ) );
			add_filter( 'jeg_custom_menu_field', array( $this, 'menu_field' ), null, 2 );
			add_filter( 'jeg_form_menu_meta_name', array( $this, 'get_meta_name' ) );
		}
	}

	public function get_meta_name() {
		return 'menu_item_jnews_mega_menu';
	}

	public function get_value( $id, $value, $default ) {
		if ( isset( $value[ $id ] ) ) {
			return $value[ $id ];
		} else {
			return $default;
		}
	}

	public function menu_field( $fields, $value ) {

		$fields['type'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'radioimage',
			'title'       => esc_html__( 'Mega Menu Type', 'jnews' ),
			'description' => esc_html__( 'Choose which mega menu type you want to use in this menu.', 'jnews' ),
			'default'     => 'disable',
			'options'     => array(
				'disable'    => JNEWS_THEME_URL . '/assets/img/admin/megamenu-none.png',
				'category_1' => JNEWS_THEME_URL . '/assets/img/admin/megamenu-1.png',
				'category_2' => JNEWS_THEME_URL . '/assets/img/admin/megamenu-2.png',
				'custom'     => JNEWS_THEME_URL . '/assets/img/admin/megamenu-custom.png',
			)
		);

		$fields['custom_mega'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'select',
			'title'       => esc_html__( 'Custom Mega Menu', 'jnews' ),
			'description' => esc_html__( 'choose which mega menu page you want to use', 'jnews' ),
			'default'     => '',
			'options'     => call_user_func( function () {
				$post = get_posts( array(
					'posts_per_page' => - 1,
					'post_type'      => 'custom-mega-menu',
				) );

				$menu   = array();
				$menu[] = esc_html__( 'Choose Mega Menu', 'jnews' );

				if ( $post ) {
					foreach ( $post as $value ) {
						$menu[ $value->ID ] = $value->post_title;
					}
				}

				return $menu;
			} ),
			'dependency'  => array(
				array(
					'field'    => 'type',
					'operator' => 'in',
					'value'    => array( 'custom' )
				),
			)
		);

		$fields['category'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'select',
			'multiple'    => 1,
			'title'       => esc_html__( 'Choose Category', 'jnews' ),
			'description' => esc_html__( 'Choose which category you want to use for this mega menu.', 'jnews' ),
			'default'     => '',
			'options'     => call_user_func( function () use ( $value ) {
				$result = array();
				$count  = wp_count_terms( 'category' );

				if ( (int) $count <= jnews_load_resource_limit() ) {
					$terms = get_categories( array( 'hide_empty' => 0 ) );
					foreach ( $terms as $term ) {
						$result[ $term->term_id ] = $term->name;
					}
				} else {
					$selected = $value['category'];

					if ( ! empty( $selected ) ) {
						$terms = get_categories( array(
							'hide_empty'   => false,
							'hierarchical' => true,
							'include'      => $selected,
						) );

						foreach ( $terms as $term ) {
							$result[ $term->term_id ] = $term->name;
						}
					}
				}

				return $result;
			} ),
			'ajax'        => 'jeg_find_category',
			'nonce'       => wp_create_nonce( 'jeg_find_category' ),
			'dependency'  => array(
				array(
					'field'    => 'type',
					'operator' => 'in',
					'value'    => array( 'category_1', 'category_2' )
				),
			)
		);

		$fields['number'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'slider',
			'title'       => esc_html__( 'Number of Post', 'jnews' ),
			'description' => esc_html__( 'Set max number show for mega menu.', 'jnews' ),
			'default'     => 9,
			'options'     => array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1
			),
			'dependency'  => array(
				array(
					'field'    => 'type',
					'operator' => 'in',
					'value'    => array( 'category_1', 'category_2' )
				),
			)
		);

		$fields['override_item_row'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'checkbox',
			'title'       => esc_html__( 'Override Number of row', 'jnews' ),
			'description' => esc_html__( 'override default number item per row', 'jnews' ),
			'default'     => false,
			'dependency'  => array(
				array(
					'field'    => 'type',
					'operator' => '==',
					'value'    => 'category_1'
				),
			)
		);

		$fields['item_row'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'slider',
			'title'       => esc_html__( 'Number of item per Row', 'jnews' ),
			'description' => esc_html__( 'Set total item per row', 'jnews' ),
			'default'     => 3,
			'options'     => array(
				'min'  => 3,
				'max'  => 8,
				'step' => 1
			),
			'name'        => 'item_row',
			'dependency'  => array(
				array(
					'field'    => 'override_item_row',
					'operator' => '==',
					'value'    => true
				),
				array(
					'field'    => 'type',
					'operator' => '==',
					'value'    => 'category_1'
				),
			)
		);

		$fields['trending_tag'] = array(
			'segment'     => 'mega-menu-category',
			'type'        => 'select',
			'multiple'    => 100,
			'title'       => esc_html__( 'Trending Tag', 'jnews' ),
			'description' => esc_html__( 'Write to search post tag.', 'jnews' ),
			'ajax'        => 'jeg_find_tag',
			'nonce'       => wp_create_nonce( 'jeg_find_tag' ),
			'options'     => call_user_func( function () use ( $value ) {
				$result = array();
				$count  = wp_count_terms( 'post_tag' );

				if ( (int) $count <= jnews_load_resource_limit() ) {
					$terms = get_tags( array( 'hide_empty' => 0 ) );
					foreach ( $terms as $term ) {
						$result[ $term->term_id ] = $term->name;
					}
				} else {
					if ( ! empty( $value ) && isset( $value['trending_tag'] ) ) {
						$selected = $value['trending_tag'];

						if ( ! empty( $selected ) ) {
							$terms = get_tags( array(
								'hide_empty'   => false,
								'hierarchical' => true,
								'include'      => $selected,
							) );

							foreach ( $terms as $term ) {
								$result[ $term->term_id ] = $term->name;
							}
						}
					}
				}

				return $result;
			} ),
			'default'     => '',
			'dependency'  => array(
				array(
					'field'    => 'type',
					'operator' => '==',
					'value'    => 'category_2'
				),
			),
		);

		$fields['child_mega'] = array(
			'segment'     => 'child-mega-menu',
			'type'        => 'radioimage',
			'title'       => esc_html__( 'Mega Menu Child', 'jnews' ),
			'description' => esc_html__( 'Set mega menu for this menu child.', 'jnews' ),
			'default'     => 'disable',
			'options'     => array(
				'disable'   => JNEWS_THEME_URL . '/assets/img/admin/megamenu-none.png',
				'two_row'   => JNEWS_THEME_URL . '/assets/img/admin/menuchild-2col.png',
				'three_row' => JNEWS_THEME_URL . '/assets/img/admin/menuchild-3col.png',
				'four_row'  => JNEWS_THEME_URL . '/assets/img/admin/menuchild-4col.png',
			)
		);

		$fields['enable_icon'] = array(
			'segment'     => 'menu-icon',
			'type'        => 'checkbox',
			'title'       => esc_html__( 'Enable icon on this menu', 'jnews' ),
			'description' => esc_html__( 'turn this option on to enable icon on this menu', 'jnews' ),
			'default'     => false,
		);

		$fields['enable_icon_image'] = array(
			'segment'     => 'menu-icon',
			'type'        => 'checkbox',
			'title'       => esc_html__( 'Use image as icon', 'jnews' ),
			'description' => esc_html__( 'turn this option on to use image as icon on this menu', 'jnews' ),
			'default'     => false,
			'dependency'  => array(
				array(
					'field'    => 'enable_icon',
					'operator' => '==',
					'value'    => true
				),
			),
		);

		$fields['icon'] = array(
			'segment'     => 'menu-icon',
			'type'        => 'iconpicker',
			'title'       => esc_html__( 'Choose icon', 'jnews' ),
			'description' => esc_html__( 'choose which icon you want to use on this menu', 'jnews' ),
			'default'     => '',
			'dependency'  => array(
				array(
					'field'    => 'enable_icon',
					'operator' => '==',
					'value'    => true
				),
				array(
					'field'    => 'enable_icon_image',
					'operator' => '!=',
					'value'    => true
				),
			),
		);

		$fields['icon_image'] = array(
			'segment'     => 'menu-icon',
			'type'        => 'image',
			'title'       => esc_html__( 'Choose icon image', 'jnews' ),
			'description' => esc_html__( 'choose which image you want to use as icon on this menu', 'jnews' ),
			'default'     => '',
			'dependency'  => array(
				array(
					'field'    => 'enable_icon_image',
					'operator' => '==',
					'value'    => true
				),
			),
		);

		$fields['icon_color'] = array(
			'segment'     => 'menu-icon',
			'type'        => 'color',
			'title'       => esc_html__( 'Icon color', 'jnews' ),
			'description' => esc_html__( 'choose color for this icon', 'jnews' ),
			'default'     => false,
			'dependency'  => array(
				array(
					'field'    => 'enable_icon',
					'operator' => '==',
					'value'    => true
				),
				array(
					'field'    => 'enable_icon_image',
					'operator' => '!=',
					'value'    => true
				),
			),
		);

		$fields['badge'] = array(
			'segment'     => 'menu-badge',
			'type'        => 'radioimage',
			'title'       => esc_html__( 'Menu Badge Type', 'jnews' ),
			'description' => esc_html__( 'Choose badge type you want to use in this menu.', 'jnews' ),
			'default'     => 'disable',
			'options'     => array(
				'disable'  => JNEWS_THEME_URL . '/assets/img/admin/megamenu-none.png',
				'floating' => JNEWS_THEME_URL . '/assets/img/admin/menu-badge-floating.png',
				'inline'   => JNEWS_THEME_URL . '/assets/img/admin/menu-badge-inline.png',
			)
		);

		$fields['badge_bg_color'] = array(
			'segment'     => 'menu-badge',
			'type'        => 'color',
			'title'       => esc_html__( 'Choose Badge Color', 'jnews' ),
			'description' => esc_html__( 'Choose the color you want to your badge.', 'jnews' ),
			'default'     => '#f70d28',
			'dependency'  => array(
				array(
					'field'    => 'badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		$fields['badge_text_color'] = array(
			'segment'     => 'menu-badge',
			'type'        => 'color',
			'title'       => esc_html__( 'Choose Badge Text Color', 'jnews' ),
			'description' => esc_html__( 'Choose the text color you want to your badge.', 'jnews' ),
			'default'     => '#fff',
			'dependency'  => array(
				array(
					'field'    => 'badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		$fields['badge_text'] = array(
			'segment'     => 'menu-badge',
			'type'        => 'text',
			'title'       => esc_html__( 'Badge Text', 'jnews' ),
			'description' => esc_html__( 'Set badge text for this menu.', 'jnews' ),
			'default'     => '',
			'dependency'  => array(
				array(
					'field'    => 'badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		$fields['child_badge'] = array(
			'segment'     => 'child-menu-badge',
			'type'        => 'radioimage',
			'title'       => esc_html__( 'Menu Badge Type', 'jnews' ),
			'description' => esc_html__( 'Choose badge type you want to use in this menu.', 'jnews' ),
			'default'     => 'disable',
			'options'     => array(
				'disable' => JNEWS_THEME_URL . '/assets/img/admin/megamenu-none.png',
				'inline'  => JNEWS_THEME_URL . '/assets/img/admin/submenu-badge-inline.png',
			)
		);

		$fields['child_badge_bg_color'] = array(
			'segment'     => 'child-menu-badge',
			'type'        => 'colorpicker',
			'title'       => esc_html__( 'Choose Badge Color', 'jnews' ),
			'description' => esc_html__( 'Choose the color you want to your badge.', 'jnews' ),
			'default'     => '#f70d28',
			'dependency'  => array(
				array(
					'field'    => 'child_badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		$fields['child_badge_text_color'] = array(
			'segment'     => 'child-menu-badge',
			'type'        => 'colorpicker',
			'title'       => esc_html__( 'Choose Badge Text Color', 'jnews' ),
			'description' => esc_html__( 'Choose the text color you want to your badge.', 'jnews' ),
			'default'     => '#fff',
			'dependency'  => array(
				array(
					'field'    => 'child_badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		$fields['child_badge_text'] = array(
			'segment'     => 'child-menu-badge',
			'type'        => 'text',
			'title'       => esc_html__( 'Badge Text', 'jnews' ),
			'description' => esc_html__( 'Set badge text for this menu.', 'jnews' ),
			'default'     => '',
			'dependency'  => array(
				array(
					'field'    => 'child_badge',
					'operator' => '!=',
					'value'    => 'disable'
				)
			)
		);

		foreach ( $fields as $key => $field ) {
			$fields[ $key ]['value'] = $this->get_value( $key, $value, $field['default'] );
		}

		return $fields;
	}

	public function menu_segment( $segment ) {
		$segment[] = array(
			'id'   => 'mega-menu-category',
			'name' => esc_html__( 'Mega Menu Category', 'jnews' ),
		);

		$segment[] = array(
			'id'   => 'child-mega-menu',
			'name' => esc_html__( 'Child Level Mega Menu', 'jnews' ),
		);

		$segment[] = array(
			'id'   => 'menu-icon',
			'name' => esc_html__( 'Menu Icon', 'jnews' ),
		);

		$segment[] = array(
			'id'   => 'menu-badge',
			'name' => esc_html__( 'Menu Badge', 'jnews' ),
		);

		$segment[] = array(
			'id'   => 'child-menu-badge',
			'name' => esc_html__( 'Child Menu Badge', 'jnews' ),
		);

		return $segment;
	}

	public function custom_nav_update( $menu_id, $menu_item_db_id ) {
		if ( isset( $_POST['jnews_mega_menu'] ) && isset( $_POST['jnews_mega_menu'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, 'menu_item_jnews_mega_menu', $_POST['jnews_mega_menu'][ $menu_item_db_id ] );

			$flag = false;

			foreach ( $_POST['jnews_mega_menu'] as $menu ) {
				if ( $menu['type'] === 'custom' ) {
					$flag = true;
				}
			}

			update_option( 'load_vc_css_menu', $flag );
		}
	}

	public function load_asset( $menu ) {
		if ( $menu === 'nav-menus.php' ) {
			wp_enqueue_style( 'jeg-admin-style', get_parent_theme_file_uri( 'assets/css/admin/admin-menu.css' ) );
		}
	}
}
