<?php
namespace Sphere\Core\SocialFollow;

/**
 * Social followers counter for several services
 */
class Module
{
	/**
	 * The settings related to this plugin
	 * @var array
	 */
	public $options;
	
	/**
	 * Timeout for remote connections
	 * @var integer
	 */
	public $timeout = 10;
	
	/**
	 * Constructor called at hook: bunyad_core_pre_init
	 */
	public function __construct()
	{
		// Add relevant options
		add_filter('bunyad_theme_options', array($this, 'add_theme_options'));
		
		// Flush cache on options save
		add_action('bunyad_options_saved', array($this, 'flush_cache'));
		add_action('customize_save', array($this, 'flush_cache'));
		
		// Initialize after bunyad frameowrk has run core setup
		add_action('after_setup_theme', array($this, 'init'), 12);
		
		define('SPHERE_SF_DIR', plugin_dir_path(__FILE__));
	}
	
	/**
	 * Initialize and setup settings
	 */
	public function init()
	{
		if (class_exists('\Bunyad')) {
			$this->options = \Bunyad::options()->get_all();
		}
		
			
		if (!is_admin()) {
			// DEBUG:
			//echo $this->count('facebook');
			//echo $this->count('gplus');
			//echo $this->count('youtube');
			//echo $this->count('vimeo');
			//echo $this->count('twitter');
			//echo $this->count('instagram');
			//echo $this->count('pinterest');
			//exit;
		}
	}
	
