<?php
/**
 * Title: CTA with images and gradient
 * Slug: mrclimb/cta-images
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"textColor":"white","gradient":"mrclimb-decoration-to-background-180","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-to-background-180-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center","fontSize":"heading-4"} -->
    <h2 class="wp-block-heading has-text-align-center has-heading-4-font-size"><?php echo esc_html__( 'Join our adventures', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
    <p class="has-text-align-center has-large-font-size"><?php echo esc_html__( 'Come visit our indoor center for a free trial of our facilities or check out our exclusive tours at the kiosk!', 'mrclimb' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|20"},"blockGap":{"left":"var:preset|spacing|60"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--20)">
        <!-- wp:column {"width":"66.66%"} -->
        <div class="wp-block-column" style="flex-basis:66.66%">
            <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}},"className":"is-style-reverse-mobile-order"} -->
            <div class="wp-block-columns is-style-reverse-mobile-order">
                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"0"}}}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:0">
                    <!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"10px","width":"2px"}}} -->
                    <figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/485.jpg" alt="" style="border-width:2px;border-radius:10px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|80"}}} -->
                <div class="wp-block-column">
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"backgroundColor":"mrclimb-background","textColor":"mrclimb-text"} -->
                        <div class="wp-block-button"><a class="wp-block-button__link has-mrclimb-text-color has-mrclimb-background-background-color has-text-color has-background wp-element-button"><?php echo esc_html__( 'Act now', 'mrclimb' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->

                    <!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"15px","width":"2px"}}} -->
                    <figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/837328.jpg" alt="" style="border-width:2px;border-radius:15px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"0"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:0;flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"15px","width":"2px"}}} -->
            <figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/home_hero_1.jpg" alt="" style="border-width:2px;border-radius:15px" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->