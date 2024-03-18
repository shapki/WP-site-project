<?php
$prefix = sprintf('post_%s', $post_notification_type);
$settings = [];
if (isset($form_settings['notifications'][$prefix])) {
    $settings = $form_settings['notifications'][$prefix];
}
$enabled = !empty($settings['enabled']) ? $settings['enabled'] : 'false';
$subject = isset($settings['subject']) ? $settings['subject'] : sprintf('Post %sed- [post_title]', $post_notification_type);
$from_name = isset($settings['from_name']) ? $settings['from_name'] : __('No Reply', FE_TEXT_DOMAIN);
$from_email = isset($settings['from_email']) ? $settings['from_email'] : __('noreply@localhost.com', FE_TEXT_DOMAIN);
$message = isset($settings['message']) ? $settings['message'] : 'Hi [author_name],' . PHP_EOL . PHP_EOL . 'Your post has been '.$post_notification_type.'ed [sitename] ([siteurl]).' . PHP_EOL . 'Here is the details: ' . PHP_EOL . 'Post Title: [post_title] ' . PHP_EOL . 'Author: [author_name] ' . PHP_EOL . 'Post URL: [post_link] ' . PHP_EOL . 'Edit URL: [post_link] ' . PHP_EOL;
?>

<h3><?= sprintf('Post %s notification', $post_notification_type); ?></h3>
<table class="form-table">
    <tr class="setting">
        <th><?php esc_html_e('Activate Notifications', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="checkbox" name="settings[notifications][<?= $prefix ?>][enabled]" value="true" <?php checked($enabled, 'true'); ?> />
        </td>
    </tr>
    <tr class="send_<?= $prefix ?>_notification_subject">
        <th><?php esc_html_e('Subject', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="text" name="settings[notifications][<?= $prefix ?>][subject]" value="<?php echo esc_attr($subject); ?>">
        </td>
    </tr>
    <tr class="send_<?= $prefix ?>_notification_from_name">
        <th><?php esc_html_e('From Name', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="text" name="settings[notifications][<?= $prefix ?>][from_name]" value="<?php echo esc_attr($from_name); ?>">
        </td>
    </tr>
    <tr class="send_<?= $prefix ?>_notification_from_email">
        <th><?php esc_html_e('From Email', FE_TEXT_DOMAIN); ?></th>
        <td>
            <input type="text" name="settings[notifications][<?= $prefix ?>][from_email]" value="<?php echo esc_attr($from_email); ?>">
        </td>
    </tr>
    <tr class="send_<?= $prefix ?>_notification_text">
        <th><?php esc_html_e('Message', FE_TEXT_DOMAIN); ?> </th>
        <td>
            <textarea rows="10" cols="80" name="settings[notifications][<?= $prefix ?>][message]"><?php echo esc_textarea($message); ?></textarea>
        </td>
    </tr>
</table>