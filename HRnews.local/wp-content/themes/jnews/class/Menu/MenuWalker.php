<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Menu;

class MenuWalker extends \Walker_Nav_Menu {

    function build_mega_category_1($category, $number) {
        $ajaxload  = get_theme_mod( 'jnews_ajax_megamenu', false );
        $mega_menu = Menu::getInstance();
            
        if ( $ajaxload ) {
            $mega_output = $mega_menu->newsfeed_overlay();
        } else {
            $subcat_menu_output = $mega_menu->build_subcat_menu($category);
            $subcat_class       = empty ( $subcat_menu_output )  ? 'no_subcat' : 'with_subcat';
            $article_output     = Menu::build_article_category_1($category, $number);

            $mega_output = 
                "{$subcat_menu_output}
                <div class=\"jeg_newsfeed_list\">
                    <div data-cat-id=\"{$category}\" data-load-status=\"loaded\" class=\"jeg_newsfeed_container\">
                        <div class=\"newsfeed_carousel owl-carousel {$subcat_class}\">
                            {$article_output}
                        </div>
                    </div>
                    {$mega_menu->newsfeed_overlay()}
                </div>";
        }

        return "<div class=\"sub-menu\">
                    <div class=\"jeg_newsfeed clearfix\">{$mega_output}</div>
                </div>";
    }

    function build_mega_category_2($category, $number, $tags) {
        $ajaxload  = get_theme_mod( 'jnews_ajax_megamenu', false );
        $mega_menu = Menu::getInstance();

        if ($ajaxload) {
            $mega_output = $mega_menu->newsfeed_overlay();
        } else {
            $tag_string         = '';
            $subcat_menu_output = $mega_menu->build_subcat_menu($category);
            $subcat_class       = empty ( $subcat_menu_output )  ? 'no_subcat' : 'with_subcat';
            $article_output     = Menu::build_article_category_2($category, $number);
            $tags               = explode( ',', $tags );

            foreach ( $tags as $tag ) {
                $tag_detail  = get_tag( $tag );
                if ( ! is_wp_error( $tag_detail ) ) {
                    $tag_string .= "<li><a href='" . get_tag_link( $tag ) . "'>{$tag_detail->name}</a></li>";
                }
            }

            $mega_output = 
                    "{$subcat_menu_output}
                    <div class=\"jeg_newsfeed_list loaded\">
                        <div data-cat-id=\"{$category}\" data-load-status=\"loaded\" class=\"jeg_newsfeed_container\">
                            <div class=\"newsfeed_static {$subcat_class}\">
                                {$article_output}
                            </div>
                        </div>
                        {$mega_menu->newsfeed_overlay()}
                    </div>
                    <div class=\"jeg_newsfeed_tags\">
                        <h3>" . esc_html__('Trending Tags', 'jnews') . "</h3>
                        <ul>{$tag_string}</ul>
                    </div>";
        }

        return "<div class=\"sub-menu\">
                    <div class=\"jeg_newsfeed style2 clearfix\">{$mega_output}</div>
                </div>";
    }

	function build_custom_mega( $post_id ) {
		$content = jeg_render_builder_content( $post_id );

		return "<div class=\"sub-menu custom-mega-menu\">" . $content . "</div>";
	}

    function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
    {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $value = $item_per_row = $number = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'bgnav';

        if(isset($item->mega_menu['type']) && ( $item->mega_menu['type'] === 'category_1' || $item->mega_menu['type'] === 'category_2' || $item->mega_menu['type'] === 'custom') ) {
            $classes[] = 'jeg_megamenu';
            $classes[] = $item->mega_menu['type'];
        }

        if(isset($item->mega_menu['type']) && ( $item->mega_menu['type'] === 'category_1' || $item->mega_menu['type'] === 'category_2') && (get_theme_mod('jnews_ajax_megamenu', false)) ) {
            $classes[] = 'ajaxload';
        }

        if($depth > 0 && isset($item->mega_menu['child_mega']) && $item->mega_menu['child_mega'] !== 'disable')
        {
            $classes[] = 'jeg_child_megamenu';
            $classes[] = $item->mega_menu['child_mega'];
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        if($depth === 0 && isset($item->mega_menu['type']) && ( $item->mega_menu['type'] === 'category_1' || $item->mega_menu['type'] === 'category_2')) {
            $number = ' data-number="' . $item->mega_menu['number'] . '" ';
            if (get_theme_mod('jnews_ajax_megamenu', false)) {
                $number .= ' data-category="' . $item->mega_menu['category'] . '" '; 
                $number .= ' data-tags="' . $item->mega_menu['trending_tag'] . '" ';   
            }
        }

        if(isset($item->mega_menu['override_item_row']) && $item->mega_menu['override_item_row'] === '1')
        {
            $item_per_row = ' data-item-row="' . $item->mega_menu['item_row'] . '" ';
        } else {
            $item_per_row = ' data-item-row="default" ';
        }


        $output .= $indent . '<li' . $id . $value . $class_names . $number . $item_per_row . '>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

        $item_output = isset( $args->before ) ? $args->before : '';
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $this->menu_icon($item->mega_menu, $depth);

        $item_output .= isset( $args->link_before ) ? $args->link_before : '';
        $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= $this->badge_content($item->mega_menu, $depth);

        $item_output .= '</a>';
        $item_output .= isset( $args->after ) ? $args->after : '';

        if(isset($item->mega_menu['type']) && get_post_type() !== 'custom-mega-menu')
        {
            switch($item->mega_menu['type']) {
                case 'category_1' :
                    $item_output .= $this->build_mega_category_1($item->mega_menu['category'], $item->mega_menu['number']);
                    break;
                case 'category_2' :
                    $item_output .= $this->build_mega_category_2($item->mega_menu['category'], $item->mega_menu['number'], $item->mega_menu['trending_tag']);
                    break;
                case 'custom' :
                    $item_output .= $this->build_custom_mega($item->mega_menu['custom_mega']);
                    break;
            }
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
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