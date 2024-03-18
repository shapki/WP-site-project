<?php

/**
 * Add menu link under appearance
 */
if ( ! function_exists( 'mrclimb_menu' ) ) :
    function mrclimb_menu()
    {
        add_theme_page( esc_html__( 'MRclimb settings', 'mrclimb' ), esc_html__( 'MRclimb settings', 'mrclimb' ), 'edit_theme_options', 'mrclimb-customize-page', 'mrclimb_form_theme_page', 2 );
    }
endif;
add_action( 'admin_menu', 'mrclimb_menu' );

/**
 * Build config page
 */
function mrclimb_form_theme_page()
{
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'mrclimb' ) );
    }
    ?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>
            <form method="post" action="options.php">
                <?php
                settings_errors();
                settings_fields( 'mrclimb_global_settings' );
                do_settings_sections( 'mrclimb-customize-page' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
}

/**
 * Manage config page fields
 */
function mrclimb_setting_flields()
{
    $mrclimb_menu_slug = 'mrclimb-customize-page';
    $mrclimb_menu_option_group = 'mrclimb_global_settings';
    $mrclimb_menu_settings_sticky = 'mrclimb_sticky_group';
    $mrclimb_menu_settings_svg_title = 'mrclimb_svg_title_group';
    $mrclimb_menu_settings_btt = 'mrclimb_btt_group';

    register_setting( $mrclimb_menu_option_group, 'sticky_header_on', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    register_setting( $mrclimb_menu_option_group, 'svg_title_on', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    register_setting( $mrclimb_menu_option_group, 'back_to_top_on', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    register_setting( $mrclimb_menu_option_group, 'back_to_top_settings', array( 'default' => mrclimb_default_settings(), 'sanitize_callback' => 'mrclimb_btt_options_sanitize_fields' ) );

    add_settings_section( $mrclimb_menu_settings_sticky, esc_html__( 'Sticky header', 'mrclimb' ), 'mrclimb_header_description', $mrclimb_menu_slug );
    add_settings_section( $mrclimb_menu_settings_svg_title, esc_html__( 'Post title rappeling SVG', 'mrclimb' ), 'mrclimb_svg_title_description', $mrclimb_menu_slug );
    add_settings_section( $mrclimb_menu_settings_btt, esc_html__( 'Back to top button', 'mrclimb' ), 'mrclimb_btt_description', $mrclimb_menu_slug );

    add_settings_field(
        'sticky_header_on',
        esc_html__( 'Enable (not on mobile)', 'mrclimb' ),
        'mrclimb_checkboxHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_sticky,
        array( 'name' => 'sticky_header_on' )
    );
    add_settings_field(
        'svg_title_on',
        esc_html__( 'Enable', 'mrclimb' ),
        'mrclimb_checkboxHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_svg_title,
        array( 'name' => 'svg_title_on' )
    );
    add_settings_field(
        'back_to_top_on',
        esc_html__( 'Enable', 'mrclimb' ),
        'mrclimb_checkboxHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array( 'name' => 'back_to_top_on' )
    );

    $field_visibility = get_option( 'back_to_top_on' ) ? '' : 'hidden';
    add_settings_field(
        'back_to_top_mobile',
        esc_html__( 'Enable on mobile', 'mrclimb' ),
        'mrclimb_checkboxHTML2',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_mobile',
            'class' => $field_visibility
        )
    );
    add_settings_field(
        'back_to_top_svg',
        esc_html__( 'Icon', 'mrclimb' ),
        'mrclimb_svgradioHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_svg',
            'class' => $field_visibility
        )
    );
    add_settings_field(
        'back_to_top_color',
        esc_html__( 'Icon color', 'mrclimb' ),
        'mrclimb_colorHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_color',
            'class' => $field_visibility
        )
    );
    add_settings_field(
        'back_to_top_position',
        esc_html__( 'Position', 'mrclimb' ),
        'mrclimb_selectHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_position',
            'class' => $field_visibility,
            'choices' => [
                'right' => esc_html__( 'Right', 'mrclimb' ),
                'left' => esc_html__( 'Left', 'mrclimb' )
            ]
        )
    );
    add_settings_field(
        'back_to_top_side',
        esc_html__( 'Side distance (0-250 px)', 'mrclimb' ),
        'mrclimb_numberHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_side',
            'class' => $field_visibility
        )
    );
    add_settings_field(
        'back_to_top_bottom',
        esc_html__( 'Bottom distance (0-250 px)', 'mrclimb' ),
        'mrclimb_numberHTML',
        $mrclimb_menu_slug,
        $mrclimb_menu_settings_btt,
        array(
            'name' => 'back_to_top_bottom',
            'class' => $field_visibility
        )
    );
}
add_action( 'admin_init', 'mrclimb_setting_flields' );

