<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package rane_digital
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rane_digital_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'rane_digital_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rane_digital_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rane_digital_pingback_header' );


/**
 * ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'position'    	=> 1,
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Company Details',
		'menu_title'	=> 'Company Details',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}


/**
 * Images Sizes 
 * Add here as needed
 */
add_image_size( 'main-banner', 1920, 500, true );
add_image_size( "builder-img", 400, 400, true );

/* Add GA4 javascript code as close to 
the opening <head> tag as possible
=====================================================*/
function ga4_tracking_code(){

	$ga4_tracking_id = get_field('ga4_tracking_id', 'options');	
	if($ga4_tracking_id) { ?> 

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga4_tracking_id; ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo $ga4_tracking_id; ?>');
	</script>
<?php }
}
add_action( 'wp_head', 'ga4_tracking_code', 10 );


/* Add Facebook Pixel code to the head if there is an ID
=====================================================*/
function add_facebook_pixel() {

	$fb_pixel_id = get_field('fb_pixel_id', 'options');

	if($fb_pixel_id) {
    ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $fb_pixel_id; ?>'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=<?php echo $fb_pixel_id; ?>&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <?php
    }
}
add_action('wp_head', 'add_facebook_pixel');