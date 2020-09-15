<?php $upload_preview_wrapper = $wrapper = isset( $wrapper ) && ! empty( $wrapper ) ? $wrapper : 'upload_preview_container'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="jeg_upload_wrapper <?php echo esc_attr( $class ); ?>">

	<?php if ( apply_filters( 'jnews_enable_upload', true ) ): ?>
        <div class="<?php echo esc_attr( $upload_preview_wrapper ); ?>">
            <ul>
				<?php

				if ( $source && is_array( $source ) ) {
					$output = '';

					foreach ( $source as $item ) {
						$image = wp_get_attachment_image_src( $item, apply_filters( 'jnews_upload_preview_size', 'thumbnail' ) );

						if ( $image ) {
							$output .=
								"<li>
                                <input type='hidden' name='{$name}[]' value='" . esc_attr( $item ) . "'>
                                <img src='" . esc_url( $image[0] ) . "'>
                                <div class='remove'></div>
                            </li>";
						}
					}

					echo jnews_sanitize_by_pass( $output );
				}
				?>
            </ul>
        </div>
        <div id="<?php echo esc_attr( $button ); ?>" class="btn btn-default btn-sm btn-block-xs">
            <i class="fa fa-folder-open-o"></i>
            <span><?php jnews_print_translation( 'Choose Image', 'jnews', 'choose_image' ); ?></span>
        </div>
	<?php else: ?>
		<?php echo apply_filters( 'jnews_enable_upload_msg', '' ); ?>
	<?php endif ?>

</div>

<?php if ( apply_filters( 'jnews_enable_upload', true ) ): ?>
    <script>
        (function ($) {
            $(document).on('ready', function() {
                var file_frame;

                $('#<?php echo esc_js( $button ); ?>').on('click', function (event) {
                    event.preventDefault();

                    if (file_frame) {
                        file_frame.open();
                        return;
                    }

                    file_frame = wp.media.frames.file_frame = wp.media({
                        title: '<?php echo esc_html__( 'Add Media', 'jnews' ); ?>',
                        button: {
                            text: '<?php jnews_print_translation( 'Insert', 'jnews', 'insert_media' ); ?>',
                        },
                        library: {
                            type: <?php $type = isset( $type ) && ! empty( $type ) ? $type : ''; echo json_encode( jnews_sanitize_by_pass( $type ) ); ?>
                        },
                        multiple: <?php $multi = $multi ? 'true' : 'false'; echo jnews_sanitize_by_pass( $multi ); $multi = $multi === 'true' ? true : false;  ?>
                    });

                    file_frame.on('select', function () {
                        var output = '',
                            attachment = file_frame.state().get('selection').toJSON();

                        for (var i = 0; i < attachment.length; i++) {
                            output +=
                                "<li>" +
                                "<input type='hidden' name='<?php echo esc_attr( $name ); ?>[]' value='" + attachment[i]['id'] + "'>" +
                                "<img src=" + attachment[i]['url'] + ">" +
                                "<div class='remove'></div>" +
                                "</li>";
                        }


						<?php if ( $multi ): ?>
                        $('.<?php echo esc_attr( $upload_preview_wrapper ); ?> ul').append(output);
						<?php else: ?>
                        $('.<?php echo esc_attr( $upload_preview_wrapper ); ?> ul').html(output);
						<?php endif ?>
                    });

                    file_frame.open();
                });

                $('#<?php echo esc_js( $id ); ?>').find(".<?php echo esc_attr( $upload_preview_wrapper ); ?>").on('click', '.remove', function () {
                    var parent = $(this).parent();
                    $(parent).fadeOut(function () {
                        $(this).remove();
                    });
                });

                $('#<?php echo esc_js( $id ); ?>').find('.<?php echo esc_attr( $upload_preview_wrapper ); ?> ul').sortable();
            });
        })(jQuery);
    </script>
<?php endif ?>
