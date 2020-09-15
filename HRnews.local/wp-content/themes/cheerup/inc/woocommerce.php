<?php
/**
 * Cheerup Theme - WooCommerce Functionality
 * 
 * Everything related to integrating WooCommerce functionality into the theme goes in this file.
 */

class Bunyad_Theme_WooCommerce
{
	public function __construct()
	{
		add_theme_support('woocommerce');
		add_filter('init', array($this, 'init'));
		
		/**
		 * Hook in on theme activation
		 */
		if (is_admin()) {
			add_action('after_switch_theme', array($this, 'image_sizing'));
		}
			
		// Add a sidebar for WooCommerce - widget_init fires before our init
		add_action('widgets_init', array($this, 'register_sidebars'), 11);
	}
	
	/**
	 * Register WooCommrece related hooks
	 */
	public function init()
	{
		// New product gallery
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
		
		if (Bunyad::options()->woocommerce_image_zoom) {
			add_theme_support('wc-product-gallery-zoom');
		}

		
		// Register assets and set sidebar
		add_action('get_header', array($this, 'set_sidebar'), 11);
		add_action('wp_enqueue_scripts', array($this, 'register_assets'));


		// Change it to 940px
		add_filter('woocommerce_enqueue_styles', array($this, 'adjust_enqueues'));
		add_filter('woocommerce_style_smallscreen_breakpoint', function($px) {
			return '940px';
		});
		
		// Add cart fragments update
		add_filter('woocommerce_add_to_cart_fragments', array($this, 'cart_ajax_fragments'));
		
		// Number of columns on listing?
		add_filter('loop_shop_columns', array($this, 'columns'));

		
		/**
		 * Modify add to cart button for correct appearance and add category
		 */
		remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
		
		remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
		
		// Add thumb and add to cart
		add_action('woocommerce_before_shop_loop_item_title', array($this, 'loop_item_thumb'));

		// Add link to the title
		add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open');
		add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 2);
		
		// Add category after title
		add_action('woocommerce_after_shop_loop_item_title', array($this, 'loop_item_cat'), 4);
		
		
		/**
		 * Single product page modifications
		 */
		
		// Add category below title
		add_filter('woocommerce_single_product_summary', array($this, 'single_item_cat'), 6);
		
		// Comments form
		add_filter('woocommerce_product_review_comment_form_args', array($this, 'comment_form'), 10, 1);
		
		// Related post count
		add_filter('woocommerce_output_related_products_args', array($this, 'related_posts'));
		
		// Upsell count changes
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
		add_action('woocommerce_after_single_product_summary', array($this, 'output_upsells'), 15);
		
		add_action('wp_enqueue_scripts', array($this, 'remove_lightbox'), 99);
		
		
		// per page settings?
		if (Bunyad::options()->woocommerce_per_page) {
			
			add_filter(
				'loop_shop_per_page', 
				function($cols) {
					return intval(Bunyad::options()->woocommerce_per_page);
				},
				20
			);
		}
	
