<?php
/**
 * Bunyad Framework - factory and pseudo-registry for objects
 * 
 * Basic namespacing utility is provided by this factory for easy changes
 * for a a theme that has different needs than the original one. 
 * 
 * @package Bunyad
 */

class Bunyad_Base 
{
	
	protected static $_cache = array();
	protected static $_registered = array();

	public static $fallback_path;
	
	/**
	 * Build the required object instance
	 * 
	 * @param string  $object
	 * @param boolean $fresh 	Whether to get a fresh copy; will not be cached and won't override 
	 * 							current copy in cache.
	 * @param mixed ...$args    Arguments to pass to the constructor.
	 * @return false|object
	 */
	public static function factory($object = 'core', $fresh = false, ...$args)
	{
		if (isset(self::$_cache[$object]) && !$fresh) {
			return self::$_cache[$object];
		}
		
		// Pre-defined class relation?
		if (!empty(self::$_registered[$object]['class'])) {
			$class = self::$_registered[$object]['class'];
		}
		else {

			// Convert short-codes to Bunyad_ShortCodes; core to Bunyad_Core etc.
			$class = str_replace('/', '_', $object);
			$class = apply_filters('bunyad_factory_class', 'Bunyad_' . self::file_to_class_name($class));
		}
		
		// Try auto-loading the class
		if (!class_exists($class)) {
			self::load_file($object);
		}
		
		// Class not found
		if (!class_exists($class)) {
			return false;
		}
		
		// Don't cache fresh objects
		if ($fresh) {
			return new $class(...$args); 
		}
		
		self::$_cache[$object] = new $class(...$args);
		return self::$_cache[$object];
	}

	/**
	 * Load a specific class's file.
	 */
	public static function load_file($id) 
	{
		// Locate file in child theme or parent theme lib
		$file = locate_template('lib/' . $id . '.php');

		// Check fallback path if not found in theme
		if (!$file && static::$fallback_path) {
			$file = static::$fallback_path . $id . '.php';

			if (!file_exists($file)) {
				return false;
			}
		}

		if ($file) {
			require_once $file;
		}
	}
	
	public static function file_to_class_name($file_name)
	{
		return implode('', array_map('ucfirst', explode('-', $file_name)));
	}
	
	/**
	 * Core class
	 * 
	 * @return Bunyad_Core
	 */
	public static function core($fresh = false) 
	{
		return static::factory('core', $fresh);
	}
	
	/**
	 * Global Registry class
	 * 
	 * @return Bunyad_Registry
	 */
	public static function registry($fresh = false) 
	{
		return static::factory('registry', $fresh);
	}
	
	/**
	 * Options class
	 * 
	 * @return Bunyad_Options
	 */
	public static function options($fresh = false)
	{
		return static::factory('options', $fresh);
	}
	
	/**
	 * Posts related functionality
	 * 
	 * @return Bunyad_Posts
	 */
	public static function posts($fresh = false)
	{
		return static::factory('posts', $fresh);
	}
	
	/**
	 * WordPress Menus related functionality
	 * 
	 * @return Bunyad_Menus
	 */
	public static function menus($fresh = false)
	{
		return static::factory('menus', $fresh);
	}
	
	/**
	 * Reviews related functionality
	 * 
	 * @return Bunyad_Reviews
	 */
	public static function reviews($fresh = false)
	{
		return static::factory('reviews', $fresh);
	}
	
	/**
	 * Markup generator for HTML
	 * 
	 * @return Bunyad_Markup
	 */
	public static function markup($fresh = false)
	{
		return static::factory('markup', $fresh);
	}
	
	/**
	 * Register an object for namespacing or for factory loading
	 * 
	 * @param string $name
	 * @param array  $options  set class to map and init to 
	 */
	public static function register($name, $options = array())
	{	
		// Pre-initialized object?
		if (isset($options['object'])) {
			self::$_cache[$name] = $options['object'];
			
			return $options['object'];
		}
		
		// Need a class at this point
		if (!isset($options['class'])) {
			return;
		}
		
		self::$_registered[$name] = $options;
		
		// Init it ?
		if (!empty($options['init'])) {
			return static::factory($name);
		}
	}
	
	/**
	 * Call registered loaders or registry objects - alias for factory at the moment.
	 * 
	 * @param string $name
	 * @param array  $fresh
	 */
	public static function get($name, $fresh = false)
	{
		// Auto-load it via factory.
		return static::factory($name, $fresh);
	}

	/**
	 * Shortcut magic for factory for the inexplicitly defined methods.
	 *
	 * @param string $name
	 * @param array  $args
	 * @return object|false
	 */
	public static function __callStatic($name, array $args)
	{
		// Auto-load it via factory.
		return static::factory($name, ...$args);
	}
}