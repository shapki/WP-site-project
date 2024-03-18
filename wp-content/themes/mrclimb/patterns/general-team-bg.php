<?php
/**
 * Title: Meet the team with background
 * Slug: mrclimb/team-bg-block
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"mrclimb-decoration","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:heading -->
        <h2 class="wp-block-heading"><?php echo esc_html__( 'Meet the team', 'mrclimb' ); ?></h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:spacer {"height":"10px"} -->
    <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:column {"width":"100%"} -->
        <div class="wp-block-column" style="flex-basis:100%">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"8px"}},"borderColor":"mrclimb-element","className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/circle-author-173452.jpg" alt="" class="has-border-color has-mrclimb-element-border-color" style="border-width:8px;object-fit:cover"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html__( 'Adam Climb', 'mrclimb' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'mrclimb' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"100%"} -->
        <div class="wp-block-column" style="flex-basis:100%">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"8px"}},"borderColor":"mrclimb-element","className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/circle-happy-773208.jpg" alt="" class="has-border-color has-mrclimb-element-border-color" style="border-width:8px;object-fit:cover"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html__( 'Eve Rappel', 'mrclimb' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'mrclimb' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"100%"} -->
        <div class="wp-block-column" style="flex-basis:100%">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"width":"8px"}},"borderColor":"mrclimb-element","className":"is-style-rounded"} -->
                    <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/circle-indoor-928487.jpg" alt="" class="has-border-color has-mrclimb-element-border-color" style="border-width:8px;object-fit:cover"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html__( 'Jack Indoor', 'mrclimb' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center"} -->
                    <p class="has-text-align-center"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'mrclimb' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->