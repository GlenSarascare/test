<?php

/**
 * Deals with the basic initialization and core methods for theme
 * 
 * @package Bunyad
 */
class Bunyad_Core
{
	private $cache = array(
		'body_classes' => array()
	);
	
	public function init($options = array())
	{	
		$this->cache['options'] = $options;
		
		// Register Sphere Core plugin components options
		add_filter('sphere_plugin_components', array($this, '_sphere_components'));
		
		// Pre-initialization hook
		do_action('bunyad_core_pre_init', $this);
		
		/*
		 * Setup framework internal functionality
		 */
		
		// initialize options and add to cache
		Bunyad::options()->set_config(array_replace(
			[
				'meta_prefix'  => '_bunyad',
				'theme_prefix' => strtolower($options['theme_name'])
			],
			$options
		))->init();
		
		if (isset($options['options']) && is_array($options['options'])) {
			Bunyad::options()->set($options['options']);
		}
		
		// initialize admin
		if (is_admin()) {
			$this->init_admin($options);
		}
		
		// default to no sidebar
		$this->set_sidebar(Bunyad::options()->default_sidebar);
		
		// set default style
		$this->add_body_class(Bunyad::options()->layout_style);

		/*
		 * Add theme related functionality using the after_setup_theme hook
		 */
		add_action('after_setup_theme', array($this, 'setup'), 11);

		// Add support for type=module and nomodule.
		add_filter('script_loader_tag', array($this, 'add_module_nomodule'), 10, 2);


		/**
		 * Fire up a post initialization hook with self reference
		 * 
		 * @param  Bunyad_Core  $this
		 */
		do_action('bunyad_core_post_init', $this);
		
		return $this;
	}
	
	/**
	 * Action callback: Setup theme related functionality at after_setup_theme hook
	 */
	public function setup()
	{
		$options = $this->cache['options'];
		
		// theme options
		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5');
		
		add_theme_support('post-formats', $options['post_formats']);
		
		// add body class filter
		add_filter('body_class', array($this, '_add_body_classes'));
		
		// Add filter for excerpt 
		add_filter('excerpt_more', array(Bunyad::posts(), 'excerpt_read_more'));
		add_filter('the_content_more_link', array(Bunyad::posts(), 'excerpt_read_more'));
		
		// Setup shortcode configs - for bunyad shortcode plugin
		if (!empty($options['shortcode_config'])) {
			$this->shortcode_config();
		}
		
		// Fix title on home page - with SEO plugins compatibilty
		add_filter('wp_title', array($this, '_fix_home_title'));
		
		// Set sidebar on setup
		add_action('wp', array($this, '_auto_set_sidebar'));

		// Add inline css
		add_action('wp_enqueue_scripts', array($this, '_add_inline_css'), 200);

		// Setup comments script
		add_action('wp_enqueue_scripts', array($this, '_enqueue_comments_reply'), 200);
	}
	
	/**
	 * Filter: Sphere Core plugin components
	 * 
	 * @param array $components
	 * @see \Sphere\Core\Plugin::setup()
	 * @return array 
	 */
	public function _sphere_components($components)
	{	
		if (isset($this->cache['options']['sphere_components'])) {
			return $this->cache['options']['sphere_components'];
		}
		
		return $components;
	}
		
	/**
	 * Initialize admin related classes
	 */
	private function init_admin($options)
	{		
		add_action('admin_enqueue_scripts', array($this, '_admin_assets'));

		Bunyad::factory('admin/options');
	}
	
	// callback function for assets
	public function _admin_assets()
	{
		wp_enqueue_style('bunyad-base', get_template_directory_uri() . '/css/admin/base.css', array(), Bunyad::options()->get_config('theme_version'));
	}

	/**
	 * Set current layout sidebar
	 * 
	 * @param string $type none or right
	 */
	public function set_sidebar($type)
	{
		$this->cache['sidebar'] = $type;
		
		if ($type == 'right') {
			$this->add_body_class('right-sidebar');
			$this->remove_body_class('no-sidebar');
		}
		else {
			$this->remove_body_class('right-sidebar');
			$this->add_body_class('no-sidebar');
		}
		
		return $this;
	}
	
	/**
	 * Get current active sidebar value outside
	 */
	public function get_sidebar()
	{
		if (!array_key_exists('sidebar', $this->cache)) {
			return (string) Bunyad::options()->default_sidebar;
		}
		
		return $this->cache['sidebar'];
	}
	
	/**
	 * Include main sidebar
	 * 
	 * @see get_sidebar()
	 */
	public function theme_sidebar()
	{
		if ($this->get_sidebar() !== 'none') {
			get_sidebar();
		}
		
		return $this;
	}

	/**
	 * Callback: Set the relevant theme layout sidebar for current page / post
	 */
	public function _auto_set_sidebar()
	{
		// Posts, pages, attachments etc.
		if (is_singular()) {
		
			// set layout
			$layout = Bunyad::posts()->meta('layout_style');

			// Fallback to global settings
			if (!$layout) {

				if (is_page()) {
					$layout = Bunyad::options()->page_sidebar;
				}
				else {
					$layout = Bunyad::options()->single_sidebar;
				}
			}

			if ($layout) {
				$this->set_sidebar(($layout == 'full' ? 'none' : $layout));
			}
		}	
	}

