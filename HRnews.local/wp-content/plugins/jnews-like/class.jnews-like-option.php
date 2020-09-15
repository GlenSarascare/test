<?php
/**
 * @author : Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Theme JNews Option
 */
Class JNews_Like_Option
{
    /**
     * @var JNews_Like_Option
     */
    private static $instance;

    /**
     * @var Jeg\Customizer\Customizer
     */
    private $customizer;

    /**
     * @return JNews_Like_Option
     */
    public static function getInstance()
    {
        if (null === static::$instance)
        {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function __construct()
    {
        if(class_exists('Jeg\Customizer\Customizer'))
        {
            $this->customizer = Jeg\Customizer\Customizer::get_instance();

            $this->set_section();
        }
    }

    public function set_section()
    {
        $this->customizer->add_section(array(
            'id' => 'jnews_like_section',
            'title' => esc_html__('Like Button Setting', 'jnews-like'),
            'panel' => 'jnews_social_panel',
            'priority' => 262,
            'type' => 'jnews-lazy-section',
        ));
    }
}
