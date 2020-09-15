<?php
/**
 * @author Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class JNews_Util_Instagram
 */
Class JNews_Instagram
{
    /**
     * @var integer
     */
    private $row;
    private $column;
    private $count;

    /**
     * @var string
     */
    private $cache_key = "jnews_footer_instagram_cache";
    private $username;
    private $content;
    private $sort;
    private $hover;
    private $newtab;
    private $follow;
	private $method;
	private $token;

	/**
	 * @var string
	 */
	private $user_id;

    /**
     * JNews_Util_Instagram constructor
     */
    public function __construct( $param, $row = 1 )
    {
        $this->row      = isset( $param['row']['size'] ) ? $param['row']['size'] : $param['row'];
        $this->column   = isset( $param['column']['size'] ) ? $param['column']['size'] : $param['column'];
        $this->username = $param['username'];
        $this->sort     = $param['sort'];
        $this->hover    = $param['hover'];
        $this->newtab   = $param['newtab'];
        $this->follow   = $param['follow'];
	    $this->method   = $param['method'];
	    $this->token    = $param['token'];
        $this->count    = $this->row * $this->column;
    }

    public function render_content( $data )
    {
        $content = $like = '';

        if ( !empty( $data ) && is_array( $data ) )
        {
            switch ( $this->sort )
            {
                case 'most_recent':
                    usort($data, function($a, $b)
                    {
                        return $b['time'] - $a['time'];
                    });
                    break;
                case 'least_recent':
                    usort($data, function($a, $b)
                    {
                        return $a['time'] - $b['time'];
                    });
                    break;
                case 'most_like':
                    usort($data, function($a, $b)
                    {
                        return $b['like'] - $a['like'];
                    });
                    break;
                case 'least_like':
                    usort($data, function($a, $b)
                    {
                        return $a['like'] - $b['like'];
                    });
                    break;
                case 'most_comment':
                    usort($data, function($a, $b)
                    {
                        return $b['comment'] - $a['comment'];
                    });
                    break;
                case 'least_comment':
                    usort($data, function($a, $b)
                    {
                        return $a['comment'] - $b['comment'];
                    });
                    break;
            }

            $a = 1;
            foreach ( $data as $image )
            {
                if ( $this->hover == 'like' )
                {
                    $like =  "<i class='fa fa-heart'>" . jnews_number_format( $image['like'] ) . "</i>";
                } elseif ( $this->hover == 'comment' ) {
                    $like =  "<i class='fa fa-comments'>" . jnews_number_format( $image['comment'] ) . "</i>";
                }

                $image_tag = apply_filters('jnews_single_image', $image['images']['thumbnail'], $image['caption'], '1000');

                $content .=
                    "<li>
                        <a href='{$image['link'] }' {$this->newtab}>
                            {$like}
                            {$image_tag}
                        </a>
                    </li>";

                if ( $a >= ( $this->row * $this->column ) )
                {
                    break;
                }

                $a++;
            }
        }

        $this->content = $content;
    }

    public function scrap_data( $username, $token, $method = 'username', $count = 12, $max_id = '' )
    {
	    $response = jnews_get_instagram_data($username);

	    if ( ! is_string( $response ) && ! empty( $response ) && ! is_wp_error( $response ) && $response['response']['code'] == '200' )
	    {
		    $data_images = array();

		    if ( $method === 'username')
		    {
			    $data = $response['body'];
			    $data_json = json_decode( $data, true );

			    if ( ! empty($data_json['data']['user']['edge_owner_to_timeline_media']['edges']) ) {

				    foreach ( $data_json['data']['user']['edge_owner_to_timeline_media']['edges'] as $image ) {
					    $data_images[] = array(
						    'id'      => $image['node']['id'],
						    'time'    => $image['node']['taken_at_timestamp'],
						    'like'    => $image['node']['edge_liked_by']['count'],
						    'comment' => $image['node']['edge_media_to_comment']['count'],
						    'caption' => ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ? preg_replace( '/[^a-zA-Z0-9\-]/', ' ', $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) : '',
						    'link'    => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
						    'images'  => array(
							    'display'   => $image['node']['display_url'],
							    'thumbnail' => $image['node']['thumbnail_src']
						    ),
					    );

					    if ( count( $data_images ) >= $count ) {
						    break;
					    }
				    }
			    }

		    } else {
			    $data_json = json_decode( $response['body'], TRUE );

			    foreach ( $data_json['data'] as $image )
			    {
				    $data_images[] = array(
					    'id'          => $image['id'],
					    'time'        => $image['created_time'],
					    'like'        => $image['likes']['count'],
					    'comment'     => $image['comments']['count'],
					    'caption'     => !empty( $image['caption']['text'] ) ? preg_replace('/[^a-zA-Z0-9\-]/', ' ', $image['caption']['text']) : '',
					    'link'        => $image['link'],
					    'images'      => array(
						    'display'   => $image['images']['standard_resolution']['url'],
						    'thumbnail' => $image['images']['thumbnail']['url']
					    ),
				    );

				    if ( count($data_images) >= $count )
				    {
					    break;
				    }
			    }
		    }

		    if ( (($count - count($data_images)) > 0) && (count($data_images) % 12 == 0) && (count($data_images) > 0) && $method != 'username' )
		    {
			    $max_id = end( $data_images );
			    $max_id = $max_id['id'];

			    $next_images = $this->scrap_data( $username, $token, $method, ($count - 12), $max_id );

			    if ( !is_wp_error( $next_images ) )
			    {
				    $data_images = array_merge( $data_images, $next_images );
			    }
		    }

		    return $data_images;

	    }

	    if ( current_user_can( 'administrator' ) && is_string( $response ) && ! empty( $response ) ) {
		    $warning = "<div class=\"alert alert-error alert-compatibility\" style=\"position: relative; opacity: 1; visibility: visible;\">{$response}</div>";
		    echo $warning;
	    }

	    return null;
    }

    /**
     * Check data cached
     */
    protected function check_cache( $username, $token, $method, $count )
    {
    	// delete_option($this->cache_key);

        $now         = current_time('timestamp');
        $expire      = 60 * 60 * 24;

        $temp_cached = array();
        $data_cached = get_option( $this->cache_key );

        if( empty($data_cached) )
        {
            $data_cached = array();
        }

        $update_feed = false;
        $add_feed    = true;

        if ( !empty( $data_cached ) && is_array( $data_cached ) )
        {
            foreach ( $data_cached as $data )
            {
                if ( $data['username'] == $username )
                {
                    if ( count( $data['feed'] ) >= $count )
                    {
                        if ( $data['time'] > ($now - $expire) )
                        {
                            // !expired
                            $this->render_content( $data['feed'] );
                        } else {
                            // expired
                            $update_feed = true;
                            $data_scrap = $this->scrap_data( $username, $token, $method, $count );

                            if ( !empty( $data_scrap ) )
                            {
                                $data['feed'] = $data_scrap;
                                $data['time'] = current_time('timestamp');
                            }

                            $this->render_content( $data['feed'] );
                        }
                    } else {

                        $update_feed = true;
                        $data_scrap = $this->scrap_data( $username, $token, $method, $count );

                        if ( !empty( $data_scrap ) )
                        {
                            $data['feed'] = $data_scrap;
                            $data['time'] = current_time('timestamp');
                        }

                        $this->render_content( $data['feed'] );

                    }

                    $add_feed = false;
                }

                $temp_cached[] = $data;
            }

        }

        if ( $add_feed )
        {
            $data_scrap = $this->scrap_data( $username, $token, $method, $count );

            if ( !empty( $data_scrap ) )
            {
                $array[] = array(
                    'username' => $username,
                    'time'     => current_time('timestamp'),
                    'feed'     => $data_scrap,
                );

                $array = array_merge( $data_cached, $array );

                update_option( $this->cache_key, $array );

                $this->render_content( $data_scrap );
            }
        }

        if ( $update_feed )
        {
            update_option( $this->cache_key, $temp_cached );
        }
    }

    /**
     * Generate URl for Scrape
     *
     * @param  string
     * @param  string
     *
     * @return string
     *
     */
    public function get_url( $username, $token, $method, $max_id )
    {
	    $username = str_replace( '@', '', $username );

	    if ( $method === 'username' )
	    {
		    return 'https://www.instagram.com/' . $username;
	    } else {
		    if ( empty( $max_id ) )
		    {
			    return 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $token . '&count=12';
		    } else {
			    return 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $token . '&count=12&max_id=' . $max_id;
		    }
	    }
    }

    /**
     * Generate element for Instagram feed
     */
    public function generate_element($echo = true)
    {
        $follow_button = '';

        if ( $follow_button_option = $this->follow )
        {
            $follow_button =
                "<h3 class='jeg_instagram_heading'>
                    <a href='//www.instagram.com/{$this->username}' {$this->newtab}>
                        <i class='fa fa-instagram'></i>
                        " . esc_html( $follow_button_option ) . "
                    </a>
                </h3>";
        }

        $this->check_cache( $this->username, $this->token, $this->method, $this->count );

        $output = "<div class='jeg_instagram_feed clearfix'>
                        {$follow_button}
                        <ul class='instagram-pics instagram-size-large col{$this->column} {$this->hover}'>{$this->content}</ul>
                    </div>";

        if($echo) {
            echo jnews_sanitize_output( $output );
        }

        return $output;
    }

}
