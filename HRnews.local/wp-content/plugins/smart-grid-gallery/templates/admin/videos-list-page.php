<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wpdb;
$origincode_origincode_gallery_video_nonce_add_origincode_gallery_video = wp_create_nonce( 'origincode_origincode_gallery_video_nonce_add_origincode_gallery_video' );
$protocol                                      = stripos( $_SERVER['SERVER_PROTOCOL'], 'https' ) === true ? 'https://' : 'http://';
$add_video_nonce                               = wp_create_nonce( 'origincode_gallery_nonce_add_video' );
?>

	<div class="wrap">
		<?php require( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'banner-head.php' ); ?>
		<?php
		$path_site2                    = plugins_url( "../images", __FILE__ );
		$origincode_gallery_video_save_data_nonce = wp_create_nonce( 'origincode_gallery_video_save_data_nonce' . $row->id );
		?>
		<div style="clear: both;"></div>
		<form action="admin.php?page=video_galleries_origincode_video_gallery&id=<?php echo $row->id; ?>&save_data_nonce=<?php echo esc_attr($origincode_gallery_video_save_data_nonce);?>" method="post"
		      name="adminForm" id="adminForm" class="gallery_tabs">

			<div id="poststuff">
				<div id="videogallery-header">
					<ul id="videogallerys-list">
						<?php
						foreach ( $rowsld as $rowsldires ) {
							if ( $rowsldires->id != $row->id ) {
								?>
								<li>
									<a href="#"
									   onclick="window.location.href='admin.php?page=video_galleries_origincode_video_gallery&task=edit_cat&id=<?php echo esc_attr($rowsldires->id); ?>'"><?php echo $rowsldires->name; ?></a>
								</li>
								<?php
							} else { ?>
								<li class="active fixed-tabs"
								    onclick='document.getElementById("name").style.width = ((document.getElementById("name").value.length + 1) * 8) + "px"'>
                                    <div class="hg_cut_border">
                                        <div class="hg_cut_inl_border"></div>
                                    </div>

                                    <span style="display: none"><?php echo esc_html(stripslashes($style_theme->name));?></span>
									<input class="text_area"
									       onfocus=""
									       onkeyup="name_changeTop(this)"
                                           type="text" name="name" id="name"
									       value="<?php echo esc_html( stripslashes( $row->name ) ); ?>"
                                           maxlength="250"
                                           style="background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL . '/admin_images/edit.png'; ?>) no-repeat #f3f4f8;" />
								</li>
								<?php
							}
						}
						?>
						<li class="add-new">
							<a onclick="window.location.href='admin.php?page=video_galleries_origincode_video_gallery&amp;task=add_cat&origincode_origincode_gallery_video_nonce_add_origincode_gallery_video=<?php echo esc_attr($origincode_origincode_gallery_video_nonce_add_origincode_gallery_video); ?>'">+</a>
						</li>
					</ul>
				</div>
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<?php add_thickbox(); ?>
						<div id="post-body">
							<div id="post-body-heading">
								<h3>Videos List</h3>
								<a href="#TB_inline?width=700&height=500&inlineId=origincode_origincode_gallery_video_add_videos"
								    class=" add-video-slide thickbox"
									data-add-video-nonce="<?php echo esc_attr($add_video_nonce); ?>"
								   data-videogallery-id="<?php echo $row->id; ?>">
									<span class="wp-media-buttons-icon"></span><?php _e('Add New Video','gallery-video'); ?>
								</a>
							</div>
							<ul id="images-list">
								<?php
								function get_youtube_id_from_url( $url ) {
									if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match ) ) {
										return $match[1];
									}
								}

								$i  = 2;
								foreach ( $rowim as $key => $rowimages ) { ?>
									<?php
									switch ( $rowimages->sl_type ) {
										case 'video':
											$origincode_gallery_video_nonce_remove_video = wp_create_nonce( 'origincode_gallery_video_nonce_remove_video' . $rowimages->id );
											$origincode_gallery_video_nonce_edit_video = wp_create_nonce( 'origincode_gallery_video_nonce_edit_video' . $rowimages->id );
											?>
											<li <?php if ( $i % 2 == 0 ) {
												echo "class='has-background'";
											}
											$i ++; ?> >
												<input class="order_by" type="hidden"
												       name="order_by_<?php echo $rowimages->id; ?>"
												       value="<?php echo esc_attr( stripslashes( $rowimages->ordering ) ); ?>"/>
												<?php
												if ( empty( $rowimages->thumb_url ) ) {
													if ( strpos( $rowimages->image_url, 'youtube' ) !== false || strpos( $rowimages->image_url, 'youtu' ) !== false ) {
														$liclass         = "youtube";
														$video_thumb_url = get_youtube_id_from_url( $rowimages->image_url );
														$thumburl        = '<img src="//img.youtube.com/vi/' . $video_thumb_url . '/mqdefault.jpg" alt="" />';
													} else if ( strpos( $rowimages->image_url, 'vimeo' ) !== false ) {
														$liclass  = "vimeo";
														$vimeo    = $rowimages->image_url;
														$imgid    = explode( "/", $vimeo );
														$imgid    = end( $imgid );
														$hash     = @unserialize( wp_remote_fopen( $protocol . "vimeo.com/api/v2/video/" . $imgid . ".php" ) );
														$imgsrc   = $hash[0]['thumbnail_large'];
														$thumburl = '<img src="' . $imgsrc  . '" alt="" />';
													}
												} else {
													if ( strpos( $rowimages->image_url, 'youtube' ) !== false || strpos( $rowimages->image_url, 'youtu' ) !== false ) {
														$liclass = "youtube";
													} else if ( strpos( $rowimages->image_url, 'vimeo' ) !== false ) {
														$liclass = "vimeo";
													}
													$thumburl = '<img src="' .  $rowimages->thumb_url . '" alt="" />';
												}
												?>
												<div class="image-container">
													<div class="thumb_wrapper">
														<?php echo $thumburl; ?>
													</div>
													<div class="play-icon <?php echo esc_attr($liclass); ?>"></div>

													<div>
														<input type="hidden" name="imagess<?php echo $rowimages->id; ?>"
														       value="<?php echo esc_attr( stripslashes( $rowimages->image_url ) ); ?>"/>
														<input type="hidden" name="thumbs<?php echo $rowimages->id; ?>"
														       id="thumb_id<?php echo $rowimages->id; ?>"
														       value="<?php echo esc_attr( stripslashes( $rowimages->thumb_url ) ); ?>"
														       class="hg_chack_value"/>
														<div
															class="origincode-editnewuploader uploader button<?php echo $rowimages->id; ?> add-new-image">
															<input type="button"
															       class="editimgbutton thumb_id_button button<?php echo $rowimages->id; ?> wp-media-buttons-icon"
															       name="thumb_id_button<?php echo $rowimages->id; ?>"
															       id="thumb_id_button<?php echo $rowimages->id; ?>"
															       value="Set Custom Thumbnail"/>
															<div
																class="hg_set_def_button button def_thumb <?php if ( $rowimages->thumb_url == "" ) {
																	echo "hg_disp_none";
																} ?>">
																Set Default Thumbnail
															</div>
														</div>

													</div>
													<div class="hg_thumbneil_views">

														<div class="hg_report">
															<div class="hg_info_div">
																<div class="cb"></div>
																<div class="hg_view_count">
																	<span>Views Stats (Pro)</span>
																	<a href="#TB_inline?width=600&height=550&inlineId=html_videoorigincode_gallery_video_test"
																	   class="thickbox hg_open_pop_up">
																		<div class="hg-arrow-right"></div>
																		View Detailed Report</a>
																</div>
																<div class="cb"></div>
																<div id="html_videoorigincode_gallery_video_test"
																     style="display: none;">
																	<div class="hg_pop_up_div">
																		<img
																			src="<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL . '/admin_images/pop_pdf.png'; ?>"
																			alt="Download Full Version"/>
																		<h3>Sorry, this option is available in the full
																			version.</h3>
																		<a class="get_full_version_pdf"
																		   href="https://origincode.co/downloads/video-gallery/"
																		   target="_blank">
																			GET THE FULL VERSION
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="image-options">
													<div>
														<label
															for="titleimage<?php echo $rowimages->id; ?>">Title:</label>
														<input class="text_area" type="text"
														       id="titleimage<?php echo $rowimages->id; ?>"
														       name="titleimage<?php echo $rowimages->id; ?>"
														       id="titleimage<?php echo $rowimages->id; ?>"
														       value="<?php echo htmlspecialchars( str_replace( '__5_5_5__', '%', $rowimages->name ) ); ?>">
													</div>
													<div class="description-block">
														<label for="im_description<?php echo $rowimages->id; ?>">Description:</label>
														<textarea id="im_description<?php echo $rowimages->id; ?>"
														          name="im_description<?php echo $rowimages->id; ?>"><?php echo esc_html( stripslashes( str_replace( '__5_5_5__', '%', $rowimages->description ) ) ); ?></textarea>
													</div>
													<div class="link-block">
														<label for="sl_url<?php echo $rowimages->id; ?>">URL:</label>
														<input class="text_area url-input" type="text"
														       id="sl_url<?php echo $rowimages->id; ?>"
														       name="sl_url<?php echo $rowimages->id; ?>"
														       value="<?php echo esc_html( stripslashes( str_replace( '__5_5_5__', '%', $rowimages->sl_url ) ) ); ?>">
														<label class="long"
														       for="sl_link_target<?php echo $rowimages->id; ?>">
															<span>Open in new tab</span>
															<input type="hidden"
															       name="sl_link_target<?php echo $rowimages->id; ?>"
															       value="off"/>
															<input <?php if ( $rowimages->link_target == 'on' ) {
																echo 'checked="checked"';
															} ?> class="link_target" type="checkbox"
															     id="sl_link_target<?php echo $rowimages->id; ?>"
															     name="sl_link_target<?php echo $rowimages->id; ?>"
															     value="on"/>
														</label>
													</div>
													<div class="remove-image-container">
														<a class="button remove-image"
														   href="admin.php?page=video_galleries_origincode_video_gallery&task=apply&id=<?php echo $row->id; ?>&remove_video=<?php echo $rowimages->id; ?>&save_data_nonce=<?php echo $origincode_gallery_video_nonce_remove_video; ?>">Remove
															Video</a>
														<a href="#TB_inline?width=700&height=500&inlineId=origincode_origincode_gallery_video_edit_videos"
														   class="button button-primary edit-video thickbox"
														   data-video-url="<?php echo $rowimages->image_url; ?>"
														   data-gallery-video-id="<?php echo $row->id; ?>"
														   data-edit-video-nonce="<?php echo $origincode_gallery_video_nonce_edit_video; ?>"
														   data-video-id="<?php echo $rowimages->id; ?>">Edit Video</a>
														<?php if ( strpos( $rowimages->image_url, 'youtu' ) !== false ) : ?>
															<div class="video_slider_params"
															     style="display: none;margin-left: 16%;">
																<label
																	for="show_controls"><?php _e( 'Show Controls' ); ?></label>
																<input type="hidden" value="off"
																       name="show_controls<?php echo $rowimages->id; ?>">
																<input type="checkbox" id="show_controls"
																       name="show_controls<?php echo $rowimages->id; ?>"
																       value="on" <?php if ( $rowimages->show_controls == 'on' ) {
																	echo 'checked';
																} ?>>
															</div>
															<div class="video_slider_params" style="display: none;">
																<label
																	for="show_info"><?php _e( 'Show Info' ); ?></label>
																<input type="hidden" value="off"
																       name="show_info<?php echo $rowimages->id; ?>">
																<input type="checkbox" id="show_info"
																       name="show_info<?php echo $rowimages->id; ?>"
																       value="on" <?php if ( $rowimages->show_info == 'on' ) {
																	echo 'checked';
																} ?>>
															</div>
														<?php endif; ?>
													</div>
												</div>
												<div class=" clear">
												</div>
											</li>
											<?php
											break;
									} ?>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div id="postbox-container-1" class="postbox-container">
						<div id="side-sortables" class="meta-box-sortables ui-sortable">
							<div id="videogallery-unique-options" class="postbox">
								<h3 class="hndle"><span><?php _e('Video Gallery Custom Options', 'gallery-video');?></span></h3>
								<ul id="videogallery-unique-options-list">
									<li>
										<label for="origincode_videogallery_name"><?php _e('Name', 'gallery-video');?></label>
										<input type="text" name="name" id="origincode_videogallery_name"
										       value="<?php echo esc_html( stripslashes( $row->name ) ); ?>"
										       onkeyup="name_changeRight(this)">
									</li>
									<li>
										<label for="origincode_sl_effects"><?php _e('View', 'gallery-video');?></label>
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
                                            } ?> value="8">Playlist
                                            </option>
										</select>
									</li>
									<li id="videogallery-current-options-0"
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
												<input type="text" name="content_per_page" id="content_per_page"
												       value="<?php echo esc_html( stripslashes( $row->content_per_page ) ); ?>"
												       class="text_area"/>
											</li>
										</ul>
									</li>
									<li id="videogallery-current-options-1"
									     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 1 ) {
										     echo ' active';
									     } ?>">
										<ul>
											<li>
												<label for="sl_pausetime"><?php _e('Pause time', 'gallery-video');?></label>
												<input type="text" name="sl_pausetime" id="sl_pausetime"
												       value="<?php echo absint( $row->description ); ?>"
												       class="text_area"/>
											</li>
											<li>
												<label for="sl_changespeed"><?php _e('Change speed', 'gallery-video');?></label>
												<input type="text" name="sl_changespeed" id="sl_changespeed"
												       value="<?php echo absint( $row->param ); ?>"
												       class="text_area"/>
											</li>
											<li>
												<label for="pause_on_hover"><?php _e('Pause on hover', 'gallery-video');?></label>
												<input type="hidden" value="off" name="pause_on_hover"/>
												<input type="checkbox" name="pause_on_hover" value="on"
												       id="pause_on_hover" <?php if ( $row->pause_on_hover == 'on' ) {
													echo 'checked="checked"';
												} ?> />
											</li>
											<li>
												<label
													for="autoslide"><?php _e( 'Autoslide', 'gallery-video' ); ?></label>
												<input type="hidden" value="off" name="autoslide"/>
												<input type="checkbox" name="autoslide" value="on"
												       id="autoslide" <?php if ( $row->autoslide == 'on' ) {
													echo 'checked="checked"';
												} ?> />
											</li>
										</ul>
									</li>
									<li id="videogallery-current-options-3"
									     class="videogallery-current-options <?php if ( $row->origincode_sl_effects == 3 ) {
										     echo ' active';
									     } ?>">
										<ul id="slider-unique-options-list">
											<li>
												<label for="sl_width"><?php _e('Width', 'gallery-video');?></label>
												<input type="text" name="sl_width" id="sl_width"
												       value="<?php echo absint( $row->sl_width ); ?>"
												       class="text_area"/>
											</li>
											<li>
												<label for="sl_height"><?php _e('Height', 'gallery-video');?></label>
												<input type="text" name="sl_height" id="sl_height"
												       value="<?php echo absint( $row->sl_height ); ?>"
												       class="text_area"/>
											</li>
											<li>
												<label for="pause_on_hover"><?php _e('Pause on hover', 'gallery-video');?></label>
												<input type="hidden" value="off" name="pause_on_hover"/>
												<input type="checkbox" name="pause_on_hover" value="on"
												       id="pause_on_hover" <?php if ( $row->pause_on_hover == 'on' ) {
													echo 'checked="checked"';
												} ?> />
											</li>
											<li>
												<label for="videogallery_list_effects_s"><?php _e('Effects', 'gallery-video');?></label>
												<select name="videogallery_list_effects_s"
												        id="videogallery_list_effects_s">
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
												<input type="text" name="sl_pausetime" id="sl_pausetime"
												       value="<?php echo absint( $row->description ); ?>"
												       class="text_area"/>
											</li>
											<li>
												<label for="sl_changespeed"><?php _e('Change speed', 'gallery-video');?></label>
												<input type="text" name="sl_changespeed" id="sl_changespeed"
												       value="<?php echo absint( $row->param ); ?>"
												       class="text_area"/>
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
									</li>
									<li id="videogallery-current-options-4"
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
												<input type="text" name="content_per_page" id="content_per_page"
												       value="<?php echo esc_html( stripslashes( $row->content_per_page ) ); ?>"
												       class="text_area"/>
											</li>
										</ul>
									</li>
									<li id="videogallery-current-options-5"
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
												<input type="text" name="content_per_page" id="content_per_page"
												       value="<?php echo esc_html( stripslashes( $row->content_per_page ) ); ?>"
												       class="text_area"/>
											</li>
										</ul>
									</li>
									<li id="videogallery-current-options-6"
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
												<input type="text" name="content_per_page" id="content_per_page"
												       value="<?php echo esc_html( stripslashes( $row->content_per_page ) ); ?>"
												       class="text_area"/>
											</li>
										</ul>
									</li>
									<li id="videogallery-current-options-7"
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
												<input type="text" name="content_per_page" id="content_per_page"
												       value="<?php echo esc_html( stripslashes( $row->content_per_page ) ); ?>"
												       class="text_area"/>
											</li>
										</ul>
									</li>
									<!--<li>
										<label for="disable_related"><?php /*_e('Disable Related Videos', 'gallery-video' ); */?></label>
										<input type="checkbox" id="disable_related" name="disable_related" value="on" disabled>
										<a class="video-pro-link probuttonlink" href="https://origincode.co/downloads/video-gallery/" target="_blank"><span class="video-pro-icon"></span></a>
									</li>-->

                                    <li class="autoplay">

                                        <label for="autoplay"><?php _e('Pop-Up Autoplay', 'gallery-video' ); ?></label>
                                        <input type="checkbox" id="autoplay" name="autoplay" value="on" disabled>
                                        <a class="video-pro-link probuttonlink" href="https://origincode.co/downloads/video-gallery/" target="_blank"><span class="video-pro-icon"></span></a>

                                    </li>


                                </ul>
								<div id="major-publishing-actions">
									<div id="publishing-action">
										<input type="button" onclick="submitbutton('apply')" value="Save"
										       id="save-buttom" class="">
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div id="videogallery-shortcode-box" class="postbox shortcode ms-toggle">
								<h3 class="hndle"><span>Usage</span></h3>
								<div class="inside">
									<ul>
										<li rel="tab-1" class="selected">
											<h4>Shortcode</h4>
											<p><?php _e('Copy &amp; paste the shortcode directly into any WordPress post or
												page.', 'gallery-video');?></p>
											<textarea class="full"
											          readonly="readonly">[origincode_videogallery id="<?php echo $row->id; ?>"]</textarea>
										</li>
										<li rel="tab-2">
											<h4>Template Include</h4>
											<p><?php _e('Copy &amp; paste this code into a template file to include the slideshow
												within your theme.', 'gallery-video');?></p>
											<textarea class="full" readonly="readonly">&lt;?php echo do_shortcode("[origincode_videogallery id='<?php echo $row->id; ?>']"); ?&gt;</textarea>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="task" value=""/>
		</form>
	</div>
<?php
require_once( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'video-add-page.php' );
require_once( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'video-edit-page.php' );
?>