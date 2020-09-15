<?php
/**
 * Partial: Featured image/video/gallery part of single post
 */

if (Bunyad::posts()->meta('featured_disable')) {
	return;
}

extract(array(
	'show_social' => true,
	'image_attrs' => array('title' => strip_tags(get_the_title())),
	'context'     => '',
), EXTR_SKIP);

?>

	<div class="featured" data-parallax="<?php echo esc_attr(Bunyad::options()->post_creative_parallax); ?>">
	
		<?php if (get_post_format() == 'gallery' && !Bunyad::amp()->active()): // get gallery template ?>
		
			<?php Bunyad::core()->partial('partials/gallery-format', compact('image', 'context')); ?>
			
		<?php elseif (Bunyad::posts()->meta('featured_video')): // featured video available? ?>
		
			<div class="featured-vid">
				<?php echo apply_filters('bunyad_featured_video', esc_html(Bunyad::posts()->meta('featured_video'))); ?>
			</div>
			
		<?php elseif (has_post_thumbnail()): ?>
		
			<?php 
				/**
				 * Normal featured image when no post format
				 */
				$caption = get_post(get_post_thumbnail_id())->post_excerpt;
				$url     = get_permalink();
				
				// On single page? Link to image
				if (is_single()):
					$url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
					$url = $url[0];
				endif;

				Bunyad::media()->the_image(
					$image,
					[
						'link'        => $url,
						'attrs'       => $image_attrs,
						'bg_image'    => false,
					]
				);
			?>
			
		<?php endif; // normal featured image ?>
		
		<div class="overlay">
					
			<?php
				Bunyad::helpers()->post_meta(
					'featured-overlay',
					[
						'is_single' => true,
						'items_above' => ['cat'],
						'items_below' => ['author', 'date'],
						'text_labels' => ['in', 'by'],
						'title_class' => 'post-title',
						'cat_style'   => 'labels',
						'align'       => '', // inherit
						'add_class'   => 'the-post-meta'
					]
				);
			?>
							
			<?php if ($show_social): ?>
				<?php if (class_exists('CheerUp_Core')): ?>
					<?php 
						// See plugins/cheerup-core/social-share/views/social-share.php
						Bunyad::get('cheerup_social')->render('social-share');
					?>
				<?php endif;?>
			<?php endif;?>
			
		</div>
		
	</div>