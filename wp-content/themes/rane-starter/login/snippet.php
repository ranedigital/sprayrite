/**
 * Code to add the custom login css file to the theme
 * - file is "/login/custom-login-styles.css" 
 */
function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');