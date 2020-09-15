<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class JNews Initial Counter
 */
Class JNews_Social_Background_Process
{
    /**
     * Action
     *
     * (default value: 'background_process')
     *
     * @var string
     * @access protected
     */
    protected $action = 'jnews_social_background_process';

    /**
     * @var Integer
     */
    private $post_id;

    /**
     * @var array
     */
    private $result;

    /**
     * @var array
     */
    private $socials = array( 'facebook', 'twitter', 'linkedin', 'stumbleupon', 'pinterest', 'vk' );

    /**
     * @return array
     */
    public function get_connection_option() {
        return array(
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE
        );
    }

	public function fetch_data( $post_id ) {
		/**
		 * Set Post ID
		 */
		$this->post_id = $post_id;
        $response = array();

        // Get Social Share
        $socials = array(
            array(
                'social_share'  => 'facebook',
                'social_text'   => 'Share on Facebook'
            ),
            array(
                'social_share'   => 'twitter',
                'social_text'    => 'Share on Twitter'
            ),
            array(
                'social_share'   => 'pinterest',
                'social_text'    => ''
            ),
        );

        $secondary_socials = array(
            array(
                'social_share'   => 'googleplus',
            ),
            array(
                'social_share'  => 'linkedin',
            ),

        );

        $socials = jnews_get_option( 'single_social_share_main', $socials );
        $socials = array_merge( $socials, jnews_get_option('single_social_share_secondary', $secondary_socials) );

        foreach ( $socials as $social ) {
            $social_share   = $social[ 'social_share' ]; 
            if ( in_array( $social_share, $this->socials ) ) {
                $response[ $social_share ] = wp_remote_get(
                    $this->get_api_url( $social_share ),
                    array('timeout' => 10)
                );
                if ( is_array( $response[ $social_share ] ) ){
                    $this->populate_data( $response[ $social_share ][ 'body' ], $social_share );
                }    
            }
        }

		$this->save_result();

		return false;
	}

    /**
     * Save fetch result
     */
    protected function save_result()
    {
        // set last fetched social
        update_post_meta($this->post_id, JNEWS_SOCIAL_COUNTER_LAST_UPDATE, current_time( 'timestamp' ));

        if (array_sum($this->result) > 0)
        {
	        // set all share
	        update_post_meta($this->post_id, JNEWS_SOCIAL_COUNTER_ALL, $this->result);

	        // set total share
	        update_post_meta($this->post_id, JNEWS_SOCIAL_COUNTER_TOTAL, array_sum($this->result));
        }
    }


    /**
     * Populate data and save its result on array
     *
     * @todo fix facebook share counter, harus pake api nya dia skrng
     * @param $data
     * @param $url
     * @param $request_info
     * @param $service
     * @param $time
     */
    public function populate_data($data, $service)
    {
        $count = 0;

        switch($service) {
            case "facebook" :
                $data = json_decode($data);
                if ($data) {
                    $count = isset($data->og_object->engagement->count) ? $data->og_object->engagement->count : 0;
                }
                break;
            case "twitter" :
                $data = json_decode($data);
                $count = isset($data->count) ? $data->count : 0;
                break;
            case "linkedin" :
                $data = json_decode($data);
                $count = isset($data->count) ? $data->count : 0;
                break;
            case "stumbleupon" :
                $data = json_decode($data);
                isset($data->result->views) ? $count = $data->result->views : $count = 0;
                break;
            case "google" :
                preg_match( '/window\.__SSR = {c: ([\d]+)/', $data, $matches );
                if(isset($matches[0])) $count = str_replace( 'window.__SSR = {c: ', '', $matches[0] );
                break;
            case "pinterest" :
	            $data = str_replace(array('jnews(', ')'), '', $data);
	            $data = json_decode($data);
	            $count = isset($data->count) ? $data->count : 0;
                break;
            case "buffer" :
                $data = json_decode($data);
                $count = !empty($data) ? $data->shares : 0;
                break;
            case "vk" :
                preg_match('/^VK.Share.count\(\d+,\s+(\d+)\);$/i', $data, $matches);
                if($matches) $count = $matches[1];
                break;
        }

        $this->result[$service] = $count;
    }

    /**
     * Social API URL
     *
     * @param $social
     * @return string
     */
    protected function get_api_url($social)
    {
        $api_url = "";

        switch($social) {
            case "facebook" :
            	$fb_token = jnews_get_option('single_social_share_fb_token', '');
            	$fb_token = ! empty( $fb_token ) ? '&access_token=' . $fb_token : '';
                $api_url  = "https://graph.facebook.com/?fields=og_object{engagement}&id=" . $this->post_url() . $fb_token;
                break;
            case "twitter" :
                $api_url = "https://counts.twitcount.com/counts.php?url=" . $this->post_url();
                break;
            case "linkedin" :
                $api_url = "https://www.linkedin.com/countserv/count/share?format=json&url=" . $this->post_url();
                break;
            case "stumbleupon" :
                $api_url = "http://www.stumbleupon.com/services/1.01/badge.getinfo?url=" . $this->post_url();
                break;
            case "google" :
                $api_url = "https://plusone.google.com/_/+1/fastbutton?url=" . $this->post_url();
                break;
            case "pinterest" :
                $api_url = "https://api.pinterest.com/v1/urls/count.json?callback=jnews&url=" . $this->post_url();
                break;
            case "buffer" :
                $api_url = "https://api.bufferapp.com/1/links/shares.json?url=" . $this->post_url();
                break;
            case "vk" :
                $api_url = "https://vk.com/share.php?act=count&index=1&url=" . $this->post_url();
                break;
        }

        return $api_url;
    }


    /**
     * Get Post URL
     *
     * @return string
     */
    protected function post_url()
    {
        return apply_filters('jnews_social_counter_post_url', rawurlencode(get_permalink($this->post_id)));
    }
}
