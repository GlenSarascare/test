<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Theme JNews_Post_Split
 */
Class JNews_Split_Type_List extends JNews_Split_Type_Abstract {
	/**
	 * @var string
	 */
	protected $template;

	public function __construct( $splitter, $page, $numbering, $mode, $template, $tag ) {
		parent::__construct( $splitter, $page, $numbering, $mode, $tag );

		$this->template = $template;
	}

	public function render() {
		$output = $this->before_content;
		$output .= $this->render_content();

		return $output;
	}

	public function render_content() {
		$output = null;

		$contents = $this->splitter->get_all_result();
		$contents = $contents['content'];

		foreach ( $contents as $id => $content ) {
			$output .= "<div class='split-wrapper split-postlist active' data-id='{$id}'>";
			$output .= $this->render_title( $id );
			$output .= apply_filters( 'jnews_split_content_description', $content['description'], $id, $this->max_page );
			$output .= "</div>";
		}

		$output = "<div class='split-container split-template-{$this->get_split_type()}'>{$output}</div>";

		return $output;
	}

	public function render_title( $id ) {
		$current = $this->page_span( $id );
		$heading = $this->header_tag;

		return "<" . $heading . " class=\"current_title\">{$current}</" . $heading . ">";
	}

	public function page_span( $index ) {
		$title  = $this->all_title[ $index ];
		$number = $this->get_page_number( $index + 1 );

		$page_heading = '';
		switch ( $this->template ) {
			case '6':
				$page_heading = "
                    <div class=\"pageinfo\">
                        <div class=\"pagenum\">" . str_pad( $number, 2, '0', STR_PAD_LEFT ) . "</div>
                        <div class=\"pagetotal\">
                            <span>" . jnews_return_translation( 'of', 'jnews-split', 'of' ) . '</span> ' . str_pad( $this->max_page, 2, '0', STR_PAD_LEFT ) . "
                        </div>
                    </div>
                    <div class=\"pagetitle\"><span>" . $title . "</span></div>";
				break;
			case '9':
			case '10':
			case '11':
			case '12':
			case '13':
				$page_heading = "<span class=\"pagenum\">" . $number . "</span> " . $title;
				break;

			default:
				$page_heading = "<span class=\"pagenum\">" . $number . ".</span> " . $title;
				break;
		}

		return $page_heading;
	}

	public function get_split_type() {
		return $this->template;
	}
}

