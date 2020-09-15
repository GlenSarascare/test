<?php
/**
 * Posts navigation template
 */
?>
<# var iconsMap = <?php echo json_encode( jet_blog_tools()->get_fa5_arrows_map() ); ?>#>
<nav class="navigation posts-navigation" role="navigation">
	<div class="nav-links">
		<div class="nav-previous">
			<a href="#">
				<i class="{{ iconsMap[settings.prev_icon] }} jet-arrow-prev jet-blog-arrow"></i>
				<?php $this->_edit_html( 'prev_text' ); ?>
			</a>
		</div>
		<div class="nav-next">
			<a href="#">
				<?php $this->_edit_html( 'next_text' ); ?>
				<i class="{{ iconsMap[settings.next_icon] }} jet-arrow-next jet-blog-arrow"></i>
			</a>
		</div>
	</div>
</nav>
