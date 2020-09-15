<?php

$options = array();

$options[] = array(
    'id'            => 'jnews_select_share',
    'transport'     => 'postMessage',
    'default'       => true,
    'type'          => 'jnews-toggle',
    'label'         => esc_html__('Enable JNews Select & Share', 'jnews-select-share'),
    'description'   => esc_html__('Use JNews Select & Share on the article.', 'jnews-select-share'),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => true
        )
    )
);

return $options;