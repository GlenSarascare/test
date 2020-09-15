<?php
/**
 * @author : Jegtheme
 */

namespace JNews\Module\Element;

use JNews\Module\ModuleViewAbstract;

class Element_Userlist_View extends ModuleViewAbstract {

	/**
	 * Render Module
	 */
	public function render_module( $attr, $column_class ) {
		if ( isset( $attr['number_user']['size'] ) ) {
			$attr['number_user'] = $attr['number_user']['size'];
		}
		$args       = array(
			'role__in'     => ! empty( $attr['userlist_show_role'] ) ? explode( ',', $attr['userlist_show_role'] ) : array(),
			'role__not_in' => ! empty( $attr['userlist_hide_role'] ) ? explode( ',', $attr['userlist_hide_role'] ) : array(),
			'include'      => ! empty( $attr['include_user'] ) ? explode( ',', $attr['include_user'] ) : array(),
			'exclude'      => ! empty( $attr['exclude_user'] ) ? explode( ',', $attr['exclude_user'] ) : array(),
			'number'       => ! empty( $attr['number_user'] ) ? $attr['number_user'] : '',
		);
		$user_query = new \WP_User_Query( $args );
		$results    = $user_query->get_results();

		return $this->render_element( $results, $attr );
	}

	/**
	 * Render element
	 */
	public function render_element( $results, $attr ) {

		/** Variables (for readability) */
		$style  = $attr['userlist_style'];
		$align  = $attr['userlist_align'];
		$output = '';
		/** @var  $style_output
		 * only allow style-5
		 */
		$style_output = '';

		/** Get user alignment */
		$align_css = '';
		if ( $align === 'jeg_user_align_left' ) {
			$align_css = 'style = text-align:left';
		} elseif ( $align === 'jeg_user_align_right' ) {
			$align_css = 'style = text-align:right';
		} else {
			$align_css = 'style = text-align:center';
		}

		/** Get style option */
		if ( $style === 'style-1' ) {
			$block  = $attr['userlist_block1'];
			$output = $output . "<div class='jeg_userlist style-1 " . $block . ' ' . $this->unique_id . " ' " . $align_css . '>';
		} elseif ( $style === 'style-2' ) {
			$block  = $attr['userlist_block2'];
			$output = $output . "<div class='jeg_userlist style-2 " . $block . ' ' . $this->unique_id . " ' " . $align_css . '>';
		} elseif ( $style === 'style-3' ) {
			$block  = $attr['userlist_block3'];
			$output = $output . "<div class='jeg_userlist style-3 " . $block . ' ' . $this->unique_id . " ' " . $align_css . '>';
		} elseif ( $style === 'style-4' ) {
			$output = $output . "<div class='jeg_userlist style-4 jeg_1_block " . $this->unique_id . " ' style\"=\"text-align:left\">";
		} elseif ( $style === 'style-5' ) {
			$block  = $attr['userlist_block1'];
			$output = $output . "<div class='jeg_userlist style-5 " . $block . ' ' . $this->unique_id . " ' " . $align_css . '>';
		}

		$style_output = $this->custom_color( $attr, $this->unique_id );
		/** Render Title */
		$output  = $output . $this->render_header( $attr ) . '<ul>';
		$output .= $this->content( $results, $attr );
		$output .= '</ul>';
		$output .= ! empty( $style_output ) ? "<style scoped>{$style_output}</style>" : '';
		$output  = $output . '</div>';

		return $output;
	}

