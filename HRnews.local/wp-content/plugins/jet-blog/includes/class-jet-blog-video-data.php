<?php
/**
 * Jet_Blog_Video_Data Class
 *
 * @package   package_name
 * @author    Cherry Team
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Blog_Video_Data' ) ) {

	/**
	 * Define Jet_Blog_Video_Data class
	 */
	class Jet_Blog_Video_Data {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * Holder for YouTube API key
		 *
		 * @var string
		 */
		private $youtube_api_key = null;

		/**
		 * Youtube API base URL
		 *
		 * @var string
		 */
		private $youtube_base = 'https://www.googleapis.com/youtube/v3/%s';

		/**
		 * Vimeo API base URL
		 *
		 * @var string
		 */
		private $vimeo_base = 'https://vimeo.com/api/v2/video/%1$s.json';

		/**
		 * Youtube Video base URL
		 *
		 * @var string
		 */
		private $yt_video_base_url = 'https://www.youtube.com/watch?v=%s';

		/**
		 * Current provider
		 *
		 * @var string
		 */
		private $current_provider = null;

		/**
		 * Video source match masks.
		 *
		 * @var array
		 */
		private $video_source_match_masks = array(
			'yt_channel'  => '/^.*(?:youtu\.be\/|youtube(?:-nocookie)?\.com\/channel\/)([a-zA-Z0-9\-_]+)/',
			'yt_user'     => '/^.*(?:youtu\.be\/|youtube(?:-nocookie)?\.com\/user\/)([a-zA-Z0-9\-_]+)/',
			'yt_playlist' => '/^.*(?:youtu\.be\/|youtube(?:-nocookie)?\.com\/playlist\?list=)([a-zA-Z0-9\-_]+)/',
		);

		/**
		 * Initialize handler
		 *
		 * @return void
		 */
		public function init() {
			$this->youtube_api_key = jet_blog_settings()->get( 'youtube_api_key' );
		}

		/**
		 * Get data for passed video.
		 *
		 * @param  string $url     Video url.
		 * @param  bool   $caching Caching.
		 * @return array
		 */
		public function get( $url = '', $caching = true ) {

			$key = $this->transient_key( $url );

			$cached = get_transient( $key );

			if ( $cached && true === $caching ) {
				return $cached;
			}

			$data = $this->fetch_embed_data( $url );
			$data = $this->merge_api_data( $data );

			if ( ! empty( $data ) ) {
				set_transient( $key, $data, 3 * DAY_IN_SECONDS );
			}

			return $data;
		}

		/**
		 * Get video list from source.
		 *
		 * @param string $url         Url.
		 * @param int    $max_results Number of videos.
		 * @param bool   $caching     Caching.
		 *
		 * @return array|mixed
		 */
		public function get_video_list_from_source( $url = '', $max_results = 10, $caching = true ) {

			if ( empty( $url ) ) {
				return array();
			}

			$key    = $this->transient_key( $url ) . $max_results;
			$cached = get_transient( $key );

			if ( $cached && true === $caching ) {
				return $cached;
			}

			$source_props = $this->get_video_source_properties( $url );

			if ( empty( $source_props ) ) {
				return array();
			}

			$video_list = array();
			$source     = $source_props['source'];
			$source_id  = $source_props['source_id'];

			switch ( $source ) {
				case 'yt_channel':
					$video_list = $this->get_youtube_channel_video_list( $source_id, $max_results );
					break;

				case 'yt_user':
					$video_list = $this->get_youtube_channel_video_list( null, $max_results, $source_id );
					break;

				case 'yt_playlist':
					$video_list  = $this->get_youtube_playlist_video_list( $source_id, $max_results );
					break;
			}

			if ( ! empty( $video_list ) ) {
				set_transient( $key, $video_list, DAY_IN_SECONDS );
			}

			return $video_list;
		}

		/**
		 * Get video source properties.
		 *
		 * @param string $url Url.
		 *
		 * @return array|bool
		 */
		public function get_video_source_properties( $url ) {
			foreach ( $this->video_source_match_masks as $provider => $match_mask ) {
				preg_match( $match_mask, $url, $matches );

				if ( $matches ) {
					return array(
						'source'    => $provider,
						'source_id' => $matches[1],
					);
				}
			}

			return false;
		}

		/**
		 * Fetch data from oembed provider
		 *
		 * @param  string $url Video url.
		 * @return array
		 */
		public function fetch_embed_data( $url ) {

			$oembed  = _wp_oembed_get_object();
			$data    = $oembed->get_data( $url );
			$pattern = '/[\'\"](http[s]?:\/\/.*?)[\'\"]/';

			$this->current_provider = $data->provider_name;
			$html = preg_replace_callback( $pattern, array( $this, 'add_embed_args' ), $data->html );
			$this->current_provider = null;

			return array(
				'url'               => $url,
				'title'             => $data->title,
				'video_id'          => $this->get_id_from_html( $html ),
				'provider_name'     => $data->provider_name,
				'html'              => $html,
				'thumbnail_default' => $data->thumbnail_url,
			);
		}

		/**
		 * Add data from main provider API to already fetched data.
		 *
		 * @param  array $data
		 * @return array
		 */
		public function merge_api_data( $data ) {

			$id = $data['video_id'];

			if ( ! $id ) {
				return $data;
			}

			$provider = $data['provider_name'];
			$api_data = array();

			switch ( $provider ) {
				case 'YouTube':
					$api_data = $this->get_youtube_data( $id );
					break;

				case 'Vimeo':
					$api_data = $this->get_vimeo_data( $id );
					break;
			}

			return array_merge( $data, $api_data );
		}

		/**
		 * Fetches YouTube specific data
		 *
		 * @param  string $id Video ID.
		 * @return array
		 */
		public function get_youtube_data( $id ) {

			if ( empty( $this->youtube_api_key ) ) {
				return array();
			}

			$response = wp_remote_get( add_query_arg(
				array(
					'id'   => $id,
					'part' => 'contentDetails',
					'key'  => $this->youtube_api_key,
				),
				sprintf( $this->youtube_base, 'videos' )
			) );

			$body = wp_remote_retrieve_body( $response );
			$body = json_decode( $body, true );

			if ( ! isset( $body['items'] ) || ! isset( $body['items'][0]['contentDetails']['duration'] ) ) {
				return array();
			}

			return array(
				'duration' => $this->convert_duration( $body['items'][0]['contentDetails']['duration'] ),
			);
		}

		/**
		 * Get YouTube video list by playlist ID
		 *
		 * @param  string $id          Playlist ID.
		 * @param  int    $max_results Number of videos.
		 * @return array
		 */
		public function get_youtube_playlist_video_list( $id = null, $max_results = 10 ) {

			if ( empty( $this->youtube_api_key ) ) {
				return array();
			}

			$response = wp_remote_get( add_query_arg(
				array(
					'playlistId' => $id,
					'part'       => 'contentDetails',
					'fields'     => 'items(contentDetails(videoId))',
					'maxResults' => $max_results,
					'key'        => $this->youtube_api_key,
				),
				sprintf( $this->youtube_base, 'playlistItems' )
			) );

			$body = wp_remote_retrieve_body( $response );
			$body = json_decode( $body, true );

			if ( ! isset( $body['items'] ) ) {
				return array();
			}

			$video_list = array();

			foreach ( $body['items'] as $item ) {
				if ( isset( $item['contentDetails']['videoId'] ) ) {
					$video_list[] = array(
						'_id' => strtolower( $item['contentDetails']['videoId'] ),
						'url' => sprintf( $this->yt_video_base_url, $item['contentDetails']['videoId'] )
					);
				}
			}

			return $video_list;
		}

		/**
		 * Get YouTube video list by Channel ID
		 *
		 * @param  string $id          Channel ID.
		 * @param  int    $max_results Number of videos.
		 * @param  string $user        User ID.
		 * @return array
		 */
		public function get_youtube_channel_video_list( $id = null, $max_results = 10, $user = null ) {

			if ( empty( $this->youtube_api_key ) ) {
				return array();
			}

			$args = array(
				'part'   => 'contentDetails',
				'fields' => 'items(contentDetails)',
				'key'    => $this->youtube_api_key,
			);

			if ( ! empty( $id ) ) {
				$args['id'] = $id;
			}

			if ( ! empty( $user ) ) {
				$args['forUsername'] = $user;
			}

			$response = wp_remote_get(
				add_query_arg(
					$args,
					sprintf( $this->youtube_base, 'channels' )
				)
			);

			$body = wp_remote_retrieve_body( $response );
			$body = json_decode( $body, true );

			if ( ! isset( $body['items'] ) || ! isset( $body['items'][0]['contentDetails']['relatedPlaylists']['uploads'] ) ) {
				return array();
			}

			$playlist_id = $body['items'][0]['contentDetails']['relatedPlaylists']['uploads'];

			return $this->get_youtube_playlist_video_list( $playlist_id, $max_results );
		}

		/**
		 * Fetches Vimeo specific data
		 *
		 * @param  int $id video ID.
		 * @return array
		 */
		public function get_vimeo_data( $id ) {

			$response = wp_remote_get( sprintf( $this->vimeo_base, $id ) );

			$body = wp_remote_retrieve_body( $response );
			$body = json_decode( $body, true );

			if ( ! isset( $body[0] ) ) {
				return array();
			}

			$result = array(
				'thumbnail_small'  => isset( $body[0]['thumbnail_small'] ) ? $body[0]['thumbnail_small'] : false,
				'thumbnail_medium' => isset( $body[0]['thumbnail_medium'] ) ? $body[0]['thumbnail_medium'] : false,
				'duration'         => isset( $body[0]['duration'] ) ? $body[0]['duration'] : false,
			);

			$result = array_filter( $result );

			if ( ! empty( $result['duration'] ) ) {
				$result['duration'] = $this->convert_duration( $result['duration'] );
			}

			return $result;

		}

		public function convert_duration( $duration ) {

			if ( 0 < absint( $duration ) ) {
				$items = array(
					zeroise( floor( $duration / 60 ), 2 ),
					zeroise( ( $duration % 60 ), 2 ),
				);
			} else {
				$interval = new DateInterval( $duration );
				$items    = array(
					( 0 < $interval->h ) ? zeroise( $interval->h, 2 ) : false,
					( 0 < $interval->i ) ? zeroise( $interval->i, 2 ) : false,
					( 0 < $interval->s ) ? zeroise( $interval->s, 2 ) : false,
				);
			}

			return implode( ':', array_filter( $items ) );
		}

		/**
		 * Find in passed embed string video ID.
		 *
		 * @param  string $html
		 * @return mixed
		 */
		public function get_id_from_html( $html ) {
			preg_match( '/http[s]?:\/\/[a-zA-Z0-9\.\/]+(video|embed)\/([a-zA-Z0-9\-_]+)/', $html, $matches );
			return ! empty( $matches[2] ) ? $matches[2] : false;
		}

		/**
		 * Callback to add required argumnets to passed video
		 *
		 * @param  array $matches
		 * @return string
		 */
		public function add_embed_args( $matches ) {

			$args = array();

			switch ( $this->current_provider ) {
				case 'YouTube':
					$args = array(
						'enablejsapi' => 1,
					);
					break;

				case 'Vimeo':
					$args = array(
						'api'    => 1,
						'byline' => 0,
						'title'  => 0,
					);
					break;
			}

			return sprintf( '"%s"', add_query_arg( $args, $matches[1] ) );
		}

		/**
		 * Returns appropriate transient key for passed URL
		 *
		 * @param  string $url
		 * @return string
		 */
		public function transient_key( $url ) {
			return 'video_data_' . jet_blog()->get_version() . md5( $url );
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}

}

/**
 * Returns instance of Jet_Blog_Video_Data
 *
 * @return object
 */
function jet_blog_video_data() {
	return Jet_Blog_Video_Data::get_instance();
}
