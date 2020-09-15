<?php
/**
 * Generic HTML Markup generator methods
 */

class Bunyad_Markup
{

	/**
	 * Output dynamic attributes while escaping as necessary.
	 * 
	 * @param string $id          Unique id to use in filters.  
	 * @param array  $attributes  Associative array of attributes.
	 * @param array  $options     Method configs.
	 * @return mixed
	 */
	public function attribs($id, $attributes = array(), $options = array())
	{
		
		$options = wp_parse_args($options, array(
			'echo' => true,
			'esc_src_url' => true
		));
		
		/**
		 * Attributes array can be filtered before processing.
		 * 
		 * @param array $attributes
		 */
		$attributes = apply_filters('bunyad_attribs_' . $id, $attributes);
		
		// Generate the output string.
		$attribs = '';
		foreach ($attributes as $key => $value) {
			
			// Handle srcset images
			if ($key == 'srcset') {
				$value = $this->_srcset($value);
				
				if (!$value) {
					continue;
				}
			}
			else if (is_array($value)) {
				$value = join(' ', array_filter($value));
			}
			
			// HTML5 supports attributes of type itemscope, checked can be without value.
			if (empty($value)) {
				$attribs .= ' ' . esc_html($key);
				continue;
			}
			
			// Handle src URL with esc_url()
			$value = ($key == 'src' && $options['esc_src_url']) ? esc_url($value) : esc_attr($value);
			
			// Escape the attribute key with esc_html()
			$attribs .=  sprintf(' %s="%s"', esc_html($key), $value);
		}
		
		// Remove starting space
		$attribs = ltrim($attribs);
		
		if ($options['echo']) {
			echo $attribs; // phpcs:ignore WordPress.Security.EscapeOutput -- Escaped set of attributes.
		}
		
		return $attribs;
	}
	
	/**
	 * Get a unique id to be used mainly in blocks.
	 * 
	 * WARNING: Not persistent - will change with request order.
	 * 
	 * @param string   $prefix          A prefix for internal distinction and for output unless disabled.  
	 * @param boolean  $return_id_only  Return id without prefix.
	 */
	public function unique_id($prefix = '', $return_id_only = false)
	{
		// get item from registry
		$ids = (array) Bunyad::registry()->bunyad_markup_ids;
		$key = $prefix ? $prefix : 'default';
		
		if (!isset($ids[$key])) {
			$ids[$key] = 0;
		}
		
		$ids[$key]++;
		
		// update registry
		Bunyad::registry()->set('bunyad_markup_ids', $ids);
		
		return ($return_id_only ? '' : $prefix) . $ids[$key];
	}
	
	/**
	 * Create srcset for images.
	 * 
	 * @param array $images  An associative array of image url => descriptor
	 */
	public function _srcset($images)
	{
		if (is_string($images)) {
			return $images;
		}
		
		$sources = array();
		foreach ($images as $url => $descriptor) {
			if (!$url) {
				continue;
			}
			
			$sources[] = esc_url($url) . ' ' . $descriptor;
		}
		
		// Empty it if srcset only has a single entry
		if (count($sources) == 1) {
			return '';
		}
		
		return implode(',', $sources);
	}
	
}