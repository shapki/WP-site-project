<?php

/**
 * Gutenberg block to display Post Form.
 *
 * @package BFE;
 */

namespace BFE;

defined('ABSPATH') || exit;

/**
 * Class Post Form - registers custom gutenberg block.
 */
class Form
{
    /**
     * Init logic.
     */
    public static function init()
    {
        require_once __DIR__ . '/fields/PostTitleField.php';
        require_once __DIR__ . '/fields/PostThumbField.php';
        require_once __DIR__ . '/fields/TinyMCE.php';
        require_once __DIR__ . '/fields/EditorJsField.php';
        require_once __DIR__ . '/fields/TaxonomiesFields.php';
        require_once __DIR__ . '/fields/TextField.php';
        require_once __DIR__ . '/fields/TextareaField.php';
        require_once __DIR__ . '/fields/MdEditor.php';
        require_once __DIR__ . '/fields/FileField.php';
        require_once __DIR__ . '/fields/SelectField.php';
        require_once FE_PLUGIN_DIR_PATH . '/inc/PostFormsListTable.php';

        /**
         * Registering custom post type
         */
        add_action('init', [__CLASS__, 'register_post_types']);

        /**
         * Adding scripts to custom post type
         */
        add_action('admin_enqueue_scripts', [__CLASS__, 'add_admin_scripts'], 10, 1);

        /**
         * Get formBuilder data
         */
        add_action('wp_ajax_fe_get_formBuilder_data', [__CLASS__, 'fe_get_formBuilder_data']);

        add_action('wp_ajax_save_post_front_settings', [__CLASS__, 'save_post_front_settings']);

        add_action('rest_api_init', [__CLASS__, 'new_endpoints']);
    }


    public static function new_endpoints()
    {
        register_rest_route('bfe/v1', '/form', [
            'methods' => 'POST',
            'callback' => [__CLASS__, 'fe_get_formBuilder_data'],
            'permission_callback' => function () {
                return current_user_can('edit_others_posts');
            }
        ]);

        register_rest_route('bfe/v1', '/add-update-form', [
            'methods' => 'POST',
            'callback' => [__CLASS__, 'save_post_front_settings'],
            'permission_callback' => function () {
                return current_user_can('edit_others_posts');
            }
        ]);
    }

