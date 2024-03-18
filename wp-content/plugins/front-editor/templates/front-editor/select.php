<?php
$select_name = sprintf('select[%s][ids]', $field['name']);

$placeholder = $field['label'];
if (isset($field['placeholder'])) {
    $placeholder = $field['placeholder'];
}

$selected = get_post_meta($post_id, $field['name']);
if (empty($selected)) {
    $selected = [];
} elseif (is_array($selected) && count($selected) === 1 && $field['multiple']) {
    $selected = explode(',', $selected[0]);
}
$required = '';
if (isset($field['required'])) {
    if ($field['required']) {
        $required = '<span class="required">*</span>';
    }
}
?>
<div class="select-wrap <?= $field['type'] ?>">
    <label for="<?= $field['type'] ?>"><?php echo esc_attr($field['label']); ?> <?= $required ?></label>
    <input type="hidden" name="<?= sprintf('select[%s][required]', $field['name']) ?>" value="<?= $field['required'] ? 1 : 0 ?>">
    <input type="hidden" name="<?= sprintf('select[%s][label]', $field['name']) ?>" value="<?= $field['label'] ?>">
    <select id="<?= $field['type'] ?>" class="taxonomy-select <?= $field['name'] ?>" name="<?= $select_name ?>" <?php echo $field['multiple'] ? 'multiple' : ''; ?> data-placeholder="<?php echo esc_attr($placeholder); ?>" <?= $field['required'] ? 'required' : '' ?>>
        <option data-placeholder="true"></option>
        <?php
        foreach ($field['values'] as $term) {
            $term_id = $term['value'];
            echo sprintf(
                '<option %s value="%s">%s</option>',
                in_array($term_id, $selected) ? 'selected' : '',
                $term_id,
                $term['label']
            );
        }
        ?>
    </select>
    <?php
    if (isset($field['description'])) {
        printf('<p class="fus-custom-field-description %s">%s</p>', $field['name'], $field['description']);
    }
    ?>
</div>