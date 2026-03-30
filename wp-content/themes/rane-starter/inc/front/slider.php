<?php
/**
 * The front page slider
 */


if( have_rows( 'rptr_slides' )): ?>
<section class="slideshow" id="slideshow">
	<div class="fp-slideshow">
	<?php while( have_rows( 'rptr_slides' )): the_row();

		// Vars
		$slide = get_sub_field( 'slide' );		
		$slide_url = $slide[ 'url' ];
		$title_text = get_sub_field( 'title_text' );
		$main_text = get_sub_field( 'main_text' );
		$button_text = get_sub_field( 'button_text' );
		$button_link = get_sub_field( 'button_link' );		

	?>
	<!-- repeated code -->
	<div class="fp-slideshow__slide" style="background-image: url(<?php echo $slide_url; ?>);">
		<div class="fp-slideshow__content">		

			<?php if( $title_text ): ?>
			<p class="fp-slideshow__title">
				<?php echo $title_text; ?>
			</p>
			<?php endif; ?>

			<?php if( $title_text ): ?>
			<p class="fp-slideshow__text">
				<?php echo $main_text; ?>					
			</p>
			<?php endif; ?>

			<a href="<?php echo $button_link; ?>" class="site-btn">
				<?php echo $button_text; ?>
			</a>

		</div>		
  	</div>
	<?php $wow_delay += 0.2; endwhile; ?>
	</div>
</section>
<?php endif; ?>

<script type="text/javascript">
jQuery.noConflict();
(function( $ ) {
	$(function() {
    	
    	/* ======================================== */  
	    /* Init Slick Slider
	    /* ======================================== */

	    $('.fp-slideshow').slick({
	        dots: true,
	        infinite: true,
	        speed: 500,
	        fade: true,
	        cssEase: 'linear',
	        autoplay: true,
	        autoplaySpeed: 4000
	    });
    	
	});
})(jQuery);
</script>