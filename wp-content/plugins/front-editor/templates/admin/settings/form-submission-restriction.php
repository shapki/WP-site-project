<?php

$guest_post = ( !empty($form_settings['guest_post']) ? $form_settings['guest_post'] : 'false' );
?>
<table class="form-table">

    <!-- Added Submission Restriction Settings -->
    <tr>
        <th><?php 
esc_html_e( 'Guest Post', FE_TEXT_DOMAIN );
?></th>
        <td>
            <label>
                <?php 
?>
                    <input type="hidden" name="demo_pro_guest_post" value="false">
                    <input type="checkbox" name="demo_pro_guest_post" value="true" <?php 
checked( false, 'true' );
?> disabled/>
                    <?php 
esc_html_e( 'Available in Pro version', FE_TEXT_DOMAIN );
?>
                <?php 
?>
            </label>
            <p class="description"><?php 
esc_html_e( 'Unregistered users will be able to submit posts', FE_TEXT_DOMAIN );
?>.</p>
        </td>
    </tr>

</table>