    /**
     * Get formBuilder data
     *
     * @return void
     */
    public static function fe_get_formBuilder_data(\WP_REST_Request $request)
    {

        /**
         * If this is auto save do nothing
         */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        $post_ID = isset($request['post_id']) ? sanitize_text_field($request['post_id']) : false;

        $data = [
            'ajax_url' => admin_url('admin-ajax.php'),
            'settings' => [
                'post_type' => sanitize_text_field($request['post_type']),
                'post_id' => $post_ID,
            ],
            'formBuilder_options' => [
                //'prepend' => sprintf('<h2>%s</h2>', __('Post Title', FE_TEXT_DOMAIN)),
                'fields' => [], // New field creation
                'typeUserAttrs' => [], // Custom attr settings for fields,
                'disabledFieldButtons' => [],
                'disableProFields' => [],
                'defaultFields' => [],
                'typeUserDisabledAttrs' => [ // Disable attributes
                    'paragraph' => ['access']
                ],
                'disable_attr' => [],
                'attr_descriptions' => [
                    'name' =>  __('This field value will be saved into post meta using this name.', FE_TEXT_DOMAIN),
                    'description' => __('Help text will be shown under this field on the front end form.', FE_TEXT_DOMAIN),
                ],
                'templates' => [],
                'temp_back' => [],
                'disableFields' => ['autocomplete', 'paragraph',  'button', 'checkbox-group', 'header', 'hidden', 'radio-group', 'number'],
                'defaultControls' => ['text'],
                'controls_group' => [
                    'post_fields' => [
                        'label' => __('Post Fields', FE_TEXT_DOMAIN),
                        'types' => []
                    ],
                    'taxonomies' => [
                        'label' => __('Taxonomies', FE_TEXT_DOMAIN),
                        'types' => []
                    ],
                    'custom_fields' => [
                        'label' => __('Custom Fields', FE_TEXT_DOMAIN),
                        'types' => []
                    ],
                ],
                'disabledFieldButtons' => [],
                'controlOrder' => [],
                'disabledActionButtons' => ['data', 'clear', 'save'],
                'messages' => [
                    'max_fields_warning' => __('You already have this field in the form', FE_TEXT_DOMAIN),
                    'for_pro_title' => __('Available in Pro version', FE_TEXT_DOMAIN),
                    'for_pro_message' => __('Please upgrade to the Pro version to unlock all these awesome features', FE_TEXT_DOMAIN),
                    'for_pro_link' => home_url('/wp-admin/admin.php?page=front_editor_settings-pricing'),
                    'for_pro_button_text' => __('Get the Pro version', FE_TEXT_DOMAIN),
                ]
            ],
        ];


        if ($post_ID) {
            $data['formBuilderData'] = get_post_meta($post_ID, 'formBuilderData', true);
        }

        /**
         * Default controls
         */
        $data['formBuilder_options']['controls_group']['custom_fields']['types'] = $data['formBuilder_options']['defaultControls'];

        /**
         * Ability to add custom group
         */
        $data['formBuilder_options']['controls_group'] = apply_filters('admin_post_form_formBuilder_add_controls_group', $data['formBuilder_options']['controls_group']);

        $filter_data = apply_filters('admin_post_form_formBuilder_settings', $data);

        /**
         * Order Elements in control bar
         */
        foreach ($filter_data['formBuilder_options']['controls_group'] as $group) {

            if (empty($group['types'])) {
                continue;
            }

            foreach ($group['types'] as $types) {
                $filter_data['formBuilder_options']['controlOrder'][] = $types;
            }
        }
        wp_send_json_success($filter_data);
    }


    /**
     * Callback method for Post Forms submenu
     *
     * @since 2.5
     *
     * @return void
     */
    public static function fe_post_forms_page()
    {
        $action           = isset($_GET['action']) ? sanitize_text_field(wp_unslash($_GET['action'])) : null;
        $post_ID           = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : 'new';
        $add_new_page_url = admin_url('admin.php?page=fe-post-forms&action=add-new');


        $data = [
            'post_id' => $post_ID,
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('wp_rest'),
            'rest_url_get' => get_rest_url(null, 'bfe/v1/form'),
            'rest_update' => get_rest_url(null, 'bfe/v1/add-update-form'),
        ];

        wp_localize_script('bfe-block-script', 'fe_post_form_data', apply_filters('bfe_fe_post_form_backend_block_localize_data', $data));

        switch ($action) {
            case 'edit':
                wp_enqueue_script('jquery-ui');
                wp_enqueue_script('bfe-block-script');
                wp_enqueue_script('bfe-form-builder');
                wp_enqueue_style('fe_post_form_CPT');
                require fe_template_path('admin/post-form.php');
                break;

            case 'add-new':
                wp_enqueue_script('jquery-ui');
                wp_enqueue_script('bfe-block-script');
                wp_enqueue_script('bfe-form-builder');
                wp_enqueue_style('fe_post_form_CPT');
                require fe_template_path('admin/post-form.php');
                break;
            case 'trash':
                if ($post_ID !== 'new') {
                    wp_trash_post($post_ID);
                }

                require_once fe_template_path('admin/post-forms-list-table-view.php');
                break;

            case 'delete':
                if ($post_ID !== 'new') {
                    wp_delete_post($post_ID, true);
                }

                require_once fe_template_path('admin/post-forms-list-table-view.php');
                break;
            case 'restore':
                if ($post_ID !== 'new') {
                    wp_untrash_post($post_ID);
                    wp_publish_post($post_ID);
                }

                require_once fe_template_path('admin/post-forms-list-table-view.php');
                break;

            default:
                require_once fe_template_path('admin/post-forms-list-table-view.php');
                break;
        }
    }

