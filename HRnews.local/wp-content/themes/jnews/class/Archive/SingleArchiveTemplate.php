<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Archive;

use JNews\Form\FormControl;
use Jeg\Form\Form_Archive;

Class SingleArchiveTemplate {

	private static $instance;

	private $archive_prefix = 'jnews_archive_';

	private $author_prefix = 'jnews_author_';

	public static function getInstance() {

		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {

		add_action( 'init',                     array( $this, 'single_archive_post_type' ), 9 );

		add_action( 'edit_tag_form',            array( $this, 'render_tag_options' ) );
		add_action( 'edit_post_tag',            array( $this, 'save_tag' ) );

		add_action( 'edit_user_profile',        array( $this, 'render_author_options' ) );
		add_action( 'show_user_profile',        array( $this, 'render_author_options' ) );
		add_action( 'personal_options_update',  array( $this, 'save_author' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_author' ) );

		add_filter( 'single_template',          array( $this, 'get_archive_template_editor' ) );

		if ( is_admin() ) {
			add_filter( 'vc_get_all_templates',                     array( $this, 'archive_template' ) );
			add_filter( 'vc_templates_render_category',             array( $this, 'archive_template_render' ) );
			add_filter( 'vc_templates_render_backend_template',     array( $this, 'ajax_template_backend' ), null, 2 );
		} else {
			add_action( 'wp_head',                                  array( $this, 'custom_post_css' ), 999 );
			add_filter( 'vc_templates_render_frontend_template',    array( $this, 'ajax_template_frontend' ), null, 2 );
		}

		add_filter( 'post_row_actions', array( $this, 'single_row_action' ), null, 2 );

        $this->apply_archive_template();

		$this->override_archive_template_option();
		$this->override_archive_template_builder();

		$this->override_author_template_option();
		$this->override_author_template_builder();
	}

	protected function apply_archive_template(){
        $keys = array(
            'author_template'  => array(
                'label'     => 'jnews_author_',
                'location'  => 'author.php'
            ),
            'archive_template' => array(
                'label'     => 'jnews_archive_',
                'location'  => 'archive.php'
            ),
            'category_template'  => array(
                'label'     => 'jnews_category_',
                'location'  => 'category.php'
            )
        );

        $self = $this;

        foreach ( $keys as $key => $item) {

            add_filter($key, function ( $template ) use ($self, $item, $key){

                if ( get_theme_mod( $key . 'page_layout', 'right-sidebar' ) === 'custom-template' && get_theme_mod( $item['label'] . 'custom_template_id', '' ) ) {
                    $template = JNEWS_THEME_DIR . '/fragment/archive/' . $item['location'];
                }

                return $template;
            });
        }
    }

	protected function override_archive_template_builder() {
		$keys = array(
			'page_layout'  => 'page_layout',
			'tag_template' => 'custom_template_id',
			'number_post'  => 'custom_template_number_post'
		);

		$self = $this;

		foreach ( $keys as $key => $label ) {
			add_filter( 'theme_mod_' . $this->archive_prefix . $label, function ( $value ) use ( $self, $key ) {

				if ( is_tag() ) {
					$term = get_queried_object_id();

					if ( $term && $self->is_overwritten( $term ) ) {
						$new_option = get_option( $self->archive_prefix . $key );

						if ( isset( $new_option[ $term ] ) ) {
							$value = $new_option[ $term ];
						}
					}
				}

				return $value;
			} );
		}
	}

	protected function override_archive_template_option() {
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
			'content_box_shadow'       => 'box_shadow'
		);

		$self = $this;

		foreach ( $keys as $key => $label ) {
			add_filter( $this->archive_prefix . $label, function ( $value ) use ( $self, $key ) {

				if ( is_tag() ) {
					$term = get_queried_object_id();

					if ( $term && $self->is_overwritten( $term ) ) {
						$new_option = get_option( $this->archive_prefix . $key );

						if ( isset( $new_option[ $term ] ) ) {
							$value = $new_option[ $term ];
						}
					}
				}

				return $value;
			} );
		}
	}

	protected function override_author_template_builder() {
		$keys = array(
			'page_layout'     => 'page_layout',
			'author_template' => 'custom_template_id',
			'number_post'     => 'custom_template_number_post'
		);

		$self = $this;

		foreach ( $keys as $key => $label ) {
			add_filter( 'theme_mod_' . $this->author_prefix . $label, function ( $value ) use ( $self, $key ) {

				if ( is_author() ) {
					$term = get_the_author_meta( 'ID' );

					if ( $term && $self->is_overwritten( $term ) ) {
						$new_option = get_option( $self->author_prefix . $key );

						if ( isset( $new_option[ $term ] ) ) {
							$value = $new_option[ $term ];
						}
					}
				}

				return $value;
			} );
		}
	}

	protected function override_author_template_option() {
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
			'content_box_shadow'       => 'box_shadow'
		);

		$self = $this;

		foreach ( $keys as $key => $label ) {
			add_filter( $this->author_prefix . $label, function ( $value ) use ( $self, $key ) {

				if ( is_author() ) {
					$term = get_the_author_meta( 'ID' );

					if ( $term && $self->is_overwritten( $term ) ) {
						$new_option = get_option( $this->author_prefix . $key );

						if ( isset( $new_option[ $term ] ) ) {
							$value = $new_option[ $term ];
						}
					}
				}

				return $value;
			} );
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
			$data['image_path'] = get_template_directory_uri() . '/assets/img/admin/footer/footer-' . $i . '.jpg';
			$data['type']       = 'archive_template';

			$template[] = $data;
		}

		return $template;
	}

	public function single_row_action( $actions, $post ) {

		if ( $post->post_type === 'archive-template' ) {
			unset( $actions['view'] );
			unset( $actions['inline hide-if-no-js'] );
		}

		return $actions;
	}

	public function custom_post_css() {

		if ( jnews_get_option( 'single_category_template', false ) ) {

			$custom_page_id = $this->get_custom_page_id();

			$this->add_page_custom_css( $custom_page_id );
			$this->get_shortcode_custom_css( $custom_page_id );
		}
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

	public function single_archive_post_type() {

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

	public function get_archive_template_editor( $template ) {

		global $post;

		if ( $post->post_type == 'archive-template' ) {
			$template = JNEWS_THEME_DIR . '/fragment/archive/editor.php';
		}

		return $template;
	}

	protected function is_overwritten( $term_id ) {
		GLOBAL $pagenow;
		if ( is_tag() || is_author() ) {
			$prefix = ( is_tag() ) ? $this->archive_prefix . 'tag_override' : $this->author_prefix . 'author_override';
		} else {
			$prefix = ( $pagenow === 'term.php' ) ? $this->archive_prefix . 'tag_override' : $this->author_prefix . 'author_override';
		}
		$option = get_option( $prefix, array() );

		if ( isset( $option[ $term_id ] ) ) {
			return $option[ $term_id ];
		}

		return false;
	}

	protected function setting_field( $key, $field, $term_id ) {
		$setting               = array();
		$option                = $this->get_value( $key, $term_id );
		$setting['title']      = isset( $field['title'] ) ? $field['title'] : '';
		$setting['desc']       = isset( $field['desc'] ) ? $field['desc'] : '';
		$setting['options']    = isset( $field['options'] ) ? $field['options'] : array();
		$setting['fieldkey']   = $key;
		$setting['fieldid']    = $key . '_' . $term_id;
		$setting['fieldname']  = $key;
		$setting['default']    = isset( $field['default'] ) ? $field['default'] : '';
		$setting['value']      = isset( $option ) ? $option : $setting['default'];
		$setting['fields']     = isset( $field['fields'] ) ? $field['fields'] : array();
		$setting['row_label']  = isset( $field['row_label'] ) ? $field['row_label'] : array();
		$setting['dependency'] = isset( $field['dependency'] ) ? $field['dependency'] : array();

		return $setting;
	}

	protected function get_value( $key, $term_id ) {
		GLOBAL $pagenow;
		$prefix = ( $pagenow === 'term.php' ) ? $this->archive_prefix : $this->author_prefix;
		$value  = get_option( $prefix . $key, false );

		if ( isset( $value[ $term_id ] ) ) {
			return $value[ $term_id ];
		}
	}


	public function is_tag_page() {
		return in_array( $GLOBALS['pagenow'], array( 'term.php' ) );
	}

	protected function get_id( $tag ) {
		if ( ! empty( $tag->term_id ) ) {
			return $tag->term_id;
		} else {
			return null;
		}
	}

	public function render_tag_options( $tag ) {

		if ( ! defined( 'JNEWS_THEME_ID' ) || ! isset( $tag->term_id ) ) {
			return false;
		}

		$id = $this->get_id( $tag );

		if ( null !== $id ) {
			$segments = $this->prepare_segments();
			$fields   = $this->prepare_fields( $id );
			$id       = 'archive-' . $id;

			if ( class_exists( 'Jeg\Form\Form_Archive' ) ) {
				Form_Archive::render_form($id, $segments, $fields);	
			}
		}
	}

	public function save_tag() {
		if ( isset( $_POST['taxonomy'] ) && $_POST['taxonomy'] === 'post_tag' ) {
			$options = $this->get_tag_options();

			foreach ( $options as $key => $field ) {
				if ( isset( $field['items'] ) ) {
					foreach ( $field['items'] as $key1 => $value1 ) {
						$option = isset( $_POST[ $key1 ] ) ? $_POST[ $key1 ] : false;
						$this->save_tag_value( $key1, $_POST['tag_ID'], $option );
					}
				} else {
					$option = isset( $_POST[ $key ] ) ? $_POST[ $key ] : false;
					$this->save_tag_value( $key, $_POST['tag_ID'], $option );
				}
			}
		}
	}

	protected function save_tag_value( $key, $term_id, $value ) {
		$values = get_option( $this->archive_prefix . $key, array() );

		$values[ $term_id ] = $value;
		update_option( $this->archive_prefix . $key, $values );
	}

	protected function get_tag_options() {
		$all_sidebar = apply_filters( 'jnews_get_sidebar_widget', null );
		$content_layout = apply_filters('jnews_get_content_layout_customizer', array(
			'3'  => '',
			'4'  => '',
			'5'  => '',
			'6'  => '',
			'7'  => '',
			'9'  => '',
			'10' => '',
			'11' => '',
			'12' => '',
			'14' => '',
			'15' => '',
			'18' => '',
			'22' => '',
			'23' => '',
			'25' => '',
			'26' => '',
			'27' => '',
			'32' => '',
			'33' => '',
			'34' => '',
			'35' => '',
			'36' => '',
			'37' => '',
			'38' => '',
			'39' => '',
		));

		$tag_override = array(
			'field'    => 'tag_override',
			'operator' => '==',
			'value'    => true
		);

		$custom_template = array(
			'field'    => 'page_layout',
			'operator' => '!=',
			'value'    => 'custom-template'
		);

		return array(
			'tag_override' => array(
				'title'   => esc_html__( 'Override Tag Setting', 'jnews' ),
				'desc'    => esc_html__( 'Override tag general setting.', 'jnews' ),
				'type'    => 'checkbox',
				'default' => false
			),
			'tag_sidebar'  => array(
				'title' => esc_html__( 'Tag Page Layout', 'jnews' ),
				'items' => array(
					'page_layout'    => array(
						'title'      => esc_html__( 'Page Layout', 'jnews' ),
						'desc'       => esc_html__( 'Choose your page layout.', 'jnews' ),
						'default'    => 'right-sidebar',
						'type'       => 'radioimage',
						'options'    => array(
							'right-sidebar'        => '',
							'left-sidebar'         => '',
							'right-sidebar-narrow' => '',
							'left-sidebar-narrow'  => '',
							'double-sidebar'       => '',
							'double-right-sidebar' => '',
							'no-sidebar'           => '',
							'custom-template'      => '',
						),
						'dependency' => array(
							$tag_override
						)
					),
					'tag_template'   => array(
						'title'      => esc_html__( 'Tag Template', 'jnews' ),
						'desc'       => esc_html__( 'Choose archive template that you want to use for this tag.', 'jnews' ),
						'type'       => 'select',
						'options'    => jnews_get_all_custom_archive_template(),
						'dependency' => array(
							$tag_override,
							array(
								'field'    => 'page_layout',
								'operator' => '==',
								'value'    => 'custom-template'
							)
						)
					),
					'number_post'    => array(
						'title'      => esc_html__( 'Number of Post', 'jnews' ),
						'desc'       => esc_html__( 'Set the number of post per page on tag page.', 'jnews' ),
						'type'       => 'text',
						'default'    => '10',
						'dependency' => array(
							$tag_override,
							array(
								'field'    => 'page_layout',
								'operator' => '==',
								'value'    => 'custom-template'
							)
						)
					),
					'sidebar'        => array(
						'title'      => esc_html__( 'Tag Sidebar', 'jnews' ),
						'desc'       => wp_kses( __( "Choose your tag sidebar. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
						'type'       => 'select',
						'default'    => 'default-sidebar',
						'options'    => $all_sidebar,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'page_layout',
								'operator' => '!=',
								'value'    => 'no-sidebar'
							)
						)
					),
					'second_sidebar' => array(
						'title'      => esc_html__( 'Second Tag Sidebar', 'jnews' ),
						'desc'       => wp_kses( __( "Choose your second sidebar for tag page. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
						'type'       => 'select',
						'default'    => 'default-sidebar',
						'options'    => $all_sidebar,
						'dependency' => array(
							$tag_override,
							array(
								'field'    => 'page_layout',
								'operator' => 'in',
								'value'    => array( 'double-sidebar', 'double-right-sidebar' )
							)
						)
					),
					'sticky_sidebar' => array(
						'title'      => esc_html__( 'Tag Sticky Sidebar', 'jnews' ),
						'desc'       => esc_html__( 'Enable sticky sidebar on this tag page.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => true,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'page_layout',
								'operator' => '!=',
								'value'    => 'no-sidebar'
							)
						)
					)
				)
			),
			'tag_content'  => array(
				'title' => esc_html__( 'Tag Content', 'jnews' ),
				'items' => array(
					'content_layout'           => array(
						'title'      => esc_html__( 'Tag Content Layout', 'jnews' ),
						'desc'       => esc_html__( 'Choose your tag content layout.', 'jnews' ),
						'default'    => '3',
						'type'       => 'radioimage',
						'options'    => $content_layout,
						'dependency' => array(
							$tag_override,
							$custom_template,
						)
					),
					'content_boxed'            => array(
						'title'      => esc_html__( 'Enable Boxed', 'jnews' ),
						'desc'       => esc_html__( 'This option will turn the module into boxed.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array(
									'3',
									'4',
									'5',
									'6',
									'7',
									'9',
									'10',
									'14',
									'18',
									'22',
									'23',
									'25',
									'26',
									'27',
									'39'
								)
							)
						)
					),
					'content_boxed_shadow'     => array(
						'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
						'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_boxed',
								'operator' => '==',
								'value'    => true
							),
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array(
									'3',
									'4',
									'5',
									'6',
									'7',
									'9',
									'10',
									'14',
									'18',
									'22',
									'23',
									'25',
									'26',
									'27',
									'39'
								)
							)
						)
					),
					'content_box_shadow'       => array(
						'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
						'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array( '37', '35', '33', '36', '32', '38' )
							)
						)
					),
					'content_excerpt'          => array(
						'title'      => esc_html__( 'Excerpt Length', 'jnews' ),
						'desc'       => esc_html__( 'Set the word length of excerpt on post.', 'jnews' ),
						'type'       => 'number',
						'options'    => array(
							'min'  => '0',
							'max'  => '200',
							'step' => '1',
						),
						'default'    => 20,
						'dependency' => array(
							$tag_override,
							$custom_template,
						)
					),
					'content_date'             => array(
						'title'      => esc_html__( 'Choose Date Format', 'jnews' ),
						'desc'       => esc_html__( 'Choose which date format you want to use for tag content element.', 'jnews' ),
						'default'    => 'default',
						'type'       => 'select',
						'options'    => array(
							'ago'     => esc_html__( 'Relative Date/Time Format (ago)', 'jnews' ),
							'default' => esc_html__( 'WordPress Default Format', 'jnews' ),
							'custom'  => esc_html__( 'Custom Format', 'jnews' ),
						),
						'dependency' => array(
							$tag_override,
							$custom_template,
						)
					),
					'content_date_custom'      => array(
						'title'      => esc_html__( 'Custom Date Format', 'jnews' ),
						'desc'       => wp_kses( sprintf( __( "Please set custom date format for tag content element. For more detail about this format, please refer to
										<a href='%s' target='_blank'>Developer Codex</a>.", "jnews" ), "https://developer.wordpress.org/reference/functions/current_time/" ),
							wp_kses_allowed_html() ),
						'default'    => 'Y/m/d',
						'type'       => 'text',
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_date',
								'operator' => '==',
								'value'    => 'custom'
							)
						)
					),
					'content_pagination'       => array(
						'title'      => esc_html__( 'Choose Pagination Mode', 'jnews' ),
						'desc'       => esc_html__( 'Choose which pagination mode that fit with your block.', 'jnews' ),
						'default'    => 'nav_1',
						'type'       => 'select',
						'options'    => array(
							'nav_1' => esc_html__( 'Normal - Navigation 1', 'jnews' ),
							'nav_2' => esc_html__( 'Normal - Navigation 2', 'jnews' ),
							'nav_3' => esc_html__( 'Normal - Navigation 3', 'jnews' ),
						),
						'dependency' => array(
							$tag_override,
							$custom_template,
						)
					),
					'content_pagination_limit' => array(
						'title'      => esc_html__( 'Auto Load Limit', 'jnews' ),
						'desc'       => esc_html__( 'Limit of auto load when scrolling, set to zero to always load until end of content.', 'jnews' ),
						'type'       => 'number',
						'options'    => array(
							'min'  => '0',
							'max'  => '9999',
							'step' => '1',
						),
						'default'    => 0,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => '==',
								'value'    => 'scrollload'
							)
						)
					),
					'content_pagination_align' => array(
						'title'      => esc_html__( 'Pagination Align', 'jnews' ),
						'desc'       => esc_html__( 'Choose pagination alignment.', 'jnews' ),
						'default'    => 'center',
						'type'       => 'select',
						'options'    => array(
							'left'   => esc_html__( 'Left', 'jnews' ),
							'center' => esc_html__( 'Center', 'jnews' ),
						),
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					),
					'content_pagination_text'  => array(
						'title'      => esc_html__( 'Show Navigation Text', 'jnews' ),
						'desc'       => esc_html__( 'Show navigation text (next, prev).', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					),
					'content_pagination_page'  => array(
						'title'      => esc_html__( 'Show Page Info', 'jnews' ),
						'desc'       => esc_html__( 'Show page info text (Page x of y).', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$tag_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					)
				)
			)
		);
	}

