<?php
namespace Sphere\Core\Likes;

/**
 * A likes/+1 system handler
 */
class Module
{
	public function __construct()
	{
        add_action('wp_ajax_sphere_likes', array($this, 'ajax_like'));
		add_action('wp_ajax_nopriv_sphere_likes', array($this, 'ajax_like'));
		
		// add_action('wp_enqueue_scripts', array($this, 'register_script'));

		// Register AJAX URL.
		add_filter('wp_head', function() {

			printf(
				'<script>var Sphere_Plugin = %s;</script>', 
				wp_json_encode([
					'ajaxurl' => admin_url('admin-ajax.php')
				])
			);
		});
	}
	
	/**
	 * AJAX handler for likes
	 */
	public function ajax_like()
	{
		// Can the rating be added - perform all checks
		if (!$this->can_like(intval($_POST['id']))) {
			echo -1;
			wp_die();
		}
		
		$likes = $this->add_like($_POST['id']);
		
		echo json_encode(array('count' => $likes['count']));
		
		wp_die();
	}
	
	/**
	 * Get existing count 
	 * 
	 * @param integer|null $post_id
	 */
	public function get_count($post_id = null)
	{
		if (!$post_id) {
			$post_id = get_the_ID();
		}
		
		$votes = get_post_meta($post_id, '_sphere_user_likes', true);
		return (!empty($votes['count']) ? $votes['count'] : 0);
	}
	
	/**
	 * Add a like for the post 
	 */
	public function add_like($post_id = null)
	{
		if (!$post_id) {
			$post_id = get_the_ID();
		}
		
		if (!$this->can_like($post_id)) {
			return false;
		}
		
		$likes = get_post_meta($post_id, '_sphere_user_likes', true);
		
		// Defaults if no votes yet
		if (!is_array($likes)) {
			$likes = array('votes' => array(), 'count' => 0);
		}
		
		$likes['count']++;
		
		// Add IP Address - @deprecated for privacy
		// $likes['votes'][time()] = $this->get_user_ip();
		$likes['votes'][time()] = 1;
		
			
		// save meta data
		update_post_meta(intval($_POST['id']), '_sphere_user_likes', $likes);
		update_post_meta(intval($_POST['id']), '_sphere_user_likes_count', $likes['count']); 
		
		// set the cookie
		$ids = array();
		if (!empty($_COOKIE['sphere_user_likes'])) {
			$ids = (array) explode('|', $_COOKIE['sphere_user_likes']);
		}
		
		array_push($ids, $_POST['id']);
		setcookie('sphere_user_likes', implode('|', $ids), time() + 30 * DAY_IN_SECONDS, COOKIEPATH);
		
		return $likes;
	}
	
	/**
	 * Whether a user can like
	 * 
	 * @param integer|null $post_id
	 */
	public function can_like($post_id = null)
	{
		if (!$post_id) {
			$post_id = get_the_ID();
		}
		
		// Only supported for posts
		if (get_post_type($post_id) !== 'post') {
			return false;
		}

		// IP check - @deprecated since GDPR update
		// $votes = get_post_meta($post_id, '_sphere_user_likes', true);
		// $user_ip = $this->get_user_ip();
		
		// if (!empty($votes['votes'])) {
			
		// 	foreach ((array) $votes['votes'] as $time => $data) {
		// 		if (!empty($data[1]) && $data[1] == $user_ip) {
		// 			return false;
		// 		}
		// 	}
		// }
		
		// Cookie check
		if (!empty($_COOKIE['sphere_user_likes'])) {
			$ids = (array) explode('|', $_COOKIE['sphere_user_likes']);
			
			if (in_array($post_id, $ids)) {
				return false;
			}
		}
		
		return true;
	}
	
	/**
	 * Get user ip
	 * 
	 * @deprecated No longer used since GDPR update
	 */
	// public function get_user_ip()
	// {
	// 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	// 		// check ip from share internet
	// 		$ip = $_SERVER['HTTP_CLIENT_IP'];	
	// 	}
	// 	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	// 		// to check ip is pass from proxy
	// 		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	// 	}
	// 	else {
	// 		$ip = $_SERVER['REMOTE_ADDR'];
	// 	}

	// 	return $ip;
	// }
}