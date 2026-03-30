<?php
/**
 * Reviews archive template.
 *
 * @package rane_digital
 */

get_header();
?>
<main id="primary" class="site-main sprayrite-reviews-archive">
	<section class="sprayrite-reviews-archive__hero">
		<div class="container">
			<h1><?php post_type_archive_title(); ?></h1>
			<p>All customer reviews for Sprayrite Agri. These reviews also feed the homepage review section and schema markup.</p>
		</div>
	</section>

	<section class="sprayrite-reviews-archive__list">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="sprayrite-reviews__grid">
					<?php while ( have_posts() ) : ?>
						<?php
						the_post();
						$rating   = get_field( 'review_rating' ) ? (int) get_field( 'review_rating' ) : 5;
						$location = get_field( 'review_location' );
						?>
						<article class="sprayrite-review-card">
							<div class="sprayrite-review-card__stars" aria-label="<?php echo esc_attr( $rating ); ?> out of 5 stars">
								<?php for ( $i = 0; $i < 5; $i++ ) : ?>
									<span><?php echo $i < $rating ? '★' : '☆'; ?></span>
								<?php endfor; ?>
							</div>
							<p class="sprayrite-review-card__text"><?php the_content(); ?></p>
							<p class="sprayrite-review-card__author"><?php the_title(); ?></p>
							<?php if ( $location ) : ?>
								<p class="sprayrite-review-card__meta"><?php echo esc_html( $location ); ?></p>
							<?php endif; ?>
						</article>
					<?php endwhile; ?>
				</div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<p>No reviews have been added yet.</p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
