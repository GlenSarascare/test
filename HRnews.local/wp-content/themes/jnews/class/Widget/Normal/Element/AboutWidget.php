<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Widget\Normal\Element;

use JNews\Widget\Normal\NormalWidgetInterface;

class AboutWidget implements NormalWidgetInterface {

	/**
	 * @return array
	 */
	public function get_options() {
		return [
			'title'                  => [
				'title' => esc_html__( 'Title', 'jnews' ),
				'desc'  => esc_html__( 'Title on widget header.', 'jnews' ),
				'type'  => 'text',
			],
			'aboutimg'               => [
				'title' => esc_html__( 'About Image', 'jnews' ),
				'desc'  => esc_html__( 'Display your profile picture or site logo.', 'jnews' ),
				'type'  => 'image',
			],
			'aboutimgretina'         => [
				'title' => esc_html__( 'About Image: Retina', 'jnews' ),
				'desc'  => esc_html__( 'Retina version (2x size) of your about image.', 'jnews' ),
				'type'  => 'image',
			],
			'aboutimgdarkmode'       => [
				'title' => esc_html__( 'About Image Dark Mode', 'jnews' ),
				'desc'  => esc_html__( 'Display your profile picture or site logo for Dark Mode.', 'jnews' ),
				'type'  => 'image',
			],
			'aboutimgdarkmoderetina' => [
				'title' => esc_html__( 'About Image Dark Mode: Retina', 'jnews' ),
				'desc'  => esc_html__( 'Retina version (2x size) of your about image for Dark Mode.', 'jnews' ),
				'type'  => 'image',
			],
			'aboutname'              => [
				'title' => esc_html__( 'Name', 'jnews' ),
				'desc'  => esc_html__( 'Display your name (for blog).', 'jnews' ),
				'type'  => 'text',
			],
			'aboutoccupation'        => [
				'title' => esc_html__( 'Occupation', 'jnews' ),
				'desc'  => esc_html__( 'Display your occupation (for blog).', 'jnews' ),
				'type'  => 'text',
			],
			'aboutdesc'              => [
				'title' => esc_html__( 'About Description', 'jnews' ),
				'desc'  => esc_html__( 'You may use standard HTML tags and attributes.', 'jnews' ),
				'type'  => 'textarea',
			],
			'signature'              => [
				'title' => esc_html__( 'Signature', 'jnews' ),
				'desc'  => esc_html__( 'Put signature at the bottom of content.', 'jnews' ),
				'type'  => 'image',
			],
			'signatureretina'        => [
				'title' => esc_html__( 'Signature: Retina', 'jnews' ),
				'desc'  => esc_html__( 'Retina version (2x size) of your signature image.', 'jnews' ),
				'type'  => 'image',
			],
			'align'                  => [
				'title'   => esc_html__( 'Centered Content', 'jnews' ),
				'desc'    => esc_html__( 'Set content text align center.', 'jnews' ),
				'type'    => 'checkbox',
				'default' => false,
			],
		];
	}

	public function get_image( $id ) {
		if ( ! empty( $id ) ) {
			$image = wp_get_attachment_image_src( $id, 'full' );

			return $image[0];
		} else {
			return null;
		}
	}

