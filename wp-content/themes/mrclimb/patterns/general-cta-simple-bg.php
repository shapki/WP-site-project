<?php
/**
 * Title: Simple CTA with backgroud color
 * Slug: mrclimb/cta-simple-bg
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"mrclimb-decoration","textColor":"white","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:heading {"textAlign":"center","fontSize":"heading-4"} -->
    <h2 class="wp-block-heading has-text-align-center has-heading-4-font-size"><?php echo esc_html__( 'Join US', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
    <p class="has-text-align-center has-large-font-size"><?php echo esc_html__( 'This block is calling you to action! It is time to do whatever this section is asking you to do.', 'mrclimb' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
        <!-- wp:button {"backgroundColor":"mrclimb-background","textColor":"mrclimb-text"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-mrclimb-text-color has-mrclimb-background-background-color has-text-color has-background wp-element-button"><?php echo esc_html__( 'Act now', 'mrclimb' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->