<?php
/**
 * Main Header Section
 */

// Vars
$company_logo_opt = get_field( 'company_logo_opt', 'option' );
$company_logo_opt_url = $company_logo_opt[ 'url' ];
$company_name_opt = get_field( 'company_name_opt', 'option' );

// Nav
$nav_args = array(
	"menu" => "Main Navigation", // The menu to show
	"container" => false, // remove wrapping container
	"menu_class" => "main-browse-nav" // set class of UL
);
?>
<div class="main-header">
	<div class="container">
		<div class="main-header__row">


			<div class="main-header__col main-header__col--logo">
				<a href="/" class="home-link">
					<img src="<?php echo $company_logo_opt_url; ?>" alt="<?php echo $company_name_opt; ?>" class="home-link__logo">
				</a>
			</div>


			<div class="main-header__col main-header__col--nav">
				<?php wp_nav_menu($nav_args); ?>
			</div>

			<div class="main-header__burger">
				<a href="#" class="js-toggle-nav main-header__burger-link">
					<i class="fa-solid fa-bars"></i>
				</a>
			</div>

		</div>		
	</div>	
</div>
<script type="text/javascript">
jQuery.noConflict();
(function( $ ) {
	$(function() {
    	
    	/* ======================================== */  
	    /* Handle the slideout menu
	    /* ======================================== */

	    $(".js-toggle-nav, .slideout-menu-toggle").click(function(e){

	        console.log("clicked!");

	        // create menu variables
	        var slideoutMenu = $('.slideout-menu');
	        var slideoutMenuWidth = $('.slideout-menu').width();

	        // toggle open class
	        slideoutMenu.toggleClass("active");
	        
	    });

	    // Build the dropdown button
	    var toggleHTML = "";
	        toggleHTML += '<button class="dropdown-toggle">';       
	        toggleHTML += '<span class="screen-reader-text">Expand Menu</a>';   
	        toggleHTML += '</button>';

	        // Add dropdown button to relevant menu items
	    $(".slideout-menu li.menu-item-has-children > a").append(toggleHTML);

	    // When dropdown button is clicked find and toggle that menu
	    $("button.dropdown-toggle").click(function(e){      
	        
	        // Stop default behaviour and bubbling
	        e.preventDefault();
	        e.stopPropagation();

	        var lineItem = $(this).closest("li");       
	        lineItem.find(".sub-menu").slideToggle();

	        $(this).toggleClass("sub-menu-on");
	    });    	
 	});
})(jQuery);
</script>