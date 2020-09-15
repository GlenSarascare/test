<?php
/**
 * Block: Highlights
 * 
 * @var array  $atts  Shortcode attribs.
 * @var string $tag   Shortcode used, example: highlights.
 * 
 * @var CheerUp_Block $block  Block object from the plugin.
 * @var WP_Query      $query  Query setup by block object.
 * 
 * @see CheerUp_Block::process()
 * @see CheerUp_ShortCodes::_render()
 */

// Add VC design CSS class if needed
$extra_class = '';
if (!empty($css) && function_exists('vc_shortcode_custom_css_class')) {
	$extra_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $tag, $atts);
}

if (!Bunyad::media()) {
	return;
}

?>

<section <?php Bunyad::markup()->attribs('highlights-block', array('class' => array('cf block', 'highlights-block', $extra_class), 'data-id' => $block->block_id)); ?>>
	
	<?php echo $block->output_heading(); // XSS ok. HTML generated by CheerUp_Block::output_heading() ?>
	
	<div class="block-content">
		<div class="large cf">
			
		<?php while ($query->have_posts()): $query->the_post(); ?>
		
			<article <?php post_class('grid-post'); ?>>
					
				<div class="post-header">
					<div class="post-thumb">
						<?php 
							Bunyad::media()->the_image('cheerup-grid'); 
						?>
						
						<?php Bunyad::helpers()->meta_cat_label(); ?>
					</div>
					
					
					<div class="meta-title">
						<?php 
							Bunyad::helpers()->post_meta('grid', [
								'align' => 'left',
							]); 
						?>
					</div>

				</div>
				
				<div class="post-content post-excerpt cf">
				<?php
		
					// Excerpt
					echo Bunyad::posts()->excerpt(null, Bunyad::options()->post_excerpt_grid, array('add_more' => false));
				 
				?>
				</div><!-- .post-content -->
	
			</article>

		
			<?php
				// This loop is for large posts only 
				if (($query->current_post + 1) == 1): 
					break; 
				endif; 
			?>
		
		<?php endwhile; ?>
			
		</div>


		<div class="posts-list">
		
		<?php while ($query->have_posts()): $query->the_post(); ?>

			<article class="small-post cf">

				<div class="post-thumb">
					<?php 
						Bunyad::media()->the_image('cheerup-small-post');
					?>
				</div>
				
				<div class="content">
					
					<a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
					
					<?php 
						Bunyad::helpers()->post_meta(
							'small-post',
							[
								'items_above' => [],
								'items_below' => ['date'],
								'show_title'  => false,
								'divider'     => false,
								'align'       => 'left'
							]
						);
					?>
					
				</div>
			</article>
		
		<?php endwhile; ?>

		</div>
	
	</div> <!-- .block-content -->
	
</section>
	
<?php wp_reset_postdata(); ?>