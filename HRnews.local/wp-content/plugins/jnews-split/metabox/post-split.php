<?php

return array(
    'id'          => 'jnews_post_split',
    'types'       => array('post'),
    'title'       => 'JNews : Split Post',
    'priority'    => 'high',
    'template'    => array(

        array(
            'type' => 'toggle',
            'name' => 'enable_post_split',
            'label' => esc_html__('Enable Post Split on this Post', 'jnews-split'),
            'description' => esc_html__('Enable post split on this page. Please don\'t use this feature with WordPress <!--nextpage-->. This plugin will only get first matched tag criteria (on same wrapper). If you have multiple row / column or child with tag that build by page builder, it will be ignored.', 'jnews-split'),
        ),

        array(
            'type' => 'group',
            'repeating' => false,
            'length'    => 1,
            'name' => 'post_split',
            'title' =>  esc_html__('Post Split Option', 'jnews-split'),
            'description' =>  esc_html__('Post Split Option', 'jnews-split'),
            'active_callback' => array(
                array(
                    'field' => 'enable_post_split',
                    'operator' => '==',
                    'value' => true
                )
            ),
            'fields' => array(
                array(
                    'type' => 'radioimage',
                    'name' => 'template',
                    'label' => esc_html__('Post Split Template', 'jnews-split'),
                    'description' => esc_html__('Choose post split template', 'jnews-split'),
                    'item_max_width' => '118',
                    'item_max_height' => '93',
                    'items' => array(
                        array(
                            'value' => '1',
                            'label' => esc_html__('Split Post Template 1', 'jnews-split'),
                            'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-1.png',
                        ),
                        array(
                            'value' => '2',
                            'label' => esc_html__('Split Post Template 2', 'jnews-split'),
                            'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-2.png',
                        ),
                        array(
                            'value' => '3',
                            'label' => esc_html__('Split Post Template 3', 'jnews-split'),
                            'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-3.png',
                        ),
                        array(
                            'value' => '4',
                            'label' => esc_html__('Split Post Template 4', 'jnews-split'),
                            'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-4.png',
                        ),
                        array(
                            'value' => '5',
                            'label' => esc_html__('Split Post Template 5', 'jnews-split'),
                            'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-5.png',
                        ),
	                    array(
		                    'value' => '6',
		                    'label' => esc_html__('Split Post Template 6', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-6.png',
	                    ),
	                    array(
		                    'value' => '7',
		                    'label' => esc_html__('Split Post Template 7', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-7.png',
	                    ),
	                    array(
		                    'value' => '8',
		                    'label' => esc_html__('Split Post Template 8', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-8.png',
	                    ),
	                    array(
		                    'value' => '9',
		                    'label' => esc_html__('Split Post Template 9', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-9.png',
	                    ),
	                    array(
		                    'value' => '10',
		                    'label' => esc_html__('Split Post Template 10', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-10.png',
	                    ),
	                    array(
		                    'value' => '11',
		                    'label' => esc_html__('Split Post Template 11', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-11.png',
	                    ),
	                    array(
		                    'value' => '12',
		                    'label' => esc_html__('Split Post Template 12', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-12.png',
	                    ),
	                    array(
		                    'value' => '13',
		                    'label' => esc_html__('Split Post Template 13', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-13.png',
	                    ),
	                    array(
		                    'value' => '14',
		                    'label' => esc_html__('Split Post Template 14', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-14.png',
	                    ),
	                    array(
		                    'value' => '15',
		                    'label' => esc_html__('Split Post Template 15', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-15.png',
	                    ),
	                    array(
		                    'value' => '16',
		                    'label' => esc_html__('Split Post Template 16', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-16.png',
	                    ),
	                    array(
		                    'value' => '17',
		                    'label' => esc_html__('Split Post Template 17', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-17.png',
	                    ),
	                    array(
		                    'value' => '18',
		                    'label' => esc_html__('Split Post Template 18', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-18.png',
	                    ),
	                    array(
		                    'value' => '19',
		                    'label' => esc_html__('Split Post Template 19', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-19.png',
	                    ),
	                    array(
		                    'value' => '20',
		                    'label' => esc_html__('Split Post Template 20', 'jnews-split'),
		                    'img' => JNEWS_SPLIT_URL . '/assets/img/post-split-20.png',
	                    ),
                    ),
                    'default' => array(
                        '1',
                    ),
                ),

                array(
                    'type' => 'select',
                    'name' => 'tag',
                    'label' => esc_html__('Split Post by using this Tag','jnews-split'),
                    'description' => esc_html__('Your post will be split with this header as their mark','jnews-split'),
                    'default' => 'h2',
                    'items' => array(
                        array( 'value' => 'h1', 'label' => esc_html__('Heading 1 ( H1 Tag )', 'jnews-split'), ),
                        array( 'value' => 'h2', 'label' => esc_html__('Heading 2 ( H2 Tag )', 'jnews-split'), ),
                        array( 'value' => 'h3', 'label' => esc_html__('Heading 3 ( H3 Tag )', 'jnews-split'), ),
                        array( 'value' => 'h4', 'label' => esc_html__('Heading 4 ( H4 Tag )', 'jnews-split'), ),
                        array( 'value' => 'h5', 'label' => esc_html__('Heading 5 ( H5 Tag )', 'jnews-split'), ),
                        array( 'value' => 'h6', 'label' => esc_html__('Heading 6 ( H6 Tag )', 'jnews-split'), ),
                    ),
                ),

                array(
                    'type' => 'select',
                    'name' => 'numbering',
                    'label' => esc_html__('Split Header Numbering','jnews-split'),
                    'description' => esc_html__('Choose how your split page number used','jnews-split'),
                    'default' => 'asc',
                    'items' => array(
                        array( 'value' => 'desc', 'label' => esc_html__('Descending (ex : 3, 2, 1)', 'jnews-split'), ),
                        array( 'value' => 'asc', 'label'  => esc_html__('Ascending (ex : 1, 2, 3)', 'jnews-split'), ),
                    ),
                ),

                array(
                    'type' => 'select',
                    'name' => 'mode',
                    'label' => esc_html__('Load Mode for Post Split', 'jnews-split'),
                    'description' => esc_html__('Choose your how your post split will load', 'jnews-split'),
                    'default' => 'normal',
                    'items' => array(
                        array( 'value' => 'normal', 'label' => esc_html__('Normal Load', 'jnews-split') ),
                        array( 'value' => 'all', 'label' => esc_html__('Load All Content', 'jnews-split') ),
                        array( 'value' => 'ajax', 'label' => esc_html__('Load Content with Ajax', 'jnews-split') ),
                    ),
                    'active_callback' => array(
	                    array(
		                    'field'    => 'template',
		                    'operator' => 'in',
		                    'value'    => array('1','2','3','4','5')
	                    )
                    )
                ),
            )
        ),


    ),
);