//	Author Override Option

	public function is_author_page() {
		return in_array( $GLOBALS['pagenow'], array( 'term.php' ) );
	}

	public function render_author_options( $author ) {

		if ( ! defined( 'JNEWS_THEME_ID' ) || ! isset( $author->ID ) ) {
			return false;
		}


		$options = $this->get_author_options();

		$title = esc_html__( 'Override Author Setting', 'jnews' );

		$output  = '';
		$term_id = $author->ID;

		foreach ( $options as $key => $field ) {
			if ( isset( $field['items'] ) ) {
				$output .=
					"<div class='jeg_accordion_wrapper collapsible close widget_class {$key}'>" .
					"<div class='jeg_accordion_heading'>
								<span class='jeg_accordion_title'>{$field['title']}</span>
								<span class='jeg_accordion_button'></span>
							</div>" .
					"<div class='jeg_accordion_body' style='display: none'>";

				foreach ( $field['items'] as $key1 => $field1 ) {
					$output .= FormControl::generate_form( $field1['type'], $this->setting_field( $key1, $field1, $term_id ) );
				}

				$output .= "</div></div>";
			} else {
				$output .= FormControl::generate_form( $field['type'], $this->setting_field( $key, $field, $term_id ) );
			}
		}
		$output =
			"<div class='jeg_accordion_wrapper collapsible open widget_class " . sanitize_title( $title ) . "'>" .
			"<div class='jeg_accordion_heading author'>
						<span class='jeg_accordion_title'>{$title}</span>
						<span class='jeg_accordion_button'></span>
					</div>" .
			"<div class='jeg_accordion_body'>" . $output . "</div>" .
			"</div>";

		echo jnews_sanitize_by_pass( $output );
	}

	public function save_author() {
		if ( current_user_can( 'edit_user' ) ) {
			$options = $this->get_author_options();

			foreach ( $options as $key => $field ) {
				if ( isset( $field['items'] ) ) {
					foreach ( $field['items'] as $key1 => $value1 ) {
						$option = isset( $_POST[ $key1 ] ) ? $_POST[ $key1 ] : false;
						$this->save_author_value( $key1, $_POST['user_id'], $option );
					}
				} else {
					$option = isset( $_POST[ $key ] ) ? $_POST[ $key ] : false;
					$this->save_author_value( $key, $_POST['user_id'], $option );
				}
			}
		}
	}

	protected function save_author_value( $key, $term_id, $value ) {
		$values = get_option( $this->author_prefix . $key, array() );

		$values[ $term_id ] = $value;
		update_option( $this->author_prefix . $key, $values );
	}

	protected function get_author_options() {
		$all_sidebar = apply_filters( 'jnews_get_sidebar_widget', null );
		$content_layout = apply_filters('jnews_get_content_layout_customizer', array(
			'3'  => '',
			'4'  => '',
			'5'  => '',
			'6'  => '',
			'7'  => '',
			'9'  => '',
			'10' => '',
			'11' => '',
			'12' => '',
			'14' => '',
			'15' => '',
			'18' => '',
			'22' => '',
			'23' => '',
			'25' => '',
			'26' => '',
			'27' => '',
			'32' => '',
			'33' => '',
			'34' => '',
			'35' => '',
			'36' => '',
			'37' => '',
			'38' => '',
			'39' => '',
		));

		$author_override = array(
			'field'    => 'author_override',
			'operator' => '==',
			'value'    => true
		);

		$custom_template = array(
			'field'    => 'page_layout',
			'operator' => '!=',
			'value'    => 'custom-template'
		);

		return array(
			'author_override' => array(
				'title'   => esc_html__( 'Override Author Setting', 'jnews' ),
				'desc'    => esc_html__( 'Override author general setting.', 'jnews' ),
				'type'    => 'checkbox',
				'default' => false
			),
			'author_sidebar'  => array(
				'title' => esc_html__( 'Author Page Layout', 'jnews' ),
				'items' => array(
					'page_layout'     => array(
						'title'      => esc_html__( 'Page Layout', 'jnews' ),
						'desc'       => esc_html__( 'Choose your page layout.', 'jnews' ),
						'default'    => 'right-sidebar',
						'type'       => 'radioimage',
						'options'    => array(
							'right-sidebar'        => '',
							'left-sidebar'         => '',
							'right-sidebar-narrow' => '',
							'left-sidebar-narrow'  => '',
							'double-sidebar'       => '',
							'double-right-sidebar' => '',
							'no-sidebar'           => '',
							'custom-template'      => '',
						),
						'dependency' => array(
							$author_override
						)
					),
					'author_template' => array(
						'title'      => esc_html__( 'Author Template', 'jnews' ),
						'desc'       => esc_html__( 'Choose author template that you want to use for this author.', 'jnews' ),
						'type'       => 'select',
						'options'    => jnews_get_all_custom_archive_template(),
						'dependency' => array(
							$author_override,
							array(
								'field'    => 'page_layout',
								'operator' => '==',
								'value'    => 'custom-template'
							)
						)
					),
					'number_post'     => array(
						'title'      => esc_html__( 'Number of Post', 'jnews' ),
						'desc'       => esc_html__( 'Set the number of post per page on author page.', 'jnews' ),
						'type'       => 'text',
						'default'    => '10',
						'dependency' => array(
							$author_override,
							array(
								'field'    => 'page_layout',
								'operator' => '==',
								'value'    => 'custom-template'
							)
						)
					),
					'sidebar'         => array(
						'title'      => esc_html__( 'Author Sidebar', 'jnews' ),
						'desc'       => wp_kses( __( "Choose your author sidebar. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
						'type'       => 'select',
						'default'    => 'default-sidebar',
						'options'    => $all_sidebar,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'page_layout',
								'operator' => '!=',
								'value'    => 'no-sidebar'
							)
						)
					),
					'second_sidebar'  => array(
						'title'      => esc_html__( 'Second Author Sidebar', 'jnews' ),
						'desc'       => wp_kses( __( "Choose your second sidebar for author page. If you need another sidebar, you can create from <strong>WordPress Admin</strong> &raquo; <strong>Appearance</strong> &raquo; <strong>Widget</strong>.", 'jnews' ), wp_kses_allowed_html() ),
						'type'       => 'select',
						'default'    => 'default-sidebar',
						'options'    => $all_sidebar,
						'dependency' => array(
							$author_override,
							array(
								'field'    => 'page_layout',
								'operator' => 'in',
								'value'    => array( 'double-sidebar', 'double-right-sidebar' )
							)
						)
					),
					'sticky_sidebar'  => array(
						'title'      => esc_html__( 'Author Sticky Sidebar', 'jnews' ),
						'desc'       => esc_html__( 'Enable sticky sidebar on this author page.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => true,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'page_layout',
								'operator' => '!=',
								'value'    => 'no-sidebar'
							)
						)
					)
				)
			),
			'author_content'  => array(
				'title' => esc_html__( 'Author Content', 'jnews' ),
				'items' => array(
					'content_layout'           => array(
						'title'      => esc_html__( 'Author Content Layout', 'jnews' ),
						'desc'       => esc_html__( 'Choose your author content layout.', 'jnews' ),
						'default'    => '3',
						'type'       => 'radioimage',
						'options'    => $content_layout,
						'dependency' => array(
							$author_override,
							$custom_template,
						)
					),
					'content_boxed'            => array(
						'title'      => esc_html__( 'Enable Boxed', 'jnews' ),
						'desc'       => esc_html__( 'This option will turn the module into boxed.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array(
									'3',
									'4',
									'5',
									'6',
									'7',
									'9',
									'10',
									'14',
									'18',
									'22',
									'23',
									'25',
									'26',
									'27',
									'39'
								)
							)
						)
					),
					'content_boxed_shadow'     => array(
						'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
						'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_boxed',
								'operator' => '==',
								'value'    => true
							),
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array(
									'3',
									'4',
									'5',
									'6',
									'7',
									'9',
									'10',
									'14',
									'18',
									'22',
									'23',
									'25',
									'26',
									'27',
									'39'
								)
							)
						)
					),
					'content_box_shadow'       => array(
						'title'      => esc_html__( 'Enable Shadow', 'jnews' ),
						'desc'       => esc_html__( 'Enable shadow on the module template.', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_layout',
								'operator' => 'in',
								'value'    => array( '37', '35', '33', '36', '32', '38' )
							)
						)
					),
					'content_excerpt'          => array(
						'title'      => esc_html__( 'Excerpt Length', 'jnews' ),
						'desc'       => esc_html__( 'Set the word length of excerpt on post.', 'jnews' ),
						'type'       => 'number',
						'options'    => array(
							'min'  => '0',
							'max'  => '200',
							'step' => '1',
						),
						'default'    => 20,
						'dependency' => array(
							$author_override,
							$custom_template,
						)
					),
					'content_date'             => array(
						'title'      => esc_html__( 'Choose Date Format', 'jnews' ),
						'desc'       => esc_html__( 'Choose which date format you want to use for author content element.', 'jnews' ),
						'default'    => 'default',
						'type'       => 'select',
						'options'    => array(
							'ago'     => esc_html__( 'Relative Date/Time Format (ago)', 'jnews' ),
							'default' => esc_html__( 'WordPress Default Format', 'jnews' ),
							'custom'  => esc_html__( 'Custom Format', 'jnews' ),
						),
						'dependency' => array(
							$author_override,
							$custom_template,
						)
					),
					'content_date_custom'      => array(
						'title'      => esc_html__( 'Custom Date Format', 'jnews' ),
						'desc'       => wp_kses( sprintf( __( "Please set custom date format for author content element. For more detail about this format, please refer to
										<a href='%s' target='_blank'>Developer Codex</a>.", "jnews" ), "https://developer.wordpress.org/reference/functions/current_time/" ),
							wp_kses_allowed_html() ),
						'default'    => 'Y/m/d',
						'type'       => 'text',
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_date',
								'operator' => '==',
								'value'    => 'custom'
							)
						)
					),
					'content_pagination'       => array(
						'title'      => esc_html__( 'Choose Pagination Mode', 'jnews' ),
						'desc'       => esc_html__( 'Choose which pagination mode that fit with your block.', 'jnews' ),
						'default'    => 'nav_1',
						'type'       => 'select',
						'options'    => array(
							'nav_1' => esc_html__( 'Normal - Navigation 1', 'jnews' ),
							'nav_2' => esc_html__( 'Normal - Navigation 2', 'jnews' ),
							'nav_3' => esc_html__( 'Normal - Navigation 3', 'jnews' ),
						),
						'dependency' => array(
							$author_override,
							$custom_template,
						)
					),
					'content_pagination_limit' => array(
						'title'      => esc_html__( 'Auto Load Limit', 'jnews' ),
						'desc'       => esc_html__( 'Limit of auto load when scrolling, set to zero to always load until end of content.', 'jnews' ),
						'type'       => 'number',
						'options'    => array(
							'min'  => '0',
							'max'  => '9999',
							'step' => '1',
						),
						'default'    => 0,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => '==',
								'value'    => 'scrollload'
							)
						)
					),
					'content_pagination_align' => array(
						'title'      => esc_html__( 'Pagination Align', 'jnews' ),
						'desc'       => esc_html__( 'Choose pagination alignment.', 'jnews' ),
						'default'    => 'center',
						'type'       => 'select',
						'options'    => array(
							'left'   => esc_html__( 'Left', 'jnews' ),
							'center' => esc_html__( 'Center', 'jnews' ),
						),
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					),
					'content_pagination_text'  => array(
						'title'      => esc_html__( 'Show Navigation Text', 'jnews' ),
						'desc'       => esc_html__( 'Show navigation text (next, prev).', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					),
					'content_pagination_page'  => array(
						'title'      => esc_html__( 'Show Page Info', 'jnews' ),
						'desc'       => esc_html__( 'Show page info text (Page x of y).', 'jnews' ),
						'type'       => 'checkbox',
						'default'    => false,
						'dependency' => array(
							$author_override,
							$custom_template,
							array(
								'field'    => 'content_pagination',
								'operator' => 'in',
								'value'    => array( 'nav_1', 'nav_2', 'nav_3' )
							)
						)
					)
				)
			)
		);
	}

}
