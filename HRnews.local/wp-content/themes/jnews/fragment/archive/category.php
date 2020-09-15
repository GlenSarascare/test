<?php get_header(); ?>

<?php do_action( 'jnews_custom_category_template_before_content' ); ?>

<div class="jeg_content">
    <div class="jeg_vc_content custom_category_template">

	<?php
        if ( have_posts() ) :

            the_post();

            $template_id  = get_theme_mod( 'jnews_category_custom_template_id', '' );

            if ( $template_id )
                echo jeg_render_builder_content( $template_id );

        endif;
	?>

    </div>
</div>

<?php do_action( 'jnews_custom_category_template_after_content' ); ?>

<?php get_footer(); ?>