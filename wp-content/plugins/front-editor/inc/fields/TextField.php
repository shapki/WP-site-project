<?php

/**
 * formBuilder EditorJS field
 *
 * @package BFE;
 */
namespace BFE\Field;

use  BFE\Form ;
defined( 'ABSPATH' ) || exit;
class TextField
{
    public static  $field_label = 'Text Field' ;
    public static  $field_type = 'text' ;
    public static function init()
    {
        add_filter( 'admin_post_form_formBuilder_settings', [ __CLASS__, 'add_field_settings' ] );
    }
    
    /**
     * This settings for wp admin form builder
     *
     * @param [type] $data
     * @return void
     */
    public static function add_field_settings( $data )
    {
        $data['formBuilder_options']['disableProFields'][] = self::$field_type;
        /**
         * Adding attribute settings
         */
        $data['formBuilder_options']['typeUserAttrs'][self::$field_type] = [
            'subtype' => [
            'label'   => __( 'Type', FE_TEXT_DOMAIN ),
            'options' => [
            'text'     => 'Text Field',
            'password' => 'Password',
            'email'    => 'Email',
            'color'    => 'Color',
            'tel'      => 'Tel',
            'hidden'   => 'Hidden',
        ],
            'type'    => 'select',
        ],
        ];
        return $data;
    }
    
    /**
     * Add post image selection
     *
     * @return void
     */
    public static function add_field_to_front_form( $post_id, $attributes, $field )
    {
        if ( $field['type'] !== self::$field_type ) {
            return;
        }
        require fe_template_path( 'front-editor/text.php' );
    }
    
    /**
     * Image check
     *
     * @param [type] $post_data
     * @param [type] $data
     * @param [type] $file
     * @return void
     */
    public static function save_field_to_front_form( $post_id )
    {
        if ( !isset( $_POST['text_fields'] ) ) {
            return;
        }
        foreach ( $_POST['text_fields'] as $name => $value ) {
            update_post_meta( $post_id, $name, $value );
        }
    }

}
TextField::init();