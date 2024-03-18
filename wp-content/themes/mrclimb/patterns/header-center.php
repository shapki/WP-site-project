<?php
/**
 * Title: Centered header with social links
 * Slug: mrclimb/center-header
 * Categories: mrclimb-headers
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|mrclimb-light"}}},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}},"backgroundColor":"mrclimb-dark","textColor":"mrclimb-light","layout":{"inherit":"true","type":"constrained"}} -->
<div class="wp-block-group alignfull has-mrclimb-light-color has-mrclimb-dark-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|20","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:group {"layout":{"type":"flex"}} -->
        <div class="wp-block-group">
            <!-- wp:site-logo {"width":75} /-->

            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:site-title /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:social-links {"iconColor":"mrclimb-light","iconColorValue":"var:preset|color|mrclimb-light","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links has-icon-color is-style-logos-only">
            <!-- wp:social-link {"url":"#","service":"wordpress"} /-->

            <!-- wp:social-link {"url":"#","service":"instagram"} /-->

            <!-- wp:social-link {"url":"#","service":"facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"tiktok"} /-->

            <!-- wp:social-link {"url":"#","service":"youtube"} /-->
        </ul>
        <!-- /wp:social-links -->

        <!-- wp:navigation {"overlayMenu":"never","overlayBackgroundColor":"mrclimb-dark","overlayTextColor":"mrclimb-light","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"large"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->