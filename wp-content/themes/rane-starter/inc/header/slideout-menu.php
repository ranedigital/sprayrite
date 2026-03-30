<?php
/**
 * The main slideout menu
 */

// Main menu
$nav_args = array(
	"menu" => "Main Navigation", // The menu to show
	"container" => false, // remove wrapping container
	"menu_class" => "mobile-main-nav" // set class of UL
);

?>
<div class="slideout-menu">

	<h3>Menu <a href="#" class="slideout-menu-toggle">×</a></h3>

	<?php wp_nav_menu($nav_args); ?>

</div>