<?php
/**
 * @author : Jegtheme
 */

Class JNews_Footer_Instagram_Option extends \JNews\Module\ModuleOptionAbstract
{
    public function compatible_column()
    {
        return array( 8 , 12 );
    }

    public function get_module_name()
    {
        return esc_html__('JNews - Horizontal Instagram', 'jnews-instagram');
    }

    public function get_category()
    {
        return esc_html__('JNews - Footer', 'jnews-instagram');
    }

    public function set_options()
    {
	    $this->options[] = array(
		    'type'          => 'dropdown',
		    'param_name'    => 'footer_instagram_method',
		    'heading'       => esc_html__('Fetch Method','jnews-instagram'),
		    'description'   => esc_html__('Select fetch Instagram feed method that you want to use.','jnews-instagram'),
		    'std'           => 'username',
		    'value'         => array(
			    esc_attr__( 'Instagram Username (12 maximun image feed)', 'jnews-instagram' ) => 'username',
			    esc_attr__( 'Instagram API (20 maximum image feed, get more by sending request)', 'jnews-instagram' ) => 'api'
		    )
	    );

        $this->options[] = array(
            'type'          => 'textfield',
            'param_name'    => 'footer_instagram_username',
            'holder'        => 'span',
            'heading'       => esc_html__('Instagram Username','jnews-instagram'),
            'description'   => esc_html__('Insert your Instagram username.','jnews-instagram'),
        );

	    $this->options[] = array(
		    'type'          => 'alert',
		    'param_name'    => 'footer_instagram_redirect',
		    'heading'       => esc_html__('Info :', 'jnews-instagram'),
		    'description'   => sprintf(__('You will be asked to enter redirect URI when you configure the app. Please use this url: %s', 'jnews-instagram'), get_admin_url() . 'widgets.php'),
		    'std'           => 'alert',
		    'dependency'    => array('element' => 'footer_instagram_method', 'value' => array('api'))
	    );

	    $this->options[] = array(
		    'type'          => 'textfield',
		    'param_name'    => 'clientid',
		    'holder'        => 'span',
		    'heading'       => esc_html__('Instagram Client ID', 'jnews-instagram'),
		    'description'   => sprintf(__('You need to create an Instagram application to get your Instagram Client ID <a href="%s" target="_blank">here</a>.', 'jnews-instagram'), 'https://www.instagram.com/developer/'),
		    'dependency'    => array('element' => 'footer_instagram_method', 'value' => array('api'))
	    );

	    $this->options[] = array(
		    'type'          => 'textfield',
		    'param_name'    => 'access_token',
		    'holder'        => 'span',
		    'heading'       => esc_html__('Instagram Access Token', 'jnews-instagram'),
		    'description'   => sprintf(__('Get your Instagram Access Token by clicking this <a class="%s" href="%s" target="_blank">link</a> and refer to next page URL.', 'jnews-instagram'), 'jnews_instagram_access_token instagram', get_admin_url() . 'widgets.php'),
		    'dependency'    => array('element' => 'footer_instagram_method', 'value' => array('api'))
	    );

        $this->options[] = array(
            'type'          => 'slider',
            'param_name'    => 'footer_instagram_row',
            'heading'       => esc_html__('Number Of Rows','jnews-instagram'),
            'description'   => esc_html__('Number of rows for footer Instagram feed.','jnews-instagram'),
            'min'           => 1,
            'max'           => 2,
            'step'          => 1,
            'std'           => 1,
        );

        $this->options[] = array(
            'type'          => 'slider',
            'param_name'    => 'footer_instagram_column',
            'heading'       => esc_html__('Number Of Columns','jnews-instagram'),
            'description'   => esc_html__('Number of Instagram feed columns.','jnews-instagram'),
            'min'           => 5,
            'max'           => 10,
            'step'          => 1,
            'std'           => 8,
        );

        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'footer_instagram_sort_type',
            'heading'       => esc_html__('Sort Feed Type','jnews-instagram'),
            'description'   => esc_html__('Sort the Instagram feed in a set order.','jnews-instagram'),
            'std'           => 'most_recent',
            'value'         => array(
                esc_attr__( 'Most Recent', 'jnews-instagram' ) => 'most_recent',
                esc_attr__( 'Least Recent', 'jnews-instagram' ) => 'least_recent',
                esc_attr__( 'Most Liked', 'jnews-instagram' ) => 'most_like',
                esc_attr__( 'Least Liked', 'jnews-instagram' ) => 'least_like',
                esc_attr__( 'Most Commented ', 'jnews-instagram' ) => 'most_comment',
                esc_attr__( 'Least Commented ', 'jnews-instagram' ) => 'least_comment',
            )
        );

        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'footer_instagram_hover_style',
            'heading'       => esc_html__('Hover Style','jnews-instagram'),
            'description'   => esc_html__('Choose hover effect style.','jnews-instagram'),
            'std'           => 'zoom',
            'value'         => array(
                esc_attr__( 'Normal', 'jnews-instagram' ) => 'normal',
                esc_attr__( 'Show Icon', 'jnews-instagram' ) => 'icon',
                esc_attr__( 'Show Like Count', 'jnews-instagram' ) => 'like',
                esc_attr__( 'Show Comment Count', 'jnews-instagram' ) => 'comment',
                esc_attr__( 'Zoom', 'jnews-instagram' ) => 'zoom',
                esc_html__('Zoom Rotate', 'jnews-instagram') => 'zoom-rotate',
                esc_attr__( 'No Effect', 'jnews-instagram' ) => ' ',
            )
        );

        $this->options[] = array(
            'type'          => 'textfield',
            'param_name'    => 'footer_instagram_follow_button',
            'heading'       => esc_html__('Follow Button Text','jnews-instagram'),
            'description'   => esc_html__('Leave empty if you wont show it','jnews-instagram'),
        );

        $this->options[] = array(
            'type'          => 'checkbox',
            'param_name'    => 'footer_instagram_newtab',
            'heading'       => esc_html__('Open New Tab', 'jnews-instagram'),
            'description'   => esc_html__('Open Instagram profile page on new tab.', 'jnews-instagram'),
        );
    }
}
