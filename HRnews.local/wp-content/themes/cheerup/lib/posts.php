<?php

/**
 * Functionality relevant to posts (single and multiple)
 */
class Bunyad_Posts
{
	public $more_text;
	public $more_html;
	
	public function __construct()
	{
		// add offsets support
		add_filter('found_posts', array($this, 'fix_offset_pagination'), 10, 2);
		add_action('pre_get_posts', array($this, 'pre_get_posts'));
	}
	
	/**
	 * Custom excerpt function - utilize existing wordpress functions to add real support for <!--more-->
	 * to excerpts which is missing in the_excerpt().
	 * 
	 * Maintain plugin functionality by utilizing wordpress core functions and filters. 
	 * 
	 * @param  string|null  $text
	 * @param  integer  $length
	 * @param  array   $options  {
	 *     Options to modify excerpt behavior.
	 * 
	 *     @type  bool    $add_more    Add read more text if needed based on excerpt length.
	 *     @type  string  $more_text   More link anchor text.
	 *     @type  bool    $force_more  Always add more link.
	 *     @type  bool    $use_teaser  Whether or not to use <!--more--> teaser as excerpt.
	 * }
	 * @return string
	 */
	public function excerpt($text = null, $length = 55, $options = array())
	{
		global $more;

		// Add defaults
		$options = array_merge(array(
			'add_more'   => null,
			'force_more' => null,
			'use_teaser' => false,
			'filters'    => true
		), $options);
		
		// Add support for <!--more--> cut-off on custom home-pages and the like
		$old_more = $more;
		$more = false;
		
		// Override options
		$more_text = $this->more_text;
		extract($options);

		// Set global more_text - used by excerpt_read_more()
		$this->more_text = $more_text;
		
		if (!$text) {
			
			// have a manual excerpt?
			if (has_excerpt()) {
				return apply_filters('the_excerpt', get_the_excerpt()) . ($force_more ? $this->excerpt_read_more() : '');
			}
			
			// don't add "more" link
			$text = get_the_content('');
		}
		
		$text = strip_shortcodes(apply_filters('bunyad_excerpt_pre_strip_shortcodes', $text));
		$text = str_replace(']]>', ']]&gt;', $text);
		
		// Has <!--more--> teaser to use as excerpt?
		$post = get_post();
		if ($use_teaser && preg_match('/<!--more(.*?)?-->/', $post->post_content)) {
			$excerpt = $text;
		}
		else {
			
			// Get plaintext excerpt trimmed to right length
			$excerpt = wp_trim_words($text, $length, apply_filters('bunyad_excerpt_hellip', '&hellip;') . ($add_more !== false ? $this->excerpt_read_more() : '')); 
		}

		/**
		 * Force "More" link?
		 * 
		 * wp_trim_words() will only add the read more link if it's needed - if the length actually EXCEEDS. In some cases,
		 * for styling, read more has to be always present.
		 */
		if ($force_more) {
			
			$read_more = $this->excerpt_read_more();

			if (substr($excerpt, -strlen($read_more)) !== $read_more) {
				$excerpt .= $this->excerpt_read_more();
			}
		}
		
		// Fix extra spaces
		$excerpt = trim(str_replace('&nbsp;', ' ', $excerpt)); 
		
		// apply filters after to prevent added html functionality from being stripped
		// REMOVED: the_content filters often clutter the HTML - use the_excerpt filter instead 
		// $excerpt = apply_filters('the_content', $excerpt);

		// VC excerpts can go in infinte loop with do_shortcode(). Disable filters if nested.
		if (doing_filter('the_excerpt')) {
			$filters = false;   
		}
		
		if ($filters) {
			$excerpt = apply_filters('the_excerpt', apply_filters('get_the_excerpt', $excerpt));
		}
		else {
			
			// Still apply the defaults to remain consistent
			$excerpt = wpautop(
				wptexturize($excerpt)
			);
		}
		
		// Revert
		$more = $old_more;
		
		return $excerpt;
	}
	
