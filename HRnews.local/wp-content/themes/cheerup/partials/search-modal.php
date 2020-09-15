<?php
/**
 * Search modal
 */

// Only for simple and simple-boxed headers
if (	
		!Bunyad::options()->topbar_search 
		OR !in_array(Bunyad::options()->header_layout, array('nav-below-b', 'compact', 'simple', 'simple-boxed'))
		OR Bunyad::options()->search_style != 'modal'
	) {

	return;
}

?>

<?php if (Bunyad::amp()->active()): ?>
<amp-lightbox id="search-modal-lightbox" class="search-modal" layout="nodisplay">
	<button title="Close (Esc)" type="button" class="mfp-close" on="tap:search-modal-lightbox.close">&times;</button>
<?php endif; ?>

	<div class="search-modal-wrap">

		<div class="search-modal-box" role="dialog" aria-modal="true">
			<?php 
			Bunyad::helpers()->search_form('modal', array(
				'text' => esc_html_x('Search...', 'search', 'cheerup')
			)); 
			?>
		</div>
	</div>

<?php if (Bunyad::amp()->active()): ?>
</amp-lightbox>
<?php endif; ?>
