<?php
/**
 * Main Header Section
 */

// Vars
$company_logo_opt = get_field( 'company_logo_opt', 'option' );
$company_logo_opt_url = ! empty( $company_logo_opt['url'] ) ? $company_logo_opt['url'] : '';
$company_name_opt = get_field( 'company_name_opt', 'option' );
$search_placeholder = 'Search for products';
$account_url = rane_digital_has_woocommerce() ? wc_get_page_permalink( 'myaccount' ) : wp_login_url();
$cart_url    = rane_digital_has_woocommerce() ? wc_get_cart_url() : home_url( '/cart/' );
$cart_count  = ( rane_digital_has_woocommerce() && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
$product_categories = rane_digital_has_woocommerce() ? get_terms(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'parent'     => 0,
	)
) : array();
$menu_items = array(
	array(
		'label' => 'Shop',
		'url'   => rane_digital_has_woocommerce() ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop/' ),
	),
	array(
		'label' => 'Weed Killers',
		'url'   => home_url( '/product-category/weed-killers/' ),
	),
	array(
		'label' => 'Fertilisers',
		'url'   => home_url( '/product-category/fertilisers/' ),
	),
	array(
		'label' => 'Seeds',
		'url'   => home_url( '/product-category/seeds/' ),
	),
	array(
		'label' => 'Plant & Pest Control',
		'url'   => home_url( '/product-category/plant-pest-control/' ),
	),
	array(
		'label' => 'Landscaping',
		'url'   => home_url( '/product-category/landscaping/' ),
	),
	array(
		'label' => 'Equipment',
		'url'   => home_url( '/product-category/equipment/' ),
	),
	array(
		'label' => 'Contact Us',
		'url'   => home_url( '/contact-us/' ),
	),
);
?>
<div class="main-header">
	<div class="container">
		<div class="main-header__utility">
			<div class="main-header__col main-header__col--logo">
				<a href="/" class="home-link home-link--placeholder">
					<span class="home-link__placeholder-box">
						<span class="home-link__placeholder-text">logo</span>
					</span>
				</a>
			</div>

			<div class="main-header__col main-header__col--search">
				<form class="main-header__search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<label class="screen-reader-text" for="sprayrite-product-search">Search products</label>
					<div class="main-header__search-wrap">
						<select class="main-header__category-select" name="product_cat" aria-label="Product category">
							<option value=""><?php esc_html_e( 'All Categories', 'rane-starter' ); ?></option>
							<?php if ( ! is_wp_error( $product_categories ) ) : ?>
								<?php foreach ( $product_categories as $product_category ) : ?>
									<option value="<?php echo esc_attr( $product_category->slug ); ?>">
										<?php echo esc_html( $product_category->name ); ?>
									</option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<input id="sprayrite-product-search" class="main-header__search-input" type="search" name="s" placeholder="<?php echo esc_attr( $search_placeholder ); ?>">
						<input type="hidden" name="post_type" value="product">
						<button class="main-header__search-button" type="submit" aria-label="Search">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</div>
				</form>
			</div>

			<div class="main-header__actions">
				<a href="<?php echo esc_url( $account_url ); ?>" class="main-header__action-link" aria-label="My account">
					<i class="fa-regular fa-user"></i>
				</a>
				<a href="<?php echo esc_url( $cart_url ); ?>" class="main-header__action-link main-header__action-link--cart" aria-label="Cart">
					<i class="fa-solid fa-cart-shopping"></i>
					<?php if ( $cart_count ) : ?>
						<span class="main-header__cart-count"><?php echo esc_html( $cart_count ); ?></span>
					<?php endif; ?>
				</a>
			</div>

			<div class="main-header__burger">
				<a href="#" class="js-toggle-nav main-header__burger-link">
					<i class="fa-solid fa-bars"></i>
				</a>
			</div>
		</div>

	</div>
	<nav class="main-header__nav">
		<div class="container">
			<ul class="main-browse-nav">
				<?php foreach ( $menu_items as $menu_item ) : ?>
					<li class="main-browse-nav__item">
						<a href="<?php echo esc_url( $menu_item['url'] ); ?>"><?php echo esc_html( $menu_item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</nav>
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
