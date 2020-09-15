<?php
/**
 * Sanitizer to assist with collection of existing classes and addition of 
 * shorter classes.
 */
class Bunyad_Theme_Amp_SanitizeClasses extends AMP_Base_Sanitizer 
{
	protected $xpath;
	protected $body;
	/**
	 * @inheritDoc
	 */
	public function sanitize() 
	{
		$this->body = $this->dom->getElementsByTagName('body')->item(0);
		if (!$this->body) {
			return;
		}

		$this->xpath = new DOMXPath($this->dom);

		// Add min classes
		$this->add_min_classes();

		// Collect classes
		// @deprecated $this->collect_classes();
	}

	public function add_min_classes() {

		// Get the map
		$map = Bunyad::amp()->min_map;

		if (!count($map)) {
			return;
		}
		
		// Get all elements
		$query = $this->xpath->query("//*");
		
		$replacer = function ($v) use ($map) {
			return isset($map[$v]) ? $map[$v] : $v;
		};
	
		/**
		 * Add the classes from map to all relevant nodes 
		 */
		foreach ($query as $entry) {
	
			// Get current class
			$class = $entry->getAttribute('class');
			if (!$class) {
				continue;
			}
	
			$classes = array_map('trim', explode(' ', $class));
	
			// Add instead of replacing, as custom CSS, amp-bind/JS might still rely on it.
			//   To replace instead: $classes = array_map($replacer, $classes);
			foreach ($classes as $k) {
				if (isset($map[$k])) {
					array_push($classes, $map[$k]);
				}
			}

			$entry->setAttribute('class', implode(' ', $classes));

			/**
			 * AMP bind check too
			 */

		}
	}

	/**
	 * Collect common classes currently in use to assist with the tree 
	 * shaking of the CSS selectors.
	 * 
	 * This is done mainly to identify if the multi-classes in the CSS are actually used
	 * in the document. As classes of type of .main-footer.bold aren't handled by the
	 * tree shaking in the plugin.
	 * 
	 * @deprecated  When min classes are used, this is usually not needed unless a conflict occurs.
	 */
	public function collect_classes()
	{
		$classes = array(
			'footer' => array(),
			'header' => array(),
		);

		// Header classes
		$header = $this->dom->getElementById('main-head');
		if ($header) {
			$classes['header'] = explode(' ', $header->getAttribute('class'));
		}

		// Footer classes
		$footer = $this->xpath->query('//footer[contains(@class, "main-footer")]')->item(0);
		if ($footer) {
			$classes['footer'] = explode(' ', $footer->getAttribute('class'));
		}

		Bunyad::amp()->layout_classes = $classes;
	}
}