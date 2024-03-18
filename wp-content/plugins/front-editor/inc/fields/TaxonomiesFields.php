<?php

/**
 * formBuilder Tax Fields
 *
 * @package BFE;
 */
namespace BFE\Field;

defined( 'ABSPATH' ) || exit;
class TaxonomiesFields
{
    public static function init()
    {
        add_filter( 'admin_post_form_formBuilder_settings', [ __CLASS__, 'add_field_settings' ] );
        // category selection addon
        add_action(
            'bfe_editor_on_front_field_adding',
            [ __CLASS__, 'front_tax_select' ],
            10,
            3
        );
        add_filter(
            'bfe_ajax_before_front_editor_post_update_or_creation',
            [ __CLASS__, 'add_tax_on_save_and_check' ],
            10,
            3
        );
        /**
         * Adding taxonomies
         */
        add_action( 'bfe_ajax_after_front_editor_post_update_or_creation', [ __CLASS__, 'add_tax_after_post_created' ], 10 );
    }
    
    /**
     * Adding in backend forBuilder field
     *
     * @param [type] $data
     * @return void
     */
    public static function add_field_settings( $data )
    {
        $post_type = $data['settings']['post_type'];
        $post_taxonomies = get_object_taxonomies( $post_type, 'objects' );
        foreach ( $post_taxonomies as $tax ) {
            $tax_type = sprintf( 'tax_%s', $tax->name );
            /**
             * We do not need post_format
             */
            if ( $tax->name === 'post_format' ) {
                continue;
            }
            $data['formBuilder_options']['fields'][] = [
                'label' => $tax->label,
                'attrs' => [
                'placeholder' => sprintf( '%s %s', __( 'Select', FE_TEXT_DOMAIN ), $tax->label ),
                'type'        => $tax_type,
            ],
                'icon'  => '<span class="dashicons dashicons-tag"></span>',
            ];
            /**
             * Templates
             */
            $data['formBuilder_options']['temp_back'][$tax_type] = [
                'field'       => sprintf( '<div class="%s tax" name="%s"></div>', $tax->name, $tax->name ),
                'onRender'    => '',
                'max_in_form' => 1,
            ];
            /**
             * Adding field to group
             */
            $data['formBuilder_options']['controls_group']['taxonomies']['types'][] = $tax_type;
            /**
             * Adding attribute settings
             */
            $data['formBuilder_options']['typeUserAttrs'][$tax_type] = [
                'order'          => [
                'label'   => __( 'Order', FE_TEXT_DOMAIN ),
                'options' => [
                'asc'  => 'ASC',
                'desc' => 'Desc',
            ],
                'type'    => 'select',
            ],
                'multiple'       => [
                'label' => __( 'Multiple Selections', FE_TEXT_DOMAIN ),
                'value' => false,
                'type'  => 'checkbox',
            ],
                'show_empty'     => [
                'label' => __( 'Show empty', FE_TEXT_DOMAIN ),
                'value' => false,
                'type'  => 'checkbox',
            ],
                'add_new'        => [
                'label' => __( 'Allow Add New', FE_TEXT_DOMAIN ),
                'value' => false,
                'type'  => 'checkbox',
            ],
                'hierarchically' => [
                'label' => __( 'Show Hierarchically', FE_TEXT_DOMAIN ),
                'value' => false,
                'type'  => 'checkbox',
            ],
                'exclude'        => [
                'label' => sprintf( '%s', __( 'Terms to excluded', FE_TEXT_DOMAIN ) ),
                'value' => '',
            ],
            ];
            /**
             * Disable button
             */
            $data['formBuilder_options']['disabledFieldButtons'][$tax_type] = [ 'copy' ];
            /**
             *
             * Disabling default settings
             */
            $data['formBuilder_options']['typeUserDisabledAttrs'][$tax_type] = [
                'name',
                'description',
                'inline',
                'toggle',
                'access',
                'value'
            ];
            $data['formBuilder_options']['disable_attr'][] = '.fld-multiple';
            $data['formBuilder_options']['disable_attr'][] = '.fld-add_new';
            $data['formBuilder_options']['disable_attr'][] = '.fld-hierarchically';
            $data['formBuilder_options']['attr_descriptions']['exclude'] = __( 'You can specify a comma-separated terms IDs that need to be excluded.', FE_TEXT_DOMAIN );
        }
        return $data;
    }
    
    public static function front_tax_select( $post_id, $attributes, $field )
    {
        if ( strpos( $field['type'], 'tax' ) === false ) {
            return;
        }
        $tax_name = str_replace( "tax_", "", $field['type'] );
        require fe_template_path( 'front-editor/taxonomy.php' );
    }
    
    /**
     * Checking tax fields on form save from front before post created
     *
     * @param [type] $post_data
     * @param [type] $data
     * @param [type] $file
     * @return void
     */
    public static function add_tax_on_save_and_check( $post_data, $data, $file )
    {
        if ( !isset( $_POST['tax'] ) || empty($_POST['tax']) ) {
            return $post_data;
        }
        foreach ( $_POST['tax'] as $tax_name => $settings ) {
            if ( $settings['required'] === 'true' && empty($settings['ids']) ) {
                wp_send_json_error( [
                    'message' => sprintf( __( 'The %s selection is required', FE_TEXT_DOMAIN ), $tax_name ),
                ] );
            }
            
            if ( empty($settings['ids']) ) {
                $post_id = intval( sanitize_text_field( $_POST['post_id'] ) );
                if ( $post_id ) {
                    wp_delete_object_term_relationships( $post_id, $tax_name );
                }
            }
        
        }
        return $post_data;
    }
    
    /**
     * Add post after post created
     *
     * @param [type] $post_id
     * @return void
     */
    public static function add_tax_after_post_created( $post_id )
    {
        if ( empty($_POST['tax']) ) {
            return;
        }
        foreach ( $_POST['tax'] as $tax_name => $settings ) {
            $terms = explode( ",", $settings['ids'] );
            
            if ( !empty($terms) ) {
                $terms_ids = [];
                foreach ( $terms as $term ) {
                    if ( empty($term) || $term === 'null' ) {
                        continue;
                    }
                    /**
                     * Checking if term exist if not creating it
                     */
                    $term_data = get_term_by( 'id', $term, $tax_name );
                    if ( !$term_data ) {
                        $term_data = get_term_by( 'name', $term, $tax_name );
                    }
                    
                    if ( !$term_data ) {
                        $term_data = wp_insert_term( $term, $tax_name );
                        $term_id = $term_data['term_id'];
                    } else {
                        $term_id = $term_data->term_id;
                    }
                    
                    $terms_ids[] = (int) $term_id;
                }
                // Attach to post
                wp_set_object_terms( $post_id, $terms_ids, $tax_name );
            }
        
        }
    }

}
TaxonomiesFields::init();