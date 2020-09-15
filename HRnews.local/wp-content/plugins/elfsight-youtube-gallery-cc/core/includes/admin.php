<?php

if (!defined('ABSPATH')) exit;


if (!class_exists('ElfsightYoutubeGalleryPluginAdmin')) {
    class ElfsightYoutubeGalleryPluginAdmin {
        private $name;
        private $description;
        private $slug;
        private $version;
        private $textDomain;
        private $editorSettings;
        private $editorPreferences;
        private $menuIcon;
        private $menuId;

        private $pluginName;
        private $pluginFile;

        private $updateUrl;
        private $previewUrl;
        private $observerUrl;

        private $productUrl;
        private $productReviewUrl;
        private $productFacebookReviewUrl;
        private $supportUrl;

        private $widgetsApi;

        private $user;
        private $capability;
        private $roleCapabitily = array(
            'admin' => 'manage_options',
            'editor' => 'edit_pages',
            'author' => 'publish_posts'
        );

        private $pages;
        private $customPages;
        private $menu;

        public function __construct($config, $widgetsApi) {
            $this->name = $config['name'];
            $this->description = $config['description'];
            $this->slug = $config['slug'];
            $this->version = $config['version'];
            $this->textDomain = $config['text_domain'];
            $this->editorSettings = $config['editor_settings'];
            $this->editorPreferences = $config['editor_preferences'];
            $this->menuIcon = $config['menu_icon'];

            $this->pluginName = $config['plugin_name'];
            $this->pluginFile = $config['plugin_file'];

            $this->updateUrl = $config['update_url'];

            $this->previewUrl = (isset($config['preview_url']) ? $config['preview_url'] : plugins_url('preview/preview.html', $this->pluginFile)) . "?v={$this->version}";
            $this->observerUrl = (isset($config['observer_url']) ? $config['observer_url'] : plugins_url('preview/observer.js', $this->pluginFile)) . "?v={$this->version}";

            $this->customScriptUrl = !empty($config['admin_custom_script_url']) ? $config['admin_custom_script_url'] : null;
            $this->customStyleUrl = !empty($config['admin_custom_style_url']) ? $config['admin_custom_style_url'] : null;

            $this->productUrl = $config['product_url'];
            $this->productReviewUrl = 'https://codecanyon.net/downloads';
            $this->productFacebookReviewUrl = 'https://www.facebook.com/pg/elfsight/reviews/';
            $this->supportUrl = $config['support_url'];

            $this->capability = apply_filters('elfsight_admin_capability', $this->roleCapabitily[get_option($this->getOptionName('access_role'), 'admin')]);

            $this->customPages = !empty($config['admin_custom_pages']) ? $config['admin_custom_pages'] : array();
            $this->pages = $this->generatePages();
            $this->menu = $this->generateMenu();

            $this->widgetsApi = $widgetsApi;

            add_action('admin_menu', array($this, 'addMenuPage'));
            add_action('admin_init', array($this, 'getUser'));
            add_action('admin_init', array($this, 'registerAssets'));
            add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));
            add_action('rest_api_init', array($this, 'registerRoutes'));
        }

        public function registerRoutes() {
            register_rest_route($this->slug, '/admin/(?P<endpoint>[\w-]+)', array(
                'methods' => 'GET, POST',
                'callback' => array($this, 'restApi'),
                'args' => array(
                    'endpoint' => array(
                        'required' => true
                    )
                )
            ));
        }

        public function restApi(WP_REST_Request $request) {
            $result = array();

            $endpoint = $request->get_param('endpoint');
            $endpoint_handler_name = lcfirst(str_replace('-', '', ucwords($endpoint, '-')));

            if (!wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest')) {
                $this->response(array(
                    'status' => false,
                    'error' => __('Scrape nonce check failed. Please try again.')
                ));
            }

            if (!method_exists($this, $endpoint_handler_name)) {
                $this->apiResponse(array(
                    'status' => false,
                    'error' => sprintf('Unknown endpoint "%s"', $endpoint_handler_name)
                ));
            }

            call_user_func_array(array($this, $endpoint_handler_name), array(&$result));

            $this->apiResponse($result);
        }

        public function apiResponse($result) {
            if (ob_get_length()) {
                ob_end_clean();
                ob_start();
            }

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($result);

            exit;
        }

        public function addMenuPage() {
            $this->menuId = add_menu_page($this->name, $this->name, $this->capability, $this->slug, array($this, 'getPage'), $this->menuIcon);
        }

        public function getUser() {
            $user = wp_get_current_user();
            $domain = str_replace('www.', '', parse_url(site_url(), PHP_URL_HOST));
            $public_id = str_replace('.', '-', $domain) . '-' . $user->ID;

            $this->user = array(
                'id' => $user->ID,
                'public_id' => $public_id,
                'email' => $user->user_email,
                'display_name' => $user->display_name,
            );
        }

        public function registerAssets() {
            wp_register_style($this->slug . '-admin', plugins_url('assets/elfsight-admin.css', $this->pluginFile), array(), $this->version);
            wp_register_script($this->slug . '-admin', plugins_url('assets/elfsight-admin.js', $this->pluginFile), array('jquery', 'wp-api'), $this->version, true);
            wp_register_script($this->slug . '-editor', plugins_url('assets/elfsight-editor.js', $this->pluginFile), array('angular', 'angular-slider'), $this->version, true);

            wp_register_script('signals', plugins_url('assets/vendors/signals.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('crossroads', plugins_url('assets/vendors/crossroads.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('jquery-tablesorter', plugins_url('assets/vendors/jquery.tablesorter.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('clipboard', plugins_url('assets/vendors/clipboard.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('hasher', plugins_url('assets/vendors/hasher.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('ace', plugins_url('assets/vendors/ace/ace.js', $this->pluginFile), array(), null, true);
            wp_register_script('angular', plugins_url('assets/vendors/angular.min.js', $this->pluginFile), array(), null, true);
            wp_register_script('angular-slider', plugins_url('assets/vendors/rzslider.min.js', $this->pluginFile), array(), null, true);

            if ($this->customStyleUrl) {
                wp_register_style($this->slug . '-admin-custom', $this->customStyleUrl, array($this->slug . '-admin'), $this->version);
            }

            if ($this->customScriptUrl) {
                wp_register_script($this->slug . '-admin-custom', $this->customScriptUrl, array($this->slug . '-admin'), $this->version, true);
            }
        }

        public function enqueueAssets($hook) {
            if ($hook && $hook == $this->menuId) {
                wp_enqueue_style($this->slug . '-admin');

                if ($this->customStyleUrl) {
                    wp_enqueue_style($this->slug . '-admin-custom');
                }

                wp_enqueue_script('angular');
                wp_enqueue_script('angular-slider');
                wp_enqueue_script('signals');
                wp_enqueue_script('crossroads');
                wp_enqueue_script('jquery-tablesorter');
                wp_enqueue_script('clipboard');
                wp_enqueue_script('hasher');
                wp_enqueue_script('ace');
                wp_enqueue_script($this->slug . '-editor');
                wp_enqueue_script($this->slug . '-admin');

                if ($this->customScriptUrl) {
                    wp_enqueue_script($this->slug . '-admin-custom');
                }

                wp_enqueue_media();

                remove_action('wp_head', 'print_emoji_detection_script', 7);
                remove_action('wp_print_styles', 'print_emoji_styles');
                remove_action('admin_print_scripts', 'print_emoji_detection_script');
                remove_action('admin_print_styles', 'print_emoji_styles');
            }
        }

        public function getPage() {
            $this->widgetsApi->upgrade();

            $widgets_clogged = get_option($this->getOptionName('widgets_clogged'), '');

            $uploads_dir_params = wp_upload_dir();
            $uploads_dir = $uploads_dir_params['basedir'] . '/' . $this->slug;

            $custom_css_path = $uploads_dir . '/' . $this->slug . '-custom.css';
            $custom_js_path = $uploads_dir . '/' . $this->slug . '-custom.js';

            $preferences_custom_css = is_readable($custom_css_path) ? file_get_contents($custom_css_path) : '';
            $preferences_custom_js = is_readable($custom_js_path) ? file_get_contents($custom_js_path) : '';
            $preferences_force_script_add = get_option($this->getOptionName('force_script_add'));
            $preferences_access_role = get_option($this->getOptionName('access_role'), 'admin');
            $preferences_auto_upgrade = get_option($this->getOptionName('auto_upgrade'), 'on');

            $purchase_code = get_option($this->getOptionName('purchase_code'), '');
            $activated = get_option($this->getOptionName('activated'), '') === 'true';
            $supported_until = get_option($this->getOptionName('supported_until'), 0);
            $latest_version = get_option($this->getOptionName('latest_version'), '');
            $last_check_datetime = get_option($this->getOptionName('last_check_datetime'), '');
            $has_new_version = !empty($latest_version) && version_compare($this->version, $latest_version, '<');
            $host = parse_url(site_url(), PHP_URL_HOST);

            $supportUrlParts = explode('#', $this->supportUrl);
            $supportEmbedUrl = count($supportUrlParts) == 2 ? ($supportUrlParts[0] . '?embed=true&purchase_code=' . $purchase_code . '#' . $supportUrlParts[1]) : '';

            $last_upgraded_at = get_option($this->getOptionName('last_upgraded_at'));

            $activation_css_classes = array();
            if ($activated) {
                array_push($activation_css_classes, 'elfsight-admin-activation-activated');
            } else if (!empty($purchase_code)) {
                array_push($activation_css_classes, 'elfsight-admin-activation-invalid');
            }
            if ($has_new_version) {
                array_push($activation_css_classes, 'elfsight-admin-activation-has-new-version');
            }

            ?>
            <div class="<?= implode(' ', $activation_css_classes); ?> elfsight-admin wrap">
            <h2 class="elfsight-admin-wp-notifications-hack"></h2>

            <script>
                window.pluginParams = {
                    restApiUrl: '<?= rest_url($this->slug . '/admin/') ?>',
                }
            </script>

            <div class="elfsight-admin-wrapper">
                <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'header.php'))); ?>

                <main class="elfsight-admin-main elfsight-admin-loading"
                      data-elfsight-admin-slug="<?php echo esc_html($this->slug); ?>"
                      data-elfsight-admin-user='<?php echo esc_html(json_encode($this->user, JSON_HEX_QUOT)); ?>'
                      data-elfsight-admin-widgets-clogged="<?php echo esc_html($widgets_clogged); ?>">
                    <div class="elfsight-admin-loader"></div>

                    <div class="elfsight-admin-menu-container">
                        <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'menu.php'))); ?>

                        <?php require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'menu-actions.php'))); ?>
                    </div>

                    <div class="elfsight-admin-pages-container">
                        <?php
                            foreach ($this->pages as $page) {
                                require_once($page['template']);
                            }
                        ?>
                    </div>
                </main>

                <?php
                    if (!get_option($this->getOptionName('rating_sent'))) {
                        require_once(plugin_dir_path(__FILE__) . implode(DIRECTORY_SEPARATOR, array('templates', 'popup-rating.php')));
                    }
                ?>
            </div>
            </div>
        <?php }

        public function updatePreferences(&$result) {
            // options
            if (isset($_REQUEST['option'])) {
                $option = $_REQUEST['option'];

                update_option($this->getOptionName($option['name']), $option['value']);

                $result['success'] = true;
            }

            // custom css
            if (isset($_REQUEST['preferences_custom_css'])) {
                $file_type = 'css';
                $file_content = $_REQUEST['preferences_custom_css'];
            }

            // custom js
            if (isset($_REQUEST['preferences_custom_js'])) {
                $file_type = 'js';
                $file_content = $_REQUEST['preferences_custom_js'];
            }

            if (isset($file_content) && isset($file_type)) {
                $uploads_dir_params = wp_upload_dir();
                $uploads_dir = $uploads_dir_params['basedir'] . '/' . $this->slug;

                if (!is_dir($uploads_dir)) {
                    wp_mkdir_p($uploads_dir);
                }

                $path = $uploads_dir . '/' . $this->slug . '-custom.' . $file_type;

                if (file_exists($path) && !is_writable($path)) {
                    $result['success'] = false;
                    $result['error'] = esc_html__('The file can not be overwritten. Please check the file permissions.', $this->textDomain);

                } else {
                    file_put_contents($path, stripslashes($file_content));
                    $result['success'] = true;
                }
            }
        }

        public function updateActivationData(&$result) {
            update_option($this->getOptionName('purchase_code'), !empty($_REQUEST['purchase_code']) ? $_REQUEST['purchase_code'] : '');
            update_option($this->getOptionName('activated'), !empty($_REQUEST['activated']) ? $_REQUEST['activated'] : '');
            update_option($this->getOptionName('supported_until'), !empty($_REQUEST['supported_until']) ? $_REQUEST['supported_until'] : '');

            $result['success'] = true;
        }

        public function ratingSend(&$result) {
            $support_email = 'support@elfsight.com';
            $subject = esc_html__('New rating for CodeCanyon', $this->textDomain);

            $headers = 'From: ' . $_SERVER['SERVER_NAME'] . ' <' . get_option('admin_email') .'>' . "\r\n";
            $headers .= 'Reply-To: ' . get_option('admin_email') . "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            $value = $_REQUEST['value'];
            $comment = $_REQUEST['comment'];
            $productReviewsListUrl = preg_replace('/^(.*)\/(\d*)\?(.*)$/', '$1/reviews/$2', $this->productUrl);

            $text = sprintf(
                '<h1 style="color: %s;">%s</h1>',
                $value === '5' ? 'green' : 'red',
                $value === '5' ? esc_html__('Hooray!', $this->textDomain) : esc_html__('Warning!', $this->textDomain)
            );

            $text .= sprintf(
                '<p>%s %s %s</p>',
                esc_html__('New', $this->textDomain),
                sprintf(
                    '<b style="font-size: 24px; color: %s;">%s %s</b>',
                    $value === '5' ? 'green' : 'red',
                    $value,
                    esc_html__('stars', $this->textDomain)
                ),
                sprintf(
                    esc_html__('rating for %s on CodeCanyon', $this->textDomain),
                    $this->pluginName
                )
            );

            if (!empty($comment)) {
                $text .= sprintf(
                    '<p>%s: </p><blockquote><p>%s</p></blockquote>',
                    esc_html__('With comment', $this->textDomain),
                    $comment
                );
            }

            if ($value === '5') {
                $text .= '<hr>'. sprintf(
                    '<p>%s: %s</p>',
                    esc_html__('Check rating on Code Canyon', $this->textDomain),
                    sprintf(
                        '<a href="%s" target="_blank" rel="nofollow">%s</a>',
                        esc_url($productReviewsListUrl),
                        esc_url($productReviewsListUrl)
                    )
                );
            }

            add_option($this->getOptionName('rating_sent'), 'true');
            $status = wp_mail($support_email, $subject, $text, $headers);

            $result['success'] = $status;
        }

        private function getOptionName($name) {
            return str_replace('-', '_', $this->slug) . '_' . $name;
        }

        private function generatePages() {
            $plugin_dir = plugin_dir_path(__FILE__);
            $default_pages = array(
                array(
                    'id' => 'welcome',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-welcome.php'))
                ),
                array(
                    'id' => 'widgets',
                    'menu_title' => translate('Widgets', $this->textDomain),
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-widgets.php'))
                ),
                array(
                    'id' => 'edit-widget',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-edit-widget.php'))
                ),
                array(
                    'id' => 'preferences',
                    'menu_title' => translate('Preferences', $this->textDomain),
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-preferences.php'))
                ),
                array(
                    'id' => 'support',
                    'menu_title' => translate('Support', $this->textDomain),
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-support.php'))
                ),
                array(
                    'id' => 'activation',
                    'menu_title' => translate('Activation', $this->textDomain),
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-activation.php')),
                    'notification' => translate('The plugin is not activated', $this->textDomain)
                ),
                array(
                    'id' => 'error',
                    'template' => $plugin_dir . implode(DIRECTORY_SEPARATOR, array('templates', 'page-error.php'))
                )
            );

            return array_merge($default_pages, $this->customPages);
        }

        private function generateMenu() {
            $menu = array();

            foreach ($this->pages as $page) {
                if (!empty($page['menu_title'])) {
                    array_splice($menu, isset($page['menu_index']) ? $page['menu_index'] : count($this->pages), 0, array($page));
                }
            }

            return $menu;
        }
    }

}

?>
