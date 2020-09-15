<?php

if (!defined('ABSPATH')) exit;


if (!class_exists('ElfsightYoutubeGalleryWidgetsApi')) {
    class ElfsightYoutubeGalleryWidgetsApi {
        private $slug;
        private $file;
        private $textDomain;

        public static $ERROR_DOESNT_EXIST;
        public static $ERROR_PARAM_ID_REQUIRED;
        public static $ERROR_DATA_INVALID;
        public static $ERROR_SQL;

        public function __construct($slug, $file, $text_domain) {
            self::$ERROR_DOESNT_EXIST = esc_html__('Widget with the specified id doesnt exist.', $text_domain);
            self::$ERROR_PARAM_ID_REQUIRED = esc_html__('Parameter "id" is required.', $text_domain);
            self::$ERROR_DATA_INVALID = esc_html__('Incoming data is invalid.', $text_domain);
            self::$ERROR_SQL = esc_html__('An MySQL error occurred while adding new widget.', $this->textDomain);

            $this->slug = $slug;
            $this->file = $file;
            $this->textDomain = $text_domain;

            register_activation_hook($this->file, array($this, 'upgrade'));
            add_action('rest_api_init', array($this, 'registerRoutes'));
        }

        public function registerRoutes() {
            register_rest_route($this->slug, '/admin/widgets/(?P<endpoint>[\w-]+)', array(
                'methods' => 'GET, POST',
                'callback' => array($this, 'restApi'),
                'args' => array(
                    'endpoint' => array(
                        'required' => true
                    )
                )
            ));
        }

        public function restApi(\WP_REST_Request $request) {
            $result = array();

            $method = $request->get_method();
            $endpoint = $request->get_param('endpoint');
            $endpoint_handler_name = strtolower($method) . ucfirst($endpoint);

            if (!wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest')) {
                $this->apiResponse(array(
                    'status' => false,
                    'error' => __('Scrape nonce check failed. Please try again.')
                ));
            }

            if (!method_exists($this, $endpoint_handler_name)) {
                $this->apiResponse(array(
                    'status' => false,
                    'error' => sprintf('Unknown endpoint "%s/%s"', $method, $endpoint)
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

        public function upgrade() {
            if ($this->tableExists()) {
                $this->alterTable();
            } else {
                $this->createTable();
            }
        }

        public function alterTable() {
            global $wpdb;

            $is_old_sql = version_compare($wpdb->db_version(), '5.5.3', '<=');
            $table_collate = $is_old_sql ? 'utf8_general_ci' : 'utf8mb4_general_ci';
            $table_name = $this->getTableName();

            $wpdb->query("ALTER TABLE $table_name MODIFY `options` longtext COLLATE $table_collate NOT NULL;");
        }

        public function tableExists() {
            global $wpdb;

            return !!$wpdb->get_var($wpdb->prepare(
                "SHOW TABLES LIKE %s",
                $this->getTableName()
            ));
        }

        public function createTable() {
            global $wpdb;

            $is_old_sql = version_compare($wpdb->db_version(), '5.5.3', '<=');
            $table_collate = $is_old_sql ? 'utf8_general_ci' : 'utf8mb4_general_ci';
            $table_name = $this->getTableName();

            $wpdb->query(
                "CREATE TABLE $table_name (
                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) NOT NULL,
                    `time_created` varchar(10) NOT NULL,
                    `time_updated` varchar(10) NOT NULL,
                    `active` int(1) NOT NULL DEFAULT 1,
                    `options` longtext COLLATE $table_collate NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;"
            );
        }

        public function getTableName() {
            global $wpdb;

            return esc_sql($wpdb->prefix . str_replace('-', '_', $this->slug) . '_widgets');
        }

        public function getList(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();
            $id = $this->input('id', null);
            $id = $id ? esc_sql(intval($id)) : null;

            $query = "SELECT * FROM $table_name WHERE `active` = 1";

            if ($id) {
                $query .= " AND `id` = $id";
            }

            $query .= " ORDER BY `id` DESC";

            $list = $wpdb->get_results($query, ARRAY_A);

            $result['status'] = is_null($list) ? false : true;

            foreach ($list as &$widget) {
                $options_raw_json = $widget['options'];
                $widget['options'] = json_decode($options_raw_json);
            }

            $result['data'] = $list;
        }

        public function postAdd(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $options_json = null;
            $invalid_fields = array();

            if (empty($_POST['name']) || strlen($_POST['name']) > 255) {
                $invalid_fields[] = 'name';
            }

            if (empty($_POST['options'])) {
                $invalid_fields[] = 'options';

            } else {
                $options_json = $this->formatInputOptions($_POST['options']);
                $options_json = apply_filters(str_replace('-', '_', $this->slug) . '_widget_options', $options_json);

                if (!json_decode($options_json)) {
                    $invalid_fields[] = 'options';
                }
            }

            if ($invalid_fields) {
                $result['status'] = false;
                $result['error'] = self::$ERROR_DATA_INVALID;
                $result['invalid_fields'] = $invalid_fields;
            } else {
                $status = !!$wpdb->insert($table_name, array(
                    'name' => $_POST['name'],
                    'time_created' => time(),
                    'time_updated' => time(),
                    'active' => 1,
                    'options' => $options_json
                ));

                $result['status'] = $status;
                $result['id'] = $wpdb->insert_id;

                if (!$status) {
                    $result['error'] = self::$ERROR_SQL;

                } else if (get_option(str_replace('-', '_', $this->slug) . '_widgets_clogged') !== 'true') {
                    update_option(str_replace('-', '_', $this->slug) . '_widgets_clogged', 'true');
                }
            }
        }

        public function postRemove(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;

            if (!$id) {
                $result['status'] = false;
                $result['error'] = self::$ERROR_PARAM_ID_REQUIRED;

                return;
            }

            $status = !!$wpdb->update(
                $table_name,
                array(
                    'active' => 0,
                    'time_updated' => time()
                ),
                array('id' => $id)
            );
            $result['status'] = $status;

            if (!$status) {
                $result['error'] = self::$ERROR_DOESNT_EXIST;
            }
        }

        public function postRestore(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();
            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;

            if (!$id) {
                $result['status'] = false;
                $result['error'] = self::$ERROR_PARAM_ID_REQUIRED;

                return;
            }

            $status = !!$wpdb->update(
                $table_name,
                array(
                    'active' => 1,
                    'time_updated' => time()
                ),
                array('id' => $id)
            );
            $result['status'] = $status;

            if (!$status) {
                $result['error'] = self::$ERROR_DOESNT_EXIST;
            }
        }

        public function postUpdate(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();
            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;
            $name = !empty($_POST['name']) ? $_POST['name'] : null;
            $options_json = !empty($_POST['options']) ? $this->formatInputOptions($_POST['options']) : null;
            $options_json = apply_filters(str_replace('-', '_', $this->slug) . '_widget_options', $options_json);

            if (!$id) {
                $result['status'] = false;
                $result['error'] = self::$ERROR_PARAM_ID_REQUIRED;

                return;
            }

            $invalid_fields = array();
            $fields = array('time_updated' => time());

            if ($name) {
                if (strlen($name) > 255) {
                    $invalid_fields[] = 'name';

                } else {
                    $fields['name'] = $name;
                }
            }

            if ($options_json) {
                if (!json_decode($options_json)) {
                    $invalid_fields[] = 'options';

                } else {
                    $fields['options'] = $options_json;
                }
            }

            if ($invalid_fields) {
                $result['status'] = false;
                $result['error'] = self::$ERROR_DATA_INVALID;
                $result['invalid_fields'] = $invalid_fields;

            } else {
                $status = !!$wpdb->update(
                    $table_name,
                    $fields,
                    array('id' => $id)
                );
                $result['status'] = $status;

                if (!$status) {
                    $result['error'] = self::$ERROR_DOESNT_EXIST;
                }
            }
        }

        public function formatInputOptions($options) {
            $options = rawurldecode($options);
            $options = str_replace("\'", "\u0027", $options); // JSON_HEX_APOS

            return $options;
        }

        protected function input($name, $default = null) {
            $query = array();

            if (empty($_REQUEST)) {
                $parsed_url = parse_url($_SERVER['REQUEST_URI']);

                if (isset($parsed_url['query'])) {
                    parse_str($parsed_url['query'], $query);
                }
            } else {
                $query = $_REQUEST;
            }

            $value = isset($query[$name]) ? $query[$name] : $default;

            return urldecode($value);
        }
    }
}
