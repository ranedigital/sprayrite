<?php
/**
 * Sprayrite-specific homepage, WooCommerce, and review helpers.
 *
 * @package rane_digital
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check whether WooCommerce is active.
 *
 * @return bool
 */
function rane_digital_has_woocommerce() {
	return class_exists( 'WooCommerce' ) && function_exists( 'wc_get_products' );
}

/**
 * Build a theme asset URI.
 *
 * @param string $path Relative asset path.
 * @return string
 */
function rane_digital_theme_asset_uri( $path ) {
	return trailingslashit( get_template_directory_uri() ) . ltrim( $path, '/' );
}

/**
 * Build the default Sprayrite homepage data set.
 *
 * @return array
 */
function rane_digital_get_default_homepage_data() {
	$shop_url    = rane_digital_has_woocommerce() ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop/' );
	$reviews_url = home_url( '/reviews/' );
	$hero_image  = rane_digital_theme_asset_uri( 'assets/home/hero-slide.jpg' );

	$slides = array(
		array(
			'image'         => $hero_image,
			'title_line_1'  => 'Get Your Garden',
			'title_line_2'  => 'Ready For Summer',
			'accent_text'   => 'Save 20%',
			'accent_suffix' => ' on Lawn Care',
			'button_text'   => 'Shop Now',
			'button_link'   => $shop_url,
		),
		array(
			'image'         => $hero_image,
			'title_line_1'  => 'Get Your Garden',
			'title_line_2'  => 'Ready For Summer',
			'accent_text'   => 'Save 20%',
			'accent_suffix' => ' on Lawn Care',
			'button_text'   => 'Shop Now',
			'button_link'   => $shop_url,
		),
		array(
			'image'         => $hero_image,
			'title_line_1'  => 'Get Your Garden',
			'title_line_2'  => 'Ready For Summer',
			'accent_text'   => 'Save 20%',
			'accent_suffix' => ' on Lawn Care',
			'button_text'   => 'Shop Now',
			'button_link'   => $shop_url,
		),
	);

	return array(
		'hero_slides'      => $slides,
		'selling_points'   => array(
			array(
				'title'            => 'Trusted Garden Products',
				'text'             => 'Professional products trusted by gardeners',
				'image'            => rane_digital_theme_asset_uri( 'assets/home/usp-trusted.jpg' ),
				'background_style' => 'green',
			),
			array(
				'title'            => 'Fast UK Delivery',
				'text'             => 'Quick and reliable shipping across the UK.',
				'image'            => rane_digital_theme_asset_uri( 'assets/home/usp-delivery.jpg' ),
				'background_style' => 'grey',
			),
			array(
				'title'            => 'Secure Checkout',
				'text'             => 'Safe and secure payments for peace of mind.',
				'image'            => rane_digital_theme_asset_uri( 'assets/home/usp-checkout.jpg' ),
				'background_style' => 'light',
			),
		),
		'feature_tiles'    => array(
			array(
				'title'       => 'Upgrade Your Garden Equipment',
				'text'        => 'Sprayers, Tools & Professional Equipment',
				'button_text' => 'Shop Equipment',
				'button_link' => $shop_url,
				'image'       => rane_digital_theme_asset_uri( 'assets/home/promo-tools.jpg' ),
			),
			array(
				'title'       => 'Protect Your Plants From Pests',
				'text'        => 'Effective Pest & Disease Control Solutions',
				'button_text' => 'Shop Pest Control',
				'button_link' => $shop_url,
				'image'       => rane_digital_theme_asset_uri( 'assets/home/promo-pest.jpg' ),
			),
		),
		'best_sellers'     => array(
			'title'       => 'Best Sellers',
			'intro'       => 'Our most popular garden products, trusted by gardeners across the UK.',
			'button_text' => 'View All',
			'button_link' => $shop_url,
		),
		'sale_banner'      => array(
			'title'           => 'Garden Sale Now On',
			'highlight'       => 'Up to 30% OFF',
			'highlight_suffix'=> ' Selected Products',
			'text'            => 'Save on weed killers, fertilisers, pest control and more.',
			'button_text'     => 'Shop Now',
			'button_link'     => $shop_url,
			'background_image'=> rane_digital_theme_asset_uri( 'assets/home/sale-banner-bg.svg' ),
			'card_image'      => rane_digital_theme_asset_uri( 'assets/home/sale-banner-card.jpg' ),
		),
		'special_offers'   => array(
			'title'       => 'Special Offers',
			'intro'       => 'Limited-time discounts on our most popular garden products.',
			'button_text' => 'View All',
			'button_link' => $shop_url,
		),
		'reviews_section'  => array(
			'title'            => 'What Our Customers Say',
			'intro'            => 'Honest reviews from our happy customers who trust our garden products.',
			'button_text'      => 'Read All Reviews',
			'button_link'      => $reviews_url,
			'background_image' => rane_digital_theme_asset_uri( 'assets/home/reviews-bg.jpg' ),
		),
	);
}

