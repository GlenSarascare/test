<?php
/**
 * @author : Jegtheme
 */

namespace JNews;

class Gutenberg {
	private static $instance;

	private static $settings;

	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {
		if ( self::is_classic() ) {
			return;
		}

		$this->setup_hook();
	}

	protected function setup_hook() {

		add_action( 'admin_enqueue_scripts', [ $this, 'post_metabox' ] );
		add_action( 'save_post', [ $this, 'save_post_format' ], 99 );
		add_action( 'edit_post', [ $this, 'save_post_format' ], 99 );

		add_action( 'admin_enqueue_scripts', [ $this, 'load_font' ] );
		add_action( 'admin_print_styles', [ $this, 'load_style' ], 99 );

		add_filter( 'get_the_terms', [ $this, 'get_post_format' ], 10, 3 );
		add_filter( 'get_post_metadata', [ $this, 'get_post_format_video' ], 10, 3 );
		add_filter( 'get_post_metadata', [ $this, 'get_post_format_gallery' ], 10, 3 );
		add_filter( 'jnews_load_post_subtitle', '__return_false' );
	}

	public function load_style() {
		$body_font      = get_theme_mod( 'jnews_body_font' );
		$title_font     = get_theme_mod( 'jnews_h1_font' );
		$paragraph_font = get_theme_mod( 'jnews_p_font' );
		?>
        <style type="text/css">
            /*Font Style*/
            <?php if ( ! empty( $body_font ) ) : ?>
            .wp-block {
                font-family: <?php echo esc_attr( $body_font['font-family'] . ' !important' ); ?>;
            }

            <?php endif ?>

            <?php if ( ! empty( $title_font ) ) : ?>
            .wp-block.editor-post-title__block textarea {
                font-family: <?php echo esc_attr( $title_font['font-family'] . ' !important' ); ?>;
            }

            <?php endif ?>

            <?php if ( ! empty( $paragraph_font ) ) : ?>
            .wp-block p {
                font-family: <?php echo esc_attr( $paragraph_font['font-family'] . ' !important' ); ?>;
            }

            <?php endif ?>
        </style>
		<?php
	}

	public function load_font() {
		if ( class_exists( '\Jeg\Util\Style_Generator' ) ) {
			$style_instance = \Jeg\Util\Style_Generator::get_instance();
			$font_url       = $style_instance->get_font_url();

			if ( $font_url ) {
				wp_enqueue_style( 'jeg_customizer_font', $font_url );
			}
		}
	}

	public function save_post_format( $post_id ) {
		$format = vp_metabox( 'jnews_single_post.format', null, $post_id );

		if ( $format ) {
			set_post_format( $post_id, $format );
		}

		// additional for post subtitle
		$subtitle = vp_metabox( 'jnews_single_post.subtitle', null, $post_id );
		$flag     = (bool) get_post_meta( $post_id, 'post_subtitle_flag', true );

		if ( $flag ) {
			update_post_meta( $post_id, 'post_subtitle', $subtitle );
		}
	}

	public function post_metabox() {

		$screen = get_current_screen();

		if ( $screen->id === 'post' ) {

			$post_id = get_the_ID();

			$this->post_subtitle( $post_id );
			$this->post_format( $post_id );
			$this->post_format_video( $post_id );
			$this->post_format_gallery( $post_id );
		}
	}

	protected function post_subtitle( $post_id ) {

		$subtitle = vp_metabox( 'jnews_single_post.subtitle', null, $post_id );
		$flag     = (bool) get_post_meta( $post_id, 'post_subtitle_flag', true );

		if ( ! $flag ) {
			// get old post subtitle
			$subtitle = esc_html( get_post_meta( $post_id, 'post_subtitle', true ) );

			$single_post = get_post_meta( $post_id, 'jnews_single_post', true );
			if ( is_array( $single_post ) ) {
				$single_post['subtitle'] = $subtitle;
			} else {
				$single_post = [
					'subtitle' => $subtitle,
				];
			}

			// save into post subtitle metabox
			update_post_meta( $post_id, 'jnews_single_post', $single_post );

			// flag subtitle for this post
			update_post_meta( $post_id, 'post_subtitle_flag', true );
		}
	}

