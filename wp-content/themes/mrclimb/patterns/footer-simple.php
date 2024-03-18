<?php
/**
 * Title: Simple footer
 * Slug: mrclimb/simple-footer
 * Categories: mrclimb-footers
 */
?>
<!-- wp:group {"style":{"color":{"text":"var:custom|color|footer-text","background":"var:custom|color|footer"}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="color:var(--wp--custom--color--footer-text);background-color:var(--wp--custom--color--footer)">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px"}}}} -->
	<div class="wp-block-group" style="padding-top:20px;padding-bottom:20px">
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php echo esc_html__( 'Copyright', 'mrclimb' ); ?> © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->