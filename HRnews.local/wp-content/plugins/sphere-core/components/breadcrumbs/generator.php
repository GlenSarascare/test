<?php
namespace Sphere\Core\Breadcrumbs;

/**
 * Generate the breadcrumbs trail.
 * 
 * Originally based on WooCommerce breadcrumbs.
 */
class Generator 
{
	protected $crumbs = [];
	protected $primary_cat_callback;
	protected $labels = [];

	public function __construct($args = [])
	{
		foreach ($args as $option => $value) {
			if (property_exists($this, $option)) {
				$this->{$option} = $value;
			}
		}
	}

	/**
	 * Generate breadcrumb trail.
	 *
	 * @return array of breadcrumbs
	 */
	public function generate()
	{
		// Doesn't make sense to have it for home.
		if (is_home() || is_front_page()) {
			return;
		}

		// Add homepage trail always. 
		$this->add_crumb(
			$this->labels['home'],
			home_url('/')
		);

		$conditionals = array(
			'is_404',
			'is_attachment',
			'is_single',
			'is_page',
			'is_post_type_archive',
			'is_category',
			'is_tag',
			'is_author',
			'is_date',
			'is_tax',
		);

		foreach ($conditionals as $conditional) {
			if (call_user_func($conditional)) {
				call_user_func([
					$this, 
					'add_crumbs_' . substr($conditional, 3)
				]);
				break;
			}
		}

		$this->search_trail();
		$this->paged_trail();

		return $this->get_breadcrumb();
	}

	/**
	 * Add a crumb so we don't get lost.
	 *
	 * @param string $name Text.
	 * @param string $link Link.
	 * @param array  $extras
	 */
	public function add_crumb($name, $link = '', $extras = [])
	{
		$this->crumbs[] = array_merge([
			'text' => wp_strip_all_tags($name),
			'url'  => $link,
		], $extras);
	}

	/**
	 * Reset crumbs.
	 */
	public function reset()
	{
		$this->crumbs = array();
	}

	/**
	 * Get the breadcrumb.
	 *
	 * @return array
	 */
	public function get_breadcrumb()
	{
		return apply_filters('sphere_breadcrumbs_get', $this->crumbs, $this);
	}

	/**
	 * 404 trail.
	 */
	protected function add_crumbs_404()
	{
		$this->add_crumb($this->labels['404']);
	}

	/**
	 * Attachment trail.
	 */
	protected function add_crumbs_attachment()
	{
		global $post;

		$this->add_crumbs_single($post->post_parent, get_permalink($post->post_parent));
		$this->add_crumb(get_the_title(), get_permalink());
	}

	/**
	 * Single post trail.
	 *
	 * @param int    $post_id   Post ID.
	 * @param string $permalink Post permalink.
	 */
	protected function add_crumbs_single($post_id = null, $permalink = '')
	{
		$post = get_post($post_id);

		if (!$permalink) {
			$permalink = get_permalink($post);
		}

		if ('post' !== get_post_type($post)) {
			$post_type = get_post_type_object(get_post_type($post));

			if (!empty($post_type->has_archive)) {
				$this->add_crumb(
					$post_type->labels->singular_name, 
					get_post_type_archive_link(get_post_type($post))
				);
			}
		} 
		else {
			$cat = $this->get_primary_cat($post_id);
			if ($cat) {
				$this->term_ancestors($cat->term_id, 'category');
				$this->add_crumb($cat->name, get_term_link($cat));
			}
		}

		$this->add_crumb(get_the_title($post), $permalink);
	}

	/**
	 * Page trail.
	 */
	protected function add_crumbs_page()
	{
		$post = get_post();

		if ($post->post_parent) {
			$parent_crumbs = array();
			$parent_id     = $post->post_parent;

			while ($parent_id) {
				$page            = get_post($parent_id);
				$parent_id       = $page->post_parent;
				$parent_crumbs[] = array(
					get_the_title($page->ID), 
					get_permalink($page->ID)
				);
			}

			$parent_crumbs = array_reverse($parent_crumbs);

			foreach ($parent_crumbs as $crumb) {
				$this->add_crumb($crumb['text'], $crumb['url']);
			}
		}

		$this->add_crumb(get_the_title(), get_permalink());
	}

