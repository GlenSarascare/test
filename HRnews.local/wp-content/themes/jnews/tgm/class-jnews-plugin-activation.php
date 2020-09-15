<?php
    
class JNews_Plugin_Activation extends \TGM_Plugin_Activation {
    
    private static $clone_instance;
    
    /**
     * Get JNews_Plugin_Activation instance.
     *
     * @since 7.0.0 for JNews
     *
     */
    public static function get_instance() {
        if ( ! isset( self::$clone_instance ) && ! ( self::$clone_instance instanceof self ) ) {
            self::$clone_instance = new self();
        }
        return self::$clone_instance;
    }

    /**
     * Activate JNews plugin.
     *
     * @since 7.0.0 for JNews
     *
     * @return boolean
     */
    public function jnews_plugin_install() {
        return $this->do_plugin_install();
    }
    
    function deactivate_single_plugin( $file_path, $slug )
    {
        deactivate_plugins( $file_path );

        echo '<div id="message" class="error"><p>',
        sprintf(
            esc_html__('Plugin successfully deactivated : %s', 'jnews'),
            '<strong>' . esc_html( $this->plugins[ $slug ]['name'] ) . '</strong>'
        ),
        '</p></div>';

        return true;
    }
    
    /**
     * Add the menu item.
     *
     * {@internal IMPORTANT! If this function changes, review the regex in the custom TGMPA
     * generator on the website.}}
     *
     * @since 2.5.0
     *
     * @param array $args Menu item configuration.
     */
    protected function add_admin_menu( array $args ) {
        $this->page_hook = add_theme_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
    }
    
    /**
     * Retrieve the Description of an installed plugin.
     *
     * @since 1.0.0 for JNews
     *
     * @param string $slug Plugin slug.
     * @return string Version number as string or an empty string if the plugin is not installed
     *                or version unknown (plugins which don't comply with the plugin header standard).
     */
    public function get_plugin_description( $slug ) {
        $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached).

        if ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Description'] ) ) {
            return $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Description'];
        }

        return '';
    }

    /**
     * Retrieve the Description of an installed plugin.
     *
     * @since 1.0.0 for JNews
     *
     * @param string $slug Plugin slug.
     * @return string Version number as string or an empty string if the plugin is not installed
     *                or version unknown (plugins which don't comply with the plugin header standard).
     */
    public function get_plugin_author( $slug ) {
        $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached).

        if ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Author'] ) ) {
            return $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Author'];
        }

        return '';
    }

    /**
     * Try to grab information from WordPress API.
     *
     * @since 1.0.0 JNews
     *
     * @param  string $slug Plugin slug.
     * @return object Plugins_api response object on success, WP_Error on failure.
     */
    public function get_plugin_api( $slug )
    {
        return parent::get_plugins_api( $slug );
    }
    /** @modify end by Jegtheme */

}

?>