<?php

/**
 * Title: Contact section background
 * Slug: mrclimb/contact-section-bg
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"mrclimb-decoration","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-background-color has-text-color has-background">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}}} -->
    <h2 class="wp-block-heading has-text-align-center" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__( 'Our facilities', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns" style="padding-top:0;padding-bottom:0">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"black","className":"add-building-inline"} -->
            <h4 class="wp-block-heading has-text-align-center add-building-inline has-black-color has-text-color" style="text-transform:uppercase"><?php echo esc_html__( 'Indoor climbing', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html__('1234 Test Street', 'mrclimb'); ?>,<br><?php echo esc_html__('West Example', 'mrclimb'); ?>,<br><?php echo esc_html__('XY 12345', 'mrclimb'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}}} -->
            <p class="has-text-align-center has-link-color"><?php echo esc_html__('Mail', 'mrclimb'); ?>: <a href="mailto:<?php echo esc_html__( 'example@mail.com', 'mrclimb' ); ?>"><?php echo esc_html__( 'example@mail.com', 'mrclimb' ); ?></a><br><?php echo esc_html__( 'Phone: 123-456-7890', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"border-left-white"} -->
        <div class="wp-block-column border-left-white" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"black","className":"add-store-inline"} -->
            <h4 class="wp-block-heading has-text-align-center add-store-inline has-black-color has-text-color" style="text-transform:uppercase"><?php echo esc_html__( 'Adventure kiosk', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html__('1234 Test Street', 'mrclimb'); ?>,<br><?php echo esc_html__('West Example', 'mrclimb'); ?>,<br><?php echo esc_html__('XY 12345', 'mrclimb'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}}} -->
            <p class="has-text-align-center has-link-color"><?php echo esc_html__('Mail', 'mrclimb'); ?>: <a href="mailto:<?php echo esc_html__( 'example@mail.com', 'mrclimb' ); ?>"><?php echo esc_html__( 'example@mail.com', 'mrclimb' ); ?></a><br><?php echo esc_html__( 'Phone: 123-456-7890', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->