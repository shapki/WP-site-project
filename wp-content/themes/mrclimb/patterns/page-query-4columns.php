<?php
/**
 * Title: Query loop on 4 columns
 * Slug: mrclimb/page-query-4columns
 * Categories: mrclimb-pages
 */
?>
<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"layout":{"contentSize":null,"type":"constrained"}} -->
<div class="wp-block-query">
    <!-- wp:query-no-results -->
        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem"}}} -->
        <p class="has-text-align-center" style="font-size:2rem"><?php echo esc_html__( 'No result found.', 'mrclimb' ); ?></p>
        <!-- /wp:paragraph -->
    
        <!-- wp:spacer {"height":"80px"} -->
        <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
    
        <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"<?php echo esc_html__( 'Search the site...', 'mrclimb' ); ?>","width":75,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center","style":{"border":{"radius":"8px"}},"fontSize":"medium"} /-->

        <!-- wp:spacer {"height":"80px"} -->
        <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
    <!-- /wp:query-no-results -->

    <!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
    <!-- wp:group {"className":"archive-featured-image-effect"} -->
    <div class="wp-block-group archive-featured-image-effect">
        <!-- wp:post-featured-image {"isLink":true,"width":"100%"} /-->

        <!-- wp:post-terms {"term":"category","textAlign":"center","separator":" | ","style":{"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"fontFamily":"manrope"} /-->

        <!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"fontSize":"large"} /-->

        <!-- wp:group {"style":{"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;font-size:14px">
            <!-- wp:post-date {"style":{"spacing":{"padding":{"left":"0","right":"var:preset|spacing|60"}}}} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-excerpt {"moreText":"<?php echo esc_html__( 'READ MORE', 'mrclimb' ); ?> →","excerptLength":30} /-->

        <!-- wp:spacer {"height":"15px"} -->
        <div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|70","left":"var:preset|spacing|70"}}},"layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group"	style="padding-right:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)">
        <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->