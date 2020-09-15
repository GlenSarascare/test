<?php
	$authors = [];
	$post_id = get_the_ID();
	$socials = [
		'url'        => 'fa-globe',
		'facebook'   => 'fa-facebook-official',
		'twitter'    => 'fa-twitter',
		'linkedin'   => 'fa-linkedin',
		'pinterest'  => 'fa-pinterest',
		'behance'    => 'fa-behance',
		'github'     => 'fa-github',
		'flickr'     => 'fa-flickr',
		'tumblr'     => 'fa-tumblr',
		'dribbble'   => 'fa-dribbble',
		'soundcloud' => 'fa-soundcloud',
		'instagram'  => 'fa-instagram',
		'vimeo'      => 'fa-vimeo',
		'youtube'    => 'fa-youtube-play',
		'vk'         => 'fa-vk',
		'reddit'     => 'fa-reddit',
		'weibo'      => 'fa-weibo',
		'rss'        => 'fa-rss',
	];

	if ( function_exists( 'get_coauthors' ) ) {

		$coauthors = get_coauthors( $post_id );

		if ( $coauthors && is_array( $coauthors ) ) {

			foreach ( $coauthors as $coauthor ) {

				$coauthor_type = false;

				// Need to check if the user is 'guest-author'
				if ( isset( $coauthor->type ) && 'guest-author' === $coauthor->type ) {
					$coauthor_type = 'guest-author';
				}

				$authors[] = [
					'id'   => $coauthor->ID,
					'name' => $coauthor_type ? $coauthor->display_name : get_the_author_meta( 'display_name', $coauthor->ID ),
					'url'  => $coauthor_type ? get_author_posts_url( $coauthor->ID, $coauthor->user_nicename ) : get_author_posts_url( $coauthor->ID ),
					'desc' => $coauthor_type ? $coauthor->description : get_the_author_meta( 'description', $coauthor->ID ),
					'type' => $coauthor_type,
				];
			}
		}
	} else {
		$author_id = get_post_field( 'post_author', $post_id );
		$authors[] = [
			'id'   => $author_id,
			'name' => get_the_author_meta( 'display_name', $author_id ),
			'url'  => get_author_posts_url( $author_id ),
			'desc' => get_the_author_meta( 'description', $author_id ),
		];
	}
	?>

<?php foreach ( $authors as $author ) : ?>
	<div class="jeg_authorbox">
		<div class="jeg_author_image">
			<?php echo get_avatar( $author['id'], 80, null, $author['name'] ); ?>
		</div>
		<div class="jeg_author_content">
			<h3 class="jeg_author_name">
				<a href="<?php echo esc_url( $author['url'] ); ?>">
					<?php echo esc_html( $author['name'] ); ?>
				</a>
			</h3>
			<p class="jeg_author_desc">
				<?php echo jnews_sanitize_allowed_tag( $author['desc'] ); ?>
			</p>

			<?php if ( defined( 'JNEWS_ESSENTIAL' ) ) : ?>
				<div class="jeg_author_socials">
					<?php
					foreach ( $socials as $key => $value ) {

						if ( isset( $author['type'] ) && 'guest-author' === $author['type'] ) {
							$url = get_post_meta( $author['id'], 'cap-' . $key, true );
						} else {
							$url = get_the_author_meta( $key, $author['id'] );
						}

						if ( $url ) {
							?>
							<a target='_blank' href='<?php echo esc_url( $url ); ?>' class='<?php esc_attr_e( $key ); ?>'><i class='fa <?php esc_attr_e( $value ); ?>'></i> </a>
							<?php
						}
					}
					?>
				</div>
			<?php endif; ?>

		</div>
	</div>
<?php endforeach ?>
