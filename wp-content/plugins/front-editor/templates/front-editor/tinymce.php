<div class="textarea-field <?= $field['name'] ?> tinymce">
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

    $settings  = [
        'wpautop'          => true,   // Whether to use wpautop for adding in paragraphs. Note that the paragraphs are added automatically when wpautop is false.
        'media_buttons'    => true,   // Whether to display media insert/upload buttons
        'textarea_name'    => sprintf('tinymce[%s]', $field['name']),   // The name assigned to the generated textarea and passed parameter when the form is submitted.
        'textarea_rows'    => $rows,  // The number of rows to display for the textarea
        'tabindex'         => '',     // The tabindex value used for the form field
        'editor_css'       => '',     // Additional CSS styling applied for both visual and HTML editors buttons, needs to include <style> tags, can use "scoped"
        'editor_class'     => $field['className']??'',     // Any extra CSS Classes to append to the Editor textarea
        'teeny'            => false,  // Whether to output the minimal editor configuration used in PressThis
        'dfw'              => false,  // Whether to replace the default fullscreen editor with DFW (needs specific DOM elements and CSS)
        'tinymce'          => true,   // Load TinyMCE, can be used to pass settings directly to TinyMCE using an array
        'quicktags'        => false,   // Load Quicktags, can be used to pass settings directly to Quicktags using an array. Set to false to remove your editor's Visual and Text tabs.
        'drag_drop_upload' => true    // Enable Drag & Drop Upload Support (since WordPress 3.9)
    ];

    // display the editor
    wp_editor($content, $field['name'], $settings);


    if (isset($field['description'])) {
        printf('<p class="fus-custom-field-description %s">%s</p>', $field['name'], $field['description']);
    }
    ?>
</div>