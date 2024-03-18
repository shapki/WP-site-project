<?php

$form_settings = get_post_meta( $post_ID, 'fe_form_settings', true );
?>
<form action id="fe-fromBuilder">
    <?php 
// wp nonce for security
wp_nonce_field( 'admin_form_builder_nonce', 'admin_form_builder_nonce' );
?>
    <div class="settings-header primary">
        <div>
            <p><?php 
echo  __( 'Form Title', FE_TEXT_DOMAIN ) ;
?></p>
            <input type="text" name="fe_title" value="<?php 
echo  ( $post_ID !== 'new' ? get_the_title( $post_ID ) : __( 'Sample Form', FE_TEXT_DOMAIN ) ) ;
?>" placeholder="<?php 
echo  __( 'Sample Form', FE_TEXT_DOMAIN ) ;
?>">
        </div>
        <div>
            <p><?php 
echo  __( 'Shortcode', FE_TEXT_DOMAIN ) ;
?></p>
            <?php 
$shortcode = '[fe_form id="%s"]';
?>
            <code><?php 
echo  sprintf( $shortcode, $post_ID ) ;
?></code>
        </div>

        <input type="text" id="post_id" name="post_id" value="<?php 
echo  $post_ID ;
?>" class="hidden">
        <button id="save-form-post" class="right_top"><?php 
echo  __( 'Save', FE_TEXT_DOMAIN ) ;
?></button>
    </div>
    <div class="settings-header">
        <fieldset>
            <h2 class="nav-tab-wrapper">
                <a href="#post-form-builder" class="nav-tab top nav-tab-active"><?php 
echo  __( 'Form Editor', FE_TEXT_DOMAIN ) ;
?></a>
                <a href="#post-form-settings" class="nav-tab top"><?php 
echo  __( 'Settings', FE_TEXT_DOMAIN ) ;
?></a>
                <a href="#post-form-notification" class="nav-tab top"><?php 
echo  __( 'Notifications', FE_TEXT_DOMAIN ) ;
?></a>
                <a href="#post-form-login-register" class="nav-tab top"><?php 
echo  __( 'Login/Register', FE_TEXT_DOMAIN ) ;
?></a>
            </h2>
        </fieldset>
    </div>

    <div class="tab-contents">
        <div id="post-form-builder" class="group top active">
            <h3><?php 
echo  __( 'Options', FE_TEXT_DOMAIN ) ;
?></h3>
            <span><?php 
echo  __( 'Select post type', FE_TEXT_DOMAIN ) ;
?></span>
            <select name="settings[fe_post_type]" id="fe_settings_post_type">
                <?php 
$post_types = get_post_types();
$post_type_selected = ( isset( $form_settings['fe_post_type'] ) ? $form_settings['fe_post_type'] : 'post' );
unset( $post_types['attachment'] );
unset( $post_types['revision'] );
unset( $post_types['nav_menu_item'] );
unset( $post_types['wpuf_forms'] );
unset( $post_types['wpuf_profile'] );
unset( $post_types['wpuf_input'] );
unset( $post_types['wpuf_subscription'] );
unset( $post_types['custom_css'] );
unset( $post_types['customize_changeset'] );
unset( $post_types['wpuf_coupon'] );
unset( $post_types['oembed_cache'] );
unset( $post_types['fe_post_form'] );
unset( $post_types['wp_block'] );
unset( $post_types['user_request'] );
foreach ( $post_types as $post_type ) {
    $post_type_name = $post_type;
    $disabled = ( $post_type !== 'post' ? 'disabled' : '' );
    $post_type_name = ( $post_type !== 'post' ? $post_type . ' (PRO)' : $post_type );
    printf(
        '<option value="%s" %s %s>%s</option>',
        esc_attr( $post_type ),
        $disabled ?? '',
        esc_attr( selected( $post_type_selected, $post_type, false ) ),
        esc_html( $post_type_name )
    );
}
?>
            </select>
            <div class="formBuilder-wrapper">
                <div id="form-builder"></div>
            </div>
        </div>

        <div id="post-form-settings" class="group top clearfix">
            <fieldset>
                <h2 id="fe-form-builder-settings-tabs" class="nav-tab-wrapper">
                    <a href="#fe-metabox-settings-post" class="nav-tab sub nav-tab-active"><?php 
echo  __( 'Post Submit Settings', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-settings-update" class="nav-tab sub "><?php 
echo  __( 'Edit Post Settings', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-submission-restriction" class="nav-tab sub "><?php 
echo  __( 'Submission Restriction', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-submission-display-design" class="nav-tab sub "><?php 
echo  __( 'Display Settings', FE_TEXT_DOMAIN ) ;
?></a>
                    <!-- <a href="#fe-metabox-settings-payment" class="nav-tab sub ">Payment Settings</a>
                    <a href="#fe-metabox-post_expiration" class="nav-tab sub ">Post Expiration</a> -->
                </h2>
            </fieldset>
            <div class="sub_field_groups_container">
                <div id="fe-metabox-settings-post" class="group sub active">
                    <?php 
require_once __DIR__ . '/settings/form-settings-post.php';
?>
                </div>
                <div id="fe-metabox-settings-update" class="group sub">
                    <?php 
require_once __DIR__ . '/settings/form-settings-post-update.php';
?>
                </div>
                <div id="fe-metabox-submission-restriction" class="group sub">
                    <?php 
require_once __DIR__ . '/settings/form-submission-restriction.php';
?>
                </div>
                <div id="fe-metabox-submission-display-design" class="group sub">
                    <?php 
require_once __DIR__ . '/settings/form-submission-display.php';
?>
                </div>
            </div>

        </div>

        <div id="post-form-notification" class="group top clearfix">
            <fieldset>
                <h2 id="fe-form-builder-settings-tabs" class="nav-tab-wrapper">
                    <a href="#fe-metabox-admin-notification" class="nav-tab sub nav-tab-active"><?php 
echo  __( 'Admin Notification', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-post-publish-notification" class="nav-tab sub "><?php 
echo  __( 'Post Publish Notification', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-post-submit-notification" class="nav-tab sub "><?php 
echo  __( 'Post Submit Notification', FE_TEXT_DOMAIN ) ;
?></a>
                    <a href="#fe-metabox-post-trash-notification" class="nav-tab sub "><?php 
echo  __( 'Post Trash Notification', FE_TEXT_DOMAIN ) ;
?></a>
                </h2>
            </fieldset>
            <div class="sub_field_groups_container">
                <div id="fe-metabox-admin-notification" class="group sub active">
                    <?php 
require_once __DIR__ . '/settings/form-admin-notification-settings.php';
?>
                </div>
                <div id="fe-metabox-post-publish-notification" class="group sub">
                    <?php 
$post_notification_type = 'publish';
require __DIR__ . '/settings/form-notification-settings.php';
?>
                </div>
                <div id="fe-metabox-post-submit-notification" class="group sub">
                    <?php 
$post_notification_type = 'submit';
require __DIR__ . '/settings/form-notification-settings.php';
?>
                </div>
                <div id="fe-metabox-post-trash-notification" class="group sub">
                    <?php 
$post_notification_type = 'trash';
require __DIR__ . '/settings/form-notification-settings.php';
?>
                </div>
            </div>
        </div>

        <div id="post-form-login-register" class="group top clearfix">
            <?php 
require_once __DIR__ . '/settings/form-admin-login-register.php';
?>
        </div>


    </div>

</form>