<?php
/**
 * Sprayrite homepage layout.
 *
 * @package rane_digital
 */

$defaults = rane_digital_get_default_homepage_data();

$hero_slides    = get_field( 'sprayrite_home_hero_slides' );
$selling_points = get_field( 'sprayrite_home_usp_cards' );
$feature_tiles  = get_field( 'sprayrite_home_feature_tiles' );

$best_sellers = array(
	'title'       => get_field( 'sprayrite_home_best_sellers_title' ) ? get_field( 'sprayrite_home_best_sellers_title' ) : $defaults['best_sellers']['title'],
	'intro'       => get_field( 'sprayrite_home_best_sellers_intro' ) ? get_field( 'sprayrite_home_best_sellers_intro' ) : $defaults['best_sellers']['intro'],
	'button_text' => get_field( 'sprayrite_home_best_sellers_button_text' ) ? get_field( 'sprayrite_home_best_sellers_button_text' ) : $defaults['best_sellers']['button_text'],
	'button_link' => get_field( 'sprayrite_home_best_sellers_button_link' ) ? get_field( 'sprayrite_home_best_sellers_button_link' ) : $defaults['best_sellers']['button_link'],
);

$sale_banner = array(
	'title'            => get_field( 'sprayrite_home_sale_banner_title' ) ? get_field( 'sprayrite_home_sale_banner_title' ) : $defaults['sale_banner']['title'],
	'highlight'        => get_field( 'sprayrite_home_sale_banner_highlight' ) ? get_field( 'sprayrite_home_sale_banner_highlight' ) : $defaults['sale_banner']['highlight'],
	'highlight_suffix' => get_field( 'sprayrite_home_sale_banner_highlight_suffix' ) ? get_field( 'sprayrite_home_sale_banner_highlight_suffix' ) : $defaults['sale_banner']['highlight_suffix'],
	'text'             => get_field( 'sprayrite_home_sale_banner_text' ) ? get_field( 'sprayrite_home_sale_banner_text' ) : $defaults['sale_banner']['text'],
	'button_text'      => get_field( 'sprayrite_home_sale_banner_button_text' ) ? get_field( 'sprayrite_home_sale_banner_button_text' ) : $defaults['sale_banner']['button_text'],
	'button_link'      => get_field( 'sprayrite_home_sale_banner_button_link' ) ? get_field( 'sprayrite_home_sale_banner_button_link' ) : $defaults['sale_banner']['button_link'],
	'background_image' => get_field( 'sprayrite_home_sale_banner_background_image' ),
	'card_image'       => get_field( 'sprayrite_home_sale_banner_card_image' ),
);

$special_offers = array(
	'title'       => get_field( 'sprayrite_home_special_offers_title' ) ? get_field( 'sprayrite_home_special_offers_title' ) : $defaults['special_offers']['title'],
	'intro'       => get_field( 'sprayrite_home_special_offers_intro' ) ? get_field( 'sprayrite_home_special_offers_intro' ) : $defaults['special_offers']['intro'],
	'button_text' => get_field( 'sprayrite_home_special_offers_button_text' ) ? get_field( 'sprayrite_home_special_offers_button_text' ) : $defaults['special_offers']['button_text'],
	'button_link' => get_field( 'sprayrite_home_special_offers_button_link' ) ? get_field( 'sprayrite_home_special_offers_button_link' ) : $defaults['special_offers']['button_link'],
);

$reviews_section = array(
	'title'            => get_field( 'sprayrite_home_reviews_title' ) ? get_field( 'sprayrite_home_reviews_title' ) : $defaults['reviews_section']['title'],
	'intro'            => get_field( 'sprayrite_home_reviews_intro' ) ? get_field( 'sprayrite_home_reviews_intro' ) : $defaults['reviews_section']['intro'],
	'button_text'      => get_field( 'sprayrite_home_reviews_button_text' ) ? get_field( 'sprayrite_home_reviews_button_text' ) : $defaults['reviews_section']['button_text'],
	'button_link'      => get_field( 'sprayrite_home_reviews_button_link' ) ? get_field( 'sprayrite_home_reviews_button_link' ) : $defaults['reviews_section']['button_link'],
	'background_image' => get_field( 'sprayrite_home_reviews_background_image' ),
);

if ( empty( $hero_slides ) ) {
	$hero_slides = $defaults['hero_slides'];
}

if ( empty( $selling_points ) ) {
	$selling_points = $defaults['selling_points'];
}

if ( empty( $feature_tiles ) ) {
	$feature_tiles = $defaults['feature_tiles'];
}

$sale_banner_background = ! empty( $sale_banner['background_image']['url'] ) ? $sale_banner['background_image']['url'] : $defaults['sale_banner']['background_image'];
$sale_banner_card       = ! empty( $sale_banner['card_image']['url'] ) ? $sale_banner['card_image']['url'] : $defaults['sale_banner']['card_image'];
$reviews_background     = ! empty( $reviews_section['background_image']['url'] ) ? $reviews_section['background_image']['url'] : $defaults['reviews_section']['background_image'];

