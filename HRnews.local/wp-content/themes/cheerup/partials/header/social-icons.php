<?php 
/**
 * Partial: Header social icons
 */
?>

	<?php if (!empty($social_icons)): ?>

		<ul class="social-icons cf">
		
			<?php
			
			/**
			 * Use theme settings to show enabled icons
			 */
			$services = Bunyad::get('social')->get_services();
			$links    = Bunyad::options()->social_profiles;
			
			foreach ( (array) Bunyad::options()->topbar_social as $icon):
			
				$service = $services[$icon];
				$url = !empty($links[$icon]) ? $links[$icon] : '#';
			?>
		
			<li><a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr($service['icon']); 
				?>" target="_blank"><span class="visuallyhidden"><?php echo esc_html($service['label']); ?></span></a></li>
									
			<?php endforeach; ?>
		
		</ul>
	
	<?php endif; ?>
			