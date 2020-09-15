<?php
/**
 * @author : Jegtheme
 */
namespace JNews;

use JNews\Dashboard\AdminDashboard;
use JNews\Asset\BackendAsset;
use JNews\Asset\FrontendAsset;
use JNews\Comment\CommentNumber;
use JNews\Customizer\CustomizerRedirect;
use JNews\Footer\FooterBuilder;
use JNews\Helper\StyleHelper;
use JNews\Image\Image;
use JNews\Menu\CustomMegaMenu;
use JNews\Menu\Menu;
use JNews\Elementor\ModuleElementor;
use JNews\Module\ModuleManager;
use JNews\Module\ModuleVC;
use JNews\Module\TemplateLibrary;
use JNews\Multilang\Polylang;
use JNews\Multilang\WPML;
use JNews\Single\SinglePostTemplate;
use JNews\Archive\Builder\ArchiveBuilder;
use JNews\Util\ValidateLicense;
use JNews\Util\VideoAttribute;
use JNews\Widget\AdditionalWidget;
use JNews\Widget\EditWidgetArea;
use JNews\Widget\Module\RegisterModuleWidget;
use JNews\Widget\Normal\RegisterNormalWidget;
use JNews\Widget\Widget;
use JNews\Widget\WidgetTitle;

/**
 * Starting Point for JNews Themes
 *
 * Class JNews Init
 */
class Init
{
    /**
     * @var Init
     */
    private static $instance;

