<?php
/**
 * Handling of custom special galleries
 */
class Bunyad_Theme_Galleries
{
	public function __construct() 
	{
		add_action('admin_init', array($this, 'admin_init'));
		add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
		
		/**
		 * Register gallery front-end rendering modification
		 */
		add_filter('post_gallery', array($this, 'render'), 10, 2);

	}
	
	/**
	 * Modify the WordPress default gallery shortcode output
	 * 
	 * Note: Adds a wrapper to WordPress gallery incase we need to enable
	 * special grid on this gallery.
	 * 
	 * @see gallery_shortcode()
	 */
	public function render($output, $attrs) 
	{
		// Remove current filter - we don't want an infinite loop
		remove_filter('post_gallery', array($this, 'render'));
		
		$output =  gallery_shortcode($attrs); // Already escaped by WordPress
		
		if (!empty($attrs['special_type'])) {
			$output = '<div class="is-special cf gallery-'. esc_attr($attrs['special_type'])  .'" data-type="' . esc_attr($attrs['special_type']) . '">' . $output . '</div>';
		}
		
		// Add it back for other galleries
		add_filter('post_gallery', array($this, 'render'), 10, 2);
				
		// Enqueue it on-need basis only - nothing else in the theme utilizes it
		// wp_enqueue_script('cheerup-gallery', get_template_directory_uri() . '/js/jquery.gallery.js', array('jquery'), true);
		
		return $output;
	}
	
	/**
	 * Register admin side changes for gallery
	 */
	public function admin_init()
	{
		// Add our custom media template for selecting the type of gallery
		add_action('print_media_templates', array($this, 'print_media_templates'));
	}
	
	public function admin_assets($hook) 
	{
		if (in_array($hook, array('post.php', 'post-new.php'))) {
			
			// Register the script to handle it
			wp_enqueue_script('cheerup-gallery-settings', get_template_directory_uri() . '/js/admin/gallery-settings.js', array('media-views'));
		}
	}

	/**
	 * Custom gallery media popup field
	 */
	public function print_media_templates()
	{
		?>
		<script type="text/html" id="tmpl-cheerup-gallery-settings">
		<label class="setting">
			<span><?php echo esc_html_x('Special Gallery?', 'Admin', 'cheerup'); ?></span>
				<select class="special_type" name="special_type" data-setting="special_type">
					<option value="0"><?php echo esc_html_x('No', 'Admin', 'cheerup'); ?></option>
					<option value="1-2"><?php echo esc_html_x('1+2 Columns (1 Full, 2 Half Width)', 'Admin', 'cheerup'); ?></option>
				</select>
			</label>
		</script>
		<?php
	}
}

// init and make available in Bunyad::get('galleries')
Bunyad::register('galleries', array(
	'class' => 'Bunyad_Theme_Galleries',
	'init' => true
));