
<?php
/**
 * Main footer section.
 */

$site_name       = get_field( 'company_name_opt', 'options' ) ? get_field( 'company_name_opt', 'options' ) : 'Sprayrite Agri Ltd';
$ftr_opts_desc   = get_field( 'company_blurb_opt', 'options' ) ? get_field( 'company_blurb_opt', 'options' ) : 'At Sprayriteagri, we provide high-quality garden care products to keep your lawn and plants looking their best.';
$ftr_opts_address = get_field( 'company_addr_opt', 'options' ) ? get_field( 'company_addr_opt', 'options' ) : "66 Foy Lane,\nBT62 1PN\nCo. Armagh\nNorthern Ireland";
$ftr_opts_tel    = get_field( 'company_tel_opt', 'options' ) ? get_field( 'company_tel_opt', 'options' ) : '07 7330 05020';
$ftr_opts_email  = get_field( 'company_email_opt', 'options' ) ? get_field( 'company_email_opt', 'options' ) : 'info@sprayriteagri.co.uk';

$ftr_opts_address = str_ireplace( array( '<br>', '<br/>', '<br />' ), "\n", $ftr_opts_address );
$ftr_opts_address = preg_replace( "/\r\n|\r/", "\n", wp_strip_all_tags( $ftr_opts_address ) );
$ftr_opts_address = preg_replace( "/\n{2,}/", "\n", $ftr_opts_address );
$ftr_opts_address = trim( $ftr_opts_address );

$ftr_opts_facebook = get_field( 'facebook_link_opt', 'options' );
$ftr_opts_insta    = get_field( 'instagram_link_opt', 'options' );
$theme_logo_path   = get_template_directory() . '/images/sprayritelogo.svg';
$theme_logo_url    = file_exists( $theme_logo_path ) ? get_template_directory_uri() . '/images/sprayritelogo.svg' : '';

$footer_shop_links = array(
	array( 'label' => 'Shop', 'url' => rane_digital_has_woocommerce() ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop/' ) ),
	array( 'label' => 'Weed Killers', 'url' => home_url( '/product-category/weed-killers/' ) ),
	array( 'label' => 'Fertilisers', 'url' => home_url( '/product-category/fertilisers/' ) ),
	array( 'label' => 'Seeds', 'url' => home_url( '/product-category/seeds/' ) ),
	array( 'label' => 'Plant & Pest Control', 'url' => home_url( '/product-category/plant-pest-control/' ) ),
	array( 'label' => 'Landscaping', 'url' => home_url( '/product-category/landscaping/' ) ),
	array( 'label' => 'Equipment', 'url' => home_url( '/product-category/equipment/' ) ),
);

$footer_info_links = array(
	array( 'label' => 'Home', 'url' => home_url( '/' ) ),
	array( 'label' => 'Contact Us', 'url' => home_url( '/contact-us/' ) ),
	array( 'label' => 'My Account', 'url' => rane_digital_has_woocommerce() ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ),
	array( 'label' => 'Privacy Policy', 'url' => home_url( '/privacy-policy/' ) ),
	array( 'label' => 'Terms & Conditions', 'url' => home_url( '/terms-conditions/' ) ),
	array( 'label' => 'Return Policy', 'url' => home_url( '/return-policy/' ) ),
);
?>
<footer id="colophon" class="site-footer sprayrite-footer">
	<div class="sprayrite-footer__main">
		<div class="container">
			<div class="sprayrite-footer__grid ag-fade-sequence" data-ag-fade-sequence>
				<div class="sprayrite-footer__col sprayrite-footer__col--brand ag-fade-item" data-ag-fade-item style="--ag-fade-delay:0ms;">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sprayrite-footer__logo-link">
						<?php if ( $theme_logo_url ) : ?>
							<img src="<?php echo esc_url( $theme_logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>" class="sprayrite-footer__logo">
						<?php else : ?>
							<span class="sprayrite-footer__logo-placeholder">logo</span>
						<?php endif; ?>
					</a>
					<p class="sprayrite-footer__blurb"><?php echo esc_html( $ftr_opts_desc ); ?></p>
				</div>

				<div class="sprayrite-footer__col ag-fade-item" data-ag-fade-item style="--ag-fade-delay:120ms;">
					<h2 class="sprayrite-footer__title">Shop</h2>
					<ul class="sprayrite-footer__links">
						<?php foreach ( $footer_shop_links as $link ) : ?>
							<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sprayrite-footer__col ag-fade-item" data-ag-fade-item style="--ag-fade-delay:240ms;">
					<h2 class="sprayrite-footer__title">Info</h2>
					<ul class="sprayrite-footer__links">
						<?php foreach ( $footer_info_links as $link ) : ?>
							<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sprayrite-footer__col ag-fade-item" data-ag-fade-item style="--ag-fade-delay:360ms;">
					<h2 class="sprayrite-footer__title"><?php echo esc_html( $site_name ); ?></h2>
					<div class="sprayrite-footer__address"><?php echo nl2br( esc_html( $ftr_opts_address ) ); ?></div>
					<div class="sprayrite-footer__contact">
						<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $ftr_opts_tel ) ); ?>"><?php echo esc_html( $ftr_opts_tel ); ?></a>
						<a href="mailto:<?php echo esc_attr( $ftr_opts_email ); ?>"><?php echo esc_html( $ftr_opts_email ); ?></a>
					</div>
					<ul class="sprayrite-footer__social">
						<?php if ( $ftr_opts_facebook ) : ?>
							<li><a href="<?php echo esc_url( $ftr_opts_facebook ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
						<?php endif; ?>
						<?php if ( $ftr_opts_insta ) : ?>
							<li><a href="<?php echo esc_url( $ftr_opts_insta ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="sprayrite-footer__bar">
		<div class="container">
			<p class="sprayrite-footer__bar-text">
				<span>Copyright <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $site_name ); ?></span>
				<span>Website by <a href="https://makeitrane.com" target="_blank" rel="nofollow noopener">RANE Digital</a></span>
			</p>
		</div>
	</div>
</footer>
