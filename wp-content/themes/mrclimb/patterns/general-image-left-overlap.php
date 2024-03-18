<?php
/**
 * Title: Image overlap effect using gradient
 * Slug: mrclimb/image-left-overlap
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"gradient":"mrclimb-decoration-to-element-180","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-mrclimb-decoration-to-element-180-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"textColor":"white","className":"is-style-reverse-mobile-order"} -->
    <div class="wp-block-columns is-style-reverse-mobile-order has-white-color has-text-color" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"align":"center","width":353,"height":500,"scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"68px"}}} -->
            <figure class="wp-block-image aligncenter size-large is-resized has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/circle-author-173452.jpg" alt="" style="border-radius:68px;object-fit:cover;width:353px;height:500px" width="353" height="500" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|40","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
            <!-- wp:heading -->
            <h2 class="wp-block-heading"><?php echo esc_html__( 'Highlighted feature', 'mrclimb' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Id ornare arcu odio ut sem nulla. Purus faucibus ornare suspendisse sed nisi lacus sed. Pulvinar neque laoreet suspendisse interdum consectetur. Nullam eget felis eget nunc lobortis mattis.', 'mrclimb' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->