	public function render_widget( $instance, $text_content = null ) {
		// Extract Widget
		extract( $instance );

		if ( $text_content !== null ) {
			$aboutdesc = $text_content;
		}

		if ( isset( $aboutimg ) ) {
			$aboutimg = wp_get_attachment_image_src( $aboutimg, 'full' );
			$aboutimg = isset( $aboutimg[0] ) ? $aboutimg[0] : '';
		} else {
			$aboutimg = get_parent_theme_file_uri( 'assets/img/logo.png' );
		}

		if ( isset( $aboutimgretina ) ) {
			$aboutimgretina = wp_get_attachment_image_src( $aboutimgretina, 'full' );
			$aboutimgretina = isset( $aboutimgretina[0] ) ? $aboutimgretina[0] : '';
		} else {
			$aboutimgretina = get_parent_theme_file_uri( 'assets/img/logo@2x.png' );
		}

		if ( isset( $aboutimgdarkmode ) && ! empty( $aboutimgdarkmode ) ) {
			$aboutimgdarkmode = wp_get_attachment_image_src( $aboutimgdarkmode, 'full' );
			$aboutimgdarkmode = isset( $aboutimgdarkmode[0] ) ? $aboutimgdarkmode[0] : '';
		} else {
			$aboutimgdarkmode = get_parent_theme_file_uri( 'assets/img/logo_darkmode.png' );
		}


		if ( isset( $aboutimgdarkmoderetina ) && ! empty( $aboutimgdarkmoderetina ) ) {
			$aboutimgdarkmoderetina = wp_get_attachment_image_src( $aboutimgdarkmoderetina, 'full' );
			$aboutimgdarkmoderetina = isset( $aboutimgdarkmoderetina[0] ) ? $aboutimgdarkmoderetina[0] : '';
		} else {
			$aboutimgdarkmoderetina = get_parent_theme_file_uri( 'assets/img/logo_darkmode@2x.png' );
		}

		if ( isset( $signature ) ) {
			$signature = wp_get_attachment_image_src( $signature, 'full' );
			if ( null !== $signature && false !== $signature ) {
				$signature = isset( $signature[0] ) ? $signature[0] : '';
			} else {
				$signature = '';
			}
		} else {
			$signature = '';
		}

		if ( isset( $signatureretina ) ) {
			$signatureretina = wp_get_attachment_image_src( $signatureretina, 'full' );
			if ( null !== $signatureretina && false !== $signatureretina ) {
				$signatureretina = isset( $signatureretina[0] ) ? $signatureretina[0] : '';
			} else {
				$signatureretina = '';
			}
		} else {
			$signatureretina = '';
		}

		$aboutname       = isset( $aboutname ) ? $aboutname : '';
		$aboutoccupation = isset( $aboutoccupation ) ? $aboutoccupation : '';
		$aboutdesc       = isset( $aboutdesc ) ? $aboutdesc : '';
		$align           = isset( $align ) && $align ? 'jeg_aligncenter' : '';

		$srcset          = '';
		$src             = 'data-src="' . esc_url( $aboutimg ) . '" ';
		$datasrclight    = 'data-light-src="' . esc_url( $aboutimg ) . '" ';
		$datasrcsetlight = 'data-light-srcset="' . esc_url( $aboutimg ) . ' 1x, ' . esc_url( $aboutimgretina ) . ' 2x" ';
		$datasrcdark     = 'data-dark-src="' . esc_url( $aboutimgdarkmode ) . '" ';
		$datasrcsetdark  = 'data-dark-srcset="' . esc_url( $aboutimgdarkmode ) . ' 1x, ' . esc_url( $aboutimgdarkmoderetina ) . ' 2x"';
		$dm_options      = get_theme_mod( 'jnews_dark_mode_options', 'jeg_toggle_dark' );
		if ( ! empty( $aboutimgretina ) ) {
			$srcset = 'data-srcset="' . esc_url( $aboutimg ) . ' 1x, ' . esc_url( $aboutimgretina ) . ' 2x"';
		}
		if ( ( isset( $_COOKIE['darkmode'] ) && $_COOKIE['darkmode'] === 'true' && ( $dm_options === 'jeg_toggle_dark' || $dm_options === 'jeg_timed_dark' ) ) || ( $dm_options === 'jeg_full_dark' ) ) {
			$src    = 'data-src="' . esc_url( $aboutimgdarkmode ) . '" ';
			$srcset = 'data-srcset="' . esc_url( $aboutimgdarkmode ) . ' 1x, ' . esc_url( $aboutimgdarkmoderetina ) . ' 2x"';
		}

		?>
        <div class="jeg_about <?php echo esc_attr( $align ); ?>">
			<?php if ( ! empty( $aboutimg ) && ! empty( $aboutimgretina ) ) : ?>
                <a class="footer_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class='lazyload'
                         src="<?php echo jnews_default_empty_image( '' ); ?>" <?php echo jnews_sanitize_output( $src ); ?> <?php echo jnews_sanitize_output( $srcset ); ?>
                         alt="<?php bloginfo( 'name' ); ?>" <?php echo jnews_sanitize_output( $datasrclight ); ?> <?php echo jnews_sanitize_output( $datasrcsetlight ); ?> <?php echo jnews_sanitize_output( $datasrcdark ); ?> <?php echo jnews_sanitize_output( $datasrcsetdark ); ?>
                         data-pin-no-hover="true">
                </a>
			<?php endif ?>
			<?php
			if ( ! empty( $aboutname ) ) :
				?>
                <h2 class="jeg_about_name"><?php echo wp_kses( $aboutname, wp_kses_allowed_html() ); ?></h2><?php endif; ?>
			<?php
			if ( ! empty( $aboutoccupation ) ) :
				?>
                <p class="jeg_about_title"><?php echo wp_kses( $aboutoccupation, wp_kses_allowed_html() ); ?></p><?php endif; ?>
            <p><?php echo str_replace( PHP_EOL, '<br>', do_shortcode( $aboutdesc ) ); ?></p>

			<?php if ( ! empty( $signature ) || ! empty( $signatureretina ) ) : ?>
                <div class="jeg_about_autograph">
                    <img class='lazyload' data-src="<?php echo esc_url( $signature ); ?>"
                         data-srcset="<?php echo esc_url( $signature ); ?> 1x, <?php echo esc_url( $signatureretina ); ?> 2x"
                         alt="<?php echo esc_attr( $aboutname ); ?>">
                </div>
			<?php endif; ?>
        </div>
		<?php
	}
}