	/**
	 * Callback: Enqueue script for threaded comments
	 */
	public function _enqueue_comments_reply()
	{
		if (is_singular() && comments_open()) {
			wp_enqueue_script('comment-reply', null, array(), false, true);
		}
	}
	
	/**
	 * Add a custom class to body - MUST be called before get_header() in theme
	 * 
	 * @param string $class
	 */
	public function add_body_class($class)
	{
		$this->cache['body_classes'][] = esc_attr($class);
		return $this;
	}
	
	/**
	 * Remove body class - MUST be called before get_header() in theme
	 */
	public function remove_body_class($class)
	{
		foreach ($this->cache['body_classes'] as $key => $value) {
			if ($value === $class) {
				unset($this->cache['body_classes'][$key]);
			}
		}
		
		return $this;
	}
	
	/**
	 * Action callback: Set up shortcode configs for the shortcodes plugin 
	 */
	public function shortcode_config()
	{
		// initialize shortcodes
		if (is_object(Bunyad::codes())) {
			Bunyad::codes()->set_config((array) $this->cache['options']['shortcode_config']);	
		}
	}
	
	/**
	 * Filter callback: Add stored classes to the body 
	 */
	public function _add_body_classes($classes)
	{
		return array_merge($classes, $this->cache['body_classes']);
	}
	
	/**
	 * Filter callback: Fix home title - stay compatible with SEO plugins
	 */
	public function _fix_home_title($title = '')
	{
		if (!is_front_page() && !is_home()) {
			return $title;
		}

		// modify only if empty
		if (empty($title)) {
			$title = get_bloginfo('name');
			$description = get_bloginfo('description');
			
			if ($description) {
				$title .= ' &mdash; ' . $description;
			} 
		}
		
		return $title;
	}
	
	/**
	 * Queue inline CSS to be added to the header 
	 * 
	 * @param string $script
	 * @param mixed $data
	 * @see wp_add_inline_style
	 */
	public function enqueue_css($script, $data)
	{
		$this->cache['inline_css'][$script] = $data;
	}
	
	/**
	 * Add any inline CSS that was enqueued properly using wp_add_inline_style()
	 */
	public function _add_inline_css()
	{		
		if (!array_key_exists('inline_css', $this->cache)) {
			return;
		}
		
		foreach ($this->cache['inline_css'] as $script => $data) {
			wp_add_inline_style($script, $data);
		}
	}
	
	/**
	 * Gets license key if theme is licensed
	 * 
	 * @return bool|string  false if unregistered, API key if registered
	 */
	public function get_license()
	{
		$option = get_option(Bunyad::options()->get_config('theme_name') . '_license');
		
		if (!empty($option)) {
			return $option;
		}
		
		return false;
	}

	/**
	 * Add type="module" and nomodule parameters to a script tag.
	 *
	 * Add type="module" and nomodule parameters to script tags when the values are set via wp_script_add_data.
	 *
	 * wp_script_add_data( 'script-handle', 'type', 'module' );
	 * wp_script_add_data( 'script-handle', 'nomodule', true );
	 * 
	 * Based on: https://github.com/kylereicks/wp-script-module-nomodule
	 */
	public function add_module_nomodule($tag, $handle) 
	{
		global $wp_scripts;

		if (!empty($wp_scripts->registered[$handle]->extra['type'])) {
			if (preg_match('/\stype="[^"]*"/', $tag, $match)) {
				$tag = str_replace($match[0], ' type="' . esc_attr($wp_scripts->registered[$handle]->extra['type']) . '"', $tag);
			} else {
				$tag = str_replace('<script ', '<script type="' . esc_attr($wp_scripts->registered[$handle]->extra['type']) . '" ', $tag);
			}
		}

		if (!empty($wp_scripts->registered[$handle]->extra['nomodule'])) {
			// if (preg_match('#\snomodule([=\s]?([\'\"]).+?\2)?#', $tag, $match)) {
			// 	$tag = str_replace($match[0], ' nomodule', $tag);

			// A simple check should be enough, we don't wish to override nomodule.
			if (strpos($tag, ' nomodule') === false) {
				$tag = str_replace('<script ', '<script nomodule ', $tag);
			}
		}

		return $tag;
	}
	
	/**
	 * A get_template_part() improvement with variable scope 
	 * 
	 * @see get_template_part()
	 * @see locate_template()
	 * 
	 * @param string $slug   The template part to locate.
	 * @param array  $props  An array of variables to make available in local scope.
	 * @param string $name   An extension to the partial name.
	 */
	public function partial($slug, $props = array(), $name = '')
	{
		/** 
		 * Set a few essential globals to match load_template(), without cluttering 
		 * the local scope.
		 */
		global $wp_query, $post;
		
		/**
		 * Fires before the specified template part file is loaded.
		 * 
		 * @param string $slug The slug name for the generic template.
		 * @param string $name The name of the specialized template.
		 */
			
		do_action("get_template_part_{$slug}", $slug, $name);

		$templates = array();
		$name = (string) $name;
		if (!empty($name)) {
			$templates[] = "{$slug}-{$name}.php";
		}
	
		$templates[] = "{$slug}.php";
		
		// Make data array available in local scope
		extract($props);

		// Include the template
		include locate_template($templates);
	}
	
}