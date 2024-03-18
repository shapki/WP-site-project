<?php
/**
 * Title: Sidebar
 * Slug: mrclimb/sidebar
 * Categories: mrclimb-pages
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|40","top":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"},"className":"border-left-grey"} -->
<div class="wp-block-group border-left-grey" style="padding-top:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:search {"label":"","showLabel":false,"placeholder":"<?php echo esc_html__( 'Search the site...', 'mrclimb' ); ?>","buttonText":"Search","buttonUseIcon":true,"style":{"border":{"radius":"8px"}},"fontSize":"small"} /-->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"color":"#9e9e9e4f","width":"8px"}},"className":"is-style-rounded"} -->
            <figure class="wp-block-image size-full has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/circle-author-173452.jpg" alt="Author portrait" class="has-border-color" style="border-color:#9e9e9e4f;border-width:8px;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading"><?php echo esc_html__( 'Adam Climb', 'mrclimb' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"level":3} -->
        <h3 class="wp-block-heading"><?php echo esc_html__( 'Categories', 'mrclimb' ); ?></h3>
        <!-- /wp:heading -->

        <!-- wp:categories {"showPostCounts":true} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"level":3} -->
        <h3 class="wp-block-heading"><?php echo esc_html__( 'Archives', 'mrclimb' ); ?></h3>
        <!-- /wp:heading -->

        <!-- wp:archives {"showPostCounts":true,"type":"yearly"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:calendar /-->
</div>
<!-- /wp:group -->