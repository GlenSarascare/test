<?php
/**
 * Setup the likes system for heart
 * 
 * @see \Sphere\Core\Likes\Module
 */
class Bunyad_Theme_Likes
{
	/**
	 * Show heart html with count
	 * 
	 * @see \Sphere\Core\Likes\Module::get_count()
	 */
	public function count()
	{
		if (!class_exists('\Sphere\Core\Plugin')) {
			return 0;
		}
		
		return \Sphere\Core\Plugin::get('likes')->get_count();
	}
	
	/**
	 * View Helper: Template tag to output heart link
	 */
	public function heart_link()
	{
		if (!class_exists('\Sphere\Core\Plugin')) {
			return '';
		}
		
		$voted = !\Sphere\Core\Plugin::get('likes')->can_like() ? ' voted' : '';
		
		$voted_message = '';
		if (!empty($voted)) {
			$voted_message = esc_attr__('You already liked this post. Thank You!', 'cheerup'); 
		}
		
		?>
		
		<a href="#" class="likes-count tsi tsi-heart-o<?php echo esc_attr($voted); ?>" data-id="<?php echo esc_attr(get_the_ID()); 
			?>" title="<?php echo esc_attr($voted_message); ?>"><span class="number"><?php echo intval($this->count()); ?></span></a>
		
		<?php
	}
}

// init and make available in Bunyad::get('likes')
Bunyad::register('likes', array(
	'class' => 'Bunyad_Theme_Likes',
	'init' => true
));