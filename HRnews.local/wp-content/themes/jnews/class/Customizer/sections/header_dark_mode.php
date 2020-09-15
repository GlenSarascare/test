<?php

$options = array();


$options[] = array(
    'id'            => 'jnews_dark_mode_alert',
    'type'          => 'jnews-alert',
    'default'       => 'warning',
    'label'         => esc_html__('','jnews'),
    'description'   => wp_kses(__('<span>You need to have Dark Mode element in the Header Builder. Also <strong>please clear your website cache</strong> everytime you change option.</span><br/><br/>
                        <ul><strong>Options :</strong>
                        <li><strong>User Toggle Button</strong>, allow user switch to dark mode using button.</li>
                        <li><strong>Full Dark Mode</strong>, make your site using dark mode as default scheme.</li>
                        <li><strong>Night Time Only</strong>, auto switch to dark mode between 6pm to 6am.</li>
                        <span>Dark mode will be disabled while you are editing in Elementor/ WPBakery.</span>
                    </ul>','jnews'), wp_kses_allowed_html()),
);
$options[] = array(
    'id'            => 'jnews_dark_mode_options',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Choose Dark Mode Options', 'jnews'),
    'default'       => 'jeg_toggle_dark',
    'choices'       => array(
        'jeg_toggle_dark'    => esc_html__('User Toggle Button', 'jnews'),
        'jeg_full_dark'       => esc_html__('Full Dark Mode', 'jnews'),
        'jeg_timed_dark'      => esc_html__('Night Time Only (6pm-6am)', 'jnews'),
    ),
);

return $options;
