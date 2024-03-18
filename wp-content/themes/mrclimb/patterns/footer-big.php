<?php
/**
 * Title: big blog footer with copyright below
 * Slug: mrclimb/footer-big
 * Categories: mrclimb-footers
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0px","padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:custom|color|footer-text"}}},"color":{"text":"var:custom|color|footer-text","background":"var:custom|color|footer"}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-text-color has-background has-link-color" style="color:var(--wp--custom--color--footer-text);background-color:var(--wp--custom--color--footer);padding-top:0;padding-bottom:0">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","top":"var:preset|spacing|60"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"width":"33%","style":{"spacing":{"padding":{"top":"20px","right":"15px","bottom":"20px","left":"15px"},"blockGap":"10px"}}} -->
        <div class="wp-block-column" style="padding-top:20px;padding-right:15px;padding-bottom:20px;padding-left:15px;flex-basis:33%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"6px"}}} -->
            <div class="wp-block-group">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
                <h3 class="wp-block-heading" style="font-size:1.5rem;text-transform:uppercase"><?php echo esc_html__( 'Destinations', 'mrclimb' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
                <figure class="wp-block-gallery has-nested-images columns-2 is-cropped">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom"} -->
                    <figure class="wp-block-image size-medium"><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/637015.jpg" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom"} -->
                    <figure class="wp-block-image size-medium"><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/837328.jpg" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom"} -->
                    <figure class="wp-block-image size-medium"><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/home_hero_1.jpg" alt="" /></a></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"custom"} -->
                    <figure class="wp-block-image size-medium"><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/1360851.jpg" alt="" /></a></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"18%","style":{"spacing":{"blockGap":"10px","padding":{"top":"20px","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:20px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:18%">
            <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"inherit"}}},"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-group has-link-color">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"},"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
                <h3 class="wp-block-heading" style="padding-top:0;padding-bottom:0;font-size:1.5rem;text-transform:uppercase"><?php echo esc_html__( 'Archives', 'mrclimb' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:archives {"showPostCounts":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"18%","style":{"spacing":{"blockGap":"10px","padding":{"top":"20px","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:20px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:18%">
            <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"inherit"}}},"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-group has-link-color">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
                <h3 class="wp-block-heading" style="font-size:1.5rem;text-transform:uppercase"><?php echo esc_html__( 'Categories', 'mrclimb' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:categories {"showPostCounts":true,"showOnlyTopLevel":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"top":"20px","left":"var:preset|spacing|30","bottom":"0","right":"var:preset|spacing|30"},"blockGap":"10px"}}} -->
        <div class="wp-block-column" style="padding-top:20px;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);flex-basis:30%">
            <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"inherit"}}},"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
            <div class="wp-block-group has-link-color">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.5rem","textTransform":"uppercase"}}} -->
                <h3 class="wp-block-heading" style="font-size:1.5rem;text-transform:uppercase"><?php echo esc_html__( 'Latest posts', 'mrclimb' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:latest-posts {"postsToShow":3,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":50,"featuredImageSizeHeight":50} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"style":{"color":{"background":"#9E9E9E50"}},"className":"is-style-wide"} -->
    <hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#9E9E9E50;color:#9E9E9E50" />
    <!-- /wp:separator -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center"}} -->
    <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html__( 'Copyright', 'mrclimb' ); ?> © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
		<!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->