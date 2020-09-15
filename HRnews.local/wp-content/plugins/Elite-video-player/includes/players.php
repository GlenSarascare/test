<div class="wrap">
	<h2>Manage Players
		<a href='<?php echo admin_url( "admin.php?page=elite_player_admin&action=add_new" ); ?>' class='add-new-h2'>Add New</a>
	</h2>
	
	<table class='players-table wp-list-table widefat fixed'>
		<thead>
			<tr>
				<th width='5%'>ID</th>
				<th width='50%'>Name</th>
				<th width='30%'>Actions</th>
				<th width='20%'>Shortcode</th>						
			</tr>
		</thead>
		<tbody>
			<?php 
				
				$elite_players = get_option("elite_players");

				if (count($elite_players) == 0) {
					echo '<tr>'.
							 '<td colspan="100%">No players found.</td>'.
						 '</tr>';
				} else {
					$elite_player_display_name;
					
					foreach ($elite_players as $elite_player) {
						$elite_player_display_name = $elite_player["instanceName"];
						if(!$elite_player_display_name) {
							$elite_player_display_name = 'Player #' . $elite_player["id"] . ' (no name)';
						}
						echo '<tr>'.
								'<td>' . $elite_player["id"] . '</td>'.								
								'<td>' . '<a href="' . admin_url('admin.php?page=elite_player_admin&action=edit&playerId=' . $elite_player["id"]) . '" title="Edit">'.$elite_player_display_name.'</a>' . '</td>'.
								'<td>' . '<a href="' . admin_url('admin.php?page=elite_player_admin&action=edit&playerId=' . $elite_player["id"]) . '" title="Edit this player">Edit</a> | '.									  
										 '<a href="' . admin_url('admin.php?page=elite_player_admin&action=delete&playerId='  . $elite_player["id"]) . '" title="Delete player permanently" >Delete</a> | '.
										 '<a href="' . admin_url('admin.php?page=elite_player_admin&action=duplicate&playerId='  . $elite_player["id"]) . '" title="Duplicate player" >Duplicate</a>'.
								'</td>'.
								'<td>[Elite_video_player  id="' . $elite_player["id"] . '"]</td>'.															
							'</tr>';
					}
				}
			?>
		</tbody>		 
	</table>

	<p>			
		<a class='button-primary' href='<?php echo admin_url( "admin.php?page=elite_player_admin&action=add_new" ); ?>'>Create New Player</a> 
		<a class='button-primary' href='<?php echo admin_url( "admin.php?page=elite_player_admin&action=delete_all" ); ?>'>Delete All Players</a>		
	</p>    
	
	<p></p>
    
    
    <br/>
	<br/>
	<br/>
	<h3>Import / Export</h3>
	<div>
		<a class='button-secondary' href='<?php echo admin_url( "admin.php?page=elite_player_admin&action=generate_json" ); ?>'>Export (Generate JSON)</a>
	</div>

	</p>    
	
	<form method="post" enctype="multipart/form-data" action="admin.php?page=elite_player_admin&amp;action=import_from_json_confirm">
	
		<?php 
				if (isset($_GET['action']) && $_GET['action'] == "generate_json") {
					echo '<textarea id="elite_player-admin-json" rows="20" cols="100" >' . json_encode($elite_players) . '</textarea>';
				}
			?>
			<br/>
			<br/>
			<br/>
			<p>Import players from JSON( overwrite existing players)</p>
			
			<textarea name="players" id="elite_player-admin-json" rows="20" cols="100" placeholder="Paste JSON here"></textarea>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button save-button button-secondary" value="Import"></p>
	
	</form>
</div>