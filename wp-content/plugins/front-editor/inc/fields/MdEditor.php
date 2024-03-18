<?php

/**
 * formBuilder EditorJS field
 *
 * @package BFE;
 */

namespace BFE\Field;

use BFE\Editor;

use BFE\Form;

defined('ABSPATH') || exit;


class MdEditor
{
    public static $field_label = 'MD Editor';
    public static $field_type =  'md_editor';

    public static function init()
    {
        /**
         * Adding setting to admin
         */
        add_filter('admin_post_form_formBuilder_settings', [__CLASS__, 'add_field_settings']);

        //add_filter('bfe_front_editor_localize_data', [__CLASS__, 'field_setting_for_frontend'], 10, 3);

        /**
         * Validate field on wp admin form save
         */
        //add_action('fe_before_wp_admin_form_create_save', [__CLASS__, 'validate_field_before_wp_admin_form_save']);

        /**
         * Add or update editor content
         */
        add_action('bfe_ajax_after_front_editor_post_update_or_creation', [__CLASS__, 'add_or_update_editor_content_front'], 10, 2);
    }


    /**
     * Add or update editor content
     */
    public static function add_or_update_editor_content_front($post_id, $form_id)
    {
        if (empty($_POST['md_editor'])) {
            return;
        }

        foreach ($_POST['md_editor'] as $name => $content) {

            $content = wp_kses_post($content);

            $fields_list = json_decode(get_post_meta($form_id, 'formBuilderData', true), true);
            foreach ($fields_list as $field) {

                if ($field['name'] === $name && $field['post_content'] === true) {

                    $post_data = [
                        'ID' => $post_id,
                        'post_content' => $content
                    ];

                    wp_update_post($post_data);
                } 

                if($field['name'] === $name){
                    update_post_meta($post_id, $name, $content);
                }
            }
            /**
             * Adding to meta json string.
             */
            $editor_data_json_clean = wp_json_encode($content, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            update_post_meta($post_id, $name, stripslashes($content));
        }
    }


    /**
     * Validate field on wp admin form save
     *
     * @param [type] $data
     * @return void
     */
    public static function validate_field_before_wp_admin_form_save($data)
    {
        $settings = Form::get_form_field_settings(self::$field_type, 0, $_POST['formBuilderData']);

        if (!$settings) {
            wp_send_json_success([
                'message' => [
                    'title' => __('Oops', FE_TEXT_DOMAIN),
                    'message' => __('Post Content Field is missing', FE_TEXT_DOMAIN),
                    'status' => 'warning'
                ]
            ]);
        }
    }

    /**
     * Adding setting to admin
     */
    public static function add_field_settings($data)
    {
        /**
         * Adding field
         */
        $data['formBuilder_options']['fields'][] =
            [
                'label' => self::$field_label,
                'attrs' => [
                    'type' => self::$field_type
                ],
                'icon' => '<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="1664.000000pt" height="1024.000000pt" viewBox="0 0 1664.000000 1024.000000"
                preserveAspectRatio="xMidYMid meet">
               
               <g transform="translate(0.000000,1024.000000) scale(0.100000,-0.100000)"
               fill="#000000" stroke="none">
               <path d="M1045 10229 c-546 -78 -965 -503 -1035 -1049 -8 -60 -10 -1250 -8
               -4115 3 -3854 4 -4033 22 -4105 118 -489 466 -833 946 -937 82 -17 360 -18
               7350 -18 6990 0 7268 1 7350 18 484 105 842 463 947 947 17 81 18 255 18 4150
               0 3895 -1 4069 -18 4150 -104 480 -448 828 -937 946 -72 18 -351 19 -7325 20
               -3987 1 -7277 -2 -7310 -7z m3751 -3384 c438 -547 800 -995 804 -995 4 0 366
               448 804 995 l796 995 800 0 800 0 0 -2720 0 -2720 -800 0 -800 0 -2 1557 -3
               1557 -793 -992 c-437 -546 -798 -992 -802 -992 -4 0 -365 446 -802 992 l-793
               992 -3 -1557 -2 -1557 -800 0 -800 0 0 2720 0 2720 800 0 800 0 796 -995z
               m8324 -365 l0 -1360 800 0 800 0 -1196 -1395 c-657 -767 -1199 -1395 -1204
               -1395 -5 0 -547 628 -1204 1395 l-1196 1395 800 0 800 0 0 1360 0 1360 800 0
               800 0 0 -1360z"/>
               </g>
               </svg>',
            ];

        $data['formBuilder_options']['temp_back'][self::$field_type] = [
            'field' => sprintf('<div class="%s editor" name="%s"></div>', self::$field_type, self::$field_type),
            'onRender' => '',
            'max_in_form' => 1,
            //'required' => 0
        ];

        /**
         * Adding attribute settings 
         */
        $data['formBuilder_options']['typeUserAttrs'][self::$field_type] =
            [
                'post_content' => [
                    'label' => 'Post Content',
                    'value' => false,
                    'type' => 'checkbox',
                ],
            ];

        /**
         * Adding as default
         */
        // $data['formBuilder_options']['defaultFields'][] = [
        //     'label' => self::$field_label,
        //     'type' => self::$field_type
        // ];

        /**
         * Adding field to group
         */
        $data['formBuilder_options']['controls_group']['post_fields']['types'][] = self::$field_type;

        /**
         * Disable attr if there is no pro version
         */
        $is_premium = fe_fs()->can_use_premium_code__premium_only();
        if (!$is_premium) {
            $data['formBuilder_options']['disable_attr'][] = '.fld-editor_gallery_plugin';
            $data['formBuilder_options']['disable_attr'][] = '.fld-editor_table_plugin';
            $data['formBuilder_options']['disable_attr'][] = 'fld-editor_warning_plugin';
        }

        /**
         * Disabling default settings
         */
        $data['formBuilder_options']['typeUserDisabledAttrs'][self::$field_type] =
            [
                'description',
                'inline',
                'toggle',
                'placeholder',
                'access',
                'value',
            ];

        $data['formBuilder_options']['disabledFieldButtons'][self::$field_type] = ['copy'];

        return $data;
    }

}

MdEditor::init();
