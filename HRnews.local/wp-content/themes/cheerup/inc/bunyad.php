<?php
/**
 * Bunyad framework factory extension
 * 
 * The main reason it's being extended is to offer shorter syntax that's not 
 * possible to offer on versions older than PHP 5.3 (lack of __callStatic).
 * 
 * This also aids in better code completion for most IDEs.
 * 
 * Most methods here are simply a wrapper for Bunyad_Base::get() method.
 * 
 * @see Bunyad_Base
 * @see Bunyad_Base::get()
 */
class Bunyad extends Bunyad_Base {
	
	/**
	 * Media methods
	 *  
	 * @return Bunyad_Theme_Media
	 */
	public static function media() {
		return self::get('media');
	}
	
	/**
	 * Other general helper methods
	 *  
	 * @return Bunyad_Theme_Helpers
	 */
	public static function helpers() {
		return self::get('helpers');
	}
	
	/**
	 * Other general helper methods
	 *  
	 * @return Bunyad_Theme_Lazyload
	 */
	public static function lazyload() {
		return self::get('lazyload');
	}

	/**
	 * AMP helpers
	 *  
	 * @return Bunyad_Theme_Amp
	 */
	public static function amp() {
		return self::get('amp');
	}
}