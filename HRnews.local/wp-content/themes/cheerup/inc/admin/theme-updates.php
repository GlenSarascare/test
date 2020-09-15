<?php
/**
 * Theme update notifications for critical security updates.
 */
class Bunyad_Theme_Updates
{
	protected $theme;
	
	/**
	 * In-memory update info from transient
	 *  
	 * @var array
	 */
	public $update = array();

	/**
	 * Data from latest remote check. Cached to prevent multiple requests.
	 */
	protected $remote_data = [];
	
	public function __construct()
	{
		add_filter('pre_set_site_transient_update_themes', array($this, 'check_update'));
		add_action('admin_init', array($this, 'admin_init'));
	
		// Curent theme name
		$this->theme = get_template();

		// Debug: 
		// $t = get_site_option('_site_transient_update_themes');
		// $t->last_checked = time() - (13 * HOUR_IN_SECONDS);
		// update_site_option('_site_transient_update_themes', $t);
	}
	
	/**
	 * Investigate transients to check for theme version
	 */
	public function admin_init()
	{
		$transient    = '_' . $this->theme . '_update_theme';

		// Site transient: Shared with all network.
		$this->update = $update = get_site_transient($transient);
		
		if ($update) {
			
			// Already updated?
			if (version_compare(Bunyad::options()->get_config('theme_version'), $update['version'], '>=')) {
				delete_site_transient($transient);
				return;
			}
			
			add_action('admin_notices', array($this, 'notice_critical'));
		}	
	}
	
	/**
	 * Critical update notice
	 */
	public function notice_critical()
	{
		?>
		
		<div class="update-nag">
		
			<?php if (empty($this->update['info'])): ?>
				
				<p><strong>WARNING:</strong> Your theme version requires a critical security update. Please update your theme to latest version immediately.</p>
				
			<?php else: ?>
				
				<?php echo wp_kses_post($this->update['info']); ?>
			
			<?php endif; ?>
		</div>
		
		<?php
	}
	
	/**
	 * Checks for theme update
	 */
	public function check_update($transient)
	{
		if (empty($transient->checked)) {
			return $transient;
		}

		$this->check_critical();
		
		return $transient;
	}
	
	/**
	 * Checks for critical theme security updates
	 * 
	 * A secure HTTPS request is sent with data in POST to ensure version number isn't 
	 * exposed to MITM.
	 */
	public function check_critical()
	{

		/**
		 * Make a remote request if we haven't already done so. Cache remote data and
		 * check for it, as sometimes WP may update 'update_themes' transient twice, 
		 * hencing calling this method twice.
		 */
		if (!$this->remote_data) {

			$url  = 'https://system.theme-sphere.com/wp-json/api/v1/update';
			$args = [
				'body' => [
					'theme' => $this->theme,
					'ver'   => Bunyad::options()->get_config('theme_version'),

					// Checks for skin-specific critical updates too.
					'skin'  => $this->get_active_skin(),
				]
			];
			
			$api_key = Bunyad::core()->get_license();
			if (!empty($api_key)) {
				$args['headers'] = ['X-API-KEY' => $api_key];
			}
			
			// Fire up the request
			$this->remote_data = wp_remote_post($url, $args);
		}
		
		$response = $this->remote_data;
		if (is_wp_error($response)) {
			return;
		}
		
		$body      = json_decode($response['body'], true);
		$transient = '_' . $this->theme . '_update_theme';
		
		// Not safe? Store in transient to add a notice later.
		if (empty($body['safe'])) {
			set_site_transient($transient, $body);
		}
		else {
			
			// Delete it if it's been marked safe.
			delete_site_transient($transient);	
		}
	}

	/**
	 * Currently active skin.
	 */
	protected function get_active_skin()
	{
		$skin = Bunyad::options()->predefined_style;
		if (!$skin) {
			$skin = Bunyad::options()->installed_demo;
		} 

		return $skin ? $skin : 'default';
	}
}

// init and make available in Bunyad::get('theme_updates')
Bunyad::register('theme_updates', array(
	'class' => 'Bunyad_Theme_Updates',
	'init'  => true
));