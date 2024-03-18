<?php
$editor_type = 'textarea';

if (isset($field['editor_type'])) {
    $editor_type = $field['editor_type'];
}
?>
<div class="textarea-field <?= $field['name'] ?> <?= $editor_type ?>">
    <?php
    $placeholder = $field['label'];
    $content = get_post_meta($post_id, $field['name'], true);
    $max_length = '';
    $rows = 10;
    if (isset($field['rows'])) {
        $rows = $field['rows'];
    }
    if ($field['post_content']) {
        $content = get_post_field('post_content', $post_id);
    }
    if (isset($field['placeholder'])) {
        $placeholder = $field['placeholder'];
    }
    if (isset($field['maxlength'])) {
        $max_length = sprintf('maxlength="%s"', $field['maxlength']);
    }
    $required = '';
    if (isset($field['required'])) {
        if($field['required']){
            $required = '<span class="required">*</span>';
        }
    }
    printf('<label for="%s">%s %s</label>', $field['name'], $field['label'],$required);

    $simple_textarea = sprintf(
        '<textarea id="%s" type="%s" required="%s" rows="%s" name="textarea[%s]" class="%s" placeholder="%s" %s>%s</textarea>',
        $field['name'],
        $field['subtype'] ?? 'textarea',
        $field['required'],
        $rows,
        $field['name'],
        $field['className'],
        $placeholder,
        $max_length,
        $content
    );

    echo $simple_textarea;


    if (isset($field['description'])) {
        printf('<p class="fus-custom-field-description %s">%s</p>', $field['name'], $field['description']);
    }
    ?>
</div>