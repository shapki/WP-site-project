<?php
/**
 * Title: Opening hours, 3 columns, background
 * Slug: mrclimb/opening-hours-bg
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"mrclimb-decoration","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-background-color has-text-color has-background">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}},"className":"add-clock-inline"} -->
    <h2 class="wp-block-heading has-text-align-center add-clock-inline" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__( 'Opening hours', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="padding-top:0;padding-bottom:0">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"black"} -->
            <h4 class="wp-block-heading has-text-align-center has-black-color has-text-color" style="text-transform:uppercase"><?php echo esc_html__( 'Monday', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size"><?php echo esc_html__( 'Closed', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"black"} -->
            <h4 class="wp-block-heading has-text-align-center has-black-color has-text-color" style="text-transform:uppercase"><?php echo esc_html__( 'Tuesday-Friday', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size"><?php echo esc_html__( '10:00am - 1:00pm', 'mrclimb' ); ?><br><?php echo esc_html__( '3:30pm - 8:00pm', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"black"} -->
            <h4 class="wp-block-heading has-text-align-center has-black-color has-text-color" style="text-transform:uppercase"><?php echo esc_html__( 'Saturday-Sunday', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size"><?php echo esc_html__( '9:00am - 1:00pm', 'mrclimb' ); ?><br><?php echo esc_html__( '3:00pm - 9:00pm', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->