<?php
    add_filter('jnews_can_render_account_popup', '__return_true');

	$fragment = new JNews\Ajax\FirstLoadAction();
?>
<div class="jeg_nav_item jeg_nav_account">
    <ul class="jeg_accountlink jeg_menu">
        <?php echo jnews_sanitize_output( $fragment->top_bar_account() ) ?>
    </ul>
</div>