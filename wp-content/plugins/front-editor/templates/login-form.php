<?php
global $wp;
$redirect = $redirect ?? home_url( $wp->request );
?>
<form action method="post" class="fus_form fus_form_login">
    <?php
    $error = self::get_fus_error( $fus_form_count );
    if ( $error )
	    printf( '<p class="fus-info error">%s</p>', $error );

    $success = self::get_fus_success( $fus_form_count );
    if ( $success )
	    printf( '<p class="fus-info success">%s</p>', $success );
    ?>
	<p class="fus-input-wrap login-wrap">
        <label for="fus_username"><?php _e( 'Username or Email', FE_TEXT_DOMAIN ) ?></label>
        <input type="text" id="fus_username" name="fus_username" />
    </p>

    <p class="fus-input-wrap password-wrap">
        <label for="fus_password"><?php _e( 'Password', FE_TEXT_DOMAIN ) ?></label>
        <input type="password" id="fus_password" name="fus_password" />
    </p>
    <input type="hidden" name="redirect" value="<?= $redirect ?>">
    <input type="hidden" name="fus_action" value="login">
    <input type="hidden" name="fus_form" value="<?= $fus_form_count ?>">
    <p class="forgetmenot">
        <input name="rememberme" type="checkbox" id="fus-rememberme" value="forever">
        <label for="fus-rememberme"><?php _e( 'Remember Me', FE_TEXT_DOMAIN ) ?></label>
    </p>
    <button type="submit"><?php _e( 'Login', FE_TEXT_DOMAIN ) ?></button>

</form>
