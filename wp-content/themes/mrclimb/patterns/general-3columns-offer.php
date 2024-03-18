<?php
/**
 * Title: Three columns offer with list and button
 * Slug: mrclimb/three-columns-offer
 * Categories: mrclimb
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"typography":{"letterSpacing":"3px","textTransform":"uppercase"}}} -->
    <h2 class="wp-block-heading has-text-align-center" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);letter-spacing:3px;text-transform:uppercase"><?php echo esc_html__( 'Our offer', 'mrclimb' ) ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-bottom:0">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5em","right":"1.5em","bottom":"1.5em","left":"1.5em"}}},"backgroundColor":"mrclimb-decoration","textColor":"white"} -->
        <div class="wp-block-column has-white-color has-mrclimb-decoration-background-color has-text-color has-background" style="padding-top:1.5em;padding-right:1.5em;padding-bottom:1.5em;padding-left:1.5em">
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center"><strong><?php echo esc_html__( '1 Month', 'mrclimb' ) ?></strong></h2>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( '$100', 'mrclimb' ) ?></h3>
            <!-- /wp:heading -->

            <!-- wp:separator {"backgroundColor":"white","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-white-color has-alpha-channel-opacity has-white-background-color has-background is-style-wide" />
            <!-- /wp:separator -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'Standard monthly fee', 'mrclimb' ) ?></strong> </p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:list {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"typography":{"lineHeight":"2"}}} -->
                <ul style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40);line-height:2">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 1', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 2', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 3', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 4', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"mrclimb-background","textColor":"mrclimb-text"} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-mrclimb-text-color has-mrclimb-background-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'More info', 'mrclimb' ) ?></a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5em","right":"1.5em","bottom":"1.5em","left":"1.5em"}}},"backgroundColor":"mrclimb-element","textColor":"mrclimb-dark"} -->
        <div class="wp-block-column has-mrclimb-dark-color has-mrclimb-element-background-color has-text-color has-background" style="padding-top:1.5em;padding-right:1.5em;padding-bottom:1.5em;padding-left:1.5em">
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center"><strong><?php echo esc_html__( '3 Months', 'mrclimb' ) ?></strong></h2>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( '$250', 'mrclimb' ) ?></h3>
            <!-- /wp:heading -->

            <!-- wp:separator {"backgroundColor":"mrclimb-dark","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-mrclimb-dark-color has-alpha-channel-opacity has-mrclimb-dark-background-color has-background is-style-wide" />
            <!-- /wp:separator -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'Discounted rates', 'mrclimb' ) ?></strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:list {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"typography":{"lineHeight":"2"}}} -->
                <ul style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40);line-height:2">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 1', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 2', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 3', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 4', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"mrclimb-dark","textColor":"mrclimb-light"} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-mrclimb-light-color has-mrclimb-dark-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'More info', 'mrclimb' ) ?></a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"1.5em","right":"1.5em","bottom":"1.5em","left":"1.5em"}}},"backgroundColor":"mrclimb-decoration","textColor":"white"} -->
        <div class="wp-block-column has-white-color has-mrclimb-decoration-background-color has-text-color has-background" style="padding-top:1.5em;padding-right:1.5em;padding-bottom:1.5em;padding-left:1.5em">
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center"><strong><?php echo esc_html__( '1 Year', 'mrclimb' ) ?></strong></h2>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( '$700', 'mrclimb' ) ?></h3>
            <!-- /wp:heading -->

            <!-- wp:separator {"backgroundColor":"white","className":"is-style-wide"} -->
            <hr class="wp-block-separator has-text-color has-white-color has-alpha-channel-opacity has-white-background-color has-background is-style-wide" />
            <!-- /wp:separator -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'The full experience', 'mrclimb' ) ?></strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:list {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"typography":{"lineHeight":"2"}}} -->
                <ul style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40);line-height:2">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 1', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 2', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 3', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Cool feature number 4', 'mrclimb' ) ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"mrclimb-background","textColor":"mrclimb-text"} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-mrclimb-text-color has-mrclimb-background-background-color has-text-color has-background wp-element-button" href="#"><?php echo esc_html__( 'More info', 'mrclimb' ) ?></a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->