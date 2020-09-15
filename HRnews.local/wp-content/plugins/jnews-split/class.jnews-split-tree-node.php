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
Class JNews_Split_Tree_Node {
	public $tag;
	public $start;
	public $end;

	/**
	 * @var array JNews_Split_Tree_Node
	 */
	public $child = array();
	public $parent;

	public static $self_closing = array(
		'area',
		'base',
		'br',
		'col',
		'command',
		'embed',
		'hr',
		'img',
		'input',
		'keygen',
		'link',
		'menuitem',
		'meta',
		'param',
		'source',
		'track',
		'wbr'
	);

	public function __construct( $tag = null, $start = null, $parent = null ) {
		$this->tag    = $tag;
		$this->start  = $start;
		$this->parent = $parent;
	}

	/**
	 * @param $tag
	 * @param $start
	 *
	 * @return JNews_Split_Tree_Node
	 */
	public function create_child( $tag, $start ) {
		$total                 = sizeof( $this->child );
		$this->child[ $total ] = new JNews_Split_Tree_Node( $tag, $start, $this );

		if ( in_array( $tag, JNews_Split_Tree_Node::$self_closing ) ) {
			$this->end = $this->calculate_end_tag( $start, $this->child[ $total ] );

			return $this;
		} else {
			return $this->child[ $total ];
		}
	}

	/**
	 * @param $begin
	 * @param JNews_Split_Tree_Node $child
	 *
	 * @return int
	 */
	public function calculate_end_tag( $begin, $child = null ) {
		if ( $child === null ) {
			$end = strpos( JNews_Split_Content_Tag::get_content(), '>', $begin );
		} else {
			$end = strpos( JNews_Split_Content_Tag::get_content(), '>', $begin );
		}

		return ++ $end;
	}

	/**
	 * @param $end
	 *
	 * @return JNews_Split_Tree_Node
	 */
	public function end_child( $end ) {
		$this->end = $this->calculate_end_tag( $end );

		return $this->parent;
	}
}