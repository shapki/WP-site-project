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


class EditorJsField
{
    public static $field_label = 'EditorJS';
    public static $field_type =  'post_content_editor_js';

    public static function init()
    {
        /**
         * Adding setting to admin
         */
        add_filter('admin_post_form_formBuilder_settings', [__CLASS__, 'add_field_settings']);

        add_filter('bfe_front_editor_localize_data', [__CLASS__, 'field_setting_for_frontend'], 10, 3);

        /**
         * Validate field on wp admin form save
         */
        //add_action('fe_before_wp_admin_form_create_save', [__CLASS__, 'validate_field_before_wp_admin_form_save']);

        /**
         * Add or update editor content
         */
        add_action('bfe_ajax_after_front_editor_post_update_or_creation', [__CLASS__, 'add_or_update_editor_content_front'], 10, 2);

        // Add editor js blocks
        add_filter('bfe_front_editor_localize_data', [__CLASS__, 'add_editor_js_data'], 10, 3);

        // Post html content for editor js
        add_filter('fe_localize_post_html_content', [__CLASS__, 'localize_post_html_content'], 10, 3);
    }


    /**
     * Add or update editor content
     */
    public static function add_or_update_editor_content_front($post_id, $form_id)
    {
        if (empty($_POST['editor_js'])) {
            return;
        }

        foreach ($_POST['editor_js'] as $name => $content) {

            $editor_data      = json_decode(stripslashes($content), true);
            $content_html = '';

            if (!empty($editor_data['blocks'])) {
                foreach ($editor_data['blocks'] as $data) {

                    $single_html = self::data_to_html($data['type'], $data);

                    $content_html .= $single_html;
                }
            }

            $fields_list = json_decode(get_post_meta($form_id, 'formBuilderData', true), true);
            foreach ($fields_list as $field) {

                if (isset($field['name'])) {
                    if ($field['name'] === $name && $field['post_content'] === true) {

                        // wp_kses_post() is deleting youtube links that is why i removed it
                        $content_html = $content_html;

                        $post_data = [
                            'ID' => $post_id,
                            'post_content' => $content_html
                        ];

                        wp_update_post($post_data);
                    }
                }
            }
            /**
             * Adding to meta json string.
             */
            //$editor_data_json_clean = wp_json_encode($editor_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            update_post_meta($post_id, $name, $editor_data);
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
                'icon' => '<svg width="15" height="15" viewBox="0 0 84 84" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="editorjs-logo-a"><stop stop-color="#39FFD7" offset="0%"></stop><stop stop-color="#308EFF" offset="100%"></stop></linearGradient></defs><g fill-rule="nonzero" fill="none"><circle fill="url(#editorjs-logo-a)" cx="42" cy="42" r="42"></circle><rect fill="#FFF" x="38" y="17" width="8" height="50" rx="4"></rect><rect fill="#FFF" x="17" y="38" width="50" height="8" rx="4"></rect></g></svg>',
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
                    'label' => 'Save to Post Content',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_warning_plugin' => [
                    'label' => 'Warning',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                'editor_table_plugin' => [
                    'label' => 'Table',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                'editor_carousel_plugin' => [
                    'label' => 'Images Carousel (Gallery)',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                'editor_gallery_plugin' => [
                    'label' => 'WP Gallery (Using only WP Media Uploader)',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                'editor_attaches_plugin' => [
                    'label' => 'Attaches (Block for uploading files)',
                    'value' => false,
                    'type' => 'checkbox',
                ],
                'editor_image_plugin' => [
                    'label' => 'Image',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_header_plugin' => [
                    'label' => 'Header',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_header_placeholder_plugin' => [
                    'label' => '-- Header placeholder',
                    'value' => '',
                    'placeholder' => 'Enter a header',
                ],
                'editor_embed_plugin' => [
                    'label' => 'Embed',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_list_plugin' => [
                    'label' => 'List',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_checklist_plugin' => [
                    'label' => 'Checklist',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_quote_plugin' => [
                    'label' => 'Quote',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_quote_placeholder' => [
                    'label' => '-- Quote Placeholder',
                    'value' => '',
                    'placeholder' => 'Enter a quote',
                ],
                'editor_quote_caption_placeholder' => [
                    'label' => '-- Quote Caption Placeholder',
                    'value' => '',
                    'placeholder' => 'Quote\'s author',
                ],
                'editor_marker_plugin' => [
                    'label' => 'Marker',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_code_plugin' => [
                    'label' => 'Code',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_delimiter_plugin' => [
                    'label' => 'Delimiter',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_inlineCode_plugin' => [
                    'label' => 'Code',
                    'value' => true,
                    'type' => 'checkbox',
                ],
                'editor_linkTool_plugin' => [
                    'label' => 'Link Tool',
                    'value' => true,
                    'type' => 'checkbox',
                ],

            ];

        /**
         * Adding as default
         */
        $data['formBuilder_options']['defaultFields'][] = [
            'label' => self::$field_label,
            'type' => self::$field_type
        ];

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
            $data['formBuilder_options']['disable_attr'][] = '.fld-editor_carousel_plugin';
            $data['formBuilder_options']['disable_attr'][] = '.fld-editor_attaches_plugin';
            $data['formBuilder_options']['disable_attr'][] = '.fld-editor_warning_plugin';
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

    /**
     * Sanitize saved data to editor_js
     *
     * @param [type] $data
     * @param [type] $attributes
     * @param [type] $post_id
     * @return void
     */
    public static function add_editor_js_data($data, $attributes, $post_id)
    {

        $data['editor_js_data'] = [];
        $editor_data_array = false;

        if (empty($post_id)) return $data;

        $field_info = Form::get_form_field_settings(self::$field_type, $attributes['id']);

        if (!is_array($field_info) || empty($field_info)) return $data;

        if ('new' !== $post_id) {
            $editor_js_data = get_post_meta($post_id, $field_info['name'], true);
            if (!empty($editor_js_data)) {
                $editor_data_array = $editor_js_data;
            } else {
                fe_fs_add_sentry_error('EditorJS data is empty', __FUNCTION__, ['field_info' => $field_info, 'func_args' => func_get_args()]);
            }

            /**
             * If is the post is changed from admin we will use html content
             */
            $admin_post_modified_from_admin = get_post_meta($post_id, 'fe_post_updated_from_admin', true);

            if ($admin_post_modified_from_admin) {
                update_post_meta($post_id, 'fe_post_updated_from_admin', 0);
            }
        } else {
            $editor_data_array = apply_filters('fus_editor_js_default_content', []);
        }

        if (is_array($editor_data_array)) {
            $data['editor_js_data'] = $editor_data_array;
        }

        return $data;
    }

    /**
     * Returning post content by id
     *
     * @param [type] $data
     * @param [type] $attributes
     * @param [type] $post_id
     * @return void
     */
    public static function localize_post_html_content($data, $attributes, $post_id)
    {
        // if this is a new post
        if ($post_id === 'new') {
            return '';
        }

        $post = get_post($post_id);
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]>', $content);

        return $content;
    }

    /**
     * Example data for editor
     *
     * @return $data
     */
    public static function example_editor_data()
    {
        $data = [
            'time'   => time(),
            'blocks' => [
                [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => __('Add content', FE_TEXT_DOMAIN),
                    ],
                ]
            ]
        ];

        return $data;
    }

    /**
     * Field setting for front end
     *
     * @param [type] $data
     * @param [type] $attributes
     * @param [type] $post_id
     * @return void
     */
    public static function field_setting_for_frontend($data, $attributes, $post_id)
    {
        $settings = Form::get_form_field_settings(self::$field_type, $attributes['id']);

        if (empty($settings)) {
            $data['editor_settings'] = [
                'editor_image_plugin' => $attributes['editor_image_plugin'] ?? true,
                'editor_header_plugin' => $attributes['editor_header_plugin'] ?? true,
                'editor_embed_plugin' => $attributes['editor_embed_plugin'] ?? true,
                'editor_list_plugin' => $attributes['editor_list_plugin'] ?? true,
                'editor_checklist_plugin' => $attributes['editor_checklist_plugin'] ?? true,
                'editor_quote_plugin' => $attributes['editor_quote_plugin'] ?? true,
                'editor_marker_plugin' => $attributes['editor_marker_plugin'] ?? true,
                'editor_code_plugin' => $attributes['editor_code_plugin'] ?? true,
                'editor_delimiter_plugin' => $attributes['editor_delimiter_plugin'] ?? true,
                'editor_inlineCode_plugin' => $attributes['editor_inlineCode_plugin'] ?? true,
                'editor_linkTool_plugin' => $attributes['editor_linkTool_plugin'] ?? true,
                'tags_add_new' => $attributes['tags_add_new'] ?? false,
                'wp_media_uploader' => false, // pro
                'editor_warning_plugin' => false, // pro
                'editor_table_plugin' => false, // pro
                'editor_gallery_plugin' => false, // pro
                'editor_carousel_plugin' => false, // pro
                'editor_attaches_plugin' => false // pro
            ];
        }

        if (is_array($settings) && !empty($settings)) {
            foreach ($settings as $name => $value) {
                $data['editor_settings'][$name] = $value;
            }
        }


        $data['translations']['i18n'] = [
            'messages' => [
                'ui' => [
                    "blockTunes" => [
                        "toggler" => [
                            "Click to tune" => __("Click to tune", FE_TEXT_DOMAIN),
                            "or drag to move" => __("or drag to move", FE_TEXT_DOMAIN)
                        ]
                    ],
                    'inlineToolbar' => [
                        'converter' => [
                            "Convert to" => __("Convert to", FE_TEXT_DOMAIN)

                        ]
                    ],
                    "toolbar" => [
                        "toolbox" => [
                            "Add" => __("Add", FE_TEXT_DOMAIN)
                        ]
                    ]
                ],
                'toolNames' => [
                    "Text" => __("Text", FE_TEXT_DOMAIN),
                    "Heading" => __("Heading", FE_TEXT_DOMAIN),
                    "List" => __("List", FE_TEXT_DOMAIN),
                    "Warning" => __("Warning", FE_TEXT_DOMAIN),
                    "Checklist" => __("Checklist", FE_TEXT_DOMAIN),
                    "Quote" => __("Quote", FE_TEXT_DOMAIN),
                    "Code" => __("Code", FE_TEXT_DOMAIN),
                    "Delimiter" => __("Delimiter", FE_TEXT_DOMAIN),
                    "Raw HTML" => __("Raw HTML", FE_TEXT_DOMAIN),
                    "Table" => __("Table", FE_TEXT_DOMAIN),
                    "Link" => __("Link", FE_TEXT_DOMAIN),
                    "Marker" => __("Marker", FE_TEXT_DOMAIN),
                    "Bold" => __("Bold", FE_TEXT_DOMAIN),
                    "Italic" => __("Italic", FE_TEXT_DOMAIN),
                    "InlineCode" => __("InlineCode", FE_TEXT_DOMAIN),
                    "Image & Gallery" => __("Image & Gallery", FE_TEXT_DOMAIN),
                    "Image" => __("Image", FE_TEXT_DOMAIN)
                ],
                'tools' => [
                    'warning' => [
                        "Title" => __("Title", FE_TEXT_DOMAIN),
                        "Message" => __("Message", FE_TEXT_DOMAIN)
                    ],
                    'link' => [
                        "Add a link" => __("Add a link", FE_TEXT_DOMAIN),
                    ],
                    'stub' => [
                        "The block can not be displayed correctly." => __("The block can not be displayed correctly.", FE_TEXT_DOMAIN),
                    ]
                ],
                'blockTunes' => [
                    'delete' => [
                        "Delete" => __("Delete", FE_TEXT_DOMAIN),
                    ],
                    'moveUp' => [
                        "Move up" => __("Move up", FE_TEXT_DOMAIN),
                    ],
                    'moveDown' => [
                        "Move down" => __("Move down", FE_TEXT_DOMAIN),
                    ]
                ]
            ]
        ];

        $data['translations']['editor_field_placeholder'] = __('Start writing or enter Tab to choose a block', FE_TEXT_DOMAIN);


        return $data;
    }

    /**
     * Generating html from post data
     *
     * @param string $type type of field.
     * @param array  $data data of that field.
     * @return string
     */
    public static function data_to_html($type = '', $data = array())
    {
        $html = '';
        $tunes = false;
        if (isset($data['tunes'])) {
            $tunes = $data['tunes'];
        }
        $data = $data['data'];
        switch ($type) {
            case 'header';
                $class = '';
                if ($tunes) {
                    // has-text-align-center
                    if (isset($tunes['AlignmentTool'])) {
                        if (isset($tunes['AlignmentTool']['alignment'])) {
                            $class = sprintf('class="has-text-align-%s"', $tunes['AlignmentTool']['alignment']);
                        } else {
                            $class = sprintf('class="has-text-align-%s"', $tunes['AlignmentTool']['prop']['alignment']);
                        }
                    }
                }
                $guten_type = 'heading';
                $html       = sprintf(
                    '<!-- wp:%s {"level" =>%s} --><h%s %s>%s</h%s><!-- /wp:%s -->',
                    $guten_type,
                    $data['level'],
                    $data['level'],
                    $class,
                    $data['text'],
                    $data['level'],
                    $guten_type
                );
                break;

            case 'paragraph';
                $class = '';
                if ($tunes) {
                    // has-text-align-center
                    if (isset($tunes['AlignmentTool'])) {
                        if (isset($tunes['AlignmentTool']['alignment'])) {
                            $class = sprintf('class="has-text-align-%s"', $tunes['AlignmentTool']['alignment']);
                        } else {
                            $class = sprintf('class="has-text-align-%s"', $tunes['AlignmentTool']['prop']['alignment']);
                        }
                    }
                }
                if (empty($data['text'])) {
                    $data['text'] = '\r\n';
                }
                $html = sprintf('<!-- wp:paragraph --><p %s>%s</p><!-- /wp:paragraph -->', $class, $data['text']);
                break;

            case 'list';
                $html = '<!-- wp:list --><ul>';
                foreach ($data['items'] as $item) {
                    $html .= sprintf('<li>%s</li>', $item);
                }
                $html .= '</ul><!-- /wp:list -->';
                break;

            case 'code';
                $editor_data = htmlentities($data['code']);

                $html = sprintf('<!-- wp:code --><pre class="bfe-code wp-block-code"><code>%s</code></pre><!-- /wp:code -->', $editor_data);
                break;

            case 'delimiter':
                $html = '<!-- wp:separator --><hr class="wp-block-separator bfe-delimiter"/><!-- /wp:separator -->';
                break;

            case 'embed':
                ob_start();
                require fe_template_path('editor/embed.php');
                $html = trim(ob_get_clean());

                break;

            case 'image':
                ob_start();
                if (!empty($data['file']['url'])) {
                    $image_url = $data['file']['url'];
                    $caption = $data['caption'];
                    $image_id  = attachment_url_to_postid($image_url);
                    require FE_Template_PATH . 'editor/image.php';
                }
                $html .= trim(ob_get_clean());
                break;

            case 'carousel':
                ob_start();
                if (!empty($data)) {
                    $images = $data;
                    require fe_template_path('editor/images-carousel.php');
                }

                $html = trim(ob_get_clean());
                break;

            case 'wpImageGallery':
                ob_start();
                if (!empty($data) && count($data) > 1) {
                    $image_ids = $data;
                    require fe_template_path('editor/gallery.php');
                } else {
                    $image_id  = $data[0];
                    require fe_template_path('editor/image.php');
                }

                $html = trim(ob_get_clean());
                break;

            case 'quote':
                ob_start();
                require fe_template_path('editor/quote.php');
                $html = ob_get_clean();
                break;

            case 'warning':
                $html = sprintf('<figure class="warning"><figcaption>%s</figcaption><p>%s</p></figure>', $data['title'], $data['message']);
                break;

            case 'table':
                ob_start();
                require fe_template_path('editor/table.php');
                $html = ob_get_clean();
                break;

            case 'checklist':
                ob_start();
                require fe_template_path('editor/checklist.php');
                $html = ob_get_clean();
                break;

            case 'attaches':
                ob_start();
                require fe_template_path('editor/attaches.php');
                $html = ob_get_clean();
                break;
        }
        $html .= htmlspecialchars("\n");

        /**
         * HTML that generated type of block and data of
         * that block you can use this filter for make your html elements
         */
        $html = apply_filters('bfe_editor_data_to_html_filter', self::esc_brackets($html), $type, $data);

        return $html;
    }

    /**
     * Escape brackets function
     *
     * @param string $text
     * @return void
     */
    public static function esc_brackets($text = '')
    {
        return str_replace(["[", "]"], ["[ ", " ]"], $text);
    }
}

EditorJsField::init();
