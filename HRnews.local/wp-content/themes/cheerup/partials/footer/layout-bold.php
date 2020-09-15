<?php
/**
 * Partial: Footer Bold Dark
 */

$classes = !isset($classes) ? 'dark bold' : $classes;

?>

	
	<footer class="main-footer <?php echo esc_attr($classes); ?>">
		
		<?php if (Bunyad::options()->footer_upper): ?>
		
		<section class="upper-footer ts-contain">
		
			<div class="wrap">
				<?php if (is_active_sidebar('cheerup-footer')): ?>
				
				<ul class="widgets ts-row cf">
					<?php dynamic_sidebar('cheerup-footer'); ?>
				</ul>
				
				<?php endif; ?>
			</div>
		</section>
		
		<?php endif; ?>
		
		
		<?php if (is_active_sidebar('cheerup-instagram')): ?>
		
		<section class="mid-footer cf mid-footer-six">
			<?php dynamic_sidebar('cheerup-instagram'); ?>
		</section>
		
		<?php endif; ?>
		
		

		<?php if (Bunyad::options()->footer_lower): ?>
		
		<section class="lower-footer cf">
			<div class="wrap">
			
				<ul class="social-icons">
					
					<?php 
						
						/**
						 * Show Social icons
						 */
						$services = Bunyad::get('social')->get_services();
						$links    = Bunyad::options()->social_profiles;
						
						foreach ( (array) Bunyad::options()->footer_social as $icon):
							$social = $services[$icon];
							$url    = !empty($links[$icon]) ? $links[$icon] : '#';
						?>
							<li>
								<a href="<?php echo esc_url($url); ?>" class="social-link" target="_blank" title="<?php echo esc_attr($social['label']); ?>">
									<i class="<?php echo esc_attr($social['icon']); ?>"></i>
									<span class="label"><?php echo esc_html($social['label']); ?></span>
								</a>
							</li>
						
					<?php
						endforeach;
					?>		
				</ul>

			
				<?php if (has_nav_menu('cheerup-footer-links')): ?>
						
					<div class="links">					
						<?php 
							wp_nav_menu([
								'theme_location' => 'cheerup-footer-links', 
								'fallback_cb'    => '', 
								'walker'         => (class_exists('Bunyad_Menus') ? 'Bunyad_MenuWalker' : '')
							]); 
						?>
					</div>
				
				<?php endif; ?>

				
				<p class="copyright"><?php 
					echo do_shortcode(
						wp_kses_post(Bunyad::options()->footer_copyright) 
					); ?>
				</p>


				
				<?php if (Bunyad::options()->footer_back_top): ?>
					<div class="to-top">
						<a href="#" class="back-to-top"><i class="tsi tsi-angle-up"></i> <?php esc_html_e('Top', 'cheerup'); ?></a>
					</div>
				<?php endif; ?>

			</div>
		</section>
		
		<?php endif; ?>
		
		
	</footer>