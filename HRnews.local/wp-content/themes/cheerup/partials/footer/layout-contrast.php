<?php
/**
 * Partial: Footer contrast layout
 */
?>

	
	<footer class="main-footer contrast">

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
		
		<section class="mid-footer cf">
			<?php dynamic_sidebar('cheerup-instagram'); ?>
		</section>
		
		<?php endif; ?>
		

		<?php if (Bunyad::options()->footer_lower): ?>
		
		<section class="lower-footer cf">
			<div class="wrap">
			
			<?php if (Bunyad::options()->footer_logo): ?>
				<div class="footer-logo">
					<img <?php
						/**
						 * Get escaped attributes and add optionally add srcset for retina
						 */ 
						Bunyad::markup()->attribs('footer-logo', array(
							'src'    => Bunyad::options()->footer_logo,
							'class'  => 'logo',
							'alt'    => get_bloginfo('name', 'display'),
							'srcset' => array(Bunyad::options()->footer_logo => '', Bunyad::options()->footer_logo_2x => '2x')
						)); ?> />
				</div>
					
			<?php endif;?>
			
				<div class="bottom cf">
					<p class="copyright"><?php 
						echo do_shortcode(
							wp_kses_post(Bunyad::options()->footer_copyright) 
						); ?>
					</p>

					
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
								<a href="<?php echo esc_url($url); ?>" class="social-link" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>"></i>
									<span class="label"><?php echo esc_html($social['label']); ?></span></a>
							</li>
						
					<?php
						endforeach;
					?>
						
						
					</ul>
				</div>
			</div>
		</section>
		
		<?php endif; ?>
		
	</footer>