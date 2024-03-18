<?php
/**
 * Title: Cover with message and signature image
 * Slug: mrclimb/message-signature
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
    <!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/837328.jpg","hasParallax":true,"dimRatio":50,"align":"full","textColor":"white","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax has-white-color has-text-color">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
        <div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/837328.jpg)"></div>
        <div class="wp-block-cover__inner-container">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"width":"33.33%"} -->
                <div class="wp-block-column" style="flex-basis:33.33%"></div>
                <!-- /wp:column -->

                <!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);flex-basis:66.66%">
                    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"4rem"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
                    <h2 class="wp-block-heading has-text-align-center" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);font-size:4rem"><?php echo esc_html__( 'Live, Dream, Explore', 'mrclimb' ); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem"}},"className":"add-quotes-inline"} -->
                    <p class="has-text-align-center add-quotes-inline" style="font-size:1.2rem"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae turpis massa sed elementum tempus egestas sed.', 'mrclimb' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/signature_1.png" alt="" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->