<?php 
    $like  = JNews_Like::getInstance();
    $posts = array_reverse( $like->get_posts( $key ) );

    if ( empty( $posts ) ) 
    {
        $like->empty_content();
    } else {
        $args = array(
            'post_type'           => 'post',
            'post__in'            => $posts,
            'orderby'             => 'date',
            'order'               => 'desc',
            'paged'               => $paged,
            'ignore_sticky_posts' => 1,
        );

        $posts = new WP_Query( $args );

        if ( $posts->have_posts() )
        {
            while ( $posts->have_posts() ) :
                $posts->the_post();
                $post_id = get_the_ID();
                do_action('jnews_json_archive_push', $post_id);
            ?>
                <article <?php post_class('jeg_post jeg_pl_sm'); ?>>
	                <div class="jeg_thumb">
	                    <a href="<?php the_permalink(); ?>"><?php echo apply_filters('jnews_image_thumbnail', $post_id, "jnews-120x86");?></a>
	                </div>
	                <div class="jeg_postblock_content">
	                    <h3 class="jeg_post_title">
	                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                    </h3>
	                    <div class="jeg_post_meta">
		                    <?php if ( jnews_check_coauthor_plus() ) : ?>
			                    <div class="jeg_meta_author coauthor">
				                    <?php echo jnews_get_author_coauthor( $post_id, false, null, 1 ); ?>
			                    </div>
		                    <?php else : ?>
			                    <div class="jeg_meta_author"><?php jnews_print_translation('by', 'jnews-like', 'by'); ?> <?php jnews_the_author_link(); ?></div>
		                    <?php endif; ?>
                            <div class="jeg_meta_date"><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i> <?php echo esc_html( jeg_get_post_date() ); ?></a></div>
                        </div>
	                </div>
	            </article>
            <?php
            endwhile;

            // pagination
            echo jnews_paging_navigation(
                array(
                    'pagination_mode'      => 'nav_1',
                    'pagination_align'     => 'center',
                    'pagination_navtext'   => false,
                    'pagination_pageinfo'  => false,
            		'current' 			   => $paged,
                    'total'                => $posts->max_num_pages,
                )
            );

        } else {
            $like->empty_content();
        }

        wp_reset_postdata();
    }
?>	            