<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Slider;

Class Slider_9_View extends SliderViewAbstract
{
    public function content($results)
    {
        $content = $thumb = '';
        $index = 0;

        foreach($results as $key => $post)
        {
            $primary_category = $this->get_primary_category($post->ID);

            if($this->manager->get_current_width() > 8){
                $image = get_the_post_thumbnail_url($post->ID, 'jnews-1140x570');
            } else {
                $image = get_the_post_thumbnail_url($post->ID, 'jnews-750x375');
            }

            $content .=
                "<div " . jnews_post_class("jeg_slide_item", $post->ID) . " style=\"background-image: url({$image})\">
                    " . jnews_edit_post( $post->ID ) . "
                    <div class=\"jeg_slide_wrapper\">
                        <div class=\"jeg_slide_caption\">
                            <div class=\"jeg_caption_container\">
                                <div class=\"jeg_post_category\">
                                    {$primary_category}
                                </div>
                                {$this->render_meta($post)}
                                <h2 class=\"jeg_post_title\">
                                    <a href=\"" . get_the_permalink($post) . "\">" . get_the_title($post) . "</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>";


            $thumbnail = $this->get_thumbnail($post->ID, 'jnews-120x86');
            $additional_class = (!has_post_thumbnail($post->ID)) ? ' no_thumbnail' : '';

            $thumb .=
                "<article data-index='{$index}' " . jnews_post_class("jeg_post jeg_pl_sm" . $additional_class, $post->ID) . ">
                    <div class=\"jeg_thumb\">
                        <a href=\"" . get_the_permalink($post) . "\">" . $thumbnail . "</a>
                    </div>
                    <div class=\"jeg_postblock_content\">
                        " . $this->post_meta_2($post) . "
                        <h3 class=\"jeg_post_title\">
                            <a href=\"" . get_the_permalink($post) . "\">" . get_the_title($post) . "</a>
                        </h3>
                    </div>
                </article>";
            $index++;
        }

        return array(
            'content' => $content,
            'thumb' => $thumb
        );
    }

    public function render_element($result, $attr)
    {
        if(!empty($result))
        {
            $content        = $this->content($result);
            $autoplay_delay = isset( $attr['autoplay_delay']['size'] ) ? $attr['autoplay_delay']['size'] : $attr['autoplay_delay'];

            $output =
                "<div {$this->element_id($attr)} class=\"jeg_slider_wrapper jeg_slider_type_9_wrapper {$this->unique_id} {$this->get_vc_class_name()} {$attr['el_class']}\">
                    <div class='jeg_slider_placeholder'>
						<div class='thumbnail-wrapper'>
							<div class='thumbnail-inner'><div class='thumbnail-container '></div></div>
						</div>
					</div>
                    <div class=\"jeg_slider_type_9 jeg_slider slider-carousel\" data-autoplay=\"{$attr['enable_autoplay']}\" data-delay=\"{$autoplay_delay}\">
                        {$content['content']}
                    </div>
                    <div class='jeg_slider_type_9_wrapper'>
                        <div class=\"jeg_slider_type_9_thumb jeg_posts\">
                            {$content['thumb']}
                        </div>
                    </div>
                </div>";

            return $output;
        } else {
            return $this->empty_content();
        }
    }

    public function render_meta($post)
    {
        $output = '';

        if( jnews_get_option('show_block_meta', true) && jnews_get_option('show_block_meta_date', true) )
        {
            $time = $this->format_date($post);
            $comment = get_comments_number($post);
            $output =
                "<div class=\"jeg_post_meta\">
                    <span class=\"jeg_meta_date\"><i class=\"fa fa-clock-o\"></i> {$time}</span>
                    <span class=\"jeg_meta_comment\"><i class=\"fa fa-comments\"></i> {$comment}</span>
                </div>";
        }

        return $output;
    }
}
