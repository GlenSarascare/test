<?php
namespace Sphere\Core\Breadcrumbs;

/**
 * Breadcrumbs trail.
 */
class Module
{
	protected $labels = [];

	/**
	 * Initialize can be with options specified.
	 *
	 * @param array $args
	 */
	public function __construct()
	{
		$this->labels = [
			'home'     => esc_html_x('Home', 'breadcrumbs', 'sphere-core'), // text for the 'Home' link
			'category' => esc_html_x('Category: "%s"', 'breadcrumbs', 'sphere-core'), // text for a category page
			'tax'      => esc_html_x('Archive for "%s"', 'breadcrumbs', 'sphere-core'), // text for a taxonomy page
			'search'   => esc_html_x('Search Results for "%s"', 'breadcrumbs', 'sphere-core'), // text for a search results page
			'tag'      => esc_html_x('Posts Tagged "%s"', 'breadcrumbs', 'sphere-core'), // text for a tag page
			'404'      => esc_html_x('Error 404', 'breadcrumbs', 'sphere-core'), // text for the 404 page
			'author'   => esc_html_x('Author: %s', 'breadcrumbs', 'sphere-core'), // text for an author page
			'paged'    => esc_html_x(' (Page %d)', 'breadcrumbs', 'sphere-core'), // appended to paged.
		];
	}

	/**
	 * Output the breadcrumbs.
	 * 
	 * @param array $options
	 * @return void
	 */
	public function render($options = array()) 
	{	
		$defaults = array(
			'before'         => '<nav class="breadcrumbs">',
			'after'          => '</nav>',
			'delimiter'      => '<span class="delim">&raquo;</span>',
			'current_before' => '<span class="current">',
			'current_after'  => '</span>',
			'home_link'      => home_url() . '/',

			// Callback for getting primary category.
			'primary_cat_callback' => null,

			'link_before'    => '<span>',
			'link_after'     => '</span>',
			'link_in_before' => '<span>',
			'link_in_after'  => '</span>',
			'disable_at'     => []
		);
		
		extract(
			apply_filters('sphere_breadcrumbs_defaults', $defaults)
		);

		require_once SPHERE_COMPONENTS . '/breadcrumbs/schema.php';
		require_once SPHERE_COMPONENTS . '/breadcrumbs/generator.php';

		// Form whole link option.
		$link = '<a href="%1$s">' . $link_in_before . '%2$s' . $link_in_after . '</a>';
		$link = $link_before . $link . $link_after;

		if (isset($options['labels'])) {
			$this->labels = array_replace($this->labels, (array) $options['labels']);
		}

		$options = array_replace($defaults, $options);

		// Check if breadcrumbs are disabled at this location.
		foreach ($options['disable_at'] as $check) {
			$checker = 'is_' . $check;
			if (call_user_func($checker)) {
				return;
			}
		}
				
		/**
		 * Use bbPress's breadcrumbs when available
		 */
		if (function_exists('bbp_breadcrumb') && is_bbpress()) {
						
			$bbp_crumbs = 
				bbp_get_breadcrumb(array(
					'home_text'      => $this->labels['home'],
					'sep'            => $options['delimiter'],
					'sep_before'     => '',
					'sep_after'      => '',
					'pad_sep'        => 0,
					'before'         => $options['before'],
					'after'          => $options['after'],
					'current_before' => $options['current_before'],
					'current_after'  => $options['current_after'],
				));
			
			if ($bbp_crumbs) {
				echo $bbp_crumbs;
				return;
			}
		}
		
		/**
		 * Use WooCommerce's breadcrumbs when available
		 */
		if (function_exists('woocommerce_breadcrumb') && (is_woocommerce() || is_cart() || is_shop())) {

			add_filter('woocommerce_get_breadcrumb', [$this, 'add_shop_woocommerce']);

			woocommerce_breadcrumb(array(
				'delimiter'   => $options['delimiter'],
				'before'      => '',
				'after'       => '',
				'wrap_before' => $options['before'],
				'wrap_after'  => $options['after'],
				'home'        => $this->labels['home'],
			));

			return;
		}
		
		// Show on homepage?
		if (is_home() || is_front_page()) {
			return;
		}

		$breadcrumbs = new Generator([
			'labels' => $this->labels,
			'primary_cat_callback' => $options['primary_cat_callback']
		]);

		$crumbs = $breadcrumbs->generate();

		// Start the output.
		$items  = count($crumbs);
		$count  = 0;
		$output = [];

		foreach ($crumbs as $crumb) {
			$count++;

			// Last item.
			$is_last = $count === $items;
			
			if ($is_last) {
				$output[] = $options['current_before'] . esc_html($crumb['text']) . $options['current_after'];
				break;
			}

			$output[] = sprintf($link, esc_url($crumb['url']), esc_html($crumb['text']));
		}

		// Safe output generated above.
		echo $options['before']
			. join($options['delimiter'], $output)
			. $options['after'];

		// Setup JSON+LD to be output.
		add_action('wp_footer', function() use ($crumbs) {
			$schema = new Schema($crumbs);
			$schema->render();
		});
	}

	/**
	 * Callback: Add WooCommerce shop link.
	 */
	public function add_shop_woocommerce($crumbs) 
	{
		$permalinks   = wc_get_permalink_structure();
		$shop_page_id = wc_get_page_id('shop');
		$shop_page    = get_post( $shop_page_id );

		// If currently at shop, or home is same as shop page, do nothing.
		if (is_shop() || !$shop_page || intval(get_option('page_on_front')) == $shop_page_id) {
			return $crumbs;
		}

		// Opposite test. If WC didn't append the shop page to the crumbs.
		if (
			!isset($permalinks['product_base']) 
			|| !strstr($permalinks['product_base'], '/' . $shop_page->post_name) 
		) {
			$crumb = [
				wp_strip_all_tags(get_the_title($shop_page)), 
				get_permalink($shop_page) 
			];
			
			$first = array_shift($crumbs);
			array_unshift($crumbs, $first, $crumb);
		}

		return $crumbs;
	}
}