<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mrclimb
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook.
 */
if ( ! function_exists( 'mrclimb_theme_setup' ) ) :
    function mrclimb_theme_setup() {
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style.css' );
    }
endif;
add_action( 'after_setup_theme', 'mrclimb_theme_setup' );

/**
 * Enqueue styles
 */
if ( ! function_exists( 'mrclimb_styles' ) ) :
    function mrclimb_styles() {
        wp_enqueue_style( 'mrclimb-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );
        wp_enqueue_style( 'dashicons' );

        wp_enqueue_script( 'mrclimb-js-global', get_template_directory_uri() . '/assets/js/global-effects.js', [ 'jquery' ], wp_get_theme()->get( 'Version' ), true );
        wp_localize_script( 'mrclimb-js-global', 'wpseObject', array(
            'sticky_header_on' => get_option( 'sticky_header_on' )
        ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'mrclimb_styles' );

/**
 * Enqueue dashicon style on editor - see open issue #53528
 */
add_action( 'enqueue_block_assets', function (): void {
    wp_enqueue_style( 'dashicons' );
});

/**
 * Enqueue admin styles
 */
if ( ! function_exists( 'mrclimb_admin_styles' ) ) :
    function mrclimb_admin_styles( $hook ) {
        if ( ! str_contains( $hook, 'mrclimb-customize-page' ) ) { 
            return;
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'mrclimb-style-admin', get_template_directory_uri() . '/assets/css/mrclimb-admin.css', array(), wp_get_theme()->get('Version'), 'all' );
        wp_enqueue_script( 'mrclimb-js-admin', get_template_directory_uri() . '/assets/js/admin-effects.js', [ 'jquery', 'wp-color-picker' ], wp_get_theme()->get( 'Version' ), true );
    }
endif;
add_action( 'admin_enqueue_scripts', 'mrclimb_admin_styles' );

/**
 * Register theme block styles
 */
if ( ! function_exists( 'mrclimb_block_styles' ) ) :
    function mrclimb_block_styles() {
        // justified paragraph
        register_block_style( 'core/paragraph', array(
            'name'      => 'justified-text-block',
            'label'     => esc_html__( 'Justified', 'mrclimb' ),
        ));
        // vertical header
        register_block_style( 'core/column', array(
            'name'      => 'vertical-header-block',
            'label'     => esc_html__( 'Vertical headings', 'mrclimb' ),
        ));
        // reverse column order on mobile
        register_block_style( 'core/columns', array(
            'name'      => 'reverse-mobile-order',
            'label'     => esc_html__( 'Reverse mobile', 'mrclimb' ),
        ));
    }
endif;
add_action( 'init', 'mrclimb_block_styles' );

/**
 * Register block pattern custom category
 */
if ( ! function_exists( 'mrclimb_block_patterns' ) ) :
    function mrclimb_block_patterns() {
        register_block_pattern_category( 'mrclimb', array(
            'label' => esc_html__( 'MRclimb - Blocks', 'mrclimb' )
        ) );
        register_block_pattern_category( 'mrclimb-headers', array(
            'label' => esc_html__( 'MRclimb - Headers', 'mrclimb' )
        ) );
        register_block_pattern_category( 'mrclimb-footers', array(
            'label' => esc_html__( 'MRclimb - Footers', 'mrclimb' )
        ) );
        register_block_pattern_category( 'mrclimb-pages', array(
            'label' => esc_html__( 'MRclimb - Pages', 'mrclimb' )
        ) );
    }
endif;
add_action( 'init', 'mrclimb_block_patterns' );

/**
 * Show notice about configuration page on theme activation
 */
if ( ! function_exists( 'mrclimb_switch_notice' ) ) :
    function mrclimb_switch_notice() {
        add_action( 'admin_notices', 'mrclimb_switch_admin_notice' );
    }
endif;
add_action( 'after_switch_theme', 'mrclimb_switch_notice' );

function mrclimb_switch_admin_notice() {
    ?>
        <div class="notice notice-info is-dismissible"><p>
            <?php echo esc_html__( 'Thank you for choosing MRclimb theme. Theme settings are available here: ', 'mrclimb' ); ?>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=mrclimb-customize-page' ) ); ?>"><?php echo esc_html__( 'MRclimb settings', 'mrclimb' ); ?></a>
        </p></div>
    <?php
}

/**
 * Add theme configuration page under appearance settings
 */
require get_template_directory() . '/inc/mrclimb-config.php';