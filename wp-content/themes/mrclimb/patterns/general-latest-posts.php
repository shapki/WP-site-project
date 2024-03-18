<?php
/**
 * Title: Latest posts row with image resize effect on hover
 * Slug: mrclimb/latest-posts-hover
 * Categories: mrclimb
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Our latest adventures', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:query {"query":{"perPage":"3","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"10px","bottom":"30px","left":"10px"},"blockGap":"0"}},"className":"archive-featured-image-effect","layout":{"inherit":false}} -->
        <div class="wp-block-group archive-featured-image-effect" style="padding-top:0px;padding-right:10px;padding-bottom:30px;padding-left:10px">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"border":{"radius":"15px"}}} /-->

            <!-- wp:post-title {"textAlign":"center","level":4,"isLink":true,"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} /-->

            <!-- wp:post-date {"textAlign":"center","format":"M j, Y","fontSize":"small"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->