	/**
	 * Add to theme options array
	 * 
	 * @param  array $options
	 * @return array
	 */
	public function add_theme_options($options) 
	{
		$doc_link = apply_filters('sphere_theme_docs_url', 'http://theme-sphere.com/smart-mag/documentation/') . '#social-follow';
		
		$extra_options = array(
			'title' => __('Social Followers', 'bunyad'),
			'id'    => 'sphere-social-followers',
			'icon'  => 'dashicons-share',
			'sections' => array(
				'general' => array(
					'title'  => __('General', 'bunyad'),
					'fields' => array(
						'sf_counters' => array(
							'name' 	  => 'sf_counters',
							'label'   => __('Enable Follower Counters?', 'bunyad'),
							'value'   => 1,
							'desc'   => __('If follower counters/numbers are enabled, refer to <a href="'. esc_url($doc_link) .'" target="_blank">documentation</a> to learn how to set it up.', 'bunyad'),
							'type'    => 'checkbox',
							'events' => array('change' => array(
								'value' => 'checked', 
								'actions' => array(
									'show' => 'sf_facebook_app, sf_facebook_secret, sf_gplus_key, sf_youtube_url, sf_youtube_key, sf_twitter_key, 
												sf_twitter_secret, sf_twitter_token, sf_twitter_token_secret'
								)
							))
						),
					)
				),

				'facebook' => array(
					'title'  => 'Facebook',
					'desc'   => __('If follower counters/numbers are enabled, refer to <a href="'. esc_url($doc_link) .'"  target="_blank">documentation</a> to learn how to set it up.', 'bunyad'),
					'fields' => array(
						array(
							'name' 	  => 'sf_facebook_id',
							'label'   => __('Page Name / ID', 'bunyad'),
							'value'   => '',
							'desc'    => __('If your page URL is https://facebook.com/themesphere enter themesphere as the id here.', 'bunyad'),
							'type'    => 'text',
						),
							
						'sf_facebook_label' => array(
							'name' 	  => 'sf_facebook_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Like on Facebook', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
							
						// array(
						// 	'name' 	  => 'sf_facebook_app',
						// 	'label'   => __('App ID', 'bunyad'),
						// 	'value'   => '',
						// 	'desc'    => '',
						// 	'type'    => 'text',
						// ),
							
						// array(
						// 	'name' 	  => 'sf_facebook_secret',
						// 	'label'   => __('App Secret', 'bunyad'),
						// 	'value'   => '',
						// 	'desc'    => '',
						// 	'type'    => 'text',
						// ),
					)
				),
					
				'gplus' => array(
					'title'  => 'Google Plus',
					'desc'   => __('If follower counters/numbers are enabled, refer to <a href="'. esc_url($doc_link) .'" target="_blank">documentation</a> to learn how to set it up.', 'bunyad'),
					'fields' => array(
						array(
							'name' 	  => 'sf_gplus_id',
							'label'   => __('Page Name / ID', 'bunyad'),
							'value'   => '',
							'desc'    => __('If your page URL is https://plus.google.com/+themesphere enter +themesphere as the id here.', 'bunyad'),
							'type'    => 'text',
						),
							
						'sf_gplus_label' => array(
							'name' 	  => 'sf_gplus_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Follow on Google+', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_gplus_key',
							'label'   => __('Google API Key', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
					)
				),

				'youtube' => array(
					'title'  => 'YouTube',
					'desc'   => __('If follower counters/numbers are enabled, refer to <a href="'. esc_url($doc_link) .'" target="_blank">documentation</a> to learn how to set it up.', 'bunyad'),
					'fields' => array(
						array(
							'name' 	  => 'sf_youtube_id',
							'label'   => __('Channel ID', 'bunyad'),
							'value'   => '',
							'desc'    => __('You can get the id from <a href="https://www.youtube.com/account_advanced" target="_blank">https://www.youtube.com/account_advanced</a>.', 'bunyad'),
							'type'    => 'text',
						),
							
						'sf_youtube_label' => array(
							'name' 	  => 'sf_youtube_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Subscribe on YouTube', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_youtube_url',
							'label'   => __('Channel URL', 'bunyad'),
							'value'   => '',
							'desc'    => __('Full link to your YouTube channel.', 'bunyad'),
							'type'    => 'text',
						),

						array(
							'name' 	  => 'sf_youtube_key',
							'label'   => __('Google API Key', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
					)
				),
					
				'vimeo' => array(
					'title'  => 'Vimeo',
					'fields' => array(
						array(
							'name' 	  => 'sf_vimeo_id',
							'label'   => __('Vimeo Username / Channel', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
							
						'sf_vimeo_label' => array(
							'name' 	  => 'sf_vimeo_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Subscribe on Vimeo', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),

						array(
							'name' 	  => 'sf_vimeo_type',
							'label'   => __('Channel or User?', 'bunyad'),
							'value'   => 'user',
							'desc'    => '',
							'type'    => 'select',
							'options' => array(
								'user' => __('User', 'bunyad'),
								'channel' => __('Channel', 'bunyad')
							)
						),
					)
				),
					
				'twitter' => array(
					'title'  => 'Twitter',
					'desc'   => __('If follower counters/numbers are enabled, refer to <a href="'. esc_url($doc_link) .'" target="_blank">documentation</a> to learn how to set it up.', 'bunyad'),
					'fields' => array(
							
						array(
							'name' 	  => 'sf_twitter_id',
							'label'   => __('Twitter Username', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
							
						'sf_twitter_label' => array(
							'name' 	  => 'sf_twitter_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Follow on Twitter', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_twitter_key',
							'label'   => __('Consumer Key', 'bunyad'),
							'value'   => '',
							'desc'    => __('', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_twitter_secret',
							'label'   => __('Consumer Secret', 'bunyad'),
							'value'   => '',
							'desc'    => __('', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_twitter_token',
							'label'   => __('Access Token', 'bunyad'),
							'value'   => '',
							'desc'    => __('', 'bunyad'),
							'type'    => 'text',
						),
							
						array(
							'name' 	  => 'sf_twitter_token_secret',
							'label'   => __('Access Token Secret', 'bunyad'),
							'value'   => '',
							'desc'    => __('', 'bunyad'),
							'type'    => 'text',
						),
					)
				),
					
				'instagram' => array(
					'title'  => 'Instagram',
					'desc'   => '',
					'fields' => array(
						array(
							'name' 	  => 'sf_instagram_id',
							'label'   => __('Instagram Username', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
							
						'sf_instagram_label' => array(
							'name' 	  => 'sf_instagram_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Follow on Instagram', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
					)
				),
					
				'pinterest' => array(
					'title'  => 'Pinterest',
					'desc'   => '',
					'fields' => array(
						array(
							'name' 	  => 'sf_pinterest_id',
							'label'   => __('Pinterest Username', 'bunyad'),
							'value'   => '',
							'desc'    => '',
							'type'    => 'text',
						),
							
						'sf_pinterest_label' => array(
							'name' 	  => 'sf_pinterest_label',
							'label'   => __('Button Label', 'bunyad'),
							'value'   => __('Follow on Pinterest', 'bunyad'),
							'desc'    => __('The text to use on the widget.', 'bunyad'),
							'type'    => 'text',
						),
					)
				),
			)
		);
		
		// Add to the main options array
		$options['options-tab-social-followers'] = apply_filters('sphere_social_follow_options', $extra_options);	
		
		return $options;
	}
	
	/**
	 * Get share count for a specific service
	 * 
	 * @param string       $type     The service name
	 */
	public function count($type)
	{
		// Method exists?
		$method = 'get_' . $type;
		if (!method_exists($this, $method)) {
			return 0;
			
		}

		// Get the cache transient
		$cache = (array) get_transient('sphere_plugin_social_followers');
		$key   = $type;
		$count = isset($cache[$key]) ? $cache[$key] : '';

		if (empty($cache) OR !isset($cache[$key])) {
			
			try {
				$latest = call_user_func(array($this, $method));
			} catch (\Exception $e) {
				// don't be verbose about connection errors
			}

			// Only update if latest count is valid or cache is empty
			if ($latest OR empty($cache[$key])) {
				$cache[$key] = $latest;
			}
			
			// Cache the results for a day
			set_transient(
				'sphere_plugin_social_followers', 
				$cache, 
				apply_filters('sphere_plugin_social_followers_cache', DAY_IN_SECONDS)
			);
		}

		return $cache[$key];
	}

	/** 
	 * Remove transient cache
	 */
	public function flush_cache()
	{
		delete_transient('sphere_plugin_social_followers');
	}
	
	/**
	 * Get facebook followers count
	 */
	public function get_facebook()
	{
		if (empty($this->options['sf_facebook_id'])) {
			return false;
		}
	
		$url = 'https://www.facebook.com/v3.2/plugins/page.php?' . http_build_query(array(
			'href'          => 'https://facebook.com/' . $this->options['sf_facebook_id'],
			'tabs'          => '',
			'show_facepile' => 'false',
			'small_header'  => 'true',
			'locale'        => 'en_US'
		));
	
		// Get data from API
		$data = $this->remote_get($url);
		if ($data) {
			preg_match('/<\/?(?:[a-z]+)>([\d,\.]+(K|M|<|\s)).*?likes/is', $data, $match);

			if (!empty($match[1])) {

				$string     = strip_tags($match[1]);
				$multiplier = 1;

				if (strstr($string, 'M')) {
					$multiplier = 1000000;
				}
				else if (strstr($string, 'K')) {
					$multiplier = 1000;
				}

				$count  = filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
				$count  = abs(intval($count * $multiplier));
			}
		}
		
		return !empty($count) ? $count : 0;
	}
	
	/**
	 * Get Google+ followers count
	 */
	public function get_gplus()
	{
		// Options required
		if (empty($this->options['sf_gplus_id']) OR empty($this->options['sf_gplus_key'])) {
			return false;
		}
		
		$url = 'https://www.googleapis.com/plus/v1/people/' . urlencode($this->options['sf_gplus_id']) 
			 . '?key=' . urlencode($this->options['sf_gplus_key']);
		
		// Get data from API
		$data = $this->remote_get($url);
		$data = json_decode($data, true);
		
		return !empty($data['circledByCount']) ? intval($data['circledByCount']) : 0;
	}
	
	/**
	 * Get YouTube followers count
	 */
	public function get_youtube()
	{
		// Options required
		if (empty($this->options['sf_youtube_id']) OR empty($this->options['sf_youtube_key'])) {
			return false;
		}
		
		$url = 'https://www.googleapis.com/youtube/v3/channels?' . http_build_query(array(
			'part' => 'statistics',
			'id'   => $this->options['sf_youtube_id'],
			'key'  => $this->options['sf_youtube_key']
		));
		
		// Get data from API
		$data = $this->remote_get($url);
		$data = json_decode($data, true);
		$count = 0;
		
		if (!empty($data['items'][0]['statistics']['subscriberCount'])) {
			$count = $data['items'][0]['statistics']['subscriberCount'];
		}
		
		return intval($count);
	}
	
	/**
	 * Get YouTube followers count
	 */
	public function get_vimeo()
	{
		// Options required
		if (empty($this->options['sf_vimeo_id'])) {
			return false;
		}
		
		$base = 'https://vimeo.com/api/v2/';
		$key  = 'total_contacts';
		
		// Is it a channel?
		if ($this->options['sf_vimeo_type'] == 'channel') {
			$base = 'https://vimeo.com/api/v2/channel/';
			$key  = 'total_subscribers';
		}
		
		$url = $base . urlencode($this->options['sf_vimeo_id']) .'/info.json';
		
		// Get data from API
		$data = $this->remote_get($url);
		$data = json_decode($data, true);
		
		return !empty($data[$key]) ? $data[$key] : 0;
	}
	
	
	/**
	 * Get Twitter follower count
	 */
	public function get_twitter()
	{
		if (!$this->_check_options(array('id', 'key', 'secret', 'token', 'token_secret'), 'sf_twitter_')) {
			return false;
		}
		
		// Twitter API class
		require_once SPHERE_SF_DIR . '../vendor/twitter-api.php';
		
		$settings = array(
			'oauth_access_token'        => $this->options['sf_twitter_token'],
			'oauth_access_token_secret' => $this->options['sf_twitter_token_secret'],
			'consumer_key'    => $this->options['sf_twitter_key'],
			'consumer_secret' => $this->options['sf_twitter_secret']
		);
		
		$url = 'https://api.twitter.com/1.1/users/show.json';
		$twitter = new \TwitterAPIExchange($settings);
		
		// Perform request and get data
		$data = $twitter
					->setGetfield('?screen_name=' . $this->options['sf_twitter_id'])
					->buildOauth($url, 'GET')
					->performRequest();
		
		$data = json_decode($data, true);
		
		return !empty($data['followers_count']) ? $data['followers_count'] : 0;
	}
	
	/**
	 * Get Instagram follower count
	 */
	public function get_instagram()
	{
		if (empty($this->options['sf_instagram_id'])) {
			return false;
		}
		
		// Scrape it from the live site's JSON
		$url   = 'https://www.instagram.com/' . urlencode($this->options['sf_instagram_id']) . '/';
		$data  = $this->remote_get($url);
		$count = 0;

		// Have a match
		if (preg_match('/"edge_followed_by"[^{]+{"count"\:\s?([0-9]+)/', $data, $match)) {
			$count = $match[1];
		}
		
		return intval($count);
	}
	
	/**
	 * Get Pinterest followers
	 */
	public function get_pinterest()
	{
		if (empty($this->options['sf_pinterest_id'])) {
			return false;
		}
		
		$data = $this->remote_get('https://www.pinterest.com/' . urlencode($this->options['sf_pinterest_id']) . '/');
		preg_match('#property\=.?pinterestapp:followers([^>]+?)content\=.?(\d*)#i', $data, $match);
		
		$count = 0;
		
		if (!empty($match[2])) {
			$count = $match[2];
		}
		
		return intval($count);
		
	}
	
	/**
	 * Check required data is available in options
	 * 
	 * @param  array $keys
	 * @return bool  True if all exist
	 */
	public function _check_options($keys, $prefix = 'sf_') 
	{
		foreach ($keys as $key) {
			if (!array_key_exists($prefix . $key, $this->options)) {
				return false;
			}
		}
		
		return true;
	}
		
	/**
	 * A wrapper for wp_remote_get()
	 * 
	 * @param string $url
	 * @param array  $args
	 * @see   wp_remote_get()
	 * 
	 * @return string
	 */
	private function remote_get($url, $args = array()) 
	{
		$params = array_merge(array(
			'timeout'    => $this->timeout,
			'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36',
			'headers'    => array(
				'Accept-language' => 'en-US,en;q=0.9',
			),
		), $args);

		$response = wp_remote_get($url, $params);
		
		if (is_wp_error($response)) {
			return '';
		}
		
		return $response['body'];
	}
	
}