		// Cart modifications
		add_action('wp_head', array($this, 'cart_actions'));
	}
	
	/**
	 * Add to cart page modifications
	 */
	public function cart_actions()
	{
		if (is_checkout()) {
			return;
		}
		
		add_filter('woocommerce_cart_item_quantity', array($this, 'cart_quantity'));
		add_filter('woocommerce_cart_item_price', array($this, 'cart_price'));
		add_filter('woocommerce_cart_item_subtotal', array($this, 'cart_total'));
		add_filter('woocommerce_cart_item_name', array($this, 'cart_item_cat'), 10, 3);
	}

	/**
	 * Set a default or selected sidebar for WooCommerce pages and archives
	 */
	public function set_sidebar() 
	{
		if (!(is_woocommerce() || is_checkout() || is_cart() || is_account_page())) {
			return;
		}
	
		$layout = '';
		
		// Archives and single
		if (is_woocommerce() && !is_product()) {
			$layout = Bunyad::posts()->meta('layout_style', wc_get_page_id('shop'));
		}

		// Checkout, cart, account and single product pages
		if (is_checkout() || is_cart() || is_account_page() || is_product()) {
			
			$layout = 'full';
			
			// Set layout if changed in settings
			$style = Bunyad::posts()->meta('layout_style');
			
			if (!empty($style)) {
				$layout = $style;
			}
		}
		
		// Have a layout setting? 
		if ($layout) {
			Bunyad::core()->set_sidebar(($layout == 'full' ? 'none' : $layout));
		}
		else { 
			// fallback
			Bunyad::core()->set_sidebar('right');
		}
	}
	
	/**
	 * Register our WooCommerce sidebar
	 */
	public function register_sidebars() 
	{
		// register dynamic sidebar
		register_sidebar(array(
			'name' => esc_html_x('Shop Sidebar', 'Admin', 'cheerup'),
			'id'   => 'cheerup-shop',
			'description' => esc_html_x('Widgets in this area will be shown in the default sidebar on Shop page.', 'Admin', 'cheerup'),
			'before_title' => '<h5 class="widget-title">',
			'after_title'  => '</h5>',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n"
		));
	}
	
	/**
	 * Add WooCommerce assets
	 */
	public function register_assets()
	{	
		wp_enqueue_style('cheerup-woocommerce', get_template_directory_uri() . '/css/woocommerce.css'); 
	}

	/**
	 * Remove some of the default styles
	 * 
	 * @param array $styles
	 */
	public function adjust_enqueues($styles)
	{
		unset($styles['woocommerce-smallscreen']);
		
		return $styles;
	}
	
	/**
	 * Action callback: Disable WooCommerce lightbox and use the internal one
	 */
	public function remove_lightbox()
	{
		wp_dequeue_style('woocommerce_prettyPhoto_css');
		wp_dequeue_script('prettyPhoto-init');
		wp_dequeue_script('prettyPhoto');
	}
	
	/**
	 * Filter callback: Modify the WooCommerce comment form
	 */
	public function comment_form($args)
	{
		$commenter = wp_get_current_commenter();
		
		$comment_field = '';
		if (get_option('woocommerce_enable_review_rating') === 'yes') {
			$comment_field = '
				<div class="comment-form-rating cf"><label for="rating">' . esc_html_x('Your Rating:', 'woocommerce', 'cheerup') .'</label><select name="rating" id="rating">
					<option value="">' . esc_html_x('Rate&hellip;', 'woocommerce', 'cheerup') . '</option>
					<option value="5">' . esc_html_x('Perfect', 'woocommerce', 'cheerup') . '</option>
					<option value="4">' . esc_html_x('Good', 'woocommerce', 'cheerup') . '</option>
					<option value="3">' . esc_html_x('Average', 'woocommerce', 'cheerup') . '</option>
					<option value="2">' . esc_html_x('Not that bad', 'woocommerce', 'cheerup') . '</option>
					<option value="1">' . esc_html_x('Very Poor', 'woocommerce', 'cheerup') . '</option>
						</select>
				</div>';
		}
		
		$args = array_merge($args, array(
			'title_reply'    => '<span class="section-head"><span class="title">' . (have_comments() ? esc_html_x('Add a review', 'woocommerce', 'cheerup') : esc_html_x('Be the first to review', 'woocommerce', 'cheerup') . ' &ldquo;' . esc_html(get_the_title()) . '&rdquo;') . '</span></span>',
			'title_reply_to' => '',
			'fields'  => array(
				'author' => '
						<div class="inline-field">
							<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" placeholder="'. esc_attr_x('Name', 'woocommerce', 'cheerup') .'"/>
						</div>', 
				'email'  => '
						<div class="inline-field">
							<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" placeholder="'. esc_attr_x('Email', 'woocommerce', 'cheerup') .'"/>
						</div>'
			),
			
			'comment_field' => $comment_field . '
				<div class="reply-field cf">
					<textarea name="comment" id="comment" cols="45" rows="7" placeholder="'. esc_attr_x('Your Review', 'woocommerce', 'cheerup') .'" aria-required="true" required></textarea>
				</div>'

		));
		
		return $args;
	}
	
	/**
	 * Filter callback: Change the related post count
	 */
	public function related_posts($args)
	{
		$args = array_merge($args, array(
			'posts_per_page' => (Bunyad::core()->get_sidebar() == 'none' ? 4 : 3),
			'columns' => (Bunyad::core()->get_sidebar() == 'none' ? 4 : 3),
		));
		
		return $args;
	}
	
	/**
	 * Output upsell products in correct number and columns
	 */
	public function output_upsells() 
	{
		
		$number = Bunyad::core()->get_sidebar() == 'none' ? 4 : 3;
		woocommerce_upsell_display($number, $number);
	}
	
	/**
	 * Setup image sizes for WooCommerce
	 */
	public function image_sizing()
	{
		global $pagenow;
				
		if (!isset($_GET['activated']) OR $pagenow != 'themes.php') {
			return;
		}
		
		// keeping extra room for responsive versions
	  	$catalog = array(
			'width' 	=> '540',	// px
			'height'	=> '540',	// px - 236px resize
			'crop'		=> 1 		// true
		);
	
		$single = array(
			'width' 	=> '600',	// px
			'height'	=> '600',	// px
			'crop'		=> 1 		// true
		);
	
		$thumbnail = array(
			'width' 	=> '174',	// px
			'height'	=> '174',	// px 
			'crop'		=> 1 		// false
		);

		// Image sizes
		update_option('shop_catalog_image_size', $catalog); 	// Product category thumbs
		update_option('shop_single_image_size', $single); 		// Single product image
		update_option('shop_thumbnail_image_size', $thumbnail); // Image gallery thumbs	
	}
	
	/**
	 * Register cart fragment to update on adding products via AJAX
	 */
	public function cart_ajax_fragments($fragments)
	{
		$fragments['a.cart-link'] = $this->cart_link();
		return $fragments;
	}
	
	/**
	 * The cart menu link fragment
	 */
	public function cart_link()
	{
	
		$count = WC()->cart->get_cart_contents_count();
	
		ob_start();
	
		?>
			
			<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-link" title="<?php esc_attr_e('View Cart', 'cheerup'); 
				?>"><i class="tsi tsi-shopping-cart"></i>
				<span class="counter<?php echo esc_attr($count ? ' active' : ''); ?>"><?php 
					echo esc_html($count); 
				?></span>
				<span class="visuallyhidden"><?php esc_html_e('Shopping Cart', 'cheerup'); ?></span>
			</a>
			
		<?php 
	
		return ob_get_clean();
	}
	
	/**
	 * Product listing columns in WooCommerce
	 */
	public function columns()
	{		
		return (Bunyad::core()->get_sidebar() == 'none' ? 4 : 3);
	}
	
	/**
	 * Add to Cart for product listing
	 */
	public function loop_item_thumb()
	{
		?>

		<div class="product-thumb">

		<?php 
			woocommerce_template_loop_product_link_open();
			
				echo woocommerce_get_product_thumbnail();
			
			woocommerce_template_loop_product_link_close();
			
			// add to cart directly below
			woocommerce_template_loop_add_to_cart();
		?>

		</div>
		
		<?php
   		
	}
	
	/**
	 * Action callback: Add category to the loop
	 */
	public function loop_item_cat() 
	{
		global $product;
		
		$cats = get_the_terms(null, 'product_cat');
		if (empty($cats)) {
			return;
		}
		
		$cat = current($cats);
		
		echo '<a href="' . esc_url(get_term_link($cat)) . '" class="product-cat">' . esc_html($cat->name) . '</a>';  
	}
	
	/**
	 * Action callback: Add category to single post
	 */
	public function single_item_cat()
	{
		echo '<span class="product-cat">' . get_the_term_list(wc_get_product()->get_id(), 'product_cat') . '</span>';
	}
	
	/**
	 * Cart quantity label
	 */
	public function cart_quantity($number)
	{
		return '<span class="label">' . esc_html_x('Qty', 'woocommerce', 'cheerup') . '</span>' . $number;
	}
	
	/**
	 * Cart price label
	 */
	public function cart_price($number)
	{
		return '<span class="label">' . esc_html_x('Price', 'woocommerce', 'cheerup') . '</span>' . $number;
	}
	
	/**
	 * Cart total label
	 */
	public function cart_total($number)
	{
		return '<span class="label">' . esc_html_x('Total', 'woocommerce', 'cheerup') . '</span>' . $number;
	}
	
	/**
	 * Add product category to cart
	 */
	public function cart_item_cat($html, $item, $key)
	{
		return $html . '<span class="product-cat">' . get_the_term_list($item['product_id'], 'product_cat') . '</span>';
	}
}


// init and make available in Bunyad::get('woocommerce')
Bunyad::register('woocommerce', array(
	'class' => 'Bunyad_Theme_WooCommerce',
	'init' => true
));