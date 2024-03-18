<?php
$update_message = isset($form_settings['update_message']) ? $form_settings['update_message'] : __('Post updated successfully', FE_TEXT_DOMAIN);
$post_update_button_text = isset($form_settings['post_update_button_text']) ? $form_settings['post_update_button_text'] : __('Update', FE_TEXT_DOMAIN);
$redirect_to          = isset($form_settings['edit_redirect_to']) ? $form_settings['edit_redirect_to'] : 'same';
$post_update_lock_user_after = isset($form_settings['post_update_lock_user_after']) ? $form_settings['post_update_lock_user_after'] : '';
$post_update_lock_user_after_text = isset($form_settings['post_update_lock_user_after_text']) ? $form_settings['post_update_lock_user_after_text'] : __('You are not allowed to edit anymore.', FE_TEXT_DOMAIN);;
?>
<table class="form-table">

    <!-- Select edit page  -->
    <tr class="setting" id="post_edit_page">
        <th><?= __('Select edit page', FE_TEXT_DOMAIN); ?></th>
        <td>
            <?php
            $id = 'settings[post_edit_page]';
            $options = get_pages();
            $selected = isset($form_settings['post_edit_page']) ? $form_settings['post_edit_page'] : 'disable';
            printf('<select name="%s">', $id);
            printf('<optgroup label="%s">', __('Settings', FE_TEXT_DOMAIN));
            printf('<option value="%s" %s>%s</option>', 'same_page', esc_attr(selected('same_page', $selected, false)), 'Same Form');
            printf('<option value="%s" %s>%s</option>', 'disable', esc_attr(selected('disable', $selected, false)), 'Disable Editing');
            printf('<optgroup label="%s">', __('Pages', FE_TEXT_DOMAIN));
            foreach ($options as $val => $option) {
                printf('<option value="%s" %s>%s</option>', $option->ID, esc_attr(selected($option->ID, $selected, false)), $option->post_title);
            } ?>
            </select>
            <p><?= __('Select page same with other form shortcode', FE_TEXT_DOMAIN); ?></p>
        <td>
    </tr>

    <!-- Post redirection settings  -->
    <tr class="setting">
        <th><?= __('Redirect To', FE_TEXT_DOMAIN) ?></th>
        <td>
            <select name="settings[post_update_redirect_to]" id="post_update_redirect_to">
                <?php
                $options = [
                    'disable' => __('No Redirect', FE_TEXT_DOMAIN),
                    'post' => __('Currently Edited Post', FE_TEXT_DOMAIN),
                    'url' => __('To a custom URL', FE_TEXT_DOMAIN)
                ];

                $options_selected = isset($form_settings['post_update_redirect_to']) ? $form_settings['post_update_redirect_to'] : 'disable';

                foreach ($options as $option => $label) {
                    printf('<option value="%s"%s>%s</option>', esc_attr($option), esc_attr(selected($options_selected, $option, false)), esc_html($label));
                }; ?>
            </select>
            <p class="description"><?= __('After successfully submit, where the page will redirect to', FE_TEXT_DOMAIN) ?></p>
        </td>
    </tr>

    <tr class="setting hidden_element" id="post_update_redirect_to_link">
        <th><?= __('Custom URL', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="text" name="settings[post_update_redirect_to_link]" value="<?php echo esc_attr($form_settings['post_update_redirect_to_link'] ?? ''); ?>">
        </td>
    </tr>
    <!-- Post redirection settings  -->
    <tr class="update-message">
        <th><?php esc_html_e('Post Update Message', FE_TEXT_DOMAIN); ?></th>
        <td>
            <textarea rows="3" cols="40" name="settings[update_message]"><?php echo esc_textarea($update_message); ?></textarea>
        </td>
    </tr>
    <tr class="post_update_button_text">
        <th><?php esc_html_e('Update Post Button text', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="text" name="settings[post_update_button_text]" value="<?php echo esc_attr($post_update_button_text); ?>">
        </td>
    </tr>
    <tr class="post_update_button_text">
        <th><?php esc_html_e('Lock User From Editing After', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="number" min="1" name="settings[post_update_lock_user_after]" value="<?php echo esc_attr($post_update_lock_user_after); ?>"><span><?= __('hours', FE_TEXT_DOMAIN) ?></span>
            <p class="description"><?= __('After how many hours user will be locked from editing the submitted post.', FE_TEXT_DOMAIN) ?></p>

            <input type="text" with="200px" name="settings[post_update_lock_user_after_text]" value="<?php echo esc_attr($post_update_lock_user_after_text); ?>" style="width: 300px;max-width: 100%;">
            <p class="description"><?= __('Restriction text if the time was passed', FE_TEXT_DOMAIN) ?></p>

        </td>
    </tr>
</table>