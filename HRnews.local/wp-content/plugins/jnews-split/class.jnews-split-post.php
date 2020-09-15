<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class JNews_Split_Post
 */
Class JNews_Split_Post {
	/**
	 * @var JNews_Split_Post
	 */
	private static $instance;

	/**
	 * Split Post Query Var
	 *
	 * @var string
	 */
	private $query_var = 'split-post';

	/**
	 * @return JNews_Split_Post
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {
		add_filter( 'the_content', array( $this, 'post_split' ), 12 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_javascript' ) );

		add_filter( 'query_vars', array( $this, 'ajax_query_vars' ) );
		add_filter( 'template_include', array( $this, 'ajax_template' ) );
	}

	public function ajax_query_vars( $vars ) {
		$vars[] = $this->query_var;

		return $vars;
	}

	public function is_ajax_request() {
		global $wp;

		if ( is_array( $wp->query_vars ) ) {
			return array_key_exists( $this->query_var, $wp->query_vars );
		}

		return false;
	}

	public function ajax_template( $template ) {
		if ( $this->is_ajax_request() ) {
			add_filter( 'jnews_force_disable_inline_related_post', '__return_true' );

			return JNEWS_SPLIT_DIR . 'split-template.php';
		}

		return $template;
	}

	public function load_javascript() {
		if ( is_singular( 'post' ) && vp_metabox( 'jnews_post_split.enable_post_split', false ) ) {
			$dependencies = array( 'jnews-frontend' );

			if ( SCRIPT_DEBUG || get_theme_mod( 'jnews_load_necessary_asset', false ) ) {
				$dependencies = array( 'jquery', 'owlcarousel' );
			}

			wp_enqueue_script( 'jnews-split', JNEWS_SPLIT_URL . '/assets/js/jquery.split.js', $dependencies, null, true );
		}
	}

	public function wrapper_position( $string, $start ) {
		$wrap_start = strpos( $string, '>' ) + 1;
		$wrap_end   = strrpos( $string, '<' ) - 1;

		return [
			'start' => $start + $wrap_start,
			'end'   => $start + $wrap_end,
		];
	}

	public function prepare_split( $content, $tag ) {
		$node = ( new JNews_Split_Content_Tag( $content ) )->find_parent_recursive( $tag );;

		if ( $node && $node->parent->start && $node->parent->end ) {
			$parent   = $node->parent;
			$string   = substr( $content, $parent->start, $parent->end - $parent->start );
			$position = $this->wrapper_position( $string, $parent->start );
			$result   = substr( $content, $position['start'], $position['end'] - $position['start'] );

			return [
				'start'   => $position['start'],
				'end'     => $position['end'],
				'result'  => $result,
				'content' => $content
			];
		} else {
			return [
				'start'   => 0,
				'end'     => strlen( $content ),
				'result'  => $content,
				'content' => $content
			];
		}
	}


	public function post_split( $content ) {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return $content;
		}

		if ( $this->is_ajax_request() ) {
			$enable = vp_metabox( 'jnews_post_split.enable_post_split', false );
			$tag    = vp_metabox( 'jnews_post_split.post_split.0.tag', 'h2' );
			$page   = $_REQUEST['index'];

			if ( $enable ) {
				$result = $this->prepare_split( $content, $tag );

				require_once 'class.jnews-split-tool.php';
				$splitter = new JNews_Split_Tool( $result, $tag, $tag );

				if ( $splitter->have_split_content() ) {
					$result      = $splitter->get_all_result();
					$description = $result['content'][ $page ]['description'];

					return apply_filters( 'jnews_split_content_description', $description, $page, $splitter->get_total_split() + 1 );
				}
			}
		} else {
			if ( is_single() && get_post_type() === 'post' ) {
				$enable    = vp_metabox( 'jnews_post_split.enable_post_split', false );
				$tag       = vp_metabox( 'jnews_post_split.post_split.0.tag', 'h2' );
				$template  = vp_metabox( 'jnews_post_split.post_split.0.template', '1' );
				$numbering = vp_metabox( 'jnews_post_split.post_split.0.numbering', 'asc' );
				$mode      = vp_metabox( 'jnews_post_split.post_split.0.mode', 'normal' );

				if ( $enable ) {
					$result = $this->prepare_split( $content, $tag );

					require_once 'class.jnews-split-tool.php';
					$splitter = new JNews_Split_Tool( $result, $tag, $tag );

					if ( $splitter->have_split_content() ) {
						$page = $this->get_current_page();

						require_once 'type/class.jnews-split-type-abstract.php';

						switch ( $template ) {
							case '1' :
								require_once 'type/class.jnews-split-type-1.php';
								$class = new JNews_Split_Type_1( $splitter, $page, $numbering, $mode, $tag );
								break;
							case '2' :
								require_once 'type/class.jnews-split-type-2.php';
								$class = new JNews_Split_Type_2( $splitter, $page, $numbering, $mode, $tag );
								break;
							case '3' :
								require_once 'type/class.jnews-split-type-3.php';
								$class = new JNews_Split_Type_3( $splitter, $page, $numbering, $mode, $tag );
								break;
							case '4' :
								require_once 'type/class.jnews-split-type-4.php';
								$class = new JNews_Split_Type_4( $splitter, $page, $numbering, $mode, $tag );
								break;
							case '5' :
								require_once 'type/class.jnews-split-type-5.php';
								$class = new JNews_Split_Type_5( $splitter, $page, $numbering, $mode, $tag );
								break;
							case  '6' :
							case  '7' :
							case  '8' :
							case  '9' :
							case '10' :
							case '11' :
							case '12' :
							case '13' :
							case '14' :
								require_once 'type/class.jnews-split-type-list.php';
								$class = new JNews_Split_Type_List( $splitter, $page, $numbering, $mode, $template, $tag );
								break;
							case '15' :
								require_once 'type/class.jnews-split-type-15.php';
								$class = new JNews_Split_Type_15( $splitter, $page, $numbering, $mode, $tag );
								break;
							case '16' :
								require_once 'type/class.jnews-split-type-16.php';
								$class = new JNews_Split_Type_16( $splitter, $page, $numbering, "all", $tag );
								break;
							case '17' :
								require_once 'type/class.jnews-split-type-17.php';
								$class = new JNews_Split_Type_17( $splitter, $page, $numbering, "all", $tag );
								break;
							case '18' :
								require_once 'type/class.jnews-split-type-18.php';
								$class = new JNews_Split_Type_18( $splitter, $page, $numbering, "all", $tag );
								break;
							case '19' :
								require_once 'type/class.jnews-split-type-19.php';
								$class = new JNews_Split_Type_19( $splitter, $page, $numbering, "all", $tag );
								break;
							case '20' :
								require_once 'type/class.jnews-split-type-20.php';
								$class = new JNews_Split_Type_20( $splitter, $page, $numbering, "all", $tag );
								break;
							default :
								$class = null;
								break;
						}

						if ( $class !== null ) {
							return $class->render_output();
						}
					}
				}
			}
		}

		return $content;
	}

	public function get_current_page() {
		$page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		return max( $page, $paged );
	}
}

