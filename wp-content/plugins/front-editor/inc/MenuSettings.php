<?php

namespace BFE;

// Exit if accessed directly
defined('ABSPATH') || exit;

/**
 *  Tool for MoySklad
 */
class MenuSettings
{
	public static $only_if_pro_text;
	public static $default_select;
	public static $is_pro_version;

	/**
	 * The Init
	 */
	public static function init()
	{
		self::$only_if_pro_text = __('Buy pro version to use this functionality', FE_TEXT_DOMAIN);
		self::$is_pro_version = get_option('bfe_is_front_editor_pro_version_exist');

		self::$default_select = [
			'display' => __('Display', FE_TEXT_DOMAIN),
			'require' => __('Display and require', FE_TEXT_DOMAIN),
			'disable' => __('Disable this field', FE_TEXT_DOMAIN)
		];

		add_action(
			'admin_menu',
			function () {
				if (current_user_can('manage_options')) {
					$capability = 'manage_options';

					$menu = add_menu_page(
						$page_title = __('Front User Submit | Front Editor', FE_TEXT_DOMAIN),
						$menu_title = __('Front User Submit', FE_TEXT_DOMAIN),
						$capability,
						$menu_slug = 'front_editor_settings',
						$function = ['\BFE\Form', 'fe_post_forms_page'],
						$icon = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83pt" height="83pt" viewBox="0 0 83 83" version="1.1"><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(62.745098%,64.705882%,66.666667%);fill-opacity:1;" d="M 45.902344 35.789062 C 45.554688 35.789062 45.21875 35.925781 44.976562 36.171875 L 43.875 37.273438 C 43.363281 37.785156 43.363281 38.613281 43.875 39.125 C 44.386719 39.636719 45.214844 39.636719 45.726562 39.125 L 46.828125 38.023438 C 47.203125 37.652344 47.3125 37.085938 47.109375 36.597656 C 46.910156 36.109375 46.429688 35.789062 45.902344 35.789062 Z M 45.902344 35.789062 "/><path style=" stroke:none;fill-rule:nonzero;fill:rgb(62.745098%,64.705882%,66.666667%);fill-opacity:1;" d="M 1.960938 31.058594 L 6.941406 33.191406 C 5.695312 38.367188 5.628906 43.757812 6.75 48.960938 L 1.71875 50.976562 C 1.046875 51.242188 0.71875 52.003906 0.988281 52.675781 L 4.453125 61.34375 C 4.722656 62.015625 5.484375 62.34375 6.15625 62.074219 L 11.191406 60.0625 C 11.605469 60.738281 12.042969 61.398438 12.5 62.042969 L 7.566406 66.980469 C 6.050781 68.488281 5.457031 70.691406 6.011719 72.757812 C 6.5625 74.824219 8.175781 76.4375 10.242188 76.988281 C 12.308594 77.542969 14.511719 76.949219 16.019531 75.433594 L 20.953125 70.5 C 21.363281 70.792969 21.777344 71.074219 22.203125 71.347656 L 20.070312 76.328125 C 19.785156 76.996094 20.09375 77.765625 20.757812 78.050781 L 29.339844 81.726562 C 30.003906 82.011719 30.773438 81.703125 31.058594 81.039062 L 33.191406 76.058594 C 38.367188 77.304688 43.757812 77.367188 48.960938 76.25 L 50.976562 81.28125 C 51.242188 81.953125 52.007812 82.28125 52.679688 82.011719 L 61.347656 78.546875 C 62.015625 78.277344 62.34375 77.515625 62.074219 76.84375 L 60.0625 71.808594 C 64.601562 69.03125 68.460938 65.269531 71.351562 60.796875 L 76.332031 62.929688 C 76.996094 63.214844 77.765625 62.90625 78.050781 62.242188 L 81.726562 53.660156 C 82.011719 52.996094 81.703125 52.226562 81.039062 51.941406 L 76.058594 49.808594 C 77.304688 44.632812 77.371094 39.242188 76.25 34.039062 L 81.28125 32.023438 C 81.953125 31.753906 82.28125 30.992188 82.011719 30.320312 L 78.546875 21.652344 C 78.277344 20.984375 77.515625 20.65625 76.84375 20.925781 L 71.808594 22.9375 C 71.355469 22.195312 70.875 21.46875 70.367188 20.765625 L 75.699219 9.035156 C 75.925781 8.535156 75.820312 7.953125 75.433594 7.566406 C 75.046875 7.179688 74.464844 7.074219 73.964844 7.300781 L 62.238281 12.628906 C 61.765625 12.292969 61.285156 11.964844 60.796875 11.648438 L 62.929688 6.667969 C 63.214844 6.003906 62.90625 5.234375 62.242188 4.949219 L 53.660156 1.273438 C 52.996094 0.988281 52.226562 1.296875 51.941406 1.960938 L 49.808594 6.9375 C 44.632812 5.695312 39.242188 5.628906 34.039062 6.75 L 32.023438 1.71875 C 31.757812 1.046875 30.992188 0.71875 30.320312 0.988281 L 21.652344 4.453125 C 20.984375 4.722656 20.65625 5.484375 20.925781 6.15625 L 22.9375 11.191406 C 18.398438 13.96875 14.539062 17.730469 11.648438 22.203125 L 6.667969 20.070312 C 6.003906 19.785156 5.234375 20.09375 4.949219 20.757812 L 1.273438 29.335938 C 0.988281 30.003906 1.296875 30.773438 1.960938 31.058594 Z M 14.167969 73.582031 C 12.855469 74.894531 10.730469 74.894531 9.417969 73.582031 C 8.105469 72.269531 8.105469 70.144531 9.417969 68.832031 L 14.105469 64.144531 C 15.535156 65.875 17.125 67.464844 18.855469 68.894531 Z M 71.871094 11.128906 L 69.972656 15.304688 L 67.695312 13.027344 Z M 63.164062 15.089844 L 65.144531 14.1875 L 68.8125 17.855469 L 67.910156 19.835938 L 66.804688 20.941406 L 62.054688 16.195312 Z M 64.953125 22.796875 L 58.9375 28.8125 C 58.933594 28.8125 58.933594 28.816406 58.933594 28.816406 L 32.953125 54.796875 C 32.371094 54.421875 31.8125 54.011719 31.285156 53.566406 L 42.425781 42.425781 C 42.9375 41.914062 42.9375 41.085938 42.425781 40.574219 C 41.914062 40.0625 41.085938 40.0625 40.574219 40.574219 L 29.433594 51.714844 C 28.988281 51.183594 28.578125 50.628906 28.203125 50.046875 L 54.183594 24.066406 C 54.1875 24.066406 54.1875 24.0625 54.1875 24.0625 L 60.203125 18.046875 Z M 41.503906 23.0625 C 34.964844 23.066406 28.917969 26.53125 25.609375 32.167969 C 22.300781 37.804688 22.226562 44.773438 25.410156 50.480469 C 25.410156 50.484375 25.410156 50.484375 25.414062 50.488281 C 27.074219 53.46875 29.535156 55.929688 32.519531 57.589844 C 33.078125 57.902344 33.652344 58.183594 34.238281 58.4375 C 41.320312 61.472656 49.542969 59.78125 54.851562 54.199219 C 60.160156 48.617188 61.4375 40.320312 58.050781 33.402344 L 59.574219 31.878906 C 64.257812 40.6875 61.914062 51.585938 54.023438 57.6875 C 46.128906 63.789062 34.992188 63.3125 27.648438 56.5625 C 20.304688 49.8125 18.898438 38.753906 24.316406 30.378906 C 29.730469 22 40.398438 18.75 49.566406 22.679688 C 50.09375 22.90625 50.609375 23.15625 51.121094 23.425781 L 49.597656 24.949219 C 49.320312 24.8125 49.042969 24.683594 48.761719 24.5625 C 46.46875 23.578125 44 23.066406 41.503906 23.0625 Z M 47.617188 26.925781 L 26.925781 47.621094 C 24.4375 41.699219 25.78125 34.863281 30.320312 30.324219 C 34.863281 25.78125 41.699219 24.441406 47.617188 26.925781 Z M 35.382812 56.074219 L 56.074219 35.378906 C 58.5625 41.300781 57.21875 48.136719 52.679688 52.675781 C 48.136719 57.21875 41.300781 58.558594 35.382812 56.074219 Z M 6.839844 22.992188 L 11.652344 25.054688 C 12.253906 25.308594 12.953125 25.082031 13.289062 24.523438 C 16.199219 19.683594 20.308594 15.675781 25.21875 12.886719 C 25.789062 12.5625 26.03125 11.871094 25.785156 11.261719 L 23.84375 6.402344 L 30.078125 3.90625 L 32.023438 8.765625 C 32.265625 9.375 32.921875 9.710938 33.558594 9.550781 C 39.035156 8.183594 44.777344 8.253906 50.21875 9.753906 C 50.851562 9.925781 51.515625 9.609375 51.773438 9.003906 L 53.832031 4.195312 L 60.007812 6.839844 L 57.945312 11.652344 C 57.6875 12.253906 57.914062 12.953125 58.476562 13.289062 C 59.046875 13.632812 59.613281 14 60.167969 14.378906 L 53.046875 21.5 C 52.253906 21.042969 51.4375 20.632812 50.597656 20.273438 C 40.183594 15.808594 28.070312 19.558594 22 29.125 C 15.925781 38.691406 17.691406 51.246094 26.164062 58.769531 C 34.636719 66.292969 47.3125 66.558594 56.09375 59.398438 C 64.875 52.238281 67.164062 39.765625 61.5 29.953125 L 68.617188 22.835938 C 69.148438 23.609375 69.652344 24.40625 70.113281 25.21875 C 70.4375 25.789062 71.128906 26.03125 71.738281 25.785156 L 76.597656 23.84375 L 79.09375 30.078125 L 74.234375 32.023438 C 73.625 32.265625 73.289062 32.921875 73.449219 33.558594 C 74.816406 39.035156 74.746094 44.773438 73.246094 50.21875 C 73.074219 50.851562 73.390625 51.515625 73.992188 51.773438 L 78.800781 53.832031 L 76.160156 60.007812 L 71.347656 57.945312 C 70.746094 57.6875 70.046875 57.914062 69.710938 58.476562 C 66.800781 63.316406 62.691406 67.324219 57.78125 70.113281 C 57.210938 70.4375 56.96875 71.128906 57.214844 71.738281 L 59.15625 76.597656 L 52.921875 79.09375 L 50.976562 74.234375 C 50.734375 73.625 50.078125 73.289062 49.441406 73.449219 C 43.964844 74.8125 38.222656 74.746094 32.78125 73.246094 C 32.148438 73.074219 31.484375 73.390625 31.226562 73.992188 L 29.167969 78.800781 L 22.992188 76.15625 L 25.054688 71.347656 C 25.3125 70.746094 25.085938 70.046875 24.523438 69.707031 C 19.683594 66.796875 15.675781 62.691406 12.886719 57.78125 C 12.5625 57.210938 11.871094 56.96875 11.261719 57.210938 L 6.402344 59.15625 L 3.90625 52.921875 L 8.765625 50.976562 C 9.375 50.734375 9.710938 50.078125 9.550781 49.441406 C 8.183594 43.964844 8.253906 38.222656 9.753906 32.78125 C 9.925781 32.148438 9.609375 31.484375 9.007812 31.226562 L 4.199219 29.164062 Z M 6.839844 22.992188 "/></g></svg>'),
						'57.5'
					);

					$post_forms_submenu = add_submenu_page(
						'front_editor_settings',
						__('Post Forms', FE_TEXT_DOMAIN),
						__('Post Forms', FE_TEXT_DOMAIN),
						$capability,
						'fe-post-forms',
						['\BFE\Form', 'fe_post_forms_page']
					);
					remove_submenu_page('front_editor_settings', 'front_editor_settings');

					$settings_submenu = add_submenu_page(
						'front_editor_settings',
						__('Settings', FE_TEXT_DOMAIN),
						__('Settings', FE_TEXT_DOMAIN),
						$capability,
						'fe-global-settings',
						[__CLASS__, 'display_page']
					);
				}
			}
		);

		add_action('admin_init', [__CLASS__, 'settings_general'], $priority = 10, $accepted_args = 1);

		/**
		 * short information and instruction
		 */
		add_action('bfe_front_editor_settings_before_form', [__CLASS__, 'short_information_and_instruction']);

		/**
		 * Adding notice
		 */
		add_action('admin_notices', [__CLASS__, 'options_instructions_example']);
	}


