<?php

$options = array();

$post_types = JNews\Util\Cache::get_exclude_post_type();

unset( $post_types['post'] );
unset( $post_types['page'] );

if ( ! empty( $post_types ) && is_array( $post_types ) ) {

	foreach ( $post_types as $key => $label ) {

		$options[] = array(
			'id'          => 'jnews_enable_cpt_' . $key . ']',
			'transport'   => 'postMessage',
			'default'     => true,
			'type'        => 'jnews-toggle',
			'label'       => sprintf( esc_html__( 'Enable %s Post Type', 'jnews' ), $label ),
			'description' => sprintf( esc_html__( 'Enable %s post type and their custom taxonomy as content filter.', 'jnews' ), strtolower( $label ) )
		);
	}

} else {
	$options[] = array(
		'id'          => 'jnews_enable_post_type_alert',
		'type'        => 'jeg-alert',
		'default'     => 'info',
		'label'       => esc_html__( 'Notice', 'jnews' ),
		'description' => esc_html__( 'There\'s no custom post type found.', 'jnews' ),
	);
}

return $options;