	/**
	 * Wrapper for the_content()
	 * 
	 * @see the_content()
	 */
	public function the_content($more_link_text = null, $strip_teaser = false, $options = [])
	{
		$options = array_merge([
			'ignore_more' => false,
		], $options);

		// Add <!--more--> support on static pages when not using excerpts.
		if (is_page() && !$options['ignore_more']) {
			global $more;
			$more = 0;
		}

		// Get the content
		$content = get_the_content($more_link_text, $strip_teaser);
		
		// Delete first gallery shortcode if featured area is enabled.
		if (get_post_format() == 'gallery' && !$this->meta('featured_disable')) {
			$content = $this->_strip_shortcode_gallery($content);
		}

		// Apply bunyad_main_content filters first - for page builder.
		$content = apply_filters('the_content',  $content, 'bunyad_main_content');
		$content = str_replace(']]>', ']]&gt;', $content);

		echo $content; // phpcs:ignore WordPress.Security.EscapeOutput -- Pre-filtered/escaped from get_the_content()
	}

	/**
	 * Deletes first gallery shortcode and returns content.
	 */
	public function _strip_shortcode_gallery($content) 
	{
		$gallery = $this->get_first_gallery_block($content);
		if ($gallery) {

			// Strip it once.
			$pos = strpos($content, $gallery['innerHTML']);
			if ($pos !== false) {
				$content = substr_replace($content, '', $pos, strlen($gallery['innerHTML']));
			}
		}
	    
	    return $content;
	}

