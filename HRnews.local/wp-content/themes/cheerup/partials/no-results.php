<?php 
/**
 * Partial Template - Displayed when no search results are found on a listing loop
 */
?>
	<article id="post-0" class="page no-results not-found">
		<div class="post-content">
			<h1 class="post-title"><?php esc_html_e('Nothing Found!', 'cheerup'); ?></h1>
			<p><?php esc_html_e('Apologies, but no results were found for the requested archive. Try using the search with a relevant phrase to find the post you are looking for.', 'cheerup'); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
	
	