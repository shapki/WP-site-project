<?php
/**
 * Title: Single post
 * Slug: mrclimb/page-single-post
 * Categories: mrclimb-pages
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:spacer {"height":10} -->
	<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

    <!-- wp:post-title {"textAlign":"center"} /-->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"center"},"fontSize":"small"} -->
    <div class="wp-block-group has-small-font-size" style="margin-top:0;margin-bottom:0">
        <!-- wp:post-date {"style":{"spacing":{"padding":{"left":"0","right":"var:preset|spacing|60"}}}} /-->
    
        <!-- wp:paragraph -->
        <p><?php echo esc_html__( 'by:', 'mrclimb' ); ?>&nbsp;</p>
        <!-- /wp:paragraph -->
    
        <!-- wp:post-author {"showAvatar":false,"showBio":false,"isLink":true} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:spacer {"height":10} -->
	<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

    <!-- wp:post-featured-image /-->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}},"typography":{"textTransform":"uppercase"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0;text-transform:uppercase">
        <!-- wp:post-terms {"term":"category","separator":" | ","style":{"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"fontFamily":"manrope"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:post-content {"layout":{"inherit":true,"justifyContent":"center"},"fontSize":"medium"} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph -->
        <p><?php echo esc_html__( 'Tags:', 'mrclimb' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:post-terms {"term":"post_tag","separator":" | ","style":{"typography":{"textTransform":"uppercase"}},"fontFamily":"manrope"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:template-part {"slug":"comments","theme":"mrclimb","area":"uncategorized","className":"no-space-comment"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:post-navigation-link {"type":"previous","label":"","showTitle":true,"arrow":"chevron","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}},"className":"nav-previous"} /-->

        <!-- wp:post-navigation-link {"textAlign":"right","label":"","showTitle":true,"arrow":"chevron","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}},"className":"nav-next"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->