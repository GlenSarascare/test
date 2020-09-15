<?php
/**
 * Bunyad Framework - Initialization
 * 
 * Recommended method is to extend Bunyad_Base from bunyad.php file. Include
 * this file only if not defining Bunyad in a theme. 
 * 
 * @package  Bunyad
 * @see      Bunyad_Base
 */

$main_file = 'bunyad.php';
require_once $main_file;

/**
 * Define Bunyad class if it doesn't exist
 */
if (!class_exists('Bunyad')) {
	class Bunyad extends Bunyad_Base {}	
}