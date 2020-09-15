<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Util;

/**
 * Cache Variable for Plugin
 */
Class Cache {

	public static function cache_term( $terms ) {
		foreach ( $terms as $term ) {
			wp_cache_add( $term->term_id, $term, 'terms' );
		}
	}

	/**
	 * @return array
	 */
	public static function get_users() {
		if ( ! $users = wp_cache_get( 'users', 'jnews' ) ) {
			$users = get_users();
			wp_cache_set( 'users', $users, 'jnews' );
		}

		return $users;
	}

	/**
	 * @return array
	 */
	public static function get_count_users() {
		if ( ! $count = wp_cache_get( 'count_users', 'jnews' ) ) {
			$count = count_users();
			wp_cache_set( 'count_users', $count, 'jnews' );
		}

		return $count;
	}

	/**
	 * @return array
	 */
	public static function get_categories() {
		if ( ! $categories = wp_cache_get( 'categories', 'jnews' ) ) {
			$categories = get_categories( array( 'hide_empty' => 0 ) );
			wp_cache_set( 'categories', $categories, 'jnews' );
			self::cache_term( $categories );
		}

		return $categories;
	}

	/**
	 * @return array
	 */
	public static function get_categories_count() {
		if ( ! $count = wp_cache_get( 'categories_count', 'jnews' ) ) {
			$count = wp_count_terms( 'category' );
			wp_cache_set( 'categories_count', $count, 'jnews' );
		}

		return $count;
	}

	/**
	 * @return array
	 */
	public static function get_tags() {
		if ( ! $tags = wp_cache_get( 'tags', 'jnews' ) ) {
			$tags = get_tags( array( 'hide_empty' => 0 ) );
			wp_cache_set( 'tags', $tags, 'jnews' );
			self::cache_term( $tags );
		}

		return $tags;
	}

	/**
	 * @return array
	 */
	public static function get_tags_count() {
		if ( ! $count = wp_cache_get( 'tags_count', 'jnews' ) ) {
			$count = wp_count_terms( 'post_tag' );
			wp_cache_set( 'tags_count', $count, 'jnews' );
		}

		return $count;
	}

	/**
	 * @return array
	 */
	public static function get_post_type() {
		if ( ! $post_type = wp_cache_get( 'post_type', 'jnews' ) ) {
			$post_type = get_post_types( array(
				'public'  => true,
				'show_ui' => true
			) );
			wp_cache_set( 'post_type', $post_type, 'jnews' );
		}

		return $post_type;
	}

	/**
	 * @return array|bool|mixed
	 */
	public static function get_exclude_post_type() {
		if ( ! $post_type = wp_cache_get( 'exclude_post_type', 'jnews' ) ) {
			$post_types = self::get_post_type();
			$result     = array();

			$exclude_post_type = array(
				'attachment',
				'custom-post-template',
				'archive-template',
				'custom-mega-menu',
				'elementor_library',
				'footer'
			);

			foreach ( $post_types as $type ) {
				if ( ! in_array( $type, $exclude_post_type ) ) {
					$result[ $type ] = get_post_type_object( $type )->label;
				}
			}

			$post_type = $result;

			wp_cache_set( 'exclude_post_type', $post_type, 'jnews' );
		}

		return $post_type;
	}

	/**
	 * @return array
	 */
	public static function get_menu() {
		if ( ! $menu = wp_cache_get( 'menu', 'jnews' ) ) {
			$menu = wp_get_nav_menus();
			wp_cache_set( 'menu', $menu, 'jnews' );
		}

		return $menu;
	}

	/**
	 * @return array|bool|mixed
	 */
	public static function get_enable_custom_taxonomies() {
		if ( ! $result = wp_cache_get( 'enable_custom_taxonomies', 'jnews' ) ) {
			$result     = array();
			$post_types = jnews_get_all_post_type();

			unset( $post_types['post'] );
			unset( $post_types['page'] );

			if ( ! empty( $post_types ) ) {

				foreach ( $post_types as $post_type => $label ) {

					$taxonomies = get_object_taxonomies( $post_type );

					if ( ! empty( $taxonomies ) && is_array( $taxonomies ) ) {

						foreach ( $taxonomies as $taxonomy ) {

							$taxonomy_data = get_taxonomy( $taxonomy );

							if ( $taxonomy_data->show_in_menu ) {
								$result[ $taxonomy ] = array(
									'name' => $taxonomy_data->labels->name,
									'post_types' => $taxonomy_data->object_type
								);
							}
						}
					}
				}
			}

			wp_cache_set( 'enable_custom_taxonomies', $result, 'jnews' );
		}

		return $result;
	}
}
