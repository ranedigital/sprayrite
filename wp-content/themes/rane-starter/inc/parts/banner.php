<?php
/**
 * Generic banner for internals.
 * Feel free to amend or change this file as needed, or add a different banner file entirely.
 * 
 * This banner uses the featured image for the page plus the page title.
 */

// Vars
$banner_title = get_the_title();
$image_url = get_the_post_thumbnail_url( get_the_ID(), 'main-banner' );

?>
<section class="main-banner" style="background-image: url( <?php echo $image_url; ?> );">
	<div class="container">

		<div class="main-banner__row">
		
			<h1 class="main-banner__title">
				<?php echo $banner_title; ?>
			</h1>

		</div>
		
	</div>
</section>