    /**
     * Updating post
     *
     * @return void
     */
    public static function save_post_front_settings(\WP_REST_Request $request)
    {
        /**
         * If this is auto save do nothing
         */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        do_action('fe_before_wp_admin_form_create_save', $_POST);

        $title = isset($_POST['fe_title']) ? $_POST['fe_title'] : __('Sample Form', FE_TEXT_DOMAIN);
        if (!empty($_POST['post_id']) && $_POST['post_id'] !== 'new') {
            $post_ID = intval(sanitize_text_field($_POST['post_id']));
            wp_update_post([
                'ID'           => $post_ID,
                'post_title'   => $title,
            ]);
        } elseif (!empty($_POST['post_id']) && $_POST['post_id'] === 'new') {
            $post_ID = wp_insert_post([
                'post_title' => $title,
                'post_type' => 'fe_post_form',
                'post_status'   => 'publish',
            ]);
        }

        $form_builder_data = $_POST['formBuilderData'];

        /**
         * Saving data
         */
        if (empty($form_builder_data)) {
            wp_send_json_success([
                'post_id' => $post_ID,
                'message' => [
                    'title' => __('Oops', FE_TEXT_DOMAIN),
                    'message' => __('Form builder cannot be empty', FE_TEXT_DOMAIN),
                    'status' => 'warning'
                ]
            ]);
        }

        /**
         * Escaping scripts
         */
        $form_builder_data = preg_replace('#<script(.*?)>(.*?)</script>#is', 'Do not user html elements', $form_builder_data);
        update_post_meta($post_ID, 'formBuilderData', $form_builder_data);

        /**
         * Adding all settings to meta fields
         */
        if (!empty($_POST['settings'])) {
            update_post_meta($post_ID, 'fe_form_settings', $_POST['settings']);
        }


        wp_send_json_success([
            'post_id' => $post_ID,
            'form_edit_url' => home_url(sprintf('/wp-admin/admin.php?page=fe-post-forms&action=edit&id=%s', $post_ID)),
            'message' => [
                'title' => __('Form Settings Saved', FE_TEXT_DOMAIN),
                'status' => 'success'
            ]
        ]);
    }

    /**
     * Adding scripts to custom post type
     *
     * @param [type] $hook
     * @return void
     */
    public static function add_admin_scripts($hook)
    {

        global $post;
        $asset = require FE_PLUGIN_DIR_PATH . 'build/admin.asset.php';

        wp_register_script(
            'jquery-ui',
            plugins_url('assets/vendors/jquery-ui.min.js', dirname(__FILE__)),
            $asset['dependencies'],
            $asset['version'],
            true
        );
        wp_register_script(
            'bfe-form-builder',
            plugins_url('assets/vendors/form-builder.min.js', dirname(__FILE__)),
            $asset['dependencies'],
            $asset['version'],
            true
        );
        wp_register_style('fe_post_form_CPT', FE_PLUGIN_URL . '/build/adminStyle.css', [], $asset['version']);
        wp_register_script(
            'bfe-block-script',
            plugins_url('build/admin.js', dirname(__FILE__)),
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }

    /**
     * Registering post type
     *
     * @return void
     */
    public static function register_post_types()
    {
        register_post_type('fe_post_form', [
            'label'  => null,
            'labels' => [
                'name'               => __('Post Form', FE_TEXT_DOMAIN),
                'singular_name'      => __('Post Form', FE_TEXT_DOMAIN),
                'add_new'            => __('Add Post Form', FE_TEXT_DOMAIN),
                'add_new_item'       => __('Add Post Form', FE_TEXT_DOMAIN),
                'edit_item'          => __('Edit Post Form', FE_TEXT_DOMAIN),
                'new_item'           => __('New Post Form', FE_TEXT_DOMAIN),
                'view_item'          => __('Watch Post Form', FE_TEXT_DOMAIN),
                'search_items'       => __('Search Post Form', FE_TEXT_DOMAIN),
                'not_found'          => __('Not Found', FE_TEXT_DOMAIN),
                'not_found_in_trash' => __('Not found in trash', FE_TEXT_DOMAIN),
                'parent_item_colon'  => '',
                'menu_name'          => __('All forms', FE_TEXT_DOMAIN),
            ],
            'description'         => '',
            'public'              => false,
            'show_ui'            => true,
            'show_in_menu'       => '',
            'show_in_rest'        => true,
            'rest_base'           => 'fe_post_form',
            'menu_position'       => 10,
            'exclude_from_search' => true,
            'menu_icon'           => 'dashicons-format-quote',
            'capability_type'   => 'post',
            'capabilities'      => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'delete_posts'       => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core'
            ),
            'map_meta_cap'      => null,
            'hierarchical'        => false,
            'supports'            => ['title', 'custom-fields'],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ]);
    }

