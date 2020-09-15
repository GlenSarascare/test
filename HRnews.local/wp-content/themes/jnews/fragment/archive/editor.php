<?php get_header(); ?>

<?php do_action( 'jnews_custom_archive_template_before_content' ); ?>

<div class="jeg_content">
    <div class="jeg_vc_content custom_archive_template">
        <?php

            if ( have_posts() ) :
                the_post();
                the_content();
            endif;

        ?>
    </div>
</div>

<?php do_action( 'jnews_custom_archive_template_after_content' ); ?>

<?php get_footer(); ?>