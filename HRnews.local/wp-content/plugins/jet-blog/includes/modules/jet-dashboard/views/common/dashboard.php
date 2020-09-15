<?php
/**
 * Main dashboard template
 */
?><div id="jet-dashboard-page" class="jet-dashboard-page">
	<jet-dashboard-header></jet-dashboard-header>
	<div class="jet-dashboard-page__content">
		<component
		:is="page"
		></component>
	</div>
</div>
