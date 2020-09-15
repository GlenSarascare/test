<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Archive\Builder;

Class ArchiveBuilder {

	private static $instance;

	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {
		add_action( 'init', array( $this, 'post_type' ), 9 );

		add_filter( 'single_template', array( $this, 'template_editor' ) );

		Tag::getInstance();
		Author::getInstance();

		$this->override_archive_template_option( 'tag' );
		$this->override_archive_template_option( 'author' );
		$this->override_archive_template_builder();

		if ( is_admin() ) {
			add_filter( 'vc_get_all_templates', array( $this, 'archive_template' ) );
			add_filter( 'vc_templates_render_category', array( $this, 'archive_template_render' ) );
			add_filter( 'vc_templates_render_backend_template', array( $this, 'ajax_template_backend' ), null, 2 );
		} else {
			add_action( 'wp_head', array( $this, 'custom_post_css' ), 999 );
			add_filter( 'vc_templates_render_frontend_template', array( $this, 'ajax_template_frontend' ), null, 2 );
		}
	}

	public function custom_post_css() {
		if ( jnews_get_option( 'single_category_template', false ) ) {

			$custom_page_id = $this->get_custom_page_id();

			$this->add_page_custom_css( $custom_page_id );
			$this->get_shortcode_custom_css( $custom_page_id );
		}
	}

	public function ajax_template_frontend( $template_id, $template_type ) {
		if ( $template_type === 'archive_template' ) {
			$saved_templates = $this->get_template( $template_id );
			vc_frontend_editor()->setTemplateContent( $saved_templates );
			vc_frontend_editor()->enqueueRequired();
			vc_include_template( 'editors/frontend_template.tpl.php', array(
				'editor' => vc_frontend_editor(),
			) );
			die();
		}

		return $template_id;
	}

	public function get_shortcode_custom_css( $post_id ) {

		$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );

		if ( ! empty( $shortcodes_custom_css ) ) {
			$shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
			echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
			echo jnews_sanitize_by_pass( $shortcodes_custom_css );
			echo '</style>';
		}
	}

	public function add_page_custom_css( $post_id ) {

		$post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );

		if ( ! empty( $post_custom_css ) ) {
			$post_custom_css = strip_tags( $post_custom_css );
			echo '<style type="text/css" data-type="vc_custom-css">';
			echo jnews_sanitize_by_pass( $post_custom_css );
			echo '</style>';
		}
	}

	public function get_custom_page_id() {
		return jnews_get_option( 'single_archive_template_id', null );
	}

	public function ajax_template_backend( $template_id, $template_type ) {
		if ( $template_type === 'archive_template' ) {
			$content = $this->get_template( $template_id );

			return $content;
		}

		return $template_id;
	}

	public function get_template( $template_id ) {
		ob_start();
		include "template/" . $template_id . ".txt";

		return ob_get_clean();
	}

	public function archive_template( $data ) {
		if ( get_post_type() === 'archive-template' ) {
			$data[] = array(
				'category'             => 'archive_template',
				'category_name'        => esc_html__( 'Archive Template', 'jnews' ),
				'category_description' => esc_html__( 'Archive Template for JNews', 'jnews' ),
				'category_weight'      => 9,
				'templates'            => $this->library()
			);
		}

		return $data;
	}

	public function library() {
		$template = array();

		for ( $i = 1; $i <= 3; $i ++ ) {
			$data               = array();
			$data['name']       = 'Archive Template ' . $i;
			$data['unique_id']  = 'archive_template_' . $i;
			$data['image_path'] = get_template_directory_uri() . '/assets/img/admin/archive_template/archive_template_' . $i . '.jpg';
			$data['type']       = 'archive_template';

			$template[] = $data;
		}

		return $template;
	}

	public function archive_template_render( $category ) {

		if ( 'archive_template' === $category['category'] ) {
			$category['output'] = '';
			$category['output'] .= '
            <div class="vc_archive_template">
                <div class="vc_column vc_col-sm-12">
                    <div class="vc_ui-template-list vc_templates-list-my_templates vc_ui-list-bar">';

			if ( ! empty( $category['templates'] ) ) {
				$arrays = array_chunk( $category['templates'], 3 );

				foreach ( $arrays as $templates ) {
					$category['output'] .= '<div class="vc_row">';
					foreach ( $templates as $template ) {
						$category['output'] .= $this->render_item_list( $template );
					}
					$category['output'] .= '</div>';
				}
			}

			$category['output'] .= '
				    </div>
			    </div>
			</div>';
		}

		return $category;
	}

	public function render_item_list( $template ) {
		$name                = isset( $template['name'] ) ? esc_html( $template['name'] ) : esc_html__( 'No title', 'jnews' );
		$template_id         = esc_attr( $template['unique_id'] );
		$template_id_hash    = md5( $template_id ); // needed for jquery target for TTA
		$template_name       = esc_html( $name );
		$template_name_lower = esc_attr( vc_slugify( $template_name ) );
		$template_type       = esc_attr( isset( $template['type'] ) ? $template['type'] : 'custom' );
		$custom_class        = esc_attr( isset( $template['custom_class'] ) ? $template['custom_class'] : '' );
		$column              = 12 / 3;

		$template_item = $this->render_single_item( $name, $template );

		$output = "<div class='vc_col-sm-{$column}'>
                        <div class='vc_ui-template vc_templates-template-type-{$template_type} {$custom_class}'
                            data-template_id='{$template_id}'
                            data-template_id_hash='{$template_id_hash}'
                            data-category='{$template_type}'
                            data-template_unique_id='{$template_id}'
                            data-template_name='{$template_name_lower}'
                            data-template_type='{$template_type}'
                            data-vc-content='.vc_ui-template-content'>
                            <div class='vc_ui-list-bar-item'>
                                {$template_item}        
                            </div>
                            <div class='vc_ui-template-content' data-js-content>
                            </div>
                        </div>
                    </div>";

		return $output;
	}

	protected function render_single_item( $name, $data ) {
		$template_name  = esc_html( $name );
		$template_image = esc_attr( $data['image_path'] );

		return "<div class='jnews_template_vc_item' data-template-handler=''>
                    <img src='{$template_image}'/>
                    <div class='vc_ui-list-bar-item-trigger'>
			            <h3>{$template_name}</h3>
			        </div>
                </div>";
	}

	protected function is_overwritten( $term_id, $key ) {
		$option = get_option( $key, array() );

		if ( isset( $option[ $term_id ] ) ) {
			return $option[ $term_id ];
		}

		return false;
	}

	protected function override_archive_template_builder() {
		$self = $this;
		$list = array( 'archive', 'category', 'author' );

		foreach ( $list as $item ) {
			add_filter( $item . '_template', function ( $template ) use ( $self, $item ) {

				if ( get_theme_mod( 'jnews_' . $item . '_page_layout', 'right-sidebar' ) === 'custom-template' && get_theme_mod( 'jnews_' . $item . '_custom_template_id', '' ) ) {
					$template = JNEWS_THEME_DIR . "/fragment/archive/{$item}.php";
					add_filter( 'jnews_vc_force_load_style', '__return_true' );
				}

				return $template;
			} );
		}
	}

	protected function override_archive_template_option( $archive ) {
		$self = $this;
		$keys = array(
			'sidebar'                  => 'sidebar',
			'second_sidebar'           => 'second_sidebar',
			'page_layout'              => 'page_layout',
			'sticky_sidebar'           => 'sticky_sidebar',
			'content_pagination_page'  => 'content_pagination_show_pageinfo',
			'content_pagination_text'  => 'content_pagination_show_navtext',
			'content_pagination_align' => 'content_pagination_align',
			'content_pagination_limit' => 'content_pagination_limit',
			'content_pagination'       => 'content_pagination',
			'content_date_custom'      => 'content_date_custom',
			'content_date'             => 'content_date',
			'content_excerpt'          => 'content_excerpt',
			'content_layout'           => 'content',
			'content_boxed'            => 'boxed',
			'content_boxed_shadow'     => 'boxed_shadow',
			'content_box_shadow'       => 'box_shadow',
			'tag_template'             => 'custom_template_id',
			'number_post'              => 'custom_template_number_post'
		);

		foreach ( $keys as $key => $label ) {
			$archive_key = ( $archive === 'tag' ? 'archive' : $archive );
			add_filter( "theme_mod_jnews_{$archive_key}_" . $label, function ( $value ) use ( $self, $key, $archive ) {
				$term = '';

				if ( is_tag() ) {
					$term = get_queried_object_id();
				} elseif ( is_author() ) {
					$term = get_the_author_meta( 'ID' );
				}

				if ( $term && $self->is_overwritten( $term, "jnews_{$archive}_{$archive}_override" ) ) {
					$new_option = get_option( "jnews_{$archive}_" . $key );

					if ( isset( $new_option[ $term ] ) ) {
						$value = $new_option[ $term ];
					}
				}

				return $value;
			} );
		}
	}

	public function template_editor( $template ) {
		global $post;
		if ( $post->post_type == 'archive-template' ) {
			$template = JNEWS_THEME_DIR . '/fragment/archive/editor.php';
		}

		return $template;
	}

	public function post_type() {
		if ( is_admin() || jeg_is_frontend_vc() || jeg_is_frontend_elementor() ) {

			jnews_register_post_type( 'archive-template', array(
				'labels'          =>
					array(
						'name'               => esc_html__( 'Archive Template', 'jnews' ),
						'singular_name'      => esc_html__( 'Archive Template', 'jnews' ),
						'menu_name'          => esc_html__( 'Archive Template', 'jnews' ),
						'add_new'            => esc_html__( 'New Archive Template', 'jnews' ),
						'add_new_item'       => esc_html__( 'Build Archive Template', 'jnews' ),
						'edit_item'          => esc_html__( 'Edit Archive Template', 'jnews' ),
						'new_item'           => esc_html__( 'New Archive Template Entry', 'jnews' ),
						'view_item'          => esc_html__( 'View Archive Template', 'jnews' ),
						'search_items'       => esc_html__( 'Search Archive Template', 'jnews' ),
						'not_found'          => esc_html__( 'No entry found', 'jnews' ),
						'not_found_in_trash' => esc_html__( 'No Archive Template in Trash', 'jnews' ),
						'parent_item_colon'  => ''
					),
				'description'     => esc_html__( 'Single Archive Template', 'jnews' ),
				'public'          => true,
				'show_ui'         => true,
				'menu_position'   => 8,
				'menu_icon'       => 'dashicons-tag',
				'capability_type' => 'post',
				'hierarchical'    => false,
				'supports'        => array( 'title', 'editor' ),
				'map_meta_cap'    => true,
				'rewrite'         => array(
					'slug' => 'archive-template'
				)
			) );
		}
	}
}
