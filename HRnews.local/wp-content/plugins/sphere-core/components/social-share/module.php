<?php
namespace Sphere\Core\SocialShare;

/**
 * Get social sharing from the APIs.
 */
class Module
{
	/**
	 * Maximum for remote requests
	 * 
	 * @var integer
	 */
	public $timeout = 10;
	
	/**
	 * Get share count for a specific service
	 * 
	 * @param string       $type     The service name
	 * @param integer|null $post_id  Post ID if not in loop 
	 * @param integer|null $url      If explicitly defining the URL
	 */
	public function count($type, $post_id = null, $url = null)
	{
		// Method exists?
		$method = 'get_' . $type;
		if (!method_exists($this, $method)) {
			return 0;
			
		}
		
		// Get the cache transient
		$cache = (array) get_transient('sphere_plugin_social_counts');
		
		if (!$post_id) {
			$post_id = get_the_ID();
		}
		
		$key   = $type . '_' . $post_id;
		$count = isset($cache[$key]) ? $cache[$key] : '';

		if (empty($cache) OR !isset($cache[$key])) {
			
			// Use post permalink if no URL set
			if (!$url) {
				$url = get_permalink($post_id);
			}
			
			$cache[$key] = call_user_func(array($this, $method), $url);
			
			// Cache the results for a day
			set_transient(
				'sphere_plugin_social_counts', 
				$cache, 
				apply_filters('sphere_plugin_social_cache', DAY_IN_SECONDS)
			);
		}

		return $cache[$key];
	}
	
	/**
	 * Twitter shares
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_twitter($url) 
	{
		$json = $this->remote_get('http://public.newsharecounts.com/count.json?url=' . $url);
		$json = json_decode($json, true);
		
		return isset($json['count']) ? intval($json['count']) : 0;
	}

	/**
	 * Get Linked In Shares
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_linkedin($url) 
	{ 
		$json = $this->remote_get('http://www.linkedin.com/countserv/count/share?url=' . $url . '&format=json');
		$json = json_decode($json, true);
		
		return isset($json['count']) ? intval($json['count']) : 0;
	}

	/**
	 * Get Facebook shares
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_facebook($url)
	{
		//$json = $this->remote_get('http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls=' . $url);
		$json = $this->remote_get('http://graph.facebook.com/?id=' . $url);
		$json = json_decode($json, true);
		
		//return !empty($json[0]['total_count']) ? intval($json[0]['total_count']) : 0;
		
		return !empty($json['share']['share_count']) ? intval($json['share']['share_count']) : 0;
	}

	/**
	 * Get Google+ Shares for a URL
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_gplus($url) 
	{
		$response = wp_remote_request('https://clients6.google.com/rpc', array(
			'method'  => 'POST',
			'body'    => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . esc_attr(rawurldecode($url)) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]',
			'headers' => array('Content-Type' => 'application/json')
		));
		
		if (is_wp_error($response)) {
			return 0;
		}
		
		$json = json_decode($response['body'], true);
		
		return !empty($json[0]['result']['metadata']['globalCounts']['count']) ? intval($json[0]['result']['metadata']['globalCounts']['count']) : 0;		
	}

	/**
	 * Get Stumbleupon count
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_stumbleupon($url) 
	{
		$json = $this->remote_get('http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $url);
		$json = json_decode($json, true);
		
		return isset($json['result']['views']) ? intval($json['result']['views']) : 0;
	}

	/**
	 * Get Pinterest pins
	 * 
	 * @param  string $url
	 * @return integer
	 */
	public function get_pinterest($url) 
	{
		$return_data = $this->remote_get('http://api.pinterest.com/v1/urls/count.json?url=' .  $url);
		$json = preg_replace('/^receiveCount((.*))$/', "\1", $return_data);
		$json = json_decode($json, true);
		
		return isset($json['count']) ? intval($json['count']) : 0;
	}

	/**
	 * A wrapper for wp_remote_get()
	 * 
	 * @param  string $url
	 * @return string
	 * @see wp_remote_get()
	 */
	private function remote_get($url) 
	{
		$response = wp_remote_get($url, array(
			'timeout' => $this->timeout,
		));
		
		if (is_wp_error($response)) {
			return '';
		}
		
		return $response['body'];
	}
}