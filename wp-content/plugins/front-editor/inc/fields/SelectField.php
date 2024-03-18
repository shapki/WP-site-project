<?php

/**
 * formBuilder EditorJS field
 *
 * @package BFE;
 */
namespace BFE\Field;

use  BFE\Form ;
defined( 'ABSPATH' ) || exit;
class SelectField
{
    public static  $field_label = 'Select' ;
    public static  $field_type = 'select' ;
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
         * Disabling default settings
         */
        $data['formBuilder_options']['typeUserDisabledAttrs'][self::$field_type] = [ 'access' ];
        // important array for showing this field in builder
        $data['formBuilder_options']['temp_back'][self::$field_type] = [
            'field'    => sprintf( '<input type="text" class="%s" name="%s">', self::$field_type, self::$field_type ),
            'onRender' => '',
        ];
        return $data;
    }
    
    /**
     * This template for showing in front
     *
     * @return void
     */
    public static function add_field_to_front_form( $post_id, $attributes, $field )
    {
        if ( $field['type'] !== self::$field_type ) {
            return;
        }
        require fe_template_path( 'front-editor/select.php' );
    }
    
    /**
     * This is for validation before saving the post
     *
     * @param [type] $post_data
     * @param [type] $data
     * @param [type] $file
     * @return void
     */
    public static function save_field_to_front_form( $post_id )
    {
        if ( !isset( $_POST['select'] ) ) {
            return;
        }
        foreach ( $_POST['select'] as $name => $value ) {
            if ( $value['required'] === '1' && $value['ids'] === 'null' ) {
                wp_send_json_error( [
                    'message' => sprintf( __( '%s is required', FE_TEXT_DOMAIN ), $value['label'] ),
                ] );
            }
            update_post_meta( $post_id, $name, $value['ids'] );
        }
    }

}
SelectField::init();