	/**
	 * Add admin message to edit page
	 *
	 * @return void
	 */
	public static function options_instructions_example()
	{
		global $my_admin_page;
		$screen = get_current_screen();

		if (is_admin()) {
			/**
			 * If post edited with Front Editor
			 */
			if (get_post_meta(get_the_ID(), 'bfe_editor_js_data', true)) {
				add_action('edit_form_after_title', [__CLASS__, 'add_content_after_editor']);
			}
		}
	}


	/**
	 * Print admin message
	 *
	 * @return void
	 */
	public static function add_content_after_editor()
	{
		global $post;
		$id = $post->ID;
		$class = 'notice notice-error';
		$message = sprintf(
			__('This post created with the Front Editor plugin. Please edit it using Front Editor to not have issues with the plugin!', FE_TEXT_DOMAIN)
		);

		printf('<div class="%s"><p>%s</p><a href="%s">%s</a></div>', esc_attr($class), $message, Editor::get_post_edit_link($id), __('Edit in front editor', FE_TEXT_DOMAIN));
	}

	/**
	 * adding general settings
	 *x
	 * @return void
	 */
	public static function settings_general()
	{
		add_settings_section('bfe_front_editor_general_settings_section', __('Global settings', FE_TEXT_DOMAIN), null, 'front_editor_settings');

		/**
		 * Edit button position in single post
		 */
		$cs_option_name = 'bfe_front_editor_edit_button_position';
		register_setting('front_editor_settings', $cs_option_name);
		add_settings_field(
			$id = $cs_option_name,
			$title = __('Edit Post button position in post', FE_TEXT_DOMAIN),
			$callback = [__CLASS__, 'edit_button_position'],
			$page = 'front_editor_settings',
			$section = 'bfe_front_editor_general_settings_section',
			$args = [
				'id' => $cs_option_name,
				'label_for' => $cs_option_name
			]
		);

		/**
		 * Edit button text
		 */
		$cs_option_name = 'bfe_front_editor_edit_button_text';
		register_setting('front_editor_settings', $cs_option_name);
		add_settings_field(
			$id = $cs_option_name,
			$title = __('- Edit Button Text', FE_TEXT_DOMAIN),
			$callback = [__CLASS__, 'edit_button_text'],
			$page = 'front_editor_settings',
			$section = 'bfe_front_editor_general_settings_section',
			$args = [
				'id' => $cs_option_name,
				'label_for' => $cs_option_name
			]
		);

		/**
		 * Disable or enable wp admin bar
		 */
		$cs_option_name = 'bfe_front_editor_wp_admin_menu';
		register_setting('front_editor_settings', $cs_option_name);
		add_settings_field(
			$id = $cs_option_name,
			$title = __('WordPress admin bar', FE_TEXT_DOMAIN),
			$callback = [__CLASS__, 'wp_admin_menu'],
			$page = 'front_editor_settings',
			$section = 'bfe_front_editor_general_settings_section',
			$args = [
				'id' => $cs_option_name,
				'label_for' => $cs_option_name
			]
		);
	}

