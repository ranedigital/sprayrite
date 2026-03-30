<?php
/**
 * RANE Digital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rane_digital
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rane_digital_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RANE Digital, use a find and replace
		* to change 'rane-starter' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rane-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rane-starter' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	/*add_theme_support(
		'custom-background',
		apply_filters(
			'rane_digital_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);*/

	// Add theme support for selective refresh for widgets.
	//add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	/*add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);*/
}
add_action( 'after_setup_theme', 'rane_digital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rane_digital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rane_digital_content_width', 640 );
}
add_action( 'after_setup_theme', 'rane_digital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rane_digital_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rane-starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rane-starter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rane_digital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rane_digital_scripts() {
	$stylesheet_path        = get_stylesheet_directory() . '/style.css';
	$navigation_script_path = get_template_directory() . '/js/navigation.js';
	$slick_css_path         = get_stylesheet_directory() . '/vendor/slick/slick.css';
	$slick_theme_css_path   = get_stylesheet_directory() . '/vendor/slick/slick-theme.css';
	$animate_css_path       = get_stylesheet_directory() . '/css/animate.css';
	$custom_css_path        = get_template_directory() . '/css/custom.css';
	$wow_script_path        = get_stylesheet_directory() . '/js/wow.min.js';
	$slick_script_path      = get_stylesheet_directory() . '/vendor/slick/slick.min.js';
	$site_script_path       = get_stylesheet_directory() . '/js/functions.js';
	$sprayrite_script_path  = get_stylesheet_directory() . '/js/sprayrite-home.js';

	wp_enqueue_style( 'rane-starter-style', get_stylesheet_uri(), array(), file_exists( $stylesheet_path ) ? filemtime( $stylesheet_path ) : _S_VERSION );
	wp_style_add_data( 'rane-starter-style', 'rtl', 'replace' );
	wp_enqueue_script( 'rane-starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), file_exists( $navigation_script_path ) ? filemtime( $navigation_script_path ) : _S_VERSION, true );

	// Google Font (swap our URL to suit - (https://fonts.google.com/)
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;500;600;700&family=Poppins:wght@400;600;700&display=swap', false );

	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/vendor/slick/slick.css', array(), file_exists( $slick_css_path ) ? filemtime( $slick_css_path ) : null );				// Slick Slider CSS
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/vendor/slick/slick-theme.css', array( 'slick-css' ), file_exists( $slick_theme_css_path ) ? filemtime( $slick_theme_css_path ) : null );	// Slick Slider Theme CSS
	wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/css/animate.css', array(), file_exists( $animate_css_path ) ? filemtime( $animate_css_path ) : null );				// Load animate css

	/**
	 * For the custom.css stylesheet 
	 */
	//wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css'); // Uncomment when live
	$custom_css_version = file_exists( $custom_css_path ) ? filemtime( $custom_css_path ) : _S_VERSION;
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css', array(), $custom_css_version);

	wp_enqueue_script( 'fontawesome-script', "https://kit.fontawesome.com/b5fa6afcff.js", '', '', false  );				// Font Awesome
	wp_enqueue_script( 'wow-script', get_stylesheet_directory_uri() . '/js/wow.min.js', array( 'jquery' ), file_exists( $wow_script_path ) ? filemtime( $wow_script_path ) : null, true );	// Wow
	wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/vendor/slick/slick.min.js', array( 'wow-script' ), file_exists( $slick_script_path ) ? filemtime( $slick_script_path ) : null, true );	// Slick Slider JS
	wp_enqueue_script( 'site-script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'slick-script' ), file_exists( $site_script_path ) ? filemtime( $site_script_path ) : null, true  );		// Custom JS File

	if ( is_front_page() || is_post_type_archive( 'sprayrite_review' ) ) {
		wp_enqueue_script( 'sprayrite-home-script', get_stylesheet_directory_uri() . '/js/sprayrite-home.js', array( 'slick-script' ), file_exists( $sprayrite_script_path ) ? filemtime( $sprayrite_script_path ) : _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rane_digital_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/sprayrite-home.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* ============================================================ */
/* Custom Start...
/* ============================================================ */

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');


/******************************
 * Enqueue Custom Login Styles
 * Adds a custom CSS file for login screen styling.
 ******************************/
function enqueue_custom_login_styles() {
    echo '<link rel="stylesheet" type="text/css" href="' . esc_url(get_stylesheet_directory_uri()) . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'enqueue_custom_login_styles');

/******************************
 * Custom Login Logo URL
 * Changes the logo link on the login screen.
 ******************************/
function custom_login_logo_url() {
    return esc_url(get_home_url());
}
add_filter('login_headerurl', 'custom_login_logo_url');

/******************************
 * Floating CTA Button Overlay
 * Adds a floating CTA button to the login screen.
 ******************************/
function add_floating_cta_button() {
    ?>
    <div id="cta-float">
        <a href="https://makeitrane.com" target="_blank" title="Discover Our Services">+</a>
    </div>
    <div id="cta-tooltip">Discover Our Services</div>
    <?php
}
add_action('login_footer', 'add_floating_cta_button');

/******************************
 * Google Ads Overlay
 * Adds a rotating content ad overlay to the login screen.
 ******************************/

function add_google_ad_overlay() {
    $ad_container_path = get_template_directory() . '/login/google-ad-container.php';

    if (file_exists($ad_container_path)) {
        include $ad_container_path;
    } else {
        echo '<div id="google-ad-container"><p>Ad container file not found.</p></div>';
    }
}
add_action('login_footer', 'add_google_ad_overlay');


/******************************
 * Enqueue Login Screen Scripts
 * Adds JavaScript for animations and interactions on the login screen.
 ******************************/
function enqueue_login_scripts() {
    wp_enqueue_script(
        'login-ads',
        esc_url(get_template_directory_uri() . '/login/login-ads.js'),
        array(),
        '1.0',
        true
    );
}
add_action('login_enqueue_scripts', 'enqueue_login_scripts');

/******************************
 * Developer Notes
 ******************************
 * 1. Place the `custom-login-styles.css` file in `/login/` directory in your theme.
 * 2. Ensure `login-ads.js` is in `/login/` directory for rotating content functionality.
 * 3. Update the URL in `wp_remote_get` if the source of rotating ad content changes.
 * 4. Use `/login/client-logo.svg` for client-specific logos. Replace as needed.
 * 5. Test on different WordPress admin pages and devices to ensure compatibility.
 ******************************/


/**
 * Load an admin stylesheet
 */
function my_custom_admin_styles() {
    wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_styles' );

/**
 * RANE Digital - Custom Admin Enhancements
 */
// Include the RANE admin widget functionality
require_once get_template_directory() . '/admin/rane-admin-widget.php';
