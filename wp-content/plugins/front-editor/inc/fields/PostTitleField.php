<?php

/**
 * formBuilder EditorJS field
 *
 * @package BFE;
 */
namespace BFE\Field;

use  BFE\Form ;
defined( 'ABSPATH' ) || exit;
class PostTitleField
{
    public static  $field_label = 'Post Title' ;
    public static  $field_type = 'post_title' ;
    public static function init()
    {
        // add field settings to wp admin form
        add_filter( 'admin_post_form_formBuilder_settings', [ __CLASS__, 'add_field_settings' ] );
        // Validate field on wp admin form
        add_action( 'fe_before_wp_admin_form_create_save', [ __CLASS__, 'validate_field_before_wp_admin_form_save' ] );
        // Front form template
        add_action(
            'bfe_editor_on_front_field_adding',
            [ __CLASS__, 'display_field_on_front_form' ],
            10,
            3
        );
        // Validate field on front form submit
        add_action(
            'bfe_ajax_before_post_update_or_creation',
            [ __CLASS__, 'validate_field_on_front_form_submit' ],
            10,
            2
        );
        // Add data before creation the post
        add_filter(
            'bfe_ajax_before_front_editor_post_update_or_creation',
            [ __CLASS__, 'add_title_if_exist' ],
            10,
            5
        );
    }
    
    /**
     * Validate field on wp admin form save
     *
     * @param [type] $data
     * @return void
     */
    public static function validate_field_before_wp_admin_form_save( $data )
    {
        $settings = Form::get_form_field_settings( self::$field_type, 0, $_POST['formBuilderData'] );
        if ( !$settings ) {
            wp_send_json_success( [
                'message' => [
                'title'   => __( 'Oops', FE_TEXT_DOMAIN ),
                'message' => __( 'Post Title Field is missing', FE_TEXT_DOMAIN ),
                'status'  => 'warning',
            ],
            ] );
        }
    }
    
    /**
     * Validate on front for submit
     *
     * @param int $post_id
     * @param int $form_id
     * @return void
     */
    public static function validate_field_on_front_form_submit( $post_id, $form_id )
    {
        $settings = Form::get_form_field_settings( self::$field_type, $form_id );
        
        if ( !isset( $settings['generate_title'] ) ) {
            if ( empty($_POST['post_title']) && $settings['required'] ) {
                wp_send_json_error( [
                    'message' => __( 'Please add post title', FE_TEXT_DOMAIN ),
                ] );
            }
            $post_title = sanitize_text_field( $_POST['post_title'] );
            if ( empty($post_title) ) {
                wp_send_json_error( [
                    'message' => __( 'Please add correct post title', FE_TEXT_DOMAIN ),
                ] );
            }
        }
    
    }
    
    /**
     * Front form template
     *
     * @param int $post_id
     * @param array $attributes
     * @param array $field
     * @return void
     */
    public static function display_field_on_front_form( $post_id, $attributes, $field )
    {
        if ( $field['type'] !== self::$field_type ) {
            return;
        }
        require fe_template_path( 'front-editor/post-title.php' );
    }
    
    /**
     * Add data before creation the post
     *
     * @param array $post_data
     * @param array $_POST
     * @param array $_FILES
     * @param int $post_id
     * @param int $form_id
     * @return void
     */
    public static function add_title_if_exist(
        $post_data,
        $post,
        $files,
        $post_id,
        $form_id
    )
    {
        $post_title = $post['post_title'];
        $settings = Form::get_form_field_settings( self::$field_type, $form_id );
        // generate title
        if ( isset( $settings['generate_title'] ) ) {
            
            if ( !empty($settings['generate_title']) ) {
                $regex = '/\\[%s]/';
                $post_title = $settings['generate_title'];
                foreach ( $post as $key => $value ) {
                    
                    if ( $key === 'tax' ) {
                        foreach ( $post['tax'] as $tax_name => $settings ) {
                            $terms = explode( ",", $settings['ids'] );
                            
                            if ( !empty($terms) ) {
                                $terms_string = '';
                                foreach ( $terms as $term ) {
                                    if ( empty($term) || $term === 'null' ) {
                                        continue;
                                    }
                                    $term_data = get_term_by( 'term_id', $term, $tax_name );
                                    $terms_string .= ' ' . $term_data->name;
                                }
                                $post_title = preg_replace( sprintf( $regex, $tax_name ), $terms_string, $post_title );
                            }
                        
                        }
                    } elseif ( $key === 'text_fields' ) {
                        foreach ( $value as $text_key => $text_value ) {
                            $post_title = preg_replace( sprintf( $regex, $text_key ), $text_value, $post_title );
                        }
                    }
                
                }
            }
        
        }
        $post_data['post_title'] = $post_title;
        return $post_data;
    }
    
    public static function add_field_settings( $data )
    {
        $field_label = __( self::$field_label, FE_TEXT_DOMAIN );
        /**
         * Adding field
         */
        $data['formBuilder_options']['fields'][] = [
            'label' => $field_label,
            'attrs' => [
            'type' => self::$field_type,
        ],
            'icon'  => '<span class="dashicons dashicons-editor-textcolor"></span>',
        ];
        $data['formBuilder_options']['temp_back'][self::$field_type] = [
            'field'       => sprintf( '<input type="text" class="%s" name="%s">', self::$field_type, self::$field_type ),
            'onRender'    => '',
            'max_in_form' => 1,
        ];
        /**
         * Adding as default
         */
        $data['formBuilder_options']['defaultFields'][] = [
            'label' => $field_label,
            'type'  => self::$field_type,
        ];
        /**
         * Adding field to group
         */
        $data['formBuilder_options']['controls_group']['post_fields']['types'][] = self::$field_type;
        $data['formBuilder_options']['disabledFieldButtons'][self::$field_type] = [ 'copy' ];
        /**
         * Disabling default settings
         */
        $data['formBuilder_options']['typeUserDisabledAttrs'][self::$field_type] = [
            'name',
            'description',
            'inline',
            'toggle',
            'access',
            'value'
        ];
        /**
         * Adding attribute settings
         */
        $data['formBuilder_options']['typeUserAttrs'][self::$field_type] = [
            'placeholder'    => [
            'label'       => sprintf( '%s', __( 'Placeholder', FE_TEXT_DOMAIN ) ),
            'value'       => '',
            'placeholder' => 'Add Title',
        ],
            'title_element'  => [
            'label'    => 'HTML element',
            'multiple' => false,
            'options'  => [
            'input'    => 'Input',
            'textarea' => 'TextArea',
        ],
        ],
            'hide_field'     => [
            'label' => __( 'Hide Field', FE_TEXT_DOMAIN ),
            'value' => false,
            'type'  => 'checkbox',
        ],
            'generate_title' => [
            'label'       => sprintf( '%s', __( 'Generate title', FE_TEXT_DOMAIN ) ),
            'value'       => '',
            'placeholder' => 'New Post [taxonomy_name] [field_name]',
        ],
        ];
        $data['formBuilder_options']['attr_descriptions']['generate_title'] = __( 'Generate title using params: [{taxonomy_name}] [{field name}] <br> Example: Post [category] [text-1695547664968] <br> If empty will not work', FE_TEXT_DOMAIN );
        $data['formBuilder_options']['attr_descriptions']['hide_field'] = __( 'Hide field so users will not see it', FE_TEXT_DOMAIN );
        $data['formBuilder_options']['disable_attr'][] = '.fld-generate_title';
        $data['formBuilder_options']['disable_attr'][] = '.fld-hide_field';
        return $data;
    }

}
PostTitleField::init();