<div id="origincode_videogallery" style="display:none;">
	<h3><?php _e( "Select OriginCode Video Gallery to insert into post" ); ?></h3>
	<?php
	$change_view_nonce = wp_create_nonce('origincode_gallery_video_shortecode_change_view_nonce');
	$insert_shortecode_nonce = wp_create_nonce('origincode_gallery_video_insert_shortecode');
	if ( count( $shortcodevideogallerys ) ) {
		echo "<select id='origincode_videogallery-select' data-change-view-nonce='".$change_view_nonce."'>";
		foreach ( $shortcodevideogallerys as $shortcodevideogallery ) {
			echo "<option value='" . $shortcodevideogallery->id . "'>" . $shortcodevideogallery->name . "</option>";
		}
		echo "</select>";
		echo "<button class='button button-primary' id='origincodevideogalleryinsert' data-insert-shortecode-nonce='".$insert_shortecode_nonce."'>Insert Video Gallery</button>";
	} else {
		echo "No slideshows found", "origincode_videogallery";
	}
	?>
	<div id="videogallery-unique-options" class="postbox">
		<h3>Current Video Gallery Options</h3>
		<ul id="videogallery-unique-options-list">
			<li>
				<label for="origincode_sl_effects">Views</label>
				<select name="origincode_sl_effects" id="origincode_sl_effects">
					<option <?php if ( $row->origincode_sl_effects == '0' ) {
						echo 'selected';
					} ?> value="0"><?php _e('Video Gallery/Content-Popup', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '1' ) {
						echo 'selected';
					} ?> value="1"><?php _e('Content Video Slider', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '5' ) {
						echo 'selected';
					} ?> value="5"><?php _e('Lightbox-Video Gallery', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '3' ) {
						echo 'selected';
					} ?> value="3"><?php _e('Video Slider', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '4' ) {
						echo 'selected';
					} ?> value="4"><?php _e('Thumbnails View', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '6' ) {
						echo 'selected';
					} ?> value="6"><?php _e('Justified', 'gallery-video');?>
					</option>
					<option <?php if ( $row->origincode_sl_effects == '7' ) {
						echo 'selected';
					} ?> value="7"><?php _e('Blog Style Gallery', 'gallery-video');?>
					</option>
                    <option <?php if ( $row->origincode_sl_effects == '8' ) {
                        echo 'selected';
                    } ?> value="8"><?php _e('Playlist Gallery', 'gallery-video');?>
                    </option>
				</select>
			</li>
			<div id="videogallery-current-options-0"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 0 ) {
				     echo ' active';
			     } ?>">
				<ul id="view4">
					<li>
						<label for="display_type"><?php _e('Displaying Content', 'gallery-video');?></label>
						<select id="display_type" name="display_type">
							<option <?php if ( $row->display_type == 0 ) {
								echo 'selected';
							} ?> value="0"><?php _e('Pagination', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 1 ) {
								echo 'selected';
							} ?> value="1"><?php _e('Load More', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 2 ) {
								echo 'selected';
							} ?> value="2"><?php _e('Show All', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li id="content_per_page">
						<label for="content_per_page"><?php _e('Videos Per Page', 'gallery-video');?></label>
						<input type="number" name="content_per_page" id="content_per_page"
						       value="<?php echo $row->content_per_page; ?>" class="text_area"/>
					</li>
				</ul>
			</div>
			<div id="videogallery-current-options-3"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 3 ) {
				     echo ' active';
			     } ?>">
				<ul id="slider-unique-options-list">
					<li>
						<label for="sl_width"><?php _e('Width', 'gallery-video');?></label>
						<input type="number" name="sl_width" id="sl_width" value="<?php echo $row->sl_width; ?>"
						       class="text_area"/>
					</li>
					<li>
						<label for="sl_height"><?php _e('Height', 'gallery-video');?></label>
						<input type="number" name="sl_height" id="sl_height" value="<?php echo $row->sl_height; ?>"
						       class="text_area"/>
					</li>
					<li>
						<label for="pause_on_hover"><?php _e('Pause on hover', 'gallery-video');?></label>
						<input type="checkbox" name="pause_on_hover" value="<?php echo $row->pause_on_hover; ?>"
						       id="pause_on_hover" <?php if ( $row->pause_on_hover == 'on' ) {
							echo 'checked="checked"';
						} ?> />
					</li>
					<li>
						<label for="videogallery_list_effects_s"><?php _e('Effects', 'gallery-video');?></label>
						<select name="videogallery_list_effects_s" id="videogallery_list_effects_s">
							<option <?php if ( $row->videogallery_list_effects_s == 'none' ) {
								echo 'selected';
							} ?> value="none"><?php _e('None', 'gallery-video');?>
							</option>
							<option <?php if ( $row->videogallery_list_effects_s == 'cubeH' ) {
								echo 'selected';
							} ?> value="cubeH"><?php _e('Cube Horizontal', 'gallery-video');?>
							</option>
							<option <?php if ( $row->videogallery_list_effects_s == 'cubeV' ) {
								echo 'selected';
							} ?> value="cubeV"><?php _e('Cube Vertical', 'gallery-video');?>
							</option>
							<option <?php if ( $row->videogallery_list_effects_s == 'fade' ) {
								echo 'selected';
							} ?> value="fade"><?php _e('Fade', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li>
						<label for="sl_pausetime"><?php _e('Pause time', 'gallery-video');?></label>
						<input type="number" name="sl_pausetime" id="sl_pausetime"
						       value="<?php echo esc_attr($row->description); ?>" class="text_area"/>
					</li>
					<li>
						<label for="sl_changespeed"><?php _e('Change speed', 'gallery-video');?></label>
						<input type="number" name="sl_changespeed" id="sl_changespeed"
						       value="<?php echo esc_attr($row->param); ?>" class="text_area"/>
					</li>
					<li>
						<label for="slider_position"><?php _e('Slider Position', 'gallery-video');?></label>
						<select name="sl_position" id="slider_position">
							<option <?php if ( $row->sl_position == 'left' ) {
								echo 'selected';
							} ?> value="left"><?php _e('Left', 'gallery-video');?>
							</option>
							<option <?php if ( $row->sl_position == 'right' ) {
								echo 'selected';
							} ?> value="right"><?php _e('Right', 'gallery-video');?>
							</option>
							<option <?php if ( $row->sl_position == 'center' ) {
								echo 'selected';
							} ?> value="center"><?php _e('Center', 'gallery-video');?>
							</option>
						</select>
					</li>
				</ul>
			</div>
			<div id="videogallery-current-options-4"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 4 ) {
				     echo ' active';
			     } ?>">
				<ul id="view4">
					<li>
						<label for="display_type"><?php _e('Displaying Content', 'gallery-video');?></label>
						<select id="display_type" name="display_type">
							<option <?php if ( $row->display_type == 0 ) {
								echo 'selected';
							} ?> value="0"><?php _e('Pagination', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 1 ) {
								echo 'selected';
							} ?> value="1"><?php _e('Load More', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 2 ) {
								echo 'selected';
							} ?> value="2"><?php _e('Show All', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li id="content_per_page">
						<label for="content_per_page"><?php _e('Videos Per Page', 'gallery-video');?></label>
						<input type="number" name="content_per_page" id="content_per_page"
						       value="<?php echo $row->content_per_page; ?>" class="text_area"/>
					</li>
				</ul>
			</div>
			<div id="videogallery-current-options-5"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 5 ) {
				     echo ' active';
			     } ?>">
				<ul id="view4">
					<li>
						<label for="display_type"><?php _e('Displaying Content', 'gallery-video');?></label>
						<select id="display_type" name="display_type">
							<option <?php if ( $row->display_type == 0 ) {
								echo 'selected';
							} ?> value="0"><?php _e('Pagination', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 1 ) {
								echo 'selected';
							} ?> value="1"><?php _e('Load More', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 2 ) {
								echo 'selected';
							} ?> value="2"><?php _e('Show All', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li id="content_per_page">
						<label for="content_per_page"><?php _e('Videos Per Page', 'gallery-video');?></label>
						<input type="number" name="content_per_page" id="content_per_page"
						       value="<?php echo esc_attr($row->content_per_page); ?>" class="text_area"/>
					</li>
				</ul>
			</div>
			<div id="videogallery-current-options-6"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 6 ) {
				     echo ' active';
			     } ?>">
				<ul id="view4">
					<li>
						<label for="display_type"><?php _e('Displaying Content', 'gallery-video');?></label>
						<select id="display_type" name="display_type">
							<option <?php if ( $row->display_type == 0 ) {
								echo 'selected';
							} ?> value="0"><?php _e('Pagination', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 1 ) {
								echo 'selected';
							} ?> value="1"><?php _e('Load More', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 2 ) {
								echo 'selected';
							} ?> value="2"><?php _e('Show All', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li id="content_per_page">
						<label for="content_per_page"><?php _e('Videos Per Page', 'gallery-video');?></label>
						<input type="number" name="content_per_page" id="content_per_page"
						       value="<?php echo esc_attr($row->content_per_page); ?>" class="text_area"/>
					</li>
				</ul>
			</div>
			<div id="videogallery-current-options-7"
			     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 7 ) {
				     echo ' active';
			     } ?>">
				<ul id="view7">
					<li>
						<label for="display_type"><?php _e('Displaying Content', 'gallery-video');?></label>
						<select id="display_type" name="display_type">
							<option <?php if ( $row->display_type == 0 ) {
								echo 'selected';
							} ?> value="0"><?php _e('Pagination', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 1 ) {
								echo 'selected';
							} ?> value="1"><?php _e('Load More', 'gallery-video');?>
							</option>
							<option <?php if ( $row->display_type == 2 ) {
								echo 'selected';
							} ?> value="2"><?php _e('Show All', 'gallery-video');?>
							</option>
						</select>
					</li>
					<li id="content_per_page">
						<label for="content_per_page"><?php _e('Videos Per Page', 'gallery-video');?></label>
						<input type="number" name="content_per_page" id="content_per_page"
						       value="<?php echo esc_attr($row->content_per_page); ?>" class="text_area"/>
					</li>
				</ul>
			</div>
		</ul>
	</div>
</div>