/**
 * Return placeholder product cards.
 *
 * @return array
 */
function rane_digital_get_placeholder_products() {
	$shop_url = rane_digital_has_woocommerce() ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop/' );

	return array(
		array(
			'title' => 'Scorpion Weedkiller 5 Lt',
			'price' => '49.99',
			'image' => rane_digital_theme_asset_uri( 'assets/home/product-scorpion.jpg' ),
			'link'  => $shop_url,
		),
		array(
			'title' => 'Potato Blight Control (Bayer Garden)',
			'price' => '24.99',
			'image' => rane_digital_theme_asset_uri( 'assets/home/product-potato-blight.jpg' ),
			'link'  => $shop_url,
		),
		array(
			'title' => 'Hyswards-P 5Lt',
			'price' => '55.00',
			'image' => rane_digital_theme_asset_uri( 'assets/home/product-hysward.jpg' ),
			'link'  => $shop_url,
		),
		array(
			'title' => 'Westland Aftercut Ultra Green 100m2',
			'price' => '9.99',
			'image' => rane_digital_theme_asset_uri( 'assets/home/product-aftercut.jpg' ),
			'link'  => $shop_url,
		),
	);
}

/**
 * Repeat items up to a target length.
 *
 * @param array $items Source items.
 * @param int   $target Target size.
 * @return array
 */
function rane_digital_repeat_items_to_length( $items, $target ) {
	$repeated = array();

	if ( empty( $items ) ) {
		return $repeated;
	}

	while ( count( $repeated ) < $target ) {
		foreach ( $items as $item ) {
			$repeated[] = $item;

			if ( count( $repeated ) >= $target ) {
				break;
			}
		}
	}

	return $repeated;
}

/**
 * Convert a Woo product into a lightweight card.
 *
 * @param WC_Product $product Woo product instance.
 * @return array
 */
function rane_digital_map_product_card( $product ) {
	$image_id  = $product->get_image_id();
	$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'woocommerce_thumbnail' ) : '';

	if ( ! $image_url ) {
		$fallbacks = rane_digital_get_placeholder_products();
		$image_url = $fallbacks[0]['image'];
	}

	return array(
		'title' => $product->get_name(),
		'price' => wc_get_price_to_display( $product ),
		'image' => $image_url,
		'link'  => get_permalink( $product->get_id() ),
	);
}

/**
 * Return products for a homepage section.
 *
 * @param string $field_name ACF relationship field name.
 * @param int    $limit Number of products required.
 * @param bool   $on_sale Whether to prefer on-sale products.
 * @return array
 */
function rane_digital_get_home_products( $field_name, $limit = 4, $on_sale = false ) {
	$cards = array();

	if ( rane_digital_has_woocommerce() ) {
		$selected_products = function_exists( 'get_field' ) ? get_field( $field_name ) : array();

		if ( ! empty( $selected_products ) ) {
			foreach ( $selected_products as $selected_product ) {
				$product = is_object( $selected_product ) ? wc_get_product( $selected_product->ID ) : wc_get_product( $selected_product );

				if ( $product ) {
					$cards[] = rane_digital_map_product_card( $product );
				}
			}
		}

		if ( empty( $cards ) ) {
			$args = array(
				'limit'   => $limit,
				'status'  => 'publish',
				'orderby' => $on_sale ? 'date' : 'popularity',
				'order'   => 'DESC',
				'return'  => 'objects',
			);

			if ( $on_sale ) {
				$args['on_sale'] = true;
			}

			$products = wc_get_products( $args );

			foreach ( $products as $product ) {
				$cards[] = rane_digital_map_product_card( $product );
			}
		}
	}

	if ( empty( $cards ) ) {
		$cards = rane_digital_get_placeholder_products();
	}

	return rane_digital_repeat_items_to_length( $cards, $limit );
}

