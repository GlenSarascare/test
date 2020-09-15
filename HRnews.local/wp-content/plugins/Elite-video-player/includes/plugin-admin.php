<?php
	$elite_players = get_option("elite_players");

	if(!$elite_players){
		$elite_players = array();
		add_option("elite_players", $elite_players);
	}

	function read_elite_player_admin_init(){

	}
	add_action("admin_init", "read_elite_player_admin_init");
	
	function read_elite_player_admin_menu(){
		add_options_page("Elite Video Player Admin", "Elite Video Player", "manage_options", "elite_player_admin", "elite_player_admin");
		add_menu_page("Elite Video Player Admin", "Elite Video Player", "manage_options", "elite_player_admin", "elite_player_admin",'dashicons-video-alt3');		
	}
	add_action("admin_menu", "read_elite_player_admin_menu");
	
	//options page
	function elite_player_admin()
    {
		$current_action = "";
		// handle action from url
		if (isset($_GET['action']) ) {
			$current_action = $_GET['action'];
		}

		$elite_players = get_option("elite_players");
		if (isset($_GET['playerId']) )
		{
			$current_id = $_GET['playerId'];
			$elite_player = $elite_players[$current_id];
			$videos = $elite_player["videos"];
		}
		// $current_id = $_GET['playerId'];
		// $elite_player = $elite_players[$current_id];
		// $videos = $elite_player["videos"];
		
		// if(isset($current_action))
			// trace("isset");
		// else 
			// trace("notset");
		switch( $current_action ) {
		
			case 'edit':
				include("edit-player.php");
				break;
				
			case 'delete':
				//delete new_elite_player with id from url
				unset($elite_players[$current_id]);
				update_option("elite_players", $elite_players);
				include("players.php");
				break;
			
			case 'delete_all':
				update_option("elite_players", array());
				include("players.php");
				break;	
			
			case 'duplicate':
				$highest_id = 0;
				foreach ($elite_players as $elite_player) {
					$duplicate_id = $elite_player["id"];
					if($duplicate_id > $highest_id) {
						$highest_id = $duplicate_id;
					}
				}
				$new_id = $highest_id + 1;
				$elite_players[$new_id] = $elite_players[$current_id];
				$elite_players[$new_id]["id"] = $new_id;
				$elite_players[$new_id]["instanceName"] = $elite_players[$current_id]["instanceName"]." (copy)";
				update_option("elite_players", $elite_players);
				include("players.php");
				break;	
			case 'add_new':
				//generate ID 
				$new_id = 0;
				$highest_id = 0;
				foreach ($elite_players as $elite_player) {
					$player_id = $elite_player["id"];
					if($player_id > $highest_id) {
						$highest_id = $player_id;
					}
				}
				$current_id = $highest_id + 1;
				//create new elite player 
				$new_elite_player = array(	'id' => $current_id, 
										"instanceName" => "Player " . $current_id,
										"videos" => array()
						);
				$elite_players[$current_id] = $new_elite_player;
				update_option("elite_players", $elite_players);
				include("edit-player.php");
				break;
				
			case 'save_settings':
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

				//convert values to boolean and integer where needed
				$formatted = array_map("elite_cast", $elite_players[$current_id]);
				// stripslashes($players[$current_id]["embedCode"]);
					// trace($players[$current_id]["embedCode"]);
					// trace (stripslashes($players[$current_id]["embedCode"]));
				
				$elite_players[$current_id] = $formatted;
				//for each video
				for($i = 0; $i < count($elite_players[$current_id]["videos"]); $i++){
					$p = $elite_players[$current_id]["videos"][$i];
				}
				update_option("elite_players", $elite_players);
				include("edit-player.php");
				break;

            
            case 'import_from_json_confirm':

				$json = stripslashes($_POST['players']);


				if((string)$json != "" ){

					$newPlayers = elite_objectToArray(json_decode($json));

					update_option('elite_players', $newPlayers);
				}
				
				include("players.php");
				break;
                
                
                
			default:
				include("players.php");
				break;
				
		}
    }
	
	function elite_cast($n)
	{
		if($n === "true") {
			return true;
		}else if ($n === "false"){
			return false;
		}else if(is_numeric($n)){
			// return (int)$n;
			return floatval($n);
		}else{
			return $n;
		}
	}
    
    function elite_objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}

		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}	