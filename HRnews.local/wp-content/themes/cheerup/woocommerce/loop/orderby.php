<?php
/**
 * Show options for ordering
 * 
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @version     3.6.0
 */

?>

<form class="woocommerce-ordering" method="get">
		<input type="hidden" name="orderby" value="" />
		
		<?php

			$selected = current($catalog_orderby_options);
			
			if (array_key_exists($orderby, $catalog_orderby_options)) {
				$selected = $catalog_orderby_options[$orderby];
			}
		?>
		
		<div class="order-select">
		
			<span><?php echo esc_html($selected); ?> <i class="tsi tsi-angle-down"></i></span>
		
			<ul class="drop">

			<?php 
	
				foreach ($catalog_orderby_options as $id => $name) {
					echo '<li data-value="' . esc_attr($id) . '" class="' . ($orderby == $id ? 'active' : '') . '"><a href="#">' . esc_attr($name) . '</a></li>';
				}
			?>
			
			</ul>
		</div>

		<input type="hidden" name="paged" value="1" />
		<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
