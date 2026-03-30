<?php
/**
 * Text & Image Columns
 */

// Vars
$section_pre_title = get_sub_field( 'section_pre_title' );
$section_title = get_sub_field( 'section_title' );
$main_text = get_sub_field( 'main_text' );
$main_image = get_sub_field( 'main_image' );
$image_url = $main_image[ 'sizes' ][ 'builder-img' ];
$col_order = get_sub_field( 'col_order' );
$button_text = get_sub_field( 'button_text' );
$button_link = get_sub_field( 'button_link' );


// Background Image
$section_background_image = get_sub_field( 'section_background_image' );

if( $section_background_image ){
	
	// Get background image URL
	$section_background_image_url = $section_background_image[ 'url' ];
	$section_class = "section-has-bg";

}else{
	$section_background_image_url = "";
	$section_class = "";
}


// Class modifier
if( $col_order == "txt-img" ){
	$txt_class_modifier = "col-order-1";
	$img_class_modifier = "col-order-2";
}elseif( $col_order == "img-txt" ){
	$txt_class_modifier = "col-order-2";
	$img_class_modifier = "col-order-1";
}

?>
<div class="<?php echo $section_class; ?>" style="background-image: url(<?php echo $section_background_image_url; ?>)">
	<div class="container">
		<div class="content-box__row">

			<div class="content-box__col content-box__col--txt <?php echo $txt_class_modifier; ?> wow fadeInLeft">

				<?php if( $section_pre_title || $section_title ): ?>
				<div class="content-box__hdr">
					
					<?php if( $section_pre_title ): ?>
					<span class="site-title-pre">
						<?php echo $section_pre_title; ?>
					</span>
					<?php endif; ?>

					<?php if( $section_title ): ?>
					<h2 class="site-title content-box__title">
						<?php echo $section_title; ?>
					</h2>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<div class="content-box__body">
					<div class="rte">
						<?php echo $main_text; ?>
					</div>
				</div>

				<?php if( $button_link ): ?>
				<div class="content-box__ftr">
					<a href="<?php echo $button_link; ?>" class="site-btn">
						<?php echo $button_text; ?>
					</a>
				</div>
				<?php endif; ?>

			</div>

			<div class="content-box__col content-box__col--img <?php echo $img_class_modifier; ?> wow fadeInRight">
				<img src="<?php echo $image_url; ?>" alt="<?php echo $section_title; ?>">
			</div>
			
		</div>
	</div>
</div>