function mrclimb_default_settings()
{
    $defaults = [
        'back_to_top_color' => '#000000',
        'back_to_top_position' => 'right',
        'back_to_top_side' => '25',
        'back_to_top_bottom' => '25',
        'back_to_top_svg' => 'icon_1',
        'back_to_top_mobile' => '0'
    ];
    return $defaults;
}

function mrclimb_header_description()
{
    ?>
        <p>
            <?php echo esc_html__( 'Simple sticky header functionality. It will be applied to the whole header tag with minimal styling on scrolling. Always disabled on mobile via media query (min-width: 782px).', 'mrclimb' ); ?>
        </p>
    <?php
}

function mrclimb_svg_title_description()
{
    ?>
        <p>
            <?php echo esc_html__( 'Show a small rappeling SVG icon in front of single post page titles using the theme Decoration color', 'mrclimb' ); ?>
        </p>
    <?php
}

function mrclimb_btt_description()
{
    ?>
        <p>
            <?php echo esc_html__( 'Customizable back to top button using a set of svg images (enable to see all options).', 'mrclimb' ); ?>
        </p>
    <?php
}

function mrclimb_checkboxHTML( $args )
{
    ?>
        <input type="checkbox" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="<?php echo esc_attr( $args[ 'name' ] ) ?>" value="1" <?php checked( get_option( $args[ 'name' ] ), '1' ) ?>>
    <?php
}

function mrclimb_checkboxHTML2( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    ?>
        <input type="checkbox" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="1" <?php checked( $value, '1' ) ?>>
    <?php
}

function mrclimb_colorHTML( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    ?>
        <input type="text" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" class="color-picker" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="<?php echo esc_attr( $value ) ?>">
    <?php
}

function mrclimb_selectHTML ( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    $choices = $args[ 'choices' ];
    ?>
        <select id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]">
            <?php foreach ( $choices as $choice_v => $label ) { ?>
                <option value="<?php echo esc_attr( $choice_v ); ?>" <?php selected( $choice_v, $value, true ); ?>><?php echo esc_html( $label ); ?></option>
            <?php } ?>
        </select>
    <?php
}

function mrclimb_textHTML ( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    ?>
        <input type="text" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="<?php echo esc_attr( $value ) ?>">
    <?php
}

function mrclimb_numberHTML ( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    ?>
        <input type="number" min="0" max="250" required class="mrclimb-number" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="<?php echo esc_attr( $value ) ?>">
    <?php
}

function mrclimb_svgradioHTML ( $args )
{
    $value = get_option( 'back_to_top_settings' )[ $args[ 'name' ] ];
    $fill = get_option( 'back_to_top_settings' )[ 'back_to_top_color' ];
    $choices = mrclimb_svg_list();
    $counter = 0;
    foreach ( $choices as $label => $choice_v ) {
        $counter ++;
        ?>

            <input type="radio" id="<?php echo esc_attr( $args[ 'name' ] ) ?>" name="back_to_top_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="<?php echo esc_attr( $label ) ?>" <?php checked( $label, $value ); ?> />
            <label class="svglabel"><?php echo $choice_v ?></label>
        <?php
        if ($counter % 3 == 0) {
            echo("<br><br>");
        }
    }
    ?>
        <style>
            .svglabel path {
                fill: <?php echo $fill ?>;
            }
        </style>
    <?php
}

