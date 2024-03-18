<?php

/**
 * This class help to work with editor
 *
 * Long Description.
 *
 * @link URL
 * @since x.x.x (if available)
 *
 * @package bfee
 */

namespace BFE;

/**
 * Editor class;
 */
class Editor
{

	/**
	 * Page editor init
	 *
	 * @return string
	 */
	public static function show_front_editor($attributes, $content = '', $type = "")
	{
		$attributes['id'] = isset($attributes['id']) ? (int) sanitize_text_field($attributes['id']) : 0;
		$form_settings = [];
		if ($attributes['id']) {
			$form_settings = get_post_meta($attributes['id'], 'fe_form_settings', true);
		}

		$post_id       = 'new';
		$editor_data   = 'new';
		$update_button_text = isset($form_settings['post_update_button_text']) ? $form_settings['post_update_button_text'] : __('Update', FE_TEXT_DOMAIN);
		$submit_button_text = isset($form_settings['submit_text']) ? $form_settings['submit_text'] : __('Publish', FE_TEXT_DOMAIN);
		$button_text   = $submit_button_text;
		$html_content  = '';
		$new_post_link = get_permalink(get_the_ID());

		do_action('bfe_before_post_form_frontend_execution', $attributes);

		if (!empty($_GET['post_id'])) {

			$post_id = intval(sanitize_text_field($_GET['post_id']));

			if (!$post_id) {
				return sprintf('<h2>%s</h2>', __('The post you trying to edit is not exist, please create a new one', FE_TEXT_DOMAIN));
			}

			if (!get_post_status($post_id)) {
				return sprintf('<h2>%s</h2>', __('The post you trying to edit is not exist, please create a new one', FE_TEXT_DOMAIN));
			}
		}

		$can_edit = self::can_edit_post(0, $post_id, $attributes['id']);
		if (!$can_edit['status']) {
			if (isset($form_settings['login']['show_login'])) {
				return do_shortcode('[fus_form_login]');
			}
			return $can_edit['message'];
		}

		if ('new' !== $post_id) {
			$button_text = $update_button_text;
		}

		$data = [
			'ajax_url'          => admin_url('admin-ajax.php'),
			'html_post_content' => apply_filters('fe_localize_post_html_content', [], $attributes, $post_id),
			'is_user_logged_in' => is_user_logged_in(),
			'rest_url_image' 	=> get_rest_url(null, 'bfe/v1/upload_image'),
			'rest_url_upload_file' 	=> get_rest_url(null, 'bfe/v1/upload_file'),
			'form_settings' => $form_settings,
			'translations'      => [
				'save_button' => [
					'publish'  => $submit_button_text,
					'updating' => sprintf('%s...', __('Updating', FE_TEXT_DOMAIN)),
					'update'   => $update_button_text,
				],
				'default_error_message' => __('Something goes wrong try later', FE_TEXT_DOMAIN)
			],
		];

		$wp_localize_data = apply_filters('bfe_front_editor_localize_data', $data, $attributes, $post_id);

		/**
		 * Activating wp media uploader
		 */
		if (!self::guest_posting_enabled($form_settings) || is_user_logged_in()) {
			if ($wp_localize_data['post_thumb']['wp_media_uploader'] || $wp_localize_data['editor_settings']['editor_gallery_plugin']) {
				wp_enqueue_media();
			}
		}

		wp_enqueue_script('bfee-editor.js');
		wp_enqueue_style('bfe-block-style');
		ob_start();
		require fe_template_path('front-editor-form.php');

		// wp localize script is not working on Twenty Twenty-Three this solution helped
		printf('<script>var editor_data = %s</script>', json_encode($wp_localize_data));

		return ob_get_clean();
	}