	/**
	 * Post type archive trail.
	 */
	protected function add_crumbs_post_type_archive($type = null)
	{
		$type = $type ? $type : get_post_type();
		$post_type = get_post_type_object($type);

		if ($post_type) {
			$this->add_crumb($post_type->labels->name, get_post_type_archive_link($type));
		}
	}

	/**
	 * Category trail.
	 */
	protected function add_crumbs_category()
	{
		$this_category = get_category($this->get_current_object());

		if (0 !== intval($this_category->parent)) {
			$this->term_ancestors($this_category->term_id, 'category');
		}

		$this->add_crumb(
			sprintf($this->labels['category'], single_term_title('', false)),
			get_category_link($this_category->term_id)
		);
	}

	/**
	 * Tag trail.
	 */
	protected function add_crumbs_tag()
	{
		$queried_object = $this->get_current_object();

		$this->add_crumb(
			sprintf(
				$this->labels['tag'], 
				single_tag_title('', false)
			),
			get_tag_link($queried_object->term_id)
		);
	}

	/**
	 * Add crumbs for date based archives.
	 */
	protected function add_crumbs_date()
	{
		if (is_year() || is_month() || is_day()) {
			$this->add_crumb(
				get_the_time('Y'), 
				get_year_link(get_the_time('Y'))
			);
		}
		if (is_month() || is_day()) {
			$this->add_crumb(
				get_the_time('F'), 
				get_month_link(get_the_time('Y'), get_the_time('m'))
			);
		}
		if (is_day()) {
			$this->add_crumb(get_the_time('d'));
		}
	}

	/**
	 * Add crumbs for taxonomies
	 */
	protected function add_crumbs_tax()
	{
		$this_term  = $this->get_current_object();
		$taxonomy   = get_taxonomy($this_term->taxonomy);

		// Add a parent Custom Post Type if it exists.
		$post_types = array_diff($taxonomy->object_type, ['post', 'page', 'attachment', 'nav_menu_item', 'revision']);
		if (count($post_types)) {
			$this->add_crumbs_post_type_archive($post_types[0]);
		}

		// $this->add_crumb($taxonomy->labels->name);

		if (0 !== intval($this_term->parent)) {
			$this->term_ancestors($this_term->term_id, $this_term->taxonomy);
		}

		$this->add_crumb(
			sprintf($this->labels['tax'], single_term_title('', false)), 
			get_term_link($this_term->term_id, $this_term->taxonomy)
		);
	}

	/**
	 * Add a breadcrumb for author archives.
	 */
	protected function add_crumbs_author()
	{
		global $author;

		$userdata = get_userdata($author);

		$this->add_crumb(sprintf(
			$this->labels['author'], 
			$userdata->display_name
		));
	}

	/**
	 * Add crumbs for a term.
	 *
	 * @param int    $term_id  Term ID.
	 * @param string $taxonomy Taxonomy.
	 */
	protected function term_ancestors($term_id, $taxonomy)
	{
		$ancestors = get_ancestors($term_id, $taxonomy);
		$ancestors = array_reverse($ancestors);

		foreach ($ancestors as $ancestor) {
			$ancestor = get_term($ancestor, $taxonomy);

			if (!is_wp_error($ancestor) && $ancestor) {
				$this->add_crumb($ancestor->name, get_term_link($ancestor));
			}
		}
	}

	/**
	 * Add a breadcrumb for search results.
	 */
	protected function search_trail()
	{
		if (is_search()) {
			$this->add_crumb(
				sprintf(
					$this->labels['search'], 
					get_search_query()
				),
				remove_query_arg('paged')
			);
		}
	}

	/**
	 * Add a breadcrumb for pagination.
	 */
	protected function paged_trail()
	{
		if (get_query_var('paged')) {

			$last         = array_pop($this->crumbs);
			$last['text'] = sprintf(
				$this->labels['paged'],
				get_query_var('paged')
			);

			array_push($this->crumbs, $last);
		}
	}

	// --------------------

	/**
	 * Get primary category for the post. 
	 *
	 * @param int $post_id
	 * @return void
	 */
	protected function get_primary_cat($post_id = null)
	{
		if (isset($this->primary_cat_callback)) {
			return call_user_func($this->primary_cat_callback, $post_id);
		}

		return current(get_the_category($post_id));
	}

	/**
	 * Return current global queried object (taxonomy, post, page etc.)
	 *
	 * @return int
	 */
	protected function get_current_object()
	{
		return $GLOBALS['wp_query']->get_queried_object();
	}
}