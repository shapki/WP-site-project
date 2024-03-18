<?php
/**
 * Title: About panel with images, counters, text and button
 * Slug: mrclimb/about-panel
 * Categories: mrclimb
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column {"verticalAlignment":"center","width":"45%","style":{"spacing":{"padding":{"left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);flex-basis:45%">
            <!-- wp:heading {"level":4,"style":{"typography":{"letterSpacing":"3px","textTransform":"uppercase"}},"textColor":"mrclimb-decoration"} -->
            <h4 class="wp-block-heading has-mrclimb-decoration-color has-text-color" style="letter-spacing:3px;text-transform:uppercase"><?php echo esc_html__( 'About Us', 'mrclimb' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:heading -->
            <h2 class="wp-block-heading"><?php echo esc_html__( 'Expert mountain guides and indoor climbers', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'We love climbing and exploring incredible locations around the world and are eager to share our passion with you ensuring you are always safe with us.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Read More', 'mrclimb' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-columns are-vertically-aligned-center">
                    <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"mrclimb-element","textColor":"mrclimb-dark"} -->
                    <div class="wp-block-column is-vertically-aligned-center has-mrclimb-dark-color has-mrclimb-element-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
                        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":0.5}}} -->
                        <h1 class="wp-block-heading has-text-align-center" style="line-height:0.5"><?php echo esc_html__( '30+', 'mrclimb' ); ?></h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php echo esc_html__( 'Expedition tours', 'mrclimb' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center"} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none"} -->
                        <figure class="wp-block-image aligncenter size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/837328.jpg" alt="" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"className":"is-style-reverse-mobile-order"} -->
                <div class="wp-block-columns are-vertically-aligned-center is-style-reverse-mobile-order">
                    <!-- wp:column {"verticalAlignment":"center"} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none"} -->
                        <figure class="wp-block-image aligncenter size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/1126990.jpg" alt="" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"mrclimb-decoration","textColor":"white"} -->
                    <div class="wp-block-column is-vertically-aligned-center has-white-color has-mrclimb-decoration-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
                        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":0.5}}} -->
                        <h1 class="wp-block-heading has-text-align-center" style="line-height:0.5"><?php echo esc_html__( '80+', 'mrclimb' ); ?></h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php echo esc_html__( 'Routes and levels', 'mrclimb' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->