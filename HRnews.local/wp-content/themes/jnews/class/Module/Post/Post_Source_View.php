<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Post;

Class Post_Source_View extends PostViewAbstract
{
    public function render_module_back($attr, $column_class)
    {
        return
            "<div {$this->element_id($attr)} class='jeg_post_{$attr['source_via']} {$attr['scheme']} {$attr['el_class']}'>
					<span>" . ucfirst( $attr['source_via'] ) . ":</span> 
					<a rel=\"nofollow\" target=\"_blank\">https://yourdomain.com/this-is-dummy-url-only</a>
            </div>";
    }

    public function render_module_front($attr, $column_class)
    {
    	$post_id = get_the_ID();

    	if ( $attr['source_via'] === 'source' ) {
    		$output = $this->render_source_article( $post_id );
	    } else {
    		$output = $this->render_via_article( $post_id );
	    }

        return
            "<div {$this->element_id($attr)} class='jeg_post_{$attr['source_via']} {$attr['scheme']} {$attr['el_class']}'>
                {$output}
            </div>";
    }

	public function render_source_article( $post_id ) {

		$name = vp_metabox('jnews_single_post.source_name', false, $post_id );
		$url  = vp_metabox('jnews_single_post.source_url', false, $post_id );

		if ( ! empty( $name ) ) {

			if ( $url )
				$url = "href=\"{$url}\"";

			return "<span>" . jnews_return_translation( 'Source:', 'jnews', 'source_text' ) . "</span> 
					<a {$url} rel=\"nofollow\" target='_blank'>{$name}</a>";
		}

		return false;
	}

	public function render_via_article( $post_id ) {

		$name = vp_metabox('jnews_single_post.via_name', false, $post_id );
		$url  = vp_metabox('jnews_single_post.via_url', false, $post_id );

		if ( ! empty( $name ) ) {

			if ( $url )
				$url = "href=\"{$url}\"";

			return "<span>" . jnews_return_translation( 'Via:', 'jnews', 'via_text' ) . "</span> 
					<a {$url} rel=\"nofollow\" target='_blank'>{$name}</a>";
		}

		return false;
	}
}
