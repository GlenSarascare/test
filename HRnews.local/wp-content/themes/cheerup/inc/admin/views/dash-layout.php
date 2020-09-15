<?php
/**
 * Admin Dashboard layout
 */
?>

<div class="ts-dash about-wrap">
	<h2 class="nav-tab-wrapper">
	
		<a class="nav-tab <?php echo ('welcome' == $tab ? 'nav-tab-active' : ''); ?>" href="<?php 
			echo admin_url('admin.php?page=sphere-dash'); ?>"><?php esc_html_e('Welcome', 'cheerup-admin'); ?></a>
		
		<!-- install plugins -->
		<a class="nav-tab" href="<?php echo admin_url('admin.php?page=sphere-dash-demos'); ?>"><?php esc_html_e('Import Demos', 'cheerup-admin'); ?></a>
		<a class="nav-tab" href="<?php echo admin_url('admin.php?page=sphere-dash-customize'); ?>"><?php esc_html_e('Customize', 'cheerup-admin'); ?></a>
		
		<a class="nav-tab <?php echo ('support' == $tab ? 'nav-tab-active' : ''); ?>" href="<?php 
			echo admin_url('admin.php?page=sphere-dash-support'); ?>"><?php esc_html_e('Help & Support', 'cheerup-admin'); ?></a>
	</h2>
	
	<div>
		<?php include locate_template('inc/admin/views/dash-' . sanitize_file_name($tab) . '.php'); ?>
	</div>
	

</div>