/**
 * Register the reviews post type.
 *
 * @return void
 */
function rane_digital_register_review_post_type() {
	$labels = array(
		'name'               => 'Reviews',
		'singular_name'      => 'Review',
		'menu_name'          => 'Reviews',
		'name_admin_bar'     => 'Review',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Review',
		'new_item'           => 'New Review',
		'edit_item'          => 'Edit Review',
		'view_item'          => 'View Review',
		'all_items'          => 'All Reviews',
		'search_items'       => 'Search Reviews',
		'not_found'          => 'No reviews found.',
		'not_found_in_trash' => 'No reviews found in Trash.',
	);

	register_post_type(
		'sprayrite_review',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => 'reviews',
			'menu_icon'    => 'dashicons-star-filled',
			'rewrite'      => array( 'slug' => 'reviews' ),
			'supports'     => array( 'title', 'editor' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'rane_digital_register_review_post_type' );

/**
 * Return published reviews.
 *
 * @param int $limit Number of reviews.
 * @return array
 */
function rane_digital_get_reviews( $limit = 3 ) {
	$reviews = get_posts(
		array(
			'post_type'      => 'sprayrite_review',
			'posts_per_page' => $limit,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);

	if ( empty( $reviews ) ) {
		return array(
			array(
				'author'   => 'Chris Jenkins',
				'content'  => 'Great quality products and fast delivery. My lawn has never looked better.',
				'rating'   => 5,
				'location' => '',
			),
			array(
				'author'   => 'Chris Jenkins',
				'content'  => 'Great quality products and fast delivery. My lawn has never looked better.',
				'rating'   => 5,
				'location' => '',
			),
			array(
				'author'   => 'Chris Jenkins',
				'content'  => 'Reliable garden products at good prices. Will definitely order again.',
				'rating'   => 5,
				'location' => '',
			),
		);
	}

	$items = array();

	foreach ( $reviews as $review ) {
		$rating   = function_exists( 'get_field' ) ? (int) get_field( 'review_rating', $review->ID ) : 5;
		$location = function_exists( 'get_field' ) ? get_field( 'review_location', $review->ID ) : '';

		$items[] = array(
			'author'   => get_the_title( $review ),
			'content'  => wp_strip_all_tags( apply_filters( 'the_content', $review->post_content ) ),
			'rating'   => $rating ? $rating : 5,
			'location' => $location,
		);
	}

	return $items;
}

/**
 * Output homepage review schema.
 *
 * @return void
 */
function rane_digital_output_homepage_review_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	$reviews = rane_digital_get_reviews( 20 );

	if ( empty( $reviews ) ) {
		return;
	}

	$total_rating = 0;
	$review_nodes = array();

	foreach ( $reviews as $review ) {
		$total_rating += (int) $review['rating'];

		$review_nodes[] = array(
			'@type'         => 'Review',
			'author'        => array(
				'@type' => 'Person',
				'name'  => $review['author'],
			),
			'reviewBody'    => $review['content'],
			'reviewRating'  => array(
				'@type'       => 'Rating',
				'ratingValue' => (int) $review['rating'],
				'bestRating'  => 5,
			),
		);
	}

	$schema = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'Store',
		'name'            => get_field( 'company_name_opt', 'option' ) ? get_field( 'company_name_opt', 'option' ) : get_bloginfo( 'name' ),
		'url'             => home_url( '/' ),
		'aggregateRating' => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => round( $total_rating / count( $reviews ), 1 ),
			'reviewCount' => count( $reviews ),
			'bestRating'  => 5,
		),
		'review'          => $review_nodes,
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
}
add_action( 'wp_head', 'rane_digital_output_homepage_review_schema', 30 );

/**
 * Register ACF field groups for the homepage and reviews.
 *
 * @return void
 */
function rane_digital_register_sprayrite_acf_groups() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_sprayrite_home_builder',
			'title'    => 'Home Page Builder',
			'fields'   => array(
				array(
					'key'   => 'field_sprayrite_home_intro',
					'label' => 'Homepage Content',
					'name'  => '',
					'type'  => 'message',
					'message' => 'Edit the homepage sections below. If a section is left empty, the theme will fall back to the Figma starter content.',
				),
				array(
					'key'   => 'field_sprayrite_home_hero_tab',
					'label' => 'Hero Slider',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'        => 'field_sprayrite_home_hero_slides',
					'label'      => 'Slides',
					'name'       => 'sprayrite_home_hero_slides',
					'type'       => 'repeater',
					'layout'     => 'row',
					'button_label' => 'Add Slide',
					'sub_fields' => array(
						array(
							'key'   => 'field_sprayrite_home_hero_image',
							'label' => 'Image',
							'name'  => 'image',
							'type'  => 'image',
							'return_format' => 'array',
							'preview_size' => 'medium',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_title_1',
							'label' => 'Title Line 1',
							'name'  => 'title_line_1',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_title_2',
							'label' => 'Title Line 2',
							'name'  => 'title_line_2',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_accent',
							'label' => 'Accent Text',
							'name'  => 'accent_text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_suffix',
							'label' => 'Accent Suffix',
							'name'  => 'accent_suffix',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_button_text',
							'label' => 'Button Text',
							'name'  => 'button_text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_hero_button_link',
							'label' => 'Button Link',
							'name'  => 'button_link',
							'type'  => 'link',
						),
					),
				),
				array(
					'key'   => 'field_sprayrite_home_usp_tab',
					'label' => 'Selling Points',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'        => 'field_sprayrite_home_usp_cards',
					'label'      => 'Cards',
					'name'       => 'sprayrite_home_usp_cards',
					'type'       => 'repeater',
					'layout'     => 'row',
					'button_label' => 'Add Card',
					'sub_fields' => array(
						array(
							'key'   => 'field_sprayrite_home_usp_title',
							'label' => 'Title',
							'name'  => 'title',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_usp_text',
							'label' => 'Text',
							'name'  => 'text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_usp_image',
							'label' => 'Background Image',
							'name'  => 'image',
							'type'  => 'image',
							'return_format' => 'array',
							'preview_size' => 'medium',
						),
						array(
							'key'     => 'field_sprayrite_home_usp_style',
							'label'   => 'Background Style',
							'name'    => 'background_style',
							'type'    => 'select',
							'choices' => array(
								'green' => 'Green',
								'grey'  => 'Grey',
								'light' => 'Light',
							),
							'default_value' => 'green',
						),
					),
				),
				array(
					'key'   => 'field_sprayrite_home_tiles_tab',
					'label' => 'Feature Tiles',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'        => 'field_sprayrite_home_feature_tiles',
					'label'      => 'Tiles',
					'name'       => 'sprayrite_home_feature_tiles',
					'type'       => 'repeater',
					'layout'     => 'row',
					'button_label' => 'Add Tile',
					'sub_fields' => array(
						array(
							'key'   => 'field_sprayrite_home_tile_title',
							'label' => 'Title',
							'name'  => 'title',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_tile_text',
							'label' => 'Text',
							'name'  => 'text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_tile_button_text',
							'label' => 'Button Text',
							'name'  => 'button_text',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_sprayrite_home_tile_button_link',
							'label' => 'Button Link',
							'name'  => 'button_link',
							'type'  => 'link',
						),
						array(
							'key'   => 'field_sprayrite_home_tile_image',
							'label' => 'Image',
							'name'  => 'image',
							'type'  => 'image',
							'return_format' => 'array',
							'preview_size' => 'medium',
						),
					),
				),
				array(
					'key'   => 'field_sprayrite_home_best_sellers_tab',
					'label' => 'Best Sellers',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_sprayrite_home_best_title',
					'label' => 'Section Title',
					'name'  => 'sprayrite_home_best_sellers_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_best_intro',
					'label' => 'Section Intro',
					'name'  => 'sprayrite_home_best_sellers_intro',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'        => 'field_sprayrite_home_best_products',
					'label'      => 'Products',
					'name'       => 'sprayrite_home_best_sellers_products',
					'type'       => 'relationship',
					'post_type'  => array( 'product' ),
					'filters'    => array( 'search' ),
					'return_format' => 'id',
				),
				array(
					'key'   => 'field_sprayrite_home_best_button_text',
					'label' => 'Button Text',
					'name'  => 'sprayrite_home_best_sellers_button_text',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_best_button_link',
					'label' => 'Button Link',
					'name'  => 'sprayrite_home_best_sellers_button_link',
					'type'  => 'link',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_tab',
					'label' => 'Sale Banner',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_title',
					'label' => 'Title',
					'name'  => 'sprayrite_home_sale_banner_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_highlight',
					'label' => 'Highlight Text',
					'name'  => 'sprayrite_home_sale_banner_highlight',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_highlight_suffix',
					'label' => 'Highlight Suffix',
					'name'  => 'sprayrite_home_sale_banner_highlight_suffix',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_text',
					'label' => 'Body Text',
					'name'  => 'sprayrite_home_sale_banner_text',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'   => 'field_sprayrite_home_sale_button_text',
					'label' => 'Button Text',
					'name'  => 'sprayrite_home_sale_banner_button_text',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_button_link',
					'label' => 'Button Link',
					'name'  => 'sprayrite_home_sale_banner_button_link',
					'type'  => 'link',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_bg',
					'label' => 'Background Image',
					'name'  => 'sprayrite_home_sale_banner_background_image',
					'type'  => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
				),
				array(
					'key'   => 'field_sprayrite_home_sale_card',
					'label' => 'Foreground Card Image',
					'name'  => 'sprayrite_home_sale_banner_card_image',
					'type'  => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
				),
				array(
					'key'   => 'field_sprayrite_home_offers_tab',
					'label' => 'Special Offers',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_sprayrite_home_offers_title',
					'label' => 'Section Title',
					'name'  => 'sprayrite_home_special_offers_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_offers_intro',
					'label' => 'Section Intro',
					'name'  => 'sprayrite_home_special_offers_intro',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'        => 'field_sprayrite_home_offers_products',
					'label'      => 'Products',
					'name'       => 'sprayrite_home_special_offer_products',
					'type'       => 'relationship',
					'post_type'  => array( 'product' ),
					'filters'    => array( 'search' ),
					'return_format' => 'id',
				),
				array(
					'key'   => 'field_sprayrite_home_offers_button_text',
					'label' => 'Button Text',
					'name'  => 'sprayrite_home_special_offers_button_text',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_offers_button_link',
					'label' => 'Button Link',
					'name'  => 'sprayrite_home_special_offers_button_link',
					'type'  => 'link',
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_tab',
					'label' => 'Reviews Section',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_title',
					'label' => 'Section Title',
					'name'  => 'sprayrite_home_reviews_title',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_intro',
					'label' => 'Section Intro',
					'name'  => 'sprayrite_home_reviews_intro',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_button_text',
					'label' => 'Button Text',
					'name'  => 'sprayrite_home_reviews_button_text',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_button_link',
					'label' => 'Button Link',
					'name'  => 'sprayrite_home_reviews_button_link',
					'type'  => 'link',
				),
				array(
					'key'   => 'field_sprayrite_home_reviews_bg',
					'label' => 'Background Image',
					'name'  => 'sprayrite_home_reviews_background_image',
					'type'  => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'page_type',
						'operator' => '==',
						'value'    => 'front_page',
					),
				),
			),
		)
	);

	acf_add_local_field_group(
		array(
			'key'      => 'group_sprayrite_reviews',
			'title'    => 'Review Details',
			'fields'   => array(
				array(
					'key'   => 'field_sprayrite_review_rating',
					'label' => 'Rating',
					'name'  => 'review_rating',
					'type'  => 'number',
					'min'   => 1,
					'max'   => 5,
					'step'  => 1,
					'default_value' => 5,
				),
				array(
					'key'   => 'field_sprayrite_review_location',
					'label' => 'Location',
					'name'  => 'review_location',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'sprayrite_review',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'rane_digital_register_sprayrite_acf_groups' );
