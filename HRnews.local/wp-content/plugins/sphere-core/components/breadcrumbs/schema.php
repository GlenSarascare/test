<?php
namespace Sphere\Core\Breadcrumbs;
/**
 * Generate JSON+LD schema for breadcrumbs.
 */
class Schema 
{
	/**
	 * Breadcrumbs to use
	 *
	 * @var array
	 */
	public $crumbs = [];

	public function __construct($crumbs)
	{
		$this->crumbs = $crumbs;
	}

	/**
	 * Output breadcrumbs schema data.
	 *
	 * @return void
	 */
	public function render()
	{
		foreach ($this->crumbs as $index => $item) {

			// Both text and URL are needed for schema.
			if (empty($item['text']) || empty($item['url'])) {
				continue;
			}

			$items[] = [
				'@type'    => 'ListItem',
				'position' => ($index + 1),

				// Consistent with how Yoast does it.
				'item'     => [
					'@type' => 'WebPage',
					'@id'   => $item['url'],
					'name'  => $item['text'],
				]

				// This can also be used instead of item above, for brevity. Google's example
				// uses this way, but it differs from the schema.org definition.
				// 'name'  => $item['text'],
				// 'item'  => $item['url'],
			];
		}

		$schema = [
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $items,
		];

		echo '<script type="application/ld+json">' . json_encode($schema) . "</script>\n";
	}
}