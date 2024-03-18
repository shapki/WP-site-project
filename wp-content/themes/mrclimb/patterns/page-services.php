<?php
/**
 * Title: Services page template
 * Slug: mrclimb/page-services
 * Categories: mrclimb-pages
 */
?>
<!-- wp:pattern {"slug":"mrclimb/message-signature-inverted"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"mrclimb/services"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"mrclimb/image-left-overlap"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"mrclimb/three-columns-offer"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"mrclimb-form-style","layout":{"type":"constrained","wideSize":"750px"}} -->
<div class="wp-block-group mrclimb-form-style">
    <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"4px"}},"textColor":"mrclimb-decoration"} -->
    <h4 class="wp-block-heading has-text-align-center has-mrclimb-decoration-color has-text-color" style="letter-spacing:4px;text-transform:uppercase"><?php echo esc_html__( 'Have any question?', 'mrclimb' ); ?></h4>
    <!-- /wp:heading -->

    <!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase"}}} -->
    <h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Contact us', 'mrclimb' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
    <p class="has-text-align-center" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'This is just a fake form placeholder. Use a dedicated plugin for custom forms.', 'mrclimb' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:html -->
    <form>
        <p style="width: 48%; float: left;">
            <label for="name"><?php echo esc_html__( 'Name', 'mrclimb' ); ?></label>
            <input type="text" name="name" size="30">
        </p>

        <p style="width: 48%; float: right;">
            <label for="email"><?php echo esc_html__( 'Email', 'mrclimb' ); ?></label>
            <input type="email" name="email" size="30">
        </p>

        <p>
            <label for="message"><?php echo esc_html__( 'Your message', 'mrclimb' ); ?></label>
            <textarea id="message" rows="3"></textarea>
        </p>
    </form>
    <!-- /wp:html -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons">
        <!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Submit', 'mrclimb' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->