    /**
     * Get Form field settings
     *
     * @param [type] $name
     * @param [type] $form_id
     * @return void
     */
    public static function get_form_field_settings($name, $form_id = 0, $form_settings = [])
    {
        if (empty($form_settings)) {
            $form_settings = json_decode(get_post_meta($form_id, 'formBuilderData', true), true);
        }

        if (empty($form_settings)) {

            fe_fs_add_sentry_error('Form settings is empty', __FUNCTION__, ['func_args' => func_get_args()]);

            return false;
        }

        if (!empty($form_settings) && !$form_id) {
            $form_settings = json_decode(stripslashes($_POST['formBuilderData']), true);
        }

        if (!is_array($form_settings)) {
            fe_fs_add_sentry_error('Form settings is empty (is not array)', __FUNCTION__, ['func_args' => func_get_args()]);

            return false;
        }

        foreach ($form_settings as $field) {
            if ($field['type'] === $name) {
                return $field;
            }
        }

        return false;
    }

    public static function get_form_field_settings_by_name($name, $form_id = 0, $form_settings = [])
    {
        if (empty($form_settings)) {
            $form_settings = json_decode(get_post_meta($form_id, 'formBuilderData', true), true);
        }

        if (empty($form_settings)) {

            fe_fs_add_sentry_error('Form settings is empty', __FUNCTION__, ['func_args' => func_get_args()]);

            return false;
        }

        if (!empty($form_settings) && !$form_id) {
            $form_settings = json_decode(stripslashes($_POST['formBuilderData']), true);
        }

        if (!is_array($form_settings)) {
            fe_fs_add_sentry_error('Form settings is empty (is not array)', __FUNCTION__, ['func_args' => func_get_args()]);

            return false;
        }

        foreach ($form_settings as $field) {
            if(isset($field['name'])){
                if ($field['name'] === $name) {
                    return $field;
                }
            }
        }

        return false;
    }


    /**
     * Form Builder Demo Data
     *
     * @return void
     */
    public static function get_form_builder_demo_data()
    {
        return [
            [
                "type" => "post_title",
                "required" => true,
                "label" => __('Post Title', FE_TEXT_DOMAIN),
                "placeholder" => __('Add Title', FE_TEXT_DOMAIN)
            ],
            [
                "type" => "post_content_editor_js",
                "required" => true,
                "label" => "Post Content (EditorJS)",
                "editor_image_plugin" => true,
                "editor_header_plugin" => true,
                "editor_embed_plugin" => true,
                "editor_list_plugin" => true,
                "editor_checklist_plugin" => true,
                "editor_quote_plugin" => true,
                "editor_marker_plugin" => true,
                "editor_code_plugin" => true,
                "editor_delimiter_plugin" => true,
                "editor_inlineCode_plugin" => true,
                "editor_linkTool_plugin" => true,
                "editor_warning_plugin" => false,
                "editor_gallery_plugin" => false,
                "editor_table_plugin" => false
            ]
        ];
    }
}

Form::init();
