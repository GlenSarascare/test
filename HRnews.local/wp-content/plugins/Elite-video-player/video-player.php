<?php

	/*
	Plugin Name: Elite Video Player
	Plugin URI: http://codecanyon.net/item/elite-video-player-wordpress-plugin/10496434
	Description: Elite Video Player
	Version: 6.2
	Author: _CreativeMedia_
	Author URI: http://codecanyon.net/user/_CreativeMedia_
	*/

	//define( 'WP_DEBUG', true );
	define('ELITE_PLAYER_DIR', plugin_dir_url( __FILE__ ));
	define('ELITE_PLAYER_VERSION', '6.2');
	
	function elite_vp_trace($var){
		echo("<pre style='background:#fcc;color:#000;font-size:12px;font-weight:bold'>");
		print_r($var);
		echo("</pre>");
	}

	if(!is_admin()) {
		include("includes/plugin-frontend.php");
	}
	else {
		include("includes/plugin-admin.php");
		register_deactivation_hook( __FILE__, "deactivate_elite_player");
		add_filter("plugin_action_links_" . plugin_basename(__FILE__), "elite_player_admin_link");
		
		add_action( 'wp_ajax_elite_save', 'elite_save_callback' );
		add_action( 'wp_ajax_nopriv_elite_save', 'elite_save_callback' );
        
        add_action( 'wp_default_scripts', 'wp_default_custom_scripts' );
	}
	
	function elite_player_admin_link($links) {
		array_unshift($links, '<a href="' . get_admin_url() . 'options-general.php?page=elite_player_admin">Admin</a>');
		return $links;
	}
	
    function wp_default_custom_scripts( $scripts ){
		$scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.js", array( 'iris' ), false, 1 );
		did_action( 'init' ) && $scripts->localize(
			'wp-color-picker',
			'wpColorPickerL10n',
			array(
				'clear'            => __( 'Clear' ),
				'clearAriaLabel'   => __( 'Clear color' ),
				'defaultString'    => __( 'Default' ),
				'defaultAriaLabel' => __( 'Select default color' ),
				'pick'             => __( 'Select Color' ),
				'defaultLabel'     => __( 'Color value' ),
			)
		);
	}
    
	function deactivate_elite_player() {
		//delete_option("elite_players");
	}
	
	function elite_save_callback() {

		$current_id = $page_id = '';
		// handle action from url

		$elite_players = get_option("elite_players");
		if (isset($_GET['playerId']) )
		{
			$current_id = $_GET['playerId'];
			$elite_player = $elite_players[$current_id];
			$videos = $elite_player["videos"];
		}

		foreach ($elite_players as $elite_player) {
					$player_id = $elite_player["id"];

				}

		add_option("elite_players", $elite_players);
		
		update_option("elite_players", $elite_players);

		$new = array_merge($elite_player, $_POST);
		$elite_players[$current_id] = $new;
        
        
                //reset indexes because of sortable videos can be rearranged
				$oldvideos = $elite_players[$current_id]["videos"];
				$newvideos = array();
				$index = 0;
				foreach($oldvideos as $p){
					$newvideos[$index] = $p;
					$index++;
				}
				$elite_players[$current_id]["videos"] = $newvideos;


		$elite_players[$current_id]['status'] = 'published';
						
		update_option("elite_players", $elite_players);

		echo json_encode($new);

		wp_die(); // this is required to terminate immediately and return a proper response
		
		

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	