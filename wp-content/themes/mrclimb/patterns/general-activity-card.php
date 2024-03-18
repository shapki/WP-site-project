<?php
/**
 * Title: Activity card with image and details
 * Slug: mrclimb/activity-card
 * Categories: mrclimb
 */
?>
<!-- wp:group {"style":{"border":{"radius":"8px","width":"5px","color":"var:preset|color|mrclimb-element"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"mrclimb-decoration","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-mrclimb-decoration-background-color has-background" style="border-color:var(--wp--preset--color--mrclimb-element);border-width:5px;border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"40%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|50"}},"textColor":"white"} -->
        <div class="wp-block-column has-white-color has-text-color" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);flex-basis:40%">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Activity title', 'mrclimb' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html__( 'Location:', 'mrclimb' ); ?> <strong><?php echo esc_html__( 'Lorem Ipsum', 'mrclimb' ); ?></strong></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph -->
                <p><?php echo esc_html__( 'Day:', 'mrclimb' ); ?> <strong><?php echo esc_html__( 'Monday', 'mrclimb' ); ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html__( 'Hour:', 'mrclimb' ); ?> <strong><?php echo esc_html__( '5.30pm', 'mrclimb' ); ?></strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:separator {"backgroundColor":"mrclimb-element","className":"is-style-default"} -->
            <hr class="wp-block-separator has-text-color has-mrclimb-element-color has-alpha-channel-opacity has-mrclimb-element-background-color has-background is-style-default"/>
            <!-- /wp:separator -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html__( 'Lorem ipsum dolor sit amet. Id velit cumque et ullam cumque a dolorem quis qui quasi sint. A omnis voluptatibus et recusandae impedit sit error mollitia sed consequatur ipsa eos quis laborum.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/1126990.jpg" alt="" style="aspect-ratio:3/2;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->