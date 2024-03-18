<?php

namespace BFE;

class UserAdmin
{

    /**
     * creating shortcode post list
     *
     * @param [type] $atts
     * @return void
     */
    public static function init($atts)
    {
        if (!is_user_logged_in()) {
            return sprintf('<div class="fus-info">%s</div>', __('This page is restricted. Please Login to view this page.', FE_TEXT_DOMAIN));
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $count = 2;
        $post_status = $_GET['post_status'] ?? 'publish';
        $any_user = $_GET['any_user'] ?? false;
        $user_can = current_user_can('edit_others_pages') ? true : false;
        $req_url = home_url($_SERVER['REQUEST_URI']);
        $req_url_query = parse_url($req_url, PHP_URL_QUERY);

        if (!empty($atts)) {
            $count = ($atts['count']) ? $atts['count'] : 6;
        }

        if(empty($atts)){
            if(!isset($atts['count'])){
                $count = 6;
            }
        }

        $args = [
            'posts_per_page' => $count,
            'paged' => $paged,
            'post_type' => 'post',
            'post_status' => $post_status,
            'author' => get_current_user_id()
        ];

        // Show all post if user can see all posts
        if ($any_user === 'true' && $user_can) {
            unset($args['author']);
        }

        if (isset($_GET['delete_post'])) {
            $delete_post_id = intval($_GET['delete_post']);
            if ($delete_post_id) {
                $deleted = wp_delete_post($delete_post_id);
                if (!$deleted) {
                    fe_fs_add_sentry_error(sprintf('Can not delete post with id = %s', $deleted), __FUNCTION__, ['func_args' => func_get_args()]);
                }
            }
        }


        $post_lists = new \WP_Query($args);

        ob_start();

        require FE_Template_PATH . '/user-admin.php';

        return ob_get_clean();
    }
}