	public function custom_color( $attr, $unique_class ) {
		$unique_class = trim( $unique_class );
		$style        = '';

		if ( isset( $attr['title_color'] ) && ! empty( $attr['title_color'] ) ) {
			$style .= ".{$unique_class} .jeg_userlist-name { color: {$attr['title_color']} }";
		}

		if ( isset( $attr['alt_color'] ) && ! empty( $attr['alt_color'] ) ) {
			$style .= ".{$unique_class} .jeg_subscribe_count, .{$unique_class} .follow-wrapper a, .{$unique_class} .jeg_userlist-socials a i { color: {$attr['alt_color']} }";
		}

		if ( isset( $attr['accent_color'] ) && ! empty( $attr['accent_color'] ) ) {
			$style .= ".{$unique_class} .jeg_userlist-name:hover { color: {$attr['accent_color']} }";
		}

		if ( in_array( $attr['userlist_style'], array( 'style-1', 'style-2', 'style-3' ), true ) ) {
			if ( isset( $attr['desc_color'] ) && ! empty( $attr['desc_color'] ) ) {
				$style .= ".{$unique_class}.jeg_userlist.{$attr['userlist_style']} .jeg_userlist-desc { color: {$attr['desc_color']} }";
			}
		}

		if ( in_array( $attr['userlist_style'], array( 'style-1', 'style-2', 'style-3', 'style-5' ), true ) ) {
			if ( isset( $attr['border_color'] ) && ! empty( $attr['border_color'] ) ) {
				$style .= ".{$unique_class}.jeg_userlist.{$attr['userlist_style']} .jeg_userlist-wrap { border-color: {$attr['border_color']} }";
			}
		}

		if ( in_array( $attr['userlist_style'], array( 'style-1', 'style-2', 'style-5' ), true ) ) {
			if ( isset( $attr['block_background'] ) && ! empty( $attr['block_background'] ) ) {
				$style .= ".{$unique_class}.jeg_userlist.{$attr['userlist_style']} .jeg_userlist-wrap { background: {$attr['block_background']} }";
			}
		}

		if ( in_array( $attr['userlist_style'], array( 'style-2', 'style-3', 'style-5' ), true ) ) {
			$subscribe_background       = ( isset( $attr['subscribe_background'] ) && ! empty( $attr['subscribe_background'] ) ) ? "background-color: {$attr['subscribe_background']};" : '';
			$subscribe_color            = ( isset( $attr['subscribe_color'] ) && ! empty( $attr['subscribe_color'] ) ) ? "color: {$attr['subscribe_color']};" : '';
			$subscribe_border_color            = ( isset( $attr['subscribe_border_color'] ) && ! empty( $attr['subscribe_border_color'] ) ) ? "border-color: {$attr['subscribe_border_color']};" : '';
			$subscribe_hover_background = ( isset( $attr['subscribe_hover_background'] ) && ! empty( $attr['subscribe_hover_background'] ) ) ? "background-color: {$attr['subscribe_hover_background']};" : '';
			$subscribe_hover_color      = ( isset( $attr['subscribe_hover_color'] ) && ! empty( $attr['subscribe_hover_color'] ) ) ? "color: {$attr['subscribe_hover_color']};" : '';
			$subscribe_hover_border_color            = ( isset( $attr['subscribe_hover_border_color'] ) && ! empty( $attr['subscribe_hover_border_color'] ) ) ? "border-color: {$attr['subscribe_hover_border_color']};" : '';
			if ( ! empty( $subscribe_background ) || ! empty( $subscribe_color ) ) {
				$style .= ".{$unique_class}.jeg_userlist.{$attr['userlist_style']} .jeg_userlist-content .jeg_meta_subscribe .follow-wrapper a { {$subscribe_background} {$subscribe_color} {$subscribe_border_color} }";
			}
			if ( ! empty( $subscribe_hover_background ) || ! empty( $subscribe_hover_color ) ) {
				$style .= ".{$unique_class}.jeg_userlist.{$attr['userlist_style']} .jeg_userlist-content .jeg_meta_subscribe .follow-wrapper a:hover { {$subscribe_hover_background} {$subscribe_hover_color} {$subscribe_hover_border_color} }";
			}
		}

		return $style;
	}

	/**
	 * Render header
	 */
	public function render_header( $attr ) {
		if ( defined( 'POLYLANG_VERSION' ) ) {
			$attr['first_title']        = jnews_return_polylang( $attr['first_title'] );
			$attr['second_title']       = jnews_return_polylang( $attr['second_title'] );
			$attr['header_filter_text'] = jnews_return_polylang( $attr['header_filter_text'] );
		}

		// Heading
		$subtitle      = ! empty( $attr['second_title'] ) ? "<strong>{$attr['second_title']}</strong>" : '';
		$header_class  = "jeg_block_{$attr['header_type']}";
		$heading_title = $attr['first_title'] . $subtitle;

		$output = '';

		if ( ! empty( $heading_title ) ) {
			$heading_icon  = empty( $attr['header_icon'] ) ? '' : "<i class='{$attr['header_icon']}'></i>";
			$heading_title = "<span>{$heading_icon}{$attr['first_title']}{$subtitle}</span>";
			$heading_title = ! empty( $attr['url'] ) ? "<a href='{$attr['url']}'>{$heading_title}</a>" : $heading_title;
			$heading_title = "<h3 class=\"jeg_block_title\">{$heading_title}</h3>";

			// Now Render Output
			$output =
				"<div class=\"jeg_block_heading {$header_class} jeg_subcat_right\">
                {$heading_title}
            </div>";
		}

		return $output;
	}