	/**
	 * Can user edit post
	 *
	 * @param integer $cur_user_id current user id.
	 * @param string  $post_id post id.
	 * @return array
	 */
	public static function can_edit_post($cur_user_id = 0, $post_id = 'new', $form_id = 0)
	{
		$form_settings = 0;

		if ($form_id) {
			$form_settings = get_post_meta($form_id, 'fe_form_settings', true);
		}

		$guest_posting = false;

		if (isset($form_settings['guest_post'])) {
			if ($form_settings['guest_post'] === 'true') {
				$guest_posting = true;
			}
		}

		// Guest posting
		if ($form_id && 'new' === $post_id) {
			if ($guest_posting) {
				return ['status' => true];
			}
		}

		if (!$cur_user_id) {
			$cur_user_id = get_current_user_id();
		}

		if (!is_user_logged_in() && !$guest_posting) {
			$message = __('This page is restricted. Please Login to view this page.', FE_TEXT_DOMAIN);

			if (isset($form_settings['login']['restricted_message'])) {
				if (!empty($form_settings['login']['restricted_message'])) {
					$message = $form_settings['login']['restricted_message'];
				}
			}

			return ['status' => false, 'message' => sprintf('<div class="fus-info">%s</div>', $message)];
		}

		$cur_post = get_post($post_id);

		// when trying to edit already existing post
		if ('new' !== $post_id) {

			if(($cur_user_id === (int) $cur_post->post_author) && !current_user_can('delete_others_posts')){
				if(isset($form_settings['post_update_lock_user_after'])) {
					$allow_hours = $form_settings['post_update_lock_user_after'] * 3600;
					$post_created_time = get_post_time( 'U', true,$cur_post );
					if(time() > ($allow_hours+$post_created_time)) {
						$message =  __('You are not allowed to edit anymore.', FE_TEXT_DOMAIN);
						if(isset($form_settings['post_update_lock_user_after_text'])) {
							$message = $form_settings['post_update_lock_user_after_text'];
						}
						return	['status' => false, 'message' => sprintf('<div class="fus-info">%s</div>', $message)];
					}
				}
			}

			if (!current_user_can('delete_others_posts') && ($cur_user_id !== (int) $cur_post->post_author)) {
				return	['status' => false, 'message' => sprintf('<div class="fus-info">%s</div>', __('You are not allowed to edit', FE_TEXT_DOMAIN))];
			}

		}


		return ['status' => true];
	}

	/**
	 * Check if guest post is enabled
	 *
	 * @param [type] $form_settings
	 * @return void
	 */
	public static function guest_posting_enabled($form_settings)
	{
		if (empty($form_settings)) {
			return false;
		}

		if (isset($form_settings['guest_post'])) {
			if ($form_settings['guest_post'] === 'true') {
				return true;
			}
		}

		return false;
	}

	/**
	 * Getting edit links by id
	 *
	 * @param integer $post_id past id to get link.
	 * @return string
	 */
	public static function get_post_edit_link($post_id)
	{
		if (empty($post_id)) {
			return false;
		}

		$form_id = get_post_meta($post_id, 'BFE_the_post_edited_by', true);

		if (empty($form_id)) {
			return false;
		}

		$form_settings = get_post_meta($form_id, 'fe_form_settings', true);

		if (empty($form_settings)) {
			return false;
		}

		$form_shortcode = sprintf('[fe_form id="%s"]', $form_id);
		$form_page_id = self::get_page_by_shortcode($form_shortcode);
		$link_mockup = '%s?post_id=%s';

		// this mean that user did not set up yet this settings and for old users it will work
		if (!isset($form_settings['post_edit_page'])) {
			return sprintf($link_mockup, get_permalink($form_page_id), $post_id);
		}

		$edit_page_settings = $form_settings['post_edit_page'];

		if ($edit_page_settings === 'disable') {
			return false;
		}

		if ($edit_page_settings === 'same_page') {
			if ($form_page_id) {
				return sprintf($link_mockup, get_permalink($form_page_id), $post_id);
			} else {
				return false;
			}
		}

		return sprintf($link_mockup, get_permalink($edit_page_settings), $post_id);
	}

	/**
	 * Find id by shortcode
	 *
	 * @param [type] $shortcode
	 * @return void
	 */
	public static function get_page_by_shortcode($shortcode)
	{
		global $wpdb;
		$query = sprintf("SELECT * FROM `%s` WHERE `post_content` LIKE '%s' AND post_status = 'publish'", $wpdb->posts, '%' . $shortcode . '%');
		$results = $wpdb->get_results($query);

		if (empty($results)) {
			return false;
		}

		foreach ($results as $results) {
			return $results->ID;
		}
	}
}