function mrclimb_btt_options_sanitize_fields( $value ) {
    $value = (array) $value;
    if ( empty( $value[ 'back_to_top_mobile' ] ) ) {
        $value[ 'back_to_top_mobile' ] = '0';
    } else {
        $value[ 'back_to_top_mobile' ] = '1';
    }

    if ( ! empty( $value[ 'back_to_top_color' ] ) ) {
        $color = sanitize_text_field( $value[ 'back_to_top_color' ] );
        if (preg_match( "/^#([a-f0-9]{6}|[a-f0-9]{3})$/i", $color ) ) {
            $value[ 'back_to_top_color' ] = $color;
        } else {
            $value[ 'back_to_top_color' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_color' ];
        }
    } else {
        $value[ 'back_to_top_color' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_color' ];
    }

    if ( ! empty( $value[ 'back_to_top_position' ] ) ) {
        $position = sanitize_text_field( $value[ 'back_to_top_position' ] );
        if ( $position == 'right' || $position == 'left') {
            $value[ 'back_to_top_position' ] = $position;
        } else {
            $value[ 'back_to_top_position' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_position' ];
        }
    } else {
        $value[ 'back_to_top_position' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_position' ];
    }

    if ( ! empty( $value[ 'back_to_top_side' ] ) ) {
        $side = absint( $value[ 'back_to_top_side' ] );
        if ($side >= 0 && $side <= 250) {
            $value[ 'back_to_top_side' ] = $side;
        } else {
            $value[ 'back_to_top_side' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_side' ];
        }
    } else {
        $value[ 'back_to_top_side' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_side' ];
    }

    if ( ! empty( $value[ 'back_to_top_bottom' ] ) ) {
        $bottom = absint( $value[ 'back_to_top_bottom' ] );
        if ($bottom >= 0 && $bottom <= 250) {
            $value[ 'back_to_top_bottom' ] = $bottom;
        } else {
            $value[ 'back_to_top_bottom' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_bottom' ];
        }
    } else {
        $value[ 'back_to_top_bottom' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_bottom' ];
    }

    if ( ! empty( $value[ 'back_to_top_svg' ] ) ) {
        $svg = sanitize_text_field( $value[ 'back_to_top_svg' ] );
        if( array_key_exists( $svg, mrclimb_svg_list() ) ) {
            $value[ 'back_to_top_svg' ] = $svg;
        } else {
            $value[ 'back_to_top_svg' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_svg' ];
        }
    } else {
        $value[ 'back_to_top_svg' ] = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_svg' ];
    }

    return $value;
}

/**
 * Manage back to top button
 */
function mrclimb_manage_btt_button()
{
    if ( get_option( 'back_to_top_on' ) ) {
        $iconlabel = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_svg' ];
        $iconsvg = mrclimb_svg_list()[$iconlabel];
    ?>
        <a href="#" class="totopbutton"><?php echo $iconsvg ?></a>
    <?php
    }
}
add_action( 'wp_footer', 'mrclimb_manage_btt_button' );

/**
 * Manage back to top style
 */
function mrclimb_manage_btt_style()
{
    if ( get_option( 'back_to_top_on' ) ) {
        $position = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_position' ];
        $side = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_side' ];
        $bottom = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_bottom' ];
        $color = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_color' ];
        $onmobile = get_option( 'back_to_top_settings', mrclimb_default_settings() )[ 'back_to_top_mobile' ];
    ?>
        <style>
            .totopbutton {
                position: fixed;
                Z-index: 99;
                display: none;
                <?php echo $position ?>: <?php echo $side ?>px;
                bottom: <?php echo $bottom ?>px;}
            .totopbutton path {
                fill: <?php echo $color ?>;
            }
            <?php if ( ! $onmobile ) { ?>
                @media (max-width: 781px) {
                    .totopbutton svg {
                        height: 0px;
                        width: 0px;
                    }
                }
            <?php } ?>
        </style>
    <?php
    }
}
add_action( 'wp_head', 'mrclimb_manage_btt_style' );

/**
 * Manage sticky header
 */
function mrclimb_manage_sticky_header()
{
    if ( get_option( 'sticky_header_on' ) ) {
    ?>
        <style>
            @media (min-width: 782px) {
                header {
                    z-index: 99;
                    margin: 0 auto;
                    width: 100%;
                    position: fixed;
                    top: calc(0px + var(--wp-admin--admin-bar--height, 0px));
                    left: 0;
                    right: 0;
                    display: block;
                }
                .mrclimb-sticky-active {
                    border-bottom: 2px solid;
                    border-color: var(--wp--preset--color--mrclimb-decoration);
                    background-color: var(--wp--preset--color--mrclimb-dark);
                    color: var(--wp--preset--color--mrclimb-light);
                }
                .mrclimb-sticky-active > div {
                    padding-top: 2px !important;
                    padding-bottom: 2px !important;
                }
                .mrclimb-sticky-active .custom-logo {
                    width: 50px;
                }
                #mrclimb-filler {
                    margin-block-start: 0;
                    margin-block-end: 0;
                }
            }
        </style>
    <?php
    }
}
add_action( 'wp_head', 'mrclimb_manage_sticky_header' );

/**
 * Manage single post title
 */
function mrclimb_manage_post_title( $title )
{
    if ( ! is_single() || ! get_option( 'svg_title_on' ) || in_the_loop() ) {
        return $title;
    }

    $svg = '<svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="var(--wp--custom--typography--font-size--heading-1)" viewBox="0 0 195.000000 384.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,384.000000) scale(0.100000,-0.100000)" fill="var(--wp--preset--color--mrclimb-decoration)" stroke="none"><path d="M828 2921 l-3 -920 -22 -21 c-28 -25 -31 -85 -6 -112 15 -17 15 -22 -2 -78 -10 -33 -22 -60 -27 -60 -14 0 -106 49 -113 60 -6 10 -37 8 -87 -6 -16 -5 -18 4 -18 85 0 53 5 99 12 110 10 16 7 27 -18 67 -34 56 -82 84 -142 84 -47 0 -106 -26 -136 -59 -25 -27 -31 -103 -14 -161 12 -37 18 -44 35 -42 31 4 53 -34 53 -91 0 -42 -6 -59 -43 -111 -75 -104 -144 -282 -162 -417 -6 -40 -4 -54 10 -69 25 -27 90 -64 185 -105 44 -19 104 -53 135 -76 l55 -41 0 -479 c0 -419 2 -479 15 -479 13 0 15 59 15 468 l0 467 35 28 36 29 39 -35 c75 -69 108 -73 230 -32 51 17 105 27 174 31 173 9 165 5 168 72 3 51 5 57 27 60 19 3 36 -10 83 -62 52 -58 67 -68 129 -88 61 -19 82 -33 165 -110 53 -48 104 -88 114 -88 11 0 35 29 69 86 45 76 51 92 51 142 0 70 -9 85 -45 80 -24 -3 -30 -10 -42 -50 -7 -26 -17 -49 -22 -52 -4 -3 -24 -3 -45 1 -32 5 -53 24 -161 144 -69 77 -136 157 -150 179 -13 21 -33 44 -44 50 -30 16 -100 12 -187 -11 -277 -72 -272 -71 -307 -30 -27 32 -127 222 -127 241 0 7 7 10 15 6 8 -3 18 2 23 10 8 14 15 13 60 -10 l51 -26 10 38 c6 20 14 77 17 125 6 71 11 91 26 101 19 14 19 16 -12 88 -17 40 -35 83 -40 96 -5 12 -14 22 -20 22 -7 0 -10 305 -10 935 0 812 -2 935 -15 935 -12 0 -15 -123 -17 -919z m10 -1238 l-3 -37 -17 26 c-16 24 -16 29 0 76 l17 51 3 -40 c2 -22 2 -56 0 -76z m-369 -480 c48 -74 57 -99 28 -75 -7 6 -22 9 -33 6 -13 -4 -47 17 -112 67 -85 66 -91 73 -74 85 11 7 25 27 32 44 8 20 18 29 27 25 9 -3 17 2 20 14 4 16 11 9 34 -34 16 -30 51 -89 78 -132z"/></g></svg>';

    return $svg.'&nbsp;'.$title;
}
add_filter( 'the_title', 'mrclimb_manage_post_title' );

function mrclimb_svg_list()
{
    $svgs = [
        'icon_1' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 122.883 122.882" enable-background="new 0 0 122.883 122.882" xml:space="preserve"><g><path d="M122.883,61.441c0,16.966-6.877,32.326-17.996,43.445c-11.119,11.118-26.479,17.995-43.446,17.995 c-16.966,0-32.326-6.877-43.445-17.995C6.877,93.768,0,78.407,0,61.441c0-16.967,6.877-32.327,17.996-43.445 C29.115,6.877,44.475,0,61.441,0c16.967,0,32.327,6.877,43.446,17.996C116.006,29.115,122.883,44.475,122.883,61.441 L122.883,61.441z M80.717,71.377c1.783,1.735,4.637,1.695,6.373-0.088c1.734-1.784,1.695-4.637-0.09-6.372L64.48,43.078 l-3.142,3.23l3.146-3.244c-1.791-1.737-4.653-1.693-6.39,0.098c-0.05,0.052-0.099,0.104-0.146,0.158L35.866,64.917 c-1.784,1.735-1.823,4.588-0.088,6.372c1.735,1.783,4.588,1.823,6.372,0.088l19.202-18.779L80.717,71.377L80.717,71.377z M98.496,98.496c9.484-9.482,15.35-22.584,15.35-37.055c0-14.472-5.865-27.573-15.35-37.056 C89.014,14.903,75.912,9.038,61.441,9.038c-14.471,0-27.572,5.865-37.055,15.348C14.903,33.869,9.038,46.97,9.038,61.441 c0,14.471,5.865,27.572,15.349,37.055c9.482,9.483,22.584,15.349,37.055,15.349C75.912,113.845,89.014,107.979,98.496,98.496 L98.496,98.496z"/></g></svg>',
        'icon_2' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 122.883 122.882" enable-background="new 0 0 122.883 122.882" xml:space="preserve"><g><path d="M0,61.441L0,61.441h0.018c0,16.976,6.872,32.335,17.98,43.443c11.108,11.107,26.467,17.979,43.441,17.979v0.018h0.001 h0.001v-0.018c16.974,0,32.335-6.872,43.443-17.98s17.98-26.467,17.98-43.441h0.018v-0.001V61.44h-0.018 c0-16.975-6.873-32.334-17.98-43.443C93.775,6.89,78.418,0.018,61.443,0.018V0h-0.002l0,0v0.018 c-16.975,0-32.335,6.872-43.443,17.98C6.89,29.106,0.018,44.465,0.018,61.439H0V61.441L0,61.441z M42.48,71.7 c-1.962,1.908-5.101,1.865-7.009-0.098c-1.909-1.962-1.865-5.101,0.097-7.009l22.521-21.839l3.456,3.553l-3.46-3.569 c1.971-1.911,5.117-1.862,7.029,0.108c0.055,0.058,0.109,0.115,0.16,0.175L87.33,64.594c1.963,1.908,2.006,5.047,0.098,7.009 c-1.908,1.963-5.047,2.006-7.01,0.098L61.53,53.227L42.48,71.7L42.48,71.7z"/></g></svg>',
        'icon_3' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M512 256c0 70.67-28.66 134.68-74.99 181.01C390.68 483.34 326.67 512 256 512c-70.68 0-134.69-28.66-181.01-74.99C28.66 390.68 0 326.67 0 256c0-70.68 28.66-134.69 74.99-181.01C121.31 28.66 185.32 0 256 0c70.67 0 134.68 28.66 181.01 74.99C483.34 121.31 512 185.32 512 256zm-204.29 21.21v67.04c0 7.54-6.19 13.72-13.73 13.72h-75.96c-7.53 0-13.72-6.17-13.72-13.72v-67.03h-42.84c-16.5 0-24.78-19.63-13.86-31.54l94.74-110.57c7.44-9 21.03-9 28.66-.36l93.71 111.31c10.69 12.26 1.64 31.14-14.19 31.15h-42.81zm105.52 136.02c40.22-40.24 65.11-95.84 65.11-157.23 0-61.4-24.89-117-65.11-157.23C372.99 58.54 317.39 33.66 256 33.66c-61.4 0-117 24.88-157.23 65.11C58.54 139 33.66 194.6 33.66 256c0 61.39 24.88 116.99 65.11 157.23C139 453.45 194.6 478.34 256 478.34c61.39 0 116.99-24.89 157.23-65.11z"/></svg>',
        'icon_4' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 512"><path d="M512 256c0 70.67-28.66 134.69-74.98 181.02C390.69 483.34 326.68 512 256 512s-134.69-28.66-181.02-74.98C28.66 390.69 0 326.67 0 256c0-70.68 28.66-134.69 74.98-181.01C121.31 28.66 185.32 0 256 0c70.67 0 134.69 28.66 181.02 74.99C483.34 121.31 512 185.32 512 256zm-160.23 21.5h-43.38v67.93c0 7.63-6.27 13.9-13.91 13.9H217.5c-7.62 0-13.9-6.25-13.9-13.9v-67.92h-43.41c-16.71 0-25.11-19.9-14.05-31.96l96.01-112.04c7.54-9.12 21.31-9.13 29.04-.38l94.96 112.8c10.83 12.43 1.66 31.55-14.38 31.57z"/></svg>',
        'icon_5' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M512 256c0 70.67-28.66 134.68-74.98 181.02C390.68 483.34 326.67 512 256 512c-70.68 0-134.69-28.66-181.02-74.98C28.66 390.68 0 326.67 0 256c0-70.68 28.66-134.69 74.98-181.02C121.31 28.66 185.32 0 256 0c70.67 0 134.68 28.66 181.02 74.98C483.34 121.31 512 185.32 512 256zm-156.63 31.39-38.15.02v59.79c0 7.17-2.96 13.73-7.72 18.5-4.82 4.81-11.39 7.78-18.56 7.78h-69.88c-7.19 0-13.75-2.97-18.52-7.72-4.79-4.75-7.76-11.34-7.76-18.56v-59.79h-38.16c-8.28 0-15.41-3.14-20.76-8.04-3.26-2.98-5.81-6.6-7.52-10.51-1.74-3.98-2.67-8.27-2.67-12.54 0-7.24 2.54-14.66 8.17-20.79l99.62-101.79c.91-1.05 1.88-2.03 2.89-2.9 5.69-5.07 12.86-7.61 20.06-7.68 7.11-.06 14.29 2.3 20.06 7.08 1.04.87 2.08 1.87 3.12 3.01l99.12 102.89c5.22 5.99 7.56 13.1 7.57 20.11.01 4.5-1 8.95-2.84 12.97-1.87 4.08-4.57 7.76-7.9 10.66-5.31 4.57-12.24 7.47-20.17 7.51zm-51.8-27.27h51.8c.88.06 1.69-.28 2.29-.79.46-.44.83-.93 1.05-1.4.24-.54.39-1.14.39-1.68 0-.67-.31-1.45-.97-2.21-30.94-32.14-66.89-73.64-99.05-102.83-.72-.57-1.6-.87-2.46-.87-.76 0-1.58.31-2.26.91-32.96 29.9-68.67 70.22-100.47 102.71-.63.69-.92 1.54-.92 2.36 0 .63.11 1.21.31 1.67.23.54.56 1.01.91 1.33.53.49 1.36.8 2.43.8h65.45v86.06h67.86v-86.06h13.64zm114.16 157.61c41.37-41.39 66.98-98.58 66.98-161.73 0-63.16-25.61-120.35-66.98-161.73C376.34 52.89 319.15 27.29 256 27.29c-63.16 0-120.35 25.6-161.73 66.98C52.89 135.65 27.29 192.84 27.29 256c0 63.15 25.6 120.34 66.98 161.73 41.38 41.37 98.57 66.98 161.73 66.98 63.15 0 120.34-25.61 161.73-66.98z"/></svg>',
        'icon_6' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 354.34"><path fill-rule="nonzero" d="M394.21 350.98 255.99 221.24 117.78 350.99c-4.96 4.67-12.77 4.43-17.44-.54L3.45 249.62c-4.73-4.91-4.58-12.72.34-17.45L247.54 3.35c4.78-4.49 12.2-4.44 16.91 0l243.66 228.73c4.97 4.67 5.21 12.48.54 17.45l-97.09 101.02c-4.69 4.88-12.43 5.06-17.35.43zM264.45 195.32l137.77 129.33 79.89-83.13L255.99 29.27 29.89 241.52l79.88 83.13 137.77-129.33c4.71-4.44 12.13-4.5 16.91 0z"/></svg>',
        'icon_7' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 346.35"><path fill-rule="nonzero" d="M410.1 346.35 256 201.69 101.9 346.35 0 240.31 256 0l256 240.31z"/></svg>',
        'icon_8' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M256 512c70.68 0 134.7-28.66 181.02-74.98C483.34 390.7 512 326.69 512 256c0-70.69-28.66-134.7-74.98-181.02C390.7 28.66 326.69 0 256 0 185.31 0 121.3 28.66 74.98 74.98 28.66 121.3 0 185.31 0 256c0 70.69 28.66 134.7 74.98 181.02C121.3 483.34 185.31 512 256 512zM146.96 284.09 256 175.06l109.04 109.03-40.51 40.52-68.52-68.51-68.52 68.52-40.53-40.53zm264.03 126.9c-39.66 39.66-94.47 64.2-154.99 64.2-60.53 0-115.33-24.54-154.99-64.2-39.66-39.66-64.2-94.46-64.2-154.99 0-60.53 24.54-115.33 64.2-154.99 39.66-39.66 94.46-64.2 154.99-64.2 60.53 0 115.33 24.54 154.99 64.2 39.66 39.66 64.2 94.46 64.2 154.99 0 60.53-24.54 115.33-64.2 154.99z"/></svg>',
        'icon_9' => '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" width="50px" height="50px" viewBox="0 0 512 512"><path d="M256 512c70.68 0 134.7-28.66 181.02-74.98C483.34 390.7 512 326.69 512 256c0-70.69-28.66-134.7-74.98-181.02C390.7 28.66 326.69 0 256 0 185.31 0 121.3 28.66 74.98 74.98 28.66 121.3 0 185.31 0 256c0 70.69 28.66 134.7 74.98 181.02C121.3 483.34 185.31 512 256 512zM146.96 284.09 256 175.06l109.04 109.03-40.51 40.52-68.52-68.51-68.52 68.52-40.53-40.53z"/></svg>',
        'icon_10' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 88.5 122.88" style="enable-background:new 0 0 88.5 122.88" xml:space="preserve"><g><path d="M36.19,122.88V96.34H5.13c-5.2,0.48-6.26-3.63-4.03-7.04l19.84-23.26l-0.57-0.57H9.75c-3.85,0.57-5.27-3.6-2.94-6.53 l21.37-25.1h-6.24c-3.91,0.1-4.87-3.49-2.37-6.88L39.04,3.84C40.37,2.26,41.79-0.05,44.1,0c1.99,0.04,3.19,1.93,4.37,3.31 l20.7,24.14c2.25,3.22,0.33,6.61-3.59,6.61H60l21.22,24.87c2.55,2.52,1.25,6.55-1.68,7.11H67.21l18.5,21.7 c2.17,2.55,5.27,7.91-0.54,8.6H51.83v26.54H36.19L36.19,122.88z"/></g></svg>',
        'icon_11' => '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 122.88 78.87"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>mountains</title><path class="cls-1" d="M90.4,28.29l.08.24.22.62.08.24L91,30l.08.24.19.56.08.23.18.53.08.23.17.5.08.23L92,33l.07.23.15.44.08.23.14.4.08.23.13.38.08.22.12.35.07.22L93,36l.07.21.11.31.07.21.1.29.07.2.09.26.07.2.09.25.07.19.08.23.06.18.07.21.06.18.07.2.06.17.07.18,0,.17.06.16.06.16,0,.15,0,.16,0,.14.05.15,0,.12,0,.15,0,.11,0,.14,0,.1,0,.13,0,.1,0,.12,0,.09,0,.12,0,.08,0,.11,0,.07,0,.1,0,.07,0,.1,0,.06,0,.09v.06l0,.09,0,0,0,.08v0l0,.09,0,.11v.25h0l0,.18v.5h0V44h0v.08h0v.29h0v.35h0v.13h0v.13h0v.15h0v.16h0v.17h0v.18h0V46h0v.22h0v.24c.07,5,6.36,11,5.2,14.44s4.68,9.9,6.56,14.71H98.63a3.31,3.31,0,0,0-.6-1.91L79.93,44.76l3-4.85,3.65-3.66,3.69-8.1h0l.08.14ZM92.19,27l30.28,48.39a2.17,2.17,0,0,1,.41,1.28,2.21,2.21,0,0,1-2.21,2.21H3.28A3.28,3.28,0,0,1,.53,73.79L47.26,1.66A3.16,3.16,0,0,1,48.37.5,3.29,3.29,0,0,1,52.9,1.55L78.46,42.41l10-15.35a2.07,2.07,0,0,1,.75-.78,2.2,2.2,0,0,1,3,.71ZM52.44,75.58H3.9L14.33,61.79l16-28L39.47,23.2l4.65-10.28,6-9.64h0l.12.2c.88,2.66,1.26,4.11,2,6.25.44,1.23,2.3,3.91,2.67,4.93,5.31,14.76,2.62,9.34,2.69,15.88.08,7.51,9.47,16.45,7.74,21.53-1.93,5.62,8.38,16.22,10.31,23.51Z"/></svg>',
        'icon_12' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 122.88 117.03" style="enable-background:new 0 0 122.88 117.03" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M0.32,115.88l9.87-17.71c0.81-1.34,1.7-2.45,2.69-3.24c3.11-2.48,10.95,0.09,14.71,0.75 c0.75,0.17,25.55-12.73,37.56-12.73l6.59-3.75c2.77-1.58,9.16-5.96,11.97-5.9c2.06,0.05,4,1.22,5.81,3.6l9.47,14.28l23.23,23.88 c1.97,1.29-0.88,1.98-2.11,1.98H0.8C-0.18,116.84-0.16,116.41,0.32,115.88L0.32,115.88z M69.04,28.18 c-0.38-1.41,0.46-2.86,1.87-3.23c1.41-0.38,2.86,0.46,3.23,1.87l0.84,3.14l0.11-0.05l0.03-0.01c1-0.34,2.18-0.13,3.2,0.48 c0.73,0.43,1.39,1.06,1.86,1.84c0.48,0.78,0.77,1.71,0.76,2.73c-0.01,1.47-0.65,3.11-2.29,4.73c-0.07,0.07-0.15,0.12-0.24,0.15 l-0.72,0.29l7.55,28.15c-0.48-0.07-0.97-0.12-1.46-0.13c-1.17-0.03-2.48,0.27-3.84,0.75l-7.19-26.81l-1.85,0.73l0,0l-0.69,0.25 c-4.02,1.43-6.94,2.46-12.04,1.2c-0.04-0.01-0.07-0.02-0.11-0.04c-3.57-1.38-5.42-3.31-7.22-5.19l-0.26-0.27l-2.28,14.52 c2.04,1.28,4.08,2.23,6,3.13c5.84,2.72,10.64,4.97,11.67,14.14c0.19,1.65,0.1,3.2,0.01,4.88l0,0.03c-0.01,0.24-0.03,0.5-0.05,1.1 l-2.22,1.27c-2.52,0.16-5.38,0.71-8.38,1.5c0.05-1.21,0.11-2.41,0.17-3.61l0.04-0.83c0.05-0.96,0.1-1.84,0.05-2.67 c-0.05-0.79-0.19-1.52-0.52-2.23l-0.09-0.19c-0.36-0.79-0.7-1.53-1.2-1.76c-1-0.47-2.58-1.04-4.38-1.63 c-2.06-0.68-4.36-1.37-6.39-1.94c-1.49,4.94-3.51,10.9-5.68,16.58c-0.75,1.96-1.51,3.88-2.28,5.72c-0.73,0.32-1.42,0.63-2.09,0.92 c-3.33,1.48-5.63,2.64-9.17,1.89c-0.37-0.08-0.75-0.15-1.13-0.23c1.42-3.7,2.93-7.87,4.4-12.08c2.2-6.3,4.31-12.73,5.86-17.89 c-0.92-1.13-1.81-2.4-2.41-3.8c-0.67-1.54-0.99-3.21-0.66-5l3.25-17.57L32.93,33c-1.13-0.05-2.07-0.09-3.14,0.38 c-1.48,0.65-2.64,1.96-3.95,3.43c-0.52,0.59-1.07,1.21-1.7,1.84l-0.04,0.04c-0.47,0.48-0.95,0.98-1.41,1.44l-5.74,5.8 c-0.25,0.25-0.64,0.25-0.89,0l-6.26-6.57c-0.24-0.25-0.23-0.65,0.02-0.89l5.73-5.79c0.49-0.5,0.92-0.94,1.33-1.36l0.06-0.06 c2.58-2.82,4.69-5.08,7.38-6.6c2.73-1.54,6-2.31,10.89-2.09l0.01,0c1.75,0.02,3.8,0.21,5.5,0.37c0.79,0.07,1.5,0.14,2.1,0.18 c8.24,0.54,12.1,4.88,15.1,8.25c1.33,1.49,2.47,2.78,3.71,3.37c0.58,0.28,1.5-0.11,2.54-0.55c0.63-0.27,1.3-0.55,2-0.74 c0.46-0.17,0.71-0.27,0.9-0.34c0.25-0.1,0.42-0.16,0.52-0.2l2.44-0.97L69.04,28.18L69.04,28.18z M43.5,0.53 c2.58-0.88,5.28-0.63,7.55,0.48c2.27,1.11,4.12,3.1,5.01,5.68c0.88,2.58,0.64,5.28-0.48,7.55c-1.11,2.27-3.1,4.12-5.68,5 c-2.58,0.88-5.28,0.64-7.55-0.48c-2.27-1.11-4.12-3.1-5-5.68c-0.88-2.58-0.64-5.28,0.48-7.55C38.93,3.27,40.91,1.42,43.5,0.53 L43.5,0.53z"/></g></svg>'
    ];
    return $svgs;
}