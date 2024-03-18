<?php

/**
 * formBuilder EditorJS field
 *
 * @package BFE;
 */

namespace BFE\Field;

use BFE\Form;

defined('ABSPATH') || exit;


class TinyMCE
{
    public static $field_label = 'TinyMCE Editor';
    public static $field_type =  'tinymce';

    public static function init()
    {
        add_filter('admin_post_form_formBuilder_settings', [__CLASS__, 'add_field_settings']);

        add_action('bfe_editor_on_front_field_adding', [__CLASS__, 'add_field_to_front_form'], 10, 3);
        add_action('bfe_ajax_after_front_editor_post_update_or_creation', [__CLASS__, 'save_field_to_front_form'], 10, 2);

        add_action('bfe_ajax_before_post_update_or_creation', [__CLASS__, 'validate_front_field'], 10, 2);
    }

    /**
     * This settings for wp admin form builder
     *
     * @param [type] $data
     * @return void
     */
    public static function add_field_settings($data)
    {
        /**
         * Adding attribute settings
         */
        $data['formBuilder_options']['typeUserAttrs'][self::$field_type] =
            [
                'post_content' => [
                    'label' => 'Save to Post Content',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                // 'editor_type' => [
                //     'label' => 'Editor Type',
                //     'multiple' => false,
                //     'options' => [
                //         'textarea' => 'Textarea',
                //         'tinymce' => 'TinyMCE'
                //     ],
                // ]
            ];
        /**
         * Adding field
         */
        $data['formBuilder_options']['fields'][] =
            [
                'label' => self::$field_label,
                'attrs' => [
                    'type' => self::$field_type
                ],
                'icon' => '<span class="dashicons dashicons-text"></span>',
            ];

        /**
         * Adding field to group
         */
        $data['formBuilder_options']['controls_group']['post_fields']['types'][] = self::$field_type;

        /**
         * Disabling default settings
         */
        $data['formBuilder_options']['typeUserDisabledAttrs'][self::$field_type] =
            [
                'description',
                'inline',
                'toggle',
                'access',
                'value',
                'type',
                'subtype'
            ];

        $data['formBuilder_options']['disabledFieldButtons'][self::$field_type] = ['copy'];

        // important array for showing this field in builder
        $data['formBuilder_options']['temp_back'][self::$field_type] = [
            'field' => sprintf('<input type="text" class="%s" name="%s">', self::$field_type, self::$field_type),
            'onRender' => '',
            'max_in_form' => 1
        ];

        return $data;
    }

    /**
     * Add post image selection
     *
     * @return void
     */
    public static function add_field_to_front_form($post_id, $attributes, $field)
    {

        if ($field['type'] !== self::$field_type) {
            return;
        }

        require fe_template_path('front-editor/tinymce.php');
    }

    /**
     * Image check
     *
     * @param [type] $post_data
     * @param [type] $data
     * @param [type] $file
     * @return void
     */
    public static function save_field_to_front_form($post_id, $form_id)
    {
        if (!isset($_POST[self::$field_type])) {
            return;
        }

        $settings = Form::get_form_field_settings(self::$field_type, $form_id);
        foreach ($_POST[self::$field_type] as $name => $value) {
            if ($settings['post_content']) {
                $post_data = [
                    'ID' => $post_id,
                    'post_content' => $value
                ];

                wp_update_post($post_data);
            } else {
                update_post_meta($post_id, $name, $value);
            }
        }
    }

    public static function validate_front_field($post_id, $form_id)
    {
        $settings = Form::get_form_field_settings(self::$field_type, $form_id);
        if (isset($_POST[self::$field_type])) {
            foreach ($_POST[self::$field_type] as $name => $value) {
                if ($settings['required']) {
                    if (empty($value)) {
                        wp_send_json_error(array('message' => __($settings['label'] . ' is required', FE_TEXT_DOMAIN)));
                    }
                }
            }
        }
    }
}

TinyMCE::init();