	/**
	 * Get the first gallery block - provided block editor content.
	 *
	 * @param string $content
	 * @return boolean|string
	 */
	public function get_first_gallery_block($content = null)
	{
		if (!$content) {
			$content = get_the_content();
		}

		// First try a Gutenberg / block editor gallery.
		if (function_exists('has_block') && has_block('gallery', $content)) {
			$post_blocks = parse_blocks($content);
			$found       = false;
			
			while ($block = array_shift($post_blocks)) {
				if ('core/gallery' === $block['blockName']) {
					$found = $block;
					break;
				} 
				elseif (!empty($block['innerBlocks'])) {
					while ($inner = array_pop($block['innerBlocks'])) {
						array_push($post_blocks, $inner);
					}
				}
			}

			if ($found) {
				return $found;
			}
		}

		// Legacy / Classic Editor's gallery shortcode.
	    preg_match_all('/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER);
	    
	    if (!empty($matches)) {
	        foreach ($matches as $shortcode) {
	            if ('gallery' === $shortcode[2]) {
					
					// We need innerHTML and attrs['ids].
					$pseudo_block = [
						'innerHTML' => $shortcode[0]
					];

					$atts = shortcode_parse_atts($shortcode[3]);
	            	if (!empty($atts['ids'])) {
	            		$pseudo_block['attrs'] = [
							'ids' => explode(',', $atts['ids'])
						];
					}
					
					return $pseudo_block;
	            }
	        }
		}

		return false;
	}
	
	/**
	 * Get the image ids used in the first gallery block/shortcode.
	 *
	 * @param string|null $content
	 * @return boolean|array
	 */
	public function get_first_gallery_ids($content = null) 
	{
		$gallery = $this->get_first_gallery_block();
		if ($gallery && !empty($gallery['attrs']['ids'])) {
			return $gallery['attrs']['ids'];
		}
	    
	    return false;
	}
	
	/**
	 * Get custom post meta
	 * 
	 * @param string|null $key
	 * @param integer|null $post_id
	 * @param boolean $defaults  whether or not to use default options mapped to certain keys - only when $key is set
	 * @uses  Bunyad::options()  used when defaults are tested for a specific key
	 */
	public function meta($key = null, $post_id = null, $defaults = true)
	{
		$prefix = Bunyad::options()->get_config('meta_prefix') . '_';
		
		if (!$post_id) {
			
			$post = get_post();
			
			if (is_object($post)) {
				$post_id = $post->ID;
			}
			
			// still no ID?
			if (!$post_id) {
				$post_id = get_queried_object_id();
			}
		}
		
		if (is_string($key)) {
			
			$meta = get_post_meta($post_id, $prefix . $key, true);

			/**
			 * Use values from specified key mapping of Bunyad::options() if meta value is empty
			 */
			if ($defaults) {
			
				
				// bool_inverse will inverse the value in Bunyad::options() 
				$default_map = array(
					'featured_disable' => array('key' => 'show_featured', 'bool_inverse' => true),
					'layout_template'  => array('key' => 'post_layout_template'),
					'layout_spacious'  => array('key' => 'post_layout_spacious'),
				);

				// Legacy Fix: In CheerUp <6.1.0 & CB <1.6, featured disabled was saved with 
				// "0" value instead of empty: ''
				if ($key === 'featured_disable' && !$meta) {
					$meta = '';
				}
				
				// Have a key association with theme settings?
				//  get_post_meta() returns '' when it can't find a record.
				if ($meta === '' && array_key_exists($key, $default_map)) {
					
					$expression = Bunyad::options()->get($default_map[$key]['key']);
										
					$meta = (!empty($default_map[$key]['bool_inverse']) ? !$expression : $expression);
				}
			}

			return apply_filters('bunyad_meta_' . $key, $meta);
			
		}
		else 
		{
			$meta     = get_post_custom($post_id);
			$new_meta = array(); 
			foreach ($meta as $key => $value) 
			{
				// prefix at beginning?
				if (strpos($key, $prefix) === 0) {
					$new_meta[$key] = $this->_fix_meta_value($value);
				}
				
			}
			
			return $new_meta;
		}
	}
	
	// helper to fix meta value
	private function _fix_meta_value($value) {
		if (count($value) === 1) {
			return $value[0];
		}
		
		return $value;
	}
	
	
	/**
	 * Get meta for page first if available
	 */
	public function page_meta($key = null, $post_id = null)
	{
		global $page;
		
		if (!$post_id) {
			$post_id = $page->ID;
		}
		
		return $this->meta($key, $post_id);
	}
	
	/**
	 * Get related posts
	 * 
	 * @param integer $count number of posts to return
	 * @param integer|null $post_id
	 */
	public function get_related($count = 5, $post_id = null)
	{	
		if (!$post_id) {
			global $post;
			$post_id = $post->ID;
		}
		
		if (Bunyad::options()->related_posts_yarpp && function_exists('yarpp_get_related')) {
			return yarpp_get_related(array('limit' => $count), $post_id);
		}
				
		$args = array(
			'numberposts' => $count,
			'post__not_in' => array($post_id)
		);
		
		// get related posts using tags or categories?
		switch (Bunyad::options()->related_posts_by) 
		{	
			case 'tags':
				
				// Match by tags
				$args['tag__in'] = wp_get_post_tags($post_id, array('fields' => 'ids'));
				break;
				
			case 'cat_tags':
				
				// Match posts either by tags or categories
				$args['tax_query'] = array(
					
					// OR relationship - one of the below
					'relation' => 'OR',
				
					array(
						'taxonomy' => 'category',
						'field' => 'id',
						'terms' => (array) wp_get_post_categories($post_id),
					),
					
					array(
						'taxonomy' => 'post_tag',
						'field' => 'id',
						'terms' => (array) wp_get_post_tags($post_id, array('fields' => 'ids')),
					)
				);
				
				break;
				
			default:
				// Match by category
				$args['category__in'] = wp_get_post_categories($post_id);				
				break;
			
		}		

		$related = get_posts(apply_filters('bunyad_get_related_query', $args));

		return (array) $related;
		
	}
	
	/**
	 * Custom pagination
	 * 
	 * @param array $options extend options for paginate_links()
	 * @see paginate_links()
	 */
	public function paginate($options = array(), $query = null)
	{
		// Paged is global only for always_prev_next use-case
		global $wp_rewrite, $wp_query, $paged;

		if (!$query) {
			$query = $wp_query;
		}
		
		$total_pages = $query->max_num_pages;
		if ($total_pages <= 1) {
			return '';
		}
		
		// use page on static front-page - paged isn't set there
		// non-static home-page, and other archives use paged 
		$paged = ($query->get('paged') ? $query->get('paged') : $query->get('page'));
		
		$args = array(
			//'base'    => add_query_arg('paged', '%#%'), 
			//'format'  => '',
			'current' => max(1, $paged),
			'total'   => $total_pages,

			// accessibility + fontawesome for pagination links
			'next_text' => '<span class="visuallyhidden">' . _x('Next', 'pagination', 'cheerup') . '</span><i class="tsi tsi-angle-right"></i>',
			'prev_text' => '<i class="tsi tsi-angle-left"></i><span class="visuallyhidden">' . _x('Previous', 'pagination', 'cheerup') . '</span>'
		);
		
		$args = array_merge($args, $options);
		
		/**
		 * Always show previous / next?
		 */
		$prev_link = $next_link = '';
		if (!empty($options['always_prev_next'])) {
			
			// Disable it for paginate_links()
			$args['prev_next'] = false;
			
			// Previous link
			$prev_link = get_previous_posts_link($args['prev_text']);
			if (!$prev_link) {
				$prev_link = '<span class="disabled">' . $args['prev_text'] . '</span>';
			}
			
			// Next link
			$next_link = get_next_posts_link($args['next_text']);
			if (!$next_link) {
				$next_link = '<span class="disabled">' . $args['next_text'] . '</span>';
			}
			
			// Wrap them
			$prev_link = '<span class="page-numbers label-prev">' . $prev_link . '</span>';
			$next_link = '<span class="page-numbers label-next">' . $next_link . '</span>';
		}
		
		$pagination = paginate_links($args);
		
		
		// Add wrapper?
		if (!empty($options['wrapper_before'])) {
			$pagination = $options['wrapper_before'] . $pagination . $options['wrapper_after'];
		}
		
		return $prev_link . $pagination . $next_link;	
	}
	
	/**
	 * Fix query LIMIT when using offsets
	 * 
	 * @param object $query
	 */
	public function fix_query_offset(&$query) 
	{
		if (empty($query->query_vars['offset']) OR empty($query->query_vars['orig_offset'])) {
			return;
		}
		
		if ($query->is_paged) {	
	
		
			// manually determine page query offset (offset + current page (minus one) x posts per page)
			$page_offset = $query->query_vars['offset'] + (($query->query_vars['paged'] - 1) * $query->query_vars['posts_per_page']);
			$query->set('offset', $page_offset);
				
		}
		else {
			// first page? just use the offset
			$query->set('offset', $query->query_vars['offset']);
		}
	}
	
	/**
	 * Preserve original offset query var as it will be changed 
	 * 
	 * @param object $query
	 */
	public function add_query_offset($query = array())
	{
		if (isset($query['offset'])) {
			$query['orig_offset'] = $query['offset'];
		}
		
		return $query;
	}	
	
	/**
	 * A wrapper for common pre_get_posts filters
	 * 
	 * @param object $query
	 */
	public function pre_get_posts(&$query) 
	{
		$this->fix_query_offset($query);
	}
	

	/**
	 * Fix found_posts when an offset is set
	 * 
	 * WordPress found_posts doesn't account for offset.

	 * @param integer $found_posts
	 * @param object $query
	 */
	public function fix_offset_pagination($found_posts, $query)
	{

		if (empty($query->query_vars['offset']) OR empty($query->query_vars['orig_offset'])) {
			return $found_posts;
		}
		
		$offset = $query->query_vars['orig_offset'];
	
		// reduce WordPress's found_posts count by the offset... 
		return $found_posts - $offset;
	}
	
	/**
	 * Add the read more text to excerpts
	 */
	public function excerpt_read_more()
	{
		global $post;
		
		if (is_feed()) {
			return ' [...]';
		}

		// add more link if enabled in options
		if (Bunyad::options()->read_more) {
			
			$text = $this->more_text;
			if (!$text) {
				$text = esc_html__('Read More', 'cheerup');
			}
			
			if (empty($this->more_html)) {
				$this->more_html = '<div class="read-more"><a href="%s" title="%s">%s</a></div>';
			}

			return sprintf(apply_filters('bunyad_read_more_html', $this->more_html), get_permalink($post->ID), esc_attr($text), $text);
		}
		
		return '';
	}
}