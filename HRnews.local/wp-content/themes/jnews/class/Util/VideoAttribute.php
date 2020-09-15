<?php
/**
 * @author Jegtheme
 */

namespace JNews\Util;

/**
 * Class JNews Video Thumbnail
 */
class VideoAttribute {
	/**
	 * @var string
	 */
	public static $meta_option = 'jnews_video_option';
	/**
	 * @var string
	 */
	public static $meta_cache = 'jnews_video_cache';
	/**
	 * @var string
	 */
	public static $meta_duration = 'video_duration';
	/**
	 * @var string
	 */
	public static $meta_preview = 'video_preview';
	/**
	 * Video Thumbnail
	 *
	 * @var string
	 */
	public static $meta_thumbnail = 'thumbnail';
	/**
	 * @var VideoAttribute
	 */
	private static $instance;
	/**
	 * @var bool
	 */
	private static $executed = false;
	/**
	 * @var array
	 */
	private $attribute = array();

	/**
	 * VideoAttribute constructor
	 */
	private function __construct() {
		$this->setup_hook();
	}

	/**
	 * Setup hook function
	 */
	public function setup_hook() {
		add_action( 'admin_notices', array( $this, 'api_key_notice' ) );
		add_action( 'edit_post', array( $this, 'video_attribute' ) );
		add_action( 'save_post', array( $this, 'video_attribute' ) );
		add_filter( 'wpalchemy_filter_jnews_video_option_save', array( $this, 'save_meta' ) );

		add_action( 'wp_ajax_dismiss_api_notice', array( $this, 'dismiss_api_notice' ) );
		add_action( 'wp_ajax_nopriv_dismiss_api_notice', array( $this, 'dismiss_api_notice' ) );
	}

	/**
	 * @return VideoAttribute
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * API key notice
	 */
	public function api_key_notice() {
		if ( defined( 'JNEWS_ESSENTIAL' ) ) {
			if ( ! $this->is_set_youtube_api() && ! get_option( 'jnews_dismiss_api_notice', false ) ) {
				$this->print_api_notice();
			}
		}
	}