	/**
	 * What we have
	 *
	 * @return void
	 */
	public static function short_information_and_instruction()
	{
		printf('<h2>%s</h2>', __('Short information', FE_TEXT_DOMAIN));

		$class = 'notice notice-warning is-dismissible';
		$message = sprintf(
			__(
				'If you have some ideas or questions please contact me. 
				The contact information you can find on our website %s',
				FE_TEXT_DOMAIN
			),
			'<strong><a href="https://wpfronteditor.com" target="_blank">wpfronteditor.com</a></strong>'
		);
		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), $message);

		$github_link = '<a  target="_blank" href="https://t.me/+loTEjPRS6lw3NTli">Community</a>';
		$site_link = 'https://wpfronteditor.com/';
		printf(
			'<p>%s</p>',
			sprintf(__('You can buy pro version or find additional information <a href="%s" target="_blank">here</a> or write some ideas or report issues in %s', FE_TEXT_DOMAIN), $site_link, $github_link)
		);
	}


	/**
	 * Display UI
	 */
	public static function display_page()
	{
		echo sprintf('<h1>%s</h1>', __('Settings Page', FE_TEXT_DOMAIN));
		do_action('bfe_front_editor_settings_before_form');
		echo '<form method="POST" action="options.php">';
		settings_fields('front_editor_settings');
		do_settings_sections('front_editor_settings');
		submit_button();
		echo '</form>';
	}

	public static function edit_button_position($val)
	{

		$id = $val['id'];

		echo sprintf('<select name="%s">', $id);

		$options = [
			'after_content' => __('After Post Content', FE_TEXT_DOMAIN),
			'before_content' => __('Before Post Content', FE_TEXT_DOMAIN),
			'left_bottom' => __('Left bottom', FE_TEXT_DOMAIN),
			'left_top' => __('Left top', FE_TEXT_DOMAIN),
			'right_bottom' => __('Right bottom', FE_TEXT_DOMAIN),
			'right_top' => __('Right top', FE_TEXT_DOMAIN),
			'hide' => __('Hide', FE_TEXT_DOMAIN),
		];

		foreach ($options as $val => $option) {
			echo sprintf('<option value="%s" %s >%s</option>', $val, selected($val, get_option($id), false), $option);
		}
		echo '</select>';
		echo sprintf('<p>%s</p>',__('Select Edit Post button position on created post', FE_TEXT_DOMAIN));
	}

	public static function edit_button_text($val)
	{

		$id = $val['id'];
		$input_value = get_option($id);

		if(empty($input_value)){
			$input_value = __('Edit Current Post', FE_TEXT_DOMAIN);
		}

		printf('<input name="%s" value="%s">', $id, $input_value);

		echo sprintf('<p>%s</p>',__('Add edit button text', FE_TEXT_DOMAIN));
	}

	/**
	 * Display featured image
	 *
	 * @param [type] $val
	 * @return void
	 */
	public static function wp_admin_menu($val)
	{
		$id = $val['id'];

		echo sprintf('<select name="%s">', $id);

		$options = [
			'display' => __('Display', FE_TEXT_DOMAIN),
			'disable' => __('Disable for all', FE_TEXT_DOMAIN),
			'disable_but_admin' => __('Disable for all but admin', FE_TEXT_DOMAIN),
		];

		foreach ($options as $val => $option) {
			echo sprintf('<option value="%s" %s >%s</option>', $val, selected($val, get_option($id), false), $option);
		}
		echo '</select>';
	}

	/**
	 * category selector settings
	 *
	 * @param [type] $val
	 * @return void
	 */
	public static function display_category_selector($val)
	{
		$disabled = 0;

		$id = $val['id'];
		echo sprintf('<select name="%s" %s>', $id, disabled($disabled, true, false));
		$data = get_option($id);
		foreach (self::$default_select as $val => $option) {
			echo sprintf('<option value="%s" %s >%s</option>', $val, selected($val, get_option($id), false), $option);
		}
		echo '</select>';
	}

	/**
	 * post type selector settings
	 *
	 * @param [type] $val
	 * @return void
	 */
	public static function display_post_type_selector($val)
	{
		$disabled = 1;

		if (self::$is_pro_version) {
			$disabled = 0;
		}

		$id = $val['id'];
		echo sprintf('<select name="%s" %s>', $id, disabled($disabled, true, false));
		$data = get_option($id);
		foreach (self::$default_select as $val => $option) {
			echo sprintf('<option value="%s" %s >%s</option>', $val, selected($val, get_option($id), false), $option);
		}
		echo '</select>';

		if ($disabled) {
			echo sprintf('<p>%s</p>', self::$only_if_pro_text);
		}
	}
}

MenuSettings::init();