	protected function post_format( $post_id ) {

		$format = vp_metabox( 'jnews_single_post.format', null, $post_id );

		if ( empty( $format ) ) {

			// get old post format
			$format      = get_post_format( $post_id );
			$single_post = get_post_meta( $post_id, 'jnews_single_post', true );

			if ( $format ) {
				if ( isset( $single_post ) && is_array( $single_post ) ) {
					$single_post['format'] = $format;
				} else {
					$single_post = [
						'format' => $format,
					];
				}
			} else {
				if ( empty( $single_post ) ) {
					$single_post = [
						'format' => 'standard',
					];
				} else {
					$single_post['format'] = 'standard';
				}
			}

			// save into post format metabox
			update_post_meta( $post_id, 'jnews_single_post', $single_post );
		}
	}

	protected function post_format_video( $post_id ) {

		$video = vp_metabox( 'jnews_single_post.video', null, $post_id );

		if ( empty( $video ) ) {

			// get old post video
			$video = get_post_meta( $post_id, '_format_video_embed', true );

			if ( ! empty( $video ) ) {

				$single_post          = get_post_meta( $post_id, 'jnews_single_post', true );
				$single_post['video'] = $video;

				// save into post video metabox
				update_post_meta( $post_id, 'jnews_single_post', $single_post );
			}
		}
	}

	protected function post_format_gallery( $post_id ) {

		$gallery = vp_metabox( 'jnews_single_post.gallery', null, $post_id );

		if ( empty( $gallery ) ) {

			// get old post gallery
			$gallery = get_post_meta( $post_id, '_format_gallery_images', true );

			if ( ! empty( $gallery ) ) {

				$single_post            = get_post_meta( $post_id, 'jnews_single_post', true );
				$single_post['gallery'] = implode( ',', $gallery );

				// save into post gallery metabox
				update_post_meta( $post_id, 'jnews_single_post', $single_post );
			}
		}
	}

	public function get_post_format( $term, $post_id, $taxonomy ) {

		if ( $taxonomy === 'post_format' && isset( $term[0] ) ) {

			$post_format = vp_metabox( 'jnews_single_post.format', null, $post_id );

			if ( $post_format ) {
				$term[0]->slug = 'post-format-' . $post_format;
			}
		}

		return $term;
	}

	public function get_post_format_video( $value, $object_id, $meta_key ) {

		if ( isset( $meta_key ) && $meta_key === '_format_video_embed' ) {

			$video = vp_metabox( 'jnews_single_post.video', null, $object_id );

			if ( ! empty( $video ) ) {
				$value = $video;
			}
		}

		return $value;
	}

	public function get_post_format_gallery( $value, $object_id, $meta_key ) {

		if ( isset( $meta_key ) && $meta_key === '_format_gallery_images' ) {

			$video = vp_metabox( 'jnews_single_post.gallery', null, $object_id );

			if ( ! empty( $video ) ) {
				$value = [ explode( ',', $video ) ];
			}
		}

		return $value;
	}

