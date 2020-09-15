<?php
/**
 * Base class for panels.
 * 
 * @todo Organized with shared trait.
 */
class Bunyad_Customizer_Panels_Base extends WP_Customize_Panel {

	/**
	 * @var string Extra CSS Classes
	 */
	public $classes;
	public $type = 'bunyad-base';

	/**
	 * Extends template to add extra CSS classes support.
	 * 
	 * @inheritDoc
	 */
	protected function render_template()
	{
		ob_start();
		parent::render_template();
		$template = ob_get_clean();

		// Add extra CSS classes.
		$template = str_replace(
			'control-panel-{{ data.type }}',
			'control-panel-{{ data.type }} {{ data.classes }}',
			$template
		);

		// Keep default CSS class.
		$template = str_replace(
			'control-panel-{{ data.type }}',
			'control-panel-default control-section-{{ data.type }}',
			$template
		);

		echo $template; // phpcs:ignore WordPress.Security.EscapeOutput -- Safe output from native WP_Customize_Panel::render_template()
	}

	/**
	 * @inheritDoc
	 */
	public function json()
	{
		$json = parent::json();
		$json['classes'] = $this->classes;

		return $json;
	}
}