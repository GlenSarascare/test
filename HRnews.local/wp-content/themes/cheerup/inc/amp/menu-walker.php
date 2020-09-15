<?php
/**
 * Walker to modify mobile menu output
 */
class Bunyad_Theme_Amp_MenuWalker extends Walker_Nav_Menu
{
	/**
	 * @inheritDoc
	 */
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$item_output = '';
		parent::start_el($item_output, $item, $depth, $args, $id);

		// Bail if it's not a menu item with children
		if (!in_array('menu-item-has-children', $item->classes)) {
			$output .= $item_output;
			return;
		}

		// State id in form: mobile_nav.item10
		$item_id = 'item' . intval($item->ID);

		$dropdown_button  = '<span class="chevron" tabindex=0 role="button"';
		$dropdown_button .= sprintf(
			' on="%s"',
			esc_attr("tap:AMP.setState( { mobileNav: { $item_id: !mobileNav.$item_id } })")
		);
		
		$dropdown_button .= '><i class="tsi tsi-chevron-down"></i>';
		$dropdown_button .= '</span>';

		// Li class names (from parent method)
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]   = 'menu-item-' . $item->ID;
		$class_names = Bunyad::amp()->get_min_class(
			apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth)
		);
		$class_names = wp_json_encode(join(' ', $class_names));

		// Parent li state change
		$li_state = sprintf(
			' [class]="%s"',
			esc_attr(
				"'$class_names' + ( mobileNav.$item_id ? '" 
				. join(' ', Bunyad::amp()->get_min_class(array('active', 'item-active')))
				."' : '' )"
			)
		);

		// Add chevron within a tag
		$item_output .= $dropdown_button;

		// Add [class] to li item
		$item_output = preg_replace('/<li([^>]*)>/', '<li\\1' . $li_state . '>', $item_output);

		// Add to main output ref
		$output .= $item_output;
	}
}