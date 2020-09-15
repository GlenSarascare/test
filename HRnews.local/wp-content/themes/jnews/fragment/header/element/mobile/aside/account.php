<?php
    add_filter('jnews_can_render_account_popup', '__return_true');

	$fragment = new JNews\Ajax\FirstLoadAction();
?>
<div class="jeg_aside_item jeg_mobile_profile">
    <div class="jeg_mobile_profile_wrapper">
        <?php echo jnews_sanitize_output( $fragment->mobile_account() ) ?>
	</div>
</div>