<?php

$options = array();

$options[] = array(
	'id'            => 'jnews_google_analytics_code',
	'transport'     => 'refresh',
	'default'       => '',
	'type'          => 'jnews-text',
	'label'         => esc_html__('Google Analytics Code', 'jnews'),
	'description'   => esc_html__('Insert your google analytics code right here.', 'jnews'),
);

$options[] = array(
	'id'            => 'jnews_google_analytics_local',
	'transport'     => 'refresh',
	'default'       => '',
	'type'          => 'jnews-toggle',
	'label'         => esc_html__('Load Analytics Locally', 'jnews'),
	'description'   => esc_html__('Load Google Analytics script code locally for better page speed performance.', 'jnews'),
);

return $options;