$best_seller_cards = rane_digital_get_home_products( 'sprayrite_home_best_sellers_products', 4, false );
$offer_cards       = rane_digital_get_home_products( 'sprayrite_home_special_offer_products', 8, true );
$review_cards      = rane_digital_get_reviews( 3 );

?>
<main id="primary" class="site-main sprayrite-home">
	<section class="sprayrite-hero">
		<div class="sprayrite-hero__slides js-sprayrite-hero">
			<?php foreach ( $hero_slides as $slide ) : ?>
				<?php
				$slide_image = ! empty( $slide['image']['url'] ) ? $slide['image']['url'] : ( ! empty( $slide['image'] ) ? $slide['image'] : $defaults['hero_slides'][0]['image'] );
				$button_link = ! empty( $slide['button_link']['url'] ) ? $slide['button_link']['url'] : ( ! empty( $slide['button_link'] ) ? $slide['button_link'] : $defaults['hero_slides'][0]['button_link'] );
				$button_text = ! empty( $slide['button_text'] ) ? $slide['button_text'] : $defaults['hero_slides'][0]['button_text'];
				?>
				<div class="sprayrite-hero__slide">
					<div class="sprayrite-hero__media">
						<img src="<?php echo esc_url( $slide_image ); ?>" alt="" class="sprayrite-hero__image">
					</div>
					<div class="container">
						<div class="sprayrite-hero__content">
							<h1 class="sprayrite-hero__title">
								<span class="sprayrite-hero__title-line sprayrite-hero__title-line--single"><?php echo esc_html( $slide['title_line_1'] ); ?></span>
								<span><?php echo esc_html( $slide['title_line_2'] ); ?></span>
							</h1>
							<p class="sprayrite-hero__offer">
								<strong><?php echo esc_html( $slide['accent_text'] ); ?></strong>
								<span><?php echo esc_html( $slide['accent_suffix'] ); ?></span>
							</p>
							<a class="site-btn sprayrite-btn" href="<?php echo esc_url( $button_link ); ?>">
								<?php echo esc_html( $button_text ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="sprayrite-usp">
		<div class="container">
			<div class="sprayrite-usp__grid ag-fade-sequence" data-ag-fade-sequence>
				<?php foreach ( $selling_points as $index => $card ) : ?>
					<?php
					$card_image = ! empty( $card['image']['url'] ) ? $card['image']['url'] : ( ! empty( $card['image'] ) ? $card['image'] : '' );
					$card_style = ! empty( $card['background_style'] ) ? $card['background_style'] : 'green';
					?>
					<article class="sprayrite-usp__card sprayrite-usp__card--<?php echo esc_attr( $card_style ); ?> ag-fade-item" data-ag-fade-item style="<?php echo esc_attr( '--ag-fade-delay:' . ( $index * 120 ) . 'ms;' ); ?><?php echo $card_image ? 'background-image:url(\'' . esc_url( $card_image ) . '\');' : ''; ?>">
						<h2><?php echo esc_html( $card['title'] ); ?></h2>
						<p><?php echo esc_html( $card['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sprayrite-feature-tiles">
		<div class="container">
			<div class="sprayrite-feature-tiles__grid ag-fade-sequence" data-ag-fade-sequence>
				<?php foreach ( $feature_tiles as $index => $tile ) : ?>
					<?php
					$tile_image = ! empty( $tile['image']['url'] ) ? $tile['image']['url'] : ( ! empty( $tile['image'] ) ? $tile['image'] : '' );
					$tile_link  = ! empty( $tile['button_link']['url'] ) ? $tile['button_link']['url'] : ( ! empty( $tile['button_link'] ) ? $tile['button_link'] : home_url( '/' ) );
					?>
					<article class="sprayrite-feature-tile ag-fade-item" data-ag-fade-item style="<?php echo esc_attr( '--ag-fade-delay:' . ( $index * 140 ) . 'ms;' ); ?>">
						<?php if ( $tile_image ) : ?>
							<div class="sprayrite-feature-tile__media">
								<img src="<?php echo esc_url( $tile_image ); ?>" alt="" class="sprayrite-feature-tile__image">
							</div>
						<?php endif; ?>
						<div class="sprayrite-feature-tile__body">
							<h2><?php echo esc_html( $tile['title'] ); ?></h2>
							<p><?php echo esc_html( $tile['text'] ); ?></p>
							<a class="site-btn sprayrite-btn" href="<?php echo esc_url( $tile_link ); ?>">
								<?php echo esc_html( $tile['button_text'] ); ?>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sprayrite-product-section">
		<div class="container">
			<header class="sprayrite-section-heading">
				<h2><?php echo esc_html( $best_sellers['title'] ); ?></h2>
				<p><?php echo esc_html( $best_sellers['intro'] ); ?></p>
			</header>
			<div class="sprayrite-products sprayrite-products--four">
				<?php foreach ( $best_seller_cards as $product ) : ?>
					<article class="sprayrite-product-card">
						<a class="sprayrite-product-card__image" href="<?php echo esc_url( $product['link'] ); ?>">
							<img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>">
						</a>
						<h3><a href="<?php echo esc_url( $product['link'] ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h3>
						<p class="sprayrite-product-card__price"><?php echo esc_html( '£' . number_format_i18n( (float) $product['price'], 2 ) ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="sprayrite-section-cta">
				<?php $best_link = ! empty( $best_sellers['button_link']['url'] ) ? $best_sellers['button_link']['url'] : $best_sellers['button_link']; ?>
				<a class="site-btn sprayrite-btn" href="<?php echo esc_url( $best_link ); ?>">
					<?php echo esc_html( $best_sellers['button_text'] ); ?>
				</a>
			</div>
		</div>
	</section>

	<section class="sprayrite-sale-banner" style="background-image: url('<?php echo esc_url( $sale_banner_background ); ?>');">
		<div class="container sprayrite-sale-banner__row">
			<div class="sprayrite-sale-banner__content">
				<h2><?php echo esc_html( $sale_banner['title'] ); ?></h2>
				<p class="sprayrite-sale-banner__offer">
					<strong><?php echo esc_html( $sale_banner['highlight'] ); ?></strong>
					<span><?php echo esc_html( $sale_banner['highlight_suffix'] ); ?></span>
				</p>
				<p class="sprayrite-sale-banner__text"><?php echo esc_html( $sale_banner['text'] ); ?></p>
				<?php $sale_link = ! empty( $sale_banner['button_link']['url'] ) ? $sale_banner['button_link']['url'] : $sale_banner['button_link']; ?>
				<a class="site-btn sprayrite-btn" href="<?php echo esc_url( $sale_link ); ?>">
					<?php echo esc_html( $sale_banner['button_text'] ); ?>
				</a>
			</div>
			<div class="sprayrite-sale-banner__media">
				<img src="<?php echo esc_url( $sale_banner_card ); ?>" alt="<?php echo esc_attr( $sale_banner['title'] ); ?>">
			</div>
		</div>
	</section>

	<section class="sprayrite-product-section sprayrite-product-section--offers">
		<div class="container">
			<header class="sprayrite-section-heading">
				<h2><?php echo esc_html( $special_offers['title'] ); ?></h2>
				<p><?php echo esc_html( $special_offers['intro'] ); ?></p>
			</header>
			<div class="sprayrite-products sprayrite-products--eight">
				<?php foreach ( $offer_cards as $product ) : ?>
					<article class="sprayrite-product-card">
						<a class="sprayrite-product-card__image" href="<?php echo esc_url( $product['link'] ); ?>">
							<img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>">
						</a>
						<h3><a href="<?php echo esc_url( $product['link'] ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h3>
						<p class="sprayrite-product-card__price"><?php echo esc_html( '£' . number_format_i18n( (float) $product['price'], 2 ) ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="sprayrite-section-cta">
				<?php $offers_link = ! empty( $special_offers['button_link']['url'] ) ? $special_offers['button_link']['url'] : $special_offers['button_link']; ?>
				<a class="site-btn sprayrite-btn" href="<?php echo esc_url( $offers_link ); ?>">
					<?php echo esc_html( $special_offers['button_text'] ); ?>
				</a>
			</div>
		</div>
	</section>

	<section class="sprayrite-reviews" style="background-image: url('<?php echo esc_url( $reviews_background ); ?>');">
		<div class="container">
			<header class="sprayrite-section-heading sprayrite-section-heading--light">
				<h2><?php echo esc_html( $reviews_section['title'] ); ?></h2>
				<p><?php echo esc_html( $reviews_section['intro'] ); ?></p>
			</header>
			<div class="sprayrite-reviews__grid js-sprayrite-reviews ag-fade-sequence" data-ag-fade-sequence>
				<?php foreach ( $review_cards as $index => $review ) : ?>
					<article class="sprayrite-review-card ag-fade-item" data-ag-fade-item style="<?php echo esc_attr( '--ag-fade-delay:' . ( $index * 120 ) . 'ms;' ); ?>">
						<div class="sprayrite-review-card__stars" aria-label="<?php echo esc_attr( $review['rating'] ); ?> out of 5 stars">
							<?php for ( $i = 0; $i < 5; $i++ ) : ?>
								<span><?php echo $i < (int) $review['rating'] ? '★' : '☆'; ?></span>
							<?php endfor; ?>
						</div>
						<p class="sprayrite-review-card__text">"<?php echo esc_html( $review['content'] ); ?>"</p>
						<p class="sprayrite-review-card__author"><?php echo esc_html( $review['author'] ); ?></p>
						<?php if ( ! empty( $review['location'] ) ) : ?>
							<p class="sprayrite-review-card__meta"><?php echo esc_html( $review['location'] ); ?></p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="sprayrite-section-cta">
				<?php $reviews_link = ! empty( $reviews_section['button_link']['url'] ) ? $reviews_section['button_link']['url'] : $reviews_section['button_link']; ?>
				<a class="site-btn sprayrite-btn sprayrite-btn--light" href="<?php echo esc_url( $reviews_link ); ?>">
					<?php echo esc_html( $reviews_section['button_text'] ); ?>
				</a>
			</div>
		</div>
	</section>
</main>
