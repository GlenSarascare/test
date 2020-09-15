<?php
/**
 * Functions relating to the social functionality.
 */
class Bunyad_Theme_Social
{	
	
	public function __construct() 
	{
		add_filter('sphere_social_follow_options', array($this, 'follow_options'));
		add_filter('sphere_theme_docs_url', array($this, 'docs_url'));
	}
	
	/**
	 * Filter: Modify default customizer options for social follow
	 * 
	 * @see \Sphere\Core\SocialFollow\Module::add_theme_options()
	 */
	public function follow_options($options)
	{
		$options['title'] = esc_html_x('Social Counters', 'Admin', 'cheerup');
		$options['desc']  = sprintf(
			'Note: These settings are for Social Follow widget. For normal social settings, go to %sSocial Media Links%s',
			'<a href="#" class="focus-link" data-section="bunyad-misc-social">', '</a>'
		);
		$options['sections']['general']['fields']['sf_counters']['value'] = 0;
	
		// Change default labels
		$labels = $this->get_services();
		foreach (array_keys($options['sections']) as $id) {
			
			if (!array_key_exists($id, $labels)) {
				continue;
			}
			
			$options['sections'][$id]['fields']["sf_{$id}_label"]['value'] = $labels[$id]['label'];
		}
		
		return $options;
	}
	
	public function docs_url($url) {
		return 'https://cheerup.theme-sphere.com/documentation/';
	}
	
	/**
	 * Get an array of services supported at different locations
	 * such as Top bar social icons.
	 */
	public function get_services()
	{
		$services = array(
			'facebook' => array(
				'icon' => 'tsi tsi-facebook',
				'label' => esc_html__('Facebook', 'cheerup')
			),
			
			'twitter' => array(
				'icon' => 'tsi tsi-twitter',
				'label' => esc_html__('Twitter', 'cheerup')
			),
			
			'instagram' => array(
				'icon' => 'tsi tsi-instagram',
				'label' => esc_html__('Instagram', 'cheerup')
			),
			
			'pinterest' => array(
				'icon' => 'tsi tsi-pinterest-p',
				'label' => esc_html__('Pinterest', 'cheerup')
			),
			
			'bloglovin' => array(
				'icon' => 'tsi tsi-heart',
				'label' => esc_html__('BlogLovin', 'cheerup')
			),
			
			'rss' => array(
				'icon' => 'tsi tsi-rss',
				'label' => esc_html__('RSS', 'cheerup')
			),
			
			'gplus' => array(
				'icon' => 'tsi tsi-google-plus',
				'label' => esc_html__('Google Plus', 'cheerup')
			),
			
			'youtube' => array(
				'icon' => 'tsi tsi-youtube',
				'label' => esc_html__('YouTube', 'cheerup')
			),
			
			'dribbble' => array(
				'icon' => 'tsi tsi-dribbble',
				'label' => esc_html__('Dribbble', 'cheerup')
			),
			
			'tumblr' => array(
				'icon' => 'tsi tsi-tumblr',
				'label' => esc_html__('Tumblr', 'cheerup')
			),
			
			'linkedin' => array(
				'icon' => 'tsi tsi-linkedin',
				'label' => esc_html__('LinkedIn', 'cheerup')
			),
			
			'flickr' => array(
				'icon' => 'tsi tsi-flickr',
				'label' => esc_html__('Flickr', 'cheerup')
			),
			
			'soundcloud' => array(
				'icon' => 'tsi tsi-soundcloud',
				'label' => esc_html__('SoundCloud', 'cheerup')
			),
			
			'vimeo' => array(
				'icon' => 'tsi tsi-vimeo',
				'label' => esc_html__('Vimeo', 'cheerup')
			),
				
			'lastfm' => array(
				'icon' => 'tsi tsi-lastfm',
				'label' => esc_html__('Last.fm', 'cheerup')
			),
				
			'steam' => array(
				'icon' => 'tsi tsi-steam',
				'label' => esc_html__('Steam', 'cheerup')
			),
				
			'vk' => array(
				'icon' => 'tsi tsi-vk',
				'label' => esc_html__('VKontakte', 'cheerup')
			),
		);
		
		return apply_filters('bunyad_social_services', $services);
	}
}

// init and make available in Bunyad::get('social')
Bunyad::register('social', array(
	'class' => 'Bunyad_Theme_Social',
	'init' => true
));