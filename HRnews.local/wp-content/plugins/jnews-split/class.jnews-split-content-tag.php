<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Tree Node
 */
Class JNews_Split_Content_Tag {
	/**
	 * @var JNews_Split_Tree_Node
	 */
	private $pointer;
	private $root;
	private static $content;
	private $find_helper = [];

	public function __construct( $content ) {
		self::$content = $content;
		$this->populate_tag();
	}

	public function find_parent_recursive( $tag ) {
		$this->find_child_recursive( $this->pointer, $tag );

		if(sizeof($this->find_helper) > 0) {
			return $this->find_helper[0];
		} else {
			return false;
		}
	}

	public function find_child_recursive( $parent, $tag ) {
		if ( $parent->tag === $tag ) {
			$this->find_helper[] = $parent;
		} else {
			if ( $parent->child ) {
				foreach ( $parent->child as $child ) {
					$this->find_child_recursive( $child, $tag );
				}
			}
		}
	}

	/**
	 * @param $tag
	 * @param $number
	 *
	 * @return JNews_Split_Tree_Node
	 */
	public function find_child( $tag, $number ) {
		if ( is_array( $this->pointer->child ) ) {
			foreach ( $this->pointer->child as $child ) {
				if ( $child->tag === $tag ) {
					$number --;
				}

				if ( $number === 0 ) {
					return $child;
				}
			}
		}

		return null;
	}

	public function get_childs() {
		return $this->pointer->child;
	}

	public function total( $tag ) {
		$number = 0;

		if ( is_array( $this->pointer->child ) ) {
			foreach ( $this->pointer->child as $child ) {
				if ( $child->tag === $tag ) {
					$number ++;
				}
			}
		}

		return $number;
	}

	protected function populate_tag() {
		$this->pointer = new JNews_Split_Tree_Node();
		$this->root    = $this->pointer;

		preg_match_all( '/<[^>]*>/im', self::$content, $matches, PREG_OFFSET_CAPTURE );

		foreach ( $matches[0] as $key => $match ) {
			$tag = $this->get_tag( $match[0] );
			if ( ! empty( $tag ) ) {
				if ( ! $this->is_closed_tag( $match[0] ) ) {
					$this->register_tag( $tag, $match[1] );
				} else {
					$this->reset_tag( $match[1] );
				}
			}
		}
	}

	public static function get_content() {
		return self::$content;
	}

	protected function is_closed_tag( $tag ) {
		return substr( $tag, 0, 2 ) === '</';
	}

	protected function get_tag( $html ) {
		$html = preg_replace( "/<!--.*?-->/ms", "", $html );
		preg_match( '/<\/?([^\s^>]+)/', $html, $tag );

		return $tag[1];
	}

	protected function register_tag( $tag, $start ) {
		$this->pointer = $this->pointer === null ? $this->root : $this->pointer;
		$this->pointer = $this->pointer->create_child( $tag, $start );
	}

	protected function reset_tag( $end ) {
		$this->pointer = $this->pointer === null ? $this->root : $this->pointer;
		$this->pointer = $this->pointer->end_child( $end );
	}
}