	/**
	 * Content
	 */
	public function content( $results, $attr ) {
		$content      = '';
		$style        = $attr['userlist_style'];
		$hide_desc    = $attr['userlist_desc'];
		$hide_social  = $attr['userlist_social'];
		$trunc_desc   = $attr['userlist_trunc'];
		$social_array = $this->declare_socials();
		/** User List Content */
		foreach ( $results as $user ) {

			// ~ AVATAR
			$content = $content . "<li><div class='jeg_userlist-wrap'><div class='jeg_userlist-photo'><a href=\"" . get_bloginfo( 'url' ) . '/?author=' . $user->ID . '">' . get_avatar( $user->ID, 500 ) . '</a></div>';

			// ~ NAME
			$content = $content . "<div class='jeg_userlist-content'>";
			if ( get_user_meta( $user->ID, 'first_name', true ) || get_user_meta( $user->ID, 'last_name', true ) ) {
				$name = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
			} else {
				$name = get_the_author_meta( 'display_name', $user->ID );
			}

			$subscriber = $this->subscribe( $user->ID, $attr );
			$user_name  = '<a href="' . get_author_posts_url( $user->ID ) . "\" class='jeg_userlist-name'>" . $name . '</a>' . $subscriber;

			$content = $content . $user_name;
			if ( ! in_array( $style, array( 'style-4', 'style-5' ) ) ) {

				// ~ DESCRIPTION
				if ( ! $hide_desc ) {
					$desc = get_the_author_meta( 'description', $user->ID );
					if ( $trunc_desc ) {
						$desc = strlen( $desc ) > 150 ? substr( $desc, 0, 150 ) . '...' : $desc;
					}
					$content = $content . "<span class='jeg_userlist-desc'>" . $desc . '</span>';
				}

				// ~ SOCIALS
				$socials = $this->check_socials( $user->ID, $social_array );
				if ( ! $hide_social && ! empty( $socials ) ) {
					$content = $content . "<div class='jeg_userlist-socials'>" . $socials . '</div>';
				}
			}
			$content = $content . '</div>';

			// ~ CLOSING LIST TAGS
			$content = $content . '</div></li>';

		}

		return $content;
	}

	/**
	 * Social list
	 */
	public function declare_socials() {
		$social_array = array(
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
		);

		return $social_array;
	}

	/**
	 * @param $user_id
	 * @param $attr
	 *
	 * @return string
	 */
	public function subscribe( $user_id, $attr ) {
		$subscriber = '';
		if ( in_array( $attr['userlist_style'], array( 'style-2', 'style-3', 'style-5' ) ) ) {
			if ( defined( 'JNEWS_VIDEO' ) ) {
				$follow_button   = $attr['follow_button'];
				$show_subscriber = $attr['userlist_subscriber'];
				/** @var  $follow_button */
				$follow_button = $follow_button && function_exists( 'jnews_video_render_subscribe_member_actions' ) ? jnews_video_render_subscribe_member_actions( $user_id ) : '';
				$follow_button = ! empty( $follow_button ) ? '<div class="follow-wrapper">' . $follow_button . '<div class="jnews-spinner"><i class="fa fa-spinner fa-pulse active"></i></div></div>' : '';

				/** @var  $follow_count */
				$follow_count = $show_subscriber && function_exists( 'bp_follow_total_follow_counts' ) ? bp_follow_total_follow_counts( array( 'user_id' => $user_id ) ) : 0;

				/** @var  $subscribe_wrapper */
				$subscriber = $show_subscriber ? '<span class="jeg_subscribe_count">' . $follow_count['followers'] . ' ' . jnews_return_translation( 'Subscriber', 'jnews', 'subscriber' ) . '</span>' : '';
				$subscriber = $follow_button ? '<div class="jeg_meta_subscribe">' . $follow_button . $subscriber . '</div>' : '<div class="jeg_meta_subscribe no-follow">' . $subscriber . '</div>';
			}
		}

		return $subscriber;
	}

	/**
	 * Check social
	 */
	public function check_socials( $user, $social_array ) {
		$socials = '';

		foreach ( $social_array as $key => $value ) {
			if ( get_the_author_meta( $key, $user ) ) {
				$socials = $socials . "<a target='_blank' href='" . get_the_author_meta( $key, $user ) . "' class='" . $key . "'><i class='fa " . $value . "'></i> </a>";
			}
		}

		return $socials;
	}
}
