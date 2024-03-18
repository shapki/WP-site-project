<?php
/**
 * Title: 404
 * Slug: mrclimb/page-404
 * Categories: mrclimb-pages
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group">
    <!-- wp:spacer {"height":"70px"} -->
    <div style="height:70px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"8rem","lineHeight":"1.2"}},"className":"is-style-default"} -->
    <p class="has-text-align-center is-style-default" style="font-size:8rem;line-height:1.2"><?php echo esc_html__( '404', 'mrclimb' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem"}}} -->
    <p class="has-text-align-center" style="font-size:2rem"><?php echo esc_html__( 'Page not found', 'mrclimb' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:spacer {"height":"80px"} -->
    <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"<?php echo esc_html__( 'Search the site...', 'mrclimb' ); ?>","width":75,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center","style":{"border":{"radius":"8px"}},"fontSize":"medium"} /-->

    <!-- wp:spacer {"height":"120px"} -->
    <div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:pattern {"slug":"mrclimb/latest-posts-hover"} /-->
</main>
<!-- /wp:group -->