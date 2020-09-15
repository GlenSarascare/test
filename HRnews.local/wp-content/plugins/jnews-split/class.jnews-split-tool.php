<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class JNews_Split_Tool
 */
Class JNews_Split_Tool {
	public $whole_content;
	public $start;
	public $end;
	private $tag_begin;
	private $tag_end;
	private $cache_content;
	private $result;
	private $sequence;
	public static $split_begin_flag = 'split_content';

	public function __construct( $data, $begin, $end ) {
		$this->whole_content = $data['content'];
		$this->start         = $data['start'];
		$this->end           = $data['end'];
		$this->cache_content = $data['result'];

		$this->tag_begin = $begin;
		$this->tag_end   = $end;
		$this->sequence  = - 1;

		$this->result = array(
			'before_content' => '',
			'content'        => [],
			'after_content'  => ''
		);

		$this->start_split();
	}

	private function start_split() {
		$tag   = new JNews_Split_Content_Tag( $this->cache_content );
		$total = $tag->total( $this->tag_begin );

		for ( $i = 0; $i < $total; $i ++ ) {
			$begin  = $tag->find_child( $this->tag_begin, $i + 1 );
			$finish = $tag->find_child( $this->tag_begin, $i + 2 );

			if ( $total > ( $i + 1 ) ) {
				$finish = $finish->start;
			} else {
				$finish = strlen( $this->cache_content );
			}

			// before content
			if ( 0 === $i ) {
				$this->result['before_content'] = $this->get_splitted_content( 0, $begin->start );
			}

			// Content
			$this->result['content'][ $i ] = [
				'title'       => $this->get_split_title( $begin->start, $begin->end ),
				'description' => $this->get_split_description( $begin->end, $finish )
			];
		}
	}

	private function get_split_description( $begin, $end ) {
		return $this->get_splitted_content( $begin, $end );
	}

	private function get_split_title( $begin, $end ) {
		$string     = substr( $this->cache_content, $begin, $end - $begin );
		$wrap_start = strpos( $string, '>' ) + 1;
		$wrap_end   = strrpos( $string, '<' );

		return substr($string, $wrap_start, $wrap_end - $wrap_start);
	}

	private function get_splitted_content( $begin, $end ) {
		return substr( $this->cache_content, $begin, $end - $begin );
	}

	/**
	 * Check if tag is currently open
	 *
	 * @param $content
	 *
	 * @return bool
	 */
	public function check_open_tag( $content ) {
		preg_match( '/(<' . $this->tag_begin . '.*?>)/', $content, $matches );

		return ! empty( $matches );
	}

	/**
	 * Check if tag is closed
	 *
	 * @param $content
	 *
	 * @return bool
	 */
	public function check_close_tag( $content ) {
		preg_match( '/(<\/' . $this->tag_end . '>)/', $content, $matches );

		return ! empty( $matches );
	}

	/**
	 * Get All Result Including Before, after, and everything
	 *
	 * @return array
	 */
	public function get_all_result() {
		return $this->result;
	}

	/**
	 * Get All Current Title
	 *
	 * @return array
	 */
	public function get_all_title() {
		$title = array();

		foreach ( $this->result['content'] as $content ) {
			$title[] = $content['title'];
		}

		return $title;
	}

	/**
	 * Get Content Before Splitting content
	 *
	 * @return mixed
	 */
	public function get_before_content() {
		return $this->result['before_content'] .
		       "<div id='" . self::$split_begin_flag . "'></div>";
	}

	/**
	 * Get content on defined page
	 *
	 * @param $page
	 *
	 * @return mixed
	 */
	public function get_paged_content( $page ) {
		$max_size = $this->get_total_split();
		if ( $page > $max_size ) {
			$page = $max_size;
		}

		return $this->result['content'][ $page ];
	}

	/**
	 * Get total content
	 *
	 * @return int
	 */
	public function get_total_split() {
		return sizeof( $this->result['content'] ) - 1;
	}

	/**
	 * Get current page title
	 *
	 * @param $page
	 *
	 * @return mixed
	 */
	public function get_current_title( $page ) {
		$content = $this->get_paged_content( $page );

		return $content['title'];
	}

	/**
	 * Check if content have split content
	 *
	 * @return bool
	 */
	public function have_split_content() {
		return ! empty( $this->result['content'] );
	}
}

