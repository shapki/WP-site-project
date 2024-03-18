<?php
/**
 * Title: Simple header with social links
 * Slug: mrclimb/social-header
 * Categories: mrclimb-headers
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|mrclimb-light"}}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"backgroundColor":"mrclimb-dark","textColor":"mrclimb-light","layout":{"inherit":"true","type":"constrained"}} -->
<div class="wp-block-group alignfull has-mrclimb-light-color has-mrclimb-dark-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|20","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:0">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:site-logo {"width":75} /-->

				<!-- wp:group -->
				<div class="wp-block-group">
					<!-- wp:site-title /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:navigation {"textColor":"mrclimb-light","overlayBackgroundColor":"mrclimb-dark","overlayTextColor":"mrclimb-light","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"medium"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:social-links {"iconColor":"mrclimb-light","iconColorValue":"var:preset|color|mrclimb-light","openInNewTab":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"},"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-icon-color is-style-logos-only" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:social-link {"url":"#","service":"wordpress"} /-->

			<!-- wp:social-link {"url":"#","service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"tiktok"} /-->
		</ul>
		<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->