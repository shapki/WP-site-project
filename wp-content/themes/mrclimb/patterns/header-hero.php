<?php
/**
 * Title: Hero header for custom home page
 * Slug: mrclimb/hero-header
 * Categories: mrclimb-headers
 */
?>
<!-- wp:group {"align":"full","className":"sticky-cover","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull sticky-cover">
    <!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/home.jpg","dimRatio":60,"focalPoint":{"x":0.9,"y":0.4},"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"color":{"text":"var:custom|color|hero-text"}}} -->
    <div class="wp-block-cover has-text-color" style="color:var(--wp--custom--color--hero-text);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
        <img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/home.jpg" style="object-position:90% 40%" data-object-fit="cover" data-object-position="90% 40%"/>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"tagName":"header","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
            <header class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
                <div class="wp-block-group alignwide" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
                    <div class="wp-block-group ">
                        <!-- wp:site-logo {"width":75,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} /-->

                        <!-- wp:site-title {"style":{"typography":{"lineHeight":"1.5"}}} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:navigation {"overlayBackgroundColor":"mrclimb-dark","overlayTextColor":"mrclimb-light","layout":{"type":"flex","justifyContent":"left"},"fontSize":"medium"} /-->
                </div>
                <!-- /wp:group -->
            </header>
            <!-- /wp:group -->

            <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-group alignwide">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|80"}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"xx-large","fontFamily":"montserrat"} -->
                <h1 class="wp-block-heading has-text-align-center has-montserrat-font-family has-xx-large-font-size" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);font-style:normal;font-weight:600"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-mrclimb-decoration-color"><?php echo esc_html__( 'MR', 'mrclimb' ) ?></mark><?php echo esc_html__( 'climb', 'mrclimb' ) ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-mrclimb-decoration-color"><?php echo esc_html__( 'A', 'mrclimb' ) ?></mark><?php echo esc_html__( 'dventures', 'mrclimb' ) ?></h1>
                <!-- /wp:heading -->

                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"55%"} -->
                    <div class="wp-block-column" style="flex-basis:55%">
                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php echo esc_html__( 'We are passionate hiking experts and mountain lovers that organize different excursions in the', 'mrclimb' ) ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-mrclimb-decoration-color"><?php echo esc_html__( 'Lorem Ipsum region', 'mrclimb' ) ?></mark>, <?php echo esc_html__( 'bringing you to the best climbing spots and making sure you are safe at every step.', 'mrclimb' ) ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center"} -->
                        <p class="has-text-align-center"><?php echo esc_html__( 'We also organize training sessions and team building activities in our new indoor facility for every level. Come and join us!', 'mrclimb' ) ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"0"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:0">
                            <!-- wp:button {"textAlign":"center","backgroundColor":"mrclimb-decoration","textColor":"mrclimb-light","className":"is-style-outline"} -->
                            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-mrclimb-light-color has-mrclimb-decoration-background-color has-text-color has-background has-text-align-center wp-element-button"><?php echo esc_html__( 'Outdoor adventures', 'mrclimb' ) ?></a></div>
                            <!-- /wp:button -->

                            <!-- wp:button {"textAlign":"center","backgroundColor":"mrclimb-light","textColor":"mrclimb-decoration","className":"is-style-outline"} -->
                            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-mrclimb-decoration-color has-mrclimb-light-background-color has-text-color has-background has-text-align-center wp-element-button"><?php echo esc_html__( 'Indoor climbing', 'mrclimb' ) ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"></div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:spacer {"height":"80px"} -->
                <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->