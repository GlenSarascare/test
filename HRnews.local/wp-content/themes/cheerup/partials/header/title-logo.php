<?php
/**
 * Header Logo/Title
 */

extract(array(
	'title_tag' => (is_front_page() && Bunyad::options()->home_logo_h1 ? 'h1' : '')
), EXTR_SKIP);

// Fallback to div
if (empty($title_tag)) {
	$title_tag = 'div';
}

?>
		<<?php echo esc_attr($title_tag); ?> class="title">
			
			<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
			
			<?php if (Bunyad::options()->image_logo): // custom logo ?>
				
				<?php Bunyad::helpers()->mobile_logo(); ?>
				
				<img <?php
					/**
					 * Get escaped attributes and add optionally add srcset for retina
					 */ 
					Bunyad::markup()->attribs('image-logo', array(
						'src'    => Bunyad::options()->image_logo,
						'class'  => 'logo-image',
						'alt'    => get_bloginfo('name', 'display'),
						'srcset' => array(Bunyad::options()->image_logo => '', Bunyad::options()->image_logo_2x => '2x')
					)); ?> />

			<?php else: ?>
				
				<span class="text-logo"><?php echo esc_html(get_bloginfo('name', 'display')); ?></span>
				
			<?php endif; ?>
			
			</a>
		
		</<?php echo esc_attr($title_tag); ?>>