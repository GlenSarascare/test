<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Class OriginCode_Gallery_Video_Widgets
 */
class OriginCode_Gallery_Video_Widgets{

	/**
	 * Register OriginCode  Gallery Video Widget
	 */
	public static function init(){
		register_widget( 'OriginCode_Gallery_Video_Widget' );
	}
}