	private static function get_settings() {
		$settings = apply_filters( 'classic_editor_plugin_settings', false );

		if ( is_array( $settings ) ) {
			return [
				'editor'           => ( isset( $settings['editor'] ) && $settings['editor'] === 'block' ) ? 'block' : 'classic',
				'allow-users'      => ! empty( $settings['allow-users'] ),
				'hide-settings-ui' => true,
			];
		}

		if ( ! empty( self::$settings ) ) {
			return self::$settings;
		}

		if ( class_exists( 'Classic_Editor' ) ) {
			if ( is_multisite() ) {
				$defaults = [
					'editor'      => get_network_option( null, 'classic-editor-replace' ) === 'block' ? 'block' : 'classic',
					'allow-users' => false,
				];

				$defaults = apply_filters( 'classic_editor_network_default_settings', $defaults );

				if ( get_network_option( null, 'classic-editor-allow-sites' ) !== 'allow' ) {
					// Per-site settings are disabled. Return default network options nad hide the settings UI.
					$defaults['hide-settings-ui'] = true;

					return $defaults;
				}

				// Override with the site options.
				$editor_option      = get_option( 'classic-editor-replace' );
				$allow_users_option = get_option( 'classic-editor-allow-users' );

				if ( $editor_option ) {
					$defaults['editor'] = $editor_option;
				}
				if ( $allow_users_option ) {
					$defaults['allow-users'] = ( $allow_users_option === 'allow' );
				}

				$editor      = ( isset( $defaults['editor'] ) && $defaults['editor'] === 'block' ) ? 'block' : 'classic';
				$allow_users = ! empty( $defaults['allow-users'] );
			} else {
				$allow_users = ( get_option( 'classic-editor-allow-users' ) === 'allow' );
				$option      = get_option( 'classic-editor-replace' );

				// Normalize old options.
				if ( $option === 'block' || $option === 'no-replace' ) {
					$editor = 'block';
				} else {
					// empty( $option ) || $option === 'classic' || $option === 'replace'.
					$editor = 'classic';
				}
			}

			// Override the defaults with the user options.
			if ( ( ! isset( $GLOBALS['pagenow'] ) || $GLOBALS['pagenow'] !== 'options-writing.php' ) && $allow_users ) {
				$user_options = get_user_option( 'classic-editor-settings' );

				if ( $user_options === 'block' || $user_options === 'classic' ) {
					$editor = $user_options;
				}
			}
		} else {
			$editor      = version_compare( get_bloginfo( 'version' ), '5.0', '>=' ) ? 'block' : 'classic';
			$allow_users = false;
		}

		self::$settings = [
			'editor'           => $editor,
			'hide-settings-ui' => false,
			'allow-users'      => $allow_users,
		];

		return self::$settings;
	}

	private static function get_current_post_type() {
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : null;

		if ( isset( $uri ) ) {
			$uri_parts = wp_parse_url( $uri );

			$file = basename( $uri_parts['path'] );

			if ( $uri && in_array( $file, [ 'post.php', 'post-new.php' ], true ) ) {
				$post_id = self::get_edited_post_id();

				$post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : null;

				$post_type = $post_id ? get_post_type( $post_id ) : $post_type;

				if ( isset( $post_type ) ) {
					return $post_type;
				}

				return 'post';
			}
		}
	}

	private static function get_edited_post_id() {
		global $post;

		$p_post_id = isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : null;

		$g_post_id = isset( $_GET['post'] ) ? $_GET['post'] : null;

		$post_id = $g_post_id ? $g_post_id : $p_post_id;

		$post_id = isset( $post->ID ) ? $post->ID : $post_id;

		if ( isset( $post_id ) ) {
			return (int) $post_id;
		}

		return 0;
	}

	public static function is_classic( $post_id = 0 ) {
		if ( self::get_current_post_type() === 'post' ) {
			$settings = self::get_settings();
			if ( ! $post_id ) {
				$post_id = self::get_edited_post_id();
			}
			if ( $settings['allow-users'] ) {
				if ( ! isset( $_GET['classic-editor__forget'] ) ) {
					if ( isset( $_GET['classic-editor'] ) ) {
						return true;
					}

					return 'classic' === $settings['editor'];
				}
				if ( $post_id ) {
					$which = get_post_meta( $post_id, 'classic-editor-remember', true );

					switch ( $which ) {
						case 'classic-editor':
							return true;
							break;
						case 'block-editor':
							return false;
							break;
						default:
							return ( ! self::has_blocks( $post_id ) );
							break;
					}
				}
				if ( isset( $_GET['classic-editor__forget'] ) ) {
					return false;
				}

				return 'classic' === $settings['editor'];
			}

			if ( isset( $_GET['classic-editor'] ) ) {
				return true;
			}

			return 'classic' === $settings['editor'];
		}

		return false;
	}

	private static function has_blocks( $post = null ) {
		if ( ! is_string( $post ) ) {
			$wp_post = get_post( $post );

			if ( $wp_post instanceof WP_Post ) {
				$post = $wp_post->post_content;
			}
		}

		return false !== strpos( (string) $post, '<!-- wp:' );
	}
}