    /**
     * @return Init
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct()
    {
        $this->load_helper();
        $this->init_themes();
        $this->load_textdomain();
        $this->setup_hook();
        $this->populate_metabox();

        TemplateLibrary::getInstance();
    }

    public function load_helper()
    {
        // Load Plugin Helper
        require_once get_parent_theme_file_path( 'lib/theme-helper.php' );
        require_once get_parent_theme_file_path( 'lib/theme-filter.php' );

        // Load class helper
        require_once get_parent_theme_file_path( 'lib/class-helper.php' );
    }

    public function populate_metabox()
    {
        new Metabox();
    }

    public function load_textdomain()
    {
        load_theme_textdomain('jnews', get_parent_theme_file_path('languages'));
    }

    public function multilang() {
        if ( class_exists('Polylang') ) {
            // multilanguage
            Polylang::getInstance();
        }

        if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
            // WPML multilanguage
            WPML::getInstance();
        }
    }

    public function frontend_script()
    {
        // Front End
        if(!is_admin())
        {
            // Frontend Ajax
            FrontendAjax::getInstance();

            // Style Helper
            StyleHelper::getInstance();

            // Ads
            Ads::getInstance();

            // load frontend asset
            FrontendAsset::getInstance();

            // Comment Number
            CommentNumber::getInstance();
        }
    }

    public function backend_script()
    {
        // Back End
        if(is_admin())
        {
            // dashboard
            AdminDashboard::getInstance();

            // License
            ValidateLicense::getInstance();

            // load backend asset
            BackendAsset::getInstance();

            // Load header builder on backend
            HeaderBuilder::getInstance();

            // Need to load video attribute
	        VideoAttribute::getInstance();
        }
    }

    public function init_themes()
    {
        // Themes Menu
        Menu::getInstance();

        // Custom Mega Menu
        CustomMegaMenu::getInstance();

        // Customizer
        Customizer::getInstance();

        // Initialize Image
        Image::getInstance();

        // Shortcode
        Shortcode::getInstance();

        // Footer Builder
        FooterBuilder::getInstance();

        // Archive Builder
        ArchiveBuilder::getInstance();

        // Single Post Builder
        SinglePostTemplate::getInstance();

        // Account Page
        AccountPage::getInstance();

        // Multi language Initialize
        $this->multilang();

        // frontend script
        $this->frontend_script();

        // backend script
        $this->backend_script();

        // Load Visual Composer
        $this->load_module();

        // Load Widget
        $this->load_widget();

        // Init Gutenberg
        Gutenberg::getInstance();
    }

    public function load_module()
    {
        ModuleManager::getInstance();
        ModuleVC::getInstance();
        ModuleElementor::getInstance();
    }

    public function load_widget()
    {
        Widget::getInstance();
        WidgetTitle::getInstance();

        if (apply_filters('jnews_load_all_widget', false))
        {
            $this->load_widget_element();
        }
    }

    public function load_widget_element()
    {
        EditWidgetArea::getInstance();
        AdditionalWidget::getInstance();

        RegisterNormalWidget::getInstance();
        RegisterModuleWidget::getInstance();
    }

    public function setup_hook()
    {
	    define('YP_THEME_MODE', 'true');

	    add_action( 'after_setup_theme',                array($this, 'themes_support'));
        add_action( 'admin_enqueue_scripts',            array($this, 'load_admin_style'));
        add_action( 'customize_preview_init',           array($this, 'preview_init'));
        add_action( 'admin_head',                       array($this, 'admin_ajax_url' ), 1 );
        add_action( 'after_switch_theme',               array($this, 'flush_rewrite_rules' ));

        if ( apply_filters( 'jnews_load_post_subtitle', false ) ) {
            // Post Subtitle Field
            add_action('edit_form_before_permalink', array($this, 'post_subtitle_field'));
            add_action('edit_post', array($this, 'post_subtitle'));
            add_action('save_post', array($this, 'post_subtitle'));
        }
	    add_action( 'admin_notices', array( $this, 'plugin_update_notice' ) );
    }

	public function plugin_update_notice() {
		if ( ! is_admin() ) {
			// do nothing
		} else {
			$groups = jnews_plugin_group();
			echo jnews_sanitize_by_pass( $this->print_plugin_update_notice( $groups ) );
		}
	}

	public function plugin_update_notice_text( $plugin, $action ) {
		$link = apply_filters( 'jnews_plugin_action_url', $plugin['slug'], $action );
		$html =
			'<div class="notice notice-warning">
                <p>
                <span class="jnews-notice-heading">' . sprintf( esc_html__( '%s Requires %s', 'jnews' ), $plugin['name'], ucfirst( $action ) ) . '</span>
                <span style="display: block;">' . sprintf( __( 'Please %s %s plugin to version <strong>%s</strong> or higher.', 'jnews' ), $action, $plugin['name'], '5.0.2' ) . '</span>
                <span class="jnews-notice-button">
                    <a href="' . esc_url( $link ) . '" class="button-primary">' . ucfirst( $action ) . ' Now</a>
                    </span>
                </p>
                <span class="close-button"><i class="fa fa-times"></i></span>
            </div>';

		return $html;
	}

	public function print_plugin_update_notice( $groups ) {
        load_jnews_plugin_activation();
		do_action( 'jnews_tgmpa_register' );
		$tgm_instance = call_user_func( array( get_class( $GLOBALS['jnews_tgmpa'] ), 'get_instance' ) );
		$notice       = '';
		$required     = array( 'jnews-essential' );
		foreach ( $groups as $key => $group ) {
			foreach ( $group['items'] as $plugin ) {

				if ( in_array( $plugin['slug'], $required ) ) {

					// maybe in the future need to send warning notice if the plugin isn't installed

					if ( $tgm_instance->is_plugin_installed( $plugin['slug'] ) ) {

					    // send warning notice to users about the required plugin version in the latest theme version

                        if ( defined( 'JNEWS_ESSENTIAL' ) ) {
							$plugin_data    = get_plugin_data( JNEWS_ESSENTIAL_FILE );
							$plugin_version = $plugin_data['Version'];

							if ( version_compare( $plugin_version, '5.0.1', '<' ) ) {

								$notice .= $this->plugin_update_notice_text( $plugin, 'update' );

							}
						}
					}
				}
			}
		}

		return $notice;
	}

    public function flush_rewrite_rules()
    {
        // $this->add_rewrite_rule();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

    public function preview_init()
    {
        // Theme Customizer Redirect Tag Init
         CustomizerRedirect::getInstance();
    }

    public function load_admin_style()
    {
        add_editor_style(get_parent_theme_file_uri('assets/css/admin/editor.css'));
        if ( is_rtl() ) {
            add_editor_style(get_parent_theme_file_uri('assets/css/admin/editor-rtl.css'));
        }
    }

    public function themes_support()
    {
        // support feed link
        add_theme_support( 'automatic-feed-links' );

        // title tag
        add_theme_support( 'title-tag' );

        // featured image
        add_theme_support( 'post-thumbnails' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // selective refresh widget
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Supported post type
        add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

        // HTML 5 support
        add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );

        // support woocommerce
        add_theme_support( 'woocommerce' );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // auto load next post
        add_theme_support( 'auto-load-next-post' );

        // gutenberg optimized
        add_theme_support( 'editor-styles' );
        add_editor_style( 'style-editor.css' );

        // add excerpt to page to avoid showing shortode on search page
        add_post_type_support( 'page', 'excerpt' );
    }

    public function post_subtitle_field($post)
    {
        if ( $post->post_type === 'post' )
        {
            $post_subtitle = get_post_meta( $post->ID, 'post_subtitle', true );
            $subtitle = ! empty( $post_subtitle ) ? esc_html( $post_subtitle ) : '';

            echo '<div id="jnews_post_subtitle">
                    <input type="text" name="post_subtitle" value="' . $subtitle . '" spellcheck="true" autocomplete="off" placeholder="' . esc_attr__('Enter subtitle here', 'jnews') . '" />
                </div>';
        }
    }

    public function post_subtitle($post_id)
    {
        if ( !defined('XMLRPC_REQUEST') && isset($_POST['post_subtitle']) )
        {
            update_post_meta( $post_id, 'post_subtitle', sanitize_text_field($_POST['post_subtitle']));
            update_post_meta( $post_id, 'post_subtitle_flag', false );
        }
    }

    public function admin_ajax_url() {
        ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
        </script>
        <?php
    }
}
