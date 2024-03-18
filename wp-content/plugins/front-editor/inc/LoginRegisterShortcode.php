<?php


/**
 * Gutenberg block to display Post Form.
 *
 * @package BFE;
 */

namespace BFE;

defined('ABSPATH') || exit;

/**
 * Class Post Form - registers custom gutenberg block.
 */
class LoginRegisterShortcodes
{
    public static function init()
    {
        add_shortcode('fus_form_login', [__CLASS__, 'fus_form_login_shortcode']);

        add_shortcode('fus_form_register', [__CLASS__, 'fus_form_register_shortcode']);

        add_action('init', [__CLASS__, 'fus_handle']);
    }

    public static function fus_form_login_shortcode($atts, $content = false)
    {
        $atts = shortcode_atts(array(
            'redirect' => false
        ), $atts);
        return self::get_fus_form_login($atts['redirect']);
    }

    public static function fus_form_register_shortcode($atts, $content = false)
    {
        $atts = shortcode_atts(array(
            'redirect' => false
        ), $atts);
        return self::get_fus_form_register($atts['redirect']);
    }

    /**
     * Get login form
     *
     * @param boolean $redirect
     * @return void
     */
    public static function get_fus_form_login($redirect = false)
    {
        global $fus_form_count;
        ++$fus_form_count;
        if (!is_user_logged_in()) {
            ob_start();
            require fe_template_path('login-form.php');

            return ob_get_clean();
        }
    }

    public static function get_fus_form_register($redirect = false)
    {
        global $fus_form_count;
        ++$fus_form_count;
        if (!is_user_logged_in()) :
            $return = "<form action=\"\" method=\"post\" class=\"fus_form fus_form_register\">\r\n";
            $error = self::get_fus_error($fus_form_count);
            if ($error)
                $return .= "<p class=\"error\">{$error}</p>\r\n";
            $success = self::get_fus_success($fus_form_count);
            if ($success)
                $return .= "<p class=\"success\">{$success}</p>\r\n";

            // add as many inputs, selects, textareas as needed
            $return .= "  <p>
            <label for=\"fus_username\">" . __('Username', FE_TEXT_DOMAIN) . "</label>
            <input type=\"text\" id=\"fus_username\" name=\"fus_username\"/></p>\r\n";
            $return .= "  <p>
            <label for=\"fus_email\">" . __('Email', FE_TEXT_DOMAIN) . "</label>
            <input type=\"email\" id=\"fus_email\" name=\"fus_email\"/></p>\r\n";
            // where to redirect on success
            if ($redirect)
                $return .= "  <input type=\"hidden\" name=\"redirect\" value=\"{$redirect}\">\r\n";

            $return .= "  <input type=\"hidden\" name=\"fus_action\" value=\"register\">\r\n";
            $return .= "  <input type=\"hidden\" name=\"fus_form\" value=\"{$fus_form_count}\">\r\n";

            $return .= "  <button type=\"submit\">" . __('Register', FE_TEXT_DOMAIN) . "</button>\r\n";
            $return .= "</form>\r\n";
        else :
            $return = __('User is logged in.', FE_TEXT_DOMAIN);
        endif;
        return $return;
    }

    public static function fus_handle()
    {
        $success = false;
        if (isset($_REQUEST['fus_action'])) {
            switch ($_REQUEST['fus_action']) {
                case 'login':
                    if (!$_POST['fus_username']) {
                        self::set_fus_error(__('<strong>ERROR</strong>: Empty username', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                    } else if (!$_POST['fus_password']) {
                        self::set_fus_error(__('<strong>ERROR</strong>: Empty password', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                    } else {
                        $creds = array();
                        $creds['user_login'] = $_POST['fus_username'];
                        $creds['user_password'] = $_POST['fus_password'];
                        if (isset($_POST['rememberme'])) {
                            $creds['remember'] = true;
                        }
                        $user = wp_signon($creds);
                        if (is_wp_error($user)) {
                            self::set_fus_error($user->get_error_message(), $_REQUEST['fus_form']);
                        } else {
                            self::set_fus_success(__('Log in successful', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                            $success = true;
                        }
                    }
                    break;
                case 'register':
                    if (!$_POST['fus_username']) {
                        self::set_fus_error(__('<strong>ERROR</strong>: Empty username', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                    } else if (!$_POST['fus_email']) {
                        self::set_fus_error(__('<strong>ERROR</strong>: Empty email', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                    } else {
                        $creds = array();
                        $creds['user_login'] = $_POST['fus_username'];
                        $creds['user_email'] = $_POST['fus_email'];
                        $creds['user_pass'] = wp_generate_password();
                        $creds['role'] = get_option('default_role');
                        //$creds['remember'] = false;
                        $user = wp_insert_user($creds);
                        if (is_wp_error($user)) {
                            self::set_fus_error($user->get_error_message(), $_REQUEST['fus_form']);
                        } else {
                            self::set_fus_success(__('Registration successful. Your password will be sent via email shortly.', FE_TEXT_DOMAIN), $_REQUEST['fus_form']);
                            wp_new_user_notification($user);
                            $body = sprintf('<p>%s: %s</p><p>%s: %s</p>', __('Login', FE_TEXT_DOMAIN), $creds['user_login'], __('Password', FE_TEXT_DOMAIN), $creds['user_pass']);
                            $headers = array('Content-Type: text/html; charset=UTF-8');
                            wp_mail($creds['user_email'], sprintf('[%s] %s', get_bloginfo('name'), __('Registration successful', FE_TEXT_DOMAIN)), $body, $headers);
                            $success = true;
                        }
                    }
                    break;
            }

            // if redirect is set and action was successful
            if ($success) {
                $redirect = '';
                if (isset($_REQUEST['redirect']) && $_REQUEST['redirect']) {
                    $redirect = $_REQUEST['redirect'];
                    wp_redirect($redirect);
                    exit;
                }
            }
        }
    }

    public static function set_fus_error($error, $id = 0)
    {
        $_SESSION['fus_error_' . $id] = $error;
    }

    public static function the_fus_error($id = 0)
    {
        echo self::get_fus_error($id);
    }

    public static function get_fus_error($id = 0)
    {
        if (isset($_SESSION['fus_error_' . $id])) {
            if ($_SESSION['fus_error_' . $id]) {
                $return = $_SESSION['fus_error_' . $id];
                unset($_SESSION['fus_error_' . $id]);
                return $return;
            }
        }
        return false;
    }
    public static function set_fus_success($error, $id = 0)
    {
        $_SESSION['fus_success_' . $id] = $error;
    }
    public static function the_fus_success($id = 0)
    {
        echo self::get_fus_success($id);
    }
    public static function get_fus_success($id = 0)
    {
        if (isset($_SESSION['fus_success_' . $id])) {
            if ($_SESSION['fus_success_' . $id]) {
                $return = $_SESSION['fus_success_' . $id];
                unset($_SESSION['fus_success_' . $id]);
                return $return;
            }
        }

        return false;
    }
}

LoginRegisterShortcodes::init();
