<?php
/**
 * Site Top Bar
 */

// Vars
$promo_text = get_field( 'cta_topbar_txt_opt', 'option' );
$promo_link = get_field( 'cta_topbar_link_opt', 'option' );

if ( ! $promo_text ) {
	$promo_text = 'We Offer Free UK Delivery';
}

?>
<div class="top-bar">
	<div class="container">
		<div class="top-bar__row">
			<div class="top-bar__col top-bar__col--promo">
				<?php if ( $promo_link ) : ?>
					<a href="<?php echo esc_url( $promo_link ); ?>" class="top-bar__promo-link">
						<?php echo esc_html( $promo_text ); ?>
					</a>
				<?php else : ?>
					<span class="top-bar__promo-text"><?php echo esc_html( $promo_text ); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
