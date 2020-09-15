<?php
    if(!class_exists('JNews\Single\SinglePost'))
        return;

    $single = JNews\Single\SinglePost::getInstance();
    $single->set_post_id($wp_query->post->ID);
    do_action('single_post_' . $single->get_template());
?>

    <div class="<?php echo apply_filters('jnews_post_wrap_class', 'post-wrap', $wp_query->post->ID); ?>" <?php echo apply_filters('jnews_post_wrap_attribute', '', $wp_query->post->ID); ?>>

        <div class="jeg_container">
            <div class="jeg_autoload_separator">
                <div class="separator_bg">
                    <div class="container">
                    <?php do_action('jnews_autoload_separator'); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php do_action('jnews_single_post_begin', $wp_query->post->ID); ?>

        <div class="jeg_main <?php $single->main_class(); ?>">
            <div class="jeg_container">
                <?php get_template_part('fragment/post/single-post-' . $single->get_template()); ?>
            </div>
        </div>

        <?php do_action('jnews_single_post_end', $wp_query->post->ID); ?>

    </div>