	/**
	 * Check youtube API key
	 *
	 * @return bool
	 */
	public function is_set_youtube_api() {
		if ( ! empty( $this->youtube_api() ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Get Saved YouTube API
	 *
	 * @return mixed
	 */
	public function youtube_api() {
		return get_theme_mod( 'jnews_youtube_api' );
	}

	/**
	 * Print API notice
	 */
	public function print_api_notice() {
		?>
		<div class="notice notice-error">
			<p>
				<?php
				printf(
					wp_kses(
						__(
							'<span class="jnews-notice-heading">Youtube API</span>
                            <span style="display: block;">Please Configure Youtube API key for <strong>fetching youtube video details</strong>. Click button bellow to Configure Youtube API key:</span>
                            <span class="jnews-notice-button">
                                <a href="%s" class="button-primary">Configure Now</a>
                            </span>
                            ',
							'jnews'
						),
						array(
							'strong' => array(),
							'span'   => array(
								'style' => true,
								'class' => true,
							),
							'a'      => array(
								'href'  => true,
								'class' => true,
							),
						)
					),
					esc_url( get_admin_url() . 'customize.php?autofocus[section]=jnews_global_api_section' )
				);
				?>
			</p>
			<span class="close-button api"><i class="fa fa-times"></i></span>
		</div>
		<?php
	}

	/**
	 * Dismiss api notice
	 */
	public function dismiss_api_notice() {
		update_option( 'jnews_dismiss_api_notice', true );
	}

	/**
	 * Update Meta
	 *
	 * @return array
	 */
	public function save_meta( $data ) {
		if ( ! empty( $this->attribute ) ) {
			return $this->attribute;
		}

		return $data;
	}

	/**
	 * Video Post Thumbnail
	 *
	 * @param integer $post_id
	 */
	public function video_attribute( $post_id ) {
		if ( ! self::$executed ) {
			$jnews_format_video = isset( $_POST['jnews_single_post'] ) && isset( $_POST['jnews_single_post']['format'] ) && $_POST['jnews_single_post']['format'] == 'video';

			if ( get_post_format() == 'video' || $jnews_format_video ) {
				$video_url = '';
				$attribute = get_post_meta( $post_id, self::$meta_cache, true );

				if ( isset( $_POST['_format_video_embed'] ) ) {
					$video_url = $_POST['_format_video_embed'];
				} else {
					if ( isset( $_POST['jnews_single_post']['video'] ) ) {
						$video_url = $_POST['jnews_single_post']['video'];
					}
				}

				if ( ! isset( $attribute['url'] ) || ( isset( $attribute['url'] ) && $attribute['url'] != $video_url ) ) {
					$newAttribute = $this->get_video_attribute( $video_url );
					$this->save_attribute_to_post( $newAttribute, $post_id, $video_url );
					$this->remove_attachment( $attribute );
				}
			}

			self::$executed = true;
		}
	}

	/**
	 * Get Video Attribute
	 *
	 * @param $video_url
	 *
	 * @return array
	 */
	public function get_video_attribute( $video_url ) {
		$attribute  = array();
		$video_id   = $this->get_video_id( $video_url );
		$video_type = $this->get_video_provider( $video_url );

		switch ( $video_type ) {
			case 'youtube':
				$attribute         = $this->youtube_attribute( $video_id );
				$attribute['type'] = 'YouTube';
				break;
			case 'vimeo':
				$attribute         = $this->vimeo_attribute( $video_id );
				$attribute['type'] = ucfirst( $video_type );
				break;
			case 'dailymotion':
				$attribute         = $this->dailymotion_attribute( $video_id );
				$attribute['type'] = ucfirst( $video_type );
				break;
			default:
				$attribute['type'] = 'unknown';
				break;
		}

		$attribute['url'] = $video_url;

		return $attribute;
	}

	/**
	 * Get video id
	 *
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function get_video_id( $video_url ) {
		$video_type = $this->get_video_provider( $video_url );
		$video_id   = '';

		if ( $video_type == 'youtube' ) {
			$regexes = array(
				'#(?:https?:)?//www\.youtube(?:\-nocookie|\.googleapis)?\.com/(?:v|e|embed)/([A-Za-z0-9\-_]+)#',
				// Comprehensive search for both iFrame and old school embeds
				'#(?:https?(?:a|vh?)?://)?(?:www\.)?youtube(?:\-nocookie)?\.com/watch\?.*v=([A-Za-z0-9\-_]+)#',
				// Any YouTube URL. After http(s) support a or v for Youtube Lyte and v or vh for Smart Youtube plugin
				'#(?:https?(?:a|vh?)?://)?youtu\.be/([A-Za-z0-9\-_]+)#',
				// Any shortened youtu.be URL. After http(s) a or v for Youtube Lyte and v or vh for Smart Youtube plugin
				'#<div class="lyte" id="([A-Za-z0-9\-_]+)"#',
				// YouTube Lyte
				'#data-youtube-id="([A-Za-z0-9\-_]+)"#',
				// LazyYT.js
			);

			foreach ( $regexes as $regex ) {
				if ( preg_match( $regex, $video_url, $matches ) ) {
					$video_id = $matches[1];
				}
			}
		}

		if ( $video_type == 'vimeo' ) {
			$regexes = array(
				'#<object[^>]+>.+?http://vimeo\.com/moogaloop.swf\?clip_id=([A-Za-z0-9\-_]+)&.+?</object>#s',
				// Standard Vimeo embed code
				'#(?:https?:)?//player\.vimeo\.com/video/([0-9]+)#',
				// Vimeo iframe player
				'#\[vimeo id=([A-Za-z0-9\-_]+)]#',
				// JR_embed shortcode
				'#\[vimeo clip_id="([A-Za-z0-9\-_]+)"[^>]*]#',
				// Another shortcode
				'#\[vimeo video_id="([A-Za-z0-9\-_]+)"[^>]*]#',
				// Yet another shortcode
				'#(?:https?://)?(?:www\.)?vimeo\.com/([0-9]+)#',
				// Vimeo URL
				'#(?:https?://)?(?:www\.)?vimeo\.com/channels/(?:[A-Za-z0-9]+)/([0-9]+)#',
				// Channel URL
			);

			foreach ( $regexes as $regex ) {
				if ( preg_match( $regex, $video_url, $matches ) ) {
					$video_id = $matches[1];
				}
			}
		}

		if ( $video_type == 'dailymotion' ) {
			$regexes = array(
				'#<object[^>]+>.+?http://www\.dailymotion\.com/swf/video/([A-Za-z0-9]+).+?</object>#s',
				// Dailymotion flash
				'#//www\.dailymotion\.com/embed/video/([A-Za-z0-9]+)#',
				// Dailymotion iframe
				'#(?:https?://)?(?:www\.)?dailymotion\.com/video/([A-Za-z0-9]+)#',
				// Dailymotion URL
				'#(?:https?://)?(?:www\.)?dai\.ly/([A-Za-z0-9]+)#',
				// Dailymotion short URL
			);

			foreach ( $regexes as $regex ) {
				if ( preg_match( $regex, $video_url, $matches ) ) {
					$video_id = $matches[1];
				}
			}
		}

		return $video_id;
	}

	/**
	 * Get video provider
	 *
	 * @param string $video_url
	 *
	 * @return string
	 */
	public function get_video_provider( $video_url ) {
		$video_format = strtolower( pathinfo( $video_url, PATHINFO_EXTENSION ) );
		if ( strpos( $video_url, 'youtube' ) > 0 ) {
			return 'youtube';
		} elseif ( strpos( $video_url, 'youtu.be' ) > 0 ) {
			return 'youtube';
		} elseif ( strpos( $video_url, 'vimeo' ) > 0 ) {
			return 'vimeo';
		} elseif ( strpos( $video_url, 'dailymotion' ) > 0 || strpos( $video_url, 'dai.ly' ) > 0 ) {
			return 'dailymotion';
		} elseif ( $video_format === 'mp4' ) {
			return 'mp4';
		} elseif ( wp_oembed_get( $video_url ) ) {
			return 'oembed';
		} else {
			return 'unknown';
		}
	}

	/**
	 * Get YouTube Attribute
	 *
	 * @param $video_id
	 *
	 * @return array
	 */
	public function youtube_attribute( $video_id ) {
		$video_detail   = array();
		$url            = 'https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&part=id,contentDetails,snippet&key=' . $this->youtube_api();
		$youtube_remote = wp_remote_get( $url );

		if ( ! is_wp_error( $youtube_remote ) && $youtube_remote['response']['code'] == '200' ) {
			$youtube_remote = json_decode( $youtube_remote['body'] );

			foreach ( $youtube_remote->items as $item ) {
				$video_detail['title']       = $item->snippet->title;
				$video_detail['duration']    = jeg_video_duration( $item->contentDetails->duration );
				$video_detail['description'] = nl2br( $item->snippet->description );
				if ( ! is_admin() ) {
					$taxonomy = $this->youtube_category( $item->snippet->categoryId );
					if ( ! empty( $taxonomy ) ) {
						$video_detail['category'] = $taxonomy;
					}
				}

				if ( $item->snippet->thumbnails->maxres ) {
					$video_detail[ self::$meta_thumbnail ] = $item->snippet->thumbnails->maxres->url;
				} elseif ( $item->snippet->thumbnails->standard ) {
					$video_detail[ self::$meta_thumbnail ] = $item->snippet->thumbnails->standard->url;
				} elseif ( $item->snippet->thumbnails->high ) {
					$video_detail[ self::$meta_thumbnail ] = $item->snippet->thumbnails->high->url;
				} elseif ( $item->snippet->thumbnails->medium ) {
					$video_detail[ self::$meta_thumbnail ] = $item->snippet->thumbnails->medium->url;
				} elseif ( $item->snippet->thumbnails->default ) {
					$video_detail[ self::$meta_thumbnail ] = $item->snippet->thumbnails->default->url;
				}
			}
		}

		// Get short video
		$search_url     = "https://www.youtube.com/results?search_query=\"{$video_id}\"";
		$youtube_search = wp_remote_get(
			$search_url,
			array(
				'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36',
			)
		);

		if ( ! is_wp_error( $youtube_search ) && $youtube_search['response']['code'] == '200' ) {
			$regex = '#https:\/\/i.ytimg.com\/an_webp\/' . $video_id . '\/[^"]*#';

			if ( preg_match( $regex, $youtube_search['body'], $matches ) ) {
				$video_detail['video_preview'] = $this->unescapeUTF8EscapeSeq( $matches[0] );
			}
		}

		return $video_detail;
	}

	public function youtube_category( $catid ) {
		$taxonomy        = array();
		$category_detail = array();
		$url             = 'https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&id=' . $catid . '&key=' . $this->youtube_api();
		$youtube_remote  = wp_remote_get( $url );

		if ( ! is_wp_error( $youtube_remote ) && $youtube_remote['response']['code'] == '200' ) {
			$youtube_remote = json_decode( $youtube_remote['body'] );

			foreach ( $youtube_remote->items as $item ) {
				$taxonomy['title'] = $item->snippet->title;
				$term              = $this->create_taxonomy( $taxonomy );
				if ( ! is_wp_error( $term ) ) {
					$term_exist = term_exists( (int) $term, 'category' );
					if ( $term_exist['term_id'] !== 0 && $term_exist['term_id'] !== null ) {
						$category_detail = array(
							'name' => $taxonomy['title'],
							'id'   => $term,
						);
					}
				}
			}
		}

		return $category_detail;
	}

	public function create_taxonomy( $args ) {

		$default = array(
			'title'       => 'Example Category',
			'slug'        => null,
			'parent'      => 0,
			'taxonomy'    => 'category',
			'description' => null,

		);
		$args    = wp_parse_args( $args, $default );
		$args    = sanitize_term( $args, $args['taxonomy'], 'db' );
		// expected_slashed ($name)
		$name     = wp_unslash( $args['title'] );
		$taxonomy = $args['taxonomy'];
		$parent   = (int) $args['parent'];

		$slug_provided = ! empty( $args['slug'] );
		if ( ! $slug_provided ) {
			$slug = sanitize_title( $name );
		} else {
			$slug = $args['slug'];
		}

		/*
		 * Prevent the creation of terms with duplicate names at the same level of a taxonomy hierarchy,
		 * unless a unique slug has been explicitly provided.
		 */
		$name_matches = get_terms(
			$taxonomy,
			array(
				'name'                   => $name,
				'hide_empty'             => false,
				'parent'                 => $args['parent'],
				'update_term_meta_cache' => false,
			)
		);

		/*
		 * The `name` match in `get_terms()` doesn't differentiate accented characters,
		 * so we do a stricter comparison here.
		 */
		$name_match = null;
		if ( $name_matches ) {
			foreach ( $name_matches as $_match ) {
				if ( strtolower( esc_html( $name ) ) === strtolower( $_match->name ) ) {
					$name_match = $_match;
					break;
				}
			}
		}

		if ( $name_match ) {
			$slug_match = get_term_by( 'slug', $slug, $taxonomy );
			if ( ! $slug_provided || $name_match->slug === $slug || $slug_match ) {
				if ( is_taxonomy_hierarchical( $taxonomy ) ) {
					$siblings = get_terms(
						$taxonomy,
						array(
							'get'                    => 'all',
							'parent'                 => $parent,
							'update_term_meta_cache' => false,
						)
					);

					$existing_term = null;
					if ( ( ! $slug_provided || $name_match->slug === $slug ) && in_array( $name, wp_list_pluck( $siblings, 'name' ) ) ) {
						$existing_term = $name_match;
					} elseif ( $slug_match && in_array( $slug, wp_list_pluck( $siblings, 'slug' ) ) ) {
						$existing_term = $slug_match;
					}

					if ( $existing_term ) {
						return $existing_term->term_id;
					}
				} else {
					return $name_match->term_id;
				}
			}
		}

		if ( ! isset( $term ) ) {
			$term = wp_insert_term(
				$args['title'],
				$args['taxonomy'],
				array(
					'description' => $args['description'],
					'slug'        => $args['slug'],
					'parent'      => $args['parent'],
				)
			);
		}

		if ( is_wp_error( $term ) ) {
			return $term;
		} else {
			return $term['term_id'];
		}

	}

	/**
	 * Unescape UTF8
	 *
	 * @param $str
	 *
	 * @return null|string|string[]
	 */
	function unescapeUTF8EscapeSeq( $str ) {
		return preg_replace_callback(
			"/\\\u([0-9a-f]{4})/i",
			function ( $matches ) {
				return html_entity_decode( '&#x' . $matches[1] . ';', ENT_QUOTES, 'UTF-8' );
			},
			$str
		);
	}

	/**
	 * Get Vimeo Attribute
	 *
	 * @param $video_id
	 *
	 * @return array
	 */
	public function vimeo_attribute( $video_id ) {
		$video_detail = [];
		$url          = 'https://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id . '&width=1920&height=1080';
		$vimeo_remote = wp_remote_get( $url );

		if ( ! is_wp_error( $vimeo_remote ) && $vimeo_remote['response']['code'] == '200' ) {
			$vimeo_remote    = json_decode( $vimeo_remote['body'], true );
			$thumbnail_1080p = $vimeo_remote['thumbnail_url'];
			if ( ! empty( $thumbnail_1080p ) ) {
				preg_match( '/((?:https?:)?\/\/i\.vimeocdn\.com\/(?:video)\/)((?:[A-Za-z0-9\-_]+)_(\d+)\.(?:[A-Za-z0-9\-_]+))/', $thumbnail_1080p, $thumbnail_1080p );
				if ( is_array( $thumbnail_1080p ) ) {
					$thumbnail_1080p[2] = str_replace( $thumbnail_1080p[3], '1920', $thumbnail_1080p[2] );
					$thumbnail_1080p    = $thumbnail_1080p[1] . $thumbnail_1080p[2];
				}
			}

			$video_detail['title']       = $vimeo_remote['title'];
			$video_detail['thumbnail']   = $thumbnail_1080p;
			$video_detail['duration']    = gmdate( 'H:i:s', intval( $vimeo_remote['duration'] ) );
			$video_detail['description'] = $vimeo_remote['description'];
		}

		return $video_detail;
	}

	/**
	 * Get Daily Motion Attribute
	 *
	 * @param $video_id
	 *
	 * @return array
	 */
	public function dailymotion_attribute( $video_id ) {
		$video_detail = array();
		$taxonomy     = array();
		$url          = 'https://api.dailymotion.com/video/' . $video_id . '?fields=title,duration,thumbnail_1080_url,description,channel.name,channel.slug,channel.description';
		$response     = wp_remote_get( $url );

		if ( ! is_wp_error( $response ) && $response['response']['code'] == '200' ) {
			$response = json_decode( $response['body'] );
			$response = ( is_object( $response ) ) ? (array) $response : array();
			if ( ! empty( $response ) ) {
				$video_detail['title']       = $response['title'];
				$video_detail['thumbnail']   = $response['thumbnail_1080_url'];
				$video_detail['duration']    = gmdate( 'H:i:s', intval( $response['duration'] ) );
				$video_detail['description'] = $response['description'];
				if ( ! is_admin() ) {
					$taxonomy['title']       = $response['channel.name'];
					$taxonomy['slug']        = $response['channel.slug'];
					$taxonomy['description'] = $response['channel.description'];
					$term                    = $this->create_taxonomy( $taxonomy );
					if ( ! is_wp_error( $term ) ) {
						$term_exist = term_exists( (int) $term, 'category' );
						if ( $term_exist !== 0 && $term_exist !== null ) {
							$video_detail['category'] = array(
								'name' => $taxonomy['title'],
								'id'   => $term,
							);
						}
					}
				}
			}
		}

		return $video_detail;
	}

	/**
	 * Save attribute to Post
	 *
	 * @param $attribute
	 * @param $post_id
	 *
	 * @return array
	 */
	public function save_attribute_to_post( $attribute, $post_id, $video_url ) {
		// save thumbnail first
		if ( ! ctype_digit( get_post_thumbnail_id( $post_id ) ) ) {
			if ( isset( $attribute[ self::$meta_thumbnail ] ) ) {
				$attachment_id = $this->save_to_media_library( $post_id, $attribute[ self::$meta_thumbnail ] );
				$this->set_featured_image( $post_id, $attachment_id, $video_url );
				$attribute[ self::$meta_thumbnail ] = $attachment_id;
			}
		}

		// save duration
		if ( isset( $attribute['duration'] ) && ! empty( $attribute['duration'] ) ) {
			$this->attribute[ self::$meta_duration ] = $attribute['duration'];
		}

		// save preview
		if ( isset( $attribute['video_preview'] ) && ! empty( $attribute['video_preview'] ) ) {
			$attachment                             = $this->save_to_media_library( $post_id, $attribute['video_preview'] );
			$this->attribute[ self::$meta_preview ] = wp_get_attachment_url( $attachment );
			$attribute[ self::$meta_preview ]       = $attachment;
		}

		update_post_meta( $post_id, self::$meta_cache, $attribute );

		return $attribute;
	}

	/**
	 * Save video thumbnail into media library
	 *
	 * @param integer $post_id
	 * @param string $thumbnail_url
	 *
	 * @return integer thumbnail id
	 */
	public function save_to_media_library( $post_id, $thumbnail_url ) {
		$response = wp_remote_get( $thumbnail_url );

		if ( ! is_wp_error( $response ) && $response['response']['code'] == '200' ) {
			$image_content = $response['body'];
			$image_type    = wp_remote_retrieve_header( $response, 'content-type' );

			// Translate MIME type into an extension
			if ( $image_type == 'image/jpeg' ) {
				$image_extension = '.jpg';
			} elseif ( $image_type == 'image/png' ) {
				$image_extension = '.png';
			} elseif ( $image_type == 'image/gif' ) {
				$image_extension = '.gif';
			} elseif ( $image_type == 'image/webp' ) {
				$image_extension = '.webp';
			} else {
				return false;
			}

			$filename = $this->construct_filename( $post_id ) . $image_extension;
			$upload   = wp_upload_bits( $filename, null, $image_content );

			if ( ! $upload['error'] ) {
				$wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );

				$upload = apply_filters(
					'wp_handle_upload',
					array(
						'file' => $upload['file'],
						'url'  => $upload['url'],
						'type' => $wp_filetype['type'],
					),
					'sideload'
				);

				// Contstruct the attachment array
				$attachment = array(
					'post_mime_type' => $upload['type'],
					'post_title'     => get_the_title( $post_id ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				);

				// Insert the attachment
				$attach_id = wp_insert_attachment( $attachment, $upload['file'], $post_id );
				require_once ABSPATH . 'wp-admin/includes/image.php';
				$attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				return $attach_id;
			}
		}
	}

	/**
	 * Create filename for image thumbnail
	 *
	 * @param integer $post_id
	 *
	 * @return string
	 */
	public function construct_filename( $post_id ) {
		$filename = get_the_title( $post_id );
		$filename = sanitize_title( $filename, $post_id );
		$filename = urldecode( $filename );
		$filename = preg_replace( '/[^a-zA-Z0-9\-]/', '', $filename );
		$filename = trim( $filename, '-' );
		$filename = ( $filename == '' ) ? (string) $post_id : $filename;

		return $filename;
	}

	/**
	 * Set post thumbnail
	 *
	 * @param integer $post_id
	 * @param integer $attach_id
	 * @param string $video_url
	 */
	public function set_featured_image( $post_id, $attach_id, $video_url ) {
		set_post_thumbnail( $post_id, $attach_id );
	}

	/**
	 * Remove Attachment
	 *
	 * @param $attribute
	 */
	public function remove_attachment( $attribute ) {
		if ( isset( $attribute['thumbnail'] ) && ctype_digit( $attribute['thumbnail'] ) ) {
			wp_delete_attachment( $attribute['thumbnail'] );
		}

		if ( isset( $attribute['video_preview'] ) && ctype_digit( $attribute['video_preview'] ) ) {
			wp_delete_attachment( $attribute['video_preview'] );
		}
	}
}
