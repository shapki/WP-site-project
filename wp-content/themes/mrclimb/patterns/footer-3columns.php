<?php
/**
 * Title: 3 columns footer with copyright below
 * Slug: mrclimb/footer-3columns
 * Categories: mrclimb-footers
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"20px"},"margin":{"top":"0px"}},"color":{"text":"var:custom|color|footer-text","background":"var:custom|color|footer"}},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default has-text-color has-background" style="color:var(--wp--custom--color--footer-text);background-color:var(--wp--custom--color--footer);margin-top:0px;padding-top:40px;padding-bottom:20px">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Message', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
            <p class="has-text-align-center has-text-color has-small-font-size"><?php echo esc_html__( 'Lorem ipsum dolor sit amet. Id velit cumque et ullam cumque a dolorem quis qui quasi sint. A omnis voluptatibus et recusandae impedit sit error mollitia sed consequatur ipsa eos quis laborum.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Our Address', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center has-text-color"><?php echo esc_html__( '1234 Test Street', 'mrclimb' ); ?>,<br><?php echo esc_html__( 'West Example', 'mrclimb' ); ?>,<br><?php echo esc_html__( 'XY 12345', 'mrclimb' ); ?><br><a href="#0"><?php echo esc_html__( 'Contact us', 'mrclimb' ); ?></a></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
            <h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Follow us', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center has-text-color"><?php echo esc_html__( 'Keep an eye on all our activities and do not miss any update!', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"mrclimb-decoration","style":{"spacing":{"blockGap":{"top":"3px","left":"19px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links has-icon-color is-style-logos-only">
                <!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"tiktok"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"youtube"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"style":{"color":{"background":"#9E9E9E50"}},"className":"is-style-wide"} -->
    <hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#9E9E9E50;color:#9E9E9E50" />
    <!-- /wp:separator -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--10);padding-right:0;padding-bottom:var(--wp--preset--spacing--10);padding-left:0">
        <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
        <p class="has-text-align-center" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Copyright', 'mrclimb' ); ?> © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
        <p class="has-text-align-center" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Powered by WordPress.', 'mrclimb' ); ?> <?php echo esc_html__( 'Designed by', 'mrclimb' ); ?> <a rel="noreferrer noopener" href="<?php echo esc_url( 'https://mrmauvetech.com' ); ?>" target="_blank"><?php echo esc_html__( 'MR Mauvetech', 'mrclimb' ); ?></a></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->