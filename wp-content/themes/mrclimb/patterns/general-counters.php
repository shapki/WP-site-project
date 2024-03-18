<?php
/**
 * Title: Simple counter, 3 columns
 * Slug: mrclimb/counter
 * Categories: mrclimb
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}},"textColor":"mrclimb-decoration"} -->
    <h2 class="wp-block-heading has-text-align-center has-mrclimb-decoration-color has-text-color" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__( 'Our numbers', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-columns" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--40)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
                <!-- wp:image {"width":"undefinedpx","height":"55px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":["#969696","#ffffff"]}}} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/excellence-honor-icon.webp" alt="" style="object-fit:contain;width:undefinedpx;height:55px"/></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"0.5"}},"textColor":"mrclimb-decoration","fontSize":"xx-large"} -->
            <h2 class="wp-block-heading has-text-align-center has-mrclimb-decoration-color has-text-color has-xx-large-font-size" style="line-height:0.5"><?php echo esc_html__( '10+', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
            <p class="has-text-align-center" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Lorem ipsum dolor', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
                <!-- wp:image {"width":"undefinedpx","height":"55px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":["#969696","#ffffff"]}}} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hiking-icon.webp" alt="" style="object-fit:contain;width:undefinedpx;height:55px"/></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"0.5"}},"textColor":"mrclimb-decoration","fontSize":"xx-large"} -->
            <h2 class="wp-block-heading has-text-align-center has-mrclimb-decoration-color has-text-color has-xx-large-font-size" style="line-height:0.5"><?php echo esc_html__( '100+', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
            <p class="has-text-align-center" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Lorem ipsum dolor', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
                <!-- wp:image {"width":"undefinedpx","height":"55px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":["#969696","#ffffff"]}}} -->
                <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/map-icon.webp" alt="" style="object-fit:contain;width:undefinedpx;height:55px"/></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"0.5"}},"textColor":"mrclimb-decoration","fontSize":"xx-large"} -->
            <h2 class="wp-block-heading has-text-align-center has-mrclimb-decoration-color has-text-color has-xx-large-font-size" style="line-height:0.5"><?php echo esc_html__( '1000+', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
            <p class="has-text-align-center" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Lorem ipsum dolor', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->