<?php
/**
 * Search template to use in places like header, search widget etc. 
 */

$defaults = array(
	'text'  => esc_attr_x('Type and hit enter...', 'search', 'cheerup'),
	'style' => ''
);

$opts = array_merge(
	$defaults, 
	(array) Bunyad::registry()->search_form_data
);

?>

<?php if (!$opts['style']): ?>
	
	<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<label>
			<span class="screen-reader-text"><?php echo esc_attr_x('Search for:', 'search', 'cheerup'); ?></span>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr($opts['text']); ?>" value="<?php 
				echo esc_attr(get_search_query()); // escaped ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'search', 'cheerup'); ?>" />
		</label>
		<button type="submit" class="search-submit"><i class="tsi tsi-search"></i></button>
	</form>

<?php elseif ($opts['style'] == 'alt'): ?>
	
	<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<span class="screen-reader-text"><?php echo esc_attr_x('Search for:', 'search', 'cheerup'); ?></span>

		<button type="submit" class="search-submit"><i class="tsi tsi-search"></i></button>
		<input type="search" class="search-field" name="s" placeholder="<?php echo esc_attr($opts['text']); ?>" value="<?php 
				echo esc_attr(get_search_query()); ?>" required />
								
	</form>

<?php else: ?>

	<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="search" class="search-field" name="s" placeholder="<?php echo esc_attr($opts['text']); ?>" value="<?php 
				echo esc_attr(get_search_query()); ?>" required />

		<button type="submit" class="search-submit visuallyhidden"><?php esc_html_e('Submit', 'cheerup'); ?></button>

		<p class="message">
			<?php 
				printf(
					esc_html__('Type above and press %1$sEnter%2$s to search. Press %1$sEsc%2$s to cancel.', 'cheerup'),
					'<em>', 
					'</em>'
				);
			?>
		</p>
				
	</form>

<?php 
	endif;