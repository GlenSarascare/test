<?php 
/**
 * Partial: Post content part of the layout
 */

extract(array(
	'author_box'     => Bunyad::options()->author_box_style,
	'share_float'    => Bunyad::options()->single_share_float,
	'spacious_style' => Bunyad::posts()->meta('layout_spacious')
), EXTR_SKIP);


// Default authorbox if none forced
if (!$author_box) {
	$author_box = 'author-box';
}

$classes = array('post-content description cf entry-content');

if ($share_float) {
	$classes[] = 'has-share-float';
}

// Spacious Style
if ($spacious_style) {
	$classes[] = Bunyad::core()->get_sidebar() === 'none' ? 'content-spacious-full' : 'content-spacious';
}
else {
	$classes[] = 'content-normal';
}

?>
			
		<?php if ($share_float): // Extra div for a theia bug ?>
			<div>
				<?php if (class_exists('CheerUp_Core')): ?>
					<?php 
						// See plugins/cheerup-core/social-share/views/social-share-float.php
						Bunyad::get('cheerup_social')->render('social-share-float');
					?>
				<?php endif;?>
			</div>
		<?php endif; ?>

		<div <?php 
			Bunyad::markup()->attribs('post-content', array(
				'class' => $classes,
			)); 
			?>>


			<?php
	
			// Excerpts or main content?
			if (is_single() OR Bunyad::options()->post_body == 'full'):
	
				/**
				 * A wrapper for the_content() for some of our magic.
				 * 
				 * Note: the_content filter is applied.
				 * 
				 * @see the_content()
				 */
				Bunyad::posts()->the_content(null, false);
				
			else:
			
				// Show the excerpt,  always add Keep Reading button (more button), and respect <!--more--> (teaser) 
				echo Bunyad::posts()->excerpt(null, Bunyad::options()->post_excerpt_blog, array('force_more' => true, 'use_teaser' => true));
			
			endif;
			
			?>
				
		</div><!-- .post-content -->
		
		<div class="the-post-foot cf">
		
			<?php 
				wp_link_pages(array(
					'before' => '<div class="page-links post-pagination">', 
					'after' => '</div>', 
					'link_before' => '<span>',
					'link_after' => '</span>'
				));
			?>
			
	
			<div class="tag-share cf">

				<?php if (has_tag() && Bunyad::options()->single_tags): ?>

					<?php the_tags('<div class="post-tags">', '', '</div>'); ?>
				
				<?php endif; ?>
				
				<?php if (class_exists('CheerUp_Core')): ?>
					<?php 
						// See plugins/cheerup-core/social-share/views/social-share.php
						Bunyad::get('cheerup_social')->render('social-share');
					?>
				<?php endif;?>
					
			</div>
			
		</div>
		
		<?php if (Bunyad::options()->author_box): ?>
		
			<?php get_template_part('partials/' . $author_box); // Manually created string ?>
			
		<?php endif; ?>
		
		
		<?php

		if (Bunyad::options()->single_navigation):
			get_template_part('partials/single/post-navigation');
		endif;

		?>
		
		<?php get_template_part('partials/single/related-posts'); ?>
		
		<div class="comments">
			<?php comments_template('', true); ?>
		</div>