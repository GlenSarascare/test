<?php
/**
 * @author : Jegtheme
 */

Class JNews_Footer_Instagram_View extends \JNews\Module\ModuleViewAbstract
{
    public function render_module($attr, $column_class)
    {
        if(!class_exists('JNews_Instagram')) require_once 'class.jnews-instagram.php';

        if(isset($attr['footer_instagram_username']) && !empty($attr['footer_instagram_username']))
        {
            $param = array(
                'row'       => $attr['footer_instagram_row'],
                'column'    => $attr['footer_instagram_column'],
                'username'  => $attr['footer_instagram_username'],
                'sort'      => $attr['footer_instagram_sort_type'],
                'hover'     => $attr['footer_instagram_hover_style'],
                'newtab'    => $attr['footer_instagram_newtab'] ? 'target=\'_blank\'' : '',
                'follow'    => $attr['footer_instagram_follow_button'],
                'method'    => $attr['footer_instagram_method'],
                'token'     => $attr['access_token'],
            );

            $instagram = new JNews_Instagram( $param );
            return $instagram->generate_element(false);
        } else {
            return '';
        }
    }
}
