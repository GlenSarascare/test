<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module;

use JNews\Walker\VCategoryWalker;

/**
 * Class JNews VC Integration
 */
Class ModuleVC
{
    /**
     * @var ModuleVC
     */
    private static $instance;

    /**
     * @return ModuleVC
     */
    public static function getInstance()
    {
        if (null === static::$instance)
        {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * ModuleVC constructor.
     */
    private function __construct()
    {
        $this->add_param();
        $this->setup_hook();
    }

    public function add_param()
    {
        if(function_exists('vc_add_param'))
        {
            /** row */

            vc_add_param('vc_row', array(
                'type'          => 'checkbox',
                'heading'       => esc_html__('Row Overlay', 'jnews'),
                'param_name'    => 'enable_overlay',
                'group'         => esc_html__('Additional', 'jnews'),
                'description'   => esc_html__('Enable overlay on your row. You can implement this option if you use video background or Image background to clarify your content.', 'jnews'),
                'value'         => array( esc_html__('Enable Overlay', 'jnews') => 'yes' )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'colorpicker',
                'heading'       => esc_html__('Overlay Color', 'jnews'),
                'param_name'    => 'overlay_color',
                'group'         => esc_html__('Additional', 'jnews'),
                'dependency'    => Array('element' => "enable_overlay", 'value' => array('yes'))
            ));


            vc_add_param('vc_row', array(
                'type'          => 'checkbox',
                'heading'       => esc_html__('Enable top ribon', 'jnews'),
                'param_name'    => 'enable_top_ribon',
                'group'         => esc_html__('Additional', 'jnews'),
                'description'   => esc_html__('you can create ribon effect row, element height will be automatically calculated and will repeate x axis', 'jnews'),
                'value'         => array( esc_html__('Enable Top Ribon', 'jnews') => 'yes' )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'attach_image',
                'heading'       => esc_html__('Top Ribon Background', 'jnews'),
                'param_name'    => 'top_ribon_bg',
                'group'         => esc_html__('Additional', 'jnews'),
                'dependency'    => Array('element' => "enable_top_ribon", 'value' => array('yes'))
            ));

            vc_add_param('vc_row', array(
                'type'          => 'checkbox',
                'heading'       => esc_html__('Enable bottom ribon', 'jnews'),
                'param_name'    => 'enable_bottom_ribon',
                'group'         => esc_html__('Additional', 'jnews'),
                'description'   => esc_html__('you can create ribon effect row, element height will be automatically calculated and will repeate x axis', 'jnews'),
                'value'         => array( esc_html__('Enable Bottom Ribon', 'jnews') => 'yes' )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'attach_image',
                'heading'       => esc_html__('Bottom Ribon Background', 'jnews'),
                'param_name'    => 'bottom_ribon_bg',
                'group'         => esc_html__('Additional', 'jnews'),
                'dependency'    => Array('element' => "enable_bottom_ribon", 'value' => array('yes'))
            ));


            vc_add_param('vc_row', array(
                'type'          => 'alert',
                'param_name'    => 'vc_row_background',
                'heading'       => esc_html__('Additional Background Option', 'jnews'),
                'description'   => esc_html__('To use this setup, please choose Theme Defaults on background option above', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
                'std'           => 'warning'
            ));

            vc_add_param('vc_row', array(
                'type'          => 'checkbox',
                'param_name'    => 'background_use_featured',
                'heading'       => esc_html__('Use Featured image as background', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
            ));

            vc_add_param('vc_row', array(
                'type'          => 'dropdown',
                'param_name'    => 'background_repeat',
                'heading'       => esc_html__('Background Repeat', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
                'std'           => '',
                'value'         => array(
                    ''                                              => '',
                    esc_html__('Repeat Horizontal', 'jnews')        => 'repeat-x',
                    esc_html__('Repeat Vertical', 'jnews')          => 'repeat-y',
                    esc_html__('Repeat Image', 'jnews')             => 'repeat',
                    esc_html__('No Repeat', 'jnews')                => 'no-repeat',
                )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'dropdown',
                'param_name'    => 'background_position',
                'heading'       => esc_html__('Background Position', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
                'std'           => '',
                'value'         => array(
                    ''                                      => '',
                    esc_html__('Left Top', 'jnews')         => 'left top',
                    esc_html__('Left Center', 'jnews')      => 'left center',
                    esc_html__('Left Bottom', 'jnews')      => 'left bottom',
                    esc_html__('Center Top', 'jnews')       => 'center top',
                    esc_html__('Center Center', 'jnews')    => 'center center',
                    esc_html__('Center Bottom', 'jnews')    => 'center bottom',
                    esc_html__('Right Top', 'jnews')        => 'right top',
                    esc_html__('Right Center', 'jnews')     => 'right center',
                    esc_html__('Right Bottom', 'jnews')     => 'right bottom',
                )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'dropdown',
                'param_name'    => 'background_attachment',
                'heading'       => esc_html__('Background Attachment', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
                'std'           => '',
                'value'         => array(
                    ''                                  => '',
                    esc_html__('Fixed', 'jnews')        => 'fixed',
                    esc_html__('Scroll', 'jnews')       => 'scroll',
                )
            ));

            vc_add_param('vc_row', array(
                'type'          => 'dropdown',
                'param_name'    => 'background_size',
                'heading'       => esc_html__('Background Size', 'jnews'),
                'group'         => esc_html__('Design Options', 'jnews'),
                'std'           => '',
                'value'         => array(
                    ''                                   => '',
                    esc_html__('Cover', 'jnews')         => 'cover',
                    esc_html__('Contain', 'jnews')       => 'contain',
                    esc_html__('Initial', 'jnews')       => 'initial',
                    esc_html__('Inherit', 'jnews')       => 'inherit',
                )
            ));

            /** column */
            vc_add_param('vc_column', array(
                'type'          => 'checkbox',
                'heading'       => esc_html__('Enable Sticky Sidebar', 'jnews'),
                'param_name'    => 'sticky_sidebar',
                'value'         => array( esc_html__('Enable', 'jnews') => 'yes' ),
            ));

            vc_add_param('vc_column', array(
                'type'          => 'checkbox',
                'heading'       => esc_html__('Add Sidebar Margin', 'jnews'),
                'param_name'    => 'set_as_sidebar',
                'value'         => array( esc_html__('Add margin', 'jnews') => 'yes' ),
                'description'   => esc_html__('Set this column as sidebar. By using this column as sidebar, margin and padding of this column will be set to adapt sidebar setting.', 'jnews'),
            ));
        }
    }

    /**
     * Setup Hook
     */
    public function setup_hook()
    {
        add_filter( 'vc_check_post_type_validation',   array($this, 'vc_post_type'), null, 2);
        add_action( 'after_setup_theme',                array($this, 'integrate_vc'));

        add_action( 'init' ,                            array($this, 'additional_element') , 98 );
        add_action( 'admin_enqueue_scripts',            array($this, 'admin_script'));

        add_action( 'wp_ajax_jeg_find_post_tag',        array($this, 'find_ajax_post_tag'));

        add_action( 'vc_google_fonts_get_fonts_filter',      array($this, 'vc_fonts_helper'));
    }

    public function find_ajax_post_tag()
    {
        if ( isset( $_REQUEST[ 'string' ] ) && ! empty( $_REQUEST[ 'string' ] ) )
        {
            $string = $_REQUEST[ 'string' ];
        } else {
            return false;
        }

        $args = array(
            'taxonomy'      => array( 'post_tag' ),
            'orderby'       => 'id',
            'order'         => 'ASC',
            'hide_empty'    => true,
            'fields'        => 'all',
            'name__like'    => $string
        );

        $terms = get_terms( $args );

        $result = array();

        if ( count($terms) > 0 )
        {
            foreach ( $terms as $term )
            {
                $result[] = array(
                    'value' => $term->term_id,
                    'text'  => $term->name
                );
            }
        }

        wp_send_json($result);
    }

    public function find_ajax_post()
    {
        if ( isset( $_REQUEST['nonce'], $_REQUEST['query'] ) && wp_verify_nonce( sanitize_key( $_REQUEST['nonce'] ), 'jeg_find_post' ) ) {
            $query = sanitize_text_field( wp_unslash( $_REQUEST['query'] ) );

            add_filter( 'posts_where', function ( $where ) use ( $query ) {
                global $wpdb;
                $where .= $wpdb->prepare( "
                AND {$wpdb->posts}.post_title LIKE '%%%s%%'",
                    $_REQUEST
                );

                return $where;
            });

            $query = new \WP_Query(
                array(
                    'post_type'      => array( 'post', 'page' ),
                    'posts_per_page' => '15',
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                )
            );

            $result = array();

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();

                    $result[] = array(
                        'value' => get_the_ID(),
                        'text'  => get_the_title()
                    );
                }
            }

            wp_reset_postdata();
            wp_send_json_success( $result );
        }
    }

    public function admin_script()
    {
        wp_enqueue_style('global-admin',        JNEWS_THEME_URL . '/assets/css/admin/vc-admin.css');
        wp_enqueue_style('selectize',           JNEWS_THEME_URL . '/assets/css/admin/selectize.default.css');
        wp_enqueue_style('select2',             JNEWS_THEME_URL . '/assets/css/admin/select2.min.css');

        wp_enqueue_script('jquery-ui-spinner');
        wp_enqueue_script('selectize',          JNEWS_THEME_URL . '/assets/js/vendor/selectize.js');
        wp_enqueue_script('select2',            JNEWS_THEME_URL . '/assets/js/vendor/select2.min.js');
    }

    public function vc_post_type($value, $type)
    {
        if( $type === 'page' || $type === 'footer' || $type === 'custom-post-template' || $type === 'custom-mega-menu' || $type === 'archive-template' ) {
            return true;
        }

        return $value;
    }

    public function integrate_vc()
    {
        if(function_exists('vc_set_as_theme'))
        {
            vc_set_as_theme();
        }
    }

    public function additional_element()
    {
        if (class_exists('WPBakeryVisualComposerAbstract'))
        {
            $params = array(
                array('alert' ,        array($this, 'vc_alert')),
                array('select' ,    array($this, 'vc_select'),       JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('number' ,       array($this, 'vc_number'),          JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('checkblock' ,   array($this, 'vc_checkblock'),      JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('radioimage' ,   array($this, 'vc_radioimage'),      JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('slider' ,       array($this, 'vc_slider'),          JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('attach_file' ,  array($this, 'vc_attach_file'),     JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('sectionid' ,    array($this, 'vc_sectionid'),       JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
                array('fontawesome' ,  array($this, 'vc_fontawesome'),     JNEWS_THEME_URL . '/assets/js/vc/vc.script.js'),
            );

            foreach($params as $param) {
                do_action('jnews_vc_element_parame', $param);
            }
        }
    }


    /**
     * VC Select, Handle both single & multiple select. Also handle Ajax Loaded Option.
     *
     * @param $settings
     * @param $value
     *
     * @return string
     */
    public function vc_select( $settings, $value ) {
        ob_start();

        if ( isset( $settings['value'] ) ) {
            $options = array();
            foreach ( $settings['value'] as $key => $val ) {
                $options[] = array(
                    'value' => $val,
                    'text'  => $key,
                );
            }
        } else {
            $options = call_user_func_array( $settings['options'], array( $value ) );
        }

        $multiple = isset( $settings['multiple'] ) ? $settings['multiple'] : false;

        ?>
        <div class="vc-select-wrapper" data-ajax="<?php echo esc_attr( isset( $settings['ajax'] ) ? $settings['ajax'] : ''  ) ?>"
             data-multiple="<?php echo esc_attr( $multiple ); ?>"
             data-nonce="<?php echo esc_attr( isset( $settings['nonce'] ) ? $settings['nonce'] : ''  ); ?>">
            <?php if ( $multiple > 1 ) { ?>
            <input class='wpb_vc_param_value wpb-input input-sortable multiselect_field <?php echo esc_html( $settings['param_name'] ); ?> <?php echo esc_html( $settings['type'] ) ?>_field'
                   type="text" name="<?php echo esc_attr( $settings['param_name'] ); ?>"
                   value="<?php echo esc_attr( $value ); ?>"/>
                <script class="data-option" type="text/html">
                    <?php echo json_encode( $options ); ?>
                </script>
            <?php } else { ?>
                <select class='wpb_vc_param_value wpb-input input-sortable <?php echo esc_html( $settings['param_name'] ); ?> <?php echo esc_html( $settings['type'] ) ?>_field'
                        name="<?php echo esc_attr( $settings['param_name'] ); ?>">
                    <?php
                    echo "<option value=''></option>";
                    foreach ( $options as $option ) {
                        $select = ( $option['value'] === $value ) ? 'selected' : '';
                        echo "<option value='{$option['value']}' {$select}>{$option['text']}</option>";
                    }
                    ?>
                </select>
            <?php } ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * VC ALERT
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_alert($settings, $value)
    {
        return
            "<div class=\"alert-wrapper\" data-field=\"{$settings['std']}\">
                <input name='{$settings['param_name']}' class='wpb_vc_param_value {$settings['param_name']} {$settings['type']}_field' type='hidden'/>
                <div class=\"vc-alert-element alert-{$settings['std']}\">
                    <strong>{$settings['heading']}</strong>
                    <div class=\"alert-description\">{$settings['description']}</div>
                </div>
            </div>";
    }

    /**
     * VC NUMBER
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_number($settings, $value)
    {
        return
            "<div class='number-input-wrapper'>
                <input name='{$settings['param_name']}'
                    class='wpb_vc_param_value wpb-input {$settings['param_name']} {$settings['type']}_field'
                    type='text'
                    min='{$settings['min']}'
                    max='{$settings['max']}'
                    step='{$settings['step']}'
                    value='{$value}'/>
            </div>";
    }


    /**
     * Check Block
     *
     * @param $setting
     * @param $value
     * @return string
     */
    public function vc_checkblock($setting, $value) {
        $option = '';
        $valuearr = explode(',',$value);

        $option .= "<input name='" . $setting['param_name'] . "' class='wpb_vc_param_value wpb-input " . $setting['param_name'] . " " . $setting['type'] . "_field' type='hidden' value='" . $value ."' />";
        foreach($setting['value'] as $key => $val) {
            $checked = in_array($val, $valuearr) ? "checked='checked'" : "";
            $option .= '<label><input ' . $checked .' class="checkblock" value="' . $val . '" type="checkbox">' . $key . '</label>';
        }

        return
            '<div class="wp-tab-panel vc_checkblock">
                <div>' . $option . '</div>
            </div>';
    }

    /**
     * VC Radio Image
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_radioimage($settings, $value)
    {
        $radio_option = '';
        $radio_input = "<input type='hidden' name='{$settings['param_name']}' value='{$value}' class='wpb_vc_param_value wpb-input{$settings['param_name']}'/>";

        foreach($settings['value'] as $key => $val) {
            $checked = ( $value === $val ) ? "checked" : "";
            $radio_option .=
                "<label>
                <input {$checked} type='radio' name='{$settings['param_name']}_field' value='{$val}' class='{$settings['type']}_field'/>
                <img src='{$key}' class='wpb_vc_radio_image'/>
            </label>";
        }

        return
            "<div class='radio-image-wrapper'>
                {$radio_input}
                {$radio_option}
            </div>";
    }


    /**
     * VC Slider
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_slider($settings, $value)
    {
        return
            "<div class='slider-input-wrapper'>
                <input name='{$settings['param_name']}'
                    class='wpb_vc_param_value wpb-input {$settings['param_name']} {$settings['type']}_field'
                    type='range'
                    min='{$settings['min']}'
                    max='{$settings['max']}'
                    step='{$settings['step']}'
                    value='{$value}'
                    data-reset_value='{$value}'/>
                <div class=\"jnews_range_value\">
                    <span class=\"value\">{$value}</span>
                </div>
                <div class=\"jnews-slider-reset\">
                  <span class=\"dashicons dashicons-image-rotate\"></span>
                </div>
            </div>";
    }


    /**
     * VC Attach File
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_attach_file($settings, $value)
    {
        return
            "<div class='input-uploadfile'>
                <input name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field' type='text' value='$value' />
                <div class='buttons'>
                    <input type='button' value='" . esc_html__( 'Select File', 'jnews' ) . "' class='selectfileimage btn'/>
                </div>
            </div>";
    }


    /**
     * VC Section ID
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_sectionid($settings, $value)
    {
        return
            "<div class='sectionid-input'>
                <input name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field' type='text' value='$value' />
            </div>";
    }


    /**
     * VC Font Awesome
     *
     * @param $settings
     * @param $value
     * @return string
     */
    public function vc_fontawesome($settings, $value)
    {
        $fontawesomelist = $this->get_fontawesome_icons();
        $fontlisttext = '';

        foreach($fontawesomelist as $fontid) {
            if($value == $fontid['value']) {
                $fontlisttext .= "<option selected value='{$fontid['value']}'>{$fontid['value']}</option>";
            } else {
                $fontlisttext .= "<option value='{$fontid['value']}'>{$fontid['value']}</option>";
            }
        }

        return
            "<div class='sectionid-input'>
                <select name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field'>
                    " . $fontlisttext . "
                </select>
            </div>";
    }

    /**
     * @return font awesome
     */
    public function get_fontawesome_icons()
    {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        if( false === ( $icons  = get_transient( 'jnews_fontawesome_icons' ) ) )
        {
            $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';
            $subject = $wp_filesystem->get_contents(JNEWS_THEME_DIR . '/assets/css/font-awesome.min.css');

            preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

            $icons = array();

            foreach($matches as $match)
            {
                $icons[] = array('value' => $match[1], 'label' => $match[1]);
            }
            set_transient( 'jnews_fontawesome_icons', $icons, 60 * 60 * 24 );
        }

        return $icons;
    }

    public function vc_fonts_helper( $fonts_list ) {

        // new font list
        $additional_fonts = array(
            (object) array(
                'font_family' => 'Poppins',
                'font_types'  => '300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal',
                'font_styles' => 'regular',
                'font_family_description' => esc_html__( 'Select font family', 'jnews' ),
                'font_style_description' => esc_html__( 'Select font styling', 'jnews' )
            ),
            (object) array(
                'font_family' => 'Work Sans',
                'font_types'  => '300 Light regular:300:normal,400 Normal Regular:400:normal,500 Medium Regular:500:normal,600 Semi-Bold Regular:600:normal,700 Bold Regular:700:normal',
                'font_styles' => 'regular',
                'font_family_description' => esc_html__( 'Select font family', 'jnews' ),
                'font_style_description' => esc_html__( 'Select font styling', 'jnews' )
            )
        );

        foreach ($additional_fonts as $newfont => $value) {
            $fonts_list[] = $value;
        }

        return $fonts_list;
    }
}
