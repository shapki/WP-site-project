<?php
/**
 * Title: 2 columns with vertical heading
 * Slug: mrclimb/vertical-heading-columns
 * Categories: mrclimb
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"8%","className":"is-style-vertical-header-block"} -->
        <div class="wp-block-column is-style-vertical-header-block" style="flex-basis:8%">
            <!-- wp:heading {"level":3,"fontFamily":"limelight"} -->
            <h3 class="wp-block-heading has-limelight-font-family"><?php echo esc_html__( 'Vertical', 'mrclimb' ) ?></h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"92%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);flex-basis:92%">
            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'This shows the usage of a column block with the vertical heading style applied. On mobile the vertical effect is removed and columns stack as usual.', 'mrclimb' ) ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae turpis massa sed elementum tempus egestas sed.', 'mrclimb' ) ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html__( 'Nulla facilisi nullam vehicula ipsum. Sit amet volutpat consequat mauris nunc. Massa enim nec dui nunc mattis enim ut tellus. Nulla pellentesque dignissim enim sit amet venenatis urna. Senectus et netus et malesuada. Cras sed felis eget velit.', 'mrclimb' ) ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->