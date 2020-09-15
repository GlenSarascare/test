<h1>
	Welcome to CheerUp! 
	<span class="ts-version">v<?php echo esc_html(Bunyad::options()->get_config('theme_version')); ?></span>
</h1>

<div class="about-text">
	<p>
		Thank You for installing CheerUp. You're ready to create an amazing site. We hope you will 
		enjoy using the theme. Please read instructions below to get going.
	</p>
</div>

<?php if (!Bunyad::core()->get_license()): // Not activated ?>
	<div class="ts-dash-box activate-box">
		
		<?php if (!empty($activated)): ?>
		
			<h3>Theme Activated</h3> 
			
			<p>
				Your theme has been activated successfully. 
				
				<?php if (!empty($data['email'])): ?>
				
					Your support login info has been sent to <?php echo esc_html($data['email']); ?>. 
					If you don't receive the email within 5 minutes, please check your Spam folder.
				
				<?php endif; ?>
			
			</p>
			
		<?php elseif (!empty($error)): ?>
		
			<h3>Activation Failed</h3>
			
			<p>
				You can try it again by refreshing this page in a few minutes. Further, please make sure your 
				webhost allows external HTTPS connections. If the problem persists, please contact Support.
			</p> 
		
		<?php else: ?>
			
			<span class="bg dashicons dashicons-lock"></span>
			
			<div class="content">
				<h3>Step 1: Activate Theme License</h3> 
				
				<p>
					Register your theme to create your support account, validate your site, and to be notified 
					about security updates immediately.
				</p>
				<p>
					Note: Click the button below and you will be forwarded to Envato. Login to the account you 
					<em>purchased the theme with</em>, and authorize API.<br />
				</p>
				
				<form method="post" action="https://theme-sphere.com/activate-theme/">
					
					<input type="hidden" name="api" value="1.1" />
					<input type="hidden" name="return" value="<?php echo esc_url(admin_url('admin.php?page=sphere-dash-activate')); ?>" />
					<input type="hidden" name="theme" value="<?php echo esc_attr(Bunyad::options()->get_config('theme_name')); ?>" />
					<input type="hidden" name="site" value="<?php echo esc_url(site_url('/')); ?>" />
					
					<button class="button button-primary button-hero">Register &amp; Activate</button>
				</form>
			</div>
		
		<?php endif; ?>
	</div>
	
<?php endif; ?>

<!--  support, documentation, feedback form -->

<div class="ts-dash-box">
	<h3>Setting up your site</h3>
	
	<p>
		Once your theme is activated, our <a href="http://cheerup.theme-sphere.com/documentation/" target="_blank">documentation</a> 
		has all the information you need on getting setup.
	</p>
	
	<ol>
		<?php if (!TGM_Plugin_Activation::get_instance()->is_tgmpa_complete()): ?>
			<li>
				Make sure you have activated the 
				<a href="<?php echo esc_url(admin_url('admin.php?page=tgmpa-install-plugins')); ?>" target="_blank">required plugins</a>.
			</li>
		<?php endif; ?>
		<li>
			You can <a href="<?php echo esc_url(admin_url('admin.php?page=sphere-dash-demos')); ?>" target="_blank">import a demo</a>. 
			If it's a fresh install or a test site, you can import full demo content. If it's a site with existing content, only import settings.
		</li>
		<li>
			Add a logo, configure your menus, setup your home-page. Learn all these in 
			<a href="http://cheerup.theme-sphere.com/documentation/#post-install" target="_blank">this guide</a>.
		</li>
	</ol>
</div>

<?php get_template_part('inc/admin/views/dash-support'); ?>