<?php

/**
 * If users have not selected the form
 */
if (!$attributes['id'] && current_user_can('manage_options')) {
    printf(
        '<h2>%s <a href="%s">%s</a></h2>',
        __('Post form is not selected please select existing one or', FE_TEXT_DOMAIN),
        admin_url('admin.php?page=fe-post-forms&action=add-new'),
        __('Create New One', FE_TEXT_DOMAIN)
    );
}
$fields_list = json_decode(get_post_meta($attributes['id'], 'formBuilderData', true), true) ?? BFE\Form::get_form_builder_demo_data();
$form_id = $attributes['id'] ?? 0;
$form_theme = $form_settings['form_theme'] ?? 'default_2';
$form_control_buttons = $form_settings['control_buttons'] ?? 'bottom';
$message_place = $form_settings['error_success_messages'] ?? 'bottom';
$form_css = sprintf('<style>%s</style>', esc_html($form_settings['form_custom_css'] ?? ''));
echo $form_css;
?>

<?php if ($message_place == 'top') {
    printf('<div id="fus-message-wrap"></div>');
} ?>

<form class="fus-form bfe-editor <?= $form_theme ?>" id="fus-form-<?= $form_id ?>" post_id="<?= $post_id ?>">
    <?php if ($form_control_buttons == 'default') {
        require fe_template_path('front-form-header.php');
    } ?>
    <div class="hidden-fields">
        <input type="text" name="post_id" class="fus_post_id" value="<?= $post_id ?>">
        <?php if ($form_id) : ?>
            <input type="text" name="form_id" value="<?= $form_id ?>">
            <?php
            foreach ($form_settings as $name => $value) {
                if(!is_array($value)){
                    printf('<input type="text" name="%s" value="%s">', $name, $value);
                }
            }
            ?>
        <?php endif; ?>
        <?php wp_nonce_field('bfe_nonce') ?>
    </div>

    <div class="wrapper">
        <div class="column">
            <?php
            if (!empty($fields_list)) {
                foreach ($fields_list as $field) {
                    switch ($field['type']) {
                        case 'post_content_editor_js':
                            echo '<div class="fus-wrap fus-editor-js-field-wrap">';
                            $editor_js_data = json_encode(get_post_meta($post_id, $field['name'], true));

                            if (isset($field['label'])) {
                                printf('<label for="%s">%s</label>', $field['name'], $field['label']);
                            }

                            printf('<div class="EditorJS-editor" id="%s"></div>', $field['name']);
                            printf(
                                '<textarea id="%s" type="hidden" class="editor-textarea hidden" name="%s" required="%s">%s</textarea>',
                                $field['name'] . '-textarea',
                                $field['post_content'] ? sprintf('editor_js[%s]', $field['name']) : $field['name'],
                                $editor_js_data ?? '',
                                $field['required'] ? 'required' : ''
                            );
                            echo "</div>";
                            break;
                        case 'md_editor':
                            echo '<div class="fus-wrap fus-md-editor-field-wrap">';
                            $content = get_post_meta($post_id, $field['name'], true) ?? '';
                            if ($field['post_content'] === true) {
                                $content = get_post_field('post_content', $post_id);
                            }

                            if (isset($field['label'])) {
                                printf('<label for="%s" class="md-editor-label">%s</label>', $field['name'], $field['label']);
                            }

                            printf(
                                '<div class="md-editor" id="%s" locale="%s"></div>
                                <textarea id="%s" type="hidden" class="editor-textarea" name="%s">%s</textarea>',
                                $field['name'],
                                get_locale(),
                                $field['name'] . '-textarea',
                                $field['post_content'] ? sprintf('md_editor[%s]', $field['name']) : $field['name'],
                                $content
                            );
                            echo "</div>";
                            break;
                        default:
                            // field can hook here check the field and add custom templates for custom fields
                            do_action('bfe_editor_on_front_field_adding', $post_id, $attributes, $field);
                            break;
                    }
                }
            }
            ?>
        </div>
    </div>
    <?php if ($form_control_buttons == 'bottom') {
        require fe_template_path('front-form-header.php');
    } ?>
</form>

<?php if ($message_place == 'bottom') {
    printf('<div id="fus-message-wrap"></div>');
} ?>