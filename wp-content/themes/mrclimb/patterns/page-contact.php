<?php
/**
 * Title: Contact page template
 * Slug: mrclimb/page-contact
 * Categories: mrclimb-pages
 */
?>
<!-- wp:pattern {"slug":"mrclimb/contact-section"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"mrclimb/opening-hours-bg"} /-->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"mrclimb-form-style","layout":{"type":"constrained","wideSize":"750px"}} -->
<div class="wp-block-group mrclimb-form-style">
    <!-- wp:heading {"textAlign":"center","level":2} -->
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

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:html -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1647628.9973664864!2d-112.1034527!3d36.2388773!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x873312ae759b4d15%3A0x1f38a9bec9912029!2sGrand%20Canyon%20National%20Park!5e0!3m2!1sen!2sit!4v1695110086609!5m2!1sen!2sit" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="false" aria-hidden="false" tabindex="0"></iframe>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"15px"} -->
<div style="height:15px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->