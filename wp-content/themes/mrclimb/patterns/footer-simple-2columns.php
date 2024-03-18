<?php
/**
 * Title: 2 columns simple footer
 * Slug: mrclimb/simple-footer-2columns
 * Categories: mrclimb-footers
 */
?>
<!-- wp:group {"style":{"color":{"text":"var:custom|color|footer-text","background":"var:custom|color|footer"}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="color:var(--wp--custom--color--footer-text);background-color:var(--wp--custom--color--footer)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
        <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
        <p class="has-text-align-center" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Copyright', 'mrclimb' ); ?> © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
        <p class="has-text-align-center" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Powered by WordPress.', 'mrclimb' ); ?> <?php echo esc_html__( 'Designed by', 'mrclimb' ); ?> <a rel="noreferrer noopener" href="<?php echo esc_url( 'https://mrmauvetech.com' ); ?>" target="_blank"><?php echo esc_html__( 'MR Mauvetech', 'mrclimb' ); ?></a></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->