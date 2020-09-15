<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Archive;

use JNews\Module\ModuleViewAbstract;
use JNews\Module\ModuleQuery;

abstract class ArchiveViewAbstract extends ModuleViewAbstract
{
    public $post_per_page;

    protected static $term;

    protected static $index;

    protected static $result = array();

    public function is_on_editor() {

        if ( function_exists( 'jeg_is_frontend_vc' ) && jeg_is_frontend_vc() ) {
            return true;
        }

        if ( isset( $_REQUEST['action'] ) ) {

            if ( ( $_REQUEST['action'] === 'elementor' || $_REQUEST['action'] === 'elementor_ajax' ) ) {
                return true;
            }
        }

        return false;
    }

    public function render_module( $attr, $column_class, $result = null ) {

        if ( $this->is_on_editor() ) {
            return $this->render_module_back( $attr, $column_class );
        } else {
            return $this->render_module_front( $attr, $column_class );
        }
    }

    public function get_term() {

        if ( ! self::$term ) {
            self::$term = get_queried_object();
        }

        return self::$term;
    }

    public function get_number_post() {

        if ( ! $this->post_per_page ) {

            $this->post_per_page = get_option( 'posts_per_page' );

            if ( is_category() ) {
                if ( get_theme_mod( 'jnews_category_page_layout', 'right-sidebar' ) === 'custom-template' ) {
                    $this->post_per_page = (int) get_theme_mod( 'jnews_category_custom_template_number_post', 10 );
                }

            } elseif ( is_author() ) {
                if ( get_theme_mod( 'jnews_author_page_layout', 'right-sidebar' ) === 'custom-template' ) {
                    $this->post_per_page = (int) get_theme_mod( 'jnews_author_custom_template_number_post', 10 );
                }

            } elseif ( is_archive() ) {
                if ( get_theme_mod( 'jnews_archive_page_layout', 'right-sidebar' ) === 'custom-template' ) {
                    $this->post_per_page = (int) get_theme_mod( 'jnews_archive_custom_template_number_post', 10 );
                }
            }
        }

        return $this->post_per_page;
    }

    protected function do_query( $attr ) {

        if ( ! self::$result ) {

            if ( is_category() ) {
                $term = $this->get_term();

                if ( isset( $term->term_id ) ) {
                    $attr['include_category'] = $term->term_id;
                    $this->post_per_page      = $this->get_number_post();
                }
            } elseif ( is_tag() ) {
                $term = $this->get_term();

                if ( isset( $term->term_id ) ) {
                    $attr['include_tag'] = $term->term_id;
                    $this->post_per_page = $this->get_number_post();
                }
            } elseif ( is_author() ) {
                $user = get_userdata( get_query_var( 'author' ) );

                if ( isset( $user->ID ) ) {
                    $attr['include_author'] = $user->ID;
                    $this->post_per_page    = $this->get_number_post();
                }
            } elseif ( is_date() ) {
                $attr['year']        = get_query_var( 'year' );
                $attr['monthnum']    = get_query_var( 'monthnum' );
                $attr['day']         = get_query_var( 'day' );
                $this->post_per_page = $this->get_number_post();
            }

            $attr['sort_by']                = 'latest';
            $attr['post_type']              = 'post';
            $attr['post_offset']            = 0;
            $attr['number_post']            = $this->post_per_page;
            $attr['pagination_number_post'] = $this->post_per_page;
            $attr['paged']                  = jnews_get_post_current_page();

            $result = ModuleQuery::do_query( $attr );

            if ( isset( $result['result'] ) ) {
                self::$result = $result;
            }
        }

        return self::$result;
    }

    protected function get_result( $attr, $number_post ) {
        $result = $this->do_query( $attr );

        if ( ! empty( $result['result'] ) && is_array( $result['result'] ) ) {

            if ( isset( $number_post['size'] ) ) {
                $number_post = $number_post['size'];
            }

            if ( $number_post ) {
                $result['result'] = array_slice( $result['result'], self::$index, $number_post );
            } else {
                $result['result'] = array_slice( $result['result'], self::$index );
            }

            if ( ! is_admin() ) {
                self::$index += $number_post;
            }
        }

        return $result;
    }

    public abstract function render_module_back( $attr, $column_class );

    public abstract function render_module_front( $attr, $column_class );
}
