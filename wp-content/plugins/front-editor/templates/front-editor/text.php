<div class="fe_custom_field <?= $field['name'] ?>">
    <?php
    $placeholder = $field['label'];
    if (isset($field['placeholder'])) {
        $placeholder = $field['placeholder'];
    }
    $required = '';
    if (isset($field['required'])) {
        if($field['required']){
            $required = '<span class="required">*</span>';
        }
    }

    if($field['subtype'] !== 'hidden'){
        printf('<label for="%s">%s %s</label>', $field['name'], $field['label'], $required);
    }

    printf(
        '<input type="%s" required="%s" name="text_fields[%s]" class="%s" value="%s" placeholder="%s">',
        $field['subtype'],
        $field['required'],
        $field['name'],
        $field['className'],
        get_post_meta($post_id, $field['name'], true) ?? '',
        $placeholder
    );
    if (isset($field['description']) && $field['subtype'] !== 'hidden') {
        printf('<p class="fus-custom-field-description %s">%s</p>', $field['name'], $field['description']);
    }
    ?>
</div>