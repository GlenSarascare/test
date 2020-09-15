<?php 
/**
 * Sidebar template - custom split template
 * 
 * Note: Due to WordPress using require_once() on get_sidebar() to get sidebar.php, we 
 * need to use get_sidebar('dynamic') for a page that needs two sidebars while keeping
 * the code DRY.
 */

$sidebar = 'cheerup-primary';

if (Bunyad::registry()->sidebar) {
	$sidebar = Bunyad::registry()->sidebar;
}


// Sidebar container attributes
$attribs = array('class' => 'col-4 sidebar');

$sticky  = 0;
if (Bunyad::options()->sidebar_sticky) {
	$attribs['data-sticky'] = 1;
	$sticky = 1;
}

?>
	<aside <?php Bunyad::markup()->attribs('sidebar', $attribs); ?>>
		
		<div <?php Bunyad::markup()->attribs('sidebar-inner', ['class' => ['inner', ($sticky ? ' theiaStickySidebar' : '')]]); ?>>
		
		<?php if (is_active_sidebar($sidebar)) : ?>
			<ul>
				<?php dynamic_sidebar($sidebar); ?>
			</ul>
		<?php endif; ?>
		
		</div>

	</aside>