<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Menu;

class WidgetMenuWalker extends \Walker_Nav_Menu
{

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS classes applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title        Title attribute.
		 *     @type string $target       Target attribute.
		 *     @type string $rel          The rel attribute.
		 *     @type string $href         The href attribute.
		 *     @type string $aria_current The aria-current attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $this->menu_icon($item->mega_menu, $depth);

		$item_output .= isset( $args->link_before ) ? $args->link_before : '';
		$item_output .= apply_filters( 'the_title', $title, $item->ID );
		$item_output .= $this->badge_content($item->mega_menu, $depth);

		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function menu_icon($menu, $depth)
	{
		if ( isset( $menu['enable_icon'] ) && $menu['enable_icon'] ) {
			$icon_class = $depth > 0 ? 'jeg_font_menu_child' : 'jeg_font_menu';
			if ( isset( $menu['enable_icon_image'] ) && $menu['enable_icon_image'] ) {
				$image = ( isset( $menu['icon_image'] ) && ! empty( $menu['icon_image'] ) ) ? wp_get_attachment_image_src( $menu['icon_image'], "jnews-75x75" )[0] : wp_get_attachment_image_src( $menu['icon_image'], "jnews-75x75" )[0];

				return "<img class='{$icon_class}' src='{$image}'>";
			}

			$icon_color = $menu['icon_color'] ? "style='color: " . $menu['icon_color'] . "'" : "";

			return "<i {$icon_color} class='{$icon_class} fa " . $menu['icon'] . "'></i>";
		}

		return null;
	}

	function badge_content($menu, $depth)
	{
		$badge_field = $depth > 0 ? 'child_badge' : 'badge';

		if(isset($menu[$badge_field]) && $menu[$badge_field] !== 'disable')
		{
			$class = ['menu-item-badge'];

			$class[] = 'jeg-badge-' . $menu[$badge_field];
			$badge_field = $depth > 0 ? 'child_badge_' : 'badge_';

			$badge_text = $menu[$badge_field . 'text'];
			$badge_bg_color = $menu[$badge_field . 'bg_color'];
			$badge_text_color = $menu[$badge_field . 'text_color'];

			return '<span class="' . join(' ', $class) . '"style="background-color: ' . $badge_bg_color . '; color: ' . $badge_text_color . '">' . $badge_text . '</span>';
		}
	}
}