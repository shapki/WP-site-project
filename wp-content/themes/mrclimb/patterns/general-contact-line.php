<?php
/**
 * Title: Contact line
 * Slug: mrclimb/contact-line
 * Categories: mrclimb
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"mrclimb-decoration","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-mrclimb-decoration-background-color has-text-color has-background">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|white"},":hover":{"color":{"text":"var:preset|color|mrclimb-link"}}}}},"fontSize":"small"} -->
        <p class="has-link-color has-small-font-size" style="line-height:1"><?php echo esc_html__( 'Address', 'mrclimb' ); ?>: <?php echo esc_html__( '1234 Test Street, West Example, XY 12345', 'mrclimb' ); ?> --- <?php echo esc_html__( 'Phone', 'mrclimb' ); ?>: 
            <a href="tel:<?php echo esc_html__( '123-456-7890', 'mrclimb' ); ?>"><?php echo esc_html__( '123-456-7890', 'mrclimb' ); ?></a>
        </p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->